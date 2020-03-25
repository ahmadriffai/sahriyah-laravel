<?php

namespace App\Http\Controllers;

use App\Kelas;
use Illuminate\Http\Request;
Use Alert;


class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['kelas'] = Kelas::all();
        return view('kelas.index', $data);
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
            'nama_kelas' => 'required'
        ]);

        kelas::create($request->all());
        
        
        Alert::toast('Data Berhasil Ditambahkan','success');
        return redirect('/kelas');

    }

 
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function edit(Kelas $kelas)
    {
        return view('kelas.edit', compact('kelas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kelas $kelas)
    {
        Kelas::where('id_kelas', $kelas->id_kelas)->update([
            'nama_kelas' => $request->nama_kelas
        ]);

        return redirect('/kelas')->with('status','Data kelas Berhasil Diubah');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kelas $kelas)
    {
        Kelas::destroy($kelas->id_kelas);
        Alert::toast('Data Berhasil Dihapus','success');
        return redirect('/kelas');
    }
}
