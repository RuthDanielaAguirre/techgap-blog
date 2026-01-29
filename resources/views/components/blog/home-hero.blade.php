@props(['title' => 'Aprende Tecnología de forma práctica', 'subtitle' => 'Artículos, tutoriales y guías sobre desarrollo web, IA, DevOps y las últimas tendencias tecnológicas'])

<div class="bg-gradient-to-br from-techgap-600 via-techgap-700 to-blue-900 text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
        <div class="text-center max-w-3xl mx-auto">
            <h1 class="text-5xl md:text-6xl font-extrabold mb-6 leading-tight">
                Aprende <span class="text-techgap-300">Tecnología</span><br>
                de forma práctica
            </h1>
            <p class="text-xl md:text-2xl text-techgap-100 mb-8">
                {{ $subtitle }}
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('posts.index') }}" class="bg-white text-techgap-700 px-8 py-4 rounded-lg font-semibold
                        hover:bg-gray-100 transition shadow-lg hover:shadow-xl border border-white/40">
                    Ver Artículos
                </a>
                <a href="{{ route('register') }}" class="bg-techgap-800 text-white px-8 py-4 rounded-lg font-semibold
                        hover:bg-techgap-900 transition shadow-lg hover:shadow-xl border border-techgap-600">
                    Únete Gratis
                </a>
            </div>
        </div>
    </div>
</div>