@extends('layouts.app')

@section('content')
<div class="bg-gradient-to-br from-gray-50 to-blue-50 min-h-screen py-12">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header con Cover Image -->
        <div class="bg-white rounded-3xl shadow-2xl overflow-hidden mb-8 border border-gray-100">
            <!-- Cover Image -->
            <div class="h-48 bg-gradient-to-r from-techgap-500 via-techgap-600 to-blue-600 relative">
                <div class="absolute inset-0 opacity-20">
                    <div class="absolute inset-0" style="background-image: url('data:image/svg+xml,%3Csvg width=\'60\' height=\'60\' viewBox=\'0 0 60 60\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cg fill=\'none\' fill-rule=\'evenodd\'%3E%3Cg fill=\'%23ffffff\' fill-opacity=\'1\'%3E%3Cpath d=\'M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z\'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>
                </div>
            </div>

            <!-- Profile Info -->
            <div class="px-8 pb-8 -mt-20 relative">
                <div class="flex flex-col md:flex-row md:items-end md:space-x-6">
                    <!-- Avatar -->
                    <div class="relative mb-4 md:mb-0">
                        <div class="w-32 h-32 rounded-3xl bg-gradient-to-br from-techgap-400 via-techgap-500 to-techgap-600 flex items-center justify-center text-white font-bold text-5xl shadow-2xl ring-8 ring-white">
                            @if($user->avatar)
                                <img src="{{ Storage::url($user->avatar) }}" alt="{{ $user->name }}" class="w-full h-full object-cover rounded-3xl">
                            @else
                                {{ strtoupper(substr($user->name, 0, 1)) }}
                            @endif
                        </div>
                        <div class="absolute -bottom-2 -right-2 w-10 h-10 bg-green-500 rounded-full border-4 border-white shadow-lg flex items-center justify-center">
                            <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                    </div>

                    <!-- User Info -->
                    <div class="flex-1 min-w-0">
                        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-4">
                            <div>
                                <h1 class="text-3xl font-extrabold text-gray-900 mb-2">{{ $user->name }}</h1>
                                <div class="flex flex-wrap items-center gap-3 text-sm">
                                    <span class="flex items-center text-gray-600">
                                        <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                        </svg>
                                        {{ $user->email }}
                                    </span>
                                    <span class="px-3 py-1 rounded-full text-xs font-bold
                                        {{ $user->isAdmin() ? 'bg-red-100 text-red-700' : 
                                           ($user->isWriter() ? 'bg-amber-100 text-amber-700' : 
                                           'bg-green-100 text-green-700') }}">
                                        {{ $user->role->display_name }}
                                    </span>
                                    @if($user->website)
                                        <a href="{{ $user->website }}" target="_blank" class="flex items-center text-techgap-600 hover:text-techgap-700 font-medium">
                                            <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"></path>
                                            </svg>
                                            Sitio Web
                                        </a>
                                    @endif
                                </div>
                            </div>

                            <a href="{{ route('profile.edit') }}" 
                               class="mt-4 sm:mt-0 inline-flex items-center px-6 py-3 bg-gradient-to-r from-techgap-600 to-techgap-700 text-white rounded-xl font-semibold hover:from-techgap-700 hover:to-techgap-800 transition shadow-md hover:shadow-lg transform hover:-translate-y-0.5">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                </svg>
                                Editar Perfil
                            </a>
                        </div>

                        @if($user->bio)
                            <p class="text-gray-700 leading-relaxed">{{ $user->bio }}</p>
                        @else
                            <p class="text-gray-500 italic">No has agregado una biografía aún.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="grid lg:grid-cols-3 gap-8">
            <!-- Estadísticas -->
            <div class="lg:col-span-1 space-y-6">
                <!-- Stats Card -->
                <div class="bg-white rounded-2xl shadow-lg p-6 border border-gray-100">
                    <h2 class="text-xl font-bold text-gray-900 mb-6 flex items-center">
                        <svg class="w-6 h-6 mr-2 text-techgap-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                        </svg>
                        Estadísticas
                    </h2>

                    <div class="space-y-4">
                        @if($user->isWriter() || $user->isAdmin())
                            <!-- Posts -->
                            <div class="flex items-center justify-between p-4 bg-gradient-to-r from-blue-50 to-techgap-50 rounded-xl">
                                <div class="flex items-center space-x-3">
                                    <div class="w-12 h-12 bg-blue-500 rounded-xl flex items-center justify-center shadow-md">
                                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-sm text-gray-600 font-medium">Posts</p>
                                        <p class="text-2xl font-bold text-gray-900">{{ number_format($stats['posts_count']) }}</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Views -->
                            <div class="flex items-center justify-between p-4 bg-gradient-to-r from-green-50 to-emerald-50 rounded-xl">
                                <div class="flex items-center space-x-3">
                                    <div class="w-12 h-12 bg-green-500 rounded-xl flex items-center justify-center shadow-md">
                                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-sm text-gray-600 font-medium">Vistas Totales</p>
                                        <p class="text-2xl font-bold text-gray-900">{{ number_format($stats['total_views']) }}</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Likes -->
                            <div class="flex items-center justify-between p-4 bg-gradient-to-r from-red-50 to-pink-50 rounded-xl">
                                <div class="flex items-center space-x-3">
                                    <div class="w-12 h-12 bg-red-500 rounded-xl flex items-center justify-center shadow-md">
                                        <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-sm text-gray-600 font-medium">Likes Recibidos</p>
                                        <p class="text-2xl font-bold text-gray-900">{{ number_format($stats['total_likes']) }}</p>
                                    </div>
                                </div>
                            </div>
                        @endif

                        <!-- Comments -->
                        <div class="flex items-center justify-between p-4 bg-gradient-to-r from-purple-50 to-indigo-50 rounded-xl">
                            <div class="flex items-center space-x-3">
                                <div class="w-12 h-12 bg-purple-500 rounded-xl flex items-center justify-center shadow-md">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-600 font-medium">Comentarios</p>
                                    <p class="text-2xl font-bold text-gray-900">{{ number_format($stats['comments_count']) }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Member Since -->
                <div class="bg-white rounded-2xl shadow-lg p-6 border border-gray-100">
                    <h3 class="text-lg font-bold text-gray-900 mb-4">Información de Cuenta</h3>
                    <div class="space-y-3 text-sm">
                        <div class="flex items-center text-gray-600">
                            <svg class="w-5 h-5 mr-3 text-techgap-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                            <span>Miembro desde {{ $user->created_at->format('d M Y') }}</span>
                        </div>
                        <div class="flex items-center text-gray-600">
                            <svg class="w-5 h-5 mr-3 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span>Email verificado</span>
                        </div>
                        <div class="flex items-center text-gray-600">
                            <svg class="w-5 h-5 mr-3 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span>Última actualización {{ $user->updated_at->diffForHumans() }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Actividad Reciente -->
            <div class="lg:col-span-2 space-y-6">
                <!-- Recent Posts -->
                @if($user->isWriter() || $user->isAdmin())
                    <div class="bg-white rounded-2xl shadow-lg p-6 border border-gray-100">
                        <div class="flex items-center justify-between mb-6">
                            <h2 class="text-xl font-bold text-gray-900 flex items-center">
                                <svg class="w-6 h-6 mr-2 text-techgap-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                                Mis Últimos Posts
                            </h2>
                            @if($user->isWriter() || $user->isAdmin())
                                <a href="/admin" class="text-sm text-techgap-600 hover:text-techgap-700 font-semibold">
                                    Ver todos →
                                </a>
                            @endif
                        </div>

                        @if($user->posts->count() > 0)
                            <div class="space-y-4">
                                @foreach($user->posts()->latest()->take(3)->get() as $post)
                                    <a href="{{ route('posts.show', $post->slug) }}" class="group block p-4 rounded-xl hover:bg-gray-50 transition border border-gray-100 hover:border-techgap-200">
                                        <div class="flex items-start space-x-4">
                                            @if($post->featured_image)
                                                <img src="{{ $post->featured_image }}" alt="{{ $post->title }}" class="w-20 h-20 rounded-lg object-cover flex-shrink-0">
                                            @else
                                                <div class="w-20 h-20 rounded-lg bg-gradient-to-br from-techgap-500 to-techgap-700 flex items-center justify-center text-3xl flex-shrink-0">
                                                    {{ $post->category->icon }}
                                                </div>
                                            @endif
                                            <div class="flex-1 min-w-0">
                                                <h3 class="text-base font-bold text-gray-900 group-hover:text-techgap-600 transition line-clamp-2 mb-2">
                                                    {{ $post->title }}
                                                </h3>
                                                <div class="flex items-center space-x-4 text-xs text-gray-500">
                                                    <span class="px-2 py-1 rounded-full font-semibold
                                                        {{ $post->status === 'published' ? 'bg-green-100 text-green-700' : 'bg-yellow-100 text-yellow-700' }}">
                                                        {{ ucfirst($post->status) }}
                                                    </span>
                                                    <span class="flex items-center">
                                                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                                        </svg>
                                                        {{ number_format($post->views_count) }}
                                                    </span>
                                                    <span>{{ $post->published_at->diffForHumans() }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        @else
                            <div class="text-center py-12">
                                <div class="inline-flex items-center justify-center w-16 h-16 bg-gray-100 rounded-full mb-4">
                                    <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                    </svg>
                                </div>
                                <p class="text-gray-600">Aún no has publicado ningún artículo</p>
                                <a href="/admin" class="inline-block mt-4 px-6 py-2 bg-techgap-600 text-white rounded-lg font-semibold hover:bg-techgap-700 transition">
                                    Crear mi primer post
                                </a>
                            </div>
                        @endif
                    </div>
                @endif

                <!-- Recent Comments -->
                <div class="bg-white rounded-2xl shadow-lg p-6 border border-gray-100">
                    <div class="flex items-center justify-between mb-6">
                        <h2 class="text-xl font-bold text-gray-900 flex items-center">
                            <svg class="w-6 h-6 mr-2 text-techgap-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"></path>
                            </svg>
                            Mis Últimos Comentarios
                        </h2>
                    </div>

                    @if($user->comments->count() > 0)
                        <div class="space-y-4">
                            @foreach($user->comments()->latest()->take(5)->get() as $comment)
                                <div class="p-4 rounded-xl border border-gray-100 hover:bg-gray-50 transition">
                                    <div class="flex items-start justify-between mb-2">
                                        <a href="{{ route('posts.show', $comment->post->slug) }}" class="text-sm font-semibold text-techgap-600 hover:text-techgap-700 line-clamp-1">
                                            En: {{ $comment->post->title }}
                                        </a>
                                        <span class="text-xs text-gray-500 flex-shrink-0 ml-2">
                                            {{ $comment->created_at->diffForHumans() }}
                                        </span>
                                    </div>
                                    <p class="text-sm text-gray-700 line-clamp-2">{{ $comment->content }}</p>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="text-center py-12">
                            <div class="inline-flex items-center justify-center w-16 h-16 bg-gray-100 rounded-full mb-4">
                                <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"></path>
                                </svg>
                            </div>
                            <p class="text-gray-600">Aún no has comentado en ningún artículo</p>
                            <a href="{{ route('posts.index') }}" class="inline-block mt-4 px-6 py-2 bg-techgap-600 text-white rounded-lg font-semibold hover:bg-techgap-700 transition">
                                Explorar artículos
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
