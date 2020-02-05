<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Modelpeminjaman;
use App\Detailpeminjaman;

class Peminjaman extends Controller
{
    public function store(Request $req)
    {
        $validator = Validator::make($req->all(), 
        [
            'tgl_pinjam' => 'required',
            'id_anggota' => 'required',
            'id_petugas'=> 'required',
            'deadline' => 'required',
            'denda' => 'required',
        ]);

        if($validator->fails()){
            return Response()->json($validator->errors());
        }

        $buku = Modelpeminjaman::create([
            'tgl_pinjam' => $req->tgl_pinjam,
            'id_anggota' => $req->id_anggota,
            'id_petugas'=> $req->id_petugas,
            'deadline'=> $req->deadline,
            'denda' => $req->denda,
        ]);
        if($buku){
            return Response()->json(['status'=>1,'message'=>'Data Buku berhasil ditambahkan!']);
        }
        else{
            return Response()->json(['status'=>0,'message'=>'Data Buku tidak berhasil ditambahkan!']);
        }
    }

    public function update($id, Request $req)
    {
        $validator=Validator::make($req->all(),
        [
            'tgl_pinjam' => 'required',
            'id_anggota' => 'required',
            'id_petugas'=> 'required',
            'deadline' => 'required',
            'denda' => 'required',
        ]);
        if($validator->fails()){
            return Response()->json($validator->errors());
        }
        $buku=Modelpeminjaman::where('id',$id)->update([
            'tgl_pinjam' => $req->tgl_pinjam,
            'id_anggota' => $req->id_anggota,
            'id_petugas'=> $req->id_petugas,
            'deadline'=> $req->deadline,
            'denda' => $req->denda,
        ]);
        if($buku){
            return Response()->json(['status'=>1,'message'=>'Data Buku berhasil diubah']);
        }
        else{
            return Response()->json(['status'=>0,'message'=>'Data Buku tidak berhasil diubah']);
        }
    }

    public function delete($id)
    {
        $buku=Modelpeminjaman::where('id',$id)->delete();
        if($buku){
            return Response()->json(['status'=>1,'message'=>'Data Buku berhasil dihapus']);
        }
        else{
            return Response()->json(['status'=>0,'message'=>'Data Buku tidak berhasil dihapus']);
        }
    }
    public function tampil_pinjam($id)
    {
        $buku = Modelpeminjaman::join('anggota','anggota.id','peminjaman.id_anggota')->join('petugas','petugas.id','peminjaman.id_petugas')->where('peminjaman.id',$id)->first();
            $detail=Detailpeminjaman::where('detail_peminjaman.id_pinjam',$buku->id)->get();
            $arr_detail=array();
            $arr_data=array();
            $data=array();
            foreach($detail as $detail){
                $arr_detail[]=array(
                    'id_pinjam' =>$detail->id_pinjam,
                    'id_buku' =>$detail->id_buku,
                    'qty' =>$detail->qty,

                );
            }
            $arr_data[]=array(
                'judul' => $buku->judul,
                'id_anggota' => $buku->id_anggota,
                'id_petugas' => $buku->id_petugas,
                'foto' => $buku->foto,
            );
        
        return Response()->json($arr_data);
    }

    public function store2(Request $req)
    {
        $validator = Validator::make($req->all(), 
        [
            'id_pinjam' => 'required',
            'id_buku' => 'required',
            'qty'=> 'required',
        
        ]);

        if($validator->fails()){
            return Response()->json($validator->errors());
        }

        $buku = Detailpeminjaman::create([
            'id_pinjam' => $req->id_pinjam,
            'id_buku' => $req->id_buku,
            'qty'=> $req->qty,
        ]);
        if($buku){
            return Response()->json(['status'=>1,'message'=>'Data Buku berhasil ditambahkan!']);
        }
        else{
            return Response()->json(['status'=>0,'message'=>'Data Buku tidak berhasil ditambahkan!']);
        }
    }

    public function update2($id, Request $req)
    {
        $validator=Validator::make($req->all(),
        [
            'id_pinjam' => 'required',
            'id_buku' => 'required',
            'qty'=> 'required',
        ]);
        if($validator->fails()){
            return Response()->json($validator->errors());
        }
        $buku=Detailpeminjaman::where('id',$id)->update([
            'id_pinjam' => $req->id_pinjam,
            'id_buku' => $req->id_buku,
            'qty'=> $req->qty,
        ]);
        if($buku){
            return Response()->json(['status'=>1,'message'=>'Data Buku berhasil diubah']);
        }
        else{
            return Response()->json(['status'=>0,'message'=>'Data Buku tidak berhasil diubah']);
        }
    }

    public function delete2($id)
    {
        $buku=Detailpeminjaman::where('id',$id)->delete();
        if($buku){
            return Response()->json(['status'=>1,'message'=>'Data Buku berhasil dihapus']);
        }
        else{
            return Response()->json(['status'=>0,'message'=>'Data Buku tidak berhasil dihapus']);
        }
    }
    public function tampil2()
    {
        $buku=Detailpeminjaman::all();
        if($buku){
            return Response()->json(['Data'=>$anggota,'status'=>1]);
        }
        else{
            return Response()->json(['status'=>0]);
        }
    }
}
