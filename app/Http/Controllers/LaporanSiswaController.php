<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use App\Models\Orangtua;
use App\Models\Siswas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LaporanSiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('layouts.orangtua.laporan.index');
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // return $id;
        $ortu = Orangtua::where('id', $id)->first();

        $data = DB::table('laporans')
        ->join('kegiatans', 'laporans.kegiatan_id', '=', 'kegiatans.id')
        ->select(
            'kegiatans.id as kegiatan_id',
            'kegiatans.nama as kegiatan_nama',
            'laporans.pertemuan',
            'laporans.bulan',
            'laporans.isHadir',
            'laporans.nilai'
        )
        ->where('laporans.siswa_id', $ortu->siswa_id)
        ->groupBy('kegiatans.id', 'kegiatans.nama', 'laporans.pertemuan', 'laporans.bulan', 'laporans.isHadir', 'laporans.nilai')
        ->get();

        // return $data;
        return view('layouts.orangtua.laporan.index', compact('data'))->with('i',(request()->input('page', 1) - 1) * 10);;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
