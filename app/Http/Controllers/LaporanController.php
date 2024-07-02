<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use App\Models\Kegiatan;
use App\Models\Orangtua;
use App\Models\SiswaKegiatan;
use App\Models\Siswas;
use App\Notifications\TelegramNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

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
        // return view('layouts.guru.kehadiran.index');
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
        }
        else{
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
        
        foreach ($request->hadir as $key => $value) {
            $ortuList = Orangtua::where('siswa_id', $value)
                ->select('nama', 'id_telegram')
                ->get();
        
            $siswa = Siswas::where('id', $value)
                ->select('name')
                ->first();
        
            $kegiatan = Kegiatan::where('id', $request->kegiatan_id)
                ->select('nama')
                ->first();
        
            foreach ($ortuList as $ortu) {
                $message = "Assalamualaikum, anak anda {$siswa->name} telah hadir pada kegiatan {$kegiatan->nama}";
        
                Notification::route('telegram', $ortu->id_telegram)
                ->notify(new TelegramNotification($message, $ortu));
            }
        }

            return redirect()->back()->with('success', 'Data kehadiran berhasil disimpan.');
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
        $keg = Kegiatan::where('id',$kegiatan)->first();
        $id = $kegiatan;

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
