<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Orangtua;
use App\Models\Siswas;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $guru = User::where('level', 'guru')->select('name', 'lastSeen')->get()->toArray();
        $siswa = Siswas::select('name', 'lastSeen')->get()->toArray();
        $orangtua = Orangtua::select('nama as name', 'lastSeen')->get()->toArray();

        $allUsers = array_merge($guru, $siswa, $orangtua);

        return view('dashboard', compact('allUsers'));
        // return $allUsers;
    }
}
