<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request, Post $post)
    {
        $validated = $request->validate([
            'content' => ['required', 'string', 'max:2000'],
            'parent_id' => ['nullable', 'exists:comments,id'],
        ]);

        $comment = $post->comments()->create([
            'user_id' => auth()->id(),
            'parent_id' => $validated['parent_id'] ?? null,
            'content' => $validated['content'],
            'is_approved' => true,
        ]);

        // Incrementar contador
        $post->increment('comments_count');

        return back()->with('success', 'Comentario publicado correctamente.');
    }

    public function destroy(Comment $comment)
    {
        if (!$comment->canBeEditedBy(auth()->user())) {
            abort(403);
        }

        $post = $comment->post;
        $comment->delete();

        // Decrementar contador
        $post->decrement('comments_count');

        return back()->with('success', 'Comentario eliminado correctamente.');
    }
}
