@extends('layouts.app', ['lightHeader' => true])

@section('content')
<div class="min-h-screen bg-slate-100 py-10">
    <div class="max-w-6xl mx-auto px-4 space-y-8">

        <!-- HEADER -->
        <div class="bg-white border border-slate-200 rounded-xl p-6 shadow-sm hover:shadow-md transition">
            <div class="flex items-center space-x-5">

                <!-- AVATAR -->
                <div class="w-20 h-20 rounded-xl bg-linear-to-br from-slate-200 to-slate-300 flex items-center justify-center text-3xl font-bold text-gray-700">
                    @if($user->avatar)
                        <img src="{{ Storage::url($user->avatar) }}" class="w-full h-full object-cover rounded-xl">
                    @else
                        {{ strtoupper(substr($user->name, 0, 1)) }}
                    @endif
                </div>

                <div class="flex-1">
                    <h1 class="text-xl font-semibold text-slate-900">{{ $user->name }}</h1>
                    <p class="text-slate-500 text-sm">{{ $user->email }}</p>

                    <span class="inline-block mt-2 px-2 py-0.5 text-xs rounded bg-blue-100 text-blue-700 border border-blue-200">
                        {{ $user->role->display_name }}
                    </span>
                </div>

                <a href="{{ route('profile.edit') }}"
                   class="px-4 py-2 bg-[#1E40AF] hover:bg-blue-600 text-white rounded-lg text-sm transition shadow-sm">
                    Editar
                </a>
            </div>

            <!-- BIO -->
            <div class="mt-4 text-slate-700 text-sm leading-relaxed">
                @if($user->bio)
                    {{ $user->bio }}
                @else
                    <span class="text-slate-400 italic">No has agregado una biografía aún.</span>
                @endif
            </div>

            <!-- ESTADO DE ESCRITOR (COMPACTO) -->
            <div class="mt-5">
                @if($user->role->name === 'subscriber')
                    @if($user->writer_request_status === 'pending')
                        <div class="inline-flex items-center px-4 py-2 bg-purple-50 border border-purple-200 text-purple-700 rounded-lg text-sm shadow-sm">
                            Solicitud en revisión
                        </div>
                    @else
                        {{-- <form action="{{ route('writer.request') }}" method="POST">
                            @csrf
                            <button class="inline-flex items-center px-4 py-2 bg-emerald-600 hover:bg-emerald-500 text-white rounded-lg text-sm transition shadow-sm">
                                Solicitar ser escritor
                            </button>
                        </form> --}}
                    @endif
                @elseif($user->isWriter())
                    <div class="inline-flex items-center px-4 py-2 bg-emerald-50 border border-emerald-200 text-emerald-700 rounded-lg text-sm shadow-sm">
                        ¡Ya eres escritor! Disfruta de tu nuevo rol.
                    </div>
                @endif
            </div>
        </div>

        <!-- GRID PRINCIPAL -->
        <div class="grid lg:grid-cols-3 gap-8">

            <!-- COLUMNA IZQUIERDA -->
            <div class="space-y-6">

                <!-- INFO DE CUENTA -->
                <div class="bg-white border border-slate-200 rounded-xl p-6 shadow-sm hover:shadow-md transition">
                    <h3 class="text-lg font-semibold text-slate-900 mb-4">Información de Cuenta</h3>

                    <div class="space-y-3 text-sm text-slate-600">
                        <div class="flex items-center text-gray-600">
                            <svg class="w-5 h-5 mr-3 text-techgap-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                            <span>Miembro desde {{ $user->created_at->format('d M Y') }}</span>
                        </div>
                        <div class="flex items-center text-gray-600">
                            <svg class="w-5 h-5 mr-3 text-[#10B981]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span>Email verificado</span>
                        </div>
                        <div class="flex items-center text-gray-600">
                            <svg class="w-5 h-5 mr-3 text-[#3B82F6]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span>Última actualización {{ $user->updated_at->diffForHumans() }}</span>
                        </div>
                    </div>
                </div>

                <!-- ESTADÍSTICAS -->
                <div class="bg-white border border-slate-200 rounded-xl p-6 shadow-sm">
                    <h2 class="text-lg font-semibold text-slate-900 mb-4">Estadísticas</h2>

                    <div class="grid grid-cols-2 gap-4">

                        @if($user->isWriter() || $user->isAdmin())
                        <!-- POSTS -->
                        <div class="p-3 bg-slate-50 border border-slate-200 rounded-lg hover:bg-blue-50 hover:border-blue-300 transition">
                            <div class="flex items-center space-x-2">
                                <p class="text-xs text-slate-500">Posts</p>
                            </div>
                            <p class="text-xl font-semibold text-slate-900">{{ number_format($stats['posts_count']) }}</p>
                        </div>

                        <!-- VISTAS -->
                        <div class="p-3 bg-slate-50 border border-slate-200 rounded-lg hover:bg-teal-50 hover:border-teal-300 transition">
                            <div class="flex items-center space-x-2">
                                <p class="text-xs text-slate-500">Vistas</p>
                            </div>
                            <p class="text-xl font-semibold text-slate-900">{{ number_format($stats['total_views']) }}</p>
                        </div>

                        <!-- LIKES -->
                        <div class="p-3 bg-slate-50 border border-slate-200 rounded-lg hover:bg-rose-50 hover:border-rose-300 transition">
                            <div class="flex items-center space-x-2">
                                <p class="text-xs text-slate-500">Likes</p>
                            </div>
                            <p class="text-xl font-semibold text-slate-900">{{ number_format($stats['total_likes']) }}</p>
                        </div>
                        @endif

                        <!-- COMENTARIOS -->
                        <div class="p-3 bg-slate-50 border border-slate-200 rounded-lg hover:bg-purple-50 hover:border-purple-300 transition">
                            <div class="flex items-center space-x-2">
                                <p class="text-xs text-slate-500">Comentarios</p>
                            </div>
                            <p class="text-xl font-semibold text-slate-900">{{ number_format($stats['comments_count']) }}</p>
                        </div>

                    </div>
                </div>

                <!-- ACTIVIDAD DEL PERFIL -->
                <div class="bg-white border border-slate-200 rounded-xl p-6 shadow-sm hover:shadow-md transition">
                    <h3 class="text-lg font-semibold text-slate-900 mb-4">Actividad del Perfil</h3>

                    <div class="space-y-4 text-sm">

                        <!-- Último inicio de sesión -->
                        <div class="flex items-center text-slate-600">
                            <svg class="w-5 h-5 mr-3 text-[#1E40AF]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            <span>
                                Último inicio de sesión:
                                <span class="font-medium text-slate-900">{{ $user->updated_at->diffForHumans() }}</span>
                            </span>
                        </div>

                        <!-- Interacciones totales -->
                        <div class="flex items-center text-slate-600">
                            <svg class="w-5 h-5 mr-3 text-[#164E63]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8"/>
                            </svg>
                            <span>
                                Interacciones totales:
                                <span class="font-medium text-slate-900">
                                    {{ $stats['comments_count'] + $stats['posts_count'] + $stats['total_likes'] }}
                                </span>
                            </span>
                        </div>

                        <!-- Nivel de actividad -->
                        <div class="flex items-center text-slate-600">
                            <svg class="w-5 h-5 mr-3 text-[#4C1D95]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7"/>
                            </svg>
                            <span>
                                Nivel de actividad:
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

                        <!-- Estado de participación -->
                        <div class="flex items-center text-slate-600">
                            <svg class="w-5 h-5 mr-3 text-[#831843]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 4v16m8-8H4"/>
                            </svg>
                            <span>
                                Estado de participación:
                                <span class="font-medium text-slate-900">
                                    @if($stats['comments_count'] > 10)
                                        Muy participativo
                                    @elseif($stats['comments_count'] > 3)
                                        Participativo
                                    @else
                                        Poco participativo
                                    @endif
                                </span>
                            </span>
                        </div>

                    </div>
                </div>

                <!-- CONFIGURACIÓN RÁPIDA -->
                <div class="bg-white border border-slate-200 rounded-xl p-6 shadow-sm hover:shadow-md transition">
                    <h3 class="text-lg font-semibold text-slate-900 mb-4">Configuración Rápida</h3>

                    <div class="space-y-4 text-sm">

                        <a href="{{ route('profile.edit') }}" class="flex items-center text-slate-600 hover:text-slate-900 transition">
                            <svg class="w-5 h-5 mr-3 text-[#1E293B]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M11 5h2m-1 0v14m-7-7h14"/>
                            </svg>
                            Editar perfil
                        </a>

                        <a href="/settings" class="flex items-center text-slate-600 hover:text-slate-900 transition">
                            <svg class="w-5 h-5 mr-3 text-[#312E81]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8c-1.657 0-3 1.343-3 3v5h6v-5c0-1.657-1.343-3-3-3z"/>
                            </svg>
                            Seguridad y privacidad
                        </a>

                        <a href="/notifications" class="flex items-center text-slate-600 hover:text-slate-900 transition">
                            <svg class="w-5 h-5 mr-3 text-[#164E63]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6 6 0 10-12 0v3.159c0 .538-.214 1.055-.595 1.436L4 17h5"/>
                            </svg>
                            Notificaciones
                        </a>

                    </div>
                </div>
            </div>

            <!-- COLUMNA DERECHA -->
            <div class="lg:col-span-2 space-y-6">

                <!-- POSTS -->
                @if($user->isWriter() || $user->isAdmin())
                <div class="bg-white border border-slate-200 rounded-xl p-6 shadow-sm hover:shadow-md transition">
                    <div class="flex items-center justify-between mb-4">
                        <h2 class="text-lg font-semibold text-slate-900">Mis últimos posts</h2>
                        <a href="/dashboard/posts" class="text-sm text-blue-600 hover:text-blue-500">Ver todos →</a>
                    </div>

                    @if($user->posts->count() > 0)
                        <div class="grid grid-cols-2 gap-4">
                            @foreach($user->posts()->latest()->take(4)->get() as $post)
                                <a href="{{ route('posts.show', $post->slug) }}"
                                   class="p-4 bg-slate-50 border border-slate-200 rounded-lg hover:border-gray-400 hover:shadow-sm transition">

                                    @if($post->featured_image)
                                        <img src="{{ $post->featured_image }}" class="w-full h-28 object-cover rounded-md mb-3">
                                    @else
                                        <div class="w-full h-28 bg-slate-200 rounded-md flex items-center justify-center text-3xl text-indigo-600 mb-3">
                                            {{ $post->category->icon }}
                                        </div>
                                    @endif

                                    <h3 class="text-sm font-semibold text-slate-900 line-clamp-2">{{ $post->title }}</h3>

                                    <div class="flex items-center justify-between text-xs text-slate-500 mt-2">
                                        <span>{{ ucfirst($post->status) }}</span>
                                        <span>{{ number_format($post->views_count) }} vistas</span>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    @else
                        <p class="text-slate-500 text-sm">Aún no has publicado artículos.</p>
                    @endif
                </div>
                @endif

                <!-- COMENTARIOS -->
                <div class="bg-white border border-slate-200 rounded-xl p-6 shadow-sm hover:shadow-md transition">
                    <h2 class="text-lg font-semibold text-slate-900 mb-4">Mis últimos comentarios</h2>

                    @if($user->comments->count() > 0)
                        <div class="space-y-4">
                            @foreach($user->comments()->latest()->take(3)->get() as $comment)
                                <div class="p-4 rounded-xl border hover:bg-gray-50 transition border-gray-100 hover:border-techgap-200">
                                    <a href="{{ route('posts.show', $comment->post->slug) }}"
                                       class="text-sm text-[#164E63]">
                                        En: {{ $comment->post->title }}
                                    </a>
                                    <p class="text-xs text-slate-500">{{ $comment->created_at->diffForHumans() }}</p>
                                    <p class="text-sm text-slate-700 mt-1 line-clamp-2">{{ $comment->content }}</p>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p class="text-slate-500 text-sm">Aún no has comentado en ningún artículo.</p>
                    @endif
                </div>

            </div>

        </div>

    </div>
</div>
@endsection
