<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kamar extends Model
{
    protected $table = 'tb_kamar'; 
    public $timestamps = false;
    protected $primaryKey = 'id_kamar';
}
