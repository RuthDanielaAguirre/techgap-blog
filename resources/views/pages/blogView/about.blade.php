@extends('layouts.app')

@section('content')
<div class="bg-gray-50 min-h-screen">
    <!-- Page Header -->
    <div class="bg-gradient-to-r from-techgap-600 via-techgap-700 to-blue-800 text-white py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <div class="inline-flex items-center px-4 py-2 bg-white/20 backdrop-blur-md border border-white/20 rounded-full text-sm font-medium mb-4">
                    <span class="text-2xl mr-2">🌱</span>
                    Lenguaje en constante evolución
                </div>
                <h1 class="text-4xl md:text-5xl font-extrabold mb-4">
                    Sobre Nosotros
                </h1>
                <p class="text-xl text-techgap-100 max-w-3xl mx-auto">
                    Exploramos la fascinante intersección entre tecnología y lenguaje, donde cada código cuenta una historia
                </p>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <!-- Mission Section -->
        <div class="bg-white rounded-3xl shadow-xl p-8 md:p-12 mb-12 border border-gray-100">
            <div class="max-w-4xl mx-auto">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-8 text-center">
                    El lenguaje como organismo vivo
                </h2>
                <div class="prose prose-lg max-w-none text-gray-700 leading-relaxed">
                    <p class="text-xl mb-6">
                        En <span class="font-bold text-techgap-600">TechGap</span>, entendemos que el lenguaje no es una estructura rígida, sino un ecosistema dinámico que evoluciona, se adapta y crece. En el mundo de la tecnología, esta evolución es especialmente fascinante y acelerada.
                    </p>
                    <p class="mb-6">
                        Cada día emergen nuevos términos, conceptos que migran entre idiomas, y expresiones que nacen en un laboratorio de Silicon Valley pero terminan siendo parte del vocabulario cotidiano de desarrolladores en Barcelona, Buenos Aires o Mumbai.
                    </p>
                </div>
            </div>
        </div>

        <div class="grid lg:grid-cols-2 gap-12 mb-12">
            <!-- Language Evolution -->
            <div class="bg-white rounded-2xl shadow-lg p-8 border border-gray-100">
                <div class="flex items-center mb-6">
                    <div class="w-12 h-12 bg-gradient-to-br from-green-400 to-emerald-600 rounded-xl flex items-center justify-center mr-4">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 4V2a1 1 0 011-1h8a1 1 0 011 1v2m-9 4v10a2 2 0 002 2h6a2 2 0 002-2V8M7 8h10M9 12h6m-6 4h6"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900">Raíces y Adaptación</h3>
                </div>
                <p class="text-gray-700 mb-4">
                    Cuando decimos "deployar" en lugar de "desplegar", o hablamos de "hacer merge" en vez de "fusionar", no estamos simplemente adoptando anglicismos. Estamos participando en una evolución lingüística natural donde la eficiencia comunicativa y la precisión técnica convergen.
                </p>
                <p class="text-gray-700">
                    Cada término tiene sus raíces: "deploy" del francés "déployer", "merge" del latín "mergere". El lenguaje tecnológico es un palimpsesto donde las capas históricas se revelan en cada expresión.
                </p>
            </div>

            <!-- Global Communication -->
            <div class="bg-white rounded-2xl shadow-lg p-8 border border-gray-100">
                <div class="flex items-center mb-6">
                    <div class="w-12 h-12 bg-gradient-to-br from-blue-400 to-indigo-600 rounded-xl flex items-center justify-center mr-4">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9v-9m0-9v9"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900">Comunicación Global</h3>
                </div>
                <p class="text-gray-700 mb-4">
                    En un mundo donde un desarrollador en Madrid colabora con un equipo en Tokio y una startup en México City, el lenguaje se convierte en el puente que conecta ideas, culturas y soluciones.
                </p>
                <p class="text-gray-700">
                    Observamos cómo términos como "responsive", "framework" o "debugging" trascienden fronteras idiomáticas, creando un vocabulario técnico universal que facilita la colaboración global.
                </p>
            </div>
        </div>

        <!-- Our Approach -->
        <div class="bg-gradient-to-r from-techgap-50 to-blue-50 rounded-3xl p-8 md:p-12 mb-12">
            <div class="max-w-4xl mx-auto text-center">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-8">
                    Nuestra Perspectiva
                </h2>
                <div class="grid md:grid-cols-3 gap-8">
                    <div class="text-center">
                        <div class="w-16 h-16 bg-techgap-100 rounded-2xl flex items-center justify-center mx-auto mb-4">
                            <span class="text-2xl">🔍</span>
                        </div>
                        <h4 class="text-lg font-semibold text-gray-900 mb-2">Investigación</h4>
                        <p class="text-gray-600">Exploramos la etimología y evolución de términos tecnológicos</p>
                    </div>
                    <div class="text-center">
                        <div class="w-16 h-16 bg-techgap-100 rounded-2xl flex items-center justify-center mx-auto mb-4">
                            <span class="text-2xl">🌐</span>
                        </div>
                        <h4 class="text-lg font-semibold text-gray-900 mb-2">Conexión</h4>
                        <p class="text-gray-600">Analizamos cómo el lenguaje conecta comunidades tech globales</p>
                    </div>
                    <div class="text-center">
                        <div class="w-16 h-16 bg-techgap-100 rounded-2xl flex items-center justify-center mx-auto mb-4">
                            <span class="text-2xl">📚</span>
                        </div>
                        <h4 class="text-lg font-semibold text-gray-900 mb-2">Educación</h4>
                        <p class="text-gray-600">Compartimos conocimiento sobre la riqueza del lenguaje tecnológico</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Examples Section -->
        <div class="bg-white rounded-2xl shadow-lg p-8 mb-12 border border-gray-100">
            <h3 class="text-2xl font-bold text-gray-900 mb-8 text-center">
                Ejemplos de Evolución Lingüística en Tech
            </h3>
            <div class="grid md:grid-cols-2 gap-8">
                <div class="space-y-6">
                    <div class="border-l-4 border-techgap-500 pl-6">
                        <h4 class="font-semibold text-gray-900 mb-2">"Debuggear" vs "Depurar"</h4>
                        <p class="text-gray-600 text-sm">
                            Del inglés "debug" (eliminar bugs/errores), adoptado por su especificidad técnica frente al más genérico "depurar". La comunidad elige la precisión semántica.
                        </p>
                    </div>
                    <div class="border-l-4 border-blue-500 pl-6">
                        <h4 class="font-semibold text-gray-900 mb-2">"Pushear" código</h4>
                        <p class="text-gray-600 text-sm">
                            De "push", relacionado con el concepto de "empujar" cambios al repositorio. Un ejemplo de cómo acciones técnicas específicas generan nuevos verbos.
                        </p>
                    </div>
                </div>
                <div class="space-y-6">
                    <div class="border-l-4 border-purple-500 pl-6">
                        <h4 class="font-semibold text-gray-900 mb-2">"Frontend" y "Backend"</h4>
                        <p class="text-gray-600 text-sm">
                            Metáforas espaciales que definen arquitectura: "frente" (lo que ve el usuario) y "tras" (la lógica oculta). Conceptos que trascienden idiomas.
                        </p>
                    </div>
                    <div class="border-l-4 border-emerald-500 pl-6">
                        <h4 class="font-semibold text-gray-900 mb-2">"Escalar" aplicaciones</h4>
                        <p class="text-gray-600 text-sm">
                            Del concepto de "scale" - crecer proporcionalmente. Un ejemplo de cómo metáforas físicas expresan conceptos abstractos de rendimiento.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Team Philosophy -->
        <div class="text-center mb-12">
            <div class="bg-white rounded-3xl shadow-xl p-8 md:p-12 border border-gray-100">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-6">
                    Más que un blog técnico
                </h2>
                <p class="text-xl text-gray-700 max-w-4xl mx-auto mb-8 leading-relaxed">
                    <span class="font-semibold text-techgap-600">TechGap</span> es un espacio donde la pasión por la tecnología se encuentra con la curiosidad lingüística. Creemos que entender la etimología de lo que programamos, la historia de las palabras que usamos y la evolución del lenguaje tecnológico nos hace mejores comunicadores y, por tanto, mejores profesionales.
                </p>
                <div class="flex flex-wrap justify-center gap-4 text-sm">
                    <span class="px-4 py-2 bg-techgap-100 text-techgap-700 rounded-full font-medium">Etimología Tecnológica</span>
                    <span class="px-4 py-2 bg-blue-100 text-blue-700 rounded-full font-medium">Evolución Semántica</span>
                    <span class="px-4 py-2 bg-green-100 text-green-700 rounded-full font-medium">Comunicación Global</span>
                    <span class="px-4 py-2 bg-purple-100 text-purple-700 rounded-full font-medium">Análisis Lingüístico</span>
                </div>
            </div>
        </div>

        <!-- CTA Section -->
        <div class="bg-gradient-to-r from-techgap-600 to-blue-600 rounded-3xl p-8 md:p-12 text-white text-center">
            <h2 class="text-3xl md:text-4xl font-bold mb-4">¿Curioso por explorar más?</h2>
            <p class="text-xl text-techgap-100 mb-8 max-w-2xl mx-auto">
                Únete a nuestra exploración del lenguaje tecnológico y descubre las historias detrás de cada término que usas a diario.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('posts.index') }}" class="inline-flex items-center px-8 py-4 bg-white text-techgap-700 rounded-xl font-semibold hover:bg-gray-100 transition shadow-lg">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                    </svg>
                    Explorar Artículos
                </a>
                <a href="{{ route('contact') }}" class="inline-flex items-center px-8 py-4 bg-techgap-800 text-white rounded-xl font-semibold hover:bg-techgap-900 transition shadow-lg">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                    </svg>
                    Conversar con Nosotros
                </a>
            </div>
        </div>
    </div>
</div>
@endsection