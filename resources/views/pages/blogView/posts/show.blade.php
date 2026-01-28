@extends('layouts.app')

@section('content')
<div class="bg-gray-50 min-h-screen">
    <!-- Breadcrumb -->
    <div class="bg-white border-b border-gray-200">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
            <nav class="flex items-center space-x-2 text-sm text-gray-500">
                <a href="{{ route('home') }}" class="hover:text-techgap-600 transition">Inicio</a>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
                <a href="{{ route('posts.category', $post->category->slug) }}" class="hover:text-techgap-600 transition">
                    {{ $post->category->name }}
                </a>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
                <span class="text-gray-900 font-medium truncate">{{ Str::limit($post->title, 50) }}</span>
            </nav>
        </div>
    </div>

    <!-- Article Header -->
    <article class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
            <!-- Category Badge -->
            <div class="px-8 pt-8">
                <a href="{{ route('posts.category', $post->category->slug) }}" 
                   class="inline-flex items-center px-4 py-2 rounded-full text-sm font-semibold transition hover:shadow-md"
                   style="background-color: {{ $post->category->color }}20; color: {{ $post->category->color }};">
                    <span class="text-2xl mr-2">{{ $post->category->icon }}</span>
                    {{ $post->category->name }}
                </a>
            </div>

            <!-- Title -->
            <div class="px-8 pt-6">
                <h1 class="text-4xl md:text-5xl font-extrabold text-gray-900 leading-tight mb-6">
                    {{ $post->title }}
                </h1>

                <!-- Meta Information -->
                <div class="flex flex-wrap items-center gap-6 pb-6 border-b border-gray-200">
                    <!-- Author -->
                    <div class="flex items-center space-x-3">
                        <div class="w-12 h-12 rounded-full bg-gradient-to-br from-techgap-400 to-techgap-600 flex items-center justify-center text-white font-bold text-lg shadow-md">
                            {{ substr($post->user->name, 0, 1) }}
                        </div>
                        <div>
                            <p class="text-sm font-semibold text-gray-900">{{ $post->user->name }}</p>
                            <p class="text-xs text-gray-500">{{ $post->user->role->display_name }}</p>
                        </div>
                    </div>

                    <!-- Stats -->
                    <div class="flex items-center space-x-4 text-sm text-gray-600">
                        <span class="flex items-center">
                            <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                            {{ $post->published_at->format('d M Y') }}
                        </span>
                        <span class="flex items-center">
                            <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            {{ $post->reading_time }}
                        </span>
                        <span class="flex items-center">
                            <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                            </svg>
                            {{ number_format($post->views_count) }} vistas
                        </span>
                    </div>
                </div>

                <!-- Tags -->
                <div class="flex flex-wrap gap-2 py-6">
                    @foreach($post->tags as $tag)
                        <a href="{{ route('posts.tag', $tag->slug) }}" 
                           class="px-3 py-1.5 text-sm font-medium rounded-lg hover:shadow-md transition"
                           style="background-color: {{ $tag->color }}20; color: {{ $tag->color }};">
                            #{{ $tag->name }}
                        </a>
                    @endforeach
                </div>
            </div>

            <!-- Content -->
            <div class="px-8 pb-8">
                <div class="prose prose-lg prose-techgap max-w-none">
                    {!! \Illuminate\Support\Str::markdown($post->content) !!}
                </div>
            </div>

            <!-- Actions Bar -->
            <div class="px-8 py-6 bg-gray-50 border-t border-gray-200">
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-4">
                        <!-- Like Button -->
                        <button class="flex items-center space-x-2 px-4 py-2 bg-white border border-gray-300 rounded-lg hover:bg-red-50 hover:border-red-300 transition group">
                            <svg class="w-5 h-5 text-gray-600 group-hover:text-red-500 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                            </svg>
                            <span class="text-sm font-medium text-gray-700 group-hover:text-red-600">
                                {{ $post->likes_count }}
                            </span>
                        </button>

                        <!-- Bookmark Button -->
                        <button class="flex items-center space-x-2 px-4 py-2 bg-white border border-gray-300 rounded-lg hover:bg-yellow-50 hover:border-yellow-300 transition group">
                            <svg class="w-5 h-5 text-gray-600 group-hover:text-yellow-600 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z"></path>
                            </svg>
                            <span class="text-sm font-medium text-gray-700">Guardar</span>
                        </button>
                    </div>

                    <!-- Share Button -->
                    <button class="flex items-center space-x-2 px-4 py-2 bg-techgap-600 text-white rounded-lg hover:bg-techgap-700 transition shadow-md hover:shadow-lg">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z"></path>
                        </svg>
                        <span class="text-sm font-medium">Compartir</span>
                    </button>
                </div>
            </div>
        </div>

        <!-- Comments Section -->
        <div class="bg-white rounded-2xl shadow-lg mt-8 overflow-hidden">
            <div class="px-8 py-6 border-b border-gray-200">
                <h2 class="text-2xl font-bold text-gray-900">
                    💬 Comentarios ({{ $post->comments_count }})
                </h2>
            </div>

            <!-- Comment Form -->
            @auth
                <div class="px-8 py-6 bg-gray-50 border-b border-gray-200">
                    <form method="POST" action="{{ route('comments.store', $post) }}" class="space-y-4">
                        @csrf
                        <div>
                            <label for="content" class="block text-sm font-medium text-gray-700 mb-2">
                                Escribe tu comentario
                            </label>
                            <textarea 
                                id="content" 
                                name="content" 
                                rows="4" 
                                required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-techgap-500 focus:border-transparent transition resize-none"
                                placeholder="Comparte tu opinión..."
                            ></textarea>
                        </div>
                        <div class="flex justify-end">
                            <button 
                                type="submit"
                                class="px-6 py-2.5 bg-techgap-600 text-white rounded-lg hover:bg-techgap-700 transition font-medium shadow-md hover:shadow-lg"
                            >
                                Publicar Comentario
                            </button>
                        </div>
                    </form>
                </div>
            @else
                <div class="px-8 py-6 bg-blue-50 border-b border-blue-200">
                    <p class="text-blue-800 text-center">
                        <a href="{{ route('login') }}" class="font-semibold hover:underline">Inicia sesión</a> 
                        o 
                        <a href="{{ route('register') }}" class="font-semibold hover:underline">regístrate</a> 
                        para comentar
                    </p>
                </div>
            @endauth

            <!-- Comments List -->
            <div class="divide-y divide-gray-200">
                @forelse($post->comments as $comment)
                    <div class="px-8 py-6" x-data="{ showReplies: true }">
                        <!-- Comment Header -->
                        <div class="flex items-start space-x-4">
                            <div class="w-10 h-10 rounded-full bg-gradient-to-br from-blue-400 to-blue-600 flex items-center justify-center text-white font-semibold flex-shrink-0">
                                {{ substr($comment->user->name, 0, 1) }}
                            </div>
                            <div class="flex-1 min-w-0">
                                <div class="flex items-center justify-between mb-2">
                                    <div>
                                        <span class="font-semibold text-gray-900">{{ $comment->user->name }}</span>
                                        <span class="text-sm text-gray-500 ml-2">
                                            {{ $comment->created_at->diffForHumans() }}
                                        </span>
                                    </div>
                                    @can('delete', $comment)
                                        <form method="POST" action="{{ route('comments.destroy', $comment) }}" 
                                              onsubmit="return confirm('¿Eliminar este comentario?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-800 text-sm">
                                                Eliminar
                                            </button>
                                        </form>
                                    @endcan
                                </div>
                                <p class="text-gray-700 leading-relaxed">{{ $comment->content }}</p>

                                <!-- Reply Button -->
                                <button @click="showReplyForm = !showReplyForm" 
                                        class="mt-2 text-sm text-techgap-600 hover:text-techgap-700 font-medium">
                                    Responder
                                </button>

                                <!-- Replies -->
                                @if($comment->replies->count() > 0)
                                    <div class="mt-4 space-y-4">
                                        @foreach($comment->replies as $reply)
                                            <div class="flex items-start space-x-3 pl-6 border-l-2 border-gray-200">
                                                <div class="w-8 h-8 rounded-full bg-gradient-to-br from-green-400 to-green-600 flex items-center justify-center text-white font-semibold text-sm flex-shrink-0">
                                                    {{ substr($reply->user->name, 0, 1) }}
                                                </div>
                                                <div class="flex-1 min-w-0">
                                                    <div class="flex items-center justify-between mb-1">
                                                        <div>
                                                            <span class="font-semibold text-gray-900 text-sm">{{ $reply->user->name }}</span>
                                                            <span class="text-xs text-gray-500 ml-2">
                                                                {{ $reply->created_at->diffForHumans() }}
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <p class="text-gray-700 text-sm">{{ $reply->content }}</p>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="px-8 py-12 text-center">
                        <svg class="w-16 h-16 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                        </svg>
                        <p class="text-gray-500">Sé el primero en comentar este artículo</p>
                    </div>
                @endforelse
            </div>
        </div>

        <!-- Related Posts -->
        @if($relatedPosts->isNotEmpty())
            <div class="mt-12">
                <h2 class="text-2xl font-bold text-gray-900 mb-6">📖 Artículos Relacionados</h2>
                <div class="grid md:grid-cols-3 gap-6">
                    @foreach($relatedPosts as $related)
                        <article class="bg-white rounded-xl shadow-md hover:shadow-xl transition overflow-hidden border border-gray-100">
                            <div class="p-5">
                                <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold mb-3"
                                      style="background-color: {{ $related->category->color }}20; color: {{ $related->category->color }};">
                                    {{ $related->category->icon }} {{ $related->category->name }}
                                </span>
                                <h3 class="text-base font-bold text-gray-900 mb-2 hover:text-techgap-600 transition line-clamp-2">
                                    <a href="{{ route('posts.show', $related->slug) }}">
                                        {{ $related->title }}
                                    </a>
                                </h3>
                                <div class="flex items-center justify-between text-xs text-gray-500 mt-3">
                                    <span>{{ $related->user->name }}</span>
                                    <span>{{ $related->reading_time }}</span>
                                </div>
                            </div>
                        </article>
                    @endforeach
                </div>
            </div>
        @endif
    </article>
</div>
@endsection
