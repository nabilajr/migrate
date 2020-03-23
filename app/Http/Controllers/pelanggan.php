<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Modelpelanggan;

class pelanggan extends Controller
{
    public function store(Request $req)
    {
        $validator = Validator::make($req->all(), 
        [
            'nama' => 'required',
            'alamat' => 'required',
            'telp'=> 'required',
        ]);

        if($validator->fails()){
            return Response()->json($validator->errors());
        }

        $laundry = Modelpelanggan::create([
            'nama' => $req->nama,
            'alamat' => $req->alamat,
            'telp'=> $req->telp,
        ]);
        if($laundry){
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
            'nama' => 'required',
            'alamat' => 'required',
            'telp'=> 'required',
        ]);
        if($validator->fails()){
            return Response()->json($validator->errors());
        }
        $laundry=Modelpelanggan::where('id_pelanggan',$id)->update([
            'nama' => $req->nama,
            'alamat' => $req->alamat,
            'telp'=> $req->telp,
        ]);
        if($laundry){
            return Response()->json(['status'=>1,'message'=>'Data Anggota berhasil diubah']);
        }
        else{
            return Response()->json(['status'=>0,'message'=>'Data Anggota tidak berhasil diubah']);
        }
    }

    public function delete($id)
    {
        $laundry=Modelpelanggan::where('id_pelanggan',$id)->delete();
        if($laundry){
            return Response()->json(['status'=>1,'message'=>'Data Anggota berhasil dihapus']);
        }
        else{
            return Response()->json(['status'=>0,'message'=>'Data Anggota tidak berhasil dihapus']);
        }
    }
    public function tampil()
    {
        $laundry=Modelpelanggan::all();
        if($laundry){
            return Response()->json(['Data'=>$laundry,'status'=>1]);
        }
        else{
            return Response()->json(['status'=>0]);
        }
    }
}

