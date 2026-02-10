@extends('layouts.app', ['lightHeader' => true])

@section('content')
<div class="min-h-screen bg-slate-100 py-10">
    <div class="max-w-6xl mx-auto px-4 space-y-8">

        <!-- HEADER -->
        <div class="bg-white border border-slate-200 rounded-xl p-6 shadow-sm hover:shadow-md transition">
            <div class="flex items-center space-x-5">

                <!-- AVATAR -->
                <div class="w-20 h-20 rounded-xl bg-gradient-to-br from-slate-200 to-slate-300 flex items-center justify-center text-3xl font-bold text-gray-700">
                    @if($user->avatar)
                        <img src="{{ Storage::url($user->avatar) }}" class="w-full h-full object-cover rounded-xl">
                    @else
                        {{ strtoupper(substr($user->name, 0, 1)) }}
                    @endif
                </div>

                <div class="flex-1">
                    <h1 class="text-xl font-semibold text-slate-900">{{ $user->name }}</h1>

                    <span class="inline-block mt-2 px-2 py-0.5 text-xs rounded bg-blue-100 text-blue-700 border border-blue-200">
                        Autor
                    </span>
                </div>
            </div>

            <!-- BIO -->
            <div class="mt-4 text-slate-700 text-sm leading-relaxed">
                @if($user->bio)
                    {{ $user->bio }}
                @else
                    <span class="text-slate-400 italic">Este autor aún no ha escrito una biografía.</span>
                @endif
            </div>
        </div>

        <!-- GRID PRINCIPAL -->
        <div class="grid lg:grid-cols-3 gap-8">

            <!-- COLUMNA IZQUIERDA -->
            <div class="space-y-6">

                <!-- ESTADÍSTICAS -->
                <div class="bg-white border border-slate-200 rounded-xl p-6 shadow-sm hover:shadow-md transition">
                    <h2 class="text-lg font-semibold text-slate-900 mb-4">Estadísticas</h2>

                    <div class="grid grid-cols-2 gap-4">

                        <div class="p-3 bg-slate-50 border border-slate-200 rounded-lg hover:bg-blue-50 hover:border-blue-300 transition">
                            <p class="text-xs text-slate-500">Posts</p>
                            <p class="text-xl font-semibold text-slate-900">{{ number_format($stats['posts_count']) }}</p>
                        </div>

                        <div class="p-3 bg-slate-50 border border-slate-200 rounded-lg hover:bg-teal-50 hover:border-teal-300 transition">
                            <p class="text-xs text-slate-500">Vistas</p>
                            <p class="text-xl font-semibold text-slate-900">{{ number_format($stats['total_views']) }}</p>
                        </div>

                        <div class="p-3 bg-slate-50 border border-slate-200 rounded-lg hover:bg-purple-50 hover:border-purple-300 transition">
                            <p class="text-xs text-slate-500">Comentarios</p>
                            <p class="text-xl font-semibold text-slate-900">{{ number_format($stats['comments_count']) }}</p>
                        </div>

                    </div>
                </div>

                <!-- ACTIVIDAD DEL PERFIL (PÚBLICA) -->
                <div class="bg-white border border-slate-200 rounded-xl p-6 shadow-sm hover:shadow-md transition">
                    <h3 class="text-lg font-semibold text-slate-900 mb-4">Actividad del Autor</h3>

                    <div class="space-y-4 text-sm">

                        <div class="flex items-center text-slate-600">
                            <svg class="w-5 h-5 mr-3 text-[#1E40AF]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            <span>Activo: <span class="font-medium text-slate-900">{{ $user->updated_at->diffForHumans() }}</span></span>
                        </div>

                        <div class="flex items-center text-slate-600">
                            <svg class="w-5 h-5 mr-3 text-[#164E63]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8"/>
                            </svg>
                            <span>Interacciones totales:
                                <span class="font-medium text-slate-900">
                                    {{ $stats['comments_count'] + $stats['posts_count'] + $stats['total_likes'] }}
                                </span>
                            </span>
                        </div>

                        <div class="flex items-center text-slate-600">
                            <svg class="w-5 h-5 mr-3 text-[#4C1D95]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7"/>
                            </svg>
                            <span>Nivel de actividad:
                                <span class="font-medium text-slate-900">
                                    @if($stats['comments_count'] + $stats['posts_count'] > 20)
                                        Alto
                                    @elseif($stats['comments_count'] + $stats['posts_count'] > 5)
                                        Medio
                                    @else
                                        Bajo
                                    @endif
                                </span>
                            </span>
                        </div>

                    </div>
                </div>

            </div>

            <!-- COLUMNA DERECHA -->
            <div class="lg:col-span-2 space-y-6">

                <!-- POSTS DEL AUTOR -->
                <div class="bg-white border border-slate-200 rounded-xl p-6 shadow-sm hover:shadow-md transition">
                    <h2 class="text-lg font-semibold text-slate-900 mb-4">Artículos de {{ $user->name }}</h2>

                    @if($user->posts->count() > 0)
                        <div class="grid grid-cols-2 gap-4">
                            @foreach($user->posts()->latest()->take(6)->get() as $post)
                                <a href="{{ route('posts.show', $post->slug) }}"
                                   class="p-4 bg-slate-50 border border-slate-200 rounded-lg hover:border-indigo-400 hover:shadow-sm transition">

                                    @if($post->featured_image)
                                        <img src="{{ $post->featured_image }}" class="w-full h-28 object-cover rounded-md mb-3">
                                    @else
                                        <div class="w-full h-28 bg-slate-200 rounded-md flex items-center justify-center text-3xl text-indigo-600 mb-3">
                                            {{ $post->category->icon }}
                                        </div>
                                    @endif

                                    <h3 class="text-sm font-semibold text-slate-900 line-clamp-2">{{ $post->title }}</h3>

                                    <p class="text-xs text-slate-500 mt-1">
                                        {{ number_format($post->views_count) }} vistas
                                    </p>
                                </a>
                            @endforeach
                        </div>
                    @else
                        <p class="text-slate-500 text-sm">Este autor aún no ha publicado artículos.</p>
                    @endif
                </div>

            </div>

        </div>

    </div>
</div>
@endsection
