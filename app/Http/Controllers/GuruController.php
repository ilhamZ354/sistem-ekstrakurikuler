<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class GuruController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(){

        $data = User::where('level', 'guru')->paginate(5);
        return view('layouts.admin.guru.index', compact('data'))->with('i',(request()->input('page', 1) - 1) * 10);
    }

        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create(){
        return view('layouts.admin.guru.input');
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
            'name' => 'required|string|min:3',
            'username' => 'required|string|min:5|unique:users,username',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:5',
        ]);

        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'level' => 'guru',
            'lastSeen' => null
        ]);
        Alert::success('Berhasil', 'Data guru berhasil ditambahkan');
        return redirect()->route('guru.index')->with('success', 'Data guru berhasil ditambahkan.');
    }

        /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(User $guru)
    {
        return view('layouts.admin.guru.edit',compact('guru'));
    }


    public function show(User $guru)
    {
        return $guru;
    }
     /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $guru)
    {


        $request->validate([
            'name' => 'required|string|min:3',
            'username' => 'required|string|min:5',
            'email' => 'required|string|email|max:255',
            'password' => 'nullable|string|min:5',
        ]);

        $input = $request->except(['password']);

        if ($request->filled('password')) {
            $input['password'] = Hash::make($request->password);
        }

        $guru->update($input);

        return redirect()->route('guru.index')
                        ->with('success', 'Data guru berhasil diperbaiki');
    }

        /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $guru)
    {
        $title = 'Hapus guru!';
        $text = "Apa kamu yakin ingin menghapus guru?";
        confirmDelete($title, $text);

        $guru->delete();   
    
        return redirect()->route('guru.index')
                        ->with('success','Guru telah dihapus ');
    }
}
