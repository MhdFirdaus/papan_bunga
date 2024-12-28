<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataPapan extends Model
{
    use HasFactory;

    // Pastikan nama tabel sesuai
    protected $table = 'data_papan';

    // Jika tabel tidak menggunakan timestamps
    public $timestamps = false;

    // Kolom yang dapat diisi
    protected $fillable = ['id_papan', 'jenis_papan', 'bentuk', 'ukuran', 'stok'];
    public function produkPaket()
    {
        return $this->hasMany(ProdukPaket::class, 'jenis_papan', 'jenis_papan');
    }




}
