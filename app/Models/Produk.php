<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    // Nama tabel di database
    protected $table = 'produk';

    // Kolom yang dapat diisi secara massal
    protected $fillable = [
        'nama_produk',
        'harga',
        'jenis_papan',
        'jumlah_papan',
        'gambar',
    ];

    // Tambahan: Definisi tipe data atribut untuk casting
    protected $casts = [
        'harga' => 'float', // Pastikan harga selalu dalam format float
        'jumlah_papan' => 'integer', // Pastikan jumlah_papan adalah integer
    ];
}
