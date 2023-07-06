<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $level = auth()->user()->level;
            $request->session()->regenerate();

            if ($level == 1) {
                return redirect()->intended('/admin');
            } else if ($level == 2) {
                return redirect()->intended('/beranda');
            } else {
                return redirect()->intended('/beranda');
            }
        }
        else {
            return redirect('/login')->with('Failed', 'Gagal Login! Email atau Password salah!');
        }
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login')->with('Logout', 'Anda telah logout!');
    }
}
