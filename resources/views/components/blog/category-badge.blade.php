@props(['category', 'size' => 'sm'])

@php
$sizeClasses = [
    'xs' => 'px-2 py-1 text-xs',
    'sm' => 'px-3 py-1 text-xs',
    'md' => 'px-3 py-2 text-sm',
    'lg' => 'px-4 py-2 text-base'
];
@endphp

<span class="inline-flex items-center {{ $sizeClasses[$size] }} rounded-full font-semibold category-bg-text"
      style="--dynamic-color: {{ $category->color }}">
    @if($category->icon)
        <span class="mr-1">{{ $category->icon }}</span>
    @endif
    {{ $category->name }}
</span>