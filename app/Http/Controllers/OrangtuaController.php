<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Orangtua;
use App\Models\Siswas;

class OrangtuaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('orangtuas')
            ->leftJoin('siswas', 'orangtuas.siswa_id', '=', 'siswas.id')
            ->select('orangtuas.*', 'siswas.nama as siswa_nama', 'siswas.id as siswa_id')
            ->paginate(15);
    
        return view('layouts.orangtua.index', compact('data'))
            ->with('i', (request()->input('page', 1) - 1) * 15); 
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $siswa = Siswas::all();
        return view('layouts.orangtua.input',['siswa'=>$siswa]);
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
            'username' => 'required|string|min:5',
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:5',
            'no_wa' => 'required|string|min:10',
            'siswa' => 'required|min:1',
        ]);

        $siswa = Siswas::find($request->siswa);

        Orangtua::create([
            'nama' => $request->nama,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'no_wa' => $request->no_wa,
            'siswa_id' =>$request->siswa,
            'kodeSiswa' => $siswa->kode,
            'lastSeen' => null
        ]);

        return redirect()->route('orangtua.index')->with('success', 'Data orangtua berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $orangtua
     * @return \Illuminate\Http\Response
     */
    public function edit(Orangtua $orangtua)
    {
        $siswa = Siswas::all();
        $namaSiswa = Siswas::where('id', $orangtua->siswa_id)->first();
        return view('layouts.orangtua.edit', compact('orangtua', 'siswa', 'namaSiswa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Orangtua $orangtua)
    {
        // return $request;
        $request->validate([
            'nama' => 'required|string|min:3',
            'username' => 'required|string|min:5',
            'email' => 'required|string|email|max:255',
            'no_wa' => 'required|string|min:10',
            'siswa' => 'required|min:1',
        ]);

        $siswa = Siswas::where('id', $request->siswa)->first();

        $input = $request->except(['password']);

        $input['kodeSiswa'] = $siswa->kode;
        $input['siswa_id'] = $request->siswa;

        if ($request->filled('password')) {
            $input['password'] = Hash::make($request->password);
        }

        $orangtua->update($input);

        return redirect()->route('orangtua.index')
                        ->with('success', 'Data orangtua berhasil diperbaiki');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Orangtua $orangtua)
    {
        $orangtua->delete();
    
        return redirect()->route('orangtua.index')
                        ->with('success','Orangtua telah dihapus ');
    }
}
