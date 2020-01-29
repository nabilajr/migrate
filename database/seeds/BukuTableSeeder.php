<?php

use Illuminatbue\Database\Seeder;

class BukuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         \App\Buku::insert([
            [
              'judul'        => 'bila saja',
              'penerbit'     => 'master yo',
              'pengarang'    => 'ananda rafi',
              'foto'         => '1.jpg',
              'created_at'   =>  \Carbon\Carbon::now('Asia/Jakarta')
            ],
              'judul'        => 'apakah mungkin',
              'penerbit'     => 'lima belas',
              'pengarang'    => 'mima',
              'foto'         => '2.jpg',
              'created_at'   =>  \Carbon\Carbon::now('Asia/Jakarta')
            ],
            [
              'judul'        => 'besok',
              'penerbit'     => 'master yo',
              'pengarang'    => 'ananda syila',
              'foto'         => '3.jpg',
              'created_at'   =>  \Carbon\Carbon::now('Asia/Jakarta')
            ],
            [
              'judul'        => 'suatu hari nanti',
              'penerbit'     => 'lima belas',
              'pengarang'    => 'berly',
              'foto'         => '4.jpg',
              'created_at'   =>  \Carbon\Carbon::now('Asia/Jakarta')
            ],
            [
              'judul'        => 'andaikan',
              'penerbit'     => 'master yo',
              'pengarang'    => 'bima r',
              'foto'         => '5.jpg',
              'created_at'   =>  \Carbon\Carbon::now('Asia/Jakarta')
            ],
            [
              'judul'        => 'senja',
              'penerbit'     => 'lima belas',
              'pengarang'    => 'irul r',
              'foto'         => '6.jpg',
              'created_at'   =>  \Carbon\Carbon::now('Asia/Jakarta')
            
        ]);

    }
}
