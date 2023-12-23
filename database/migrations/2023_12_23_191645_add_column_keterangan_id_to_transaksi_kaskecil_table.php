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
        Schema::table('transaksi_kaskecil', function (Blueprint $table) {
            $table->unsignedBigInteger('keterangan_id')->required();
            $table->foreign('keterangan_id')->references('id')->on('keterangan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('transaksi_kaskecil', function (Blueprint $table) {
            $table->dropForeign(['keterangan_id']);
            $table->dropColumn('keterangan_id');
        });
    }
};