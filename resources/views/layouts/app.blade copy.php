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
<body class="antialiased bg-gray-50">
    <!-- Navbar -->
    <nav class="bg-white/95 backdrop-blur-md border-b border-gray-200 sticky top-0 z-50 shadow-sm" 
         x-data="{ mobileOpen: false }">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <!-- Left Side: Logo & Navigation -->
                <div class="flex items-center space-x-8">
                    <!-- Logo -->
                    <a href="{{ route('home') }}" class="flex items-center space-x-3 group">
                        <div class="w-10 h-10 bg-gradient-to-br from-techgap-500 to-techgap-700 rounded-xl flex items-center justify-center shadow-md group-hover:shadow-lg transition-all duration-300 group-hover:scale-110">
                            <span class="text-white font-bold text-xl">T</span>
                        </div>
                        <div class="hidden sm:block">
                            <span class="text-xl font-bold bg-gradient-to-r from-techgap-600 to-techgap-800 bg-clip-text text-transparent">
                                TechGap
                            </span>
                            <p class="text-xs text-gray-500 -mt-1 font-medium">Tech Knowledge</p>
                        </div>
                    </a>

                    <!-- Desktop Navigation -->
                    <div class="hidden md:flex md:items-center md:space-x-2">
                        <a href="{{ route('home') }}" 
                           class="group px-4 py-2 text-sm font-medium rounded-lg transition-all duration-200 {{ request()->routeIs('home') ? 'bg-techgap-50 text-techgap-700' : 'text-gray-700 hover:bg-gray-50 hover:text-techgap-600' }}">
                            <span class="inline-block group-hover:scale-110 transition-transform">🏠</span> Inicio
                        </a>
                        <a href="{{ route('posts.index') }}" 
                           class="group px-4 py-2 text-sm font-medium rounded-lg transition-all duration-200 {{ request()->routeIs('posts.*') && !request()->routeIs('posts.show') ? 'bg-techgap-50 text-techgap-700' : 'text-gray-700 hover:bg-gray-50 hover:text-techgap-600' }}">
                            <span class="inline-block group-hover:scale-110 transition-transform">📚</span> Artículos
                        </a>
                    </div>
                </div>

                <!-- Right Side: Auth Section -->
                <div class="hidden md:flex md:items-center md:space-x-3">
                    @guest
                        <!-- Guest Users -->
                        <a href="{{ route('login') }}" 
                           class="px-4 py-2 text-sm font-medium text-gray-700 hover:text-techgap-600 rounded-lg hover:bg-gray-50 transition-all duration-200">
                            Iniciar Sesión
                        </a>
                        <a href="{{ route('register') }}" 
                           class="px-5 py-2.5 bg-gradient-to-r from-techgap-600 to-techgap-700 hover:from-techgap-700 hover:to-techgap-800 text-white text-sm font-semibold rounded-lg transition-all duration-200 shadow-md hover:shadow-xl transform hover:-translate-y-0.5">
                            <span class="flex items-center space-x-2">
                                <span>Registrarse</span>
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                                </svg>
                            </span>
                        </a>
                    @else
                        <!-- Authenticated User Menu -->
                        <div class="relative" x-data="{ open: false }">
                            <button @click="open = !open" 
                                    class="flex items-center space-x-3 px-3 py-2 rounded-lg hover:bg-gray-50 transition-all duration-200 group">
                                <!-- Avatar -->
                                <div class="relative">
                                    <div class="w-10 h-10 bg-gradient-to-br from-techgap-400 via-techgap-500 to-techgap-600 rounded-full flex items-center justify-center text-white font-bold shadow-md group-hover:shadow-lg transition-all duration-200 ring-2 ring-white group-hover:ring-techgap-200">
                                        {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                                    </div>
                                    <!-- Online Indicator -->
                                    <div class="absolute -bottom-0.5 -right-0.5 w-3 h-3 bg-green-500 rounded-full border-2 border-white"></div>
                                </div>
                                
                                <!-- User Info (Desktop) -->
                                <div class="hidden lg:block text-left">
                                    <p class="text-sm font-semibold text-gray-900 leading-tight">{{ Str::limit(auth()->user()->name, 20) }}</p>
                                    <p class="text-xs text-gray-500">{{ auth()->user()->role->display_name }}</p>
                                </div>
                                
                                <!-- Dropdown Arrow -->
                                <svg class="w-4 h-4 text-gray-500 transition-transform duration-200" 
                                     :class="{ 'rotate-180': open }"
                                     fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </button>

                            <!-- Dropdown Menu -->
                            <div x-show="open" 
                                 @click.away="open = false"
                                 x-transition:enter="transition ease-out duration-200"
                                 x-transition:enter-start="opacity-0 scale-95 -translate-y-2"
                                 x-transition:enter-end="opacity-100 scale-100 translate-y-0"
                                 x-transition:leave="transition ease-in duration-150"
                                 x-transition:leave-start="opacity-100 scale-100"
                                 x-transition:leave-end="opacity-0 scale-95"
                                 class="absolute right-0 mt-3 w-72 bg-white rounded-2xl shadow-2xl border border-gray-100 overflow-hidden"
                                 style="display: none;">
                                
                                <!-- User Info Header -->
                                <div class="px-5 py-4 bg-gradient-to-br from-techgap-50 to-blue-50 border-b border-gray-100">
                                    <div class="flex items-center space-x-3">
                                        <div class="w-12 h-12 bg-gradient-to-br from-techgap-400 to-techgap-600 rounded-full flex items-center justify-center text-white font-bold text-lg shadow-md">
                                            {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                                        </div>
                                        <div class="flex-1 min-w-0">
                                            <p class="text-sm font-bold text-gray-900 truncate">{{ auth()->user()->name }}</p>
                                            <p class="text-xs text-gray-600 truncate">{{ auth()->user()->email }}</p>
                                            <span class="inline-block mt-1 px-2 py-0.5 text-xs font-semibold rounded-full
                                                {{ auth()->user()->isAdmin() ? 'bg-red-100 text-red-700' : 
                                                   (auth()->user()->isWriter() ? 'bg-amber-100 text-amber-700' : 
                                                   'bg-green-100 text-green-700') }}">
                                                {{ auth()->user()->role->display_name }}
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <!-- Menu Items -->
                                <div class="py-2">
                                    <!-- Profile -->
                                    <a href="#" class="group flex items-center px-4 py-3 text-sm text-gray-700 hover:bg-gradient-to-r hover:from-techgap-50 hover:to-transparent transition-all duration-200">
                                        <div class="w-9 h-9 bg-gray-100 group-hover:bg-techgap-100 rounded-lg flex items-center justify-center mr-3 transition-colors duration-200">
                                            <svg class="w-5 h-5 text-gray-600 group-hover:text-techgap-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                            </svg>
                                        </div>
                                        <div>
                                            <p class="font-medium">Mi Perfil</p>
                                            <p class="text-xs text-gray-500">Ver y editar información</p>
                                        </div>
                                    </a>

                                    <!-- Liked Posts (Para después) -->
                                    <a href="#" class="group flex items-center px-4 py-3 text-sm text-gray-700 hover:bg-gradient-to-r hover:from-red-50 hover:to-transparent transition-all duration-200">
                                        <div class="w-9 h-9 bg-gray-100 group-hover:bg-red-100 rounded-lg flex items-center justify-center mr-3 transition-colors duration-200">
                                            <svg class="w-5 h-5 text-gray-600 group-hover:text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                                            </svg>
                                        </div>
                                        <div>
                                            <p class="font-medium">Posts Favoritos</p>
                                            <p class="text-xs text-gray-500">Artículos que te gustaron</p>
                                        </div>
                                    </a>

                                    @if(auth()->user()->isSubscriber())
                                        <!-- Request Writer (Solo para Subscribers) -->
                                        <div class="border-t border-gray-100 my-2"></div>
                                        <a href="#" class="group flex items-center px-4 py-3 text-sm text-gray-700 hover:bg-gradient-to-r hover:from-amber-50 hover:to-transparent transition-all duration-200">
                                            <div class="w-9 h-9 bg-gray-100 group-hover:bg-amber-100 rounded-lg flex items-center justify-center mr-3 transition-colors duration-200">
                                                <svg class="w-5 h-5 text-gray-600 group-hover:text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                                </svg>
                                            </div>
                                            <div>
                                                <p class="font-medium">Ser Escritor</p>
                                                <p class="text-xs text-gray-500">Solicita publicar artículos</p>
                                            </div>
                                        </a>
                                    @endif

                                    @if(auth()->user()->isWriter() || auth()->user()->isAdmin())
                                        <!-- Dashboard Access -->
                                        <div class="border-t border-gray-100 my-2"></div>
                                        <a href="/admin" class="group flex items-center px-4 py-3 text-sm text-white bg-gradient-to-r from-techgap-600 to-techgap-700 hover:from-techgap-700 hover:to-techgap-800 transition-all duration-200 mx-2 rounded-lg shadow-md hover:shadow-lg">
                                            <div class="w-9 h-9 bg-white/20 rounded-lg flex items-center justify-center mr-3">
                                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                                                </svg>
                                            </div>
                                            <div>
                                                <p class="font-semibold">Panel de Control</p>
                                                <p class="text-xs text-techgap-200">Gestiona tus contenidos</p>
                                            </div>
                                        </a>
                                    @endif

                                    <!-- Logout -->
                                    <div class="border-t border-gray-100 mt-2 pt-2">
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <button type="submit" class="group w-full flex items-center px-4 py-3 text-sm text-red-600 hover:bg-red-50 transition-all duration-200">
                                                <div class="w-9 h-9 bg-red-50 group-hover:bg-red-100 rounded-lg flex items-center justify-center mr-3 transition-colors duration-200">
                                                    <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                                                    </svg>
                                                </div>
                                                <div class="text-left">
                                                    <p class="font-medium">Cerrar Sesión</p>
                                                    <p class="text-xs text-red-500">Hasta pronto 👋</p>
                                                </div>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endguest
                </div>

                <!-- Mobile menu button -->
                <div class="md:hidden flex items-center">
                    <button @click="mobileOpen = !mobileOpen" 
                            class="text-gray-700 hover:text-techgap-600 focus:outline-none p-2">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path x-show="!mobileOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                            <path x-show="mobileOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile menu -->
        <div x-show="mobileOpen" 
             x-transition:enter="transition ease-out duration-200"
             x-transition:enter-start="opacity-0 -translate-y-1"
             x-transition:enter-end="opacity-100 translate-y-0"
             class="md:hidden border-t border-gray-200 bg-white"
             style="display: none;">
            <div class="px-4 pt-2 pb-3 space-y-1">
                <a href="{{ route('home') }}" 
                   class="block px-3 py-2 rounded-lg text-base font-medium {{ request()->routeIs('home') ? 'bg-techgap-50 text-techgap-700' : 'text-gray-700 hover:bg-gray-50' }}">
                    🏠 Inicio
                </a>
                <a href="{{ route('posts.index') }}" 
                   class="block px-3 py-2 rounded-lg text-base font-medium {{ request()->routeIs('posts.*') ? 'bg-techgap-50 text-techgap-700' : 'text-gray-700 hover:bg-gray-50' }}">
                    📚 Artículos
                </a>
                @guest
                    <div class="pt-4 border-t border-gray-200 space-y-2">
                        <a href="{{ route('login') }}" class="block px-3 py-2 text-center rounded-lg text-base font-medium text-gray-700 hover:bg-gray-50">
                            Iniciar Sesión
                        </a>
                        <a href="{{ route('register') }}" class="block px-3 py-2 text-center rounded-lg text-base font-semibold bg-techgap-600 text-white hover:bg-techgap-700">
                            Registrarse
                        </a>
                    </div>
                @else
                    <div class="pt-4 border-t border-gray-200">
                        <div class="px-3 py-2">
                            <p class="text-sm font-semibold text-gray-900">{{ auth()->user()->name }}</p>
                            <p class="text-xs text-gray-500">{{ auth()->user()->email }}</p>
                        </div>
                        <a href="#" class="block px-3 py-2 rounded-lg text-base text-gray-700 hover:bg-gray-50">Mi Perfil</a>
                        @if(auth()->user()->isWriter() || auth()->user()->isAdmin())
                            <a href="/admin" class="block px-3 py-2 rounded-lg text-base text-techgap-600 font-medium hover:bg-techgap-50">Panel de Control</a>
                        @endif
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="w-full text-left px-3 py-2 rounded-lg text-base text-red-600 hover:bg-red-50">
                                Cerrar Sesión
                            </button>
                        </form>
                    </div>
                @endguest
            </div>
        </div>
    </nav>

    <!-- Flash Messages -->
    @if(session('success'))
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-4">
            <div class="bg-gradient-to-r from-green-50 to-emerald-50 border-l-4 border-green-500 p-4 rounded-lg shadow-md" 
                 x-data="{ show: true }" 
                 x-show="show"
                 x-transition:enter="transition ease-out duration-300"
                 x-transition:enter-start="opacity-0 transform scale-90"
                 x-transition:enter-end="opacity-100 transform scale-100">
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <svg class="w-6 h-6 text-green-500 mr-3" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                        </svg>
                        <p class="text-green-800 font-medium">{{ session('success') }}</p>
                    </div>
                    <button @click="show = false" class="text-green-500 hover:text-green-700 transition">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    @endif

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gradient-to-br from-gray-900 via-gray-800 to-gray-900 text-gray-300 mt-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <!-- About -->
                <div class="md:col-span-2">
                    <div class="flex items-center space-x-3 mb-4">
                        <div class="w-12 h-12 bg-gradient-to-br from-techgap-500 to-techgap-700 rounded-xl flex items-center justify-center shadow-lg">
                            <span class="text-white font-bold text-2xl">T</span>
                        </div>
                        <div>
                            <span class="text-2xl font-bold text-white">TechGap</span>
                            <p class="text-xs text-gray-400">Tech Knowledge Blog</p>
                        </div>
                    </div>
                    <p class="text-gray-400 mb-4 leading-relaxed">
                        Tu fuente de conocimiento tecnológico. Artículos, tutoriales y las últimas tendencias en desarrollo web, IA, DevOps y más.
                    </p>
                    <div class="flex space-x-3">
                        <a href="#" class="w-10 h-10 bg-gray-800 hover:bg-techgap-600 rounded-lg flex items-center justify-center transition-all duration-200 hover:scale-110">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/></svg>
                        </a>
                        <a href="#" class="w-10 h-10 bg-gray-800 hover:bg-techgap-600 rounded-lg flex items-center justify-center transition-all duration-200 hover:scale-110">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/></svg>
                        </a>
                    </div>
                </div>

                <!-- Links -->
                <div>
                    <h3 class="text-white font-semibold mb-4">Enlaces</h3>
                    <ul class="space-y-2">
                        <li><a href="{{ route('home') }}" class="hover:text-techgap-400 transition">Inicio</a></li>
                        <li><a href="{{ route('posts.index') }}" class="hover:text-techgap-400 transition">Artículos</a></li>
                        <li><a href="#" class="hover:text-techgap-400 transition">Sobre Nosotros</a></li>
                        <li><a href="#" class="hover:text-techgap-400 transition">Contacto</a></li>
                    </ul>
                </div>

                <!-- Categories -->
                <div>
                    <h3 class="text-white font-semibold mb-4">Categorías</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="hover:text-techgap-400 transition">Desarrollo Web</a></li>
                        <li><a href="#" class="hover:text-techgap-400 transition">Inteligencia Artificial</a></li>
                        <li><a href="#" class="hover:text-techgap-400 transition">DevOps</a></li>
                        <li><a href="#" class="hover:text-techgap-400 transition">Seguridad</a></li>
                    </ul>
                </div>
            </div>

            <div class="border-t border-gray-800 mt-8 pt-8 text-center text-gray-400 text-sm">
                <p>&copy; {{ date('Y') }} TechGap. Todos los derechos reservados.</p>
                <p class="mt-2">Hecho con ❤️ para la comunidad tech</p>
            </div>
        </div>
    </footer>
</body>
</html>
