@extends('layouts.app')

@section('title', $post->title)

@section('content')
<div class="max-w-4xl mx-auto px-6 py-12">
    <!-- Breadcrumb -->
    <div class="mb-6 text-sm text-gray-600">
        <a href="/" class="hover:text-gray-900">← Back to Content Index</a>
    </div>

    <!-- Post Header -->
    <article class="bg-white border border-gray-200 rounded-lg p-8 mb-6">
        <div class="flex items-start justify-between mb-6">
            <h1 class="text-3xl font-bold">{{ $post->title }}</h1>
            <button class="text-gray-400 hover:text-gray-600">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z" />
                </svg>
            </button>
        </div>

        <p class="text-gray-600 text-lg mb-6">
            {{ $post->excerpt ?? Str::limit($post->content, 200) }}
        </p>

        <!-- Meta Info Grid -->
        <div class="grid grid-cols-4 gap-4 py-6 border-y border-gray-200 mb-6">
            <div>
                <div class="text-xs text-gray-500 mb-1">Author</div>
                <div class="font-semibold">{{ $post->user->name }}</div>
            </div>
            <div>
                <div class="text-xs text-gray-500 mb-1">Published</div>
                <div class="font-semibold">{{ $post->published_at?->format('Y-m-d H:i') ?? 'Draft' }}</div>
            </div>
            <div>
                <div class="text-xs text-gray-500 mb-1">Views</div>
                <div class="font-semibold">{{ rand(100, 1000) }}</div>
            </div>
            <div>
                <div class="text-xs text-gray-500 mb-1">Status</div>
                <div><span class="px-2 py-1 text-xs bg-green-100 text-green-700 rounded">Published</span></div>
            </div>
        </div>

        <!-- Tabs -->
        <div class="flex gap-6 mb-6 border-b border-gray-200">
            <button class="px-4 py-2 border-b-2 border-gray-900 font-semibold">Overview</button>
            <button class="px-4 py-2 text-gray-600 hover:text-gray-900">WIP</button>
            <button class="px-4 py-2 text-gray-600 hover:text-gray-900">Revisions</button>
            <button class="px-4 py-2 text-gray-600 hover:text-gray-900">Architecture</button>
        </div>

        <!-- Content Sections -->
        <div class="space-y-8">
            <section>
                <h2 class="text-xl font-bold mb-4">Overview</h2>
                <div class="prose max-w-none text-gray-700">
                    {!! nl2br(e($post->content)) !!}
                </div>
            </section>

            <section>
                <h2 class="text-xl font-bold mb-4">System Architecture</h2>
                <p class="text-gray-700 mb-4">
                    The content management system follows Laravel MVC principles. Models define database schemas and relationships, controllers handle request/response patterns and data processing, and views render the structured content securely.
                </p>
            </section>

            <section>
                <h2 class="text-xl font-bold mb-4">Related Content</h2>
                <div class="grid grid-cols-3 gap-4">
                    @foreach($post->category->posts()->where('id', '!=', $post->id)->limit(3)->get() as $related)
                    <div class="border border-gray-200 rounded p-4">
                        <h3 class="font-semibold mb-2">{{ $related->title }}</h3>
                        <a href="/post/{{ $related->slug }}" class="text-sm text-blue-600 hover:text-blue-800">
                            View →
                        </a>
                    </div>
                    @endforeach
                </div>
            </section>
        </div>
    </article>

    <!-- Comments Section -->
    <div class="bg-white border border-gray-200 rounded-lg p-8">
        <h3 class="text-xl font-bold mb-6">Comments ({{ $post->comments->count() }})</h3>
        
        @forelse($post->comments as $comment)
        <div class="mb-6 pb-6 border-b border-gray-200 last:border-0">
            <div class="flex items-start gap-4">
                <div class="w-10 h-10 bg-gray-200 rounded-full flex items-center justify-center">
                    <span class="text-sm font-semibold">{{ substr($comment->user->name, 0, 1) }}</span>
                </div>
                <div class="flex-1">
                    <div class="flex items-center gap-2 mb-2">
                        <span class="font-semibold">{{ $comment->user->name }}</span>
                        <span class="text-xs text-gray-500">{{ $comment->created_at->diffForHumans() }}</span>
                    </div>
                    <p class="text-gray-700">{{ $comment->content }}</p>
                </div>
            </div>
        </div>
        @empty
        <p class="text-gray-500 text-center py-8">No comments yet.</p>
        @endforelse
    </div>
</div>
@endsection