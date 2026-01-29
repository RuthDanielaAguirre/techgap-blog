<!-- Footer -->
<footer class="bg-gray-900 text-gray-300 mt-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            <!-- About -->
            <div class="md:col-span-2">
                <div class="flex items-center space-x-2 mb-4">
                    <div class="w-10 h-10 bg-gradient-to-br from-techgap-500 to-techgap-700 rounded-lg flex items-center justify-center">
                        <span class="text-white font-bold text-xl">TG</span>
                    </div>
                    <span class="text-2xl font-bold text-white">TechGap</span>
                </div>
                <p class="text-gray-400 mb-4">
                    Tu fuente de conocimiento tecnológico. Artículos, tutoriales y las últimas tendencias en desarrollo web, IA, DevOps y más.
                </p>
            </div>
            <!-- Links -->
            <div>
                <h3 class="text-white font-semibold mb-4">Enlaces</h3>
                <div class="grid grid-cols-2 gap-6">
                    <ul class="space-y-2">
                        <li><a href="{{ route('home') }}" class="hover:text-techgap-400 transition">Inicio</a></li>
                        <li><a href="{{ route('posts.index') }}" class="hover:text-techgap-400 transition">Artículos</a></li>
                    </ul>
                    <ul class="space-y-2">
                            <li><a href="{{ route('about') }}" class="hover:text-techgap-400 transition">Sobre Nosotros</a></li>
                        <li><a href="{{ route('contact') }}" class="hover:text-techgap-400 transition">Contacto</a></li>
                    </ul>
                </div>
            </div>

            <div>
                <h3 class="text-white font-semibold mb-4">Síguenos</h3>
                <div class="flex flex-col gap-4">
                    <a href="https://github.com/RuthDanielaAguirre" target="_blank" class="flex items-center gap-3 bg-gray-800/50 hover:bg-gray-800/70 px-3 py-2 rounded-lg transition">
                        <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 0C5.37 0 0 5.373 0 12c0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/>
                        </svg>
                        <span class="text-gray-300 font-medium">RuthDanielaAguirre</span>
                    </a>
                    <a href="https://github.com/rovaalemi" target="_blank" class="flex items-center gap-3 bg-gray-800/50 hover:bg-gray-800/70 px-3 py-2 rounded-lg transition">
                        <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 0C5.37 0 0 5.373 0 12c0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/>
                        </svg>
                        <span class="text-gray-300 font-medium">rovaalemi</span>
                    </a>
                </div>
            </div>
        </div>

        <div class="border-t border-gray-800 mt-8 pt-8 text-center text-gray-400 text-sm">
            <p>&copy; {{ date('Y') }} TechGap. Todos los derechos reservados.</p>
        </div>
    </div>
</footer>