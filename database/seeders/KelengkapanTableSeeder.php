<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KelengkapanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kelengkapans')->insert(
            [
                [
                    'kode' => 'ad',
                    'nama' => 'Audio',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                    'parent_id' => null
                ],
                [
                    'kode' => 'sp',
                    'nama' => 'Speaker',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                    'parent_id' => 1
                ],
                [
                    'kode' => 'ak',
                    'nama' => 'Aksesoris',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                    'parent_id' => null
                ],
                [
                    'kode' => 'ft',
                    'nama' => 'Fitur',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                    'parent_id' => null
                ],
                [
                    'kode' => 'km',
                    'nama' => 'Kamera Mundur',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                    'parent_id' => 4
                ],
                [
                    'kode' => 'gps',
                    'nama' => 'GPS',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                    'parent_id' => 4
                ],
                [
                    'kode' => 'ch',
                    'nama' => 'Charger Handphone',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                    'parent_id' => null
                ],
                [
                    'kode' => 'mic',
                    'nama' => 'Mikro USB',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                    'parent_id' => 7
                ],
                [
                    'kode' => 'mac',
                    'nama' => 'Makro USB',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                    'parent_id' => 7
                ],
            ]
        );
    }
}
