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
        Schema::create('lampirans', function (Blueprint $table) {
            $table->id();
            $table->string('label1')->nullable();
            $table->text('link1')->nullable();

            $table->string('label2')->nullable();
            $table->text('link2')->nullable();

            $table->string('label3')->nullable();
            $table->text('link3')->nullable();

            $table->text('glossarium')->nullable();
            $table->text('dapus')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lampirans');
    }
};
