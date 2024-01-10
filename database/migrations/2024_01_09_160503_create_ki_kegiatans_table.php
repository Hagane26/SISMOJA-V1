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
        Schema::create('ki_kegiatans', function (Blueprint $table) {
            $table->id();
            $table->string('metode')->nullable();
            $table->text('isi')->nullable();
            $table->string('waktu')->nullable();
            $table->unsignedBigInteger('ki_id')->nullable();
            $table->timestamps();

            $table->foreign('ki_id')->references('id')->on('komponen_intis')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ki_kegiatans');
    }
};
