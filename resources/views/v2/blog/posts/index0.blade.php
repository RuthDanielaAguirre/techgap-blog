@extends('layouts.app')

@section('content')

{{-- ===========================
     HERO EDITORIAL
=========================== --}}
<div class="bg-gradient-to-r from-techgap-700 via-techgap-800 to-techgap-900 text-white py-20 border-b border-techgap-500/30">
    <div class="max-w-7xl mx-auto px-4 text-center">
        <p class="uppercase tracking-widest text-techgap-200 text-sm mb-3">
            {{ $posts->total() }} artículos publicados
        </p>

        <h1 class="text-5xl font-extrabold leading-tight">
            Artículos & Publicaciones
        </h1>

        <p class="text-lg text-techgap-100 mt-4 max-w-2xl mx-auto">
            Contenido curado sobre tecnología, desarrollo y tendencias digitales
        </p>
    </div>
</div>



{{-- ===========================
     LAYOUT GENERAL
=========================== --}}
<div class="max-w-7xl mx-auto px-4 py-14 grid grid-cols-1 lg:grid-cols-4 gap-12">



{{-- ===========================
     SIDEBAR EDITORIAL
=========================== --}}
<aside class="space-y-12">

    {{-- BUSCADOR --}}
    <div>
        <h3 class="text-lg font-bold text-gray-900 mb-3 border-b border-gray-300 pb-2">
            Buscar
        </h3>

        <form method="GET" action="{{ route('posts.index') }}" class="flex">
            <input 
                type="text" 
                name="search"
                value="{{ request('search') }}"
                placeholder="Buscar artículos..."
                class="flex-1 px-4 py-2 border border-gray-300 bg-white text-sm focus:border-techgap-600 focus:ring-0"
            >
            <button class="px-4 bg-techgap-700 text-white font-semibold hover:bg-techgap-800">
                Ir
            </button>
        </form>
    </div>



    {{-- CATEGORÍAS --}}
    <div>
        <h3 class="text-lg font-bold text-gray-900 mb-3 border-b border-gray-300 pb-2">
            Categorías
        </h3>

        <ul class="space-y-2">
            <li>
                <a href="{{ route('posts.index') }}" 
                   class="flex justify-between items-center py-2 border-b border-gray-200 hover:text-techgap-700">
                    <span>📑 Todas</span>
                    <span class="text-xs">{{ \App\Models\Post::published()->count() }}</span>
                </a>
            </li>

            @foreach($categories as $category)
                <li>
                    <a href="{{ route('posts.category', $category->slug) }}" 
                       class="flex justify-between items-center py-2 border-b border-gray-200 hover:text-techgap-700">
                        <span>{{ $category->icon }} {{ $category->name }}</span>
                        <span class="text-xs">{{ $category->posts_count }}</span>
                    </a>
                </li>
            @endforeach
        </ul>
    </div>



    {{-- TAGS --}}
    <div>
        <h3 class="text-lg font-bold text-gray-900 mb-3 border-b border-gray-300 pb-2">
            Tags Populares
        </h3>

        <div class="flex flex-wrap gap-2">
            @foreach($popularTags as $tag)
                <a href="{{ route('posts.tag', $tag->slug) }}"
                   class="px-3 py-1 text-xs font-semibold border border-gray-300 hover:border-techgap-600 hover:text-techgap-700 transition">
                    #{{ $tag->name }}
                </a>
            @endforeach
        </div>
    </div>

</aside>



{{-- ===========================
     GRID EDITORIAL DE POSTS
=========================== --}}
<div class="lg:col-span-3 space-y-10">

    {{-- BARRA DE ORDEN --}}
    <div class="border border-gray-300 p-4">
        <form method="GET" action="{{ route('posts.index') }}" class="flex items-center gap-4">
            <label class="text-sm font-semibold text-gray-700">Ordenar por:</label>

            <select name="sort" onchange="this.form.submit()"
                class="px-3 py-2 border border-gray-300 bg-white text-sm focus:border-techgap-600 focus:ring-0">
                <option value="latest" {{ request('sort') == 'latest' ? 'selected' : '' }}>Más recientes</option>
                <option value="popular" {{ request('sort') == 'popular' ? 'selected' : '' }}>Más vistos</option>
                <option value="trending" {{ request('sort') == 'trending' ? 'selected' : '' }}>Tendencia</option>
            </select>

            @if(request('search') || request('sort'))
                <a href="{{ route('posts.index') }}" class="ml-auto text-sm underline text-gray-600 hover:text-techgap-700">
                    Limpiar filtros
                </a>
            @endif
        </form>
    </div>



    {{-- RESULTADOS DE BÚSQUEDA --}}
    @if(request('search'))
        <div class="p-4 border border-blue-300 bg-blue-50">
            <p class="text-sm text-blue-800">
                <span class="font-semibold">{{ $posts->total() }} resultados</span> para 
                <span class="font-bold">"{{ request('search') }}"</span>
            </p>
        </div>
    @endif



    {{-- GRID DE POSTS --}}
    <div class="grid md:grid-cols-2 gap-10">

        @forelse($posts as $post)
            <article class="border border-gray-300 bg-white group overflow-hidden">

                {{-- Imagen --}}
                <div class="h-56 overflow-hidden relative">
                    @if($post->featured_image)
                        <img src="{{ $post->featured_image }}" 
                             class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                    @else
                        <div class="w-full h-full bg-techgap-700 flex items-center justify-center text-white text-6xl">
                            {{ $post->category->icon }}
                        </div>
                    @endif
                </div>

                {{-- Contenido --}}
                <div class="p-6">

                    <a href="{{ route('posts.category', $post->category->slug) }}"
                       class="text-xs font-bold text-techgap-700 tracking-wider uppercase">
                        {{ $post->category->name }}
                    </a>

                    <h3 class="text-2xl font-extrabold mt-2 mb-3 leading-tight group-hover:text-techgap-700 transition">
                        <a href="{{ route('posts.show', $post->slug) }}">
                            {{ $post->title }}
                        </a>
                    </h3>

                    <p class="text-gray-600 text-sm leading-relaxed mb-4">
                        {{ $post->excerpt }}
                    </p>

                    <div class="flex justify-between items-center text-xs text-gray-500 border-t border-gray-200 pt-4">
                        <span>{{ $post->user->name }}</span>
                        <span>{{ $post->published_at->diffForHumans() }}</span>
                    </div>

                </div>

            </article>

        @empty
            <div class="col-span-2 text-center py-16">
                <h3 class="text-xl font-bold text-gray-900 mb-2">No se encontraron artículos</h3>
                <p class="text-gray-600 mb-6">Intenta con otros términos de búsqueda o filtros</p>
                <a href="{{ route('posts.index') }}" class="px-6 py-3 bg-techgap-700 text-white font-semibold hover:bg-techgap-800">
                    Ver todos los artículos
                </a>
            </div>
        @endforelse

    </div>



    {{-- PAGINACIÓN --}}
    <div class="pt-6">
        {{ $posts->links() }}
    </div>

</div>



</div>
@endsection
