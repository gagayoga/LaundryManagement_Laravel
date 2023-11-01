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
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 100);
            $table->string('alamat');
            $table->enum('jenis_kelamin', ['Laki-Laki', 'Perempuan']);
            $table->string('telepon', 15);
            $table->enum('status', ['Pelanggan', 'Member'])->default('Pelanggan');
            $table->unsignedInteger('transaksi_count')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('members');
    }
};