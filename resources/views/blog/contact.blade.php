@extends('layouts.app', ['lightHeader' => false])

@section('content')

<section class="py-20 bg-[#F1F5F9]">

    {{-- Encabezado --}}
    <div class="max-w-4xl mx-auto px-6 text-center mb-16">
        <div class="inline-flex items-center px-4 py-1.5 bg-indigo-100 text-indigo-700 rounded-full text-xs font-medium mb-4 border border-indigo-200">
            <span class="text-base mr-2">📬</span>
            Contacto
        </div>

        <h1 class="text-4xl md:text-5xl font-bold text-slate-900 tracking-tight mb-4">
            ¡Hablemos!
        </h1>

        <p class="text-base text-slate-600 leading-relaxed max-w-xl mx-auto">
            Estamos aquí para ayudarte. Escríbenos para consultas, colaboraciones o ideas que quieras compartir.
        </p>
    </div>

    {{-- GRID PRINCIPAL --}}
    <div class="max-w-7xl mx-auto px-6 grid lg:grid-cols-2 gap-16">

        {{-- COLUMNA IZQUIERDA --}}
        <div class="space-y-14">

            {{-- Nuestro Equipo --}}
            <div>
                <h2 class="text-sm font-semibold text-slate-700 uppercase tracking-wide mb-4">
                    Nuestro equipo
                </h2>

                <div class="space-y-4">
                    {{-- Ruth --}}
                    <div class="flex items-center gap-4 p-4 bg-white border border-slate-200 rounded-xl shadow-sm hover:shadow-md transition">
                        <div class="w-12 h-12 rounded-full bg-linear-to-br from-[#1BBF9B] to-[#0E8F74] flex items-center justify-center text-white font-semibold">
                            RD
                        </div>

                        <div class="flex-1">
                            <h3 class="text-sm font-semibold text-slate-900">Ruth Daniela Aguirre</h3>
                            <p class="text-xs text-slate-500">Full Stack Developer & Co-founder</p>

                            <div class="flex items-center gap-3 mt-2">

                                {{-- GitHub --}}
                                <a href="https://github.com/RuthDanielaAguirre" target="_blank"
                                class="flex items-center gap-1.5 text-slate-500 hover:text-indigo-600 transition">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M12 .5C5.65.5.5 5.65.5 12c0 5.1 3.29 9.43 7.86 10.96.58.1.79-.25.79-.56v-2c-3.2.7-3.87-1.54-3.87-1.54-.53-1.34-1.3-1.7-1.3-1.7-1.06-.72.08-.71.08-.71 1.17.08 1.78 1.2 1.78 1.2 1.04 1.78 2.73 1.27 3.4.97.1-.76.4-1.27.72-1.56-2.55-.29-5.23-1.28-5.23-5.7 0-1.26.45-2.3 1.2-3.11-.12-.3-.52-1.52.11-3.17 0 0 .97-.31 3.18 1.19a11.1 11.1 0 0 1 5.8 0c2.2-1.5 3.17-1.19 3.17-1.19.63 1.65.23 2.87.11 3.17.75.81 1.2 1.85 1.2 3.11 0 4.43-2.69 5.4-5.25 5.68.41.35.77 1.05.77 2.12v3.14c0 .31.21.67.8.56A10.99 10.99 0 0 0 23.5 12C23.5 5.65 18.35.5 12 .5z"/>
                                    </svg>
                                    <span class="text-xs font-medium">GitHub</span>
                                </a>

                                {{-- LinkedIn --}}
                                <a href="https://www.linkedin.com/in/ruth-daniela-aguirre/" target="_blank"
                                class="flex items-center gap-1.5 text-slate-500 hover:text-blue-600 transition">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452z"/>
                                    </svg>
                                    <span class="text-xs font-medium">LinkedIn</span>
                                </a>

                            </div>
                        </div>
                    </div>

                    {{-- Alizon --}}
                    <div class="flex items-center gap-4 p-4 bg-white border border-slate-200 rounded-xl shadow-sm hover:shadow-md transition">
                        <div class="w-12 h-12 rounded-full bg-linear-to-br from-indigo-500 to-purple-600 flex items-center justify-center text-white font-semibold">
                            AR
                        </div>


                        <div class="flex-1">
                            <h3 class="text-sm font-semibold text-slate-900">Alizon Rosales Vidaurre</h3>
                            <p class="text-xs text-slate-500">Full Stack Developer & Co-founder</p>

                            <div class="flex items-center gap-3 mt-2">

                                {{-- GitHub --}}
                                <a href="https://github.com/rovaalemi" target="_blank"
                                class="flex items-center gap-1.5 text-slate-500 hover:text-indigo-600 transition">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M12 .5C5.65.5.5 5.65.5 12c0 5.1 3.29 9.43 7.86 10.96.58.1.79-.25.79-.56v-2c-3.2.7-3.87-1.54-3.87-1.54-.53-1.34-1.3-1.7-1.3-1.7-1.06-.72.08-.71.08-.71 1.17.08 1.78 1.2 1.78 1.2 1.04 1.78 2.73 1.27 3.4.97.1-.76.4-1.27.72-1.56-2.55-.29-5.23-1.28-5.23-5.7 0-1.26.45-2.3 1.2-3.11-.12-.3-.52-1.52.11-3.17 0 0 .97-.31 3.18 1.19a11.1 11.1 0 0 1 5.8 0c2.2-1.5 3.17-1.19 3.17-1.19.63 1.65.23 2.87.11 3.17.75.81 1.2 1.85 1.2 3.11 0 4.43-2.69 5.4-5.25 5.68.41.35.77 1.05.77 2.12v3.14c0 .31.21.67.8.56A10.99 10.99 0 0 0 23.5 12C23.5 5.65 18.35.5 12 .5z"/>
                                    </svg>
                                    <span class="text-xs font-medium">GitHub</span>
                                </a>

                                {{-- LinkedIn --}}
                                <a href="https://www.linkedin.com/in/alizonrovi/" target="_blank"
                                class="flex items-center gap-1.5 text-slate-500 hover:text-blue-600 transition">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452z"/>
                                    </svg>
                                    <span class="text-xs font-medium">LinkedIn</span>
                                </a>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Información de contacto --}}
            <div>
                <h2 class="text-sm font-semibold text-slate-700 uppercase tracking-wide mb-4">
                    Información de contacto
                </h2>

                <div class="space-y-4">
                    {{-- Ubicación --}}
                    <div class="flex items-center gap-4 p-4 bg-white border border-slate-200 rounded-xl shadow-sm hover:bg-blue-50 transition">
                        <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 11.5a2.5 2.5 0 100-5 2.5 2.5 0 000 5zm0 9c-3.5-3.8-7-7.3-7-11a7 7 0 1114 0c0 3.7-3.5 7.2-7 11z" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm font-semibold text-slate-900">Barcelona, España</p>
                            <p class="text-xs text-blue-600 font-medium">Nuestra base de operaciones</p>
                        </div>
                    </div>

                    {{-- Email --}}
                    <div class="flex items-center gap-4 p-4 bg-white border border-slate-200 rounded-xl shadow-sm hover:bg-indigo-50 transition">
                        <div class="w-12 h-12 bg-indigo-100 rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                </path>
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm font-semibold text-slate-900">Email</p>
                            <a href="mailto:hola@techgap.dev" class="text-indigo-600 hover:text-indigo-700 text-sm">
                                hola@techgap.dev
                            </a>
                        </div>
                    </div>

                    {{-- Tiempo de respuesta --}}
                    <div class="flex items-center gap-4 p-4 bg-white border border-slate-200 rounded-xl shadow-sm hover:bg-green-50 transition">
                        <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z">
                                </path>
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm font-semibold text-slate-900">Tiempo de respuesta</p>
                            <p class="text-xs text-slate-500">24–48 horas</p>
                        </div>
                    </div>

                </div>
            </div>

            {{-- CTA FINAL --}}
            <div class="rounded-2xl p-8 bg-indigo-500 text-white shadow-md">
                <h2 class="text-xl font-semibold mb-2">
                    ¿Listo para colaborar?
                </h2>

                <p class="text-sm text-indigo-100 mb-6 leading-relaxed">
                    Estamos siempre abiertas a nuevos proyectos, colaboraciones y oportunidades interesantes.
                </p>

                <div class="flex flex-col sm:flex-row gap-3">

                    {{-- Botón Email --}}
                    <a href="mailto:hola@techgap.dev"
                    class="inline-flex items-center px-6 py-3 bg-white text-slate-900 rounded-xl text-sm font-semibold hover:bg-slate-100 transition shadow-sm">
                        <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                            </path>
                        </svg>
                        Escribir Email
                    </a>

                    {{-- Botón Artículos --}}
                    <a href="{{ route('posts.index') }}"
                    class="inline-flex items-center px-6 py-3 bg-slate-900 text-white rounded-xl text-sm font-semibold hover:bg-slate-800 transition shadow-sm">
                        <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z">
                            </path>
                        </svg>
                        Ver Artículos
                    </a>

                </div>
            </div>
        </div>

        {{-- COLUMNA DERECHA --}}
        <div class="space-y-12">

            {{-- Formulario --}}
            <h2 class="text-sm font-semibold text-slate-700 uppercase tracking-wide mb-4">
                Envíanos un mensaje
            </h2>

            <div class="bg-white border border-slate-200 rounded-2xl shadow-sm p-8 pt-6">
                <p class="text-sm text-slate-700 mb-6">
                    Cuéntanos un poco sobre tu proyecto o idea.
                </p>

                <form class="space-y-6">

                    <div class="grid md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-1">Nombre</label>
                            <input class="w-full px-4 py-2.5 border border-slate-300 rounded-xl text-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-1">Email</label>
                            <input class="w-full px-4 py-2.5 border border-slate-300 rounded-xl text-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition">
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1">Asunto</label>
                        <input class="w-full px-4 py-2.5 border border-slate-300 rounded-xl text-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1">Mensaje</label>
                        <textarea rows="5" class="w-full px-4 py-2.5 border border-slate-300 rounded-xl text-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition resize-none"></textarea>
                    </div>

                    <button class="w-full px-6 py-3 text-white rounded-xl font-semibold text-sm transition shadow-sm bg-[#1BBF9B] hover:bg-[#17a786]">
                        Enviar Mensaje
                    </button>
                </form>
            </div>

            {{-- Mapa --}}
            <div class="bg-white border border-slate-200 rounded-2xl shadow-sm overflow-hidden">
                <div class="p-6 border-b border-slate-200">
                    <h3 class="text-base font-semibold text-slate-900 flex items-center">
                        <svg class="w-6 h-6 mr-2 text-indigo-600" fill="none" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7">
                            </path>
                        </svg>
                        Barcelona, España
                    </h3>

                    <p class="text-sm text-slate-500 mt-2">
                        Una ciudad vibrante y tecnológica, perfecta para la innovación.
                    </p>
                </div>

                <div class="h-64 relative">
                    <iframe 
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d95777.90732040048!2d2.0702157496832284!3d41.39278810987493!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12a49816718e30e5%3A0x44b0fb3d4f47660a!2sBarcelona%2C%20Spain!5e0!3m2!1sen!2sus!4v1706572000000!5m2!1sen!2sus"
                        width="100%" 
                        height="100%" 
                        style="border:0;" 
                        allowfullscreen 
                        loading="lazy"
                        class="absolute inset-0">
                    </iframe>
                </div>
            </div>

        </div>

    </div>

</section>

@endsection
