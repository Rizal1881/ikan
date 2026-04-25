<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // ✅ CEK DULU BIAR GA DOUBLE
        if (!Schema::hasTable('aquariums')) {
            Schema::create('aquariums', function (Blueprint $table) {
                $table->id();
                $table->string('nama_aquarium');
                $table->string('ukuran');
                $table->string('lokasi')->nullable();
                $table->timestamps();
            });
        }
    }

    public function down(): void
    {
        // ✅ FIX NAMA TABEL
        Schema::dropIfExists('aquariums');
    }
};