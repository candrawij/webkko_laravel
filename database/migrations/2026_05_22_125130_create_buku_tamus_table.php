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
        Schema::create('buku_tamu', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('event_id')->nullable();
            $table->string('nama')->nullable();
            $table->string('instansi')->nullable();
            $table->string('kecamatan')->nullable();
            $table->string('no_hp')->nullable();
            $table->string('foto')->nullable();
            $table->timestamp('checkin_at')->nullable();
            $table->timestamps();
            
            $table->foreign('event_id')->references('id')->on('event')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('buku_tamu');
    }
};
