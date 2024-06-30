<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrangtuaLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:orangtua')->except('logout');
    }

    public function showLoginForm()
    {
        return view('auth.loginOrangtua');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'username' => 'required|string',
            'kodeSiswa' => 'required|string',
        ]);

        $credentials = $request->only('username', 'kodeSiswa');

        if (Auth::guard('orangtua')->attempt(['username' => $request->username, 'password' => $request->kodeSiswa])) {
            return redirect()->intended('/orangtua/home');
        }

        return back()->withErrors([
            'credentials' => 'These credentials do not match our records.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::guard('orangtua')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/orangtua/login');
    }
}
