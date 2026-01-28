@extends('layouts.app')

@section('content')
<div class="bg-gradient-to-br from-gray-50 to-blue-50 min-h-screen py-12">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="mb-8">
            <a href="{{ route('profile.show') }}" class="inline-flex items-center text-sm text-gray-600 hover:text-techgap-600 font-medium mb-4 transition">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
                Volver al perfil
            </a>
            <h1 class="text-4xl font-extrabold text-gray-900">Editar Perfil</h1>
            <p class="text-gray-600 mt-2">Actualiza tu información personal y preferencias</p>
        </div>

        <div class="space-y-6">
            <!-- Información Personal -->
            <div class="bg-white rounded-2xl shadow-lg p-8 border border-gray-100">
                <div class="flex items-center mb-6">
                    <div class="w-12 h-12 bg-gradient-to-br from-techgap-500 to-techgap-700 rounded-xl flex items-center justify-center mr-4">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-2xl font-bold text-gray-900">Información Personal</h2>
                        <p class="text-sm text-gray-600">Actualiza tus datos personales</p>
                    </div>
                </div>

                <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <!-- Avatar Upload -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-3">Foto de Perfil</label>
                        <div class="flex items-center space-x-6">
                            <div class="w-24 h-24 rounded-2xl bg-gradient-to-br from-techgap-400 to-techgap-600 flex items-center justify-center text-white font-bold text-3xl shadow-lg">
                                @if($user->avatar)
                                    <img src="{{ Storage::url($user->avatar) }}" alt="{{ $user->name }}" class="w-full h-full object-cover rounded-2xl">
                                @else
                                    {{ strtoupper(substr($user->name, 0, 1)) }}
                                @endif
                            </div>
                            <div class="flex-1">
                                <input type="file" name="avatar" accept="image/*" class="block w-full text-sm text-gray-600
                                    file:mr-4 file:py-2.5 file:px-4
                                    file:rounded-lg file:border-0
                                    file:text-sm file:font-semibold
                                    file:bg-techgap-50 file:text-techgap-700
                                    hover:file:bg-techgap-100 file:cursor-pointer
                                    transition">
                                <p class="mt-2 text-xs text-gray-500">JPG, PNG o GIF. Máximo 1MB.</p>
                            </div>
                        </div>
                        @error('avatar')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Name -->
                    <div>
                        <label for="name" class="block text-sm font-semibold text-gray-700 mb-2">Nombre Completo</label>
                        <input type="text" 
                               id="name" 
                               name="name" 
                               value="{{ old('name', $user->name) }}"
                               required
                               class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-techgap-500 focus:border-transparent transition @error('name') border-red-500 @enderror">
                        @error('name')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Email -->
                    <div>
                        <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">Email</label>
                        <input type="email" 
                               id="email" 
                               name="email" 
                               value="{{ old('email', $user->email) }}"
                               required
                               class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-techgap-500 focus:border-transparent transition @error('email') border-red-500 @enderror">
                        @error('email')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Bio -->
                    <div>
                        <label for="bio" class="block text-sm font-semibold text-gray-700 mb-2">Biografía</label>
                        <textarea 
                            id="bio" 
                            name="bio" 
                            rows="4"
                            maxlength="500"
                            class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-techgap-500 focus:border-transparent transition resize-none @error('bio') border-red-500 @enderror"
                            placeholder="Cuéntanos un poco sobre ti..."
                        >{{ old('bio', $user->bio) }}</textarea>
                        <div class="flex justify-between mt-2">
                            <p class="text-xs text-gray-500">Breve descripción sobre ti</p>
                            <p class="text-xs text-gray-500"><span id="bioCount">{{ strlen($user->bio ?? '') }}</span>/500</p>
                        </div>
                        @error('bio')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Website -->
                    <div>
                        <label for="website" class="block text-sm font-semibold text-gray-700 mb-2">Sitio Web</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"></path>
                                </svg>
                            </div>
                            <input type="url" 
                                   id="website" 
                                   name="website" 
                                   value="{{ old('website', $user->website) }}"
                                   placeholder="https://tusitio.com"
                                   class="w-full pl-12 pr-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-techgap-500 focus:border-transparent transition @error('website') border-red-500 @enderror">
                        </div>
                        @error('website')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Submit Button -->
                    <div class="flex items-center justify-between pt-6 border-t border-gray-200">
                        <a href="{{ route('profile.show') }}" class="px-6 py-3 border-2 border-gray-300 text-gray-700 rounded-xl font-semibold hover:bg-gray-50 transition">
                            Cancelar
                        </a>
                        <button type="submit" class="px-8 py-3 bg-gradient-to-r from-techgap-600 to-techgap-700 text-white rounded-xl font-semibold hover:from-techgap-700 hover:to-techgap-800 transition shadow-md hover:shadow-lg transform hover:-translate-y-0.5">
                            Guardar Cambios
                        </button>
                    </div>
                </form>
            </div>

            <!-- Cambiar Contraseña -->
            <div class="bg-white rounded-2xl shadow-lg p-8 border border-gray-100">
                <div class="flex items-center mb-6">
                    <div class="w-12 h-12 bg-gradient-to-br from-amber-500 to-orange-600 rounded-xl flex items-center justify-center mr-4">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-2xl font-bold text-gray-900">Cambiar Contraseña</h2>
                        <p class="text-sm text-gray-600">Actualiza tu contraseña de acceso</p>
                    </div>
                </div>

                <form method="POST" action="{{ route('profile.password.update') }}" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <!-- Current Password -->
                    <div>
                        <label for="current_password" class="block text-sm font-semibold text-gray-700 mb-2">Contraseña Actual</label>
                        <input type="password" 
                               id="current_password" 
                               name="current_password" 
                               required
                               class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-techgap-500 focus:border-transparent transition @error('current_password') border-red-500 @enderror">
                        @error('current_password')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- New Password -->
                    <div>
                        <label for="password" class="block text-sm font-semibold text-gray-700 mb-2">Nueva Contraseña</label>
                        <input type="password" 
                               id="password" 
                               name="password" 
                               required
                               class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-techgap-500 focus:border-transparent transition @error('password') border-red-500 @enderror">
                        <p class="mt-1 text-xs text-gray-500">Mínimo 8 caracteres, debe incluir letras y números</p>
                        @error('password')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Confirm Password -->
                    <div>
                        <label for="password_confirmation" class="block text-sm font-semibold text-gray-700 mb-2">Confirmar Nueva Contraseña</label>
                        <input type="password" 
                               id="password_confirmation" 
                               name="password_confirmation" 
                               required
                               class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-techgap-500 focus:border-transparent transition">
                    </div>

                    <!-- Submit Button -->
                    <div class="pt-6 border-t border-gray-200">
                        <button type="submit" class="w-full px-8 py-3 bg-gradient-to-r from-amber-500 to-orange-600 text-white rounded-xl font-semibold hover:from-amber-600 hover:to-orange-700 transition shadow-md hover:shadow-lg">
                            Actualizar Contraseña
                        </button>
                    </div>
                </form>
            </div>

            <!-- Eliminar Cuenta -->
            <div class="bg-white rounded-2xl shadow-lg p-8 border-2 border-red-200">
                <div class="flex items-center mb-6">
                    <div class="w-12 h-12 bg-gradient-to-br from-red-500 to-red-600 rounded-xl flex items-center justify-center mr-4">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-2xl font-bold text-gray-900">Zona de Peligro</h2>
                        <p class="text-sm text-gray-600">Elimina tu cuenta permanentemente</p>
                    </div>
                </div>

                <div class="bg-red-50 border border-red-200 rounded-xl p-4 mb-6">
                    <p class="text-sm text-red-800 font-medium mb-2">⚠️ Esta acción no se puede deshacer</p>
                    <p class="text-sm text-red-700">Al eliminar tu cuenta, todos tus datos, posts y comentarios serán eliminados permanentemente.</p>
                </div>

                <button 
                    onclick="document.getElementById('deleteModal').classList.remove('hidden')"
                    class="w-full px-8 py-3 bg-red-600 text-white rounded-xl font-semibold hover:bg-red-700 transition shadow-md hover:shadow-lg">
                    Eliminar Mi Cuenta
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Delete Account Modal -->
<div id="deleteModal" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center p-4">
    <div class="bg-white rounded-2xl max-w-md w-full p-8 shadow-2xl" x-data="{ password: '' }">
        <div class="text-center mb-6">
            <div class="w-16 h-16 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-4">
                <svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                </svg>
            </div>
            <h3 class="text-2xl font-bold text-gray-900 mb-2">¿Estás seguro?</h3>
            <p class="text-gray-600">Esta acción es permanente y no se puede deshacer.</p>
        </div>

        <form method="POST" action="{{ route('profile.delete') }}">
            @csrf
            @method('DELETE')

            <div class="mb-6">
                <label for="delete_password" class="block text-sm font-semibold text-gray-700 mb-2">
                    Confirma tu contraseña para continuar
                </label>
                <input 
                    type="password" 
                    id="delete_password" 
                    name="password" 
                    required
                    x-model="password"
                    class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-red-500 focus:border-transparent transition">
            </div>

            <div class="flex items-center space-x-3">
                <button 
                    type="button"
                    onclick="document.getElementById('deleteModal').classList.add('hidden')"
                    class="flex-1 px-6 py-3 border-2 border-gray-300 text-gray-700 rounded-xl font-semibold hover:bg-gray-50 transition">
                    Cancelar
                </button>
                <button 
                    type="submit"
                    :disabled="password.length < 8"
                    :class="password.length >= 8 ? 'bg-red-600 hover:bg-red-700' : 'bg-gray-300 cursor-not-allowed'"
                    class="flex-1 px-6 py-3 text-white rounded-xl font-semibold transition">
                    Eliminar Cuenta
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    // Bio character counter
    const bioTextarea = document.getElementById('bio');
    const bioCount = document.getElementById('bioCount');
    
    bioTextarea.addEventListener('input', function() {
        bioCount.textContent = this.value.length;
    });
</script>
@endsection
