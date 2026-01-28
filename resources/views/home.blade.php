@extends('layouts.app')

@section('content')
<!-- Hero Section -->

<div class="bg-gradient-to-br from-techgap-600 via-techgap-700 to-blue-900 text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
        <div class="text-center max-w-3xl mx-auto">
            <h1 class="text-5xl md:text-6xl font-extrabold mb-6 leading-tight">
                Aprende <span class="text-techgap-300">Tecnología</span><br>
                de forma práctica
            </h1>
            <p class="text-xl md:text-2xl text-techgap-100 mb-8">
                Artículos, tutoriales y guías sobre desarrollo web, IA, DevOps y las últimas tendencias tecnológicas
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('posts.index') }}" class="bg-white/10 text-white px-8 py-4 rounded-lg font-semibold
                        hover:bg-white/20 transition shadow-lg hover:shadow-xl border border-white/40">
                    Explorar Artículos
                </a>
                <a href="{{ route('register') }}" class="bg-white/10 text-white px-8 py-4 rounded-lg font-semibold
                        hover:bg-white/20 transition shadow-lg hover:shadow-xl border border-white/40">
                    Únete Gratis
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Categories Section -->
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 -mt-12 relative z-10">
    <div class="bg-white rounded-2xl shadow-2xl p-6">
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4">
            @foreach($categories as $category)
                <a href="{{ route('posts.category', $category->slug) }}" 
                   class="group flex flex-col items-center p-4 rounded-xl hover:bg-gray-50 transition">
                    <div class="w-14 h-14 rounded-xl flex items-center justify-center text-3xl mb-2 shadow-md group-hover:shadow-lg transition"
                         style="background-color: {{ $category->color }}20;">
                        {{ $category->icon }}
                    </div>
                    <span class="text-sm font-semibold text-gray-900 text-center">{{ $category->name }}</span>
                    <span class="text-xs text-gray-500 mt-1">{{ $category->posts_count }} posts</span>
                </a>
            @endforeach
        </div>
    </div>
</div>

<!-- Featured Posts -->
@if($featuredPosts->isNotEmpty())
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
    <div class="flex items-center justify-between mb-8">
        <h2 class="text-3xl font-bold text-gray-900">🌟 Posts Destacados</h2>
    </div>

    <div class="grid md:grid-cols-3 gap-8">
        @foreach($featuredPosts as $post)
            <article class="group bg-white rounded-2xl shadow-lg hover:shadow-2xl transition overflow-hidden border border-gray-100">
                <!-- Category Badge -->
                <div class="relative h-48 bg-gradient-to-br from-techgap-500 to-techgap-700 flex items-center justify-center">
                    <span class="absolute top-4 left-4 px-3 py-1 rounded-full text-xs font-semibold text-white"
                          style="background-color: {{ $post->category->color }};">
                        {{ $post->category->icon }} {{ $post->category->name }}
                    </span>
                    <div class="text-white text-6xl">
                        {{ $post->category->icon }}
                    </div>
                </div>

                <div class="p-6">
                    <!-- Title -->
                    <h3 class="text-xl font-bold text-gray-900 mb-3 group-hover:text-techgap-600 transition line-clamp-2">
                        <a href="{{ route('posts.show', $post->slug) }}">
                            {{ $post->title }}
                        </a>
                    </h3>

                    <!-- Excerpt -->
                    <p class="text-gray-600 mb-4 line-clamp-3">
                        {{ $post->excerpt }}
                    </p>

                    <!-- Tags -->
                    <div class="flex flex-wrap gap-2 mb-4">
                        @foreach($post->tags->take(3) as $tag)
                            <span class="px-2 py-1 text-xs font-medium rounded-md"
                                  style="background-color: {{ $tag->color }}20; color: {{ $tag->color }};">
                                #{{ $tag->name }}
                            </span>
                        @endforeach
                    </div>

                    <!-- Meta -->
                    <div class="flex items-center justify-between pt-4 border-t border-gray-100">
                        <div class="flex items-center space-x-2">
                            <div class="w-8 h-8 rounded-full bg-gradient-to-br from-techgap-400 to-techgap-600 flex items-center justify-center text-white text-sm font-semibold">
                                {{ substr($post->user->name, 0, 1) }}
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-900">{{ $post->user->name }}</p>
                                <p class="text-xs text-gray-500">{{ $post->published_at->diffForHumans() }}</p>
                            </div>
                        </div>
                        <div class="flex items-center space-x-3 text-sm text-gray-500">
                            <span class="flex items-center">
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
        @endforeach
    </div>
</div>
@endif

<!-- Latest Posts -->
<div class="bg-gray-50 py-10">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between mb-8">
            <h2 class="text-3xl font-bold text-gray-900">📚 Últimos Artículos</h2>
            <a href="{{ route('posts.index') }}" class="text-techgap-600 hover:text-techgap-700 font-semibold flex items-center group">
                Ver todos
                <svg class="w-5 h-5 ml-2 group-hover:translate-x-1 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                </svg>
            </a>
        </div>

        <div class="grid md:grid-cols-3 gap-6">
            @foreach($latestPosts as $post)
                <article class="bg-white rounded-xl shadow-md hover:shadow-xl transition overflow-hidden border border-gray-100">
                    <div class="p-6">
                        <!-- Category -->
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold mb-3"
                              style="background-color: {{ $post->category->color }}20; color: {{ $post->category->color }};">
                            {{ $post->category->icon }} {{ $post->category->name }}
                        </span>

                        <!-- Title -->
                        <h3 class="text-lg font-bold text-gray-900 mb-2 hover:text-techgap-600 transition line-clamp-2">
                            <a href="{{ route('posts.show', $post->slug) }}">
                                {{ $post->title }}
                            </a>
                        </h3>

                        <!-- Excerpt -->
                        <p class="text-gray-600 text-sm mb-4 line-clamp-2">
                            {{ $post->excerpt }}
                        </p>

                        <!-- Meta -->
                        <div class="flex items-center justify-between text-xs text-gray-500">
                            <span class="flex items-center">
                                <div class="w-6 h-6 rounded-full bg-gradient-to-br from-techgap-400 to-techgap-600 flex items-center justify-center text-white text-xs font-semibold mr-2">
                                    {{ substr($post->user->name, 0, 1) }}
                                </div>
                                {{ $post->user->name }}
                            </span>
                            <span>{{ $post->reading_time }}</span>
                        </div>
                    </div>
                </article>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="mt-8">
            {{ $latestPosts->links() }}
        </div>
    </div>
</div>

<!-- Popular Posts Sidebar -->
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
    <div class="grid lg:grid-cols-3 gap-8">
        <!-- CTA Box -->
        <div class="lg:col-span-2 bg-white rounded-2xl p-8 text-gray-800 shadow-lg">
            <h3 class="text-2xl font-bold mb-4">¿Quieres ser escritor?</h3>
            <p class="text-gray-600 mb-6">
                Comparte tu conocimiento con gente interesante y publica artículos, tutoriales y guías en TechGap.
            </p>
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
            <div class="bg-gray-50 w-1/2 bg-techgap-50 rounded-xl p-4 max-h-64 overflow-y-auto space-y-4 shadow-inner">
                <ul class="space-y-4">
                    <!-- Usuario con imagen -->
                    <li class="flex space-x-3">
                        <img src="https://images.unsplash.com/photo-1520785643438-5bf77931f493?ixlib=rb-=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=8&w=256&h=256&q=80" 
                            alt="Eduardo Benz" class="w-10 h-10 rounded-full object-cover border-2 border-techgap-100">
                        <div class="flex-1 space-y-1 text-sm">
                            <div class="flex items-center justify-between">
                                <a href="#" class="font-semibold text-techgap-700 hover:text-techgap-900">Eduardo Benz</a>
                                <span class="text-xs text-gray-400">6d ago</span>
                            </div>
                            <p class="text-gray-700">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Tincidunt nunc ipsum tempor.
                            </p>
                        </div>
                    </li>

                    <!-- Usuario tipo asignación -->
                    <li class="flex space-x-3">
                        <div class="flex-shrink-0 flex items-center justify-center w-10 h-10 bg-techgap-100 rounded-full">
                            <svg class="w-5 h-5 text-techgap-500" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 1 1-16 0 8 8 0 0 1 16 0Zm-5.5-2.5a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0ZM10 12a5.99 5.99 0 0 0-4.793 2.39A6.483 6.483 0 0 0 10 16.5a6.483 6.483 0 0 0 4.793-2.11A5.99 5.99 0 0 0 10 12Z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <div class="flex-1 space-y-1 text-sm text-gray-700">
                            <span>
                                <a href="#" class="font-semibold text-techgap-700 hover:text-techgap-900">Hilary Mahy</a> assigned 
                                <a href="#" class="font-semibold text-techgap-700 hover:text-techgap-900">Kristin Watson</a>
                            </span>
                            <span class="text-xs text-gray-400">2d ago</span>
                        </div>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Popular Posts -->
        <div class="bg-white rounded-2xl shadow-lg p-6 border border-gray-100">
            <h3 class="text-xl font-bold text-gray-900 mb-4">🔥 Más Populares</h3>
            <div class="space-y-4">
                @foreach($popularPosts as $post)
                    <a href="{{ route('posts.show', $post->slug) }}" class="block group">
                        <div class="flex items-start space-x-3">
                            <div class="w-12 h-12 rounded-lg flex-shrink-0 flex items-center justify-center text-2xl"
                                 style="background-color: {{ $post->category->color }}20;">
                                {{ $post->category->icon }}
                            </div>
                            <div class="flex-1 min-w-0">
                                <h4 class="text-sm font-semibold text-gray-900 group-hover:text-techgap-600 transition line-clamp-2">
                                    {{ $post->title }}
                                </h4>
                                <div class="flex items-center mt-1 text-xs text-gray-500">
                                    <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                    </svg>
                                    {{ number_format($post->views_count) }}
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
