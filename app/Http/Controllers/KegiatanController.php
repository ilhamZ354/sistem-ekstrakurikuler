<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use Illuminate\Http\Request;

class KegiatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Kegiatan::paginate(5);
        return view('layouts.kegiatan.index', compact('data'))->with('i',(request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layouts.kegiatan.input');
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
            'deskripsi' => 'required|string|max:255',
            'tempat' => 'required|string|min:3',
            'pembimbing' => 'required|string|min:3',
        ]);

        Kegiatan::create([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'tempat'=> $request->tempat,
            'pembimbing' => $request->pembimbing,
            'jumlah_peserta' => null,
        ]);

        return redirect()->route('kegiatan.index')
        ->with('success', 'Data orangtua berhasil ditambahkan.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kegiatan  $kegiatan
     * @return \Illuminate\Http\Response
     */
    public function show(Kegiatan $kegiatan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kegiatan  $kegiatan
     * @return \Illuminate\Http\Response
     */
    public function edit(Kegiatan $kegiatan)
    {
        return view('layouts.kegiatan.edit',compact('kegiatan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kegiatan  $kegiatan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kegiatan $kegiatan)
    {
        $request->validate([
            'nama' => 'required|string|min:3',
            'deskripsi' => 'required|string|max:255',
            'tempat' => 'required|string|min:3',
            'pembimbing' => 'required|string|min:3',
        ]);

        $kegiatan->update($request->all());

        return redirect()->route('kegiatan.index')
        ->with('success', 'Data kegiatan berhasil diperbaiki');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kegiatan  $kegiatan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kegiatan $kegiatan)
    {
        $kegiatan->delete();
    
        return redirect()->route('kegiatan.index')
                        ->with('success','Kegiatan telah dihapus ');
    }
}
