<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrmawaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ormawa')->insert([
            'id' => 1,
            'nama' => "Majelis Permusyawaratan Mahasiswa",
            'label' => 'MPM',
            'deskripsi' => 'ini deskripsi',
            'logo' => 'assets/ormawa/mpm.png',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('ormawa')->insert([
            'id' => 2,
            'nama' => "Badan Eksekutif Mahasiswa",
            'label' => 'BEM',
            'deskripsi' => 'ini deskripsi',
            'logo' => 'assets/ormawa/bem.png',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('ormawa')->insert([
            'id' => 3,
            'nama' => "Himpunan Mahasiswa Teknik Informatika",
            'label' => 'HIMATIF',
            'deskripsi' => 'ini deskripsi',
            'logo' => 'assets/ormawa/himatif.png',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('ormawa')->insert([
            'id' => 4,
            'nama' => "Himpunan Mahasiswa Mesin",
            'label' => 'HMM',
            'deskripsi' => 'ini deskripsi',
            'logo' => 'assets/ormawa/hmm.png',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('ormawa')->insert([
            'id' => 5,
            'nama' => "Himpunan Mahasiswa Refrigerasi dan Tata Udara",
            'label' => 'HMM',
            'deskripsi' => 'ini deskripsi',
            'logo' => 'assets/ormawa/himra.png',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('ormawa')->insert([
            'id' => 6,
            'nama' => "Himpunan Mahasiswa Kesehatan",
            'label' => 'HIMAKES',
            'deskripsi' => 'ini deskripsi',
            'logo' => 'assets/ormawa/himakes.png',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
    }
}
