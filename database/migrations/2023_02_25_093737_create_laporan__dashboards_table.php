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
        Schema::create('laporan__dashboards', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('tajukLaporan')->nullable();
            $table->string('detailLaporan')->nullable();
            $table->string('jenisLaporan')->nullable();
            $table->string('print_laporan')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporan__dashboards');
    }
};
