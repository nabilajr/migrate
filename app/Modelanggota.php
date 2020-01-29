<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Modelanggota extends Model
{
    protected $table="anggota";
    protected $primarykey="id_anggota";
         protected $fillable = [
        'nama_anggota', 'telp', 'alamat', 
     ];
    public $timestamps=false;
}
