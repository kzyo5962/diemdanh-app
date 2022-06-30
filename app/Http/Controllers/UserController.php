<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Http\Requests\UserRegisterRequest;
use App\Http\Requests\UserLoginRequest;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use PhpOffice\PhpSpreadsheet\Shared\OLE\PPS;

class UserController extends Controller
{
    public function index()
    {
        return view('layout.main');
    }
    public function dashboard()
    {
        return view('layout.dashboard');
    }
    public function register()
    {
        return view('users.register');
    }

    public function login()
    {
        return view('users.login');
    }

    public function save(UserRegisterRequest $request)
    {
        $account = new User();
        $account->name = $request->name;
        $account->email = $request->email;
        $account->password = Hash::make($request->password);
        $account->save();
        Toastr::success('Đăng ký tài khoản thành công', 'Success', ["positionClass" => "toast-top-center"]);
        return redirect()->route('login');
    }

    public function authenticate(UserLoginRequest $request)
    {
        if (!Auth::attempt($request->only('email', 'password'))) {
            return back()->with('message', 'Tài khoản hoặc mật khẩu không chính xác.');
        }

        // $request->session()->regenerate();
        return redirect()->intended('/');
    }

    public function logout(Request $request)
    {
        // if (!Auth::check()) {
        //     return redirect()->route('login')->with('message', 'Vui lòng kiểm tra đăng nhập.');
        // }

        Auth::logout();
        return redirect()->route('login')->with('message', 'Bạn đã đăng xuất.');
    }
}
