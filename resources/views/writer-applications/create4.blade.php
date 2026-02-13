@extends('layouts.app')

@section('content')
<div class="min-h-screen py-20 bg-techgap-50">

    <div class="max-w-4xl mx-auto px-6">

        <!-- Header -->
        <div class="text-center mb-20">
            <div class="inline-flex items-center justify-center w-24 h-24 
                        rounded-3xl bg-techgap-50 shadow-[8px_8px_20px_#d1d5db,-8px_-8px_20px_#ffffff] mb-8">
                <svg class="w-12 h-12 text-techgap-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                    </path>
                </svg>
            </div>

            <h1 class="text-4xl md:text-5xl font-extrabold text-techgap-900 mb-4">
                Conviértete en Escritor
            </h1>

            <p class="text-lg md:text-xl text-techgap-600 max-w-2xl mx-auto">
                Comparte tu conocimiento con miles de desarrolladores
            </p>
        </div>

        <!-- Benefits -->
        <div class="bg-techgap-50 rounded-3xl p-12 shadow-[10px_10px_25px_#d1d5db,-10px_-10px_25px_#ffffff] mb-16">

            <h2 class="text-2xl font-bold text-techgap-900 mb-10">Beneficios como Escritor</h2>

            <div class="grid md:grid-cols-2 gap-10">

                @php
                    $benefits = [
                        ['icon' => 'green', 'title' => 'Publica artículos', 'desc' => 'Comparte tu conocimiento y experiencia'],
                        ['icon' => 'blue', 'title' => 'Construye tu marca', 'desc' => 'Aumenta tu visibilidad en la comunidad'],
                        ['icon' => 'purple', 'title' => 'Acceso al panel', 'desc' => 'Gestiona tus contenidos fácilmente'],
                        ['icon' => 'amber', 'title' => 'Estadísticas', 'desc' => 'Analiza el rendimiento de tus posts'],
                    ];
                @endphp

                @foreach ($benefits as $b)
                <div class="flex items-start space-x-4">
                    <div class="w-12 h-12 rounded-2xl bg-techgap-50 shadow-[6px_6px_15px_#d1d5db,-6px_-6px_15px_#ffffff] flex items-center justify-center">
                        <svg class="w-6 h-6 text-{{ $b['icon'] }}-600" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <div>
                        <h3 class="font-semibold text-techgap-900">{{ $b['title'] }}</h3>
                        <p class="text-sm text-techgap-600">{{ $b['desc'] }}</p>
                    </div>
                </div>
                @endforeach

            </div>
        </div>

        <!-- Form -->
        <div class="bg-techgap-50 rounded-3xl p-12 shadow-[10px_10px_25px_#d1d5db,-10px_-10px_25px_#ffffff]">

            <h2 class="text-2xl font-bold text-techgap-900 mb-10">Formulario de Solicitud</h2>

            <form method="POST" action="{{ route('writer-applications.store') }}" class="space-y-10">
                @csrf

                <!-- Motivation -->
                <div>
                    <label class="block text-sm font-semibold text-techgap-700 mb-2">
                        ¿Por qué quieres ser escritor en TechGap? *
                    </label>

                    <textarea 
                        id="motivation"
                        name="motivation"
                        rows="6"
                        required
                        minlength="100"
                        maxlength="1000"
                        class="w-full px-5 py-4 rounded-2xl bg-techgap-50 
                               shadow-inner shadow-techgap-200/60 focus:ring-2 focus:ring-techgap-500 
                               text-techgap-900"
                        placeholder="Cuéntanos sobre tu experiencia..."
                    >{{ old('motivation') }}</textarea>

                    <div class="flex justify-between mt-2 text-xs text-techgap-500">
                        <span>Mínimo 100 caracteres</span>
                        <span><span id="motivationCount">{{ strlen(old('motivation', '')) }}</span>/1000</span>
                    </div>
                </div>

                <!-- Portfolio -->
                <div>
                    <label class="block text-sm font-semibold text-techgap-700 mb-2">
                        Portfolio o ejemplos de trabajo (Opcional)
                    </label>

                    <input 
                        type="url"
                        name="portfolio_url"
                        value="{{ old('portfolio_url') }}"
                        placeholder="https://tu-portfolio.com"
                        class="w-full px-5 py-3 rounded-2xl bg-techgap-50 
                               shadow-inner shadow-techgap-200/60 focus:ring-2 focus:ring-techgap-500 
                               text-techgap-900">
                </div>

                <!-- Info -->
                <div class="rounded-2xl p-6 bg-techgap-50 shadow-inner shadow-techgap-200/60">
                    <p class="text-sm text-techgap-700 leading-relaxed">
                        Revisaremos tu solicitud en los próximos 2-3 días.  
                        Te notificaremos por email y dentro de la plataforma.
                    </p>
                </div>

                <!-- Buttons -->
                <div class="flex justify-between pt-6 border-t border-techgap-200">
                    <a href="{{ route('profile.show') }}" 
                       class="px-6 py-3 rounded-xl bg-techgap-50 shadow-[6px_6px_15px_#d1d5db,-6px_-6px_15px_#ffffff] text-techgap-700">
                        Cancelar
                    </a>

                    <button type="submit"
                        class="px-8 py-3 rounded-xl bg-techgap-700 text-white shadow-[6px_6px_15px_#c4c4c4,-6px_-6px_15px_#ffffff] hover:bg-techgap-800 transition">
                        Enviar Solicitud
                    </button>
                </div>

            </form>
        </div>

    </div>
</div>

<script>
    const t = document.getElementById('motivation');
    const c = document.getElementById('motivationCount');
    t.addEventListener('input', () => c.textContent = t.value.length);
</script>
@endsection
