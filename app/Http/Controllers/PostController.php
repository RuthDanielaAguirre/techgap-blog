<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $query = Post::published()
            ->with(['user', 'category', 'tags']);

        // Filtro por categoría
        if ($request->has('category')) {
            $query->byCategory($request->category);
        }

        // Filtro por tag
        if ($request->has('tag')) {
            $query->byTag($request->tag);
        }

        // Búsqueda
        if ($request->has('search')) {
            $query->search($request->search);
        }

        // Ordenamiento
        $sortBy = $request->get('sort', 'latest');
        match ($sortBy) {
            'popular' => $query->orderByDesc('views_count'),
            'trending' => $query->orderByDesc('likes_count'),
            default => $query->latest('published_at'),
        };

        $posts = $query->paginate(12);

        $categories = Category::active()
            ->ordered()
            ->withCount(['posts' => function ($q) {
                $q->published();
            }])
            ->get();

        $popularTags = Tag::withCount(['posts' => function ($q) {
                $q->published();
            }])
            ->orderByDesc('posts_count')
            ->take(15)
            ->get();

        return view('pages.blogView.posts.index', compact('posts', 'categories', 'popularTags'));
    }

    public function show(Post $post)
    {
        // Solo mostrar posts publicados (excepto si es el autor o admin)
        if (!$post->isPublished() && 
            (!auth()->check() || !$post->canBeEditedBy(auth()->user()))) {
            abort(404);
        }

        // Incrementar vistas
        $post->incrementViews();

        // Cargar relaciones
        $post->load([
            'user',
            'category',
            'tags',
            'comments' => function ($query) {
                $query->approved()
                    ->parents()
                    ->with(['user', 'replies.user'])
                    ->latest();
            }
        ]);

        // Posts relacionados
        $relatedPosts = Post::published()
            ->where('id', '!=', $post->id)
            ->where(function ($query) use ($post) {
                $query->where('category_id', $post->category_id)
                    ->orWhereHas('tags', function ($q) use ($post) {
                        $q->whereIn('tags.id', $post->tags->pluck('id'));
                    });
            })
            ->with(['user', 'category'])
            ->limit(3)
            ->get();

        return view('pages.blogView.posts.show', compact('post', 'relatedPosts'));
    }

    public function byCategory(Category $category)
    {
        $posts = Post::published()
            ->where('category_id', $category->id)
            ->with(['user', 'category', 'tags'])
            ->latest('published_at')
            ->paginate(12);

        return view('pages.blogView.posts.category', compact('category', 'posts'));
    }

    public function byTag(Tag $tag)
    {
        $posts = $tag->posts()
            ->published()
            ->with(['user', 'category', 'tags'])
            ->latest('published_at')
            ->paginate(12);

        return view('pages.blogView.posts.tag', compact('tag', 'posts'));
    }
}
