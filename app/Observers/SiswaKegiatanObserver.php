<?php

namespace App\Observers;

use App\Models\SiswaKegiatan;
use App\Models\Kegiatan;
use Illuminate\Support\Facades\Log;

class SiswaKegiatanObserver
{
    public function created(SiswaKegiatan $siswaKegiatan)
    {
        Log::info('SiswaKegiatan created', ['siswa_kegiatan_id' => $siswaKegiatan->id]);
        $kegiatan = Kegiatan::find($siswaKegiatan->kegiatan_id);
        if ($kegiatan) {
            $kegiatan->increment('jumlah_peserta');
            Log::info('Jumlah peserta incremented', ['kegiatan_id' => $kegiatan->id, 'jumlah_peserta' => $kegiatan->jumlah_peserta]);
        } else {
            Log::warning('Kegiatan not found', ['kegiatan_id' => $siswaKegiatan->kegiatan_id]);
        }
    }

    public function deleted(SiswaKegiatan $siswaKegiatan)
    {
        Log::info('SiswaKegiatan deleted', ['siswa_kegiatan_id' => $siswaKegiatan->id]);
        $kegiatan = Kegiatan::find($siswaKegiatan->kegiatan_id);
        if ($kegiatan && $kegiatan->jumlah_peserta > 0) {
            $kegiatan->decrement('jumlah_peserta');
            Log::info('Jumlah peserta decremented', ['kegiatan_id' => $kegiatan->id, 'jumlah_peserta' => $kegiatan->jumlah_peserta]);
        } else {
            Log::warning('Kegiatan not found or jumlah_peserta already zero', ['kegiatan_id' => $siswaKegiatan->kegiatan_id]);
        }
    }
}

