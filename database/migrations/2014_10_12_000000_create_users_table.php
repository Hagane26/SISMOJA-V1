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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nama')->nullable();
            $table->integer('nik')->nullable();

            $table->date('tanggal_lahir')->nullable();
            $table->enum('gender',['Pria','Wanita'])->nullable();
            $table->string('alamat')->nullable();

            $table->string('email')->unique();
            $table->integer('telepon')->nullable();
            $table->boolean('status_info');
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
