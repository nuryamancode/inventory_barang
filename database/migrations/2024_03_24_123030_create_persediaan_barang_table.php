<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('persediaan_barang', function (Blueprint $table) {
            $table->id();
            $table->integer('stok_barang');
            $table->integer('harga_jual');
            $table->enum('status_barang', ['Tersedia','Tidak Tersedia'])->nullable();
            $table->string('barang_id');
            $table->unsignedBigInteger('gudang_id');
            $table->foreign('gudang_id')->references('id')->on('data_gudang')->onDelete('cascade');
            $table->foreign('barang_id')->references('kode_barang')->on('data_barang')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('persediaan_barang');
    }
};
