@props(['title', 'subtitle' => null, 'link' => null, 'linkText' => 'Ver todos', 'containerClass' => 'max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10', 'bgClass' => ''])

<div class="{{ $bgClass }}">
    <div class="{{ $containerClass }}">
        @if($title)
            <div class="flex items-center justify-between mb-8">
                <div>
                    <h2 class="text-3xl font-bold text-gray-900">{{ $title }}</h2>
                    @if($subtitle)
                        <p class="text-gray-600 mt-2">{{ $subtitle }}</p>
                    @endif
                </div>
                @if($link)
                    <a href="{{ $link }}" class="text-techgap-600 hover:text-techgap-700 font-semibold flex items-center group">
                        {{ $linkText }}
                        <svg class="w-5 h-5 ml-2 group-hover:translate-x-1 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                        </svg>
                    </a>
                @endif
            </div>
        @endif
        
        {{ $slot }}
    </div>
</div>