<?php

namespace App\Http\Controllers;

use App\Kamar;
use Illuminate\Http\Request;

class KamarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['kamar'] = Kamar::all();
        return view('kamar.index', $data);
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
            'nama_kamar' => 'required',
            'bapak_kamar' => 'required',
            'kuota' => 'required'
        ]);

        Kamar::create($request->all());

        return redirect('/kamar')->with('status','Data Kamar Berhasil Ditambahkan');
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Kamar  $santri
     * @return \Illuminate\Http\Response
     */
    public function edit(Kamar $kamar)
    {
        return view('kamar.edit', compact('kamar'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Santri  $santri
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kamar $kamar)
    {

        $request->validate([
            'nama_kamar' => 'required',
            'bapak_kamar' => 'required',
            'kuota' => 'required'
        ]);


        Kamar::where('id_kamar', $kamar->id_kamar)->update([
            'nama_kamar' => $request->nama_kamar,
            'bapak_kamar' => $request->bapak_kamar,
            'kuota' => $request->kuota,
        ]);

        return redirect('/kamar')->with('status','Data Kamar Berhasil Diupdate');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Santri  $santri
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kamar $kamar)
    {
        Kamar::destroy($kamar->id_kamar);

        return redirect('/kamar')->with('status','Data Kamar Berhasil Dihapus');
    }
}
