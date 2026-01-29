@props(['post', 'variant' => 'default'])

@php
$variants = [
    'default' => 'bg-white border border-gray-200 rounded-lg p-6 hover:shadow-md transition',
    'compact' => 'bg-white border border-gray-200 rounded-lg p-4 hover:shadow-md transition',
    'featured' => 'bg-white border border-gray-200 rounded-xl p-6 hover:shadow-lg transition-all duration-300 hover:border-techgap-200'
];
@endphp

<article class="{{ $variants[$variant] }}">
  <div class="flex items-start justify-between mb-3">
    <div class="flex flex-wrap gap-2">
      <x-blog.category-badge :category="$post->category" />
      
      @if($post->published_at)
        <x-ui.badge tone="green">Publicado</x-ui.badge>
      @else
        <x-ui.badge tone="yellow">Borrador</x-ui.badge>
      @endif
    </div>
  </div>

  <h2 class="{{ $variant === 'compact' ? 'text-lg' : 'text-xl' }} font-semibold mb-3">
    <a href="{{ route('posts.show', $post->slug) }}" class="hover:text-techgap-600 transition">
      {{ $post->title }}
    </a>
  </h2>

  <p class="text-gray-600 text-sm mb-4 line-clamp-3">
    {{ $post->excerpt ?? Str::limit(strip_tags($post->content), 150) }}
  </p>

  <!-- Tags -->
  @if($post->tags && $post->tags->isNotEmpty())
    <div class="flex flex-wrap gap-1 mb-4">
      @foreach($post->tags->take(3) as $tag)
        <x-blog.tag-badge :tag="$tag" size="xs" />
      @endforeach
    </div>
  @endif

  <div class="flex items-center justify-between pt-4 border-t border-gray-100">
    <div class="flex items-center space-x-2">
      <x-blog.user-avatar :user="$post->user" size="sm" />
      <div>
        <p class="text-sm font-medium text-gray-900">{{ $post->user->name }}</p>
        <p class="text-xs text-gray-500">{{ $post->published_at?->diffForHumans() ?? 'Borrador' }}</p>
      </div>
    </div>
    
    <div class="flex items-center space-x-4 text-xs text-gray-500">
      @if(isset($post->views_count))
        <span class="flex items-center">
          <x-ui.icon name="eye" class="w-3 h-3 mr-1" />
          {{ number_format($post->views_count) }}
        </span>
      @endif
      
      @if(isset($post->reading_time))
        <span>{{ $post->reading_time }}</span>
      @endif
    </div>
  </div>
</article>
