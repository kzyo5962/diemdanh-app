<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\UserLoginRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function login()
    {
        return view('auth.login');
    }

    public function onLogin(UserLoginRequest $request)
    {
        if (!Auth::attempt($request->only('email', 'password'))) {
            return back()->with('message', 'Tài khoản hoặc mật khẩu không chính xác.');
        }

        $request->session()->regenerate();

        return redirect()->intended('/');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('auth.login')->with('message', 'Bạn đã đăng xuất.');
    }

    public function forbidden()
    {
        return view('errors.403');
    }
}
