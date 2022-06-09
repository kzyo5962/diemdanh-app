<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Http\Requests\UserRegisterRequest;
use Brian2694\Toastr\Facades\Toastr;

class UserController extends Controller
{
    public function register()
    {
        return view('users.register');
    }

    public function login()
    {
        return view('users.login');
    }

    public function store(UserRegisterRequest $request) {
        $DEFAULT_ROLE = 1;
        $account = new User();
        $account->name = $request->name;
        $account->email = $request->email;
        $account->password = Hash::make($request->password);
        $account->role_id = $DEFAULT_ROLE;

        $account->save();
        Toastr::success('Đăng ký tài khoản thành công', 'Success', ["positionClass" => "toast-top-center"]);
        return redirect()->route('login');
    }

}
