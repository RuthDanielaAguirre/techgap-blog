<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show()
    {
        $user = auth()->user();
        
        // Estadísticas del usuario
        $stats = [
            'posts_count' => $user->posts()->count(),
            'comments_count' => $user->comments()->count(),
            'total_views' => $user->posts()->sum('views_count'),
            'total_likes' => $user->posts()->sum('likes_count'),
        ];

        return view('profile.show', compact('user', 'stats'));
    }

    public function edit()
    {
        $user = auth()->user();
        return view('profile.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $user = auth()->user();

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'email', 'max:120', 'unique:users,email,' . $user->id],
            'bio' => ['nullable', 'string', 'max:500'],
            'website' => ['nullable', 'url', 'max:255'],
            'avatar' => ['nullable', 'image', 'max:1024'], // 1MB max
        ]);

        // Procesar avatar si se subió
        if ($request->hasFile('avatar')) {
            // Eliminar avatar anterior si existe
            if ($user->avatar && \Storage::disk('public')->exists($user->avatar)) {
                \Storage::disk('public')->delete($user->avatar);
            }

            $avatarPath = $request->file('avatar')->store('avatars', 'public');
            $validated['avatar'] = $avatarPath;
        }

        $user->update($validated);

        return redirect()->route('profile.show')->with('success', '¡Perfil actualizado correctamente!');
    }

    public function updatePassword(Request $request)
    {
        $validated = $request->validate([
            'current_password' => ['required', 'current_password'],
            'password' => ['required', 'confirmed', Password::min(8)->letters()->numbers()],
        ]);

        $user = auth()->user();
        $user->update([
            'password' => Hash::make($validated['password'])
        ]);

        return back()->with('success', '¡Contraseña actualizada correctamente!');
    }

    public function deleteAccount(Request $request)
    {
        $request->validate([
            'password' => ['required', 'current_password'],
        ]);

        $user = auth()->user();
        
        // Eliminar avatar si existe
        if ($user->avatar && \Storage::disk('public')->exists($user->avatar)) {
            \Storage::disk('public')->delete($user->avatar);
        }

        // Logout
        auth()->logout();

        // Soft delete
        $user->delete();

        return redirect()->route('home')->with('success', 'Tu cuenta ha sido eliminada correctamente.');
    }
}
