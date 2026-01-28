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
    <nav class="bg-white border-b border-gray-200 sticky top-0 z-50 shadow-sm" x-data="{ open: false }">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <!-- Logo -->
                <div class="flex items-center">
                    <a href="{{ route('home') }}" class="flex items-center space-x-2">
                        <div class="w-10 h-10 from-techgap-500 to-techgap-700 rounded-lg flex items-center justify-center">
                            {{-- <span class="font-bold text-xl">T</span> --}}
                            <img src="{{ asset('images/logo.png') }}" alt="TechGap" class="w-8 h-8 object-contain">
                        </div>
                        <span class="text-2xl font-bold from-techgap-600 to-techgap-800 bg-clip-text">
                            TechGap
                        </span>
                    </a>
                </div>

                <!-- Desktop Navigation -->
                <div class="hidden md:flex md:items-center md:space-x-8">
                    <a href="{{ route('home') }}" class="text-gray-700 hover:text-techgap-600 rounded-xl hover:bg-gray-200 px-3 py-2 text-sm font-medium transition">
                        Inicio
                    </a>
                    <a href="{{ route('posts.index') }}" class="text-gray-700 hover:text-techgap-600 rounded-xl hover:bg-gray-200 px-3 py-2 text-sm font-medium transition">
                        Artículos
                    </a>
                    <a href="{{ route('posts.index') }}" class="text-gray-700 hover:text-techgap-600 rounded-xl hover:bg-gray-200 px-3 py-2 text-sm font-medium transition">
                        Sobre Nosotros
                    </a>
                    <a href="{{ route('posts.index') }}" class="text-gray-700 hover:text-techgap-600 rounded-xl hover:bg-gray-200 px-3 py-2 text-sm font-medium transition">
                        Contacto
                    </a>
                </div>

                <!-- Auth Links -->
                <div class="hidden md:flex md:items-center md:space-x-4">
                    @guest
                        <a href="{{ route('login') }}" class="text-slate-700 rounded-xl bg-indigo-50 hover:bg-indigo-100 hover:text-indigo-800 px-4 py-2 text-sm font-medium transition">
                            Iniciar Sesión
                        </a>
                        <a href="{{ route('register') }}" class="text-slate-700 rounded-xl bg-indigo-50 hover:bg-indigo-100 hover:text-indigo-800 px-4 py-2 text-sm font-medium transition">
                            Registrarse
                        </a>
                    @else
                        <div class="relative" x-data="{ open: false }">
                            <button @click="open = !open" class="flex items-center space-x-3 focus:outline-none">
                                <div class="w-10 h-10 bg-gradient-to-br from-techgap-400 to-techgap-600 rounded-full flex items-center justify-center text-white font-semibold">
                                    {{ substr(auth()->user()->name, 0, 1) }}
                                </div>
                                <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </button>

                            <div x-show="open" @click.away="open = false" 
                                 class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg py-2 border border-gray-200"
                                 x-transition>
                                <div class="px-4 py-2 border-b border-gray-200">
                                    <p class="text-sm font-medium text-gray-900">{{ auth()->user()->name }}</p>
                                    <p class="text-xs text-gray-500">{{ auth()->user()->role->display_name }}</p>
                                </div>
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Mi Perfil</a>
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Mis Posts</a>
                                @auth
                                    @if(auth()->user()->canAccessPanel(app(\Filament\Panel::class)))
                                        <a href="/admin" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Mi Panel</a>
                                    @endif
                                @endauth
                                <form method="POST" action="{{ route('logout') }}" class="block">
                                    @csrf
                                    <button type="submit" class="w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-red-50">
                                        Cerrar Sesión
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endguest
                </div>

                <!-- Mobile menu button -->
                <div class="md:hidden flex items-center">
                    <button @click="open = !open" class="text-gray-700 hover:text-techgap-600 focus:outline-none">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path x-show="!open" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                            <path x-show="open" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile menu -->
        <div x-show="open" class="md:hidden border-t border-gray-200" x-transition>
            <div class="px-2 pt-2 pb-3 space-y-1">
                <a href="{{ route('home') }}" class="block px-3 py-2 text-gray-700 hover:bg-gray-100 rounded-md">Inicio</a>
                <a href="{{ route('posts.index') }}" class="block px-3 py-2 text-gray-700 hover:bg-gray-100 rounded-md">Artículos</a>
                <a href="{{ route('posts.index') }}" class="block px-3 py-2 text-gray-700 hover:bg-gray-100 rounded-md">Sobre Nosotros</a>
                <a href="{{ route('posts.index') }}" class="block px-3 py-2 text-gray-700 hover:bg-gray-100 rounded-md">Contacto</a>
                @guest
                    <a href="{{ route('login') }}" class="block px-3 py-2 text-gray-700 hover:bg-gray-100 rounded-md">Iniciar Sesión</a>
                    <a href="{{ route('register') }}" class="block px-3 py-2 text-techgap-600 font-medium hover:bg-gray-100 rounded-md">Registrarse</a>
                @else
                    <a href="/admin" class="block px-3 py-2 text-gray-700 hover:bg-gray-100 rounded-md">Panel</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="w-full text-left px-3 py-2 text-red-600 hover:bg-red-50 rounded-md">
                            Cerrar Sesión
                        </button>
                    </form>
                @endguest
            </div>
        </div>
    </nav>

    <!-- Flash Messages -->
    @if(session('success'))
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-4">
            <div class="bg-green-50 border-l-4 border-green-500 p-4 rounded-lg" x-data="{ show: true }" x-show="show">
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <svg class="w-5 h-5 text-green-500 mr-3" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                        </svg>
                        <p class="text-green-800 font-medium">{{ session('success') }}</p>
                    </div>
                    <button @click="show = false" class="text-green-500 hover:text-green-700">
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
    <footer class="bg-gray-900 text-gray-300 mt-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <!-- About -->
                <div class="md:col-span-2">
                    <div class="flex items-center space-x-2 mb-4">
                        <div class="w-10 h-10 bg-gradient-to-br from-techgap-500 to-techgap-700 rounded-lg flex items-center justify-center">
                            <span class="text-white font-bold text-xl">TG</span>
                        </div>
                        <span class="text-2xl font-bold text-white">TechGap</span>
                    </div>
                    <p class="text-gray-400 mb-4">
                        Tu fuente de conocimiento tecnológico. Artículos, tutoriales y las últimas tendencias en desarrollo web, IA, DevOps y más.
                    </p>
                </div>
                <!-- Links -->
                <div>
                    <h3 class="text-white font-semibold mb-4">Enlaces</h3>
                    <div class="grid grid-cols-2 gap-6">
                        <ul class="space-y-2">
                            <li><a href="{{ route('home') }}" class="hover:text-techgap-400 transition">Inicio</a></li>
                            <li><a href="{{ route('posts.index') }}" class="hover:text-techgap-400 transition">Artículos</a></li>
                        </ul>
                        <ul class="space-y-2">
                            <li><a href="#" class="hover:text-techgap-400 transition">Sobre Nosotros</a></li>
                            <li><a href="#" class="hover:text-techgap-400 transition">Contacto</a></li>
                        </ul>
                    </div>
                </div>

                <div>
                    <h3 class="text-white font-semibold mb-4">Síguenos</h3>
                    <div class="flex flex-col gap-4">
                        <a href="#" class="flex items-center gap-3 bg-gray-800/50 hover:bg-gray-800/70 px-3 py-2 rounded-lg transition">
                            <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 0C5.37 0 0 5.373 0 12c0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/>
                            </svg>
                            <span class="text-gray-300 font-medium">RuthDanielaAguirre</span>
                        </a>
                        <a href="#" class="flex items-center gap-3 bg-gray-800/50 hover:bg-gray-800/70 px-3 py-2 rounded-lg transition">
                            <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 0C5.37 0 0 5.373 0 12c0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/>
                            </svg>
                            <span class="text-gray-300 font-medium">rovaalemi</span>
                        </a>
                    </div>
                </div>
            </div>

            <div class="border-t border-gray-800 mt-8 pt-8 text-center text-gray-400 text-sm">
                <p>&copy; {{ date('Y') }} TechGap. Todos los derechos reservados.</p>
            </div>
        </div>
    </footer>
</body>
</html>
