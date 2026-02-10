@extends('layouts.app')

@section('content')
<div class="bg-gradient-to-br from-gray-50 to-blue-50 min-h-screen py-12">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Status Card -->
        <div class="bg-white rounded-3xl shadow-2xl overflow-hidden border border-gray-100">
            <!-- Header with Status -->
            <div class="px-8 py-6 
                {{ $application->isPending() ? 'bg-gradient-to-r from-yellow-400 to-amber-500' : 
                   ($application->isApproved() ? 'bg-gradient-to-r from-green-400 to-emerald-500' : 
                   'bg-gradient-to-r from-red-400 to-red-500') }}">
                <div class="flex items-center justify-between">
                    <div>
                        <h1 class="text-3xl font-extrabold text-white mb-2">
                            Estado de tu Solicitud
                        </h1>
                        <p class="text-white/90">
                            Enviada el {{ $application->created_at->format('d M Y') }}
                        </p>
                    </div>
                    <div class="w-20 h-20 bg-white/20 backdrop-blur-md rounded-2xl flex items-center justify-center">
                        @if($application->isPending())
                            <svg class="w-10 h-10 text-white animate-spin" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                            </svg>
                        @elseif($application->isApproved())
                            <svg class="w-10 h-10 text-white" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                            </svg>
                        @else
                            <svg class="w-10 h-10 text-white" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path>
                            </svg>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Status Badge -->
            <div class="px-8 py-6 border-b border-gray-200">
                <div class="flex items-center space-x-4">
                    <span class="px-6 py-3 rounded-xl text-sm font-bold shadow-md
                        {{ $application->isPending() ? 'bg-yellow-100 text-yellow-800' : 
                           ($application->isApproved() ? 'bg-green-100 text-green-800' : 
                           'bg-red-100 text-red-800') }}">
                        {{ $application->isPending() ? '⏳ En Revisión' : 
                           ($application->isApproved() ? '✅ Aprobada' : 
                           '❌ Rechazada') }}
                    </span>
                    @if($application->reviewed_at)
                        <span class="text-sm text-gray-600">
                            Revisada {{ $application->reviewed_at->diffForHumans() }}
                        </span>
                    @endif
                </div>
            </div>

            <!-- Application Details -->
            <div class="px-8 py-6 space-y-6">
                <!-- Motivation -->
                <div>
                    <h3 class="text-lg font-bold text-gray-900 mb-3 flex items-center">
                        <svg class="w-5 h-5 mr-2 text-techgap-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                        Tu Motivación
                    </h3>
                    <div class="bg-gray-50 rounded-xl p-4 border border-gray-200">
                        <p class="text-gray-700 leading-relaxed whitespace-pre-wrap">{{ $application->motivation }}</p>
                    </div>
                </div>

                <!-- Portfolio -->
                @if($application->portfolio_url)
                    <div>
                        <h3 class="text-lg font-bold text-gray-900 mb-3 flex items-center">
                            <svg class="w-5 h-5 mr-2 text-techgap-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"></path>
                            </svg>
                            Portfolio
                        </h3>
                        <a href="{{ $application->portfolio_url }}" target="_blank" 
                           class="inline-flex items-center px-4 py-2 bg-techgap-50 text-techgap-700 rounded-lg hover:bg-techgap-100 transition font-medium">
                            {{ $application->portfolio_url }}
                            <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                            </svg>
                        </a>
                    </div>
                @endif

                <!-- Admin Notes (if rejected or has notes) -->
                @if($application->admin_notes)
                    <div>
                        <h3 class="text-lg font-bold text-gray-900 mb-3 flex items-center">
                            <svg class="w-5 h-5 mr-2 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"></path>
                            </svg>
                            Notas del Equipo
                        </h3>
                        <div class="bg-{{ $application->isRejected() ? 'red' : 'blue' }}-50 border border-{{ $application->isRejected() ? 'red' : 'blue' }}-200 rounded-xl p-4">
                            <p class="text-{{ $application->isRejected() ? 'red' : 'blue' }}-800 leading-relaxed">
                                {{ $application->admin_notes }}
                            </p>
                        </div>
                    </div>
                @endif
            </div>

            <!-- Actions -->
            <div class="px-8 py-6 bg-gray-50 border-t border-gray-200">
                @if($application->isPending())
                    <div class="bg-yellow-50 border border-yellow-200 rounded-xl p-4">
                        <div class="flex items-start space-x-3">
                            <svg class="w-5 h-5 text-yellow-600 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
                            </svg>
                            <div>
                                <h4 class="text-sm font-bold text-yellow-900 mb-1">Tu solicitud está en revisión</h4>
                                <p class="text-sm text-yellow-800">
                                    Nuestro equipo está revisando tu aplicación. Te notificaremos por email cuando tengamos una respuesta. Generalmente esto toma entre 2-3 días.
                                </p>
                            </div>
                        </div>
                    </div>
                @elseif($application->isApproved())
                    <div class="bg-green-50 border border-green-200 rounded-xl p-4 mb-4">
                        <div class="flex items-start space-x-3">
                            <svg class="w-5 h-5 text-green-600 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                            </svg>
                            <div>
                                <h4 class="text-sm font-bold text-green-900 mb-1">¡Felicidades! Tu solicitud fue aprobada</h4>
                                <p class="text-sm text-green-800 mb-3">
                                    Ya puedes empezar a publicar artículos en TechGap. Accede a tu panel de escritor para crear tu primer post.
                                </p>
                            </div>
                        </div>
                    </div>
                    <a href="/admin" 
                       class="block w-full text-center px-8 py-4 bg-gradient-to-r from-techgap-600 to-techgap-700 text-white rounded-xl font-bold hover:from-techgap-700 hover:to-techgap-800 transition shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                        Ir al Panel de Escritor
                    </a>
                @else
                    <div class="bg-red-50 border border-red-200 rounded-xl p-4 mb-4">
                        <div class="flex items-start space-x-3">
                            <svg class="w-5 h-5 text-red-600 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path>
                            </svg>
                            <div>
                                <h4 class="text-sm font-bold text-red-900 mb-1">Tu solicitud no fue aprobada</h4>
                                <p class="text-sm text-red-800">
                                    Lamentamos informarte que tu solicitud no fue aprobada en esta ocasión. Por favor revisa las notas del equipo arriba.
                                </p>
                            </div>
                        </div>
                    </div>
                @endif

                <a href="{{ route('profile.show') }}" 
                   class="block w-full text-center px-6 py-3 border-2 border-gray-300 text-gray-700 rounded-xl font-semibold hover:bg-gray-50 transition mt-4">
                    Volver al Perfil
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
