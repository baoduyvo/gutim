<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('client.pages.login.index');
    }

    public function resgiter(Request $request)
    {
        $users = new User();

        $users->email = $request->email;
        $users->password = bcrypt($request->password);
        $users->full_name = $request->full_name;
        $users->phone = 0;
        $users->status = 1;
        $users->level = 2;

        $users->save();

        return redirect()->route('client.login.index')->with('success', 'Resgiter successful!');
    }

    public function login(Request $request)
    {
        $credentialsMember = [
            'email' => $request->email,
            'password' => $request->password,
            'status' => 1,
            'level' => 2
        ];

        if (Auth::guard('client')->attempt($credentialsMember)) {

            $request->session()->put('id', Auth::guard('client')->user()->id);
            $request->session()->put('username', Auth::guard('client')->user()->full_name);
            $request->session()->put('email', Auth::guard('client')->user()->email);

            return redirect('')->with('success', 'Login successful!');
        } else {
            return redirect()->back();
        }
    }

    public function logout(Request $request)
    {
        if ($request->session()->has('id')) {
            $request->session()->forget('id');
        }
        if ($request->session()->has('username')) {
            $request->session()->forget('username');
        }
        if ($request->session()->has('email')) {
            $request->session()->forget('email');
        }
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('')->with('success', 'Logout successful!');
    }
}
