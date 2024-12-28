<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penyewaan extends Model
{
    use HasFactory;

    protected $table = 'penyewaan';

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
    ];    
    public function produkPaket()
    {
        return $this->belongsTo(ProdukPaket::class, 'jenis_paket', 'nama_produk');
    }

}