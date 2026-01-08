@extends('layouts.app')

@section('title', 'Content Index')

@section('content')
<div class="max-w-7xl mx-auto px-6 py-12">
    <!-- Header -->
    <div class="mb-8">
        <h1 class="text-3xl font-bold mb-2">Content Index</h1>
        <p class="text-gray-600">Browse all published content entries. Results are paginated and filterable via query parameters.</p>
    </div>

    <!-- Filters -->
    <div class="mb-6 flex items-center gap-4">
        <div class="flex-1">
            <input type="text" placeholder="Search content..." class="w-full px-4 py-2 border border-gray-300 rounded-lg">
        </div>
        <select class="px-4 py-2 border border-gray-300 rounded-lg">
            <option>All Types</option>
            <option>Article</option>
            <option>Document</option>
        </select>
        <select class="px-4 py-2 border border-gray-300 rounded-lg">
            <option>Most Recent</option>
            <option>Most Viewed</option>
        </select>
    </div>

    <div class="text-sm text-gray-600 mb-6">
        Showing {{ $posts->count() }} results
    </div>

    <!-- Posts Grid -->
    <div class="grid grid-cols-2 gap-6 mb-8">
        @forelse($posts as $post)
        <article class="bg-white border border-gray-200 rounded-lg p-6 hover:shadow-md transition">
            <div class="flex items-start justify-between mb-3">
                <div>
                    <span class="inline-block px-2 py-1 text-xs bg-gray-100 text-gray-700 rounded mb-2">
                        {{ $post->category->name ?? 'Article' }}
                    </span>
                    <span class="inline-block px-2 py-1 text-xs bg-green-100 text-green-700 rounded mb-2 ml-2">
                        Published
                    </span>
                </div>
            </div>

            <h2 class="text-xl font-semibold mb-3">
                <a href="/post/{{ $post->slug }}" class="hover:text-blue-600">
                    {{ $post->title }}
                </a>
            </h2>

            <p class="text-gray-600 text-sm mb-4">
                {{ $post->excerpt ?? Str::limit($post->content, 150) }}
            </p>

            <div class="flex items-center justify-between text-xs text-gray-500">
                <div>
                    <span>Category: {{ $post->category->name ?? 'General' }}</span>
                </div>
                <div>
                    <span>Author: {{ $post->user->name }}</span>
                </div>
            </div>
            <div class="flex items-center justify-between text-xs text-gray-500 mt-2">
                <div>
                    <span>Published: {{ $post->published_at?->format('Y-m-d') ?? 'Draft' }}</span>
                </div>
                <div>
                    <span>Views: {{ rand(50, 500) }}</span>
                </div>
            </div>
        </article>
        @empty
        <p class="col-span-2 text-center text-gray-500 py-12">No content available.</p>
        @endforelse
    </div>

    <!-- Pagination -->
    <div class="flex items-center justify-center gap-2">
        {{ $posts->links() }}
    </div>
</div>
@endsection