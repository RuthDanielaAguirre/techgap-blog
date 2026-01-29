@extends('layouts.app')

@section('title', '#' . $tag->name . ' - TechGap Blog')

@section('content')
<x-ui.section 
    :title="'🏷️ #' . $tag->name" 
    :subtitle="'Posts etiquetados con ' . $tag->name"
    :link="route('posts.index')"
    linkText="Ver todos los posts">
    
    <div class="mb-8">
        <div class="flex items-center space-x-3 mb-4">
            <x-blog.tag-badge :tag="$tag" size="lg" />
            <div>
                <h1 class="text-2xl font-bold text-gray-900">#{{ $tag->name }}</h1>
                <p class="text-gray-600">{{ $posts->total() }} {{ Str::plural('post', $posts->total()) }}</p>
            </div>
        </div>
        
        @if($tag->description)
            <p class="text-gray-700 max-w-3xl">{{ $tag->description }}</p>
        @endif
    </div>
    
    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($posts as $post)
            <x-blog.post-card :post="$post" variant="featured" />
        @empty
            <div class="col-span-full text-center py-12">
                <div class="text-6xl mb-4">🏷️</div>
                <h3 class="text-xl font-semibold text-gray-900 mb-2">No hay posts con este tag</h3>
                <p class="text-gray-600 mb-6">Aún no hay contenido etiquetado con "{{ $tag->name }}".</p>
                <a href="{{ route('posts.index') }}" class="text-techgap-600 hover:text-techgap-700 font-semibold">
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
</x-ui.section>
@endsection