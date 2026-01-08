<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with(['user', 'category'])
            ->whereNotNull('published_at')
            ->latest('published_at')
            ->paginate(10);

            return view('posts.index', compact('posts'));
    }


    public function show($slug)
    {
        $post = Post::with(['user', 'category', 'comments.user'])
            ->where('slug', $slug)
            ->firstOrFail();

        return view('posts.show', compact('post'));
    }
}
