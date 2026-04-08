<?php

namespace App\Http\Controllers;

use App\Models\MExclusionNumber;
use App\Models\TKhj;
use App\Models\TKik;
use App\Models\TKsk;
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
    public function index($kNo = null, $mNo = null)
    {
        $user = Auth::user();
        $mExclusionNumber = null;
        $isReadOnly = true;
        $requestNumber = null;
        $tRke = null;

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
        }

        return view('main.index')
            ->with(compact(
                'kNo',
                'mNo',
                'requestNumber',
                'mExclusionNumber',
                'isReadOnly',
                'tRke',
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
                return redirect()->route('main.search-m', ['nNo' => $mNo])->with('success', "保存しました。");
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
        $this->updateKhj($tRke, $input);
        $this->updateSkk($tRke, $input);
        $this->updateKsk($tRke, $input);
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
