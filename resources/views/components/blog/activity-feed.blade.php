@props(['activities' => []])

<div class="bg-gray-50 bg-techgap-50 rounded-xl p-4 max-h-64 overflow-y-auto space-y-4 shadow-inner">
    <ul class="space-y-4">
        @forelse($activities as $activity)
            <li class="flex space-x-3">
                @if($activity['type'] === 'user_with_image')
                    <img src="{{ $activity['avatar'] }}" 
                         alt="{{ $activity['name'] }}" 
                         class="w-10 h-10 rounded-full object-cover border-2 border-techgap-100">
                    <div class="flex-1 space-y-1 text-sm">
                        <div class="flex items-center justify-between">
                            <a href="{{ $activity['url'] ?? '#' }}" class="font-semibold text-techgap-700 hover:text-techgap-900">{{ $activity['name'] }}</a>
                            <span class="text-xs text-gray-400">{{ $activity['time'] }}</span>
                        </div>
                        <p class="text-gray-700">{{ $activity['content'] }}</p>
                    </div>
                @else
                    <div class="flex-shrink-0 flex items-center justify-center w-10 h-10 bg-techgap-100 rounded-full">
                        <x-ui.icon name="user" class="w-5 h-5 text-techgap-500" />
                    </div>
                    <div class="flex-1 space-y-1 text-sm text-gray-700">
                        <span>
                            <a href="{{ $activity['user1_url'] ?? '#' }}" class="font-semibold text-techgap-700 hover:text-techgap-900">{{ $activity['user1'] }}</a>
                            {{ $activity['action'] }}
                            <a href="{{ $activity['user2_url'] ?? '#' }}" class="font-semibold text-techgap-700 hover:text-techgap-900">{{ $activity['user2'] }}</a>
                        </span>
                        <span class="text-xs text-gray-400">{{ $activity['time'] }}</span>
                    </div>
                @endif
            </li>
        @empty
            <!-- Datos de ejemplo por defecto -->
            <li class="flex space-x-3">
                <img src="https://images.unsplash.com/photo-1520785643438-5bf77931f493?ixlib=rb-=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=8&w=256&h=256&q=80" 
                     alt="Eduardo Benz" class="w-10 h-10 rounded-full object-cover border-2 border-techgap-100">
                <div class="flex-1 space-y-1 text-sm">
                    <div class="flex items-center justify-between">
                        <a href="#" class="font-semibold text-techgap-700 hover:text-techgap-900">Eduardo Benz</a>
                        <span class="text-xs text-gray-400">6d ago</span>
                    </div>
                    <p class="text-gray-700">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Tincidunt nunc ipsum tempor.
                    </p>
                </div>
            </li>
            
            <li class="flex space-x-3">
                <div class="flex-shrink-0 flex items-center justify-center w-10 h-10 bg-techgap-100 rounded-full">
                    <x-ui.icon name="user" class="w-5 h-5 text-techgap-500" />
                </div>
                <div class="flex-1 space-y-1 text-sm text-gray-700">
                    <span>
                        <a href="#" class="font-semibold text-techgap-700 hover:text-techgap-900">Hilary Mahy</a> assigned 
                        <a href="#" class="font-semibold text-techgap-700 hover:text-techgap-900">Kristin Watson</a>
                    </span>
                    <span class="text-xs text-gray-400">2d ago</span>
                </div>
            </li>
        @endforelse
    </ul>
</div>