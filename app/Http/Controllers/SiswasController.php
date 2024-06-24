<?php

namespace App\Http\Controllers;

use App\Models\Siswas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SiswasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Siswas::paginate(5);
        return view('layouts.siswa.index', compact('data'))->with('i',(request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layouts.siswa.input');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|min:3',
            'username' => 'required|string|min:5|unique:users,username',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:5',
            'kelas' => 'required|string',
            'kode' => 'required|string|min:2',
        ]);

        Siswas::create([
            'nama' => $request->nama,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'kelas' => $request->kelas,
            'kode' => $request->kode,
            'lastSeen' => null
        ]);

        return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Siswas  $siswas
     * @return \Illuminate\Http\Response
     */
    public function show(Siswas $siswas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Siswas  $siswas
     * @return \Illuminate\Http\Response
     */
    public function edit(Siswas $siswa)
    {
        return view('layouts.siswa.edit',compact('siswa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Siswas  $siswas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Siswas $siswa)
    {
        $request->validate([
            'nama' => 'required|string|min:3',
            'username' => 'required|string|min:5|unique:users,username',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:5',
            'kelas' => 'required|string',
            'kode' => 'required|string|min:2',
            'password' => 'nullable|string|min:5',
        ]);

        $input = $request->except(['password']);

        if ($request->filled('password')) {
            $input['password'] = Hash::make($request->password);
        }

        $siswa->update($input);

        return redirect()->route('siswa.index')
                        ->with('success', 'Data siswa berhasil diperbaiki');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Siswas  $siswas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Siswas $siswa)
    {
        $siswa->delete();
    
        return redirect()->route('siswa.index')
                        ->with('success','Siswa telah dihapus ');
    }
}