<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Modelpeminjaman extends Model
{
    protected $table="peminjaman";
    protected $primarykey="id";
         protected $fillable = [
        'tgl_pinjam', 'id_anggota', 'id_petugas', 'deadline', 'denda', 
     ];
    public $timestamps=false;
}
