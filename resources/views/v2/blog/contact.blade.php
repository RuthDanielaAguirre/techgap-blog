@extends('layouts.app')

@section('content')
<div class="bg-gray-50 min-h-screen">
    <!-- Page Header -->
    <div class="bg-gradient-to-r from-techgap-600 via-techgap-700 to-blue-800 text-white py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <div class="inline-flex items-center px-4 py-2 bg-white/20 backdrop-blur-md border border-white/20 rounded-full text-sm font-medium mb-4">
                    <span class="text-2xl mr-2">📍</span>
                    Barcelona, España
                </div>
                <h1 class="text-4xl md:text-5xl font-extrabold mb-4">
                    ¡Hablemos!
                </h1>
                <p class="text-xl text-techgap-100 max-w-2xl mx-auto">
                    Estamos aquí para ayudarte. Ponte en contacto con nosotros para cualquier consulta o colaboración.
                </p>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="grid lg:grid-cols-2 gap-12">
            <!-- Contact Information -->
            <div class="space-y-6">"
                <!-- Team Section -->
                <div class="bg-white rounded-2xl shadow-lg p-8 border border-gray-100">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6 flex items-center">
                        <svg class="w-5 h-5 mr-3 text-techgap-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                        Nuestro Equipo
                    </h2>
                    
                    <div class="space-y-4">
                        <!-- Ruth Daniela -->
                        <div class="flex items-center space-x-4 p-4 bg-gray-50 rounded-xl hover:bg-gray-100 transition">
                            <div class="w-16 h-16 bg-gradient-to-br from-techgap-400 to-techgap-600 rounded-full flex items-center justify-center text-white text-xl font-bold shadow-lg">
                                RD
                            </div>
                            <div class="flex-1">
                                <h3 class="text-lg font-semibold text-gray-900">Ruth Daniela Aguirre</h3>
                                <p class="text-gray-600 text-sm">Full Stack Developer & Co-founder</p>
                                <div class="flex items-center space-x-4 mt-2">
                                    <a href="https://github.com/RuthDanielaAguirre" target="_blank" class="flex items-center space-x-2 text-gray-600 hover:text-techgap-600 transition">
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M12 0C5.37 0 0 5.373 0 12c0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/>
                                        </svg>
                                        <span class="text-sm">GitHub</span>
                                    </a>
                                    <a href="https://www.linkedin.com/in/ruth-daniela-aguirre/" target="_blank" class="flex items-center space-x-2 text-gray-600 hover:text-blue-600 transition">
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                                        </svg>
                                        <span class="text-sm">LinkedIn</span>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- Alizón -->
                        <div class="flex items-center space-x-4 p-4 bg-gray-50 rounded-xl hover:bg-gray-100 transition">
                            <div class="w-16 h-16 bg-gradient-to-br from-blue-400 to-purple-600 rounded-full flex items-center justify-center text-white text-xl font-bold shadow-lg">
                                AR
                            </div>
                            <div class="flex-1">
                                <h3 class="text-lg font-semibold text-gray-900">Alizón Rovi</h3>
                                <p class="text-gray-600 text-sm">Full Stack Developer & Co-founder</p>
                                <div class="flex items-center space-x-4 mt-2">
                                    <a href="https://github.com/rovaalemi" target="_blank" class="flex items-center space-x-2 text-gray-600 hover:text-techgap-600 transition">
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M12 0C5.37 0 0 5.373 0 12c0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/>
                                        </svg>
                                        <span class="text-sm">GitHub</span>
                                    </a>
                                    <a href="https://www.linkedin.com/in/alizonrovi/" target="_blank" class="flex items-center space-x-2 text-gray-600 hover:text-blue-600 transition">
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                                        </svg>
                                        <span class="text-sm">LinkedIn</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Location & Info -->
                <div class="bg-white rounded-2xl shadow-lg p-8 border border-gray-100">
                    <h3 class="text-xl font-bold text-gray-900 mb-6 flex items-center">
                        <svg class="w-6 h-6 mr-3 text-techgap-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                        Ubicación & Contacto
                    </h3>
                    <div class="space-y-4">
                        <div class="flex items-center space-x-3">
                            <div class="w-10 h-10 bg-techgap-100 rounded-lg flex items-center justify-center">
                                <svg class="w-5 h-5 text-techgap-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                            </div>
                            <div>
                                <h4 class="text-sm font-semibold text-gray-900">Estamos ubicadas en</h4>
                                <p class="text-gray-600">Barcelona, España</p>
                            </div>
                        </div>

                        <div class="flex items-center space-x-3">
                            <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center">
                                <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                            <div>
                                <h4 class="text-sm font-semibold text-gray-900">Email</h4>
                                <a href="mailto:hola@techgap.dev" class="text-blue-600 hover:text-blue-700 transition">hola@techgap.dev</a>
                            </div>
                        </div>

                        <div class="flex items-center space-x-3">
                            <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center">
                                <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <div>
                                <h4 class="text-sm font-semibold text-gray-900">Tiempo de respuesta</h4>
                                <p class="text-gray-600">24-48 horas</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Contact Form & Map -->
            <div class="space-y-6">"
                <!-- Contact Form -->
                <div class="bg-white rounded-2xl shadow-lg p-8 border border-gray-100">
                    <h3 class="text-xl font-bold text-gray-900 mb-6 flex items-center">
                        <svg class="w-6 h-6 mr-3 text-techgap-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                        </svg>
                        Envíanos un mensaje
                    </h3>
                    
                    <form class="space-y-6">
                        <div class="grid md:grid-cols-2 gap-6">
                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Nombre</label>
                                <input type="text" id="name" name="name" class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-techgap-500 focus:border-transparent transition" placeholder="Tu nombre">
                            </div>
                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                                <input type="email" id="email" name="email" class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-techgap-500 focus:border-transparent transition" placeholder="tu@email.com">
                            </div>
                        </div>
                        
                        <div>
                            <label for="subject" class="block text-sm font-medium text-gray-700 mb-2">Asunto</label>
                            <input type="text" id="subject" name="subject" class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-techgap-500 focus:border-transparent transition" placeholder="¿En qué podemos ayudarte?">
                        </div>
                        
                        <div>
                            <label for="message" class="block text-sm font-medium text-gray-700 mb-2">Mensaje</label>
                            <textarea id="message" name="message" rows="5" class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-techgap-500 focus:border-transparent transition resize-none" placeholder="Cuéntanos más detalles..."></textarea>
                        </div>
                        
                        <button type="submit" class="w-full px-6 py-3 bg-gradient-to-r from-techgap-600 to-techgap-700 text-white rounded-xl font-semibold hover:from-techgap-700 hover:to-techgap-800 transition shadow-md hover:shadow-lg transform hover:-translate-y-0.5">
                            Enviar Mensaje
                        </button>
                    </form>
                </div>

                <!-- Barcelona Map -->
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden border border-gray-100">
                    <div class="p-6 border-b border-gray-100">
                        <h3 class="text-xl font-bold text-gray-900 flex items-center">
                            <svg class="w-6 h-6 mr-3 text-techgap-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"></path>
                            </svg>
                            Barcelona, España
                        </h3>
                        <p class="text-gray-600 mt-2">Una ciudad vibrante y tecnológica, perfecta para la innovación.</p>
                    </div>
                    <div class="h-64 bg-gray-100 relative overflow-hidden">
                        <!-- Simple Barcelona representation -->
                        <iframe 
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d95777.90732040048!2d2.0702157496832284!3d41.39278810987493!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12a49816718e30e5%3A0x44b0fb3d4f47660a!2sBarcelona%2C%20Spain!5e0!3m2!1sen!2sus!4v1706572000000!5m2!1sen!2sus"
                            width="100%" 
                            height="100%" 
                            style="border:0;" 
                            allowfullscreen="" 
                            loading="lazy" 
                            referrerpolicy="no-referrer-when-downgrade"
                            class="absolute inset-0">
                        </iframe>
                    </div>
                </div>
            </div>
        </div>

        <!-- CTA Section -->
        <div class="mt-16 text-center">
            <div class="bg-gradient-to-r from-techgap-600 to-blue-600 rounded-3xl p-8 md:p-12 text-white">
                <h2 class="text-3xl md:text-4xl font-bold mb-4">¿Listo para colaborar?</h2>
                <p class="text-xl text-techgap-100 mb-8 max-w-2xl mx-auto">
                    Estamos siempre abiertas a nuevos proyectos, colaboraciones y oportunidades interesantes.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="mailto:hola@techgap.dev" class="inline-flex items-center px-8 py-4 bg-white text-techgap-700 rounded-xl font-semibold hover:bg-gray-100 transition shadow-lg">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                        Escribir Email
                    </a>
                    <a href="{{ route('posts.index') }}" class="inline-flex items-center px-8 py-4 bg-techgap-800 text-white rounded-xl font-semibold hover:bg-techgap-900 transition shadow-lg">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                        </svg>
                        Ver Artículos
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection