<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // database/migrations/xxxx_xx_xx_create_data_papan_table.php
public function up()
{
    Schema::create('data_papan', function (Blueprint $table) {
        $table->id();
        $table->string('id_papan')->unique();
        $table->string('jenis_papan');
        $table->string('bentuk');
        $table->string('ukuran')->nullable();
        $table->integer('stok');
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_papans');
    }
};