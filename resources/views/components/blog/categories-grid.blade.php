@props(['categories'])

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 -mt-12 relative z-10">
    <div class="bg-white rounded-2xl shadow-2xl p-6">
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4">
            @foreach($categories as $category)
            <a href="{{ route('posts.category', $category->slug) }}"
                class="group flex flex-col items-center p-4 rounded-xl hover:bg-gray-50 transition">
                <div class="w-14 h-14 rounded-xl flex items-center justify-center text-3xl mb-2 shadow-md group-hover:shadow-lg transition category-bg"
                    style="--dynamic-color: {{ $category->color }}">
                    {{ $category->icon }}
                </div>
                <span class="text-sm font-semibold text-gray-900 text-center">{{ $category->name }}</span>
                <span class="text-xs text-gray-500 mt-1">{{ $category->posts_count }} posts</span>
            </a>
            @endforeach
        </div>
    </div>
</div>