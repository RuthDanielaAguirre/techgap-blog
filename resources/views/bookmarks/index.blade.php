@extends('layouts.app')

@section('content')
<div class="bg-gradient-to-br from-gray-50 to-blue-50 min-h-screen py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="mb-8">
            <div class="flex items-center space-x-4 mb-4">
                <div class="w-16 h-16 bg-gradient-to-br from-amber-500 to-orange-600 rounded-2xl flex items-center justify-center shadow-lg">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z"></path>
                    </svg>
                </div>
                <div>
                    <h1 class="text-4xl font-extrabold text-gray-900">Mis Posts Guardados</h1>
                    <p class="text-gray-600 mt-1">{{ $bookmarkedPosts->total() }} artículos guardados</p>
                </div>
            </div>
        </div>

        @if($bookmarkedPosts->count() > 0)
            <!-- Posts Grid -->
            <div class="grid md:grid-cols-3 gap-6 mb-8">
                @foreach($bookmarkedPosts as $post)
                    <article class="group bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 overflow-hidden border border-gray-100 transform hover:-translate-y-2">
                        <!-- Image -->
                        <div class="relative h-48 overflow-hidden">
                            @if($post->featured_image)
                                <img src="{{ $post->featured_image }}" 
                                     alt="{{ $post->title }}"
                                     class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                            @else
                                <div class="w-full h-full bg-gradient-to-br from-techgap-500 to-techgap-700 flex items-center justify-center">
                                    <span class="text-white text-6xl">{{ $post->category->icon }}</span>
                                </div>
                            @endif
                            
                            <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/20 to-transparent"></div>
                            
                            <!-- Category Badge -->
                            <div class="absolute top-4 left-4">
                                <span class="px-3 py-1.5 rounded-lg text-xs font-bold text-white shadow-lg backdrop-blur-md"
                                      style="background-color: {{ $post->category->color }}dd;">
                                    {{ $post->category->icon }} {{ $post->category->name }}
                                </span>
                            </div>

                            <!-- Remove Bookmark Button -->
                            <form action="{{ route('posts.bookmark.toggle', $post) }}" method="POST" class="absolute top-4 right-4">
                                @csrf
                                <button type="submit" class="w-10 h-10 bg-amber-500 hover:bg-amber-600 rounded-full flex items-center justify-center shadow-lg transition transform hover:scale-110">
                                    <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M5 4a2 2 0 012-2h6a2 2 0 012 2v14l-5-2.5L5 18V4z"></path>
                                    </svg>
                                </button>
                            </form>
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
                                    <span class="px-2.5 py-1 text-xs font-semibold rounded-lg"
                                          style="background-color: {{ $tag->color }}15; color: {{ $tag->color }};">
                                        #{{ $tag->name }}
                                    </span>
                                @endforeach
                            </div>

                            <!-- Meta -->
                            <div class="flex items-center justify-between pt-4 border-t border-gray-100">
                                <div class="flex items-center space-x-2">
                                    <div class="w-8 h-8 rounded-full bg-gradient-to-br from-techgap-400 to-techgap-600 flex items-center justify-center text-white text-xs font-bold">
                                        {{ strtoupper(substr($post->user->name, 0, 1)) }}
                                    </div>
                                    <span class="text-xs text-gray-600 font-medium">{{ $post->user->name }}</span>
                                </div>
                                <span class="text-xs text-gray-500">{{ $post->reading_time }}</span>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="flex justify-center">
                {{ $bookmarkedPosts->links() }}
            </div>
        @else
            <!-- Empty State -->
            <div class="bg-white rounded-3xl shadow-lg p-16 text-center border border-gray-100">
                <div class="inline-flex items-center justify-center w-24 h-24 bg-gradient-to-br from-amber-100 to-orange-100 rounded-full mb-6">
                    <svg class="w-12 h-12 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z"></path>
                    </svg>
                </div>
                <h2 class="text-2xl font-bold text-gray-900 mb-3">No tienes posts guardados</h2>
                <p class="text-gray-600 mb-8 max-w-md mx-auto">
                    Comienza a guardar tus artículos favoritos para acceder a ellos rápidamente más tarde
                </p>
                <a href="{{ route('posts.index') }}" 
                   class="inline-flex items-center px-8 py-4 bg-gradient-to-r from-techgap-600 to-techgap-700 text-white rounded-xl font-semibold hover:from-techgap-700 hover:to-techgap-800 transition shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                    Explorar Artículos
                </a>
            </div>
        @endif
    </div>
</div>
@endsection
