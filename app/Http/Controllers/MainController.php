<?php

namespace App\Http\Controllers;

use App\Models\MExclusionNumber;
use App\Models\TRkk;
use App\Models\TRko;
use App\Models\VBasicInfo;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

        if ($kNo || $mNo) {
            $requestNumber = $kNo;

            // 工事手配コードから回線依頼番号を取得
            if ($mNo) {
                $requestNumber = $this->getRequestNumber($mNo);
            }
            if (!$requestNumber) {
                return redirect()->route('main.index')->with('error', "データが存在しません。");
            }

            // データが存在するかチェックを行う
            if (!$this->exists($requestNumber)) {
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
            ));
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
}
