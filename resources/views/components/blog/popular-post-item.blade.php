@props(['post'])

<a href="{{ route('posts.show', $post->slug) }}" class="block group">
    <div class="flex items-start space-x-3">
        <div class="w-12 h-12 rounded-lg flex-shrink-0 flex items-center justify-center text-2xl category-bg"
             style="--dynamic-color: {{ $post->category->color }}">
            {{ $post->category->icon }}
        </div>
        <div class="flex-1 min-w-0">
            <h4 class="text-sm font-semibold text-gray-900 group-hover:text-techgap-600 transition line-clamp-2">
                {{ $post->title }}
            </h4>
            <div class="flex items-center mt-1 text-xs text-gray-500">
                <x-ui.icon name="eye" class="w-3 h-3 mr-1" />
                {{ number_format($post->views_count) }}
            </div>
        </div>
    </div>
</a>