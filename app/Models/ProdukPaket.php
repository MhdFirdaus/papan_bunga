<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdukPaket extends Model
{
    use HasFactory;

    protected $table = 'data_produk_paket';

    protected $primaryKey = 'id_produk'; // Sesuaikan dengan nama primary key di tabel Anda

    protected $fillable = [
        'nama_produk',
        'harga',
        'jenis_papan',
        'jumlah_papan',
        'gambar',
    ];

    public $incrementing = false; // Jika primary key bukan tipe integer
    protected $keyType = 'string'; // Jika primary key adalah string
    public function papan()
    {
        return $this->belongsTo(DataPapan::class, 'jenis_papan', 'jenis_papan');
    }




}