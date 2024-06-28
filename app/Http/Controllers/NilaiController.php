<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kegiatan;
use App\Models\Laporan;

class NilaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Kegiatan::paginate(5);
        return view('layouts.guru.penilaian.index', compact('data'))->with('i',(request()->input('page', 1) - 1) * 10);
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
        if(!$request->nilai) {
            $data = Laporan::where('kegiatan_id', $request->kegiatan_id)
                ->where('bulan', $request->bulan)
                ->where('pertemuan', $request->pertemuan)
                ->leftJoin('siswas', 'laporans.siswa_id', '=', 'siswas.id')
                ->select('laporans.*', 'siswas.name as siswa_name', 'siswas.email as siswa_email', 'siswas.kelas as siswa_kelas')
                ->get();
    
            $id = $request->kegiatan_id;
            $keg = Kegiatan::where('id', $id)->first();
            $dataReq = $request;
            $param = Laporan::where('kegiatan_id', $id)->get();
            // return $data;
            return view('layouts.guru.penilaian.show', compact('data', 'keg', 'id', 'dataReq','param'))
                ->with('i', (request()->input('page', 1) - 1) * 10);
        }else{
            // return $request;

            $request->validate([
                'nilai' => 'required|array',
                'nilai.*' => 'nullable|numeric',
                'bulan' => 'required|string',
                'pertemuan' => 'required|integer|min:1',
                'kegiatan_id' => 'required|integer|min:1',
            ]);
        
            $nilai = $request->input('nilai');
        
            foreach ($nilai as $siswa_id => $value) {
                Laporan::updateOrCreate(
                    [
                        'siswa_id' => $siswa_id,
                    ],
                    [
                        'nilai' => $value,
                        'isHadir' => true
                    ]
                );
            }

            return redirect()->back()->with('success', 'Data nilai berhasil disimpan.');
        
        }
    }
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($kegiatan)
    {
        $keg = Kegiatan::where('id',$kegiatan)->first();
        $id = $kegiatan;

        return view('layouts.guru.penilaian.show', compact('keg','id'));
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
