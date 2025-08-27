<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('chapters', function (Blueprint $table) {
            $table->id(); // это создаст поле 'chapter_id'
            $table->foreignId('post_id')->constrained('posts')->onDelete('cascade');
            $table->unsignedInteger('chapter_number');
            $table->string('chapter_title')->nullable();
            $table->timestamps();

            // Убедитесь, что номера глав уникальны для каждой манги
            $table->unique(['post_id', 'chapter_number']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('chapters');
    }
};
