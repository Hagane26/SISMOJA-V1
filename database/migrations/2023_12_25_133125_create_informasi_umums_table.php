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
            $table->unsignedBigInteger('identitas_id')->nullable();
            $table->text('komponenAwal')->nullable();
            $table->text('sarana')->nullable();
            $table->text('prasarana')->nullable();
            $table->string('target')->nullable();
            //$table->unsignedBigInteger('modelPembelajaran_id')->nullable();
            $table->timestamps();

            //$table->foreign('modelPembelajaran_id')->references('id')->on('model_pembelajarans')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('identitas_id')->references('id')->on('identitas')->onDelete('cascade')->onUpdate('cascade');
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
