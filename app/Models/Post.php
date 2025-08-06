<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'content',
        'author_name',
        'image_url',
        'created_at',
        'genres',
    ];
}
