<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Jalankan migrasi untuk membuat tabel.
     */
    public function up(): void
    {
        // 1. Tabel Utama: Recipes
        Schema::create('recipes', function (Blueprint $table) {
            $table->id();
            // Menghubungkan resep ke user, data terhapus jika user dihapus
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); 
            $table->string('title');
            $table->string('category');
            $table->text('ingredients');
            $table->text('instructions');
            $table->integer('cooking_time'); 
            $table->boolean('is_public')->default(true); 
            $table->timestamps();
        });

        // 2. Tabel Relasi: Favorites (Pivot/M-to-M)
        Schema::create('favorites', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('recipe_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Batalkan migrasi (Rollback).
     */
    public function down(): void
    {
        // Hapus tabel child (favorites) terlebih dahulu sebelum tabel parent (recipes)
        Schema::dropIfExists('favorites');
        Schema::dropIfExists('recipes');
    }
};