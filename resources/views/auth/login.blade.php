@extends('layouts.app')

@section('title', 'Iniciar Sesión - Lunáticos')
@section('description', 'Inicia sesión en Lunáticos para acceder a tu cuenta y gestionar tus pedidos.')

@section('content')
<div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8">
        <div class="text-center">
            <!-- Logo -->
            <img src="{{ asset('imagenes/lunaticosnegro.jpg') }}" alt="Lunáticos" class="mx-auto h-20 w-auto mb-6">
            <h2 class="text-3xl font-bold text-white">
                Iniciar Sesión
            </h2>
            <p class="mt-2 text-sm text-silver-300">
                Accede a tu cuenta de Lunáticos
            </p>
        </div>

        <!-- Login Form -->
        <form class="mt-8 space-y-6" method="POST" action="{{ route('login') }}">
            @csrf
            
            <div class="space-y-4">
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
                           autocomplete="current-password" 
                           required
                           class="w-full px-4 py-3 bg-gray-900 border border-gray-700 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:border-gold-500 focus:ring-1 focus:ring-gold-500 transition-colors"
                           placeholder="Tu contraseña">
                    @error('password')
                        <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Remember Me -->
                <div class="flex items-center">
                    <input id="remember" 
                           name="remember" 
                           type="checkbox" 
                           class="h-4 w-4 text-gold-500 focus:ring-gold-500 border-gray-700 bg-gray-900 rounded">
                    <label for="remember" class="ml-2 text-sm text-silver-300">
                        Recordarme
                    </label>
                </div>
            </div>

            <!-- Submit Button -->
            <div>
                <button type="submit" 
                        class="group relative w-full flex justify-center py-3 px-4 border border-transparent text-sm font-medium rounded-lg text-black bg-gradient-to-r from-gold-600 to-gold-400 hover:from-gold-500 hover:to-gold-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gold-500 transition duration-300">
                    <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                        <svg class="h-5 w-5 text-black group-hover:text-gray-800" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                        </svg>
                    </span>
                    Iniciar Sesión
                </button>
            </div>

            <!-- Links -->
            <div class="text-center space-y-2">
                <p class="text-sm text-silver-300">
                    ¿No tienes cuenta? 
                    <a href="{{ route('register') }}" class="font-medium text-gold-400 hover:text-gold-300 transition-colors">
                        Regístrate aquí
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
