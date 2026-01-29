@props(['popularPosts'])

<div class="bg-white rounded-2xl shadow-lg p-6 border border-gray-100">
    <h3 class="text-xl font-bold text-gray-900 mb-4">🔥 Más Populares</h3>
    <div class="space-y-4">
        @foreach($popularPosts as $post)
            <x-blog.popular-post-item :post="$post" />
        @endforeach
    </div>
</div>