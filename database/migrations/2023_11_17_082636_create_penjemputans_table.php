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
        Schema::create('penjemputans', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('pengepul_id');
            $table->foreign('pengepul_id')->references('id')->on('users')->nullable();
            $table->foreignId('pengguna_id');
            $table->foreign('pengguna_id')->references('id')->on('users')->nullable();
            $table->string('pesan')->nullable();
            $table->string('status')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penjemputans');
    }
};
