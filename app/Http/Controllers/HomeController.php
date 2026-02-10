<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $featuredPosts = Post::published()
            ->featured()
            ->with(['user', 'category', 'tags'])
            ->latest('published_at')
            ->take(3)
            ->get();

        $latestPosts = Post::published()
            ->with(['user', 'category', 'tags'])
            ->latest('published_at')
            ->take(4)
            ->get();

        $popularPosts = Post::published()
            ->with(['user', 'category'])
            ->popular(5)
            ->get();

        $categories = Category::active()
            ->ordered()
            ->withCount(['posts' => function ($query) {
                $query->published();
            }])
            ->get();

        return view('blog.home', compact(
            'featuredPosts',
            'latestPosts',
            'popularPosts',
            'categories'
        ));

        // return view('pages.blogView.home', compact(
        //     'featuredPosts',
        //     'latestPosts',
        //     'popularPosts',
        //     'categories'
        // ));
    }

    public function contact()
    {
        return view('blog.contact');
        // return view('pages.blogView.contact');
    }

    public function about()
    {
        return view('blog.about');
        // return view('pages.blogView.about');
    }
}
