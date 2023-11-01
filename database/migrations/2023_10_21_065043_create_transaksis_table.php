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
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_outlet');
            $table->string('kode_invoice', 100);
            $table->unsignedBigInteger('id_member');
            $table->date('tanggal');
            $table->date('batas_waktu')->nullable();
            $table->date('tanggal_bayar')->nullable();
            $table->integer('biaya_tambahan')->nullable();
            $table->double('diskon')->nullable();
            $table->integer('pajak')->nullable();
            $table->enum('status', ['Proses', 'Selesai'])->default('Proses');
            $table->enum('status_bayar', ['Dibayar', 'Belum Bayar'])->default('Belum Bayar');
            $table->unsignedBigInteger('id_user');
            $table->timestamps();

            // Relasi tabel transaksi dengan outlet (transaksi (foreign) outlet(primary))
            $table->foreign('id_outlet')->references('id')->on('outlets');
            // Relasi tabel transaksi dengan member (transaksi (foreign) memeber(primary))
            $table->foreign('id_member')->references('id')->on('members');
            // Relasi tabel transaksi dengan user (transaksi (foreign) user(primary))
            $table->foreign('id_user')->references('id')->on('users');
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
