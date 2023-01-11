<?php

namespace Database\Seeders;

use Webpatser\Uuid\Uuid;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'id' => Uuid::generate()->string,
                'username' => 'kyy',
                'status_user' => null,
                'level' => 'admin',
                'email' => 'kylavesfar25@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('Lavesfar123'),
                'created_at' => date("Y:m:d H:i:s"),
                'updated_at' => date("Y:m:d H:i:s")
            ],
        ]);
    }
}
