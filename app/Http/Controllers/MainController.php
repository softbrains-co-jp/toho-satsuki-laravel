<?php

namespace App\Http\Controllers;

use App\Models\MExclusionNumber;
use App\Models\TGck;
use App\Models\TGkj;
use App\Models\TKhj;
use App\Models\TKik;
use App\Models\TKsk;
use App\Models\TTck;
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
        foreach ($input as $key => $value) {
            if (!is_string($key)) {
                continue;
            }

            // rke_XXX のみ更新対象（主キー rke_019 は除外）
            if (!preg_match('/^rke_\d{3}$/', $key) || $key === 'rke_019') {
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
        $this->updateKik($tRke, $input);
        $this->updateGck($tRke, $input);
        $this->updateGkj($tRke, $input);
        $this->updateKhj($tRke, $input);
        $this->updateSkk($tRke, $input);
        $this->updateKsk($tRke, $input);
        $this->updateHouseSurvey($tRke, $input);
        $this->updateHouseConst($tRke, $input);
    }

    protected function updateKik(TRke $tRke, array $input): void
    {
        $attributes = $this->extractScopedInput($input, 'kik', 'kik_001');

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

    protected function updateSkk(TRke $tRke, array $input): void
    {
        $attributes = $this->extractScopedInput($input, 'skk', 'skk_001');

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
