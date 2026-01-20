@props(['post'])

<article class="bg-white border border-gray-200 rounded-lg p-6 hover:shadow-md transition">
  <div class="flex items-start justify-between mb-3">
    <div>
      <span class="inline-block px-2 py-1 text-xs bg-blue-100 text-blue-700 rounded mb-2">
        {{ $post->category->name ?? 'General' }}
      </span>

      <span class="inline-block px-2 py-1 text-xs bg-green-100 text-green-700 rounded mb-2 ml-2">
        {{ $post->published_at ? 'Publicado' : 'Borrador' }}
      </span>
    </div>
  </div>

  <h2 class="text-xl font-semibold mb-3">
    <a href="{{ route('blog.show', $post->slug) }}" class="hover:text-blue-600 transition">
      {{ $post->title }}
    </a>
  </h2>

  <p class="text-gray-600 text-sm mb-4">
    {{ $post->excerpt ?? Str::limit(strip_tags($post->content), 150) }}
  </p>

  <div class="flex items-center justify-between text-xs text-gray-500">
    <div>
      <span>Categoría: {{ $post->category->name ?? 'General' }}</span>
    </div>
    <div>
      <span>Autor: {{ $post->user->name ?? '—' }}</span>
    </div>
  </div>

  <div class="flex items-center justify-between text-xs text-gray-500 mt-2">
    <div>
      <span>{{ $post->published_at?->format('d M Y') ?? 'Borrador' }}</span>
    </div>
    <div>
      <span>{{ $post->published_at?->diffForHumans() ?? '' }}</span>
    </div>
  </div>
</article>
