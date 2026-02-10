@extends('layouts.app', ['lightHeader' => true])

@section('content')
<style>
    /* Scrollbar fino y elegante */
    .thin-scroll::-webkit-scrollbar {
        width: 6px;
    }
    .thin-scroll::-webkit-scrollbar-track {
        background: #e5e7eb;
        border-radius: 10px;
    }
    .thin-scroll::-webkit-scrollbar-thumb {
        background: #cbd5e1;
        border-radius: 10px;
    }
    .thin-scroll::-webkit-scrollbar-thumb:hover {
        background: #94a3b8;
    }
</style>

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

<div class="bg-gray-50 min-h-screen">

    <!-- BREADCRUMB (fuera de las columnas) -->
    <div class="bg-white border-b border-gray-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
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
                <span class="text-gray-900 font-medium truncate">{{ Str::limit($post->title, 90) }}</span>
            </nav>
        </div>
    </div>

    <!-- MAIN WRAPPER -->
    <div class="max-w-7xl mx-auto px-4 lg:px-8 py-4 grid grid-cols-1 lg:grid-cols-3 gap-6">

        <!-- LEFT COLUMN — POST CONTENT (sin scroll) -->
        <div class="lg:col-span-2 pr-2">

            <!-- ARTICLE CARD -->
            <article class="bg-white rounded-xl shadow-sm border border-gray-200/60 overflow-hidden">

                <!-- Category Badge -->
                <div class="px-5 pt-5">
                    <a href="{{ route('posts.category', $post->category->slug) }}" 
                       class="inline-flex items-center px-3 py-1.5 rounded-full text-xs font-semibold"
                       style="background-color: {{ $post->category->color }}20; color: {{ $post->category->color }};">
                        <span class="text-lg mr-1.5">{{ $post->category->icon }}</span>
                        {{ $post->category->name }}
                    </a>
                </div>

                <!-- Title -->
                <div class="px-5 pt-4">
                    <h1 class="text-[26px] font-bold text-gray-900 leading-snug mb-3">
                        {{ $post->title }}
                    </h1>

                    <!-- Meta -->
                    <div class="flex flex-wrap items-center justify-between pb-4 border-b border-gray-200/60 text-[12px] text-gray-600">

                        <!-- LEFT SIDE: Author + Date + Reading + Views -->
                        <div class="flex flex-wrap items-center gap-4">

                            <!-- Author -->
                            <div class="flex items-center space-x-2">
                                @if($post->user->avatar) 
                                    <img src="{{ $post->user->avatar }}" 
                                        class="w-9 h-9 rounded-full object-cover shadow-sm border border-gray-200" /> 
                                @else 
                                    <div class="w-9 h-9 rounded-full flex items-center justify-center font-semibold text-gray-700 shadow-sm bg-gray-200 hover:bg-gray-300 transition-colors duration-200">
                                        {{ $initials }} 
                                    </div> 
                                @endif

                                <div>
                                    <p class="font-medium text-gray-900 text-[13px]">{{ $post->user->name }}</p>
                                    <p class="text-[11px] text-gray-500">{{ $post->user->role->display_name }}</p>
                                </div>
                            </div>

                            <!-- Date -->
                            <span class="flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                                {{ $post->published_at->format('d M Y') }}
                            </span>

                            <!-- Reading time -->
                            <span class="flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                {{ $post->reading_time }}
                            </span>

                            <!-- Views -->
                            <span class="flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                </svg>
                                {{ number_format($post->views_count) }} vistas
                            </span>
                        </div>

                        <!-- RIGHT SIDE: ACTION BUTTONS -->
                        <div class="flex items-center space-x-3">
                            <!-- LIKE -->
                            <button class="flex items-center space-x-1 px-3 py-1.5 rounded-lg border border-gray-300 bg-white 
                                        hover:bg-red-50 hover:border-red-300 transition">
                                <svg class="w-5 h-5 text-gray-600 group-hover:text-red-500 transition" 
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                                </svg>
                                <span class="text-xs font-medium text-gray-700">123</span>
                            </button>

                            <!-- SAVE -->
                            <button class="p-2 rounded-lg border border-gray-300 bg-white 
                                        hover:bg-yellow-50 hover:border-yellow-300 transition">
                                <svg class="w-5 h-5 text-gray-600 group-hover:text-yellow-600 transition" 
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z"/>
                                </svg>
                            </button>

                            <!-- SHARE -->
                            <button class="p-2 rounded-lg border border-gray-300 bg-white 
                                        hover:bg-green-50 hover:border-green-300 transition">
                                <svg class="w-5 h-5 text-gray-600 group-hover:text-green-600 transition" fill="none" stroke="currentColor"  viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z"/>
                                </svg>
                            </button>
                        </div>
                    </div>

                    <!-- Tags -->
                    <div class="flex flex-wrap gap-2 py-4">
                        @foreach($post->tags as $tag)
                            <a href="{{ route('posts.tag', $tag->slug) }}" 
                               class="px-2.5 py-1 text-[11px] font-medium rounded-lg"
                               style="background-color: {{ $tag->color }}20; color: {{ $tag->color }};">
                                #{{ $tag->name }}
                            </a>
                        @endforeach
                    </div>
                </div>

                <!-- Content -->
                <div class="px-5 pb-6">
                    <div class="prose prose-techgap max-w-none text-[15px] leading-relaxed">
                        {!! \Illuminate\Support\Str::markdown($post->content) !!}
                    </div>
                </div>

            </article>
        </div>

        <!-- RIGHT COLUMN — COMMENTS (mejorada) -->
        <div class="lg:col-span-1 pl-2"
            x-data="{
                editing: false,
                editId: null,
                content: '',
                startEdit(id, text) {
                    this.editing = true;
                    this.editId = id;
                    this.content = text;
                },
                cancelEdit() {
                    this.editing = false;
                    this.editId = null;
                    this.content = '';
                }
            }"
        >
            <div class="bg-white rounded-xl shadow-sm border border-gray-200/60 flex flex-col h-full">

                <!-- Header -->
                <div class="px-5 py-4 border-b border-gray-200/50">
                    <h2 class="text-[17px] font-semibold text-gray-900">
                        Comentarios ({{ $post->comments_count }})
                    </h2>
                </div>

                <!-- LISTA DE COMENTARIOS -->
                <div class="flex-1 overflow-y-auto thin-scroll divide-y divide-gray-200/50 px-5">

                    @forelse($post->comments as $comment)
                        <div class="py-4">
                            <div class="flex items-start space-x-3">

                                @if($comment->user->avatar) 
                                    <img src="{{ $comment->user->avatar }}" 
                                        class="w-8 h-8 rounded-full object-cover shadow-sm border border-gray-200" /> 
                                @else 
                                    <div class="w-8 h-8 rounded-full flex items-center justify-center font-semibold text-gray-700 shadow-sm bg-gray-200 hover:bg-gray-300 transition-colors duration-200">
                                        {{ substr($comment->user->name, 0, 1) }}
                                    </div> 
                                @endif

                                <div class="flex-1">
                                    <div class="flex justify-between items-start mb-1">
                                        <div>
                                            <span class="text-sm font-medium text-gray-900">
                                                {{ $comment->user->name }}
                                            </span>
                                            <span class="text-xs text-gray-500 ml-2">
                                                {{ $comment->created_at->diffForHumans() }}
                                            </span>
                                            @if($comment->created_at != $comment->updated_at)
                                                <span class="text-xs text-gray-400 ml-1">(editado)</span>
                                            @endif
                                        </div>

                                        <div class="flex items-start space-x-2">
                                            {{-- EDITAR --}}
                                            @can('update', $comment)
                                                <button 
                                                    x-on:click="startEdit({{ $comment->id }}, @js($comment->content))"
                                                    class="p-1.5 rounded-md transition"
                                                    title="Editar"
                                                >
                                                    <svg class="w-4 h-4 text-gray-500 hover:text-blue-600 transition" 
                                                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                            d="M15.232 5.232l3.536 3.536M4 20h4l10-10-4-4L4 16v4z" />
                                                    </svg>
                                                </button>
                                            @endcan

                                            {{-- ELIMINAR --}}
                                            @can('delete', $comment)
                                                <form method="POST" action="{{ route('comments.destroy', $comment) }}"
                                                    onsubmit="return confirm('¿Eliminar este comentario?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="p-1.5 rounded-md transition"
                                                        title="Eliminar">
                                                        <svg class="w-4 h-4 text-gray-500 hover:text-red-600 transition"
                                                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                        </svg>
                                                    </button>
                                                </form>
                                            @endcan
                                        </div>
                                    </div>

                                    <p class="text-[14px] text-gray-700 leading-relaxed">
                                        {{ $comment->content }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="py-10 text-center text-gray-500 text-sm">
                            Aún no hay comentarios
                        </div>
                    @endforelse
                </div>

                <!-- FORMULARIO ABAJO -->
                @auth
                    <div class="px-5 py-4 border-t border-gray-200/50 bg-gray-50">

                        <form 
                            method="POST" 
                            :action="editing 
                                ? '/comments/' + editId 
                                : '{{ route('comments.store', $post) }}'"
                            class="space-y-3"
                        >
                            @csrf

                            <template x-if="editing">
                                <input type="hidden" name="_method" value="PUT">
                            </template>

                            <textarea 
                                name="content"
                                rows="3"
                                x-model="content"
                                class="w-full text-sm px-4 py-3 rounded-xl border border-gray-300 bg-gray-50 
                                    shadow-inner transition-all
                                    focus:outline-none focus:ring-0
                                    focus:border-techgap-500 focus:shadow-[0_0_8px_2px_rgba(0,150,255,0.25)]
                                    placeholder-gray-400"
                                placeholder="Comparte tu comentario con estilo futurista..."
                                required
                            ></textarea>

                            <div class="flex justify-between">
                                <template x-if="editing">
                                    <button 
                                        type="button"
                                        x-on:click="cancelEdit()"
                                        class="px-4 py-2 text-sm rounded-lg text-gray-600 bg-gray-300 hover:text-gray-800 transition"
                                    >
                                        Cancelar
                                    </button>
                                </template>

                                <button class="px-5 py-2.5 bg-gray-800 text-white text-sm rounded-lg 
                                            hover:bg-gray-900 transition shadow-md">
                                    <span x-text="editing ? 'Actualizar' : 'Publicar'"></span>
                                </button>
                            </div>
                        </form>

                    </div>
                @else
                    <div class="px-5 py-4 bg-blue-50 border-t border-blue-200/50 text-center text-sm">
                        <a href="{{ route('login') }}" class="font-semibold text-blue-700 hover:underline">Inicia sesión</a>
                        para comentar
                    </div>
                @endauth
            </div>
        </div>
    </div>

    <!-- RELATED POSTS — MINIMAL TECH CARDS -->
    @if($relatedPosts->isNotEmpty())
        <div class="max-w-7xl mx-auto px-4 lg:px-8 pb-16 mt-10">
            <h3 class="text-[18px] font-semibold text-gray-900 mb-4">Artículos Relacionados</h3>

            <div class="grid md:grid-cols-3 gap-5">
                @foreach($relatedPosts as $related)
                    <a href="{{ route('posts.show', $related->slug) }}"
                    class="group bg-white border border-gray-200/70 rounded-xl p-5 shadow-sm hover:shadow-md hover:border-techgap-400 transition">

                        <div class="flex items-center text-sm font-medium mb-2"
                            style="color: {{ $related->category->color }}">
                            <span class="mr-1 text-base">{{ $related->category->icon }}</span>
                            {{ $related->category->name }}
                        </div>

                        <p class="text-md font-semibold text-gray-900 line-clamp-2 group-hover:text-techgap-600 transition">
                            {{ $related->title }}
                        </p>

                        <p class="text-[12px] text-gray-500 mt-2">
                            {{ $related->reading_time }} — {{ $related->user->name }}
                        </p>
                    </a>
                @endforeach
            </div>
        </div>
    @endif
</div>
@endsection
