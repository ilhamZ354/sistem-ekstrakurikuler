<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;



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
            Alert::success('Login berhasil', 'Selamat datang di Sismakul');
            return redirect()->intended('/home')->with('token', $token);
        } elseif (Auth::guard('siswas')->attempt($credentials)) {
            $siswa = Auth::guard('siswas')->user();
            $siswa->lastSeen = now();
            $siswa->save();

            $token = $siswa->createToken('authToken')->plainTextToken;
            Alert::success('Login berhasil', 'Selamat datang di Sismakul');
            return redirect()->intended('/home')->with('token', $token);
            ;
        }

        Alert::error('Login gagal', 'Terdapat kesalahan saat login');
        return redirect()->back();
    }

    public function loginOrangtua(Request $request)
    {
        $credentials = $request->only('kodeSiswa', 'password');

        if (Auth::guard('orangtuas')->attempt($credentials)) {
            $orangtua = Auth::guard('orangtuas')->user();
            $orangtua->lastSeen = now();
            $orangtua->save();

            $token = $orangtua->createToken('authToken')->plainTextToken;
            Alert::success('Login berhasil', 'Selamat datang di Sismakul');
            return redirect()->intended('/home')->with('token', $token);
        }

        Alert::error('Login gagal', 'Terdapat kesalahan saat login');
        return redirect()->back();
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
