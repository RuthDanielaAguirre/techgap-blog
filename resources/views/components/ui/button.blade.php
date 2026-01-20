@props([
  'variant' => 'primary',
  'type' => 'button',
  'as' => 'button',
])

@php
  $base = 'inline-flex items-center justify-center rounded-xl px-4 py-2 text-sm font-medium transition';
  $variants = [
    'primary' => 'bg-cyan-600 text-white hover:bg-cyan-700',
    'secondary' => 'bg-slate-100 text-slate-700 hover:bg-slate-200',
    'ghost' => 'bg-transparent text-slate-700 hover:bg-slate-100',
  ];
  $classes = $base.' '.($variants[$variant] ?? $variants['primary']);
@endphp

@if($as === 'a')
  <a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
  </a>
@else
  <button type="{{ $type }}" {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
  </button>
@endif
