<?php

namespace App\Http\Controllers;

use App\Santri;
use App\Kelas;
use App\Kamar;
use Illuminate\Http\Request;

class SantriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['santri'] = Santri::all();
        

        return view('santri.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['kelas'] = Kelas::all();
        $data['kamar'] = Kamar::all();
        return view('santri.create', $data);
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
            'nama' => 'required',
            'nis' => 'required|size:5',
            'alamat' => 'required',
            'jns_kelamin' => 'required',
            'id_kelas' => 'required',
            'id_kamar' => 'required',
            'telp_ortu' => 'required',
        ]);

        Santri::create($request->all());
        return redirect('/santri')->with('status','Data Santri Berhasil Ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Santri  $santri
     * @return \Illuminate\Http\Response
     */
    public function show(Santri $santri)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Santri  $santri
     * @return \Illuminate\Http\Response
     */
    public function edit(Santri $santri)
    {
        $kelas = Kelas::all();
        $kamar = Kamar::all();
        
        return view('santri.edit', ['kelas' => $kelas, 'kamar' => $kamar, 'santri' => $santri]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Santri  $santri
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Santri $santri)
    {

        
        $request->validate([
            'nama' => 'required',
            'nis' => 'required|size:5',
            'alamat' => 'required',
            'jns_kelamin' => 'required',
            'id_kelas' => 'required',
            'id_kamar' => 'required',
            'telp_ortu' => 'required',
            'status' => 'required'
        ]);

        Santri::where('id_santri', $santri->id_santri)->update([
            'nama' => $request->nama,
            'nis' => $request->nis,
            'alamat' => $request->alamat,
            'jns_kelamin' => $request->jns_kelamin,
            'id_kelas' => $request->id_kelas,
            'id_kamar' => $request->id_kamar,
            'telp_ortu' => $request->telp_ortu,
            'status' => $request->status,
        ]);

        return redirect('/santri')->with('status','Data Santri Berhasil Diubah');    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Santri  $santri
     * @return \Illuminate\Http\Response
     */
    public function destroy(Santri $santri)
    {
        Santri::destroy($santri->id_santri);

        return redirect('/santri')->with('status','Data Santri Berhasil Dihapus');

    }
}
