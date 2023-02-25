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
        Schema::create('sistemagrotrades', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('jenisPermohonan')->nullable();
            $table->string('kategori')->nullable();
            $table->string('keluaran')->nullable();
            $table->string('status_permohonan')->nullable();
            $table->string('approval')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sistemagrotrades');
    }
};
