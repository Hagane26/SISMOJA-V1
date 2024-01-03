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
        Schema::create('komponen_intis', function (Blueprint $table) {
            $table->id();
            $table->string('Tujuan')->nullable();
            $table->text('asasmen_diagnostik')->nullable();
            $table->text('asasmen_formatif')->nullable();
            $table->text('asasmen_sumatif')->nullable();
            $table->text('pemahaman_bermakna')->nullable();
            $table->text('pemahaman_pemantik')->nullable();
            $table->text('refleksi')->nullable();
            $table->unsignedBigInteger('kegiatan_id')->nullable();
            $table->timestamps();

            $table->foreign('kegiatan_id')->references('id')->on('kegiatan_pembelajarans')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('komponen_intis');
    }
};
