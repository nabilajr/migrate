<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\Modeldetail_transaksi;
use DB;
use Auth;
use JWTAuth;

class detail_transaksi extends Controller
{
    public function store(Request $req)
    {
        $validator = Validator::make($req->all(), 
        [
            'id_transaksi' => 'required',
            'id_jenis' => 'required',
            'qty'=> 'required',
            'subtotal'=> 'required',
        ]);

        if($validator->fails()){
            return Response()->json($validator->errors());
        }

        $laundry = Modeldetail_transaksi::create([
            'id_transaksi' => $req->id_transaksi,
            'id_jenis' => $req->id_jenis,
            'qty'=> $req->qty,
            'subtotal'=> $req->subtotal,
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
            'id_transaksi' => 'required',
            'id_jenis' => 'required',
            'qty'=> 'required',
            'subtotal'=> 'required',
        ]);
        if($validator->fails()){
            return Response()->json($validator->errors());
        }
        $laundry=Modeldetail_transaksi::where('id',$id)->update([
            'id_transaksi' => $req->id_transaksi,
            'id_jenis' => $req->id_jenis,
            'qty'=> $req->qty,
            'subtotal'=> $req->subtotal,
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
        $laundry=Modeldetail_transaksi::where('id',$id)->delete();
        if($laundry){
            return Response()->json(['status'=>1,'message'=>'Data Anggota berhasil dihapus']);
        }
        else{
            return Response()->json(['status'=>0,'message'=>'Data Anggota tidak berhasil dihapus']);
        }
    }
    public function tampil($tgl1,$tgl2)
    {
        $trans=DB::table('transaksi')
            ->join('pelanggan','pelanggan.id','transaksi.id_pelanggan')
            ->join('petugas','petugas.id','transaksi.id_petugas') ->where('tgl_transaksi','>=', $tgl1)
            ->where('tgl_transaksi','<=', $tgl2)->get();
        $datatrans=array(); $no=0;
        foreach($trans as $t){
            $datatrans [$no]['tgl']=$t->tgl_transaksi;
            $datatrans [$no]['nama_pelanggan']= $t ->nama_pelanggan;
            $datatrans [$no]['alamat']=$t->alamat;
            $datatrans [$no]['telepon']=$t ->telp;
            $datatrans [$no]['tgl_jadi']=$t ->tgl_jadi;

            $grand=DB::table('detail_transaksi') 
                ->where('id_transaksi', $t->id)-> groupBy('id_transaksi')
                ->select(DB::raw('sum(subtotal) as grandtotal')) -> first();

            $datatrans [$no]['grandtotal']=$grand->grandtotal;
            $detail=DB::table('detail_transaksi')
                ->join('jenis_cuci','jenis_cuci.id','detail_transaksi.id_jenis')
                ->where('id_transaksi', $t->id)->get();
            $datatrans [$no]['detail']=$detail;
        }
        return Response()->json($datatrans);

    }
}
