@props(['name', 'class' => 'text-base', 'variant' => 'regular'])

@php
$variants = [
    'regular' => 'ph',
    'bold' => 'ph ph-bold', 
    'fill' => 'ph ph-fill',
    'duotone' => 'ph ph-duotone'
];

$icons = [
    'eye' => 'ph-eye',
    'arrow-right' => 'ph-arrow-right',
    'user' => 'ph-user',
    'heart' => 'ph-heart',
    'bookmark' => 'ph-bookmark-simple',
    'chat' => 'ph-chat-circle',
    'calendar' => 'ph-calendar',
    'clock' => 'ph-clock',
    'tag' => 'ph-tag',
    'folder' => 'ph-folder',
    'gear' => 'ph-gear',
    'star' => 'ph-star',
    'fire' => 'ph-fire',
    'trending' => 'ph-trend-up',
    'search' => 'ph-magnifying-glass',
    'filter' => 'ph-funnel',
    'share' => 'ph-share',
    'download' => 'ph-download',
    'edit' => 'ph-pencil',
    'delete' => 'ph-trash',
    'plus' => 'ph-plus',
    'minus' => 'ph-minus',
    'check' => 'ph-check',
    'x' => 'ph-x',
    'menu' => 'ph-list',
    'home' => 'ph-house',
    'article' => 'ph-article',
    'envelope' => 'ph-envelope',
    'lock' => 'ph-lock',
    'unlock' => 'ph-lock-open',
    'shield' => 'ph-shield',
    'warning' => 'ph-warning',
    'info' => 'ph-info',
    'bell' => 'ph-bell',
    'settings' => 'ph-gear',
    'image' => 'ph-image',
    'camera' => 'ph-camera',
    'video' => 'ph-video-camera',
    'microphone' => 'ph-microphone',
    'link' => 'ph-link',
    'external-link' => 'ph-arrow-square-out',
    'paperclip' => 'ph-paperclip',
    'code' => 'ph-code',
    'terminal' => 'ph-terminal-window',
    'database' => 'ph-database',
    'server' => 'ph-server',
    'cloud' => 'ph-cloud',
    'wifi' => 'ph-wifi-high',
    'bluetooth' => 'ph-bluetooth',
    'battery' => 'ph-battery-charging',
    'power' => 'ph-power',
    'refresh' => 'ph-arrow-clockwise',
    'sync' => 'ph-arrows-clockwise',
    'upload' => 'ph-upload',
    'folder-open' => 'ph-folder-open',
    'file' => 'ph-file',
    'file-text' => 'ph-file-text',
    'copy' => 'ph-copy',
    'cut' => 'ph-scissors',
    'paste' => 'ph-clipboard',
    'undo' => 'ph-arrow-counter-clockwise',
    'redo' => 'ph-arrow-clockwise'
];

$iconClass = $icons[$name] ?? 'ph-question';
$variantClass = $variants[$variant] ?? $variants['regular'];
@endphp

<i class="{{ $variantClass }} {{ $iconClass }} {{ $class }}"></i>