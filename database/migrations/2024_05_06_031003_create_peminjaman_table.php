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
        Schema::create('peminjaman', function (Blueprint $table) {
            $table->uuid('id_peminjaman')->primary();
            $table->foreignUuid('id_pengguna')->references('id_pengguna')->on('pengguna')->onDelete('cascade')->nullable();
            $table->date('tanggal_awal',255);
            $table->date('tanggal_akhir',255);
            $table->text('deskripsi')->nullable();;
            $table->enum('status', ['0', '1'])->default('0');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peminjaman');
    }
};
