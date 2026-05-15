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
        Schema::create('berita', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->string('slug')->unique();
            $table->string('penulis', 100);
            $table->text('konten');
            $table->string('kategori', 50)->default('berita');
            $table->string('foto')->nullable();
            $table->enum('status', ['published', 'draft'])->default('draft');
            $table->integer('views')->default(0);
            $table->tinyInteger('is_highlighted')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('berita');
    }
};
