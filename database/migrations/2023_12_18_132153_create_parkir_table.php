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
    Schema::create('parkir', function (Blueprint $table) {
        $table->id();
        $table->string('kode_unik')->unique();
        $table->string('nomor_polisi');
        $table->timestamp('waktu_masuk')->nullable();
        $table->timestamp('waktu_keluar')->nullable();
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parkir');
    }
};
