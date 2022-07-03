<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Http\Requests\UserRegisterRequest;
use Brian2694\Toastr\Facades\Toastr;

class RegisterController extends Controller
{
    public function register()
    {
        return view('auth.register');
    }


    public function onRegister(UserRegisterRequest $request)
    {
        $account = new User();
        $account->name = $request->name;
        $account->email = $request->email;
        $account->password = Hash::make($request->password);
        $account->save();
        Toastr::success('Đăng ký tài khoản thành công', 'Success', ["positionClass" => "toast-top-center"]);
        return redirect()->route('auth.login');
    }
}
