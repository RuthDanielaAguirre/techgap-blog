@props(['tag', 'size' => 'sm'])

@php
$sizeClasses = [
    'xs' => 'px-2 py-1 text-xs',
    'sm' => 'px-2 py-1 text-xs',
    'md' => 'px-3 py-1 text-sm',
    'lg' => 'px-3 py-2 text-base'
];
@endphp

<span class="{{ $sizeClasses[$size] }} font-medium rounded-md tag-bg-text"
      style="--dynamic-color: {{ $tag->color }}">
    #{{ $tag->name }}
</span>