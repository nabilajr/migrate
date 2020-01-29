<?php

use Illuminate\Database\Seeder;

class PetugasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         \App\Petugas::insert([
            [
              'nama_anggota'  => 'Bila',
              'alamat'        => 'sawojajar',
              'telp'          => '081229199158',
              'username'      => 'nabila_jr',
              'password'      => 'halobila',
              'created_at'    =>  \Carbon\Carbon::now('Asia/Jakarta')
            ],
            [
                'nama_anggota'  => 'syila',
              'alamat'        => 'laweyan',
              'telp'          => '0821343445677',
              'username'      => 'syila_gr',
              'password'      => 'halosyila',
              'created_at'    =>  \Carbon\Carbon::now('Asia/Jakarta')
            ],
            [
              'nama_anggota'  => 'yoga',
              'alamat'        => 'malang',
              'telp'          => '0812345434578',
              'username'      => 'yoga_y',
              'password'      => 'haloyoga',
              'created_at'    =>  \Carbon\Carbon::now('Asia/Jakarta')
            ],
            [
                'nama_anggota'  => 'mima',
              'alamat'        => 'surakarta',
              'telp'          => '0821456543689',
              'username'      => 'mima_mm',
              'password'      => 'halomima',
              'created_at'    =>  \Carbon\Carbon::now('Asia/Jakarta')
            ],
            [
              'nama_anggota'  => 'tami',
              'alamat'        => 'sragen',
              'telp'          => '0856539876898',
              'username'      => 'tami_m',
              'password'      => 'halotami',
              'created_at'    =>  \Carbon\Carbon::now('Asia/Jakarta')
            ],
            [
              'nama_anggota'  => 'mufi',
              'alamat'        => 'gremet',
              'telp'          => '0823454367898',
              'username'      => 'mufi_ag',
              'password'      => 'halomufi',
              'created_at'    =>  \Carbon\Carbon::now('Asia/Jakarta')
            ],
        ]);
    }
}
