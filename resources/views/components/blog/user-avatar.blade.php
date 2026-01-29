@props(['user', 'size' => 'md'])

@php
$sizeClasses = [
    'xs' => 'w-6 h-6 text-xs',
    'sm' => 'w-8 h-8 text-sm',
    'md' => 'w-10 h-10 text-sm',
    'lg' => 'w-12 h-12 text-base',
    'xl' => 'w-16 h-16 text-lg'
];
@endphp

@if($user->avatar)
    <img src="{{ $user->avatar }}" 
         alt="{{ $user->name }}" 
         class="{{ $sizeClasses[$size] }} rounded-full object-cover border-2 border-techgap-100">
@else
    <div class="{{ $sizeClasses[$size] }} rounded-full bg-gradient-to-br from-techgap-400 to-techgap-600 flex items-center justify-center text-white font-semibold">
        {{ substr($user->name, 0, 1) }}
    </div>
@endif