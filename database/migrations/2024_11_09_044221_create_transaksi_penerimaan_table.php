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
        Schema::create('transaksi_penerimaan', function (Blueprint $table) {
            $table->id();
            $table->string('jenis_zakat');
            $table->string('nama_muzakki');
            $table->integer('jumlah');
            $table->varchar('bukti');
            $table->date('tgl_transaksi') ;
            $table->foreignId('id_muzakki')->references('id')->on('muzakki')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi_penerimaan');
    }
};
