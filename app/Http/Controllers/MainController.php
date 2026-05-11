<?php

namespace App\Http\Controllers;

use App\Models\MExclusionNumber;
use App\Models\TGck;
use App\Models\TGkj;
use App\Models\TKhj;
use App\Models\TKik;
use App\Models\TKsk;
use App\Models\TTck;
use App\Models\TKtk;
use App\Models\TOkk;
use App\Models\TRke;
use App\Models\TRkk;
use App\Models\TRko;
use App\Models\TSkk;
use App\Models\VBasicInfo;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class MainController extends Controller
{
    public function index(Request $request)
    {
        // Route parameters are injected positionally; resolve by name to avoid /k and /m mismatches.
        $kNo = $request->route('kNo');
        $mNo = $request->route('mNo');

        $user = Auth::user();
        $mExclusionNumber = null;
        $isReadOnly = true;
        $requestNumber = null;
        $tRke = null;
        $showHouseSurvey = false;
        $showHouseConst = false;
        $showConstOption = false;
        $showSetupRush = false;

        if ($kNo || $mNo) {
            $requestNumber = $kNo;

            // 工事手配コードから回線依頼番号を取得
            if ($mNo) {
                $requestNumber = $this->getRequestNumber($mNo);
            }
            if (!$requestNumber) {
                return redirect()->route('main.index')->with('error', "データが存在しません。");
            }

            $tRke = $this->getRke($requestNumber);

            // データが存在するかチェックを行う
            if (!$tRke) {
                return redirect()->route('main.index')->with('error', "データが存在しません。");
            }

            // 排他処理
            $mExclusionNumber = $this->setExclusion($requestNumber);

            $isReadOnly = ($mExclusionNumber->user_id != $user->id);

            $showHouseSurvey = collect($tRke?->tRko ?? [])->contains(function ($rko) {
                return in_array($rko?->rko_041, ['ドロップ引込', '光ID施工'], true) && $rko?->rko_042 === '現地調査';
            });

            $showHouseConst = collect($tRke?->tRko ?? [])->contains(function ($rko) {
                return in_array($rko?->rko_041, ['ドロップ引込', '光ID施工'], true) && $rko?->rko_042 === '新設';
            });

            $showConstOption = collect($tRke?->tRko ?? [])->contains(function ($rko) {
                return in_array($rko?->rko_041, ['ドロップ引込', '光ID施工'], true) && $rko?->rko_042 === '追加';
            });

            $showSetupRush = TRkk::query()
                ->where('rkk_039', $tRke->rke_019)
                ->where('rkk_041', 'かけつけ')
                ->exists();
        }

        return view('main.index')
            ->with(compact(
                'kNo',
                'mNo',
                'requestNumber',
                'mExclusionNumber',
                'isReadOnly',
                'tRke',
                'showHouseSurvey',
                'showHouseConst',
                'showConstOption',
                'showSetupRush',
            ));
    }

    public function post(Request $request)
    {
        $kNo = $request->input('kNo');
        $mNo = $request->input('mNo');

        if ($kNo || $mNo) {
            $requestNumber = $kNo;

            // 工事手配コードから回線依頼番号を取得
            if ($mNo) {
                $requestNumber = $this->getRequestNumber($mNo);
            }
            if (!$requestNumber) {
                return redirect()->route('main.index')->with('error', "データが存在しません。");
            }

            $tRke = $this->getRke($requestNumber);

            // データが存在するかチェックを行う
            if (!$tRke) {
                return redirect()->route('main.index')->with('error', "データが存在しません。");
            }

            try {
                DB::transaction(function () use ($tRke, $request) {
                    $this->updateData($tRke, $request->input());
                });
            } catch (\Throwable $e) {
                report($e);
                return back()->withInput()->with('error', '保存に失敗しました。');
            }

            if ($kNo) {
                return redirect()->route('main.search-k', ['kNo' => $kNo])->with('success', "保存しました。");
            } else {
                return redirect()->route('main.search-m', ['mNo' => $mNo])->with('success', "保存しました。");
            }
        }

        return redirect()->route('main.index');
    }

    public function retainLock(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'request_number' => ['required', 'string', 'max:64'],
        ]);

        $userId = Auth::id();

        $updated = MExclusionNumber::query()
            ->where('request_number', $validated['request_number'])
            ->where('user_id', $userId)
            ->update([
                'date_update' => now(),
            ]);

        return response()->json([
            'ok' => true,
            'retained' => ($updated > 0),
        ]);
    }

    public function releaseLock(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'request_number' => ['required', 'string', 'max:64'],
        ]);

        $userId = Auth::id();

        $deleted = MExclusionNumber::query()
            ->where('request_number', $validated['request_number'])
            ->where('user_id', $userId)
            ->delete();

        return response()->json([
            'ok' => true,
            'released' => ($deleted > 0),
        ]);
    }

    protected function setExclusion($requestNumber)
    {
        $user = Auth::user();

        $lockTtlMinutes = (int) config('lock.ttl_minutes', 5);

        // 解放忘れと思われるデータを削除
        MExclusionNumber::query()
            ->where('request_number', $requestNumber)
            ->where('date_update', '<', now()->subMinutes($lockTtlMinutes))
            ->delete();

        // 排他データがあるか取得
        $mExclusionNumber = MExclusionNumber::query()
            ->with([
                'mUser'
            ])
            ->where('request_number', $requestNumber)
            ->first();

        if (!$mExclusionNumber) {
            $mExclusionNumber = MExclusionNumber::create([
                'request_number' => $requestNumber,
                'user_id' => $user->id,
                'date_regist' => now(),
                'date_update' => now(),
            ]);
        } elseif ($mExclusionNumber->user_id == $user->id) {
            $mExclusionNumber->date_update = now();
            $mExclusionNumber->save();
        }

        return $mExclusionNumber;
    }

    protected function getRequestNumber($mNo)
    {
        $requestNumber = '';

        $tRko = TRko::query()
            ->where('rko_001', $mNo)
            ->first();
        $requestNumber = $tRko?->rko_039;

        if (!$requestNumber) {
            $tRkk = TRkk::query()
                ->where('rkk_001', $mNo)
                ->first();
            $requestNumber = $tRkk?->rkk_039;
        }

        return $requestNumber;
    }

    protected function exists($requestNumber)
    {
        return VBasicInfo::query()
            ->where('rke_019', $requestNumber)
            ->exists();

    }

    protected function getRke($requestNumber)
    {
        $tRke = TRke::query()
            ->with([
                'tKik',
                'tGck',
                'tGck.mGck003',
                'tGck.mGck012',
                'tGck.mGck013',
                'tGck.mGck026',
                'tGck.mGck028',
                'tGck.mGck044',
                'tGck.mGck059',
                'tGck.mGck064',
                'tGkj',
                'tKhj',
                'tSkk',
                'tKsk',
                'tRko',
                'mRke024',
                'mRke025',
                'mRke043',
                'mRke044',
                'mRke052',
                'mRke053',
                'mRke054',
                'mRke055',
                'mRke056',
                'mRke057',
                'mRke058',
                'mRke059',
                'mRke060',
                'mRke063',
                'mRke064',
                'mRke068',
                'mRke069',
                'mRke070',
                'mRke071',
                'mRke072',
                'mRke079',
                'mRke082',
                'mRke083',
                'mRke086',
                'mRke087',
                'mRke088',
                'mRke091',
                'mRke111',
                'mRke114',
                'mRke117',
                'mRke119',
                'mRke123',
                'mRke124',
                'mRke125',
                'mRke128',
                'mRke131',
                'mRke134',
                'mRke135',
                'mRke136',
                'mRke140',
                'mRke145',
                'mRke146',
                'mRke147',
                'mRke148',
                'mRke149',
                'mRke174',
                'mRke188',
                'mRke189',
                'mRke192',
                'mRke193',
                'mRke195',
                'mRke205',
                'mRke206',
                'mRke207',
                'mRke208',
                'mRke209',
                'mRke210',
                'mRke211',
                'mRke212',
                'mRke213',
                'mRke216',
                'mRke217',
                'mRke218',
                'mRke223',
                'mRke224',
                'mRke225',
                'mRke226',
                'mRke227',
                'mRke228',
                'mRke230',
                'mRke231',
                'mRke232',
                'mRke233',
                'mRke234',
                'mRke235',
                'mRke236',
                'mRke239',
                'mRke240',
                'mRke243',
                'mRke244',
                'mRke247',
                'mRke249',
                'mRke250',
                'mRke251',
                'mRke275',
            ])
            ->where('rke_019', $requestNumber)
            ->first();

        return $tRke;
    }

    protected function updateRke($tRke, $input)
    {
        if (!($tRke instanceof TRke) || !is_array($input)) {
            return;
        }

        $dedicatedRkeAttributes = array_unique(array_merge(
            $this->constProjectRkeAttributes(),
            $this->deskDesignRkeAttributes(),
            $this->lineSurveyRkeAttributes(),
        ));

        foreach ($input as $key => $value) {
            if (!is_string($key)) {
                continue;
            }

            // rke_XXX のみ更新対象（主キー rke_019 は除外）
            if (!preg_match('/^rke_\d{3}$/', $key) || $key === 'rke_019') {
                continue;
            }
            if (in_array($key, $dedicatedRkeAttributes, true)) {
                continue;
            }
            if (is_array($value) || is_object($value)) {
                continue;
            }

            $tRke->{$key} = $value;
        }

        if ($tRke->isDirty()) {
            $tRke->save();
        }
    }

    protected function updateData(TRke $tRke, array $input): void
    {
        $this->updateRke($tRke, $input);
        $this->updateConstProjectInfo($tRke, $input);
        $this->updateDeskDesignInfo($tRke, $input);
        $this->updateKik($tRke, $input);
        $this->updateLineSurveyInfo($tRke, $input);
        $this->updateGkj($tRke, $input);
        $this->updateKhj($tRke, $input);
        $this->updateSkk($tRke, $input);
        $this->updateKsk($tRke, $input);
        $this->updateHouseSurvey($tRke, $input);
        $this->updateHouseConst($tRke, $input);
        $this->updateConstOption($tRke, $input);
        $this->updateSetupRush($tRke, $input);
    }

    protected function updateKik(TRke $tRke, array $input): void
    {
        $attributes = $this->extractScopedInput($input, 'kik', 'kik_001');
        $attributes = array_diff_key($attributes, array_flip($this->deskDesignKikAttributes()));

        if ($attributes === []) {
            return;
        }

        $hasNonEmptyValue = collect($attributes)->contains(
            fn ($value) => !is_null($value) && $value !== ''
        );

        $tKik = $tRke->tKik;

        if (!$tKik) {
            if (!$hasNonEmptyValue) {
                return;
            }

            $tKik = new TKik();
            $tKik->kik_001 = $tRke->rke_019;
        }

        foreach ($attributes as $key => $value) {
            $tKik->{$key} = $value;
        }

        if ($tKik->isDirty()) {
            $tKik->save();
        }
    }

    protected function updateKhj(TRke $tRke, array $input): void
    {
        $attributes = $this->extractScopedInput($input, 'khj', 'khj_001');
        $attributes = array_diff_key($attributes, array_flip(array_merge(
            $this->constProjectKhjAttributes(),
            $this->deskDesignKhjAttributes(),
            $this->lineSurveyKhjAttributes(),
        )));

        if ($attributes === []) {
            return;
        }

        $hasNonEmptyValue = collect($attributes)->contains(
            fn ($value) => !is_null($value) && $value !== ''
        );

        $tKhj = $tRke->tKhj;

        if (!$tKhj) {
            if (!$hasNonEmptyValue) {
                return;
            }

            $tKhj = new TKhj();
            $tKhj->khj_001 = $tRke->rke_019;
        }

        foreach ($attributes as $key => $value) {
            $tKhj->{$key} = $value;
        }

        if ($tKhj->isDirty()) {
            $tKhj->save();
        }
    }

    protected function updateGck(TRke $tRke, array $input): void
    {
        $attributes = $this->extractScopedInput($input, 'gck', 'gck_001');

        if ($attributes === []) {
            return;
        }

        $hasNonEmptyValue = collect($attributes)->contains(
            fn ($value) => !is_null($value) && $value !== ''
        );

        $tGck = $tRke->tGck;

        if (!$tGck) {
            if (!$hasNonEmptyValue) {
                return;
            }

            $tGck = new TGck();
            $tGck->gck_001 = $tRke->rke_019;
        }

        foreach ($attributes as $key => $value) {
            $tGck->{$key} = $value;
        }

        if ($tGck->isDirty()) {
            $tGck->save();
        }
    }

    protected function updateConstProjectInfo(TRke $tRke, array $input): void
    {
        $this->updateConstProjectRke($tRke, $input);
        $this->updateConstProjectKhj($tRke, $input);
    }

    protected function updateConstProjectRke(TRke $tRke, array $input): void
    {
        foreach ($this->constProjectRkeAttributes() as $attribute) {
            if (!array_key_exists($attribute, $input)) {
                continue;
            }

            $value = $input[$attribute];
            if (is_array($value) || is_object($value)) {
                continue;
            }

            $tRke->{$attribute} = $value;
        }

        if ($tRke->isDirty()) {
            $tRke->save();
        }
    }

    protected function updateConstProjectKhj(TRke $tRke, array $input): void
    {
        $attributes = $this->onlyScalarAttributes($input, $this->constProjectKhjAttributes());

        if ($attributes === []) {
            return;
        }

        $hasNonEmptyValue = collect($attributes)->contains(
            fn ($value) => !is_null($value) && $value !== ''
        );

        $tKhj = $tRke->tKhj;

        if (!$tKhj) {
            if (!$hasNonEmptyValue) {
                return;
            }

            $tKhj = new TKhj();
            $tKhj->khj_001 = $tRke->rke_019;
        }

        foreach ($attributes as $key => $value) {
            $tKhj->{$key} = $value;
        }

        if ($tKhj->isDirty()) {
            $tKhj->save();
        }
    }

    protected function constProjectRkeAttributes(): array
    {
        return [
            'rke_155',
            'rke_213',
            'rke_216',
            'rke_217',
            'rke_218',
            'rke_221',
            'rke_222',
        ];
    }

    protected function constProjectKhjAttributes(): array
    {
        return [
            'khj_010',
            'khj_012',
            'khj_013',
            'khj_014',
            'khj_015',
            'khj_016',
            'khj_017',
            'khj_018',
            'khj_019',
            'khj_020',
            'khj_021',
            'khj_022',
            'khj_023',
            'khj_024',
            'khj_025',
            'khj_026',
            'khj_027',
        ];
    }

    protected function updateDeskDesignInfo(TRke $tRke, array $input): void
    {
        $this->updateDeskDesignRke($tRke, $input);
        $this->updateDeskDesignScopedModel($tRke, $input, 'tKik', TKik::class, 'kik_001', $this->deskDesignKikAttributes());
        $this->updateDeskDesignScopedModel($tRke, $input, 'tKhj', TKhj::class, 'khj_001', $this->deskDesignKhjAttributes());
        $this->updateDeskDesignScopedModel($tRke, $input, 'tSkk', TSkk::class, 'skk_001', $this->deskDesignSkkAttributes());
        $this->updateDeskDesignScopedModel($tRke, $input, 'tKsk', TKsk::class, 'ksk_001', $this->deskDesignKskAttributes());
    }

    protected function updateDeskDesignRke(TRke $tRke, array $input): void
    {
        foreach ($this->deskDesignRkeAttributes() as $attribute) {
            if (!array_key_exists($attribute, $input)) {
                continue;
            }

            $value = $input[$attribute];
            if (is_array($value) || is_object($value)) {
                continue;
            }

            $tRke->{$attribute} = $value;
        }

        if ($tRke->isDirty()) {
            $tRke->save();
        }
    }

    protected function updateDeskDesignScopedModel(TRke $tRke, array $input, string $relation, string $model, string $primaryKey, array $allowedAttributes): void
    {
        $attributes = $this->onlyScalarAttributes($input, $allowedAttributes);

        if ($attributes === []) {
            return;
        }

        $hasNonEmptyValue = collect($attributes)->contains(
            fn ($value) => !is_null($value) && $value !== ''
        );

        $record = $tRke->{$relation};

        if (!$record) {
            if (!$hasNonEmptyValue) {
                return;
            }

            $record = new $model();
            $record->{$primaryKey} = $tRke->rke_019;
        }

        foreach ($attributes as $key => $value) {
            $record->{$key} = $value;
        }

        if ($record->isDirty()) {
            $record->save();
        }
    }

    protected function deskDesignRkeAttributes(): array
    {
        return [
            'rke_072',
            'rke_074',
            'rke_076',
            'rke_079',
            'rke_080',
            'rke_081',
            'rke_082',
            'rke_083',
            'rke_088',
            'rke_121',
            'rke_123',
            'rke_124',
            'rke_125',
            'rke_126',
            'rke_127',
            'rke_128',
            'rke_129',
            'rke_130',
            'rke_131',
            'rke_132',
            'rke_133',
            'rke_136',
            'rke_137',
            'rke_138',
            'rke_170',
            'rke_171',
            'rke_172',
            'rke_173',
            'rke_226',
            'rke_227',
        ];
    }

    protected function deskDesignKikAttributes(): array
    {
        return [
            'kik_002',
            'kik_003',
            'kik_004',
            'kik_006',
            'kik_007',
            'kik_008',
        ];
    }

    protected function deskDesignKhjAttributes(): array
    {
        return [
            'khj_026',
            'khj_027',
        ];
    }

    protected function deskDesignSkkAttributes(): array
    {
        return [
            'skk_002',
            'skk_016',
        ];
    }

    protected function deskDesignKskAttributes(): array
    {
        return [
            'ksk_003',
            'ksk_016',
        ];
    }

    protected function updateLineSurveyInfo(TRke $tRke, array $input): void
    {
        $this->updateLineSurveyRke($tRke, $input);
        $this->updateLineSurveyGck($tRke, $input);
        $this->updateLineSurveyKhj($tRke, $input);
    }

    protected function updateLineSurveyRke(TRke $tRke, array $input): void
    {
        foreach ($this->lineSurveyRkeAttributes() as $attribute) {
            if (!array_key_exists($attribute, $input)) {
                continue;
            }

            $value = $input[$attribute];
            if (is_array($value) || is_object($value)) {
                continue;
            }

            $tRke->{$attribute} = $value;
        }

        if ($tRke->isDirty()) {
            $tRke->save();
        }
    }

    protected function updateLineSurveyGck(TRke $tRke, array $input): void
    {
        $attributes = $this->onlyScalarAttributes($input, $this->lineSurveyGckAttributes());

        if ($attributes === []) {
            return;
        }

        $hasNonEmptyValue = collect($attributes)->contains(
            fn ($value) => !is_null($value) && $value !== ''
        );

        $tGck = $tRke->tGck;

        if (!$tGck) {
            if (!$hasNonEmptyValue) {
                return;
            }

            $tGck = new TGck();
            $tGck->gck_001 = $tRke->rke_019;
        }

        foreach ($attributes as $key => $value) {
            $tGck->{$key} = $value;
        }

        if ($tGck->isDirty()) {
            $tGck->save();
        }
    }

    protected function updateLineSurveyKhj(TRke $tRke, array $input): void
    {
        $attributes = $this->onlyScalarAttributes($input, $this->lineSurveyKhjAttributes());

        if ($attributes === []) {
            return;
        }

        $hasNonEmptyValue = collect($attributes)->contains(
            fn ($value) => !is_null($value) && $value !== ''
        );

        $tKhj = $tRke->tKhj;

        if (!$tKhj) {
            if (!$hasNonEmptyValue) {
                return;
            }

            $tKhj = new TKhj();
            $tKhj->khj_001 = $tRke->rke_019;
        }

        foreach ($attributes as $key => $value) {
            $tKhj->{$key} = $value;
        }

        if ($tKhj->isDirty()) {
            $tKhj->save();
        }
    }

    protected function onlyScalarAttributes(array $input, array $allowedAttributes): array
    {
        $attributes = [];

        foreach ($allowedAttributes as $attribute) {
            if (!array_key_exists($attribute, $input)) {
                continue;
            }

            $value = $input[$attribute];
            if (is_array($value) || is_object($value)) {
                continue;
            }

            $attributes[$attribute] = $value;
        }

        return $attributes;
    }

    protected function lineSurveyRkeAttributes(): array
    {
        return [
            'rke_074',
            'rke_077',
            'rke_078',
            'rke_079',
            'rke_080',
            'rke_083',
            'rke_088',
            'rke_100',
            'rke_101',
            'rke_102',
            'rke_104',
            'rke_105',
            'rke_106',
            'rke_108',
            'rke_109',
            'rke_110',
            'rke_111',
            'rke_112',
            'rke_113',
            'rke_114',
            'rke_115',
            'rke_116',
            'rke_117',
            'rke_118',
            'rke_119',
            'rke_120',
            'rke_123',
            'rke_124',
            'rke_125',
            'rke_126',
            'rke_127',
            'rke_128',
            'rke_129',
            'rke_130',
            'rke_131',
            'rke_132',
            'rke_133',
            'rke_134',
            'rke_135',
            'rke_136',
            'rke_137',
            'rke_138',
            'rke_139',
            'rke_140',
            'rke_141',
            'rke_142',
            'rke_143',
            'rke_144',
            'rke_145',
            'rke_146',
            'rke_147',
            'rke_149',
            'rke_150',
            'rke_151',
            'rke_153',
            'rke_154',
            'rke_157',
            'rke_170',
            'rke_171',
            'rke_172',
            'rke_173',
            'rke_226',
            'rke_227',
            'rke_246',
            'rke_268',
            'rke_269',
            'rke_270',
            'rke_271',
            'rke_272',
            'rke_273',
            'rke_274',
        ];
    }

    protected function lineSurveyGckAttributes(): array
    {
        return [
            'gck_002',
            'gck_003',
            'gck_004',
            'gck_005',
            'gck_006',
            'gck_007',
            'gck_008',
            'gck_009',
            'gck_010',
            'gck_011',
            'gck_012',
            'gck_013',
            'gck_014',
            'gck_015',
            'gck_016',
            'gck_017',
            'gck_019',
            'gck_020',
            'gck_022',
            'gck_023',
            'gck_025',
            'gck_026',
            'gck_027',
            'gck_028',
            'gck_029',
            'gck_030',
            'gck_031',
            'gck_039',
            'gck_042',
            'gck_043',
            'gck_044',
            'gck_045',
            'gck_046',
            'gck_047',
            'gck_049',
            'gck_050',
            'gck_051',
            'gck_052',
            'gck_053',
            'gck_054',
            'gck_056',
            'gck_057',
            'gck_058',
            'gck_059',
            'gck_060',
            'gck_061',
            'gck_062',
            'gck_063',
            'gck_064',
        ];
    }

    protected function lineSurveyKhjAttributes(): array
    {
        return [
            'khj_004',
            'khj_005',
            'khj_006',
            'khj_007',
            'khj_008',
            'khj_009',
            'khj_024',
        ];
    }

    protected function updateSkk(TRke $tRke, array $input): void
    {
        $attributes = $this->extractScopedInput($input, 'skk', 'skk_001');
        $attributes = array_diff_key($attributes, array_flip($this->deskDesignSkkAttributes()));

        if ($attributes === []) {
            return;
        }

        $hasNonEmptyValue = collect($attributes)->contains(
            fn ($value) => !is_null($value) && $value !== ''
        );

        $tSkk = $tRke->tSkk;

        if (!$tSkk) {
            if (!$hasNonEmptyValue) {
                return;
            }

            $tSkk = new TSkk();
            $tSkk->skk_001 = $tRke->rke_019;
        }

        foreach ($attributes as $key => $value) {
            $tSkk->{$key} = $value;
        }

        if ($tSkk->isDirty()) {
            $tSkk->save();
        }
    }

    protected function updateGkj(TRke $tRke, array $input): void
    {
        $attributes = $this->extractScopedInput($input, 'gkj', 'gkj_001');

        if ($attributes === []) {
            return;
        }

        $hasNonEmptyValue = collect($attributes)->contains(
            fn ($value) => !is_null($value) && $value !== ''
        );

        $tGkj = $tRke->tGkj;

        if (!$tGkj) {
            if (!$hasNonEmptyValue) {
                return;
            }

            $tGkj = new TGkj();
            $tGkj->gkj_001 = $tRke->rke_019;
        }

        foreach ($attributes as $key => $value) {
            $tGkj->{$key} = $value;
        }

        if ($tGkj->isDirty()) {
            $tGkj->save();
        }
    }

    protected function updateKsk(TRke $tRke, array $input): void
    {
        $attributes = $this->extractScopedInput($input, 'ksk', 'ksk_001');
        $attributes = array_diff_key($attributes, array_flip($this->deskDesignKskAttributes()));

        if ($attributes === []) {
            return;
        }

        $hasNonEmptyValue = collect($attributes)->contains(
            fn ($value) => !is_null($value) && $value !== ''
        );

        $tKsk = $tRke->tKsk;

        if (!$tKsk) {
            if (!$hasNonEmptyValue) {
                return;
            }

            $tKsk = new TKsk();
            $tKsk->ksk_001 = $tRke->rke_019;
        }

        foreach ($attributes as $key => $value) {
            $tKsk->{$key} = $value;
        }

        if ($tKsk->isDirty()) {
            $tKsk->save();
        }
    }

    protected function updateHouseSurvey(TRke $tRke, array $input): void
    {
        $houseSurveyRows = $input['house_survey'] ?? null;

        if (!is_array($houseSurveyRows) || $houseSurveyRows === []) {
            return;
        }

        $isToho = (bool) (Auth::user()?->is_toho ?? false);
        $rkoAttributes = $isToho
            ? ['rko_054', 'rko_075', 'rko_076', 'rko_057', 'rko_058', 'rko_078', 'rko_077', 'rko_067', 'rko_068', 'rko_079', 'rko_080', 'rko_081']
            : ['rko_054', 'rko_067', 'rko_068'];
        $tckAttributes = $isToho
            ? ['tck_003', 'tck_004', 'tck_005', 'tck_012', 'tck_013', 'tck_011', 'tck_010', 'tck_008', 'tck_009']
            : ['tck_005', 'tck_012', 'tck_013', 'tck_011', 'tck_010', 'tck_008', 'tck_009'];

        foreach ($houseSurveyRows as $row) {
            if (!is_array($row)) {
                continue;
            }

            $constCode = $row['rko_001'] ?? null;
            if (!is_string($constCode) || $constCode === '') {
                continue;
            }

            $tRko = TRko::query()
            ->where('rko_039', $tRke->rke_019)
                ->where('rko_001', $constCode)
                ->first();

            if (!$tRko) {
                continue;
            }

            foreach ($rkoAttributes as $attribute) {
                if (!array_key_exists($attribute, $row)) {
                    continue;
                }

                $value = $row[$attribute];
                if (is_array($value) || is_object($value)) {
                    continue;
                }

                $tRko->{$attribute} = $value;
            }

            if ($tRko->isDirty()) {
                $tRko->save();
            }

            $tTck = $tRko->tTck;
            if (!$tTck) {
                $hasNonEmptyTckValue = collect($tckAttributes)->contains(
                    fn ($attribute) => array_key_exists($attribute, $row) && !is_null($row[$attribute]) && $row[$attribute] !== ''
                );

                if (!$hasNonEmptyTckValue) {
                    continue;
                }

                $tTck = new TTck();
                $tTck->tck_001 = $tRko->rko_039;
                $tTck->tck_002 = $tRko->rko_001;
            }

            foreach ($tckAttributes as $attribute) {
                if (!array_key_exists($attribute, $row)) {
                    continue;
                }

                $value = $row[$attribute];
                if (is_array($value) || is_object($value)) {
                    continue;
                }

                $tTck->{$attribute} = $value;
            }

            if ($tTck->isDirty()) {
                $tTck->save();
            }
        }
    }

    protected function updateHouseConst(TRke $tRke, array $input): void
    {
        $houseConstRows = $input['house_const'] ?? null;

        if (!is_array($houseConstRows) || $houseConstRows === []) {
            return;
        }

        $isToho = (bool) (Auth::user()?->is_toho ?? false);
        $rkoAttributes = $isToho
            ? ['rko_054', 'rko_072', 'rko_073', 'rko_074', 'rko_075', 'rko_076', 'rko_057', 'rko_058', 'rko_078', 'rko_077', 'rko_067', 'rko_068', 'rko_079', 'rko_060', 'rko_064', 'rko_065', 'rko_061', 'rko_063', 'rko_059', 'rko_066', 'rko_080', 'rko_081']
            : ['rko_054', 'rko_072', 'rko_073', 'rko_074', 'rko_075', 'rko_076', 'rko_067', 'rko_068'];
        $kkkAttributes = $isToho
            ? ['kkk_003', 'kkk_005', 'kkk_006', 'kkk_019', 'kkk_020', 'kkk_011', 'kkk_010', 'kkk_009', 'kkk_014', 'kkk_012', 'kkk_015', 'kkk_017', 'kkk_018']
            : ['kkk_006', 'kkk_019', 'kkk_020', 'kkk_010', 'kkk_009', 'kkk_014', 'kkk_015', 'kkk_017', 'kkk_018'];

        foreach ($houseConstRows as $row) {
            if (!is_array($row)) {
                continue;
            }

            $constCode = $row['rko_001'] ?? null;
            if (!is_string($constCode) || $constCode === '') {
                continue;
            }

            $tRko = TRko::query()
                ->where('rko_039', $tRke->rke_019)
                ->where('rko_001', $constCode)
                ->first();

            if (!$tRko) {
                continue;
            }

            foreach ($rkoAttributes as $attribute) {
                if (!array_key_exists($attribute, $row)) {
                    continue;
                }

                $value = $row[$attribute];
                if (is_array($value) || is_object($value)) {
                    continue;
                }

                $tRko->{$attribute} = $value;
            }

            if ($tRko->isDirty()) {
                $tRko->save();
            }

            $tKkk = $tRko->tKkk;
            if (!$tKkk) {
                $hasNonEmptyKkkValue = collect($kkkAttributes)->contains(
                    fn ($attribute) => array_key_exists($attribute, $row) && !is_null($row[$attribute]) && $row[$attribute] !== ''
                );

                if (!$hasNonEmptyKkkValue) {
                    continue;
                }

                $tKkk = new TKkk();
                $tKkk->kkk_001 = $tRko->rko_039;
                $tKkk->kkk_002 = $tRko->rko_001;
            }

            foreach ($kkkAttributes as $attribute) {
                if (!array_key_exists($attribute, $row)) {
                    continue;
                }

                $value = $row[$attribute];
                if (is_array($value) || is_object($value)) {
                    continue;
                }

                $tKkk->{$attribute} = $value;
            }

            if ($tKkk->isDirty()) {
                $tKkk->save();
            }
        }
    }

    protected function updateConstOption(TRke $tRke, array $input): void
    {
        $constOptionRows = $input['const_options'] ?? null;

        if (!is_array($constOptionRows) || $constOptionRows === []) {
            return;
        }

        $isToho = (bool) (Auth::user()?->is_toho ?? false);
        $rkoAttributes = $isToho
            ? ['rko_054', 'rko_075', 'rko_076', 'rko_057', 'rko_058', 'rko_078', 'rko_077', 'rko_067', 'rko_068', 'rko_079', 'rko_080', 'rko_081']
            : ['rko_054', 'rko_067', 'rko_068'];
        $okkAttributes = $isToho
            ? ['okk_008', 'okk_003', 'okk_004', 'okk_005', 'okk_014', 'okk_015', 'okk_010', 'okk_011', 'okk_012', 'okk_013', 'okk_016', 'okk_017']
            : ['okk_008', 'okk_005', 'okk_014', 'okk_015', 'okk_010', 'okk_011', 'okk_012', 'okk_013'];

        foreach ($constOptionRows as $row) {
            if (!is_array($row)) {
                continue;
            }

            $constCode = $row['rko_001'] ?? null;
            if (!is_string($constCode) || $constCode === '') {
                continue;
            }

            $tRko = TRko::query()
                ->where('rko_039', $tRke->rke_019)
                ->where('rko_001', $constCode)
                ->first();

            if (!$tRko) {
                continue;
            }

            foreach ($rkoAttributes as $attribute) {
                if (!array_key_exists($attribute, $row)) {
                    continue;
                }

                $value = $row[$attribute];
                if (is_array($value) || is_object($value)) {
                    continue;
                }

                $tRko->{$attribute} = $value;
            }

            if ($tRko->isDirty()) {
                $tRko->save();
            }

            $tOkk = $tRko->tOkk;
            if (!$tOkk) {
                $hasNonEmptyOkkValue = collect($okkAttributes)->contains(
                    fn ($attribute) => array_key_exists($attribute, $row) && !is_null($row[$attribute]) && $row[$attribute] !== ''
                );

                if (!$hasNonEmptyOkkValue) {
                    continue;
                }

                $tOkk = new TOkk();
                $tOkk->okk_001 = $tRko->rko_039;
                $tOkk->okk_002 = $tRko->rko_001;
            }

            foreach ($okkAttributes as $attribute) {
                if (!array_key_exists($attribute, $row)) {
                    continue;
                }

                $value = $row[$attribute];
                if (is_array($value) || is_object($value)) {
                    continue;
                }

                $tOkk->{$attribute} = $value;
            }

            if ($tOkk->isDirty()) {
                $tOkk->save();
            }
        }
    }

    protected function updateSetupRush(TRke $tRke, array $input): void
    {
        $setupRushRows = $input['setup_rush'] ?? null;

        if (!is_array($setupRushRows) || $setupRushRows === []) {
            return;
        }

        $isToho = (bool) (Auth::user()?->is_toho ?? false);
        $rkkAttributes = $isToho
            ? ['rkk_054', 'rkk_075', 'rkk_076', 'rkk_153', 'rkk_151', 'rkk_156', 'rkk_057', 'rkk_058', 'rkk_078', 'rkk_077', 'rkk_067', 'rkk_134', 'rkk_068', 'rkk_155', 'rkk_079', 'rkk_080', 'rkk_152', 'rkk_158', 'rkk_108', 'rkk_109']
            : ['rkk_054', 'rkk_153', 'rkk_151', 'rkk_156', 'rkk_067', 'rkk_134', 'rkk_068', 'rkk_155', 'rkk_152', 'rkk_158'];
        $ktkAttributes = $isToho
            ? ['ktk_017', 'ktk_020', 'ktk_015', 'ktk_018', 'ktk_003', 'ktk_004', 'ktk_005', 'ktk_013', 'ktk_014', 'ktk_010', 'ktk_009', 'ktk_007', 'ktk_008', 'ktk_012']
            : [];

        foreach ($setupRushRows as $row) {
            if (!is_array($row)) {
                continue;
            }

            $constCode = $row['rkk_001'] ?? null;
            if (!is_string($constCode) || $constCode === '') {
                continue;
            }

            $tRkk = TRkk::query()
                ->where('rkk_039', $tRke->rke_019)
                ->where('rkk_001', $constCode)
                ->first();

            if (!$tRkk) {
                continue;
            }

            foreach ($rkkAttributes as $attribute) {
                if (!array_key_exists($attribute, $row)) {
                    continue;
                }

                $value = $row[$attribute];
                if (is_array($value) || is_object($value)) {
                    continue;
                }

                $tRkk->{$attribute} = $value;
            }

            if ($tRkk->isDirty()) {
                $tRkk->save();
            }

            if ($ktkAttributes === []) {
                continue;
            }

            $tKtk = $tRkk->tKtk;
            if (!$tKtk) {
                $hasNonEmptyKtkValue = collect($ktkAttributes)->contains(
                    fn ($attribute) => array_key_exists($attribute, $row) && !is_null($row[$attribute]) && $row[$attribute] !== ''
                );

                if (!$hasNonEmptyKtkValue) {
                    continue;
                }

                $tKtk = new TKtk();
                $tKtk->ktk_001 = $tRkk->rkk_039;
                $tKtk->ktk_002 = $tRkk->rkk_001;
            }

            foreach ($ktkAttributes as $attribute) {
                if (!array_key_exists($attribute, $row)) {
                    continue;
                }

                $value = $row[$attribute];
                if (is_array($value) || is_object($value)) {
                    continue;
                }

                $tKtk->{$attribute} = $value;
            }

            if ($tKtk->isDirty()) {
                $tKtk->save();
            }
        }
    }

    protected function extractScopedInput(array $input, string $prefix, string $primaryKey): array
    {
        $attributes = [];

        foreach ($input as $key => $value) {
            if (!is_string($key)) {
                continue;
            }

            if (!preg_match('/^' . preg_quote($prefix, '/') . '_\d{3}$/', $key) || $key === $primaryKey) {
                continue;
            }

            if (is_array($value) || is_object($value)) {
                continue;
            }

            $attributes[$key] = $value;
        }

        return $attributes;
    }
}
