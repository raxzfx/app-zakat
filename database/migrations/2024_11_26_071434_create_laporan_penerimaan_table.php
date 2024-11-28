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
        Schema::create('laporan_penerimaan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_muzaki')->references('id')->on('muzakki')->onDelete('cascade'); // Mengatur id_muzaki sebagai foreign key
            $table->foreignId('jenis_zakat')->references('kode_jenis')->on('jenis_penerimaan')->onDelete('cascade'); // Mengatur jenis_zakat sebagai foreign key
            $table->foreignId('tgl_trans')->references('id')->on('transaksi_penerimaan')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporan_penerimaan');
    }
};
