@extends('v2.layouts.app', ['lightHeader' => true])

@section('content')

<section class="py-24" style="background:#F8FAFC">

    {{-- Encabezado --}}
    <div class="max-w-4xl mx-auto px-6 text-center mb-20">
        <div class="inline-flex items-center px-4 py-2 bg-techgap-100 text-techgap-700 rounded-full text-sm font-medium mb-4">
            <span class="text-xl mr-2">📬</span>
            Contacto
        </div>

        <h1 class="text-5xl font-bold text-[#020617] mb-6 tracking-tight">
            Pongámonos en contacto
        </h1>

        <p class="text-lg text-gray-600 leading-relaxed max-w-2xl mx-auto">
            Si tienes una idea, un proyecto o simplemente quieres conversar, estaremos encantadas de escucharte.
        </p>
    </div>

    <div class="max-w-6xl mx-auto px-6 grid lg:grid-cols-2 gap-20">

        {{-- Información --}}
        <div class="space-y-16">

            {{-- Equipo --}}
            <div>
                <h2 class="text-2xl font-semibold text-[#020617] mb-6">Nuestro Equipo</h2>

                <div class="space-y-6">

                    {{-- Ruth --}}
                    <div class="flex items-center gap-4 p-5 border border-[#E5E7EB] rounded-xl transition-all duration-300 hover:border-techgap-500 hover:bg-techgap-50 hover:shadow-sm">
                        <div class="w-14 h-14 rounded-full bg-gradient-to-br from-techgap-500 to-techgap-700 flex items-center justify-center text-white font-bold shadow-md transition-transform duration-300 group-hover:scale-105">
                            RD
                        </div>
                        <div>
                            <h3 class="text-base font-semibold text-[#020617]">Ruth Daniela Aguirre</h3>
                            <p class="text-gray-600 text-sm">Full Stack Developer & Co-founder</p>
                        </div>
                    </div>

                    {{-- Alizón --}}
                    <div class="flex items-center gap-4 p-5 border border-[#E5E7EB] rounded-xl transition-all duration-300 hover:border-blue-500 hover:bg-blue-50 hover:shadow-sm">
                        <div class="w-14 h-14 rounded-full bg-gradient-to-br from-blue-500 to-purple-600 flex items-center justify-center text-white font-bold shadow-md transition-transform duration-300 group-hover:scale-105">
                            AR
                        </div>
                        <div>
                            <h3 class="text-base font-semibold text-[#020617]">Alizón Rovi</h3>
                            <p class="text-gray-600 text-sm">Full Stack Developer & Co-founder</p>
                        </div>
                    </div>

                </div>
            </div>

            {{-- Información de contacto --}}
            <div>
                <h2 class="text-2xl font-semibold text-[#020617] mb-6">Información de contacto</h2>

                <div class="space-y-6">

                    {{-- Ubicación --}}
                    <div class="flex items-center gap-4 p-4 border border-[#E5E7EB] rounded-xl hover:bg-techgap-50 transition">
                        <div class="w-12 h-12 bg-techgap-100 rounded-xl flex items-center justify-center">
                            <svg class="w-6 h-6 text-techgap-600" fill="none" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                </path>
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm font-semibold text-[#020617]">Barcelona, España</p>
                            <p class="text-gray-600 text-sm">Nuestra base de operaciones</p>
                        </div>
                    </div>

                    {{-- Email --}}
                    <div class="flex items-center gap-4 p-4 border border-[#E5E7EB] rounded-xl hover:bg-blue-50 transition">
                        <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center">
                            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                </path>
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm font-semibold text-[#020617]">Email</p>
                            <a href="mailto:hola@techgap.dev" class="text-blue-600 hover:text-blue-700 text-sm">
                                hola@techgap.dev
                            </a>
                        </div>
                    </div>

                    {{-- Tiempo de respuesta --}}
                    <div class="flex items-center gap-4 p-4 border border-[#E5E7EB] rounded-xl hover:bg-green-50 transition">
                        <div class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center">
                            <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z">
                                </path>
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm font-semibold text-[#020617]">Tiempo de respuesta</p>
                            <p class="text-gray-600 text-sm">24–48 horas</p>
                        </div>
                    </div>

                </div>
            </div>

        </div>

        {{-- Formulario --}}
        <div>
            <h2 class="text-2xl font-semibold text-[#020617] mb-6">Envíanos un mensaje</h2>

            <form class="space-y-8">

                <div class="grid md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Nombre</label>
                        <input class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-techgap-500 transition">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                        <input class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-techgap-500 transition">
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Asunto</label>
                    <input class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-techgap-500 transition">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Mensaje</label>
                    <textarea rows="5" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-techgap-500 transition resize-none"></textarea>
                </div>

                <button class="w-full px-6 py-3 bg-techgap-600 text-white rounded-xl font-semibold hover:bg-techgap-700 transition shadow-sm hover:shadow-md">
                    Enviar Mensaje
                </button>

            </form>
        </div>

    </div>

    {{-- MAPA DE BARCELONA --}}
    <div class="max-w-6xl mx-auto px-6 mt-24">
        <div class="bg-white border border-[#E5E7EB] rounded-2xl shadow-sm overflow-hidden">

            <div class="p-6 border-b border-[#E5E7EB]">
                <h3 class="text-xl font-semibold text-[#020617] flex items-center">
                    <svg class="w-6 h-6 mr-3 text-techgap-600" fill="none" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7">
                        </path>
                    </svg>
                    Barcelona, España
                </h3>

                <p class="text-gray-600 mt-2 leading-relaxed">
                    Una ciudad vibrante y tecnológica, perfecta para la innovación y el crecimiento de proyectos digitales.
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
                    class="absolute inset-0"
                ></iframe>
            </div>

        </div>
    </div>

    {{-- CTA FINAL --}}
    <div class="max-w-6xl mx-auto px-6 mt-20 text-center">
        <div class="rounded-3xl p-10 md:p-14 shadow-sm border border-[#E5E7EB] bg-gradient-to-r from-techgap-600 to-blue-600 text-white">

            <h2 class="text-3xl md:text-4xl font-bold mb-4">
                ¿Listo para colaborar?
            </h2>

            <p class="text-lg text-techgap-100 mb-10 max-w-2xl mx-auto leading-relaxed">
                Estamos siempre abiertas a nuevos proyectos, colaboraciones y oportunidades interesantes.
            </p>

            <div class="flex flex-col sm:flex-row gap-4 justify-center">

                {{-- Botón Email --}}
                <a href="mailto:hola@techgap.dev"
                class="inline-flex items-center px-8 py-4 bg-white text-[#020617] rounded-xl font-semibold hover:bg-gray-100 transition shadow-md hover:shadow-lg">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                        </path>
                    </svg>
                    Escribir Email
                </a>

                {{-- Botón Artículos --}}
                <a href="{{ route('posts.index') }}"
                class="inline-flex items-center px-8 py-4 bg-[#0F172A] text-white rounded-xl font-semibold hover:bg-[#0A1220] transition shadow-md hover:shadow-lg">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z">
                        </path>
                    </svg>
                    Ver Artículos
                </a>

            </div>
        </div>
    </div>

</section>

@endsection
