<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailPeminjaman extends Model
{
    protected $table="detail_peminjaman";
    protected $primarykey="id";
         protected $fillable = [
        'id_pinjam', 'id_buku', 'qty', 
     ];
    public $timestamps=false;
}
