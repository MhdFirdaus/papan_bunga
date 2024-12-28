<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenyewaanTable extends Migration
{
    public function up()
    {
        Schema::create('penyewaan', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('telepon');
            $table->string('lokasi');
            $table->string('alamat');
            $table->string('jenis_paket');
            $table->string('total_pembayaran');
            $table->time('waktu');
            $table->date('tanggal');
            $table->string('dari');
            $table->text('ucapan')->nullable();
            $table->string('metode_pembayaran');
            $table->string('bukti_pembayaran')->nullable();
            $table->enum('status', ['Diproses', 'Selesai', 'Dibatalkan', 'Dalam penyewaan', 'Menunggu Konfirmasi'])->default('Diproses');
            $table->timestamps();
        });
    }
    public function down(){
        Schema::dropIfExists('penyewaan');
    }
}