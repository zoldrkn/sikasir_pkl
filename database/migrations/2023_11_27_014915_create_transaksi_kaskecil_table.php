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
        Schema::create('transaksi_kaskecil', function (Blueprint $table) {
            $table->id();
            $table->string('kode_kaskeluar')->unique();
            $table->decimal('jumlah_keluar', 15,2);
            $table->decimal('jumlah_masuk', 15,2)->nullable();
            $table->date('tanggal_transaksi');
            $table->text('keterangan_transaksi')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi_kaskecil');
    }
};