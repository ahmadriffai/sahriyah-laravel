<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Santri extends Model
{
    protected $table = 'tb_santri';
    public $timestamps = false;
    protected $primaryKey = 'id_santri';
    protected $fillable = ['nama','nis','telp_ortu','alamat','id_kelas','id_kamar','status','jns_kelamin'];

}
