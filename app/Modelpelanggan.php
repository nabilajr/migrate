<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Modelanggota extends Model
{
    protected $table="pelanggan";
    protected $primarykey="id_pelanggan";
         protected $fillable = [
        'nama', 'alamat', 'telp', 
     ];
    public $timestamps=false;
}
