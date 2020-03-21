<?php

namespace App\Http\Controllers;

use App\Tagihan;
use Illuminate\Http\Request;

class TagihanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['tagihan'] = Tagihan::all();

        return view('tagihan.index', $data);
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
        $request->validate([
            'tagihan' => 'required',
            'biaya' => 'required'
        ]);

        Tagihan::create($request->all());

        return redirect('/tagihan')->with('status','Data Berhasil Ditambahkan');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Tagihan  $tagihan
     * @return \Illuminate\Http\Response
     */
    public function show(Tagihan $tagihan)
    {
        //
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tagihan  $tagihan
     * @return \Illuminate\Http\Response
     */
    public function edit(Tagihan $tagihan)
    {
        return view('tagihan.edit', compact('tagihan'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tagihan  $tagihan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tagihan $tagihan)
    {
        Tagihan::where('id_tagihan', $tagihan->id_tagihan)->update([
            'tagihan' => $request->tagihan,
            'biaya' => $request->biaya
            
            ]);
            
        return redirect('/tagihan')->with('status','Data Berhasil Diubah');

    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tagihan  $tagihan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tagihan $tagihan)
    {
        Tagihan::destroy($tagihan->id_tagihan);
        
        return redirect('/tagihan')->with('status','Data Berhasil Dihapus');

    }
}
