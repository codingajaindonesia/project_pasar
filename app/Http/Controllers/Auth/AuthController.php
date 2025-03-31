<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function verify(Request $request) {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $credentials = $request->only('username', 'password');

        if (auth()->attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/');
        }
        return back()->with('error', 'Username dan password salah, Silahkan Ulangi Kembali !!!');
        // return back()->withErrors([
        //     'username' => 'The provided credentials do not match our records.',
        // ]);
        
    }

    public function logout(Request $request) {
        auth()->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('login');
    }
}
