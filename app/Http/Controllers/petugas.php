<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Modelpetugas;
use Auth;

class petugas extends Controller
{
     public function index()
    {
        $data['datas']=Modelpetugas::all();
    }
}
}
