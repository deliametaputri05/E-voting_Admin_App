<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JurusanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('jurusan')->insert([
            'id' => 1,
            'id_ormawa' => 3,
            'nama' => 'Teknik Informatika',
            'jenjang' => 'D3',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('jurusan')->insert([
            'id' => 2,
            'id_ormawa' => 3,
            'nama' => 'Rekayasa Perangkat Lunak',
            'jenjang' => 'D4',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('jurusan')->insert([
            'id' => 3,
            'id_ormawa' => 4,
            'nama' => 'Teknik Mesin',
            'jenjang' => 'D3',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('jurusan')->insert([
            'id' => 4,
            'id_ormawa' => 4,
            'nama' => 'Perancangan Manufaktur',
            'jenjang' => 'D4',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('jurusan')->insert([
            'id' => 5,
            'id_ormawa' => 5,
            'nama' => 'Teknik Pendingin dan Tata Udara',
            'jenjang' => 'D3',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('jurusan')->insert([
            'id' => 6,
            'id_ormawa' => 6,
            'nama' => 'Keperawatan',
            'jenjang' => 'D3',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
    }
}
