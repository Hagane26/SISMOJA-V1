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
            $table->char('status',1)->nullable();
            $table->timestamps();

            $table->foreign('informasi_id')->references('id')->on('informasi_umums')->onUpdate('cascade');
            $table->foreign('ppp_id')->references('id')->on('ppps')->onUpdate('cascade');
            $table->foreign('komponen_id')->references('id')->on('komponen_intis')->onUpdate('cascade');
            $table->foreign('lampiran_id')->references('id')->on('lampirans')->onUpdate('cascade');
            $table->foreign('users_id')->references('id')->on('users')->onUpdate('cascade');
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
