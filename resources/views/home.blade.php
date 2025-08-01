@extends('layouts.app')

@section('title', 'Lunáticos - Indumentaria Deportiva | Inicio')
@section('description', 'Lunáticos - Tu tienda de indumentaria deportiva y futbolística. Encuentra las mejores camisetas, equipaciones y accesorios deportivos con la calidad que buscas.')

@section('content')
<!-- Hero Banner Section -->
<section class="py-4">
    <div class="container mx-auto px-4">
        <div class="bg-gradient-to-r from-gray-900 to-black border border-gray-800 rounded-lg shadow-lg overflow-hidden">
            <div class="relative bg-black">
                <!-- Banner Image -->
                <img src="{{ asset('images/banner.jpg') }}" 
                     alt="Lunáticos Indumentaria Deportiva" 
                     class="w-full h-40 sm:h-48 md:h-56 lg:h-64 xl:h-72 object-contain"
                     onerror="this.src='https://via.placeholder.com/1200x400/111111/ffffff?text=Lunáticos%20-%20Indumentaria%20Deportiva'">
            </div>
        </div>
    </div>
</section>

<!-- Categories Section -->
<section class="py-12">
    <div class="container mx-auto px-4">
        <div class="flex items-center justify-between mb-8">
            <h2 class="text-2xl font-bold text-white">Categorías <span class="text-gold-400">Destacadas</span></h2>
            <a href="{{ route('shop') }}" class="text-gold-400 hover:text-gold-300 transition-colors text-sm">Ver todas</a>
        </div>
        
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4">
            <!-- Camisetas de Fútbol -->
            <a href="{{ route('shop', ['category' => 'camisetas-futbol']) }}" class="group bg-gray-900 rounded-xl p-6 border border-gray-800 hover:border-gold-500/50 flex flex-col items-center justify-center text-center transition-all duration-300 hover:shadow-2xl hover:shadow-gold-500/20 hover:scale-105">
                <div class="w-16 h-16 flex items-center justify-center mb-4 rounded-full bg-gradient-to-br from-gold-500 to-gold-600 group-hover:from-gold-400 group-hover:to-gold-500 transition-all duration-300 shadow-lg">
                    <!-- Escudo de Fútbol -->
                    <svg class="w-8 h-8 text-black" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/>
                        <circle cx="12" cy="9" r="1.5"/>
                    </svg>
                </div>
                <span class="text-sm text-silver-300 font-semibold group-hover:text-gold-400 transition-colors">Camisetas de Fútbol</span>
            </a>

            <!-- Pantalones Deportivos -->
            <a href="{{ route('shop', ['category' => 'pantalones-deportivos']) }}" class="group bg-gray-900 rounded-xl p-6 border border-gray-800 hover:border-gold-500/50 flex flex-col items-center justify-center text-center transition-all duration-300 hover:shadow-2xl hover:shadow-gold-500/20 hover:scale-105">
                <div class="w-16 h-16 flex items-center justify-center mb-4 rounded-full bg-gradient-to-br from-gold-500 to-gold-600 group-hover:from-gold-400 group-hover:to-gold-500 transition-all duration-300 shadow-lg">
                    <!-- Balón de Fútbol -->
                    <svg class="w-8 h-8 text-black" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 17.93c-3.94-.49-7-3.85-7-7.93 0-.62.08-1.21.21-1.79L9 15v1c0 1.1.9 2 2 2v1.93zm6.9-2.54c-.26-.81-1-1.39-1.9-1.39h-1v-3c0-.55-.45-1-1-1H8v-2h2c.55 0 1-.45 1-1V7h2c1.1 0 2-.9 2-2v-.41c2.93 1.19 5 4.06 5 7.41 0 2.08-.8 3.97-2.1 5.39z"/>
                    </svg>
                </div>
                <span class="text-sm text-silver-300 font-semibold group-hover:text-gold-400 transition-colors">Pantalones Deportivos</span>
            </a>

            <!-- Zapatillas -->
            <a href="{{ route('shop', ['category' => 'zapatillas']) }}" class="group bg-gray-900 rounded-xl p-6 border border-gray-800 hover:border-gold-500/50 flex flex-col items-center justify-center text-center transition-all duration-300 hover:shadow-2xl hover:shadow-gold-500/20 hover:scale-105">
                <div class="w-16 h-16 flex items-center justify-center mb-4 rounded-full bg-gradient-to-br from-gold-500 to-gold-600 group-hover:from-gold-400 group-hover:to-gold-500 transition-all duration-300 shadow-lg">
                    <!-- Botín de Fútbol -->
                    <svg class="w-8 h-8 text-black" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M3 18h2v-2H3v2zm0-4h2v-2H3v2zm0-4h2V8H3v2zm4 8h14v-2H7v2zm0-4h14v-2H7v2zm0-4h14V8H7v2z"/>
                        <circle cx="17" cy="9" r="1"/>
                        <circle cx="17" cy="13" r="1"/>
                        <circle cx="17" cy="17" r="1"/>
                    </svg>
                </div>
                <span class="text-sm text-silver-300 font-semibold group-hover:text-gold-400 transition-colors">Zapatillas</span>
            </a>

            <!-- Accesorios -->
            <a href="{{ route('shop', ['category' => 'accesorios']) }}" class="group bg-gray-900 rounded-xl p-6 border border-gray-800 hover:border-gold-500/50 flex flex-col items-center justify-center text-center transition-all duration-300 hover:shadow-2xl hover:shadow-gold-500/20 hover:scale-105">
                <div class="w-16 h-16 flex items-center justify-center mb-4 rounded-full bg-gradient-to-br from-gold-500 to-gold-600 group-hover:from-gold-400 group-hover:to-gold-500 transition-all duration-300 shadow-lg">
                    <!-- Silbato de Árbitro -->
                    <svg class="w-8 h-8 text-black" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 3c1.1 0 2 .9 2 2 0 .75-.4 1.4-1 1.75v1.5c0 .83.67 1.5 1.5 1.5s1.5-.67 1.5-1.5V6.75c-.6-.35-1-.99-1-1.75 0-1.1.9-2 2-2s2 .9 2 2c0 .76-.4 1.4-1 1.75V8.25c0 1.93-1.57 3.5-3.5 3.5-.96 0-1.83-.39-2.46-1.02L9.5 12.77c.32.18.68.29 1.06.31.38-.02.74-.13 1.06-.31l1.54 2.04c-.63.63-1.5 1.02-2.46 1.02-1.93 0-3.5-1.57-3.5-3.5V10.25c-.6-.35-1-.99-1-1.75 0-1.1.9-2 2-2s2 .9 2 2c0 .76-.4 1.4-1 1.75v1.5c0 .83.67 1.5 1.5 1.5s1.5-.67 1.5-1.5v-1.5c-.6-.35-1-.99-1-1.75 0-1.1.9-2 2-2z"/>
                    </svg>
                </div>
                <span class="text-sm text-silver-300 font-semibold group-hover:text-gold-400 transition-colors">Accesorios</span>
            </a>

            <!-- Equipaciones Completas -->
            <a href="{{ route('shop', ['category' => 'equipaciones-completas']) }}" class="group bg-gray-900 rounded-xl p-6 border border-gray-800 hover:border-gold-500/50 flex flex-col items-center justify-center text-center transition-all duration-300 hover:shadow-2xl hover:shadow-gold-500/20 hover:scale-105">
                <div class="w-16 h-16 flex items-center justify-center mb-4 rounded-full bg-gradient-to-br from-gold-500 to-gold-600 group-hover:from-gold-400 group-hover:to-gold-500 transition-all duration-300 shadow-lg">
                    <!-- Copa/Trofeo -->
                    <svg class="w-8 h-8 text-black" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M6 2h12a2 2 0 0 1 2 2v6c0 2.97-2.16 5.43-5 5.91V18h2a1 1 0 0 1 0 2H7a1 1 0 0 1 0-2h2v-2.09C6.16 15.43 4 12.97 4 10V4a2 2 0 0 1 2-2zm1 2v6c0 2.21 1.79 4 4 4s4-1.79 4-4V4H7zm5 8c1.1 0 2-.9 2-2s-.9-2-2-2-2 .9-2 2 .9 2 2 2z"/>
                    </svg>
                </div>
                <span class="text-sm text-silver-300 font-semibold group-hover:text-gold-400 transition-colors">Equipaciones Completas</span>
            </a>

            <!-- Ropa de Entrenamiento -->
            <a href="{{ route('shop', ['category' => 'ropa-entrenamiento']) }}" class="group bg-gray-900 rounded-xl p-6 border border-gray-800 hover:border-gold-500/50 flex flex-col items-center justify-center text-center transition-all duration-300 hover:shadow-2xl hover:shadow-gold-500/20 hover:scale-105">
                <div class="w-16 h-16 flex items-center justify-center mb-4 rounded-full bg-gradient-to-br from-gold-500 to-gold-600 group-hover:from-gold-400 group-hover:to-gold-500 transition-all duration-300 shadow-lg">
                    <!-- Campo de Fútbol -->
                    <svg class="w-8 h-8 text-black" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M1 5h22v14H1V5zm2 2v10h18V7H3zm4 2h10v6H7V9zm2 1v4h6v-4H9zm3 1.5c.83 0 1.5.67 1.5 1.5s-.67 1.5-1.5 1.5-1.5-.67-1.5-1.5.67-1.5 1.5-1.5z"/>
                    </svg>
                </div>
                <span class="text-sm text-silver-300 font-semibold group-hover:text-gold-400 transition-colors">Ropa de Entrenamiento</span>
            </a>
        </div>
    </div>
</section>

<!-- Featured Products Section -->
<section class="py-12">
    <div class="container mx-auto px-4">
        <div class="flex items-center justify-between mb-8">
            <h2 class="text-2xl font-bold text-white">Productos <span class="text-gold-400">Destacados</span></h2>
            <a href="{{ route('shop') }}" class="text-gold-400 hover:text-gold-300 transition-colors text-sm">Ver todos</a>
        </div>
        
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-6">
            @foreach($featuredProducts as $product)
            <div class="elegant-product-card group">
                <a href="{{ route('product.show', $product->slug) }}">
                    <div class="relative overflow-hidden">
                        <img src="{{ asset($product->image) }}" 
                             alt="{{ $product->name }}" 
                             class="w-full h-64 object-cover transform group-hover:scale-105 transition-transform duration-300"
                             onerror="this.src='https://via.placeholder.com/300x300/111111/666666?text=Producto'">
                             
                        @if($product->discount_percentage > 0)
                        <div class="absolute top-2 right-2 bg-gold-500 text-black text-xs font-bold py-1 px-2 rounded-full">
                            {{ $product->discount_percentage }}% OFF
                        </div>
                        @endif
                    </div>
                </a>
                <div class="p-4">
                    <h3 class="text-sm text-silver-300 line-clamp-2 mb-3 group-hover:text-white transition-colors">{{ $product->name }}</h3>
                    <div class="flex items-center justify-between">
                        <p class="text-lg font-bold text-gold-400">${{ number_format($product->current_price, 0, ',', '.') }}</p>
                        <p class="text-xs text-silver-400">Envío gratis</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Promo Section -->
<!--
<section class="py-16">
    <div class="container mx-auto px-4">
        <div class="bg-gradient-to-r from-gray-900 to-black border border-gray-800 rounded-lg overflow-hidden">
            <div class="flex flex-col lg:flex-row">
                Text Content
                 <div class="w-full lg:w-1/2 p-8 lg:p-12 flex items-center">
                    <div>
                        <h2 class="text-3xl font-bold text-white mb-4">Colección <span class="text-gold-400">Premium</span></h2>
                        <p class="text-silver-300 mb-8">Descubre nuestra exclusiva selección de indumentaria deportiva de alta calidad. Diseños únicos que combinan estilo, rendimiento y confort.</p>
                        <a href="{{ route('shop') }}" class="elegant-button inline-block">
                            Ver colección
                        </a>
                    </div>
                </div> -->
                
                <!-- Image -->
                <!-- <div class="w-full lg:w-1/2 h-64 lg:h-auto bg-black relative overflow-hidden">
                    <div class="absolute inset-0 bg-gradient-to-l from-black to-transparent opacity-50 z-10"></div>
                    <img src="{{ asset('images/banner.jpg') }}" 
                         alt="Colección Premium" 
                         class="w-full h-full object-cover"
                         onerror="this.src='https://via.placeholder.com/800x600/111111/444444?text=Colección+Premium'">
                </div>
            </div>
        </div>
    </div> -->
</section>


<!-- Sección de productos comentada -->
<!--
            <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                Descubrí nuestra selección de productos más populares y de última temporada
            </p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
            @foreach($featuredProducts as $product)
                <div class="product-card relative group">
                    <div class="aspect-square overflow-hidden rounded-t-xl">
                        <img src="{{ $product->main_image }}" 
                             alt="{{ $product->name }}" 
                             class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        
                        @if($product->sale_price)
                            <div class="absolute top-4 left-4 bg-lunaticos-red text-white px-3 py-1 rounded-full text-sm font-semibold">
                                -{{ $product->discount_percentage }}%
                            </div>
                        @endif
                    </div>
                    
                    <div class="p-6">
                        <div class="text-sm text-lunaticos-green font-medium mb-2">
                            {{ $product->category->name }}
                        </div>
                        <h3 class="font-heading text-xl font-semibold text-lunaticos-black mb-3 group-hover:text-lunaticos-red transition-colors">
                            {{ $product->name }}
                        </h3>
                        
                        <div class="flex items-center justify-between">
                            <div class="text-lunaticos-black">
                                @if($product->sale_price)
                                    <span class="text-lg font-bold">${{ number_format($product->sale_price, 0, ',', '.') }}</span>
                                    <span class="text-sm text-gray-500 line-through ml-2">${{ number_format($product->price, 0, ',', '.') }}</span>
                                @else
                                    <span class="text-lg font-bold">${{ number_format($product->price, 0, ',', '.') }}</span>
                                @endif
                            </div>
                        </div>
                        
                        <a href="{{ route('product.show', $product->slug) }}" 
                           class="mt-4 w-full btn-primary text-center block">
                            Ver Producto
                        </a>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="text-center mt-12">
            <a href="{{ route('shop') }}" class="elegant-button-outline">
                Ver Todos los Productos
            </a>
        </div>
    </div>
</section>
-->

<!-- Benefits Section -->
<!--
<section class="bg-gray-900 py-16">
    <div class="container mx-auto px-4">
        <div class="text-center mb-16">
            <h2 class="text-3xl lg:text-4xl font-bold text-white mb-4">
                ¿Por qué elegir <span class="text-gold-400">Lunáticos</span>?
            </h2>
            <p class="text-xl text-silver-300 max-w-2xl mx-auto">
                Somos más que una tienda, somos tu aliado en cada jugada
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <div class="text-center group p-6 bg-black rounded-xl border border-gray-800 hover:border-gold-500/30 transition-all duration-300">
                <div class="w-20 h-20 bg-gradient-to-br from-gold-500 to-gold-700 rounded-full flex items-center justify-center mx-auto mb-6 group-hover:shadow-gold-500/20 transition-all duration-300">
                    <svg class="w-10 h-10 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <h3 class="text-2xl font-semibold text-white mb-4">Calidad Garantizada</h3>
                <p class="text-silver-300">Productos de primera calidad con garantía de satisfacción total</p>
            </div>

            <div class="text-center group p-6 bg-black rounded-xl border border-gray-800 hover:border-gold-500/30 transition-all duration-300">
                <div class="w-20 h-20 bg-gradient-to-br from-gold-500 to-gold-700 rounded-full flex items-center justify-center mx-auto mb-6 group-hover:shadow-gold-500/20 transition-all duration-300">
                    <svg class="w-10 h-10 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                    </svg>
                </div>
                <h3 class="text-2xl font-semibold text-white mb-4">Envío Rápido</h3>
                <p class="text-silver-300">Entregas en tiempo récord a todo el país con tracking en tiempo real</p>
            </div>

            <div class="text-center group p-6 bg-black rounded-xl border border-gray-800 hover:border-gold-500/30 transition-all duration-300">
                <div class="w-20 h-20 bg-gradient-to-br from-gold-500 to-gold-700 rounded-full flex items-center justify-center mx-auto mb-6 group-hover:shadow-gold-500/20 transition-all duration-300">
                    <svg class="w-10 h-10 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192L5.636 18.364M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"></path>
                    </svg>
                </div>
                <h3 class="text-2xl font-semibold text-white mb-4">Atención 24/7</h3>
                <p class="text-silver-300">Soporte constante por WhatsApp para resolver todas tus dudas</p>
            </div>
        </div>
    </div>
</section>
-->

<!-- Categories Section -->
<!--
@if($categories->count() > 0)
<section class="py-20 bg-black">
    <div class="container mx-auto px-4">
        <div class="text-center mb-16">
            <h2 class="text-3xl lg:text-4xl font-bold text-white mb-4">
                Nuestras <span class="text-gold-400">Categorías</span>
            </h2>
            <p class="text-xl text-silver-300 max-w-2xl mx-auto">
                Encontrá exactamente lo que buscás en nuestras categorías especializadas
            </p>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-6">
            @foreach($categories as $category)
                <a href="{{ route('shop', ['category' => $category->slug]) }}" 
                   class="group text-center p-6 rounded-xl bg-gray-900 border border-gray-800 hover:border-gold-500/30 transition-all duration-300 hover:shadow-gold-500/10">
                    <div class="w-16 h-16 mx-auto mb-4 rounded-full bg-gradient-to-r from-gold-600 to-gold-400 flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                        <span class="text-black font-bold text-xl">
                            {{ substr($category->name, 0, 1) }}
                        </span>
                    </div>
                    <h3 class="font-semibold text-silver-300 group-hover:text-gold-400 transition-colors">
                        {{ $category->name }}
                    </h3>
                </a>
            @endforeach
        </div>
    </div>
</section>
@endif
-->

<!-- New Products Section -->
<!--
@if($newProducts->count() > 0)
<section class="py-20 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="text-center mb-16">
            <h2 class="font-heading text-4xl lg:text-5xl font-bold text-lunaticos-black mb-4">
                Últimos Arribos
            </h2>
            <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                Las últimas novedades que llegaron a nuestra tienda
            </p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
            @foreach($newProducts as $product)
                <div class="product-card relative group">
                    <div class="aspect-square overflow-hidden rounded-t-xl">
                        <img src="{{ $product->main_image }}" 
                             alt="{{ $product->name }}" 
                             class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        
                        <div class="absolute top-4 left-4 bg-lunaticos-green text-white px-3 py-1 rounded-full text-sm font-semibold">
                            Nuevo
                        </div>
                    </div>
                    
                    <div class="p-6">
                        <div class="text-sm text-lunaticos-green font-medium mb-2">
                            {{ $product->category->name }}
                        </div>
                        <h3 class="font-heading text-xl font-semibold text-lunaticos-black mb-3 group-hover:text-lunaticos-red transition-colors">
                            {{ $product->name }}
                        </h3>
                        
                        <div class="text-lunaticos-black text-lg font-bold mb-4">
                            ${{ number_format($product->current_price, 0, ',', '.') }}
                        </div>
                        
                        <a href="{{ route('product.show', $product->slug) }}" 
                           class="w-full btn-primary text-center block">
                            Ver Producto
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif
-->

<!-- CTA Section -->
<section class="stadium-bg py-20">
    <div class="container mx-auto px-4 text-center">
        <h2 class="font-heading text-4xl lg:text-5xl font-bold text-white mb-6">
            ¿Listo para jugar como un profesional?
        </h2>
        <p class="text-xl text-gray-300 mb-8 max-w-2xl mx-auto">
            Descubrí toda nuestra colección y encontrá el equipamiento perfecto para tu próximo partido
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ route('shop') }}" class="elegant-button text-lg px-8 py-3 mr-4">
                Explorar Colección
            </a>
            <a href="{{ route('whatsapp') }}" class="elegant-button-silver text-lg px-8 py-3">
                Contactar Asesor
            </a>
        </div>
    </div>
@endsection

@push('scripts')
<script>
    // Scroll animations
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animate-slide-up');
            }
        });
    }, observerOptions);

    // Observe all product cards
    document.querySelectorAll('.product-card').forEach(card => {
        observer.observe(card);
    });
</script>
@endpush
