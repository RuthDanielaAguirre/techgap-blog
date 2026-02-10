<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function toggle(Post $post)
    {
        $user = auth()->user();

        // Verificar si ya dio like
        $like = $user->likes()->where('post_id', $post->id)->first();

        if ($like) {
            // Quitar like
            $like->delete();
            $post->decrement('likes_count');
            $liked = false;
        } else {
            // Dar like
            $user->likes()->create(['post_id' => $post->id]);
            $post->increment('likes_count');
            $liked = true;

            // Verificar milestones
            $post->fresh()->checkMilestones();
        }

        // Si es AJAX, devolver JSON
        if (request()->wantsJson()) {
            return response()->json([
                'liked' => $liked,
                'likes_count' => $post->fresh()->likes_count,
            ]);
        }

        return back();
    }
}
