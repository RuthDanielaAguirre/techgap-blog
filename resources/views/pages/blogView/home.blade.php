@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<x-blog.home-hero />

<!-- Categories Section -->
<x-blog.categories-grid :categories="$categories" />

<!-- Featured Posts -->
@if($featuredPosts->isNotEmpty())
<x-ui.section title="🌟 Posts Destacados">
    <div class="grid md:grid-cols-3 gap-8">
        @foreach($featuredPosts as $post)
            <x-blog.featured-post-card :post="$post" />
        @endforeach
    </div>
</x-ui.section>
@endif

<!-- Latest Posts -->
<x-ui.section 
    title="📚 Últimos Artículos" 
    :link="route('posts.index')"
    linkText="Ver más artículos"
    bgClass="bg-gray-50"
>
    <div class="grid md:grid-cols-3 gap-6">
        @foreach($latestPosts as $post)
            <x-blog.latest-post-card :post="$post" />
        @endforeach
    </div>

    <!-- Pagination -->
    <div class="mt-8">
        {{ $latestPosts->links() }}
    </div>
</x-ui.section>

<!-- CTA and Popular Posts Section -->
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
    <div class="grid lg:grid-cols-3 gap-8">
        <!-- CTA Box -->
        <x-blog.cta-box />

        <!-- Popular Posts -->
        <x-blog.popular-posts-sidebar :popularPosts="$popularPosts" />
    </div>
</div>
@endsection
