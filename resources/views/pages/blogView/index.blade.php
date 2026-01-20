@extends('layouts.app')

@section('title', 'TechGap Blog - IA & Programación')

@section('content')
<div class="max-w-7xl mx-auto px-6 py-12">
    <x-blog.hero />

    <x-blog.filters :categories="$categories" :posts="$posts" />

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
        @forelse($posts as $post)
            <x-blog.post-card :post="$post" />
        @empty
            <x-blog.empty />
        @endforelse
    </div>

    <div class="flex items-center justify-center gap-2">
        {{ $posts->links() }}
    </div>
</div>
@endsection
