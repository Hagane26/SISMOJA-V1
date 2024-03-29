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
        Schema::create('identitas', function (Blueprint $table) {
            $table->id();
            $table->string('nama')->nullable();
            $table->string('mapel')->nullable();
            $table->string('institusi')->nullable();
            $table->string('fase')->nullable();
            $table->string('kelas')->nullable();
            $table->string('TAwal')->nullable();
            $table->string('TAkhir')->nullable();
            $table->string('alokasi_waktu')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('identitas');
    }
};
