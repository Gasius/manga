<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('chapter_images', function (Blueprint $table) {
            $table->id(); // это создаст поле 'image_id'
            $table->foreignId('chapter_id')->constrained('chapters')->onDelete('cascade');
            $table->string('image_path');
            $table->unsignedInteger('page_number');
            $table->timestamps();

            // Убедитесь, что номера страниц уникальны в каждой главе
            $table->unique(['chapter_id', 'page_number']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('chapter_images');
    }
};
