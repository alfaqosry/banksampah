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
        Schema::create('setorsampahs', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('sampah_id');
            $table->foreign('sampah_id')->references('id')->on('sampahs')->nullable();
            $table->foreignId('pengepul_id');
            $table->foreign('pengepul_id')->references('id')->on('users')->nullable();
            $table->integer('jumlah_sampah');
    
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('setorsampahs');
    }
};
