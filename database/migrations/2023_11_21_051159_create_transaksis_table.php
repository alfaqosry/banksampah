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
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('id_transaksi');
            $table->string('jenis_transaksi');
            $table->string('status');
            $table->integer('jmlh_transaksi');
            $table->foreignId('pengepul_id');
            $table->foreign('pengepul_id')->references('id')->on('users')->nullable();
            $table->foreignId('petugas_id');
            $table->foreign('petugas_id')->references('id')->on('users')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksis');
    }
};
