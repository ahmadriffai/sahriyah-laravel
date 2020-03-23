<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    protected $table = 'tb_pembayaran';
    public $timestamps = false;
    protected $primaryKey = 'id_pembayaran';

    protected $fillable = ['id_tagihan','santri_id', 'bulan','tagihan_id','tgl_pembayaran','ket','jumlah'];

    
    public function tagihan(){
        return $this->belongsTo('App\Tagihan');
    }
    
    public function santri(){
        return $this->belongsTo('App\Santri');
    }
}
