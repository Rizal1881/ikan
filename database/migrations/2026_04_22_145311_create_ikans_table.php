<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('ikans', function (Blueprint $table) {
            $table->id();

            $table->string('nama_ikan');
            $table->enum('jenis', ['air tawar', 'air laut']);
            $table->integer('jumlah')->default(0);

            $table->text('deskripsi')->nullable();
            $table->string('gambar')->nullable();

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('ikans');
    }
};