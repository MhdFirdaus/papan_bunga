<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('data_papan')->insert([
            [
                'id_papan' => '01-PPN',
                'jenis_papan' => 'Jati belanda',
                'bentuk' => 'Persegi panjang',
                'ukuran' => null,
                'stok' => 14,
            ],
            [
                'id_papan' => '02-PPN',
                'jenis_papan' => 'HPL-PP',
                'bentuk' => 'Persegi panjang',
                'ukuran' => null,
                'stok' => 22,
            ],
            [
                'id_papan' => '03-PPN',
                'jenis_papan' => 'HPL-BB',
                'bentuk' => 'Bundar besar',
                'ukuran' => '1 meter',
                'stok' => 9,
            ],
            [
                'id_papan' => '04-PPN',
                'jenis_papan' => 'Akrilik',
                'bentuk' => 'Bundar',
                'ukuran' => '60 cm',
                'stok' => 2,
            ],
            [
                'id_papan' => '05-PPN',
                'jenis_papan' => 'Flower box',
                'bentuk' => '-',
                'ukuran' => null,
                'stok' => 5,
            ],
        ]);
    }
}
