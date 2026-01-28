@extends('layouts.app')

@section('content')
<div class="bg-gray-50 min-h-screen">
    <!-- Page Header -->
    <div class="bg-gradient-to-r from-techgap-600 via-techgap-700 to-blue-800 text-white py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <div class="inline-flex items-center px-4 py-2 bg-white/20 backdrop-blur-md border border-white/20 rounded-full text-sm font-medium mb-4">
                    <span class="text-2xl mr-2">📚</span>
                    {{ $posts->total() }} artículos disponibles
                </div>
                <h1 class="text-4xl md:text-5xl font-extrabold mb-4">
                    Explora Nuestros Artículos
                </h1>
                <p class="text-xl text-techgap-100 max-w-2xl mx-auto">
                    Descubre contenido de calidad sobre tecnología, desarrollo y mucho más
                </p>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="grid lg:grid-cols-4 gap-8">
            <!-- Sidebar Filters -->
            <aside class="lg:col-span-1 space-y-6">
                <!-- Search Box -->
                <div class="bg-white rounded-2xl shadow-lg p-6 border border-gray-100">
                    <h3 class="text-lg font-bold text-gray-900 mb-4 flex items-center">
                        <svg class="w-5 h-5 mr-2 text-techgap-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                        Buscar
                    </h3>
                    <form method="GET" action="{{ route('posts.index') }}">
                        <div class="relative">
                            <input 
                                type="text" 
                                name="search" 
                                placeholder="Buscar artículos..." 
                                value="{{ request('search') }}"
                                class="w-full pl-10 pr-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-techgap-500 focus:border-transparent transition text-sm"
                            >
                            <svg class="absolute left-3 top-3.5 w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </div>
                        <button type="submit" class="w-full mt-3 px-4 py-2.5 bg-gradient-to-r from-techgap-600 to-techgap-700 text-white rounded-xl font-semibold hover:from-techgap-700 hover:to-techgap-800 transition shadow-md hover:shadow-lg">
                            Buscar
                        </button>
                    </form>
                </div>

                <!-- Categories Filter -->
                <div class="bg-white rounded-2xl shadow-lg p-6 border border-gray-100">
                    <h3 class="text-lg font-bold text-gray-900 mb-4 flex items-center">
                        <svg class="w-5 h-5 mr-2 text-techgap-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                        </svg>
                        Categorías
                    </h3>
                    <div class="space-y-2">
                        <a href="{{ route('posts.index') }}" 
                           class="flex items-center justify-between p-3 rounded-xl hover:bg-gray-50 transition group {{ !request('category') ? 'bg-techgap-50 text-techgap-700' : 'text-gray-700' }}">
                            <div class="flex items-center space-x-2">
                                <span class="text-xl">📑</span>
                                <span class="text-sm font-medium">Todas</span>
                            </div>
                            <span class="text-xs font-semibold px-2 py-1 bg-gray-100 rounded-full">
                                {{ \App\Models\Post::published()->count() }}
                            </span>
                        </a>
                        @foreach($categories as $category)
                            <a href="{{ route('posts.category', $category->slug) }}" 
                               class="flex items-center justify-between p-3 rounded-xl hover:bg-gray-50 transition group">
                                <div class="flex items-center space-x-2">
                                    <span class="text-xl">{{ $category->icon }}</span>
                                    <span class="text-sm font-medium text-gray-700 group-hover:text-techgap-600">
                                        {{ $category->name }}
                                    </span>
                                </div>
                                <span class="text-xs font-semibold px-2 py-1 bg-gray-100 group-hover:bg-techgap-100 rounded-full">
                                    {{ $category->posts_count }}
                                </span>
                            </a>
                        @endforeach
                    </div>
                </div>

                <!-- Popular Tags -->
                <div class="bg-white rounded-2xl shadow-lg p-6 border border-gray-100">
                    <h3 class="text-lg font-bold text-gray-900 mb-4 flex items-center">
                        <svg class="w-5 h-5 mr-2 text-techgap-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14"></path>
                        </svg>
                        Tags Populares
                    </h3>
                    <div class="flex flex-wrap gap-2">
                        @foreach($popularTags as $tag)
                            <a href="{{ route('posts.tag', $tag->slug) }}" 
                               class="px-3 py-1.5 text-xs font-semibold rounded-lg hover:shadow-md transition transform hover:-translate-y-0.5"
                               style="background-color: {{ $tag->color }}20; color: {{ $tag->color }};">
                                #{{ $tag->name }}
                            </a>
                        @endforeach
                    </div>
                </div>
            </aside>

            <!-- Posts Grid -->
            <div class="lg:col-span-3">
                <!-- Sort & Filter Bar -->
                <div class="bg-white rounded-2xl shadow-md p-4 mb-6 border border-gray-100">
                    <form method="GET" action="{{ route('posts.index') }}" class="flex flex-wrap items-center gap-4">
                        @if(request('search'))
                            <input type="hidden" name="search" value="{{ request('search') }}">
                        @endif
                        
                        <div class="flex-1 min-w-[200px]">
                            <label class="text-sm font-medium text-gray-700 mb-1 block">Ordenar por</label>
                            <select 
                                name="sort" 
                                onchange="this.form.submit()"
                                class="w-full px-4 py-2.5 border border-gray-200 rounded-xl focus:ring-2 focus:ring-techgap-500 focus:border-transparent text-sm font-medium"
                            >
                                <option value="latest" {{ request('sort') == 'latest' ? 'selected' : '' }}>📅 Más recientes</option>
                                <option value="popular" {{ request('sort') == 'popular' ? 'selected' : '' }}>👁️ Más vistos</option>
                                <option value="trending" {{ request('sort') == 'trending' ? 'selected' : '' }}>🔥 Tendencia (Likes)</option>
                            </select>
                        </div>

                        @if(request('search') || request('sort'))
                            <a href="{{ route('posts.index') }}" 
                               class="px-4 py-2.5 border-2 border-gray-300 text-gray-700 rounded-xl font-medium hover:bg-gray-50 transition text-sm">
                                Limpiar filtros
                            </a>
                        @endif
                    </form>
                </div>

                <!-- Results Info -->
                @if(request('search'))
                    <div class="mb-6 p-4 bg-blue-50 border border-blue-200 rounded-xl">
                        <p class="text-sm text-blue-800">
                            <span class="font-semibold">{{ $posts->total() }} resultados</span> para 
                            <span class="font-bold">"{{ request('search') }}"</span>
                        </p>
                    </div>
                @endif

                <!-- Posts Grid -->
                <div class="grid md:grid-cols-2 gap-6 mb-8">
                    @forelse($posts as $post)
                        <article class="group bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 overflow-hidden border border-gray-100 transform hover:-translate-y-2">
                            <!-- Image -->
                            <div class="relative h-52 overflow-hidden">
                                @if($post->featured_image)
                                    <img src="{{ $post->featured_image }}" 
                                         alt="{{ $post->title }}"
                                         class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                                @else
                                    <div class="w-full h-full bg-gradient-to-br from-techgap-500 to-techgap-700 flex items-center justify-center">
                                        <span class="text-white text-6xl">{{ $post->category->icon }}</span>
                                    </div>
                                @endif
                                
                                <!-- Gradient Overlay -->
                                <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/20 to-transparent"></div>
                                
                                <!-- Category Badge -->
                                <div class="absolute top-4 left-4">
                                    <a href="{{ route('posts.category', $post->category->slug) }}"
                                       class="px-3 py-1.5 rounded-lg text-xs font-bold text-white shadow-lg backdrop-blur-md hover:scale-105 transition"
                                       style="background-color: {{ $post->category->color }}dd;">
                                        {{ $post->category->icon }} {{ $post->category->name }}
                                    </a>
                                </div>

                                <!-- Reading Time -->
                                <div class="absolute bottom-4 right-4">
                                    <span class="px-3 py-1.5 bg-black/50 backdrop-blur-md text-white rounded-lg text-xs font-medium">
                                        ⏱️ {{ $post->reading_time }}
                                    </span>
                                </div>
                            </div>

                            <div class="p-6">
                                <!-- Title -->
                                <h3 class="text-xl font-bold text-gray-900 mb-3 group-hover:text-techgap-600 transition line-clamp-2 leading-tight">
                                    <a href="{{ route('posts.show', $post->slug) }}">
                                        {{ $post->title }}
                                    </a>
                                </h3>

                                <!-- Excerpt -->
                                <p class="text-gray-600 mb-4 line-clamp-3 text-sm leading-relaxed">
                                    {{ $post->excerpt }}
                                </p>

                                <!-- Tags -->
                                <div class="flex flex-wrap gap-2 mb-4">
                                    @foreach($post->tags->take(3) as $tag)
                                        <a href="{{ route('posts.tag', $tag->slug) }}"
                                           class="px-2.5 py-1 text-xs font-semibold rounded-lg hover:shadow-md transition"
                                           style="background-color: {{ $tag->color }}15; color: {{ $tag->color }};">
                                            #{{ $tag->name }}
                                        </a>
                                    @endforeach
                                </div>

                                <!-- Meta -->
                                <div class="flex items-center justify-between pt-4 border-t border-gray-100">
                                    <div class="flex items-center space-x-3">
                                        <div class="w-10 h-10 rounded-full bg-gradient-to-br from-techgap-400 to-techgap-600 flex items-center justify-center text-white text-sm font-bold shadow-md">
                                            {{ strtoupper(substr($post->user->name, 0, 1)) }}
                                        </div>
                                        <div>
                                            <p class="text-sm font-semibold text-gray-900">{{ $post->user->name }}</p>
                                            <p class="text-xs text-gray-500">{{ $post->published_at->diffForHumans() }}</p>
                                        </div>
                                    </div>
                                    <div class="flex items-center space-x-3 text-xs text-gray-500">
                                        <span class="flex items-center font-medium">
                                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                            </svg>
                                            {{ number_format($post->views_count) }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </article>
                    @empty
                        <div class="col-span-2 text-center py-16">
                            <div class="inline-flex items-center justify-center w-20 h-20 bg-gray-100 rounded-full mb-4">
                                <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 mb-2">No se encontraron artículos</h3>
                            <p class="text-gray-600 mb-6">Intenta con otros términos de búsqueda o filtros</p>
                            <a href="{{ route('posts.index') }}" class="inline-flex items-center px-6 py-3 bg-techgap-600 text-white rounded-xl font-semibold hover:bg-techgap-700 transition shadow-md">
                                Ver todos los artículos
                            </a>
                        </div>
                    @endforelse
                </div>

                <!-- Pagination -->
                <div class="flex justify-center">
                    {{ $posts->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
