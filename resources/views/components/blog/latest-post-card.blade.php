@props(['post'])

<article class="bg-white rounded-xl shadow-md hover:shadow-xl transition overflow-hidden border border-gray-100">
    <div class="p-6">
        <!-- Category -->
        <div class="mb-3">
            <x-blog.category-badge :category="$post->category" size="sm" />
        </div>

        <!-- Title -->
        <h3 class="text-lg font-bold text-gray-900 mb-2 hover:text-techgap-600 transition line-clamp-2">
            <a href="{{ route('posts.show', $post->slug) }}">
                {{ $post->title }}
            </a>
        </h3>

        <!-- Excerpt -->
        <p class="text-gray-600 text-sm mb-4 line-clamp-2">
            {{ $post->excerpt }}
        </p>

        <!-- Meta -->
        <div class="flex items-center justify-between text-xs text-gray-500">
            <span class="flex items-center">
                <x-blog.user-avatar :user="$post->user" size="xs" />
                <span class="ml-2">{{ $post->user->name }}</span>
            </span>
            <span>{{ $post->reading_time }}</span>
        </div>
    </div>
</article>