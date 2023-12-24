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
        Schema::table('keterangan', function (Blueprint $table) {
            $table->unsignedBigInteger('transaksi_kaskecil_id')->required();
            $table->foreign('transaksi_kaskecil_id')->references('id')->on('transaksi_kaskecil');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('keterangan', function (Blueprint $table) {
            $table->dropForeign(['transaksi_kaskecil_id']);
            $table->dropColumn('transaksi_kaskecil_id');
        });
    }
};