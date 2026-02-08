<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? 'TechGap - Blog de Tecnología' }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body class="antialiased bg-[#0F172A] text-white">

    <div class="min-h-screen flex items-center justify-center px-4 py-20 bg-linear-to-b from-[#0F172A] to-[#020617]">

        <div class="w-full max-w-md space-y-10">

            <!-- Logo + Header -->
            <div class="text-center">
                {{-- <div class="flex justify-center">
                    <div class="w-20 h-20 bg-[#1BBF9B] rounded-2xl flex items-center justify-center shadow-xl shadow-[#1BBF9B]/20">
                        <img src="{{ asset('images/logo-light.png') }}" alt="TechGap" class="w-14 h-14 object-contain">
                    </div>
                </div> --}}

                <div class="flex justify-center">
                    <img src="{{ asset('images/logo-dark.png') }}" alt="TechGap" class="w-32 h-32 object-contain">
                </div>


                <h2 class="mt-6 text-3xl font-extrabold text-white">
                    Bienvenido de nuevo
                </h2>

                <p class="mt-2 text-sm text-gray-300">
                    ¿No tienes cuenta?
                    <a href="{{ route('register') }}" class="font-semibold text-[#1BBF9B] hover:text-[#17a988] transition">
                        Regístrate gratis
                    </a>
                </p>
            </div>

            <!-- Form Card -->
            <div class="bg-[#111b2f] border border-[#1BBF9B]/20 rounded-2xl shadow-2xl p-8 backdrop-blur-sm">

                @if ($errors->any())
                    <div class="mb-6 bg-red-900/30 border-l-4 border-red-500 p-4 rounded-lg">
                        <div class="flex items-center">
                            <svg class="w-5 h-5 text-red-400 mr-3" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path>
                            </svg>
                            <p class="text-red-300 text-sm font-medium">{{ $errors->first() }}</p>
                        </div>
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}" class="space-y-6">
                    @csrf

                    <!-- Email -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-300 mb-2">
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
                                class="block w-full px-4 pl-10 pr-3 py-3 bg-[#0F172A] border border-gray-700 rounded-lg text-gray-200 placeholder-gray-500 focus:ring-2 focus:ring-[#1BBF9B] focus:border-transparent transition"
                                placeholder="tu@email.com"
                            >
                        </div>
                    </div>

                    <!-- Password -->
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-300 mb-2">
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
                                class="block w-full pl-10 pr-10 py-3 bg-[#0F172A] border border-gray-700 rounded-lg text-gray-200 placeholder-gray-500 focus:ring-2 focus:ring-[#1BBF9B] focus:border-transparent transition"
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

                    <!-- Remember & Forgot -->
                    <div class="flex items-center justify-between">
                        <label class="flex items-center space-x-2 text-gray-300">
                            <input 
                                id="remember" 
                                name="remember" 
                                type="checkbox"
                                class="h-4 w-4 text-[#1BBF9B] focus:ring-[#1BBF9B] border-gray-600 bg-[#0F172A] rounded"
                            >
                            <span class="text-sm">Recuérdame</span>
                        </label>

                        <a href="#" class="text-sm font-medium text-[#1BBF9B] hover:text-[#17a988] transition">
                            ¿Olvidaste tu contraseña?
                        </a>
                    </div>

                    <!-- Submit Button -->
                    <button 
                        type="submit"
                        class="w-full py-3 px-4 rounded-lg font-semibold bg-[#1BBF9B] text-[#020617]
                               hover:bg-[#17a988] transition shadow-lg hover:shadow-xl flex items-center justify-center gap-2"
                    >
                        <svg class="h-5 w-5 text-[#020617]" fill="currentColor">
                            <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd"></path>
                        </svg>
                        Iniciar Sesión
                    </button>

                </form>
            </div>
        </div>
    </div>

</body>
</html>
