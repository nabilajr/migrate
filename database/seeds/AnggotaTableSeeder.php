<?php

use Illuminate\Database\Seeder;

class AnggotaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
                \App\Anggota::insert([
            [
              'nama_anggota'  => 'fahmi',
              'alamat'        => 'surakarta',
              'telp'          => '0812273648578',
              'created_at'    =>  \Carbon\Carbon::now('Asia/Jakarta')
            ],
             [
              'nama_anggota'  => 'mila',
              'alamat'        => 'sawojajar',
              'telp'          => '0812275678545',
              'created_at'    =>  \Carbon\Carbon::now('Asia/Jakarta')
            ],
             [
              'nama_anggota'  => 'haqi',
              'alamat'        => 'surakarta',
              'telp'          => '0815672648554',
              'created_at'    =>  \Carbon\Carbon::now('Asia/Jakarta')
            ],
             [
              'nama_anggota'  => 'nopal',
              'alamat'        => 'sawojajar',
              'telp'          => '0812987658534',
              'created_at'    =>  \Carbon\Carbon::now('Asia/Jakarta')
            ],
             [
              'nama_anggota'  => 'mikha',
              'alamat'        => 'gremet',
              'telp'          => '0812646378574',
              'created_at'    =>  \Carbon\Carbon::now('Asia/Jakarta')
             ],
            ]);
    }
}
