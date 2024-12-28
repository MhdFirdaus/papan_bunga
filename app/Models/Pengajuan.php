<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengajuan extends Model
{
    use HasFactory;

    // Tentukan nama tabel yang benar
    protected $table = 'pengajuan'; // Nama tabel yang benar tanpa 's'

    protected $fillable = [
        'nama',
        'telepon',
        'lokasi',
        'alamat',
        'jenis_paket',
        'harga',
        'waktu',
        'tanggal',
        'dari',
        'ucapan',
        'metode_pembayaran',
        'bukti_pembayaran',
        'total_pembayaran', // Tambahkan kolom ini
        'status',
        'gambar_paket',
    ];    
    
}
