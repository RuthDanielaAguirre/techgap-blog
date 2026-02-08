@extends('v2.layouts.app', ['transparentHeader' => true])

@section('content')

{{-- =========================
    HERO ABOUT (CLARO + EDITORIAL)
========================= --}}
<section class="relative py-40 -mt-16">

    {{-- Imagen de fondo oscura suave --}}
    <img 
        src="https://images.unsplash.com/photo-1497366811353-6870744d04b2?q=80&w=1469&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
        class="absolute inset-0 w-full h-full object-cover opacity-40"
    >

    {{-- Degradado oscuro elegante --}}
    <div class="absolute inset-0 bg-linear-to-b from-[#0F172A]/90 via-[#0A1220]/85 to-[#020617]/90"></div>

    <div class="relative max-w-5xl mx-auto px-6 text-center text-white">

        <div class="inline-flex items-center px-4 py-2 bg-white/10 border border-white/20 rounded-md text-sm font-medium mb-6">
            <span class="text-xl mr-2">🌱</span>
            Lenguaje en constante evolución
        </div>

        <h1 class="text-4xl md:text-5xl font-extrabold mb-4">
            Sobre Nosotros
        </h1>

        <p class="text-lg text-gray-300 max-w-3xl mx-auto leading-relaxed">
            Exploramos la fascinante intersección entre tecnología y lenguaje, donde cada código cuenta una historia.
        </p>
    </div>
</section>

{{-- =========================
    MISIÓN
========================= --}}
<section class="py-24" style="background:#FFFFFF">
    <div class="max-w-4xl mx-auto px-6">

        <h2 class="text-3xl md:text-4xl font-bold text-[#020617] mb-10 text-center">
            El lenguaje como organismo vivo
        </h2>

        <div class="space-y-6 text-gray-700 text-lg leading-relaxed">
            <p>
                En <span class="font-bold text-[#1BBF9B]">TechGap</span>, entendemos que el lenguaje no es una estructura rígida, sino un ecosistema dinámico que evoluciona, se adapta y crece. En el mundo de la tecnología, esta evolución es especialmente fascinante y acelerada.
            </p>

            <p>
                Cada día emergen nuevos términos, conceptos que migran entre idiomas, y expresiones que nacen en un laboratorio de Silicon Valley pero terminan siendo parte del vocabulario cotidiano de desarrolladores en Barcelona, Buenos Aires o Mumbai.
            </p>
        </div>

    </div>
</section>

<section style="background:#F8FAFC" class="py-20">
    <div class="max-w-6xl mx-auto px-6 grid lg:grid-cols-2 gap-10">

        {{-- Card 1 --}}
        <div 
            class="backdrop-blur-sm bg-white/80 border rounded-xl p-6 transition-all duration-300 hover:bg-white/90 hover:shadow-md"
            style="border-color:#E5E7EB"
        >
            <div class="flex items-center gap-3 mb-4">
                <div 
                    class="w-12 h-12 rounded-xl flex items-center justify-center"
                    style="background:rgba(27,191,155,0.12); color:#1BBF9B"
                >
                    <svg class="w-6 h-6" fill="none" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M7 4V2a1 1 0 011-1h8a1 1 0 011 1v2m-9 4v10a2 2 0 002 2h6a2 2 0 002-2V8M7 8h10M9 12h6m-6 4h6">
                        </path>
                    </svg>
                </div>

                <h3 class="text-lg font-semibold text-[#020617]">
                    Raíces y Adaptación
                </h3>
            </div>

            <p class="text-sm text-gray-600 leading-relaxed mb-3">
                Usar términos como “deployar” o “hacer merge” no es solo adoptar anglicismos: refleja cómo el lenguaje tecnológico evoluciona para comunicar con más precisión y rapidez.
            </p>

            <p class="text-sm text-gray-600 leading-relaxed">
                Estas palabras tienen historia: deploy viene del francés déployer y merge del latín mergere. El lenguaje tech conserva esas capas y las adapta a su propio ritmo.
            </p>
        </div>

        {{-- Card 2 --}}
        <div 
            class="backdrop-blur-sm bg-white/80 border rounded-xl p-6 transition-all duration-300 hover:bg-white/90 hover:shadow-md"
            style="border-color:#E5E7EB"
        >
            <div class="flex items-center gap-3 mb-4">
                <div 
                    class="w-12 h-12 rounded-xl flex items-center justify-center"
                    style="background:rgba(59,130,246,0.12); color:#3B82F6"
                >
                    <svg class="w-6 h-6" fill="none" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9v-9m0-9v9">
                        </path>
                    </svg>
                </div>

                <h3 class="text-lg font-semibold text-[#020617]">
                    Comunicación Global
                </h3>
            </div>

            <p class="text-sm text-gray-600 leading-relaxed mb-3">
                En un entorno donde desarrolladores de distintos países colaboran a diario, el lenguaje se convierte en el puente que conecta ideas y culturas dentro del mundo tecnológico.
            </p>

            <p class="text-sm text-gray-600 leading-relaxed">
                Términos como “responsive”, “framework” o “debugging” ya trascienden idiomas y forman un vocabulario técnico común que facilita esa colaboración global.
            </p>
        </div>

    </div>
</section>


{{-- =========================
    NUESTRA PERSPECTIVA
========================= --}}
<section style="background:#FFFFFF" class="py-20">
    <div class="max-w-5xl mx-auto px-6 text-center">

        <h2 class="text-3xl md:text-4xl font-bold text-[#020617] mb-10">
            Nuestra Perspectiva
        </h2>

        <div class="grid md:grid-cols-3 gap-10">
            <div 
                class="bg-white border rounded-xl p-6 transition-all duration-300 hover:shadow-md hover:scale-[1.03]"
                style="border-color:#E5E7EB"
            >
                <div 
                    class="w-16 h-16 rounded-xl flex items-center justify-center mx-auto mb-4"
                    style="background:rgba(27,191,155,0.12); color:#1BBF9B"
                >
                    <span class="text-xl">🔍</span>
                </div>

                <h4 class="text-lg font-semibold text-[#020617] mb-2">
                    Investigación
                </h4>

                <p class="text-md text-gray-600 leading-relaxed">
                    Exploramos la etimología y evolución de términos tecnológicos
                </p>
            </div>


            <div 
                class="bg-white border rounded-xl p-6 transition-all duration-300 hover:shadow-md hover:scale-[1.03]"
                style="border-color:#E5E7EB"
            >
                <div 
                    class="w-16 h-16 rounded-xl flex items-center justify-center mx-auto mb-4"
                    style="background:rgba(59,130,246,0.12); color:#3B82F6"
                >
                    <span class="text-xl">🌐</span>
                </div>

                <h4 class="text-lg font-semibold text-[#020617] mb-2">
                    Conexión
                </h4>

                <p class="text-md text-gray-600 leading-relaxed">
                    Analizamos cómo el lenguaje conecta comunidades tech globales
                </p>
            </div>


            <div 
                class="bg-white border rounded-xl p-6 transition-all duration-300 hover:shadow-md hover:scale-[1.03]"
                style="border-color:#E5E7EB"
            >
                <div 
                    class="w-16 h-16 rounded-xl flex items-center justify-center mx-auto mb-4"
                    style="background:rgba(139,92,246,0.12); color:#8B5CF6"
                >
                    <span class="text-xl">📚</span>
                </div>

                <h4 class="text-lg font-semibold text-[#020617] mb-2">
                    Educación
                </h4>

                <p class="text-md text-gray-600 leading-relaxed">
                    Compartimos conocimiento sobre la riqueza del lenguaje tecnológico
                </p>
            </div>


        </div>

    </div>
</section>

{{-- =========================
    EJEMPLOS
========================= --}}
<section style="background:#F8FAFC" class="py-20">
    <div class="max-w-6xl mx-auto px-6">

        <h3 class="text-3xl font-bold text-[#020617] mb-10 text-center">
            Ejemplos de Evolución Lingüística en Tech
        </h3>

        <div class="grid md:grid-cols-2 gap-10">

            <div class="space-y-6">
                <div class="border-l-4 pl-6 py-2 transition-all duration-300 border-[#1BBF9B] hover:bg-[#1BBF9B]/5">
                    <h4 class="font-semibold text-[#020617] mb-2">"Debuggear" vs "Depurar"</h4>
                    <p class="text-gray-600 text-sm">
                        Del inglés "debug", adoptado por su especificidad técnica.
                    </p>
                </div>

                <div class="border-l-4 pl-6 py-2 transition-all duration-300 hover:bg-blue-500/5 hover:border-blue-500" style="border-color:#3B82F6">
                    <h4 class="font-semibold text-[#020617] mb-2">"Pushear" código</h4>
                    <p class="text-gray-600 text-sm">
                        De "push", relacionado con "empujar" cambios al repositorio.
                    </p>
                </div>
            </div>

            <div class="space-y-6">
                <div class="border-l-4 pl-6 py-2 transition-all duration-300 hover:bg-purple-500/5 hover:border-purple-500" style="border-color:#8B5CF6">
                    <h4 class="font-semibold text-[#020617] mb-2">"Frontend" y "Backend"</h4>
                    <p class="text-gray-600 text-sm">
                        Metáforas espaciales que definen arquitectura.
                    </p>
                </div>

                <div class="border-l-4 pl-6 py-2 transition-all duration-300 hover:bg-cyan-500/5 hover:border-cyan-500" style="border-color:#06B6D4">
                    <h4 class="font-semibold text-[#020617] mb-2">"Escalar" aplicaciones</h4>
                    <p class="text-gray-600 text-sm">
                        Del concepto de "scale" — crecer proporcionalmente.
                    </p>
                </div>


            </div>

        </div>

    </div>
</section>

{{-- =========================
    MÁS QUE UN BLOG TÉCNICO (SECCIÓN AÑADIDA)
========================= --}}
<section style="background:#FFFFFF" class="py-24">
    <div class="max-w-5xl mx-auto px-6">

        <div class="bg-white border border-[#E2E8F0] p-12 rounded-xl shadow-sm text-center">

            <h2 class="text-3xl md:text-4xl font-bold text-[#020617] mb-6">
                Más que un blog técnico
            </h2>

            <p class="text-lg text-gray-700 max-w-4xl mx-auto mb-10 leading-relaxed">
                <span class="font-semibold text-[#1BBF9B]">TechGap</span> es un espacio donde la pasión por la tecnología se encuentra con la curiosidad lingüística. Creemos que entender la etimología de lo que programamos, la historia de las palabras que usamos y la evolución del lenguaje tecnológico nos hace mejores comunicadores y, por tanto, mejores profesionales.
            </p>

            <div class="flex flex-wrap justify-center gap-3 text-sm">
                <span class="px-4 py-2 bg-[#1BBF9B]/10 text-[#1BBF9B] rounded-md font-medium">Etimología Tecnológica</span>
                <span class="px-4 py-2 bg-blue-100 text-blue-700 rounded-md font-medium">Evolución Semántica</span>
                <span class="px-4 py-2 bg-green-100 text-green-700 rounded-md font-medium">Comunicación Global</span>
                <span class="px-4 py-2 bg-purple-100 text-purple-700 rounded-md font-medium">Análisis Lingüístico</span>
            </div>

        </div>

    </div>
</section>

{{-- =========================
    CTA FINAL
========================= --}}
<section style="background:#F1F5F9" class="py-20 text-center">

    <h2 class="text-3xl md:text-4xl font-bold text-[#020617] mb-4">
        ¿Curioso por explorar más?
    </h2>

    <p class="text-lg text-gray-600 mb-8 max-w-2xl mx-auto">
        Únete a nuestra exploración del lenguaje tecnológico y descubre las historias detrás de cada término que usas a diario.
    </p>

    <div class="flex flex-col sm:flex-row gap-4 justify-center">
        <a href="{{ route('posts.index') }}" 
           class="inline-flex items-center px-8 py-4 bg-[#1BBF9B] text-[#020617] rounded-lg font-semibold hover:bg-[#17A988] transition shadow-sm">
            Explorar Artículos
        </a>

        <a href="{{ route('contact') }}" 
           class="inline-flex items-center px-8 py-4 bg-white text-[#020617] border border-[#E2E8F0] rounded-lg font-semibold hover:bg-gray-100 transition shadow-sm">
            Conversar con Nosotros
        </a>
    </div>

</section>
@endsection
