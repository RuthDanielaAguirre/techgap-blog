<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'TechGap Blog')</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-50 text-gray-900 min-h-screen flex flex-col">
    <!-- Navbar -->
    <nav class="bg-white border-b border-gray-200 px-6 py-4">
        <div class="max-w-7xl mx-auto flex items-center justify-between">
            <div class="flex items-center space-x-8">
                <a href="/" class="text-xl font-bold">TECHGAP_BLOG</a>
                <a href="/" class="text-gray-600 hover:text-gray-900">Home</a>
            </div>
            <div class="flex items-center space-x-6">
                @guest
                    <a href="/login" class="text-gray-600 hover:text-gray-900">Login</a>
                    <a href="/register" class="text-gray-600 hover:text-gray-900">Register</a>
                @else
                    <span class="text-gray-600">{{ auth()->user()->name }}</span>
                    <form action="/logout" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="text-gray-600 hover:text-gray-900">Logout</button>
                    </form>
                @endguest
            </div>
        </div>
    </nav>

    <!-- Content -->
    <main class="grow">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-white border-t border-gray-200 mt-12">
        <div class="max-w-7xl mx-auto px-6 py-8">
            <div class="grid grid-cols-4 gap-8 text-sm">
                <div>
                    <h3 class="font-semibold mb-3">TechGap</h3>
                    <ul class="space-y-2">
                        <li><a href="/" class="text-gray-600 hover:text-gray-900">Home</a></li>
                        <li><a href="/" class="text-blue-600 hover:text-blue-800">Content</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="font-semibold mb-3">Account</h3>
                    <ul class="space-y-2">
                        <li><a href="/login" class="text-gray-600 hover:text-gray-900">Login</a></li>
                        <li><a href="/register" class="text-gray-600 hover:text-gray-900">Register</a></li>
                        <li><a href="#" class="text-gray-600 hover:text-gray-900">Profile</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="font-semibold mb-3">Administration</h3>
                    <ul class="space-y-2">
                        <li><a href="/admin" class="text-gray-600 hover:text-gray-900">Admin Panel</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="font-semibold mb-3">Terminos y Condiciones</h3>
                    <ul class="space-y-2">
                        <li class="text-gray-600">Terminos</li>
                        <li class="text-gray-600">Condiciones</li>
                    </ul>
                </div>
            </div>
            <div class="mt-8 pt-6 border-t border-gray-200 text-center text-sm text-gray-500">
                © 2026 TechGap Blog. All rights reserved.
            </div>
        </div>
    </footer>
</body>
</html>