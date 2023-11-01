<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pakets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_outlet');
            $table->enum('jenis', ['Kiloan', 'Selimut', 'Bed Cover', 'Kaos', 'Celana Jeans', 'Lain-Lain']);
            $table->string('nama_paket', 100);
            $table->integer('harga');
            $table->timestamps();

            // Foreign tabel pakets dengan tabel outlet (Primary)
            $table->foreign('id_outlet')->references('id')->on('outlets');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pakets');
    }
};