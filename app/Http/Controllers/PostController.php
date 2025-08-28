<?php

namespace App\Http\Controllers;

use App\Models\Chapter;
use App\Models\ChapterImage;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Post $post)
    {
        $chapters = $post->chapters()->orderBy('chapter_number')->get();
        return inertia('Post/SinglePost',
            ['post'=>$post, 'chapters' => $chapters, 'isPostPage' => true]);
    }
    public function createChapter(Post $post)
    {
        return inertia('Post/CreateChapter', [
            'post' => $post,
        ]);
    }
    public function storeChapter(Request $request, Post $post)
    {
        $request->validate([
            'chapter_title' => 'nullable|string|max:255',
            'image_urls' => 'required|string',
        ]);

        $lastChapter = $post->chapters()->orderBy('chapter_number', 'desc')->first();
        $nextChapterNumber = $lastChapter ? $lastChapter->chapter_number + 1 : 1;

        $chapter = Chapter::create([
            'post_id' => $post->id,
            'chapter_number' => $nextChapterNumber,
            'chapter_title' => $request->input('chapter_title'),
        ]);

        $imageUrls = preg_split('/\r\n|\r|\n/', $request->input('image_urls'));
        $pageNumber = 1;

        foreach ($imageUrls as $imageUrl) {
            if (trim($imageUrl) === '') {
                continue;
            }

            ChapterImage::create([
                'chapter_id' => $chapter->id,
                'image_path' => $imageUrl,
                'page_number' => $pageNumber,
            ]);
            $pageNumber++;
        }

        return redirect()->route('post.index', $post->id);
    }
}
