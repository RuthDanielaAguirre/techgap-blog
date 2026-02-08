@extends('v2.layouts.app', ['lightHeader' => true])

@section('content')

<section class="bg-[#F8FAFC] py-20">
    <div class="max-w-5xl mx-auto px-6 text-center mb-16">
        <div class="inline-flex items-center px-4 py-2 bg-techgap-100 text-techgap-700 rounded-full text-sm font-medium mb-4">
            <span class="text-xl mr-2">📬</span>
            Contacto
        </div>

        <h1 class="text-4xl md:text-5xl font-bold text-[#020617] mb-4">
            ¡Hablemos!
        </h1>

        <p class="text-lg text-gray-600 max-w-2xl mx-auto">
            Estamos aquí para ayudarte. Escríbenos para consultas, colaboraciones o ideas que quieras compartir.
        </p>
    </div>

    <div class="max-w-7xl mx-auto px-6 grid lg:grid-cols-2 gap-12">

        {{-- Información --}}
        <div class="space-y-8">

            {{-- Equipo --}}
            <div class="bg-white border border-[#E5E7EB] rounded-2xl p-8 shadow-sm">
                <h2 class="text-xl font-semibold text-[#020617] mb-6 flex items-center">
                    <svg class="w-5 h-5 mr-3 text-techgap-600" fill="none" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z">
                        </path>
                    </svg>
                    Nuestro Equipo
                </h2>

                <div class="space-y-4">

                    {{-- Ruth --}}
                    <div class="flex items-center space-x-4 p-4 bg-gray-50 rounded-xl hover:bg-gray-100 transition">
                        <div class="w-14 h-14 bg-gradient-to-br from-techgap-400 to-techgap-600 rounded-full flex items-center justify-center text-white font-bold">
                            RD
                        </div>
                        <div>
                            <h3 class="text-base font-semibold text-[#020617]">Ruth Daniela Aguirre</h3>
                            <p class="text-gray-600 text-sm">Full Stack Developer</p>
                        </div>
                    </div>

                    {{-- Alizón --}}
                    <div class="flex items-center space-x-4 p-4 bg-gray-50 rounded-xl hover:bg-gray-100 transition">
                        <div class="w-14 h-14 bg-gradient-to-br from-blue-400 to-purple-600 rounded-full flex items-center justify-center text-white font-bold">
                            AR
                        </div>
                        <div>
                            <h3 class="text-base font-semibold text-[#020617]">Alizón Rovi</h3>
                            <p class="text-gray-600 text-sm">Full Stack Developer</p>
                        </div>
                    </div>

                </div>
            </div>

            {{-- Ubicación --}}
            <div class="bg-white border border-[#E5E7EB] rounded-2xl p-8 shadow-sm">
                <h3 class="text-xl font-semibold text-[#020617] mb-6 flex items-center">
                    <svg class="w-6 h-6 mr-3 text-techgap-600" fill="none" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                        </path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 11a3 3 0 11-6 0 3 3 0 016 0z">
                        </path>
                    </svg>
                    Ubicación & Contacto
                </h3>

                <div class="space-y-4">
                    <div class="flex items-center space-x-3">
                        <div class="w-10 h-10 bg-techgap-100 rounded-lg flex items-center justify-center">
                            <svg class="w-5 h-5 text-techgap-600" fill="none" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                </path>
                            </svg>
                        </div>
                        <div>
                            <h4 class="text-sm font-semibold text-[#020617]">Estamos ubicadas en</h4>
                            <p class="text-gray-600">Barcelona, España</p>
                        </div>
                    </div>

                    <div class="flex items-center space-x-3">
                        <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center">
                            <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                </path>
                            </svg>
                        </div>
                        <div>
                            <h4 class="text-sm font-semibold text-[#020617]">Email</h4>
                            <a href="mailto:hola@techgap.dev" class="text-blue-600 hover:text-blue-700 transition">
                                hola@techgap.dev
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        {{-- Formulario --}}
        <div class="bg-white border border-[#E5E7EB] rounded-2xl p-8 shadow-sm">
            <h3 class="text-xl font-semibold text-[#020617] mb-6 flex items-center">
                <svg class="w-6 h-6 mr-3 text-techgap-600" fill="none" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z">
                    </path>
                </svg>
                Envíanos un mensaje
            </h3>

            <form class="space-y-6">
                <div class="grid md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Nombre</label>
                        <input class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-techgap-500 transition" placeholder="Tu nombre">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                        <input class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-techgap-500 transition" placeholder="tu@email.com">
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Asunto</label>
                    <input class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-techgap-500 transition" placeholder="¿En qué podemos ayudarte?">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Mensaje</label>
                    <textarea rows="5" class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-techgap-500 transition resize-none" placeholder="Cuéntanos más detalles..."></textarea>
                </div>

                <button class="w-full px-6 py-3 bg-techgap-600 text-white rounded-xl font-semibold hover:bg-techgap-700 transition shadow-sm hover:shadow-md">
                    Enviar Mensaje
                </button>
            </form>
        </div>

    </div>
</section>

@endsection
