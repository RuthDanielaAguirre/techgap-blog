@props(['post'])

<article class="group bg-white rounded-2xl shadow-lg hover:shadow-2xl transition overflow-hidden border border-gray-100">
    <!-- Category Badge -->
    <div class="relative h-48 bg-gradient-to-br from-techgap-500 to-techgap-700 flex items-center justify-center">
        <div class="absolute top-4 left-4">
            <x-blog.category-badge :category="$post->category" size="sm" />
        </div>
        <div class="text-white text-6xl">
            {{ $post->category->icon }}
        </div>
    </div>

    <div class="p-6">
        <!-- Title -->
        <h3 class="text-xl font-bold text-gray-900 mb-3 group-hover:text-techgap-600 transition line-clamp-2">
            <a href="{{ route('posts.show', $post->slug) }}">
                {{ $post->title }}
            </a>
        </h3>

        <!-- Excerpt -->
        <p class="text-gray-600 mb-4 line-clamp-3">
            {{ $post->excerpt }}
        </p>

        <!-- Tags -->
        @if($post->tags->isNotEmpty())
            <div class="flex flex-wrap gap-2 mb-4">
                @foreach($post->tags->take(3) as $tag)
                    <x-blog.tag-badge :tag="$tag" size="sm" />
                @endforeach
            </div>
        @endif

        <!-- Meta -->
        <div class="flex items-center justify-between pt-4 border-t border-gray-100">
            <div class="flex items-center space-x-2">
                <x-blog.user-avatar :user="$post->user" size="sm" />
                <div>
                    <p class="text-sm font-medium text-gray-900">{{ $post->user->name }}</p>
                    <p class="text-xs text-gray-500">{{ $post->published_at->diffForHumans() }}</p>
                </div>
            </div>
            <div class="flex items-center space-x-3 text-sm text-gray-500">
                <span class="flex items-center">
                    <x-ui.icon name="eye" class="w-4 h-4 mr-1" />
                    {{ number_format($post->views_count) }}
                </span>
            </div>
        </div>
    </div>
</article>