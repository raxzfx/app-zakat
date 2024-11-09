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
        Schema::create('transaksi_pengeluaran', function (Blueprint $table) {
            $table->id();
            $table->string('jenis_zakat');
            $table->string('nama_pengeluaran');
            $table->text('alamat_penerima');
            $table->integer('jumlah');
            $table->date('tgl_transaksi');
            $table->foreignId('jenis_zakat')->references('kode_jenis')->on('jenis_pengeluaran')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi_pengeluaran');
    }
};
