<?php

namespace App\Http\Controllers\Auth;
use App\Models\Admin;

use Illuminate\Http\Request;

class AuthController
{
    public function login()
    {
        return view('admin.login');
    }

    public function authenticate(Request $request){
        $admin = Admin::whereEmail($request->email)->wherePassword($request->password)->first();
        if($admin){
            return view('admin.dashboard');
        }
        return "salah";
    }
}
