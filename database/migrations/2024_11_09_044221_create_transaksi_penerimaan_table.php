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
            $table->id(); // Kolom id yang auto increment
            $table->foreignId('id_muzaki')->constrained('muzakki')->onDelete('cascade'); // Mendefinisikan id_muzaki sebagai foreign key
            $table->integer('jumlah');
            $table->string('bukti');
            $table->date('tgl_transaksi');
            $table->foreignId('jenis_zakat')->constrained('jenis_penerimaan', 'kode_jenis')->onDelete('cascade'); // Menggunakan foreignId untuk jenis_zakat
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
