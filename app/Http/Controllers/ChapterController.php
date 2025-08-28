<?php

namespace App\Http\Controllers;

use App\Models\Chapter;
use Illuminate\Http\Request;

class ChapterController extends Controller
{
    public function read(Chapter $chapter)
    {
        $images = $chapter->images()->orderBy('page_number')->get();

        $post = $chapter->post;

        $chapters = $post->chapters()->orderBy('chapter_number')->get();

        return inertia('Post/ReadChapter', [
            'chapter' => $chapter,
            'images' => $images,
            'chapters' => $chapters,
        ]);
    }
}
