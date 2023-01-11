<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TipeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipes')->insert(
            [
                [
                    'nama_tipe' => 'Type-R',
                    'kode_tipe' => 'TpR',
                    'gambar' => 'civic type R.jpg',
                    'gambar1' => null,
                    'gambar2' => null,
                    'gambar3' => null,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'nama_tipe' => '86',
                    'kode_tipe' => '86',
                    'gambar' => 'toyota 86.jpg',
                    'gambar1' => null,
                    'gambar2' => null,
                    'gambar3' => null,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
            ],
        );
    }
}
