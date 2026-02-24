<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class MainController extends Controller
{
    public function index($kNo = null, $mNo = null): View
    {
        return view('main.index');
    }

    public function password(): View
    {
        return view('user.password');
    }

}
