<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // ✅ TAMBAH DESKRIPSI
        Schema::table('aquariums', function (Blueprint $table) {
            if (!Schema::hasColumn('aquariums', 'deskripsi')) {
                $table->text('deskripsi')->nullable();
            }
        });

        // ✅ TAMBAH RELASI IKAN
        Schema::table('ikans', function (Blueprint $table) {
            if (!Schema::hasColumn('ikans', 'aquarium_id')) {
                $table->foreignId('aquarium_id')
                    ->nullable()
                    ->constrained('aquariums')
                    ->cascadeOnDelete();
            }
        });
    }

    public function down(): void
    {
        // ❌ HAPUS RELASI
        Schema::table('ikans', function (Blueprint $table) {
            if (Schema::hasColumn('ikans', 'aquarium_id')) {
                $table->dropForeign(['aquarium_id']);
                $table->dropColumn('aquarium_id');
            }
        });

        // ❌ HAPUS DESKRIPSI
        Schema::table('aquariums', function (Blueprint $table) {
            if (Schema::hasColumn('aquariums', 'deskripsi')) {
                $table->dropColumn('deskripsi');
            }
        });
    }
};