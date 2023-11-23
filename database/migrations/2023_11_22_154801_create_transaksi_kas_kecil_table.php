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
        Schema::create('transaksi_kas_kecil', function (Blueprint $table) {
            $table->id();
            $table->decimal('jumlah_keluar');
            $table->decimal('jumlah_masuk');
            $table->date('tanggal_tansaksi');
            $table->text('keterangan_transaksi');
            $table->timestamps();
    //         JumlahKeluar DECIMAL(10, 2),
    // JumlahMasuk DECIMAL(10, 2),
    // TanggalTransaksi DATE,
    // Keterangan TEXT
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi_kas_kecil');
    }
};