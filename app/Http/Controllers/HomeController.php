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
        $guru = User::where('level', 'guru')->select('name as nama', 'lastSeen')->get()->toArray();
        $siswa = Siswas::select('nama', 'lastSeen')->get()->toArray();
        $orangtua = Orangtua::select('nama', 'lastSeen')->get()->toArray();

        $allUsers = array_merge($guru, $siswa, $orangtua);
        $data = collect($allUsers)->sortByDesc('lastSeen')->values()->all();

        return view('dashboard', compact('allUsers'));
    }
}
