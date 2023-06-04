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
        Schema::create('user_book_ratings', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->integer('rating')->default(0);
            $table->foreignUuid('user_id')->references('id')->on('users');
            $table->foreignUuid('book_id')->references('id')->on('books');
            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_book_ratings');
    }
};
