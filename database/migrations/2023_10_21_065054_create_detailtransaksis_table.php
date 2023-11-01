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
        Schema::create('detailtransaksis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_transaksi');
            $table->unsignedBigInteger('id_paket');
            $table->integer('qty');
            $table->integer('totalharga');
            $table->string('keterangan');
            $table->timestamps();

            // Relasi tabel transaksi dengan outlet (transaksi (foreign) outlet(primary))
            $table->foreign('id_transaksi')->references('id')->on('transaksis')->onDelete('cascade');
            // Relasi tabel transaksi dengan outlet (transaksi (foreign) outlet(primary))
            $table->foreign('id_paket')->references('id')->on('pakets')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detailtransaksis');
    }
};