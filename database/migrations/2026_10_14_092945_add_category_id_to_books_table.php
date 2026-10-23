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
        Schema::table('books', function (Blueprint $table) {
            // Menambahkan kolom category_id setelah kolom id, dan merelasikannya ke tabel categories
            $table->foreignId('category_id')->after('id')->constrained('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('books', function (Blueprint $table) {
            // Menghapus relasi dan kolom jika di-rollback
            $table->dropForeign(['category_id']);
            $table->dropColumn('category_id');
        });
    }
};