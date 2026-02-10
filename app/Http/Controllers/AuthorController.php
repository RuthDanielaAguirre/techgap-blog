<?php

namespace App\Http\Controllers;

use App\Models\User;

class AuthorController extends Controller
{
    public function show(User $user) 
    { 
        $stats = [ 
            'posts_count' => $user->posts()->count(), 
            'comments_count' => $user->comments()->count(), 
            'total_views' => $user->posts()->sum('views_count'), 
            'total_likes' => $user->posts()->sum('likes_count'), 
        ]; 
        
        return view('author.show', compact('user', 'stats')); 
    }
}
