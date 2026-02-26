<?php

namespace App\Http\Controllers;

use App\Models\MExclusionNumber;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class MainController extends Controller
{
    public function index($kNo = null, $mNo = null): View
    {
        $user = Auth::user();

        // 排他処理
        $mExclusionNumber = MExclusionNumber::query()
            ->with([
                'MUser'
            ])
            ->where('request_number', $kNo)
            ->whereNot('user_id', $user->id)
            ->first();



        return view('main.index')
            ->with(compact(
                'kNo',
                'mNo',
            ));
    }

    public function password(): View
    {
        return view('user.password');
    }

}
