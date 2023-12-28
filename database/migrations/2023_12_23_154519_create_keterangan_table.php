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
        Schema::create('keterangan', function (Blueprint $table) {
            $table->id();
            $table->string('ket1')->nullable();
            $table->string('ket2')->nullable();
            $table->string('ket3')->nullable();
            $table->string('ket4')->nullable();
            $table->decimal('nominal1', 15,2)->nullable();
            $table->decimal('nominal2', 15,2)->nullable();
            $table->decimal('nominal3', 15,2)->nullable();
            $table->decimal('nominal4', 15,2)->nullable();
            $table->decimal('pendapatan_lain', 15,2)->nullable();
            $table->decimal('beban_selisih', 15,2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('keterangan');
    }
};