@extends('layouts.app')

@section('title', 'Registro - Lunáticos')
@section('description', 'Crea tu cuenta en Lunáticos y únete a la comunidad de fanáticos del deporte.')

@section('content')
<div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8">
        <div class="text-center">
            <!-- Logo -->
            <img src="{{ asset('imagenes/lunaticosnegro.jpg') }}" alt="Lunáticos" class="mx-auto h-20 w-auto mb-6">
            <h2 class="text-3xl font-bold text-white">
                Crear Cuenta
            </h2>
            <p class="mt-2 text-sm text-silver-300">
                Únete a la comunidad Lunáticos
            </p>
        </div>

        <!-- Register Form -->
        <form class="mt-8 space-y-6" method="POST" action="{{ route('register') }}">
            @csrf
            
            <div class="space-y-4">
                <!-- Name Field -->
                <div>
                    <label for="name" class="block text-sm font-medium text-silver-300 mb-2">
                        Nombre Completo
                    </label>
                    <input id="name" 
                           name="name" 
                           type="text" 
                           autocomplete="name" 
                           required 
                           value="{{ old('name') }}"
                           class="w-full px-4 py-3 bg-gray-900 border border-gray-700 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:border-gold-500 focus:ring-1 focus:ring-gold-500 transition-colors"
                           placeholder="Tu nombre completo">
                    @error('name')
                        <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Email Field -->
                <div>
                    <label for="email" class="block text-sm font-medium text-silver-300 mb-2">
                        Correo Electrónico
                    </label>
                    <input id="email" 
                           name="email" 
                           type="email" 
                           autocomplete="email" 
                           required 
                           value="{{ old('email') }}"
                           class="w-full px-4 py-3 bg-gray-900 border border-gray-700 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:border-gold-500 focus:ring-1 focus:ring-gold-500 transition-colors"
                           placeholder="tu@email.com">
                    @error('email')
                        <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password Field -->
                <div>
                    <label for="password" class="block text-sm font-medium text-silver-300 mb-2">
                        Contraseña
                    </label>
                    <input id="password" 
                           name="password" 
                           type="password" 
                           autocomplete="new-password" 
                           required
                           class="w-full px-4 py-3 bg-gray-900 border border-gray-700 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:border-gold-500 focus:ring-1 focus:ring-gold-500 transition-colors"
                           placeholder="Mínimo 8 caracteres">
                    @error('password')
                        <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Confirm Password Field -->
                <div>
                    <label for="password_confirmation" class="block text-sm font-medium text-silver-300 mb-2">
                        Confirmar Contraseña
                    </label>
                    <input id="password_confirmation" 
                           name="password_confirmation" 
                           type="password" 
                           autocomplete="new-password" 
                           required
                           class="w-full px-4 py-3 bg-gray-900 border border-gray-700 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:border-gold-500 focus:ring-1 focus:ring-gold-500 transition-colors"
                           placeholder="Confirma tu contraseña">
                </div>
            </div>

            <!-- Submit Button -->
            <div>
                <button type="submit" 
                        class="group relative w-full flex justify-center py-3 px-4 border border-transparent text-sm font-medium rounded-lg text-black bg-gradient-to-r from-gold-600 to-gold-400 hover:from-gold-500 hover:to-gold-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gold-500 transition duration-300">
                    <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                        <svg class="h-5 w-5 text-black group-hover:text-gray-800" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M8 9a3 3 0 100-6 3 3 0 000 6zM8 11a6 6 0 016 6H2a6 6 0 016-6z" />
                        </svg>
                    </span>
                    Crear Cuenta
                </button>
            </div>

            <!-- Links -->
            <div class="text-center space-y-2">
                <p class="text-sm text-silver-300">
                    ¿Ya tienes cuenta? 
                    <a href="{{ route('login') }}" class="font-medium text-gold-400 hover:text-gold-300 transition-colors">
                        Inicia sesión aquí
                    </a>
                </p>
                <p class="text-sm">
                    <a href="{{ route('home') }}" class="font-medium text-silver-400 hover:text-gold-400 transition-colors">
                        ← Volver al inicio
                    </a>
                </p>
            </div>
        </form>
    </div>
</div>
@endsection
