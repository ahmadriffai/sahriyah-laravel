<?php

namespace App\Http\Controllers;

use App\Pembayaran;
use App\Santri;
use App\Tagihan;
use Alert;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pembayaran.index');
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
    public function cari(Request $request)
    {
        $cari = $request->cari;

        
        $santri = Santri::where('nis',$cari)->get();
        
        foreach($santri as $s){
            $data['id_santri'] = $s->id_santri;
        }

        
        $data['tagihan'] = Tagihan::all();




        return view('pembayaran.index', $data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Bayar  $bayar
     * @return \Illuminate\Http\Response
     */
    public function bayar(Santri $santri,Tagihan $tagihan)
    {
        $data['pembayaran'] = Pembayaran::where('id_tagihan',$tagihan->id_tagihan)->where('id_santri',$santri->id_santri)->get();
        $data['santri'] = $santri;
        return view('pembayaran.bayar', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Bayar  $bayar
     * @return \Illuminate\Http\Response
     */
    public function edit(Bayar $bayar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Bayar  $bayar
     * @return \Illuminate\Http\Response
     */
    public function byr(Pembayaran $bayar)
    {
        // no pembayaran
        $tgl = date("Y-m-d");

        $random = strval(rand('100','199'));

        $no_pembayaran = strval($tgl).$random;

        Pembayaran::where('id_pembayaran', $bayar->id_pembayaran)->update([
            'no_pembayaran' => $no_pembayaran,
            'tgl_pembayaran' => $tgl,
            'ket' => 'lunas'
        ]);

        alert()->success('Berhasil','Berhasil Melakukan Pembayaran');
        return redirect('/pembayaran/'.$bayar->id_santri.'/'. $bayar->id_tagihan .'/bayar');  

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Bayar  $bayar
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bayar $bayar)
    {
        //
    }
}
