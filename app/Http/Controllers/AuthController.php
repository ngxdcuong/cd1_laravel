<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
{
    $credentials = $request->validate([
        'username' => 'required',
        'password' => 'required'
    ]);

    if (Auth::attempt(['username' => $credentials['username'], 'password' => $credentials['password']])) {
        return redirect()->route('dashboard'); // Chuyển hướng sau khi đăng nhập thành công
    }

    return back()->withErrors(['login' => 'Thông tin đăng nhập không chính xác.']);
}


    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
