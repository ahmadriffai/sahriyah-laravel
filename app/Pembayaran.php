<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    protected $table = 'tb_pembayaran';
    public $timestamps = false;
    protected $primaryKey = 'id_pembayaran';
    protected $fillable = ['id_santri','no_pembayaran', 'bulan', 'jumlah', 'id_tagihan','tgl_pembayaran','ket','biaya'];
}
