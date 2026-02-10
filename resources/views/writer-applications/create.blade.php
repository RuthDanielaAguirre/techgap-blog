@extends('layouts.app')

@section('content')
<div class="bg-gradient-to-br from-gray-50 to-blue-50 min-h-screen py-12">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="text-center mb-12">
            <div class="inline-flex items-center justify-center w-20 h-20 bg-gradient-to-br from-amber-500 to-orange-600 rounded-2xl shadow-lg mb-6">
                <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                </svg>
            </div>
            <h1 class="text-4xl md:text-5xl font-extrabold text-gray-900 mb-4">
                Conviértete en Escritor
            </h1>
            <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                Comparte tu conocimiento con miles de desarrolladores en TechGap
            </p>
        </div>

        <!-- Benefits -->
        <div class="bg-white rounded-2xl shadow-lg p-8 mb-8 border border-gray-100">
            <h2 class="text-2xl font-bold text-gray-900 mb-6 flex items-center">
                <svg class="w-6 h-6 mr-3 text-techgap-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path>
                </svg>
                Beneficios como Escritor
            </h2>
            <div class="grid md:grid-cols-2 gap-6">
                <div class="flex items-start space-x-3">
                    <div class="w-8 h-8 bg-green-100 rounded-lg flex items-center justify-center flex-shrink-0">
                        <svg class="w-5 h-5 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <div>
                        <h3 class="font-bold text-gray-900 mb-1">Publica artículos</h3>
                        <p class="text-sm text-gray-600">Comparte tu conocimiento y experiencia</p>
                    </div>
                </div>
                <div class="flex items-start space-x-3">
                    <div class="w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center flex-shrink-0">
                        <svg class="w-5 h-5 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <div>
                        <h3 class="font-bold text-gray-900 mb-1">Construye tu marca</h3>
                        <p class="text-sm text-gray-600">Aumenta tu visibilidad en la comunidad</p>
                    </div>
                </div>
                <div class="flex items-start space-x-3">
                    <div class="w-8 h-8 bg-purple-100 rounded-lg flex items-center justify-center flex-shrink-0">
                        <svg class="w-5 h-5 text-purple-600" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <div>
                        <h3 class="font-bold text-gray-900 mb-1">Acceso al panel</h3>
                        <p class="text-sm text-gray-600">Gestiona tus contenidos fácilmente</p>
                    </div>
                </div>
                <div class="flex items-start space-x-3">
                    <div class="w-8 h-8 bg-amber-100 rounded-lg flex items-center justify-center flex-shrink-0">
                        <svg class="w-5 h-5 text-amber-600" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <div>
                        <h3 class="font-bold text-gray-900 mb-1">Estadísticas</h3>
                        <p class="text-sm text-gray-600">Analiza el rendimiento de tus posts</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Application Form -->
        <div class="bg-white rounded-2xl shadow-lg p-8 border border-gray-100">
            <h2 class="text-2xl font-bold text-gray-900 mb-6">Formulario de Solicitud</h2>

            <form method="POST" action="{{ route('writer-applications.store') }}" class="space-y-6">
                @csrf

                <!-- Motivation -->
                <div>
                    <label for="motivation" class="block text-sm font-semibold text-gray-700 mb-2">
                        ¿Por qué quieres ser escritor en TechGap? *
                    </label>
                    <textarea 
                        id="motivation" 
                        name="motivation" 
                        rows="6"
                        required
                        minlength="100"
                        maxlength="1000"
                        class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-techgap-500 focus:border-transparent transition resize-none @error('motivation') border-red-500 @enderror"
                        placeholder="Cuéntanos sobre tu experiencia, qué temas te apasionan, por qué quieres compartir tu conocimiento..."
                    >{{ old('motivation') }}</textarea>
                    <div class="flex justify-between mt-2">
                        <p class="text-xs text-gray-500">Mínimo 100 caracteres, máximo 1000</p>
                        <p class="text-xs text-gray-500">
                            <span id="motivationCount">{{ strlen(old('motivation', '')) }}</span>/1000
                        </p>
                    </div>
                    @error('motivation')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Portfolio URL -->
                <div>
                    <label for="portfolio_url" class="block text-sm font-semibold text-gray-700 mb-2">
                        Portfolio o ejemplos de trabajo (Opcional)
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"></path>
                            </svg>
                        </div>
                        <input 
                            type="url" 
                            id="portfolio_url" 
                            name="portfolio_url" 
                            value="{{ old('portfolio_url') }}"
                            placeholder="https://tu-portfolio.com o https://github.com/tu-usuario"
                            class="w-full pl-12 pr-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-techgap-500 focus:border-transparent transition @error('portfolio_url') border-red-500 @enderror">
                    </div>
                    <p class="mt-2 text-xs text-gray-500">
                        Comparte un enlace a tu blog, GitHub, LinkedIn o cualquier muestra de tu trabajo
                    </p>
                    @error('portfolio_url')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Info Box -->
                <div class="bg-blue-50 border border-blue-200 rounded-xl p-4">
                    <div class="flex items-start space-x-3">
                        <svg class="w-5 h-5 text-blue-600 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
                        </svg>
                        <div>
                            <h4 class="text-sm font-bold text-blue-900 mb-1">¿Qué sucede después?</h4>
                            <p class="text-sm text-blue-800">
                                Nuestro equipo revisará tu solicitud en los próximos 2-3 días. Te notificaremos por email y dentro de la plataforma sobre el estado de tu solicitud.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="flex items-center justify-between pt-6 border-t border-gray-200">
                    <a href="{{ route('profile.show') }}" class="px-6 py-3 border-2 border-gray-300 text-gray-700 rounded-xl font-semibold hover:bg-gray-50 transition">
                        Cancelar
                    </a>
                    <button type="submit" class="px-8 py-3 bg-gradient-to-r from-amber-500 to-orange-600 text-white rounded-xl font-semibold hover:from-amber-600 hover:to-orange-700 transition shadow-md hover:shadow-lg transform hover:-translate-y-0.5">
                        Enviar Solicitud
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    // Character counter for motivation
    const motivationTextarea = document.getElementById('motivation');
    const motivationCount = document.getElementById('motivationCount');
    
    motivationTextarea.addEventListener('input', function() {
        motivationCount.textContent = this.value.length;
    });
</script>
@endsection
