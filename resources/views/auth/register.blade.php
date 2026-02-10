<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Crear cuenta — TechGap</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body class="antialiased">

    {{-- =========================
        FONDO TECH OSCURO SUAVE
    ========================= --}}
    <div class="absolute inset-0 w-full h-full">

        {{-- Imagen tech oscura --}}
        <img 
            src="https://images.unsplash.com/photo-1632893692623-42fa7ce5d82f?q=80&w=1470&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
            class="w-full h-full object-cover"
        >

        {{-- Degradado tech elegante --}}
        <div class="absolute inset-0 bg-linear-to-br from-[#0F172A]/90 via-[#0A1220]/85 to-[#020617]/90"></div>

        {{-- Capa de brillo suave --}}
        <div class="absolute inset-0 bg-white/5 backdrop-blur-[2px]"></div>
    </div>

    {{-- =========================
        CONTENIDO CENTRADO
    ========================= --}}
    <div class="relative min-h-screen flex items-center justify-center px-6">

        <div class="w-full max-w-md">

            {{-- Logo --}}
            <div class="text-center mb-10">
                <div class="flex justify-center">
                    <div class="w-32 h-32 bg-gray-300 rounded-2xl flex items-center justify-center shadow-xl shadow-[#1BBF9B]/20">
                        <img src="{{ asset('images/logo-light.png') }}" alt="TechGap" class="w-32 h-32 object-contain">
                    </div>
                </div>
            </div>

            {{-- =========================
                CARD GLASS PREMIUM
            ========================= --}}
            <div class="bg-white/10 backdrop-blur-xl border border-white/20 rounded-2xl shadow-2xl p-8">

                <h2 class="text-2xl font-bold text-white text-center mb-6">
                    Crear cuenta
                </h2>

                @if ($errors->any())
                    <div class="mb-6 bg-red-500/20 border border-red-400/40 p-4 rounded-lg">
                        <p class="text-red-200 text-sm font-medium">Corrige los siguientes errores:</p>
                        <ul class="mt-2 text-red-200 text-xs space-y-1">
                            @foreach ($errors->all() as $error)
                                <li>• {{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('register') }}" class="space-y-6">
                    @csrf

                    {{-- Nombre --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-200 mb-2">
                            Nombre completo
                        </label>

                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 12a5 5 0 100-10 5 5 0 000 10zm7 9a7 7 0 10-14 0h14z" />
                                </svg>
                            </div>

                            <input 
                                type="text"
                                name="name"
                                value="{{ old('name') }}"
                                required
                                class="block w-full px-4 pl-10 pr-3 py-3 rounded-lg bg-white/15 border border-white/30 
                                    text-white placeholder-gray-300 focus:outline-none focus:ring-2 focus:ring-[#1BBF9B] 
                                    focus:border-transparent transition"
                                placeholder="Tu nombre"
                            >
                        </div>
                    </div>

                    {{-- Email --}}
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-200 mb-2">
                            Correo electrónico
                        </label>

                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"></path>
                                </svg>
                            </div>

                            <input 
                                id="email" 
                                name="email" 
                                type="email" 
                                required 
                                value="{{ old('email') }}"
                                class="block w-full px-4 pl-10 pr-3 py-3 rounded-lg bg-white/15 border border-white/30 text-white placeholder-gray-300 focus:outline-none focus:ring-2 focus:ring-[#1BBF9B] focus:border-transparent transition"
                                placeholder="tu@email.com"
                            >
                        </div>
                    </div>

                    {{-- Password --}}
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-200 mb-2">
                            Contraseña
                        </label>

                        <div class="relative" x-data="{ show: false }">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                                </svg>
                            </div>

                             <input 
                                id="password" 
                                name="password" 
                                :type="show ? 'text' : 'password'"
                                required
                                class="block w-full pl-10 pr-10 py-3 rounded-lg bg-white/15 border border-white/30 text-white placeholder-gray-300 focus:outline-none focus:ring-2 focus:ring-[#1BBF9B] focus:border-transparent transition"
                                placeholder="••••••••"
                            >

                            <button 
                                type="button"
                                @click="show = !show"
                                class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-gray-200"
                            >
                                <svg x-show="!show" class="h-5 w-5" fill="none" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                </svg>

                                <svg x-show="show" class="h-5 w-5" fill="none" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59"></path>
                                </svg>
                            </button>
                        </div>
                    </div>

                    {{-- Confirm Password --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-200 mb-2">
                            Confirmar contraseña
                        </label>

                        <div class="relative" x-data="{ showConfirm: false }">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                                </svg>
                            </div>

                            <input 
                                :type="showConfirm ? 'text' : 'password'"
                                name="password_confirmation"
                                required
                                class="block w-full pl-10 pr-10 py-3 rounded-lg bg-white/15 border border-white/30 
                                    text-white placeholder-gray-300 focus:outline-none focus:ring-2 focus:ring-[#1BBF9B] 
                                    focus:border-transparent transition"
                                placeholder="••••••••"
                            >

                            <button 
                                type="button"
                                @click="showConfirm = !showConfirm"
                                class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-gray-200"
                            >
                                <svg x-show="!showConfirm" class="h-5 w-5" fill="none" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 
                                            9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 
                                            0-8.268-2.943-9.542-7z" />
                                </svg>

                                <svg x-show="showConfirm" class="h-5 w-5" fill="none" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 
                                            0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 
                                            3 0 114.243 4.243M9.878 9.878l4.242 
                                            4.242M9.88 9.88l-3.29-3.29m7.532 
                                            7.532l3.29 3.29M3 3l3.59 3.59" />
                                </svg>
                            </button>
                        </div>
                    </div>

                    {{-- Botón --}}
                    <button type="submit" class="w-full py-3 px-4 rounded-lg font-semibold bg-[#1BBF9B] text-[#020617] hover:bg-[#17A988] transition shadow-lg hover:shadow-xl">
                        Crear Cuenta
                    </button>
                </form>

                {{-- Login --}}
                <p class="text-center text-gray-300 text-sm mt-6">
                    ¿Ya tienes una cuenta?
                    <a href="{{ route('login') }}" class="text-[#1BBF9B] hover:text-[#17A988] font-semibold">
                        Inicia sesión
                    </a>
                </p>

            </div>
        </div>

    </div>

</body>
</html>
