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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 100);
            $table->string('email', 30);
            $table->string('password');
            $table->unsignedBigInteger('id_outlet');
            $table->enum('role', ['Administrator', 'Kasir', 'Owner'])->default('Administrator');
            $table->string('image')->nullable();
            $table->enum('status', ['Online', 'Offline'])->default('Offline');
            $table->timestamps();

            $table->foreign('id_outlet')->references('id')->on('outlets');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
