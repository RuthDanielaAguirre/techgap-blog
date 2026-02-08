@extends('v2.layouts.app', ['lightHeader' => true])

@section('content')

{{-- ===========================
     HERO EDITORIAL
=========================== --}}
<div class="bg-gradient-to-r from-[#0F172A] via-[#1E293B] to-[#0F172A] text-white py-20 border-b border-[#1BBF9B]/20">
    <div class="max-w-7xl mx-auto px-4 text-center">
        <p class="uppercase tracking-widest text-[#34D399] text-sm mb-3">
            {{ $posts->total() }} artículos publicados
        </p>

        <h1 class="text-5xl font-extrabold leading-tight">
            Artículos & Publicaciones
        </h1>

        <p class="text-lg text-gray-300 mt-4 max-w-2xl mx-auto">
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
        <h3 class="text-lg font-bold text-[#0F172A] mb-3 border-b border-gray-300 pb-2">
            Buscar
        </h3>

        <form method="GET" action="{{ route('posts.index') }}" class="flex">
            <input 
                type="text" 
                name="search"
                value="{{ request('search') }}"
                placeholder="Buscar artículos..."
                class="flex-1 px-4 py-2 border border-gray-300 bg-white text-sm focus:border-[#1BBF9B] focus:ring-0"
            >
            <button class="px-4 bg-[#1BBF9B] text-white font-semibold hover:bg-[#10B981] transition">
                Ir
            </button>
        </form>
    </div>



    {{-- CATEGORÍAS --}}
    <div>
        <h3 class="text-lg font-bold text-[#0F172A] mb-3 border-b border-gray-300 pb-2">
            Categorías
        </h3>

        <ul class="space-y-2">
            <li>
                <a href="{{ route('posts.index') }}" 
                   class="flex justify-between items-center py-2 border-b border-gray-200 hover:text-[#1BBF9B]">
                    <span>📑 Todas</span>
                    <span class="text-xs">{{ \App\Models\Post::published()->count() }}</span>
                </a>
            </li>

            @foreach($categories as $category)
                <li>
                    <a href="{{ route('posts.category', $category->slug) }}" 
                       class="flex justify-between items-center py-2 border-b border-gray-200 hover:text-[#1BBF9B]"
                       style="--cat-color: {{ $category->color }}">
                        <span class="flex items-center gap-2">
                            <span style="color: var(--cat-color)">{{ $category->icon }}</span>
                            {{ $category->name }}
                        </span>
                        <span class="text-xs">{{ $category->posts_count }}</span>
                    </a>
                </li>
            @endforeach
        </ul>
    </div>



    {{-- TAGS --}}
    <div>
        <h3 class="text-lg font-bold text-[#0F172A] mb-3 border-b border-gray-300 pb-2">
            Tags Populares
        </h3>

        <div class="flex flex-wrap gap-2">
            @foreach($popularTags as $tag)
                <a href="{{ route('posts.tag', $tag->slug) }}"
                   class="px-3 py-1 text-xs font-semibold border transition"
                   style="
                       border-color: {{ $tag->color }};
                       color: {{ $tag->color }};
                   "
                   onmouseover="this.style.background='{{ $tag->color }}22'"
                   onmouseout="this.style.background='transparent'"
                >
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
            <label class="text-sm font-semibold text-[#0F172A]">Ordenar por:</label>

            <select name="sort" onchange="this.form.submit()"
                class="px-3 py-2 border border-gray-300 bg-white text-sm focus:border-[#1BBF9B] focus:ring-0">
                <option value="latest" {{ request('sort') == 'latest' ? 'selected' : '' }}>Más recientes</option>
                <option value="popular" {{ request('sort') == 'popular' ? 'selected' : '' }}>Más vistos</option>
                <option value="trending" {{ request('sort') == 'trending' ? 'selected' : '' }}>Tendencia</option>
            </select>

            @if(request('search') || request('sort'))
                <a href="{{ route('posts.index') }}" class="ml-auto text-sm underline text-gray-600 hover:text-[#1BBF9B]">
                    Limpiar filtros
                </a>
            @endif
        </form>
    </div>



    {{-- RESULTADOS DE BÚSQUEDA --}}
    @if(request('search'))
        <div class="p-4 border border-[#3B82F6] bg-[#3B82F6]10">
            <p class="text-sm text-[#1E40AF]">
                <span class="font-semibold">{{ $posts->total() }} resultados</span> para 
                <span class="font-bold">"{{ request('search') }}"</span>
            </p>
        </div>
    @endif



    {{-- GRID DE POSTS --}}
    {{-- <div class="grid md:grid-cols-2 gap-10"> --}}
    <div class="grid md:grid-cols-3 gap-8">

        @forelse($posts as $post)
            <article class="border border-gray-200 bg-white group overflow-hidden flex flex-col">

    {{-- Línea superior vibrante --}}
    <div class="h-1 w-full" style="background: {{ $post->category->color }}"></div>

    {{-- Imagen panorámica y elegante --}}
    <div class="h-28 overflow-hidden">
        @if($post->featured_image)
            <img src="{{ $post->featured_image }}" 
                 class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
        @else
            <div class="w-full h-full bg-[#F1F5F9] flex items-center justify-center text-4xl"
                 style="color: {{ $post->category->color }}">
                {{ $post->category->icon }}
            </div>
        @endif
    </div>

    {{-- Contenido compacto y elegante --}}
    <div class="p-4 flex flex-col flex-1">

        {{-- Categoría --}}
        <a href="{{ route('posts.category', $post->category->slug) }}"
           class="text-[10px] font-bold tracking-wider uppercase mb-1"
           style="color: {{ $post->category->color }}">
            {{ $post->category->name }}
        </a>

        {{-- Título elegante --}}
        <h3 class="text-[17px] font-bold leading-snug mb-2 text-[#0F172A] group-hover:text-[#1BBF9B] transition">
            <a href="{{ route('posts.show', $post->slug) }}">
                {{ $post->title }}
            </a>
        </h3>

        {{-- Excerpt muy corto --}}
        <p class="text-gray-600 text-sm line-clamp-2 mb-3">
            {{ $post->excerpt }}
        </p>

        {{-- Tags minimalistas --}}
        <div class="flex flex-wrap gap-1.5 mb-3">
            @foreach($post->tags->take(2) as $tag)
                <span class="px-2 py-[1px] text-[10px] font-medium border"
                      style="
                          border-color: {{ $tag->color }};
                          color: {{ $tag->color }};
                      "
                      onmouseover="this.style.background='{{ $tag->color }}22'"
                      onmouseout="this.style.background='transparent'"
                >
                    #{{ $tag->name }}
                </span>
            @endforeach
        </div>

        {{-- Meta ultra minimal --}}
        <div class="mt-auto pt-2 border-t border-gray-200 text-[10px] text-gray-500 flex justify-between">
            <span>{{ $post->user->name }}</span>
            <span>{{ $post->published_at->diffForHumans() }}</span>
        </div>

    </div>

</article>



        @empty
            <div class="col-span-2 text-center py-16">
                <h3 class="text-xl font-bold text-[#0F172A] mb-2">No se encontraron artículos</h3>
                <p class="text-gray-600 mb-6">Intenta con otros términos de búsqueda o filtros</p>
                <a href="{{ route('posts.index') }}" class="px-6 py-3 bg-[#1BBF9B] text-white font-semibold hover:bg-[#10B981] transition">
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
