<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Santri extends Model
{
    protected $table = 'tb_santri';
    public $timestamps = false;
    protected $primaryKey = 'id_santri';
    protected $fillable = ['nama','telp_wali','alamat','status','jns_kelamin','tgl_lahir','no_telp','foto'];

    // relasi 
    public function pembayaran(){
        return $this->hasMany('App\Pembayaran', 'id_santri');
    }
   

}
