<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kegiatan;
use App\Models\SiswaKegiatan;

class EkskulController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = auth()->guard('siswas')->user()->id;
        $param = SiswaKegiatan::where('siswa_id',$id)->get();
        // return $param;
        $data = Kegiatan::paginate(5);
        return view('layouts.siswa.kegiatan.index', compact('data','param'))->with('i',(request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
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

        $request->validate([
            'siswa_id' => 'required|integer|min:1',
            'kegiatan_id' => 'required|integer|min:1',
        ]);

        SiswaKegiatan::create([
            'siswa_id' => $request->siswa_id,
            'kegiatan_id' => $request->kegiatan_id,
        ]);

        return redirect()->route('kegiatan-siswa.index')->with('success', 'Pendaftaran berhasil berhasil.');
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
    public function destroy($siswaKegiatan)
    {
        $hapus = SiswaKegiatan::where('kegiatan_id',$siswaKegiatan)->first();
        $hapus->delete();
    
        return redirect()->route('kegiatan-siswa.index')
                        ->with('success','Pendaftaran telah dibatalkan');

        // return $hapus;
    }
}
