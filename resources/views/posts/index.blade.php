@extends('layouts.app', ['transparentHeader' => true])

@section('content')

{{-- Hero Editorial --}}
<div class="py-40 -mt-16 bg-linear-to-r from-[#0F172A] via-[#1E293B] to-[#0F172A] text-white border-b border-[#1BBF9B]/20 relative overflow-hidden">

    {{-- Glow decorativo --}}
    <div class="absolute inset-0 opacity-20 pointer-events-none"
         style="background: radial-gradient(circle at 50% 20%, #1BBF9B33, transparent 70%)"></div>

    <div class="max-w-7xl mx-auto px-4 text-center relative z-10">
        <p class="uppercase tracking-widest text-[#34D399] text-sm mb-3 font-bold">
            {{ $posts->total() }} artículos publicados
        </p>

        <h1 class="text-5xl font-extrabold leading-tight drop-shadow-lg">
            Artículos & Publicaciones
        </h1>

        <p class="text-lg text-gray-300 mt-4 max-w-2xl mx-auto">
            Contenido curado sobre tecnología, desarrollo y tendencias digitales
        </p>
    </div>
</div>

{{-- Layout General --}}
<div class="max-w-7xl mx-auto px-4 py-14 grid grid-cols-1 lg:grid-cols-4 gap-12">
    {{-- Sidebar Editorial --}}
    <aside class="space-y-12">

        {{-- BUSCADOR --}}
        <div class="p-5 bg-white shadow-sm border border-gray-200 rounded-lg">
            <h3 class="text-lg font-bold text-[#0F172A] mb-3 flex items-center gap-2">
                🔍 Buscar
            </h3>

            <form method="GET" action="{{ route('posts.index') }}" class="flex">
                <input 
                    type="text" 
                    name="search"
                    value="{{ request('search') }}"
                    placeholder="Buscar artículos..."
                    class="flex-1 px-4 py-2 border border-gray-300 bg-white text-sm rounded-l focus:border-[#1BBF9B] focus:ring-0"
                >
                <button class="px-4 bg-[#1BBF9B] text-white font-semibold hover:bg-[#10B981] transition rounded-r">
                    Ir
                </button>
            </form>
        </div>

        {{-- CATEGORÍAS --}}
        <div class="p-5 bg-white shadow-sm border border-gray-200 rounded-lg">
            <h3 class="text-lg font-bold text-[#0F172A] mb-3 flex items-center gap-2">
                🗂 Categorías
            </h3>

            <ul class="space-y-2">
                <li>
                    <a href="{{ route('posts.index') }}" 
                    class="flex justify-between items-center py-2 border-b border-gray-200 hover:text-[#164E63] transition">
                        <span>📑 Todas</span>
                        <span class="text-xs">{{ \App\Models\Post::published()->count() }}</span>
                    </a>
                </li>

                @foreach($categories as $category)
                    <li>
                        <a href="{{ route('posts.category', $category->slug) }}" 
                        class="flex justify-between items-center py-2 border-b border-gray-200 hover:text-[#164E63] transition"
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
        <div class="p-5 bg-white shadow-sm border border-gray-200 rounded-lg">
            <h3 class="text-lg font-bold text-[#0F172A] mb-3 flex items-center gap-2">
                🏷 Tags Populares
            </h3>

            <div class="flex flex-wrap gap-2">
                @foreach($popularTags as $tag)
                    <a href="{{ route('posts.tag', $tag->slug) }}"
                    class="px-3 py-1 text-xs font-semibold border rounded transition"
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

    {{-- Grid editorial de posts --}}
    <div class="lg:col-span-3 space-y-10">

        {{-- Barra de orden --}}
        <div class="border border-gray-300 p-4 bg-white shadow-sm rounded-lg">
            <form method="GET" action="{{ route('posts.index') }}" class="flex items-center gap-4">
                <label class="text-sm font-semibold text-[#0F172A]">Ordenar por:</label>

                <select name="sort" onchange="this.form.submit()"
                    class="px-3 py-2 border border-gray-300 bg-white text-sm rounded focus:border-[#1BBF9B] focus:ring-0">
                    <option value="latest" {{ request('sort') == 'latest' ? 'selected' : '' }}>Más recientes</option>
                    <option value="popular" {{ request('sort') == 'popular' ? 'selected' : '' }}>Más vistos</option>
                    <option value="trending" {{ request('sort') == 'trending' ? 'selected' : '' }}>Tendencia</option>
                </select>

                @if(request('search') || request('sort'))
                    <a href="{{ route('posts.index') }}" class="ml-auto text-sm underline text-gray-600 hover:text-[#1BBF9B] transition">
                        Limpiar filtros
                    </a>
                @endif
            </form>
        </div>

        {{-- Resultados de búsqueda --}}
        @if(request('search'))
            <div class="p-4 border border-[#3B82F6] bg-[#3B82F6]10 rounded-lg">
                <p class="text-sm text-[#1E40AF]">
                    <span class="font-semibold">{{ $posts->total() }} resultados</span> para 
                    <span class="font-bold">"{{ request('search') }}"</span>
                </p>
            </div>
        @endif

        {{-- Grid de posts --}}
        <div class="grid md:grid-cols-3 gap-8">

            @forelse($posts as $post)
                <article class="bg-white border border-gray-200 rounded-xl overflow-hidden group transition duration-300 hover:shadow-md hover:-translate-y-0.5 flex flex-col h-full">
                    {{-- Imagen --}}
                    <div class="h-32 bg-[#E2E8F0] overflow-hidden">
                        @if($post->featured_image)
                            <img src="{{ $post->featured_image }}" 
                                class="w-full h-full object-cover transition duration-500 group-hover:scale-[1.03]">
                        @endif
                    </div>

                    {{-- Contenido --}}
                    <div class="p-4 space-y-3 flex flex-col flex-1">

                        {{-- Categoría --}}
                        <span class="text-[10px] uppercase font-semibold tracking-wider block"
                            style="color: {{ $post->category->color ?? '#3B82F6' }};">
                            {{ $post->category->name }}
                        </span>

                        {{-- Título --}}
                        <h3 class="text-[17px] font-bold text-[#0F172A] leading-snug">
                            <a href="{{ route('posts.show', $post->slug) }}" 
                            class="transition-opacity duration-200 group-hover:opacity-80">
                                {{ $post->title }}
                            </a>
                        </h3>

                        {{-- Excerpt --}}
                        <p class="text-gray-600 text-sm line-clamp-2">
                            {{ $post->excerpt }}
                        </p>

                        {{-- Footer fijo abajo --}}
                        <div class="pt-3 mt-auto text-[11px] text-gray-500 flex justify-between border-t border-gray-100">
                            <a href="{{ route('author.show', $post->user->username) }}" class="hover:text-blue-700">
                                <span>{{ $post->user->name }}</span>
                            </a>
                            <span>{{ $post->published_at->diffForHumans() }}</span>
                        </div>

                    </div>
                </article>
            @empty
                <div class="col-span-3 text-center py-16">
                    <h3 class="text-xl font-bold text-[#0F172A] mb-2">No se encontraron artículos</h3>
                    <p class="text-gray-600 mb-6">Intenta con otros términos de búsqueda o filtros</p>
                    <a href="{{ route('posts.index') }}" class="px-6 py-3 bg-[#1BBF9B] text-white font-semibold hover:bg-[#10B981] transition rounded">
                        Ver todos los artículos
                    </a>
                </div>
            @endforelse

        </div>

        {{-- Paginación --}}
        <div class="pt-6">
            {{ $posts->links() }}
        </div>

    </div>
</div>
@endsection
