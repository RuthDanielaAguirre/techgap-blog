<header class="bg-blue-600 text-white shadow-lg">
    <nav class="container mx-auto px-4 py-4 flex justify-between items-center">
        <a href="/" class="text-2xl font-bold">TechGap Blog</a>
        
        <div class="space-x-4">
            <a href="/" class="hover:text-blue-200">Inicio</a>
            
            @auth
                <span>Hola, {{ auth()->user()->name }}</span>
                <form action="/logout" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="hover:text-blue-200">Salir</button>
                </form>
            @else
                <a href="/login" class="hover:text-blue-200">Login</a>
                <a href="/register" class="hover:text-blue-200">Registro</a>
            @endauth
        </div>
    </nav>
</header>