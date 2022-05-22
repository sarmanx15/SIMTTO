<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{
    public function index()
    {
        return view(
            'auth.index',
            [
                'tittle' => 'Login'
            ]
        );
    }
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            if (auth()->user()->roles == 'Admin') {
                return redirect()->intended('dashboard');
            } elseif (auth()->user()->roles == 'Pasien') {
                return redirect()->route('pasien');
            }
            // Kurang Teknisi
        }
        return back()->with('loginError', 'Login failed');
    }
    public function logout()
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/');
    }
}
