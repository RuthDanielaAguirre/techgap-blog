@props(['title' => '¿Quieres ser escritor?', 'description' => 'Comparte tu conocimiento con gente interesante y publica artículos, tutoriales y guías en TechGap.'])

<div class="lg:col-span-2 bg-white rounded-2xl p-8 text-gray-800 shadow-lg">
    <h3 class="text-2xl font-bold mb-4">{{ $title }}</h3>
    <p class="text-gray-600 mb-6">{{ $description }}</p>
    
    @auth
        @if(auth()->user()->isSubscriber())
            <a href="#"
               class="inline-block px-5 py-2 rounded-lg font-medium text-sm text-slate-700 bg-indigo-50 hover:bg-indigo-100 hover:text-indigo-800 shadow-sm hover:shadow-md transition">
                Solicitar ser Escritor
            </a>
        @endif
    @else
        <a href="{{ route('register') }}"
           class="inline-block px-5 py-2 font-medium text-sm rounded-lg text-slate-700 bg-indigo-50 hover:bg-indigo-100 hover:text-indigo-800 shadow-sm hover:shadow-md transition">
            Crear Cuenta Gratis
        </a>
    @endauth
    
    <!-- Feed mini dentro del CTA Box -->
    <div class="w-1/2 mt-6">
        <x-blog.activity-feed />
    </div>
</div>