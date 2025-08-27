<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    use HasFactory;
    protected $fillable = ['post_id', 'chapter_number', 'chapter_title'];

    // Глава принадлежит одной манге
    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    // Глава имеет много изображений
    public function images()
    {
        return $this->hasMany(ChapterImage::class);
    }
}
