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
        Schema::create('modul_ajars', function (Blueprint $table) {
            $table->id();
            $table->string('materi');
            $table->string('mata_pelajaran');
            $table->string('tahun_ajaran');

            $table->text('kompetensiAwal')->nullable();
            $table->text('profilPelajarPancasila')->nullable();
            $table->text('sarana')->nullable();
            $table->text('target')->nullable();
            $table->text('modelPembelajaran')->nullable();

            $table->unsignedBigInteger('users_id');
            $table->unsignedBigInteger('sekolah_id');
            $table->unsignedBigInteger('kelas_id');
            $table->unsignedBigInteger('komponenInti_id');
            $table->char('status',15);

            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('sekolah_id')->references('id')->on('sekolah_data')->onDelete('cascade');
            $table->foreign('kelas_id')->references('id')->on('sekolah_kelas')->onDelete('cascade');
            $table->foreign('komponenInti_id')->references('id')->on('modul_komponen_intis')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('modul_ajars');
    }
};
