<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use App\Models\Kegiatan;
use App\Models\SiswaKegiatan;
use App\Models\Siswas;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Kegiatan::paginate(5);
        return view('layouts.guru.kehadiran.index', compact('data'))->with('i',(request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request;

        if(!$request->hadir){
            $id = $request->kegiatan_id;
            $kegiatanSiswa = SiswaKegiatan::where('kegiatan_id',$id)->get();
            $keg = Kegiatan::where('id',$id)->first();
            // return $kegiatanSiswa;

            $siswaId = $kegiatanSiswa->pluck('siswa_id')->toArray();
            $data = Siswas::whereIn('id', $siswaId)->get();

            $dataReq = $request;
            $param = Laporan::where('kegiatan_id', $id)->get();
            // return $param;

            return view('layouts.guru.kehadiran.show', compact('data','keg', 'id','dataReq', 'param'))->with('i',(request()->input('page', 1) - 1) * 10);
        }else{
        $request->validate([
            'hadir' => 'required',
            'bulan' => 'required|string',
            'pertemuan' => 'required|integer|min:1',
            'kegiatan_id' => 'required|integer|min:1',
        ]);

        foreach ($request->hadir as $key => $value) {
            Laporan::create([
                'siswa_id' => $value,
                'bulan' => $request->bulan,
                'pertemuan' => $request->pertemuan,
                'kegiatan_id' => $request->kegiatan_id,
                'isHadir' =>true,
            ]);
        }

        return back()->with('success', 'Data kehadiran berhasil ditambahkan.');
    }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Laporan  $laporan
     * @return \Illuminate\Http\Response
     */
    public function show($kegiatan)
    {
        // $kegiatanSiswa = SiswaKegiatan::where('kegiatan_id',$kegiatan)->get();
        $keg = Kegiatan::where('id',$kegiatan)->first();
        $id = $kegiatan;
        // // return $kegiatanSiswa;

        // $siswaId = $kegiatanSiswa->pluck('siswa_id')->toArray();
        // $data = Siswas::whereIn('id', $siswaId)->get();
        // // return $data;

        // return view('layouts.guru.kehadiran.show', compact('data','keg', 'id'))->with('i',(request()->input('page', 1) - 1) * 10);
        return view('layouts.guru.kehadiran.show', compact('keg','id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Laporan  $laporan
     * @return \Illuminate\Http\Response
     */
    public function edit(Laporan $laporan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Laporan  $laporan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Laporan $laporan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Laporan  $laporan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Laporan $laporan)
    {
        //
    }
}
