<?php

namespace App\Http\Controllers;

use App\Models\Chapter;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Post $post, Chapter $chapter)
    {
        $chapters = $post->chapters()->orderBy('chapter_number')->get();
        return inertia('Post/SinglePost',['post'=>$post, 'chapters' => $chapters,]);
    }
}
