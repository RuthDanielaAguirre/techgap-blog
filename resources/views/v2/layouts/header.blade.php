<nav 
    class="sticky top-0 z-50 transition-all duration-300"
    x-data="{ 
        open:false, 
        dropdown:false,
        scrolled:false,
        initialLight: {{ isset($lightHeader) && $lightHeader ? 'true' : 'false' }},
        initialTransparent: {{ isset($transparentHeader) && $transparentHeader ? 'true' : 'false' }}
    }"
    x-init="
        scrolled = window.scrollY > 50
        window.addEventListener('scroll', () => scrolled = window.scrollY > 50)
    "
    :class="[
        initialTransparent
            ? (scrolled ? 'bg-white shadow-sm border-b border-gray-200' : 'bg-transparent border-transparent')
            : (
                initialLight
                    ? (scrolled ? 'bg-white shadow-sm border-b border-gray-200' : 'bg-white border-b border-gray-200')
                    : (scrolled ? 'bg-white shadow-sm border-b border-gray-200' : 'bg-[#0F172A] border-transparent')
            )
    ]"
>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">

            {{-- LOGO --}}
            <a href="{{ route('home') }}" class="flex items-center space-x-2">

                <img 
                    :src="initialTransparent && !scrolled
                        ? '{{ asset('images/logo-dark.png') }}'
                        : (initialLight || scrolled
                            ? '{{ asset('images/logo-light.png') }}'
                            : '{{ asset('images/logo-dark.png') }}')"
                    class="w-12 h-12 object-contain transition"
                >

                <span 
                    class="text-2xl font-bold transition"
                    :class="initialTransparent && !scrolled
                        ? 'text-white'
                        : (initialLight || scrolled ? 'text-gray-900' : 'text-white')"
                >
                    TechGap
                </span>
            </a>

            {{-- NAV LINKS --}}
            <div class="hidden md:flex items-center space-x-8">
                @foreach ([
                    ['Inicio', 'home'],
                    ['Artículos', 'posts.index'],
                    ['Sobre Nosotros', 'about'],
                    ['Contacto', 'contact'],
                ] as [$label, $route])
                    <a 
                        href="{{ route($route) }}"
                        class="px-3 py-2 rounded-xl text-sm font-medium transition"
                        :class="[
                            initialTransparent && !scrolled
                                ? 'text-white hover:text-[#1BBF9B]'
                                : (initialLight || scrolled
                                    ? 'text-gray-700 hover:text-techgap-600 hover:bg-gray-200'
                                    : 'text-gray-300 hover:text-[#1BBF9B] hover:bg-white/10')
                        ]"
                    >
                        {{ $label }}
                    </a>
                @endforeach
            </div>

            {{-- AUTH --}}
            <div class="hidden md:flex items-center space-x-4">

                @guest
                    <a 
                        href="{{ route('login') }}"
                        class="px-4 py-2 rounded-xl text-sm font-medium transition"
                        :class="[
                            initialTransparent && !scrolled
                                ? 'text-white bg-white/10 hover:bg-white/20'
                                : (initialLight || scrolled
                                    ? 'text-slate-700 bg-indigo-50 hover:bg-indigo-100 hover:text-indigo-800'
                                    : 'text-white bg-white/10 hover:bg-white/20')
                        ]"
                    >
                        Iniciar Sesión
                    </a>

                    <a 
                        href="{{ route('register') }}"
                        class="px-4 py-2 rounded-xl text-sm font-medium transition"
                        :class="[
                            initialTransparent && !scrolled
                                ? 'text-white bg-white/10 hover:bg-white/20'
                                : (initialLight || scrolled
                                    ? 'text-slate-700 bg-indigo-50 hover:bg-indigo-100 hover:text-indigo-800'
                                    : 'text-white bg-white/10 hover:bg-white/20')
                        ]"
                    >
                        Registrarse
                    </a>

                @else
                    {{-- USER DROPDOWN --}}
                    <div class="relative" x-data="{ dropdown:false }">

                        <button 
                            @click="dropdown = !dropdown"
                            class="flex flex-col text-left focus:outline-none"
                        >
                            <span 
                                class="text-sm font-semibold transition"
                                :class="initialTransparent && !scrolled
                                    ? 'text-white'
                                    : (initialLight || scrolled ? 'text-gray-900' : 'text-white')"
                            >
                                {{ auth()->user()->name }}
                            </span>

                            @php
                                $roles = [
                                    1 => 'Admin',
                                    2 => 'Writer',
                                    3 => 'Suscriptor',
                                ];
                            @endphp

                            <span 
                                class="text-xs transition"
                                :class="initialTransparent && !scrolled
                                    ? 'text-gray-200'
                                    : (initialLight || scrolled ? 'text-gray-500' : 'text-gray-300')"
                            >
                                {{ $roles[auth()->user()->role_id] ?? 'Usuario' }}
                            </span>
                        </button>

                        {{-- DROPDOWN MENU --}}
                        <div 
                            x-show="dropdown"
                            @click.away="dropdown=false"
                            x-transition
                            class="absolute right-0 mt-2 w-48 rounded-lg shadow-lg py-1 z-50 border"
                            :class="initialTransparent && !scrolled
                                ? 'bg-[#0F172A] border-white/10'
                                : (initialLight || scrolled
                                    ? 'bg-white border-gray-200'
                                    : 'bg-[#0F172A] border-white/10')"
                        >
                            <a 
                                href="{{ route('profile.show') }}"
                                class="block px-4 py-2 text-sm transition"
                                :class="initialTransparent && !scrolled
                                    ? 'text-gray-300 hover:bg-white/10'
                                    : (initialLight || scrolled
                                        ? 'text-gray-700 hover:bg-gray-100'
                                        : 'text-gray-300 hover:bg-white/10')"
                            >
                                Mi Perfil
                            </a>

                            @if(auth()->user()->role_id == 1 || auth()->user()->role_id == 2)
                                <a 
                                    href="{{ route('logout') }}"
                                    class="block px-4 py-2 text-sm transition"
                                    :class="initialTransparent && !scrolled
                                        ? 'text-gray-300 hover:bg-white/10'
                                        : (initialLight || scrolled
                                            ? 'text-gray-700 hover:bg-gray-100'
                                            : 'text-gray-300 hover:bg-white/10')"
                                >
                                    Mi Dashboard
                                </a>
                            @endif

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button 
                                    type="submit"
                                    class="w-full text-left px-4 py-2 text-sm transition"
                                    :class="initialTransparent && !scrolled
                                        ? 'text-red-400 hover:bg-white/10'
                                        : (initialLight || scrolled
                                            ? 'text-red-500 hover:bg-gray-100'
                                            : 'text-red-400 hover:bg-white/10')"
                                >
                                    Cerrar Sesión
                                </button>
                            </form>
                        </div>
                    </div>
                @endguest
            </div>

            {{-- MOBILE BUTTON --}}
            <div class="md:hidden">
                <button 
                    @click="open = !open"
                    class="p-2 rounded-md transition"
                    :class="initialTransparent && !scrolled
                        ? 'text-white bg-white/10 hover:bg-white/20'
                        : (initialLight || scrolled
                            ? 'text-gray-700 bg-gray-100 hover:bg-gray-200'
                            : 'text-white bg-white/10 hover:bg-white/20')"
                >
                    <svg class="h-6 w-6" fill="none" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>

        </div>
    </div>
</nav>
