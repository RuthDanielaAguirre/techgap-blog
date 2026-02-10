<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class BookmarkController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function toggle(Post $post)
    {
        $user = auth()->user();

        // Verificar si ya guardó el post
        $bookmark = $user->bookmarks()->where('post_id', $post->id)->first();

        if ($bookmark) {
            // Quitar bookmark
            $bookmark->delete();
            $bookmarked = false;
            $message = 'Post eliminado de guardados';
        } else {
            // Guardar post
            $user->bookmarks()->create(['post_id' => $post->id]);
            $bookmarked = true;
            $message = 'Post guardado correctamente';
        }

        // Si es AJAX, devolver JSON
        if (request()->wantsJson()) {
            return response()->json([
                'bookmarked' => $bookmarked,
                'message' => $message,
            ]);
        }

        return back()->with('success', $message);
    }

    public function index()
    {
        $user = auth()->user();
        $bookmarkedPosts = $user->bookmarkedPosts()
            ->with(['category', 'user', 'tags'])
            ->latest('bookmarks.created_at')
            ->paginate(12);

        return view('bookmarks.index', compact('bookmarkedPosts'));
    }
}
