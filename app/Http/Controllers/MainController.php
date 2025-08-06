<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        $posts = Post::paginate();
        return inertia('Main/Index', ['posts' => $posts]);
    }
    public function postCreate()
    {
        return inertia('Main/createPost');
    }
    public function store(Request $request)
    {
        // Валидация данных
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'author_name' => 'required|string|max:255',
            'image_url' => 'nullable|url',
            'genres' => 'nullable|string',
        ]);

        // Создание поста с автоматическим временем создания
        Post::create($validated);

        // Редирект с сообщением об успехе
        return redirect()->route('main.index')->with('success', 'Пост успешно создан!');
    }
    public function delete(Post $post)
    {
        $post->delete();
        return redirect()->route('main.index');
    }
    public function edit(Post $post)
    {
        return inertia('Main/editPost', ['post' => $post]);
    }
    public function update(Request $request, Post $post){
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'author_name' => 'required|string|max:255',
            'image_url' => 'nullable|url',
            'genres' => 'nullable|string',
        ]);
        $post->fill($validated);
        $post->save();
        return redirect()->route('main.index');

    }
}
