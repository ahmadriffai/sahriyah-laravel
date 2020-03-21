<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kamar extends Model
{
    protected $table = 'tb_kamar'; 
    public $timestamps = false;
    protected $primaryKey = 'id_kamar';
    protected $fillable = ['nama_kamar', 'bapak_kamar', 'kuota']; 
}
