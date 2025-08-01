<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Lunáticos - Indumentaria Deportiva')</title>
    
    <meta name="description" content="@yield('description', 'Lunáticos - Tu tienda de indumentaria deportiva y futbolística. Encuentra las mejores camisetas, equipaciones y accesorios deportivos.')">
    <meta name="keywords" content="@yield('keywords', 'indumentaria deportiva, camisetas futbol, equipaciones, ropa deportiva, futbol, lunáticos')">
    
    <!-- Open Graph -->
    <meta property="og:title" content="@yield('title', 'Lunáticos - Indumentaria Deportiva')">
    <meta property="og:description" content="@yield('description', 'Tu tienda de indumentaria deportiva y futbolística')">
    <meta property="og:image" content="{{ asset('images/og-image.jpg') }}">
    <meta property="og:url" content="{{ url()->current() }}">
    
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    @stack('styles')
</head>
<body class="antialiased bg-black text-gray-200 font-sans">
    <!-- Header/Navigation -->
    <header class="sticky top-0 left-0 right-0 z-50 elegant-header">
        <div class="container mx-auto px-4">
            <nav class="flex items-center justify-between py-4">
                <!-- Logo -->
                <div class="flex items-center">
                    <a href="{{ route('home') }}" class="flex items-center">
                        <img src="{{ asset('imagenes/lunaticosnegro.jpg') }}" alt="Lunáticos" class="h-12 lg:h-14 w-auto">
                    </a>
                </div>

                <!-- Search Bar -->
                <div class="hidden md:flex flex-1 mx-4">
                    <form action="{{ route('shop') }}" method="GET" class="w-full">
                        <div class="relative w-full">
                            <input type="text" name="search" placeholder="Buscar productos, marcas y más..." 
                                class="w-full py-2 px-4 bg-gray-900 border border-gray-700 rounded-full text-white focus:outline-none focus:border-gold-500" 
                                value="{{ request('search') }}">
                            <button type="submit" class="absolute right-4 top-1/2 transform -translate-y-1/2 text-gold-500 hover:text-gold-300">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                                </svg>
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Desktop Navigation -->
                <div class="hidden lg:flex items-center space-x-6 text-sm">
                    <a href="{{ route('home') }}" class="elegant-nav-link {{ request()->routeIs('home') ? 'text-gold-500' : 'text-white' }} hover:text-gold-300 transition-colors">
                        Inicio
                    </a>
                    <a href="{{ route('shop') }}" class="elegant-nav-link {{ request()->routeIs('shop*') ? 'text-gold-500' : 'text-white' }} hover:text-gold-300 transition-colors">
                        Productos
                    </a>
                    <a href="{{ route('about') }}" class="elegant-nav-link {{ request()->routeIs('about') ? 'text-gold-500' : 'text-white' }} hover:text-gold-300 transition-colors">
                        Nosotros
                    </a>
                    <a href="{{ route('contact') }}" class="elegant-nav-link {{ request()->routeIs('contact') ? 'text-gold-500' : 'text-white' }} hover:text-gold-300 transition-colors">
                        Contacto
                    </a>
                    <a href="{{ route('whatsapp') }}" class="elegant-button px-4 py-2 rounded-full bg-gradient-to-r from-gold-600 to-gold-400 text-black font-semibold hover:from-gold-500 hover:to-gold-300 transition duration-300">
                        <span class="flex items-center">
                            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12.036 5.339c-3.635 0-6.591 2.956-6.593 6.589-.001 1.483.434 2.594 1.164 3.756l-.666 2.432 2.494-.654c1.117.663 2.184 1.061 3.595 1.061 3.632 0 6.591-2.956 6.592-6.59.003-3.641-2.942-6.593-6.586-6.594zm3.876 9.423c-.165.463-.957.885-1.337.942-.341.054-1.338.266-3.44-1.159-1.858-1.266-2.774-2.614-3.027-3.062-.249-.448-.535-1.188-.535-2.293 0-.693.262-1.354.73-1.828.293-.294.782-.641 1.154-.641.141 0 .231.014.328.043.294.103.575.55.786.852l.401.712c.25.437.49.848.081 1.211-.492.732-.358 1.082-.24 1.216.165.186 1.09 1.491 1.7 1.752.52.22 1.23.4 1.428.116.195-.28.351-.609.445-.829.36-.8.705-.503.934-.271.166.17.707.746.846.905s.216.368.131.548z" />
                            </svg>
                            WhatsApp
                        </span>
                    </a>
                </div>

                <!-- Cart & Mobile Menu -->
                <div class="flex items-center space-x-4">
                    <!-- Cart Button -->
                    <button id="cart-button" class="relative p-2 text-silver-400 hover:text-gold-400 transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4m0 0L7 13m0 0l-1.5 6M7 13h10m-10 0L5.4 5M7 13l1.5 6m0 0H17M8.5 19L17 19"></path>
                        </svg>
                        <span id="cart-count" class="absolute -top-1 -right-1 bg-gold-500 text-black text-xs font-bold rounded-full h-5 w-5 items-center justify-center hidden">0</span>
                    </button>

                    <!-- Mobile Menu Button -->
                    <button id="mobile-menu-button" class="lg:hidden p-2 text-silver-400 hover:text-gold-400 transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                </div>
            </nav>

            <!-- Mobile Navigation Menu -->
            <div id="mobile-menu" class="lg:hidden hidden pb-4">
                <div class="flex flex-col space-y-4 bg-gray-900 p-4 rounded-lg border border-gray-800">
                    <a href="{{ route('home') }}" class="py-2 px-3 text-white hover:text-gold-400 {{ request()->routeIs('home') ? 'text-gold-500' : '' }} transition-colors">
                        Inicio
                    </a>
                    <a href="{{ route('shop') }}" class="py-2 px-3 text-white hover:text-gold-400 {{ request()->routeIs('shop*') ? 'text-gold-500' : '' }} transition-colors">
                        Tienda
                    </a>
                    <a href="{{ route('about') }}" class="py-2 px-3 text-white hover:text-gold-400 {{ request()->routeIs('about') ? 'text-gold-500' : '' }} transition-colors">
                        Nosotros
                    </a>
                    <a href="{{ route('faq') }}" class="py-2 px-3 text-white hover:text-gold-400 {{ request()->routeIs('faq') ? 'text-gold-500' : '' }} transition-colors">
                        FAQ
                    </a>
                    <a href="{{ route('contact') }}" class="py-2 px-3 text-white hover:text-gold-400 {{ request()->routeIs('contact') ? 'text-gold-500' : '' }} transition-colors">
                        Contacto
                    </a>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="pt-16 lg:pt-20">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-black border-t border-gray-800 mt-20">
        <div class="container mx-auto px-4 py-12">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Logo & Description -->
                <div class="col-span-1 lg:col-span-2">
                    <img src="{{ asset('imagenes/lunaticosnegro.jpg') }}" alt="Lunáticos" class="h-14 w-auto mb-4">
                    <p class="text-silver-300 mb-6 max-w-md">
                        Tu tienda especializada en indumentaria deportiva y futbolística. 
                        Calidad, pasión y estilo en cada prenda.
                    </p>
                    
                    <!-- Social Media -->
                    <div class="flex space-x-4">
                        <a href="#" class="text-silver-400 hover:text-gold-400 transition-colors transform hover:scale-110 duration-200">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                            </svg>
                        </a>
                        <a href="mailto:contacto@lunaticos.com" class="text-silver-400 hover:text-gold-400 transition-colors transform hover:scale-110 duration-200">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M24 5.457v13.909c0 .904-.732 1.636-1.636 1.636h-3.819V11.73L12 16.64l-6.545-4.91v9.273H1.636A1.636 1.636 0 0 1 0 19.366V5.457c0-2.023 2.309-3.178 3.927-1.964L5.455 4.64 12 9.548l6.545-4.908 1.528-1.147C21.69 2.28 24 3.434 24 5.457z"/>
                            </svg>
                        </a>
                        <!-- Instagram -->
                        <a href="#" class="text-silver-400 hover:text-gold-400 transition-colors transform hover:scale-110 duration-200">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Contact Info -->
                <div>
                    <h3 class="font-heading text-xl font-semibold mb-4 text-lunaticos-green">Contacto</h3>
                    <div class="space-y-3">
                        <div class="flex items-center space-x-3">
                            <svg class="w-5 h-5 text-lunaticos-red" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                            </svg>
                            <span class="text-gray-300">+54 9 11 xxxx-xxxx</span>
                        </div>
                        <div class="flex items-center space-x-3">
                            <svg class="w-5 h-5 text-lunaticos-red" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                            <span class="text-gray-300">info@lunaticos.com</span>
                        </div>
                        <div class="flex items-center space-x-3">
                            <svg class="w-5 h-5 text-lunaticos-red" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                <path d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                            <span class="text-gray-300">Buenos Aires, Argentina</span>
                        </div>
                    </div>
                </div>

                <!-- Quick Links -->
                <div>
                    <h3 class="font-heading text-xl font-semibold mb-4 text-lunaticos-green">Enlaces</h3>
                    <div class="space-y-3">
                        <a href="{{ route('shop') }}" class="block text-gray-300 hover:text-lunaticos-green transition-colors">Tienda</a>
                        <a href="{{ route('about') }}" class="block text-gray-300 hover:text-lunaticos-green transition-colors">Nosotros</a>
                        <a href="{{ route('faq') }}" class="block text-gray-300 hover:text-lunaticos-green transition-colors">FAQ</a>
                        <a href="{{ route('contact') }}" class="block text-gray-300 hover:text-lunaticos-green transition-colors">Contacto</a>
                        <a href="{{ route('legal') }}" class="block text-gray-300 hover:text-lunaticos-green transition-colors">Términos y Condiciones</a>
                    </div>
                </div>
            </div>

            <!-- Bottom Bar -->
            <div class="border-t border-lunaticos-green/20 pt-8 mt-8">
                <div class="flex flex-col md:flex-row justify-between items-center">
                    <p class="text-gray-400 text-sm">
                        © {{ date('Y') }} Lunáticos. Todos los derechos reservados.
                    </p>
                    <div class="flex space-x-6 mt-4 md:mt-0">
                        <a href="{{ route('legal') }}" class="text-gray-400 hover:text-lunaticos-green text-sm transition-colors">
                            Política de Privacidad
                        </a>
                        <a href="{{ route('legal') }}" class="text-gray-400 hover:text-lunaticos-green text-sm transition-colors">
                            Términos de Servicio
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- WhatsApp Floating Button -->
    <div class="fixed bottom-6 right-6 z-50">
        <a href="{{ route('whatsapp') }}" target="_blank" 
           class="flex items-center justify-center w-14 h-14 bg-green-500 hover:bg-green-600 text-white rounded-full shadow-lg hover:shadow-xl transition-all duration-300 animate-pulse-glow">
            <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24">
                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893A11.821 11.821 0 0020.885 3.106"/>
            </svg>
        </a>
    </div>

    @stack('scripts')
    
    <script>
        // Mobile menu toggle
        document.getElementById('mobile-menu-button').addEventListener('click', function() {
            const mobileMenu = document.getElementById('mobile-menu');
            mobileMenu.classList.toggle('hidden');
        });

        // Cart functionality placeholder
        document.getElementById('cart-button').addEventListener('click', function() {
            // TODO: Implementar carrito
            alert('Funcionalidad del carrito en desarrollo');
        });
    </script>
</body>
</html>
