<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tagihan extends Model
{
    protected $table = 'tb_tagihan';
    public $timestamps = false;
    protected $primaryKey = 'id_tagihan';
    protected $fillable = ['tagihan','biaya'];

    public function pembayaran(){
        return $this->hasMany('App\Pembayaran','id_tagihan');
    }
}
