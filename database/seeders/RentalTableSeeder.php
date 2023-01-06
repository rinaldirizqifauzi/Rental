<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RentalTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rentals')->insert([
            [
                'kode_mobil' => 'cvc-18',
                'id_spesifikasi' => 1,
                'id_tipe' => 1,
                'id_warna' => 1,
                'id_mesin' => 1,
                'status' => 'Tersedia',
                'no_polisi_1' => 'BA',
                'no_polisi_2' => '2510',
                'no_polisi_3' => 'XYZ',
                'bb' => 'Bensin',
                'harga' => '200000',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'kode_mobil' => 'tyt-20',
                'id_spesifikasi' => 1,
                'id_tipe' => 1,
                'id_warna' => 1,
                'id_mesin' => 1,
                'status' => 'Tersedia',
                'no_polisi_1' => 'BA',
                'no_polisi_2' => '2510',
                'no_polisi_3' => 'XYZ',
                'bb' => 'Bensin',
                'harga' => '200000',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]
            ]);
    }
}
