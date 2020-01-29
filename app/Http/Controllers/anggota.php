<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Modelanggota;

class anggota extends Controller
{
    public function store(Request $req)
    {
        $validator = Validator::make($req->all(), 
        [
            'nama_anggota' => 'required',
            'alamat' => 'required',
            'telp'=> 'required',
        ]);

        if($validator->fails()){
            return Response()->json($validator->errors());
        }

        $anggota = Modelanggota::create([
            'nama_anggota' => $req->nama_anggota,
            'alamat' => $req->alamat,
            'telp'=> $req->telp,
        ]);
        if($anggota){
            return Response()->json(['status'=>1,'message'=>'Data Anggota berhasil ditambahkan!']);
        }
        else{
            return Response()->json(['status'=>0,'message'=>'Data Anggota tidak berhasil ditambahkan!']);
        }
    }

    public function update($id, Request $req)
    {
        $validator=Validator::make($req->all(),
        [
            'nama_anggota' => 'required',
            'alamat' => 'required',
            'telp'=> 'required',
        ]);
        if($validator->fails()){
            return Response()->json($validator->errors());
        }
        $anggota=Modelanggota::where('id',$id)->update([
            'nama_anggota' => $req->nama_anggota,
            'alamat' => $req->alamat,
            'telp'=> $req->telp,
        ]);
        if($anggota){
            return Response()->json(['status'=>1,'message'=>'Data Anggota berhasil diubah']);
        }
        else{
            return Response()->json(['status'=>0,'message'=>'Data Anggota tidak berhasil diubah']);
        }
    }

    public function delete($id)
    {
        $anggota=Modelanggota::where('id',$id)->delete();
        if($anggota){
            return Response()->json(['status'=>1,'message'=>'Data Anggota berhasil dihapus']);
        }
        else{
            return Response()->json(['status'=>0,'message'=>'Data Anggota tidak berhasil dihapus']);
        }
    }
    public function tampil()
    {
        $anggota=Modelanggota::all();
        if($anggota){
            return Response()->json(['Data'=>$anggota,'status'=>1]);
        }
        else{
            return Response()->json(['status'=>0]);
        }
    }
}

