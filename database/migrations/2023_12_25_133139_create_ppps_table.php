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
        Schema::create('ppps', function (Blueprint $table) {
            $table->id();
            $table->string('subjudul')->nullable();
            $table->text('isi')->nullable();
            $table->unsignedBigInteger('informasi_id');
            $table->timestamps();

            $table->foreign('informasi_id')->references('id')->on('informasi_umums');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ppps');
    }
};
