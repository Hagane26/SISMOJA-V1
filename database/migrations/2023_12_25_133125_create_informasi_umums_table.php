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
        Schema::create('informasi_umums', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('identitas_id');
            $table->text('komponenAwal')->nullable();
            $table->text('sarana')->nullable();
            $table->string('target')->nullable();
            $table->unsignedBigInteger('modelPembelajaran_id');
            $table->timestamps();

            $table->foreign('modelPembelajaran_id')->references('id')->on('model_pembelajarans');
            $table->foreign('identitas_id')->references('id')->on('identitas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('informasi_umums');
    }
};
