<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
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

        // Obtener rol subscriber
        $subscriberRole = Role::where('name', 'subscriber')->first();

        if (!$subscriberRole) {
            return back()->with('error', 'Error en la configuración del sistema. Por favor contacte al administrador.');
        }

        // Generar username automáticamente
        $username = Str::slug($validated['name']);

        if (empty($username)) {
            $username = 'user' . rand(1000, 9999);
        }

        // Asegurar unicidad
        $base = $username;
        $counter = 1;

        while (User::where('username', $username)->exists()) {
            $username = $base . $counter;
            $counter++;
        }

        // Crear usuario
        $user = User::create([
            'name' => $validated['name'],
            'username' => $username,
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role_id' => $subscriberRole->id,
            'is_active' => true,
        ]);

        Auth::login($user);

        return redirect('/')->with('success', '¡Bienvenido a TechGap! Tu cuenta ha sido creada exitosamente.');
    }
}
