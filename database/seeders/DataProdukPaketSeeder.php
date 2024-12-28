<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; // Pastikan namespace DB dimuat untuk operasi database

class DataProdukPaketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('data_produk_paket')->insert([
            [
                'id_produk' => '07-pb',
                'nama_produk' => 'Paket G',
                'harga' => 130000.00, // Pastikan format harga sesuai dengan decimal(10, 2)
                'jenis_papan' => 'Akrilik', // Jenis papan sesuai kebutuhan
                'jumlah_papan' => 1, // Jumlah papan produk
                'gambar' => 'paketG.png', // Path gambar relatif
                'created_at' => now(), // Timestamp otomatis
                'updated_at' => now(), // Timestamp otomatis
            ],
        ]);
    }
}
