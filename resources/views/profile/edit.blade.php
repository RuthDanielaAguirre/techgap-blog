@extends('layouts.app', ['lightHeader' => true])

@section('content')
<div class="min-h-screen bg-slate-100 py-10">
    <div class="max-w-7xl mx-auto px-4 space-y-10">

        <!-- HEADER -->
        <div class="bg-white border border-slate-200 rounded-xl p-6 shadow-sm">
            <h1 class="text-xl font-semibold text-slate-900">Editar Perfil</h1>
            <p class="text-sm text-slate-500 mt-1">Gestiona tu información personal</p>
        </div>

        <!-- GRID -->
        <div class="grid lg:grid-cols-12 gap-8">

            <!-- IZQUIERDA -->
            <div class="lg:col-span-8 space-y-8">

                <!-- INFORMACIÓN PERSONAL -->
                <div class="bg-white border border-slate-200 rounded-xl p-6 shadow-sm hover:shadow-md transition">
                    <h2 class="text-lg font-semibold text-slate-900 mb-4">Información Personal</h2>

                    <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data" class="space-y-6">
                        @csrf
                        @method('PUT')

                        <!-- NOMBRE -->
                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-1">Nombre</label>
                            <input type="text" name="name" value="{{ old('name', $user->name) }}"
                                   class="w-full rounded-lg border border-slate-300 bg-white px-3 py-2 shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>

                        <!-- EMAIL (DISABLED) -->
                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-1">Email</label>
                            <input type="email" value="{{ $user->email }}" disabled
                                   class="w-full rounded-lg border border-slate-200 bg-slate-100 px-3 py-2 text-slate-500 cursor-not-allowed">
                        </div>

                        <!-- BIO -->
                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-1">Biografía</label>
                            <textarea name="bio" rows="4"
                                      class="w-full rounded-lg border border-slate-300 bg-white px-3 py-2 shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('bio', $user->bio) }}</textarea>
                        </div>

                        <!-- WEBSITE -->
                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-1">Sitio Web</label>
                            <input type="url" name="website" value="{{ old('website', $user->website) }}"
                                   class="w-full rounded-lg border border-slate-300 bg-white px-3 py-2 shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>

                        <button class="px-5 py-2 bg-[#1E40AF] hover:bg-blue-600 text-white rounded-lg text-sm shadow-sm">
                            Guardar cambios
                        </button>
                    </form>
                </div>

            </div>

            <!-- DERECHA -->
            <div class="lg:col-span-4 space-y-8">

                <!-- CONTRASEÑA -->
                <div class="bg-white border border-slate-200 rounded-xl p-6 shadow-sm hover:shadow-md transition">
                    <h2 class="text-lg font-semibold text-slate-900 mb-4">Cambiar Contraseña</h2>

                    <form method="POST" action="{{ route('profile.password.update') }}" class="space-y-4">
                        @csrf
                        @method('PUT')

                        <input type="password" name="current_password" placeholder="Contraseña actual"
                               class="w-full rounded-lg border border-slate-300 px-3 py-2 shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">

                        <input type="password" name="password" placeholder="Nueva contraseña"
                               class="w-full rounded-lg border border-slate-300 px-3 py-2 shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">

                        <input type="password" name="password_confirmation" placeholder="Confirmar contraseña"
                               class="w-full rounded-lg border border-slate-300 px-3 py-2 shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">

                        <button class="w-full px-4 py-2 bg-[#312E81] hover:bg-indigo-700 text-white rounded-lg text-sm shadow-sm">
                            Actualizar contraseña
                        </button>
                    </form>
                </div>

                <!-- DESACTIVAR CUENTA (COLORES SUAVES) -->
                <div class="bg-white border border-slate-200 rounded-xl p-6 shadow-sm hover:shadow-md transition">
                    <h2 class="text-lg font-semibold text-slate-900 mb-3">Desactivar Cuenta</h2>

                    <p class="text-sm text-slate-600 mb-4">
                        Tu cuenta será desactivada. Podrás reactivarla iniciando sesión nuevamente.
                    </p>

                    <form method="POST" action="{{ route('profile.delete') }}">
                        @csrf
                        @method('PUT')

                        <button class="w-full px-4 py-2 bg-slate-700 hover:bg-slate-800 text-white rounded-lg text-sm shadow-sm">
                            Desactivar mi cuenta
                        </button>
                    </form>
                </div>

            </div>

        </div>

    </div>
</div>
@endsection
