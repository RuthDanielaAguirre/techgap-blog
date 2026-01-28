@extends('layouts.app')

@section('content')
<div class="bg-gray-50 min-h-screen">
    <!-- Breadcrumb -->
    <div class="bg-white border-b border-gray-200">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
            <nav class="flex items-center space-x-2 text-sm">
                <a href="{{ route('home') }}" class="text-gray-500 hover:text-techgap-600 transition font-medium">Inicio</a>
                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
                <a href="{{ route('posts.category', $post->category->slug) }}" class="text-gray-500 hover:text-techgap-600 transition font-medium">
                    {{ $post->category->name }}
                </a>
                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
                <span class="text-gray-900 font-semibold truncate">{{ Str::limit($post->title, 50) }}</span>
            </nav>
        </div>
    </div>

    <!-- Article Container -->
    <article class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Article Header Card -->
        <div class="bg-white rounded-3xl shadow-2xl overflow-hidden mb-8 border border-gray-100">
            <!-- Featured Image -->
            @if($post->featured_image)
                <div class="relative h-96 overflow-hidden">
                    <img src="{{ $post->featured_image }}" 
                         alt="{{ $post->title }}"
                         class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/30 to-transparent"></div>
                    
                    <!-- Category Badge on Image -->
                    <div class="absolute top-6 left-6">
                        <a href="{{ route('posts.category', $post->category->slug) }}" 
                           class="inline-flex items-center px-4 py-2 rounded-xl text-sm font-bold text-white shadow-xl backdrop-blur-md hover:scale-105 transition"
                           style="background-color: {{ $post->category->color }}dd;">
                            <span class="text-2xl mr-2">{{ $post->category->icon }}</span>
                            {{ $post->category->name }}
                        </a>
                    </div>

                    <!-- Article Title on Image -->
                    <div class="absolute bottom-0 left-0 right-0 p-8">
                        <h1 class="text-4xl md:text-5xl font-extrabold text-white leading-tight mb-4 drop-shadow-lg">
                            {{ $post->title }}
                        </h1>
                    </div>
                </div>
            @else
                <!-- No Image: Show title in header -->
                <div class="px-8 pt-8">
                    <a href="{{ route('posts.category', $post->category->slug) }}" 
                       class="inline-flex items-center px-4 py-2 rounded-xl text-sm font-bold shadow-lg hover:shadow-xl transition"
                       style="background-color: {{ $post->category->color }}20; color: {{ $post->category->color }};">
                        <span class="text-2xl mr-2">{{ $post->category->icon }}</span>
                        {{ $post->category->name }}
                    </a>
                    <h1 class="text-4xl md:text-5xl font-extrabold text-gray-900 leading-tight mt-6">
                        {{ $post->title }}
                    </h1>
                </div>
            @endif

            <!-- Article Meta -->
            <div class="px-8 py-6 bg-gradient-to-r from-gray-50 to-blue-50 border-t border-gray-100">
                <div class="flex flex-wrap items-center gap-6">
                    <!-- Author -->
                    <div class="flex items-center space-x-3">
                        <div class="w-14 h-14 rounded-full bg-gradient-to-br from-techgap-400 via-techgap-500 to-techgap-600 flex items-center justify-center text-white font-bold text-xl shadow-lg ring-4 ring-white">
                            {{ strtoupper(substr($post->user->name, 0, 1)) }}
                        </div>
                        <div>
                            <p class="text-sm font-bold text-gray-900">{{ $post->user->name }}</p>
                            <p class="text-xs text-gray-600 font-medium">{{ $post->user->role->display_name }}</p>
                        </div>
                    </div>

                    <!-- Divider -->
                    <div class="hidden sm:block w-px h-12 bg-gray-300"></div>

                    <!-- Stats -->
                    <div class="flex flex-wrap items-center gap-4 text-sm text-gray-600">
                        <span class="flex items-center font-medium">
                            <svg class="w-5 h-5 mr-2 text-techgap-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                            {{ $post->published_at->format('d M Y') }}
                        </span>
                        <span class="flex items-center font-medium">
                            <svg class="w-5 h-5 mr-2 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            {{ $post->reading_time }}
                        </span>
                        <span class="flex items-center font-medium">
                            <svg class="w-5 h-5 mr-2 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                            </svg>
                            {{ number_format($post->views_count) }} vistas
                        </span>
                        <span class="flex items-center font-medium">
                            <svg class="w-5 h-5 mr-2 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"></path>
                            </svg>
                            {{ $post->comments_count }} comentarios
                        </span>
                    </div>
                </div>

                <!-- Tags -->
                <div class="flex flex-wrap gap-2 mt-6">
                    @foreach($post->tags as $tag)
                        <a href="{{ route('posts.tag', $tag->slug) }}" 
                           class="px-3 py-1.5 text-sm font-semibold rounded-lg hover:shadow-lg transition transform hover:-translate-y-0.5"
                           style="background-color: {{ $tag->color }}20; color: {{ $tag->color }};">
                            #{{ $tag->name }}
                        </a>
                    @endforeach
                </div>
            </div>

            <!-- Article Content -->
            <div class="px-8 py-10">
                <!-- Excerpt -->
                @if($post->excerpt)
                    <div class="bg-gradient-to-r from-techgap-50 to-blue-50 border-l-4 border-techgap-500 p-6 rounded-r-xl mb-8">
                        <p class="text-lg text-gray-700 font-medium leading-relaxed italic">
                            {{ $post->excerpt }}
                        </p>
                    </div>
                @endif

                <!-- Content -->
                <div class="prose prose-lg prose-techgap max-w-none">
                    {!! \Illuminate\Support\Str::markdown($post->content) !!}
                </div>
            </div>

            <!-- Actions Bar -->
            <div class="px-8 py-6 bg-gradient-to-r from-gray-50 to-blue-50 border-t border-gray-200">
                <div class="flex flex-wrap items-center justify-between gap-4">
                    <div class="flex items-center space-x-3">
                        <!-- Like Button -->
                        <button class="group flex items-center space-x-2 px-5 py-3 bg-white border-2 border-gray-200 rounded-xl hover:border-red-300 hover:bg-red-50 transition-all shadow-md hover:shadow-lg transform hover:-translate-y-0.5">
                            <svg class="w-6 h-6 text-gray-600 group-hover:text-red-500 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                            </svg>
                            <span class="text-sm font-bold text-gray-700 group-hover:text-red-600">
                                {{ $post->likes_count }}
                            </span>
                        </button>

                        <!-- Bookmark Button -->
                        <button class="group flex items-center space-x-2 px-5 py-3 bg-white border-2 border-gray-200 rounded-xl hover:border-amber-300 hover:bg-amber-50 transition-all shadow-md hover:shadow-lg transform hover:-translate-y-0.5">
                            <svg class="w-6 h-6 text-gray-600 group-hover:text-amber-600 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z"></path>
                            </svg>
                            <span class="text-sm font-bold text-gray-700 group-hover:text-amber-600">Guardar</span>
                        </button>
                    </div>

                    <!-- Share Button -->
                    <button class="flex items-center space-x-2 px-6 py-3 bg-gradient-to-r from-techgap-600 to-techgap-700 text-white rounded-xl hover:from-techgap-700 hover:to-techgap-800 transition-all shadow-lg hover:shadow-xl font-semibold transform hover:-translate-y-0.5">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z"></path>
                        </svg>
                        <span>Compartir</span>
                    </button>
                </div>
            </div>
        </div>

        <!-- Comments Section -->
        <div class="bg-white rounded-3xl shadow-2xl overflow-hidden border border-gray-100">
            <div class="px-8 py-6 bg-gradient-to-r from-techgap-600 to-techgap-700">
                <h2 class="text-2xl font-bold text-white flex items-center">
                    <svg class="w-7 h-7 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"></path>
                    </svg>
                    Comentarios ({{ $post->comments_count }})
                </h2>
                <p class="text-techgap-100 mt-1">Únete a la conversación</p>
            </div>

            <!-- Comment Form -->
            @auth
                <div class="px-8 py-6 bg-gradient-to-r from-gray-50 to-blue-50 border-b border-gray-200">
                    <form method="POST" action="{{ route('comments.store', $post) }}" class="space-y-4">
                        @csrf
                        <div class="flex items-start space-x-4">
                            <div class="w-12 h-12 rounded-full bg-gradient-to-br from-techgap-400 to-techgap-600 flex items-center justify-center text-white font-bold shadow-md flex-shrink-0">
                                {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                            </div>
                            <div class="flex-1">
                                <textarea 
                                    id="content" 
                                    name="content" 
                                    rows="4" 
                                    required
                                    placeholder="Comparte tu opinión sobre este artículo..."
                                    class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-techgap-500 focus:border-transparent transition resize-none text-sm"
                                ></textarea>
                                <div class="flex justify-between items-center mt-3">
                                    <p class="text-xs text-gray-500">Sé respetuoso y constructivo en tus comentarios</p>
                                    <button 
                                        type="submit"
                                        class="px-6 py-2.5 bg-gradient-to-r from-techgap-600 to-techgap-700 text-white rounded-xl hover:from-techgap-700 hover:to-techgap-800 transition font-semibold shadow-md hover:shadow-lg transform hover:-translate-y-0.5"
                                    >
                                        Publicar
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            @else
                <div class="px-8 py-6 bg-gradient-to-r from-blue-50 to-techgap-50 border-b border-blue-200">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-3">
                            <div class="w-12 h-12 bg-gradient-to-br from-techgap-500 to-techgap-700 rounded-full flex items-center justify-center shadow-lg">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm font-bold text-gray-900">¿Quieres participar en la conversación?</p>
                                <p class="text-xs text-gray-600">Inicia sesión para poder comentar</p>
                            </div>
                        </div>
                        <div class="flex items-center space-x-3">
                            <a href="{{ route('login') }}" class="px-4 py-2 text-sm font-semibold text-techgap-700 hover:text-techgap-800 transition">
                                Iniciar Sesión
                            </a>
                            <a href="{{ route('register') }}" class="px-5 py-2 bg-gradient-to-r from-techgap-600 to-techgap-700 text-white text-sm font-semibold rounded-lg hover:from-techgap-700 hover:to-techgap-800 transition shadow-md">
                                Registrarse
                            </a>
                        </div>
                    </div>
                </div>
            @endguest

            <!-- Comments List -->
            <div class="divide-y divide-gray-200">
                @forelse($post->comments as $comment)
                    <div class="px-8 py-6 hover:bg-gray-50 transition" x-data="{ showReplyForm: false }">
                        <div class="flex items-start space-x-4">
                            <!-- Avatar -->
                            <div class="w-12 h-12 rounded-full bg-gradient-to-br from-blue-400 to-blue-600 flex items-center justify-center text-white font-bold shadow-md flex-shrink-0">
                                {{ strtoupper(substr($comment->user->name, 0, 1)) }}
                            </div>
                            
                            <div class="flex-1 min-w-0">
                                <!-- Comment Header -->
                                <div class="flex items-center justify-between mb-2">
                                    <div class="flex items-center space-x-3">
                                        <span class="font-bold text-gray-900">{{ $comment->user->name }}</span>
                                        <span class="px-2 py-0.5 text-xs font-semibold rounded-full
                                            {{ $comment->user->isAdmin() ? 'bg-red-100 text-red-700' : 
                                               ($comment->user->isWriter() ? 'bg-amber-100 text-amber-700' : 
                                               'bg-green-100 text-green-700') }}">
                                            {{ $comment->user->role->display_name }}
                                        </span>
                                        <span class="text-sm text-gray-500">
                                            {{ $comment->created_at->diffForHumans() }}
                                        </span>
                                    </div>
                                    
                                    @auth
                                        @if(auth()->id() === $comment->user_id || auth()->user()->isAdmin())
                                            <form method="POST" action="{{ route('comments.destroy', $comment) }}" 
                                                  onsubmit="return confirm('¿Eliminar este comentario?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:text-red-800 text-sm font-medium transition">
                                                    Eliminar
                                                </button>
                                            </form>
                                        @endif
                                    @endauth
                                </div>
                                
                                <!-- Comment Content -->
                                <p class="text-gray-700 leading-relaxed mb-3">{{ $comment->content }}</p>

                                <!-- Comment Actions -->
                                @auth
                                    <button @click="showReplyForm = !showReplyForm" 
                                            class="text-sm text-techgap-600 hover:text-techgap-700 font-semibold transition flex items-center">
                                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h10a8 8 0 018 8v2M3 10l6 6m-6-6l6-6"></path>
                                        </svg>
                                        Responder
                                    </button>
                                @endauth

                                <!-- Replies -->
                                @if($comment->replies->count() > 0)
                                    <div class="mt-4 space-y-4 pl-6 border-l-2 border-gray-200">
                                        @foreach($comment->replies as $reply)
                                            <div class="flex items-start space-x-3">
                                                <div class="w-10 h-10 rounded-full bg-gradient-to-br from-green-400 to-green-600 flex items-center justify-center text-white font-bold text-sm shadow-md flex-shrink-0">
                                                    {{ strtoupper(substr($reply->user->name, 0, 1)) }}
                                                </div>
                                                <div class="flex-1">
                                                    <div class="flex items-center space-x-2 mb-1">
                                                        <span class="font-semibold text-gray-900 text-sm">{{ $reply->user->name }}</span>
                                                        <span class="text-xs text-gray-500">{{ $reply->created_at->diffForHumans() }}</span>
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
                    <div class="px-8 py-16 text-center">
                        <div class="inline-flex items-center justify-center w-20 h-20 bg-gray-100 rounded-full mb-4">
                            <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-2">Aún no hay comentarios</h3>
                        <p class="text-gray-600">Sé el primero en compartir tu opinión sobre este artículo</p>
                    </div>
                @endforelse
            </div>
        </div>

        <!-- Related Posts -->
        @if($relatedPosts->isNotEmpty())
            <div class="mt-12">
                <div class="mb-8">
                    <h2 class="text-3xl font-bold text-gray-900 mb-2 flex items-center">
                        <span class="text-4xl mr-3">📖</span>
                        Artículos Relacionados
                    </h2>
                    <p class="text-gray-600">Continúa aprendiendo con estos artículos similares</p>
                </div>
                
                <div class="grid md:grid-cols-3 gap-6">
                    @foreach($relatedPosts as $related)
                        <article class="group bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 overflow-hidden border border-gray-100 transform hover:-translate-y-2">
                            @if($related->featured_image)
                                <div class="relative h-48 overflow-hidden">
                                    <img src="{{ $related->featured_image }}" 
                                         alt="{{ $related->title }}"
                                         class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                                    <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent"></div>
                                    <div class="absolute bottom-3 left-3">
                                        <span class="px-2.5 py-1 rounded-lg text-xs font-bold text-white backdrop-blur-md"
                                              style="background-color: {{ $related->category->color }}cc;">
                                            {{ $related->category->icon }} {{ $related->category->name }}
                                        </span>
                                    </div>
                                </div>
                            @endif
                            <div class="p-5">
                                <h3 class="text-base font-bold text-gray-900 mb-2 group-hover:text-techgap-600 transition line-clamp-2">
                                    <a href="{{ route('posts.show', $related->slug) }}">
                                        {{ $related->title }}
                                    </a>
                                </h3>
                                <div class="flex items-center justify-between text-xs text-gray-500 mt-3">
                                    <span class="font-medium">{{ $related->user->name }}</span>
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
