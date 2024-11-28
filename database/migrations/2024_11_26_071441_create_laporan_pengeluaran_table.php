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
        Schema::create('laporan_pengeluaran', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('jumlah_pengeluaran');
            $table->foreignId('transaksi_pengeluaran')->references('id')->on('transaksi_pengeluaran')->onDelete('cascade');
            $table->foreignId('jenis_zakat')->references('kode_jenis')->on('jenis_pengeluaran')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporan_pengeluaran');
    }
};
