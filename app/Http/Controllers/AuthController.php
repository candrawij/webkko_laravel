<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        // Jika sudah login, langsung ke admin panel
        if (Auth::check()) {
            return redirect('/admin');
        }

        return view('login');
    }

    public function authenticate(Request $request)
    {
        // Validasi input
        $credentials = $request->validate([
            'email' => ['required', 'string'],
            'password' => ['required'],
        ]);

        // Coba login (kita menggunakan 'email' sebagai identifier login karena ini default Laravel)
        // Jika user menggunakan "username" di form, kita anggap itu dikirim sebagai field 'email' 
        if (Auth::attempt(['email' => $credentials['email'], 'password' => $credentials['password']])) {
            $request->session()->regenerate();

            return redirect()->intended('/admin');
        }

        // Jika gagal
        return back()->withErrors([
            'loginError' => 'Email/Username atau Password salah!',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
