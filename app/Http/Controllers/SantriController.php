<?php

namespace App\Http\Controllers;

use Alert;
use App\Santri;
use App\Kelas;
use App\Kamar;
use App\Tagihan;
use App\Pembayaran;
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
        $data['santri'] = Santri::where('nis','!=',null)->paginate(10); 

        return view('santri.index', $data);
    }

    public function cari(Request $request){

        $cari = $request->cari;

        $data['santri'] = Santri::where('nama','like','%'. $cari .'%')->orwhere('nis','like','%'. $cari .'%')->paginate(10); 
        return view('santri.index', $data);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function daftar()
    {
        $data['kelas'] = Kelas::all();
        $data['kamar'] = Kamar::all();
        return view('santri.daftar', $data);
    }

    public function baru()
    {
        $data['santri'] = Santri::where('nis',null)->paginate(10); 

        return view('santri.baru',$data);
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
            'alamat' => 'required',
            'jns_kelamin' => 'required',
            'telp_wali' => 'required',
            'tgl_lahir' => 'required|date',
            'no_telp' => 'required'
        ]);
 
       
        // Insert Santri
        $santri = new Santri;
        $santri->nama = $request->nama;
        $santri->alamat = $request->nama;
        $santri->jns_kelamin = $request->jns_kelamin;
        $santri->telp_wali = $request->telp_wali;
        $santri->tgl_lahir = $request->tgl_lahir;
        $santri->no_telp = $request->no_telp;
        
        $santri->save();

        // Insert Pembayaran
        $s = Santri::orderBy('id_santri','desc')->take(1)->get();
        foreach($s as $sa){
            $id_santri = $sa->id_santri;
            $jk = $sa->jns_kelamin;

        }

        
        $tagihan = Tagihan::where('bulanan','y')->where('tosantri',$jk)->get();
        $tagihant = Tagihan::where('bulanan','t')->where('tosantri',$jk)->get();       
       
        $bulan = [
            'januari',
            'februari',
            'maret',
            'april',
            'mei',
            'juni',
            'juli',
            'agustus',
            'september',
            'oktober',
            'november',
            'desember'
        ];

        for($j = 0; $j < count($tagihan); $j++){
            for($i = 0; $i < count($bulan); $i++){
                $pembayaran = new Pembayaran;
                $pembayaran->id_santri = $id_santri;
                $pembayaran->bulan = $bulan[$i];
                $pembayaran->id_tagihan = $tagihan[$j]->id_tagihan;
               
                $pembayaran->ket = 'Belum Lunas';
                $pembayaran->jumlah = $tagihan[$j]->biaya;;
        
                $pembayaran->save();
            }
        }

        for($k = 0; $k < count($tagihant); $k++){
           
                $pembayaran = new Pembayaran;
                $pembayaran->id_santri = $id_santri;
                $pembayaran->id_tagihan = $tagihant[$k]->id_tagihan;
               
                $pembayaran->ket = 'Belum Lunas';
                $pembayaran->jumlah = $tagihant[$k]->biaya;;
        
                $pembayaran->save();
            
        }
        
        // Insert Pembayaran
        alert()->success('Berhasil','Berhasil Melakukan Pendaftaran');

        return redirect('/almanshur/daftar');
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

    public function acc(Santri $santri)
    {
        $kelas = Kelas::all();
        $kamar = Kamar::all();
        
        return view('santri.acc', ['kelas' => $kelas, 'kamar' => $kamar, 'santri' => $santri]);
    }

    public function update(Request $request, Santri $santri)
    {

        
        $request->validate([
            'nama' => 'required',
            'nis' => 'required|size:5|unique:tb_santri,nis',
            'alamat' => 'required',
            'jns_kelamin' => 'required',
            'id_kelas' => 'required',
            'id_kamar' => 'required',
            'telp_wali' => 'required',
            'status' => 'required',
            'no_telp' => 'required'
        ]);

        Santri::where('id_santri', $santri->id_santri)->update([
            'nama' => $request->nama,
            'nis' => $request->nis,
            'alamat' => $request->alamat,
            'jns_kelamin' => $request->jns_kelamin,
            'id_kelas' => $request->id_kelas,
            'id_kamar' => $request->id_kamar,
            'telp_wali' => $request->telp_wali,
            'no_telp' => $request->no_telp,
            'status' => $request->status,
        ]);


        alert()->toast('Data Berhasil Diubah','success');
        return redirect()->back();    
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

        Pembayaran::where('id_santri',$santri->id_santri)->delete();
        
        alert()->toast('Data Berhasil Dihapus','success');

        return redirect()->back();

    }

}
