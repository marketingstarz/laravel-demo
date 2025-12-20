<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->paginate(10);
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'body'  => ['nullable', 'string'],
        ]);

        $post = Post::create($validated);

        logger()->info('Post created locally', ['id' => $post->id]);

        return redirect()->route('posts.index')->with('status', 'Post created');
    }

    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'body'  => ['nullable', 'string'],
        ]);

        $post->update($validated);

        logger()->info('Post updated locally', ['id' => $post->id]);

        return redirect()->route('posts.index')->with('status', 'Post updated');
    }

    public function destroy(Post $post)
    {
        $id = $post->id;
        $post->delete();

        logger()->info('Post deleted locally', ['id' => $id]);

        return redirect()->route('posts.index')->with('status', 'Post deleted');
    }

    // Optional:
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }
}
