<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataProdukPaketTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_produk_paket', function (Blueprint $table) {
            // ID Produk (Primary Key) dengan panjang maksimal 50 karakter
            $table->string('id_produk', 50)->primary();
            
            // Nama produk dengan panjang maksimal 100 karakter
            $table->string('nama_produk', 100);
            
            // Harga produk dalam format desimal (max 10 digit, 2 angka setelah koma)
            $table->decimal('harga', 10, 2);
            
            // Jenis papan dengan panjang maksimal 50 karakter
            $table->string('jenis_papan', 50);
            
            // Jumlah papan (integer)
            $table->integer('jumlah_papan');
            
            // URL gambar produk (nullable) dengan panjang maksimal 255 karakter
            $table->string('gambar', 255)->nullable();
            
            // Timestamps untuk mencatat waktu pembuatan dan pembaruan
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('data_produk_paket');
    }
}