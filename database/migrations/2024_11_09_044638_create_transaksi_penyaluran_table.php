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
        Schema::create('transaksi_penyaluran', function (Blueprint $table) {
            $table->id();
            $table->foreignId('jenis_zakat')->references('kode_jenis')->on('jenis_penyaluran')->onDelete('cascade'); // Mengatur id_muzaki sebagai foreign key
            $table->text('alamat_penerima');
            $table->integer('jumlah');
            $table->date('tgl_transaksi');
            $table->foreignId('nama_penerima')->references('id')->on('mustahiq')->onDelete('cascade'); // Mengatur nama_penerima sebagai foreign key
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi_penyaluran');
    }
};
