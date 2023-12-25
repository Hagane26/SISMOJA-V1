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
        Schema::create('data_modul_ajars', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->unsignedBigInteger('informasi_id')->nullable();
            $table->unsignedBigInteger('ppp_id')->nullable();
            $table->unsignedBigInteger('komponen_id')->nullable();
            $table->unsignedBigInteger('lampiran_id')->nullable();
            $table->unsignedBigInteger('users_id');
            $table->timestamps();

            $table->foreign('informasi_id')->references('id')->on('informasi_umums');
            $table->foreign('ppp_id')->references('id')->on('ppps');
            $table->foreign('komponen_id')->references('id')->on('komponen_intis');
            $table->foreign('lampiran_id')->references('id')->on('lampirans');
            $table->foreign('users_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_modul_ajars');
    }
};
