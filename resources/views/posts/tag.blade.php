@extends('layouts.app', ['lightHeader' => true])

@section('title', '#' . $tag->name . ' - TechGap Blog')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 mb-10 mt-4">

    <!-- Header -->
    <div class="flex items-center justify-between mb-10">
        <div>
            <h1 class="text-3xl font-bold text-gray-900 flex items-center gap-3">
                <span class="text-3xl" style="color: {{ $tag->color }}">🏷️</span>
                {{ $tag->name }}
            </h1>

            <p class="text-gray-600 mt-2">Posts etiquetados con #{{ $tag->name }}</p>

            <p class="text-gray-500 text-sm mt-1">
                {{ $posts->total() }} {{ Str::plural('post', $posts->total()) }}
            </p>
        </div>

        <a href="{{ route('posts.index') }}"
           class="text-gray-600 bg-gray-200 hover:text-indigo-500 hover:bg-indigo-100 font-semibold flex items-center group rounded-xl px-3 py-2">
            Ver todos los posts
            <svg class="w-5 h-5 ml-2 group-hover:translate-x-1 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
            </svg>
        </a>
    </div>

    @if($tag->description)
        <p class="text-gray-700 max-w-3xl mb-8">{{ $tag->description }}</p>
    @endif

    <!-- Posts Grid -->
    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($posts as $post)

            @php
                // Avatar sizes
                $avatarSizes = [
                    'xs' => 'w-6 h-6 text-xs',
                    'sm' => 'w-8 h-8 text-sm',
                    'md' => 'w-10 h-10 text-base',
                    'lg' => 'w-12 h-12 text-lg',
                ];

                // Iniciales del usuario
                $initials = collect(explode(' ', $post->user->name))
                    ->map(fn($p) => mb_substr($p, 0, 1))
                    ->join('');
            @endphp

            <article class="bg-white border border-gray-200 rounded-xl p-6 hover:shadow-lg transition-all duration-300 hover:border-techgap-200 flex flex-col">
                <!-- Badges -->
                <div class="flex items-start justify-between mb-3">
                    <div class="flex flex-wrap gap-2">
                        <span class="px-2 py-1 text-xs rounded-md font-medium"
                            style="background: {{ $post->category->color }}20; color: {{ $post->category->color }}">
                            {{ $post->category->name }}
                        </span>
                    </div>
                </div>

                <!-- Title -->
                <h2 class="text-xl font-semibold mb-3">
                    <a href="{{ route('posts.show', $post->slug) }}"
                    class="hover:text-techgap-600 transition">
                        {{ $post->title }}
                    </a>
                </h2>

                <!-- Excerpt -->
                <p class="text-gray-600 text-sm mb-4 line-clamp-3">
                    {{ $post->excerpt ?? Str::limit(strip_tags($post->content), 150) }}
                </p>

                <!-- Tags -->
                @if($post->tags && $post->tags->isNotEmpty())
                    <div class="flex flex-wrap gap-1 mb-4">
                        @foreach($post->tags->take(3) as $tagItem)
                            <span class="px-2 py-1 text-xs font-medium rounded-md"
                                style="background: {{ $tagItem->color }}20; color: {{ $tagItem->color }}">
                                #{{ $tagItem->name }}
                            </span>
                        @endforeach
                    </div>
                @endif

                <!-- Footer -->
                <div class="flex items-center justify-between pt-4 border-t border-gray-100 mt-auto">

                    <!-- Avatar + User -->
                    <div class="flex items-center space-x-2">

                        @if($post->user->avatar)
                            <img src="{{ $post->user->avatar }}"
                                class="w-8 h-8 rounded-full object-cover shadow-sm border border-gray-200" />
                        @else
                            <div class="w-8 h-8 rounded-full flex items-center justify-center font-semibold text-gray-700 shadow-sm bg-gray-200 hover:bg-gray-300 transition-colors duration-200">
                                {{ $initials }}
                            </div>
                        @endif

                        <div>
                            <a href="{{ route('author.show', $post->user->username) }}">
                                <p class="text-sm font-medium text-gray-800 hover:text-cyan-950">{{ $post->user->name }}</p>
                            </a>
                            <p class="text-xs text-gray-500">
                                {{ $post->published_at?->diffForHumans() ?? 'Borrador' }}
                            </p>
                        </div>
                    </div>

                    <!-- Views + Reading time -->
                    <div class="flex items-center space-x-4 text-xs text-gray-500">

                        @if(isset($post->views_count))
                            <span class="flex items-center">
                                <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                </svg>
                                {{ number_format($post->views_count) }}
                            </span>
                        @endif

                        @if(isset($post->reading_time))
                            <span>{{ $post->reading_time }}</span>
                        @endif
                    </div>
                </div>
            </article>

        @empty
            <div class="col-span-full text-center py-12">
                <div class="text-6xl mb-4">🏷️</div>
                <h3 class="text-xl font-semibold text-gray-900 mb-2">No hay posts con este tag</h3>
                <p class="text-gray-600 mb-6">Aún no hay contenido etiquetado con "{{ $tag->name }}".</p>
                <a href="{{ route('posts.index') }}"
                   class="text-techgap-600 hover:text-techgap-700 font-semibold">
                    Ver todos los posts
                </a>
            </div>
        @endforelse
    </div>

    <!-- Pagination -->
    @if($posts->hasPages())
        <div class="mt-12">
            {{ $posts->links() }}
        </div>
    @endif

</div>
@endsection
