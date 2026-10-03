<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('infak', function (Blueprint $table) {
            $table->id();
            $table->string('nama_donatur');
            $table->string('desa');
            $table->decimal('nominal', 12, 2);
            $table->string('metode_pembayaran')->default('Cash / Kotak Koin');
            $table->string('bukti_transfer')->nullable();
            $table->enum('status', ['pending', 'verified'])->default('pending');
            $table->text('catatan')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('infak');
    }
};