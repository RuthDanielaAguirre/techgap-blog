<!-- Navbar -->
<nav class="bg-white border-b border-gray-200 sticky top-0 z-50 shadow-sm" x-data="{ open: false }">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            <div class="flex-shrink-0 flex items-center">
                <a href="{{ route('home') }}" class="flex items-center space-x-3">
                    <div class="w-10 h-10 bg-gradient-to-br from-techgap-500 to-techgap-700 rounded-lg flex items-center justify-center">
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
                <a href="{{ route('about') }}" class="text-gray-700 hover:text-techgap-600 rounded-xl hover:bg-gray-200 px-3 py-2 text-sm font-medium transition">
                    Sobre Nosotros
                </a>
                <a href="{{ route('contact') }}" class="text-gray-700 hover:text-techgap-600 rounded-xl hover:bg-gray-200 px-3 py-2 text-sm font-medium transition">
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
                        
                        <div x-show="open" @click.away="open = false" class="absolute right-0 mt-2 w-48 bg-white border border-gray-200 rounded-lg shadow-lg py-1 z-50" x-transition>
                            <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Perfil</a>
                            <form method="POST" action="{{ route('logout') }}" class="block">
                                @csrf
                                <button type="submit" class="w-full text-left px-4 py-2 text-gray-700 hover:bg-gray-100">
                                    Cerrar Sesión
                                </button>
                            </form>
                        </div>
                    </div>
                @endguest
            </div>

            <!-- Mobile menu button -->
            <div class="md:hidden">
                <button @click="open = !open" type="button" class="bg-gray-100 inline-flex items-center justify-center p-2 rounded-md text-gray-600 hover:text-gray-900 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-techgap-500">
                    <svg class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </div>

        <!-- Mobile menu -->
        <div x-show="open" class="md:hidden border-t border-gray-200" x-transition>
            <div class="px-2 pt-2 pb-3 space-y-1">
                <a href="{{ route('home') }}" class="block px-3 py-2 text-gray-700 hover:bg-gray-100 rounded-md">Inicio</a>
                <a href="{{ route('posts.index') }}" class="block px-3 py-2 text-gray-700 hover:bg-gray-100 rounded-md">Artículos</a>
                <a href="{{ route('about') }}" class="block px-3 py-2 text-gray-700 hover:bg-gray-100 rounded-md">Sobre Nosotros</a>
                <a href="{{ route('contact') }}" class="block px-3 py-2 text-gray-700 hover:bg-gray-100 rounded-md">Contacto</a>
                @guest
                    <a href="{{ route('login') }}" class="block px-3 py-2 text-gray-700 hover:bg-gray-100 rounded-md">Iniciar Sesión</a>
                    <a href="{{ route('register') }}" class="block px-3 py-2 text-gray-700 hover:bg-gray-100 rounded-md">Registrarse</a>
                @else
                    <a href="#" class="block px-3 py-2 text-gray-700 hover:bg-gray-100 rounded-md">Perfil</a>
                    <form method="POST" action="{{ route('logout') }}" class="block">
                        @csrf
                        <button type="submit" class="w-full text-left px-3 py-2 text-gray-700 hover:bg-gray-100 rounded-md">
                            Cerrar Sesión
                        </button>
                    </form>
                @endguest
            </div>
        </div>
    </div>
</nav>