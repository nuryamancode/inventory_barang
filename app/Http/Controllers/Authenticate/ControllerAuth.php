<?php

namespace App\Http\Controllers\Authenticate;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ControllerAuth extends Controller
{
    public function index()
    {
        return view("auth.login");
    }
    public function login(Request $request)
    {
        $request->validate([
            "username" => "required",
            "password" => "required|min:8"
        ], [
            "username.required" => "Username harus diisi",
            "password.required" => "Password harus diisi",
            "password.min" => "Password harus minimal 8 karakter",
        ]);
        $user = $request->only('username', 'password');
        if (Auth::attempt($user)) {
            $user = auth()->user();
            if ($user->peran == 'Admin') {
                return redirect()->route('admingudang.dashboard');
            } elseif ($user->peran == 'Penjualan') {
                return redirect('');
            } elseif ($user->peran == 'Manager') {
                return redirect('');
            } else {
                Auth::logout();
                return redirect()->back();
            }
        } else {
            return redirect()->back()->with('error', 'Login Bermasalah');
        }
    }
    public function logout()
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect()->route('login');
    }

    public function home()
    {
        if (Auth::check()) {
            if (Auth::user()->peran == 'Admin') {
                return redirect()->route('admingudang.dashboard');
            } elseif (Auth::user()->level == 'Penjualan') {
                return redirect()->route('');
            } elseif (Auth::user()->level == 'Manager') {
                return redirect()->route('');
            } else {
                Auth::logout();
                return redirect()->route('login');
            }
        }
    }
}
