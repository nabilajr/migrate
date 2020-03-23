<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Modeltransaksi;

class transaksi extends Controller
{
    public function store(Request $req)
    {
        $validator = Validator::make($req->all(), 
        [
            'id_pelanggan' => 'required',
            'id_petugas' => 'required',
            'tgl_transaksi'=> 'required',
            'tgl_selesai'=> 'required',
        ]);

        if($validator->fails()){
            return Response()->json($validator->errors());
        }

        $laundry = Modeltransaksi::create([
            'id_pelanggan' => $req->id_pelanggan,
            'id_petugas' => $req->id_petugas,
            'tgl_transaksi'=> $req->tgl_transaksi,
            'tgl_selesai'=> $req->tgl_selesai,
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
            'id_pelanggan' => 'required',
            'id_petugas' => 'required',
            'tgl_transaksi'=> 'required',
            'tgl_selesai'=> 'required',
        ]);
        if($validator->fails()){
            return Response()->json($validator->errors());
        }
        $laundry=Modeltransaksi::where('id',$id)->update([
            'id_pelanggan' => $req->id_pelanggan,
            'id_petugas' => $req->id_petugas,
            'tgl_transaksi'=> $req->tgl_transaksi,
            'tgl_selesai'=> $req->tgl_selesai,
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
        $laundry=Modeltransaksi::where('id',$id)->delete();
        if($laundry){
            return Response()->json(['status'=>1,'message'=>'Data Anggota berhasil dihapus']);
        }
        else{
            return Response()->json(['status'=>0,'message'=>'Data Anggota tidak berhasil dihapus']);
        }
    }
    public function tampil()
    {
        $laundry=Modeltransaksi::all();
        if($laundry){
            return Response()->json(['Data'=>$laundry,'status'=>1]);
        }
        else{
            return Response()->json(['status'=>0]);
        }
    }
}
