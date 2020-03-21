<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    protected $table = 'tb_kelas'; 
    public $timestamps = false;
    protected $primaryKey = 'id_kelas';
    protected $fillable = ['nama_kelas'];
}
