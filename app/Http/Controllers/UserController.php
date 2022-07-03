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
}
