<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\Kegiatan;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Kegiatan::paginate(5);
        return view('layouts.guru.jadwal.index', compact('data'))->with('i',(request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $param =$id;
        // return "Nilai parameter 'id' adalah: " . $id;
        return view('layouts.guru.jadwal.input', compact('param'));
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
            'kegiatanId' => 'required|integer|min:1',
            'jumlahPertemuan' => 'required|integer|min:1',
            'hari' => 'required|string|min:3',
            'waktu' => 'required',
        ]);

        Jadwal::create([
            'kegiatan_id' => $request->kegiatanId,
            'jumlah_pertemuan' => $request->jumlahPertemuan,
            'hari' => $request->hari,
            'waktu' =>$request->waktu,
        ]);

        return redirect()->route('jadwal.show',$request->kegiatanId)
        ->with('success', 'Data jadwal berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @param  \App\Models\Kegiatan  $kegiatan
     * @return \Illuminate\Http\Response
     */
    public function show($kegiatan)
    {
        $data = Kegiatan::where('id', $kegiatan)->first();
        $jadwal = Jadwal::where('kegiatan_id', $kegiatan)->first();
        return view('layouts.guru.jadwal.show', compact('data','jadwal'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Jadwal $jadwal)
    {
        return view('layouts.guru.jadwal.edit',compact('jadwal'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Jadwal $jadwal)
    {
        $request->validate([
            'jumlahPertemuan' => 'required|integer|min:1',
            'hari' => 'required|string|min:3',
            'waktu' => 'required',
        ]);

        $jadwal->update($request->all());

        return redirect()->route('jadwal.index')
        ->with('success', 'Data kegiatan berhasil diperbaiki');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jadwal $jadwal)
    {
        $jadwal->delete();

        return redirect()->route('jadwal.index')
                        ->with('success','Guru telah dihapus ');
    }
}
