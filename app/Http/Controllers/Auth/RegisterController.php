<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'string', 'email', 'max:120', 'unique:users'],
            'password' => ['required', 'confirmed', Password::min(8)
                ->letters()
                ->numbers()
            ],
        ]);

        // Obtener el rol de subscriber
        $subscriberRole = Role::where('name', 'subscriber')->first();

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role_id' => $subscriberRole->id,
            'is_active' => true,
        ]);

        // Autenticar automáticamente
        Auth::login($user);

        return redirect('/')->with('success', '¡Bienvenido a TechGap! Tu cuenta ha sido creada exitosamente.');
    }
}
