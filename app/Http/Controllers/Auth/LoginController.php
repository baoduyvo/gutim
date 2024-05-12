<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            return redirect()->back();
        }
        return view('auth.login');
    }
    public function store(LoginRequest $request)
    {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
            'status' => 1,
            'level' => 1
        ];

        if (Auth::attempt($credentials)) {
            return redirect()->route('admin.dashboard.index');
        } else {
            return redirect()->back();
        }
    }
}
