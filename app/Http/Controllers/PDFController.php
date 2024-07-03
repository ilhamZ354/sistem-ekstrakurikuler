<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
class PDFController extends Controller
{
    public function cetakPDF(Request $request)
    {
        // return $request;
        $bulan = $request->bulan;
        $reqData = $request;

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
        ->get()
        ->toArray();

        // return $data;
        $pdf = PDF::loadView('pdf.template', ['data' => $data]);
        return $pdf->download('data-kegiatan.pdf');
        // return view('pdf.template', ['data' => $data]);

    }
}
