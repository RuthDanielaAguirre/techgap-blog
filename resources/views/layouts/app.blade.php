<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Sora:wght@600;700&display=swap" rel="stylesheet">
</head>

<body class="antialiased bg-gray-50 min-h-screen flex flex-col">
    @include('layouts.header')

    {{-- Toast flotante --}}
    @if(session('success'))
    <div 
        x-data="{ show: true }"
        x-init="setTimeout(() => show = false, 3500)"
        x-show="show"
        x-transition.opacity.duration.300ms
        class="fixed top-20 right-6 z-9999 max-w-sm w-full"
    >
        <div class="bg-white border border-slate-200 rounded-xl shadow-xl p-4 flex items-start space-x-3">

            {{-- Icono --}}
            <div class="text-green-600">
                <svg class="w-6 h-6" fill="none" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M5 13l4 4L19 7" />
                </svg>
            </div>

            {{-- Mensaje --}}
            <div class="flex-1 text-sm text-slate-700">
                {{ session('success') }}
            </div>

            {{-- Cerrar --}}
            <button @click="show = false" class="text-slate-400 hover:text-slate-600">
                <svg class="w-5 h-5" fill="none" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    </div>
    @endif

    <main class="grow"> @yield('content') </main>

    @include('layouts.footer')
</body>
</html>
