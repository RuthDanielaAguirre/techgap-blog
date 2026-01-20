<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Category;

class PostController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('name')->get();

        $posts = Post::with(['user', 'category'])
            ->whereNotNull('published_at')
            ->latest('published_at')
            ->paginate(10);

            return view('pages.blogView.index', compact('posts', 'categories'));
    }


    public function show($slug)
    {
        $post = Post::with(['user', 'category', 'comments.user'])
            ->where('slug', $slug)
            ->firstOrFail();

        return view('pages.blogView.show', compact('post'));
    }
}
