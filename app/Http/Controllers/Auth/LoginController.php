<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');

        if (Auth::guard('web')->attempt($credentials)) {
            $user = Auth::guard('web')->user();
            $user->lastSeen = now();
            $user->save();

            $token = $user->createToken('authToken')->plainTextToken;
            return redirect()->intended('/home')->with('token', $token);
        } elseif (Auth::guard('siswas')->attempt($credentials)) {
            $siswa = Auth::guard('siswas')->user();
            $siswa->lastSeen = now();
            $siswa->save();

            $token = $siswa->createToken('authToken')->plainTextToken;
            return redirect()->intended('/home')->with('token', $token);
        }

        return redirect()->back()->withErrors(['login' => 'Invalid credentials']);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
