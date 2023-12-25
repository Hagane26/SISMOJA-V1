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
        Schema::create('model_pembelajarans', function (Blueprint $table) {
            $table->id();
            $table->string('pendekatan')->nullable();
            $table->string('model')->nullable();
            $table->string('motode')->nullable();
            $table->string('teknik')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('model_pembelajarans');
    }
};
