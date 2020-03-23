<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Modeltransaksi extends Model
{
    protected $table="jenis_cuci";
    protected $primarykey="id";
    protected $fillable = [
        'id_pelanggan', 'id_petugas', 'tgl_transaksi', 'tgl_selesai',
     ];
    public $timestamps=false;
}
