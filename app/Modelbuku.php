<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Modelbuku extends Model
{
     protected $table="buku";
    protected $primarykey="id_buku";
     protected $fillable = [
        'judul', 'pengarang', 'penerbit', 'foto',
     ];
    public $timestamps=false;
}
