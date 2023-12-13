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
        Schema::create('modul_komponen_intis', function (Blueprint $table) {
            $table->id();
            $table->text('tujuan')->nullable();
            $table->text('asesmen')->nullable();
            $table->text('pemahaman')->nullable();
            $table->text('pertanyaan')->nullable();
            $table->text('kegiatan')->nullable();
            $table->text('refleksi')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('modul_komponen_intis');
    }
};
