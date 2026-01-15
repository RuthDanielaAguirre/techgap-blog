@extends('layouts.app')

@section('title', 'TechGap Blog - IA & Programación')

@section('content')
<div class="max-w-7xl mx-auto px-6 py-12">
    <!-- Header -->
    <div class="mb-8 text-center">
        <h1 class="text-4xl font-bold mb-2 bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">
            TechGap Blog
        </h1>
        <p class="text-gray-600 text-lg">Inteligencia Artificial & Lenguajes de Programación</p>
        <p class="text-gray-500 mt-2">Explora Machine Learning, Deep Learning, LLMs y las últimas tendencias en programación</p>
    </div>

    <!-- Filters -->
    <div class="mb-6">
        <form method="GET" action="/" class="flex items-center gap-4">
            <div class="flex-1">
                <input 
                    type="text" 
                    name="search"
                    value="{{ request('search') }}"
                    placeholder="Buscar artículos sobre IA, Python, Machine Learning..." 
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:border-blue-500 focus:outline-none"
                >
            </div>
            <select name="category" class="px-4 py-2 border border-gray-300 rounded-lg focus:border-blue-500 focus:outline-none">
                <option value="">Todas las Categorías</option>
                @foreach($categories ?? [] as $category)
                <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
                @endforeach
            </select>
            <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                Buscar
            </button>
            @if(request('search') || request('category'))
            <a href="/" class="px-4 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition">
                Limpiar
            </a>
            @endif
        </form>
    </div>

    <div class="text-sm text-gray-600 mb-6">
        Mostrando {{ $posts->count() }} de {{ $posts->total() }} resultados
        @if(request('search'))
            <span class="ml-2 px-2 py-1 bg-blue-100 text-blue-700 rounded text-xs">
                Búsqueda: "{{ request('search') }}"
            </span>
        @endif
        @if(request('category'))
            <span class="ml-2 px-2 py-1 bg-purple-100 text-purple-700 rounded text-xs">
                Categoría filtrada
            </span>
        @endif
    </div>

    <!-- Posts Grid -->
    <div class="grid grid-cols-2 gap-6 mb-8">
        @forelse($posts as $post)
        <article class="bg-white border border-gray-200 rounded-lg p-6 hover:shadow-md transition">
            <div class="flex items-start justify-between mb-3">
                <div>
                    <span class="inline-block px-2 py-1 text-xs bg-blue-100 text-blue-700 rounded mb-2">
                        {{ $post->category->name ?? 'General' }}
                    </span>
                    <span class="inline-block px-2 py-1 text-xs bg-green-100 text-green-700 rounded mb-2 ml-2">
                        Publicado
                    </span>
                </div>
            </div>

            <h2 class="text-xl font-semibold mb-3">
                <a href="/post/{{ $post->slug }}" class="hover:text-blue-600">
                    {{ $post->title }}
                </a>
            </h2>

            <p class="text-gray-600 text-sm mb-4">
                {{ $post->excerpt ?? Str::limit(strip_tags($post->content), 150) }}
            </p>

            <div class="flex items-center justify-between text-xs text-gray-500">
                <div>
                    <span>Categoría: {{ $post->category->name ?? 'General' }}</span>
                </div>
                <div>
                    <span>Autor: {{ $post->user->name }}</span>
                </div>
            </div>
            <div class="flex items-center justify-between text-xs text-gray-500 mt-2">
                <div>
                    <span>{{ $post->published_at?->format('d M Y') ?? 'Borrador' }}</span>
                </div>
                <div>
                    <span>{{ $post->published_at?->diffForHumans() }}</span>
                </div>
            </div>
        </article>
        @empty
        <div class="col-span-2 text-center py-12">
            <p class="text-gray-500 text-lg mb-4">No se encontraron artículos</p>
            @if(request('search') || request('category'))
            <a href="/" class="text-blue-600 hover:text-blue-800 font-medium">
                Ver todos los artículos →
            </a>
            @endif
        </div>
        @endforelse
    </div>

    <!-- Pagination -->
    <div class="flex items-center justify-center gap-2">
        {{ $posts->links() }}
    </div>
</div>
@endsection