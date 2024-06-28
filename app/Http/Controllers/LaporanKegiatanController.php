<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use Illuminate\Http\Request;
use App\Models\Kegiatan;
use App\Models\Laporan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class LaporanKegiatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('layouts.admin.laporan.index');
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

        $bulan = $request->bulan;

        $data = DB::table('laporans')
        ->join('kegiatans', 'laporans.kegiatan_id', '=', 'kegiatans.id')
        ->select(
            'kegiatans.id as kegiatan_id',
            'kegiatans.nama as kegiatan_nama',
            'kegiatans.pembimbing as pembimbing',
            'kegiatans.tempat as tempat',
            'kegiatans.jumlah_peserta as total_peserta',
            'laporans.bulan',
            DB::raw('SUM(laporans.isHadir) as total_hadir'),
            DB::raw('COUNT(DISTINCT laporans.pertemuan) as total_pertemuan'),
            DB::raw('AVG(laporans.nilai) as average_nilai'),
        )
        ->where('laporans.bulan', $bulan)
        ->groupBy('kegiatans.id', 'kegiatans.nama', 'kegiatans.pembimbing', 'kegiatans.tempat', 'kegiatans.jumlah_peserta', 'laporans.bulan')
        ->get();

        // return $data;



        // $kegiatan = Kegiatan::with(['jadwal', 'laporan' => function ($query) use ($bulan) {
        //     $query->where('bulan', $bulan);
        // }])->get();

        // // if(!$kegiatan){
        // //     return 'tidak ada';
        // // }

        // $kegiatan = $kegiatan->map(function ($item) {
        //     $item->jumlah_pertemuan = $item->jadwal->count();
        //     $item->total_siswa = $item->laporan->sum('siswa_id');
        //     $item->total_nilai = $item->laporan->sum('nilai');
        //     return $item;
        // });

        // return $kegiatan;

        return view('layouts.admin.laporan.index', compact('data'))->with('i',(request()->input('page', 1) - 1) * 10);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
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
