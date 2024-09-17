<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController
{
    public function register()
    {
        return view("customer.register");
    }

    public function registration(Request $request)
    {
        User::create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => bcrypt($request->password),
        ]);

        return view("customer.login");
    }

    public function login()
    {
        if (Auth::check()) {
            return view("welcome");
        }

        return view("customer.login");
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            "email" => "required",
            "password" => "required"
        ]);

        if (Auth::attempt($credentials)) {
            return redirect()->route("welcome");
        }

        return response()->json([
            "message" => "failed",
        ]);
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route("login");
    }
}
