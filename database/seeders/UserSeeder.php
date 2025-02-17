<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Ayumi Florist',
            'email' => 'ayumi@gmail.com',
            'password' => Hash::make('123456789'),
            'level' => 'admin',
            // Menghapus 'jenis_kelamin' karena sudah tidak digunakan lagi
        ]);
    }
}
