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
                        <i class="ph ph-github-logo ph-bold text-white text-xl"></i>
                        <span class="text-gray-300 font-medium">RuthDanielaAguirre</span>
                    </a>
                    <a href="https://github.com/rovaalemi" target="_blank" class="flex items-center gap-3 bg-gray-800/50 hover:bg-gray-800/70 px-3 py-2 rounded-lg transition">
                        <i class="ph ph-github-logo ph-bold text-white text-xl"></i>
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