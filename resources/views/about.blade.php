@extends('layouts.app')

@section('title', 'Nosotros - Lunáticos Indumentaria Deportiva')
@section('description', 'Conoce la historia de la familia Luna: Carlos, Estela y Gaby. Una familia apasionada por el deporte que trae la mejor indumentaria deportiva a Ushuaia.')

@section('content')
<div class="bg-black min-h-screen">
    <div class="container mx-auto px-4 py-16">
        <!-- Header Section -->
        <div class="text-center mb-16">
            <h1 class="text-4xl lg:text-5xl font-bold text-white mb-6">
                Nuestra <span class="text-gold-400">Historia</span>
            </h1>
            <p class="text-xl text-silver-300 max-w-3xl mx-auto">
                Somos la familia Luna, una familia apasionada por el deporte que desde Ushuaia lleva la mejor indumentaria deportiva al fin del mundo.
            </p>
        </div>

        <!-- Family Story Section -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 mb-16">
            <div class="space-y-6">
                <h2 class="text-3xl font-bold text-white mb-6">
                    Una Familia, Una <span class="text-gold-400">Pasión</span>
                </h2>
                <p class="text-silver-300 leading-relaxed">
                    En el corazón de Ushuaia, la ciudad más austral del mundo, nace Lunáticos. 
                    Somos <strong class="text-white">Carlos</strong>, <strong class="text-white">Estela</strong> 
                    y <strong class="text-white">Gaby Luna</strong>, una familia unida por el amor al deporte y la pasión por ofrecer la mejor indumentaria deportiva.
                </p>
                <p class="text-silver-300 leading-relaxed">
                    Desde nuestros inicios, entendimos que cada camiseta, cada par de zapatillas, cada accesorio deportivo 
                    no es solo un producto, sino una herramienta que acompaña sueños, metas y momentos únicos en la vida de cada deportista.
                </p>
                <p class="text-silver-300 leading-relaxed">
                    <strong class="text-gold-400">Gaby Luna</strong>, nuestro hijo, representa la nueva generación de Lunáticos. 
                    Con su energía y conocimiento del deporte moderno, aporta frescura e innovación a nuestro negocio familiar.
                </p>
            </div>
            
            <div class="bg-gray-900 rounded-xl p-8 border border-gray-800">
                <div class="text-center mb-6">
                    <div class="w-24 h-24 bg-gradient-to-br from-gold-500 to-gold-600 rounded-full flex items-center justify-center mx-auto mb-4">
                        <span class="text-black font-bold text-2xl">L</span>
                    </div>
                    <h3 class="text-2xl font-bold text-white">Familia Luna</h3>
                    <p class="text-silver-400">Fundadores de Lunáticos</p>
                </div>
                
                <div class="space-y-4">
                    <div class="flex items-center p-3 bg-gray-800 rounded-lg">
                        <div class="w-12 h-12 bg-blue-600 rounded-full flex items-center justify-center mr-4">
                            <span class="text-white font-bold">C</span>
                        </div>
                        <div>
                            <p class="text-white font-semibold">Carlos Luna</p>
                            <p class="text-silver-400 text-sm">Fundador y visionario</p>
                        </div>
                    </div>
                    
                    <div class="flex items-center p-3 bg-gray-800 rounded-lg">
                        <div class="w-12 h-12 bg-purple-600 rounded-full flex items-center justify-center mr-4">
                            <span class="text-white font-bold">E</span>
                        </div>
                        <div>
                            <p class="text-white font-semibold">Estela Luna</p>
                            <p class="text-silver-400 text-sm">Co-fundadora y gestión</p>
                        </div>
                    </div>
                    
                    <div class="flex items-center p-3 bg-gray-800 rounded-lg">
                        <div class="w-12 h-12 bg-green-600 rounded-full flex items-center justify-center mr-4">
                            <span class="text-white font-bold">G</span>
                        </div>
                        <div>
                            <p class="text-white font-semibold">Gaby Luna</p>
                            <p class="text-silver-400 text-sm">Nueva generación</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Values Section -->
        <div class="mb-16">
            <h2 class="text-3xl font-bold text-white text-center mb-12">
                Nuestros <span class="text-gold-400">Valores</span>
            </h2>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="text-center group">
                    <div class="w-16 h-16 bg-gradient-to-br from-gold-500 to-gold-600 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-8 h-8 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-3">Pasión por el Deporte</h3>
                    <p class="text-silver-300">
                        Cada producto que ofrecemos está elegido con la pasión de verdaderos amantes del deporte.
                    </p>
                </div>
                
                <div class="text-center group">
                    <div class="w-16 h-16 bg-gradient-to-br from-gold-500 to-gold-600 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-8 h-8 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-3">Calidad Garantizada</h3>
                    <p class="text-silver-300">
                        Seleccionamos cuidadosamente cada producto para asegurar la máxima calidad y durabilidad.
                    </p>
                </div>
                
                <div class="text-center group">
                    <div class="w-16 h-16 bg-gradient-to-br from-gold-500 to-gold-600 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-8 h-8 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-3">Atención Familiar</h3>
                    <p class="text-silver-300">
                        Tratamos a cada cliente como parte de nuestra familia, con calidez y dedicación personal.
                    </p>
                </div>
            </div>
        </div>

        <!-- Location Section -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 mb-16">
            <div>
                <h2 class="text-3xl font-bold text-white mb-6">
                    Ubicados en el <span class="text-gold-400">Fin del Mundo</span>
                </h2>
                <p class="text-silver-300 leading-relaxed mb-6">
                    Desde <strong class="text-white">Ushuaia, Tierra del Fuego</strong>, llevamos la pasión por el deporte 
                    a cada rincón de la Patagonia. Nuestra ubicación estratégica nos permite servir tanto a la comunidad local 
                    como a los visitantes que llegan al fin del mundo.
                </p>
                
                <div class="space-y-4">
                    <div class="flex items-center">
                        <svg class="w-6 h-6 text-gold-400 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                        <span class="text-silver-300">Cjal. Rubinos del Río 191, Ushuaia</span>
                    </div>
                    
                    <div class="flex items-center">
                        <svg class="w-6 h-6 text-gold-400 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                        </svg>
                        <span class="text-silver-300">02901 50-5599</span>
                    </div>
                    
                    <div class="flex items-center">
                        <svg class="w-6 h-6 text-gold-400 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <span class="text-silver-300">Lun - Sáb: 15:30 - 20:00</span>
                    </div>
                </div>
            </div>
            
            <div class="bg-gray-900 rounded-xl p-6 border border-gray-800">
                <h3 class="text-xl font-bold text-white mb-4">¿Por qué Lunáticos?</h3>
                <div class="space-y-3">
                    <div class="flex items-start">
                        <div class="w-2 h-2 bg-gold-400 rounded-full mt-2 mr-3 flex-shrink-0"></div>
                        <p class="text-silver-300 text-sm">Somos una familia que vive y respira deporte</p>
                    </div>
                    <div class="flex items-start">
                        <div class="w-2 h-2 bg-gold-400 rounded-full mt-2 mr-3 flex-shrink-0"></div>
                        <p class="text-silver-300 text-sm">Conocemos personalmente cada producto que vendemos</p>
                    </div>
                    <div class="flex items-start">
                        <div class="w-2 h-2 bg-gold-400 rounded-full mt-2 mr-3 flex-shrink-0"></div>
                        <p class="text-silver-300 text-sm">Ofrecemos asesoramiento personalizado y honesto</p>
                    </div>
                    <div class="flex items-start">
                        <div class="w-2 h-2 bg-gold-400 rounded-full mt-2 mr-3 flex-shrink-0"></div>
                        <p class="text-silver-300 text-sm">Somos parte de la comunidad deportiva de Ushuaia</p>
                    </div>
                    <div class="flex items-start">
                        <div class="w-2 h-2 bg-gold-400 rounded-full mt-2 mr-3 flex-shrink-0"></div>
                        <p class="text-silver-300 text-sm">Traemos las últimas tendencias al fin del mundo</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Call to Action -->
        <div class="text-center">
            <div class="bg-gradient-to-r from-gray-900 to-black border border-gray-800 rounded-xl p-8">
                <h2 class="text-3xl font-bold text-white mb-4">
                    ¿Listo para ser parte de la familia <span class="text-gold-400">Lunáticos</span>?
                </h2>
                <p class="text-silver-300 mb-6 max-w-2xl mx-auto">
                    Visítanos en nuestra tienda en Ushuaia o explora nuestro catálogo online. 
                    Te aseguramos productos de calidad y el mejor servicio familiar.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="{{ route('shop') }}" class="bg-gold-500 hover:bg-gold-400 text-black font-semibold py-3 px-6 rounded-lg transition-colors">
                        Explorar Tienda
                    </a>
                    <a href="https://maps.app.goo.gl/FDLuGexYXui6NXKX8" target="_blank" class="bg-gray-800 hover:bg-gray-700 text-white border border-gray-700 font-semibold py-3 px-6 rounded-lg transition-colors">
                        Cómo Llegar
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // Intersection Observer for section animations
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '0';
                entry.target.style.transform = 'translateY(30px)';
                entry.target.style.transition = 'opacity 0.8s ease, transform 0.8s ease';
                
                setTimeout(() => {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }, 100);
            }
        });
    }, observerOptions);

    // Observe sections for animation
    document.querySelectorAll('.grid, .text-center, .space-y-6').forEach(section => {
        observer.observe(section);
    });
</script>
@endpush
