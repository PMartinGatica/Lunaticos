@extends('layouts.app')

@section('title', 'Nosotros - Lunáticos Indumentaria Deportiva')
@section('description', 'Conoce la historia de Carlos, Estela y su hijo Gaby Luna, una familia de Ushuaia apasionada por el deporte y la indumentaria deportiva.')

@section('content')
<div class="bg-black min-h-screen">
    <!-- Hero Section -->
    <section class="py-16 lg:py-24">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h1 class="text-4xl lg:text-6xl font-bold text-white mb-6">
                    Nuestra <span class="text-gold-400">Historia</span>
                </h1>
                <p class="text-xl text-silver-300 max-w-3xl mx-auto">
                    Una familia de Ushuaia apasionada por el deporte y comprometida con ofrecerte la mejor indumentaria deportiva
                </p>
            </div>

            <!-- Family Story Section -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center mb-20">
                <div class="order-2 lg:order-1">
                    <h2 class="text-3xl lg:text-4xl font-bold text-white mb-6">
                        La Familia <span class="text-gold-400">Luna</span>
                    </h2>
                    <div class="space-y-6 text-lg text-silver-300 leading-relaxed">
                        <p>
                            En el corazón de Ushuaia, la ciudad más austral del mundo, nació Lunáticos Indumentaria Deportiva. 
                            Somos <strong class="text-white">Carlos, Estela y nuestro hijo Gaby Luna</strong>, una familia unida por 
                            la pasión por el deporte y el deseo de brindar productos de calidad excepcional.
                        </p>
                        <p>
                            Desde pequeño, <strong class="text-gold-400">Gaby</strong> demostró un amor incondicional por el fútbol. 
                            Viendo su pasión y la de tantos jóvenes en nuestra comunidad, decidimos crear algo especial: 
                            un lugar donde cada deportista pudiera encontrar la indumentaria perfecta para expresar su pasión.
                        </p>
                        <p>
                            Nuestra historia comenzó como un sueño familiar y hoy es una realidad que nos enorgullece. 
                            Cada producto que ofrecemos lleva el sello de nuestra dedicación y el amor por lo que hacemos.
                        </p>
                    </div>
                </div>
                <div class="order-1 lg:order-2">
                    <div class="relative">
                        <div class="bg-gradient-to-br from-gold-500/20 to-silver-500/20 rounded-2xl p-8 border border-gray-800">
                            <img src="{{ asset('images/familia-luna.jpg') }}" 
                                 alt="Familia Luna - Carlos, Estela y Gaby" 
                                 class="w-full h-80 lg:h-96 object-cover rounded-xl"
                                 onerror="this.src='https://via.placeholder.com/600x400/111111/666666?text=Familia+Luna'">
                        </div>
                        <div class="absolute -bottom-6 -right-6 bg-gold-500 text-black p-4 rounded-xl font-bold text-lg">
                            Desde Ushuaia 🏔️
                        </div>
                    </div>
                </div>
            </div>

            <!-- Values Section -->
            <div class="mb-20">
                <h2 class="text-3xl lg:text-4xl font-bold text-white text-center mb-12">
                    Nuestros <span class="text-gold-400">Valores</span>
                </h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div class="bg-gray-900 rounded-xl p-8 border border-gray-800 text-center group hover:border-gold-500/50 transition-all duration-300">
                        <div class="w-16 h-16 bg-gradient-to-br from-gold-500 to-gold-600 rounded-full flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform">
                            <svg class="w-8 h-8 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-white mb-4">Pasión</h3>
                        <p class="text-silver-300">
                            Vivimos y respiramos deporte. Cada producto refleja nuestra pasión genuina por el mundo deportivo.
                        </p>
                    </div>

                    <div class="bg-gray-900 rounded-xl p-8 border border-gray-800 text-center group hover:border-gold-500/50 transition-all duration-300">
                        <div class="w-16 h-16 bg-gradient-to-br from-gold-500 to-gold-600 rounded-full flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform">
                            <svg class="w-8 h-8 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-white mb-4">Calidad</h3>
                        <p class="text-silver-300">
                            Seleccionamos cuidadosamente cada producto para garantizar la máxima calidad y durabilidad.
                        </p>
                    </div>

                    <div class="bg-gray-900 rounded-xl p-8 border border-gray-800 text-center group hover:border-gold-500/50 transition-all duration-300">
                        <div class="w-16 h-16 bg-gradient-to-br from-gold-500 to-gold-600 rounded-full flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform">
                            <svg class="w-8 h-8 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-white mb-4">Familia</h3>
                        <p class="text-silver-300">
                            Tratamos a cada cliente como parte de nuestra familia, brindando atención personalizada y cercana.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Team Section -->
            <div class="mb-20">
                <h2 class="text-3xl lg:text-4xl font-bold text-white text-center mb-12">
                    Conoce al <span class="text-gold-400">Equipo</span>
                </h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <!-- Carlos -->
                    <div class="bg-gray-900 rounded-xl overflow-hidden border border-gray-800 group hover:border-gold-500/50 transition-all duration-300">
                        <div class="relative h-80">
                            <img src="{{ asset('images/carlos-luna.jpg') }}" 
                                 alt="Carlos Luna" 
                                 class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300"
                                 onerror="this.src='https://via.placeholder.com/400x400/111111/666666?text=Carlos+Luna'">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent"></div>
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-white mb-2">Carlos Luna</h3>
                            <p class="text-gold-400 font-medium mb-3">Fundador & Director</p>
                            <p class="text-silver-300 text-sm">
                                Apasionado por el deporte desde siempre, Carlos lidera la visión estratégica de Lunáticos 
                                con más de 20 años de experiencia en el sector deportivo.
                            </p>
                        </div>
                    </div>

                    <!-- Estela -->
                    <div class="bg-gray-900 rounded-xl overflow-hidden border border-gray-800 group hover:border-gold-500/50 transition-all duration-300">
                        <div class="relative h-80">
                            <img src="{{ asset('images/estela-luna.jpg') }}" 
                                 alt="Estela Luna" 
                                 class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300"
                                 onerror="this.src='https://via.placeholder.com/400x400/111111/666666?text=Estela+Luna'">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent"></div>
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-white mb-2">Estela Luna</h3>
                            <p class="text-gold-400 font-medium mb-3">Co-fundadora & Operaciones</p>
                            <p class="text-silver-300 text-sm">
                                El corazón operativo de la empresa. Estela se encarga de que cada cliente reciba 
                                la mejor atención y que todos los procesos funcionen a la perfección.
                            </p>
                        </div>
                    </div>

                    <!-- Gaby -->
                    <div class="bg-gray-900 rounded-xl overflow-hidden border border-gray-800 group hover:border-gold-500/50 transition-all duration-300">
                        <div class="relative h-80">
                            <img src="{{ asset('images/gaby-luna.jpg') }}" 
                                 alt="Gaby Luna" 
                                 class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300"
                                 onerror="this.src='https://via.placeholder.com/400x400/111111/666666?text=Gaby+Luna'">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent"></div>
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-white mb-2">Gaby Luna</h3>
                            <p class="text-gold-400 font-medium mb-3">Director de Innovación</p>
                            <p class="text-silver-300 text-sm">
                                La nueva generación de Lunáticos. Gaby aporta frescura, innovación y una perspectiva 
                                joven que conecta con las últimas tendencias deportivas.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Location Section -->
            <div class="bg-gray-900 rounded-2xl p-8 lg:p-12 border border-gray-800">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                    <div>
                        <h2 class="text-3xl lg:text-4xl font-bold text-white mb-6">
                            Desde <span class="text-gold-400">Ushuaia</span>
                        </h2>
                        <div class="space-y-4 text-lg text-silver-300">
                            <p>
                                Ubicados en la ciudad más austral del mundo, en Ushuaia, Tierra del Fuego, 
                                llevamos la pasión patagónica por el deporte a cada rincón del país.
                            </p>
                            <p>
                                Desde nuestra tierra de montañas, glaciares y vientos australes, 
                                entendemos la importancia de contar con indumentaria que resista 
                                y acompañe en cualquier aventura deportiva.
                            </p>
                        </div>
                        <div class="mt-8 flex items-center space-x-4">
                            <div class="flex items-center text-gold-400">
                                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/>
                                </svg>
                                <span class="font-medium">Ushuaia, Tierra del Fuego</span>
                            </div>
                        </div>
                    </div>
                    <div class="relative">
                        <div class="bg-gradient-to-br from-gold-500/20 to-silver-500/20 rounded-xl p-6 border border-gray-800">
                            <img src="{{ asset('images/ushuaia-landscape.jpg') }}" 
                                 alt="Paisaje de Ushuaia" 
                                 class="w-full h-64 lg:h-80 object-cover rounded-lg"
                                 onerror="this.src='https://via.placeholder.com/600x400/111111/666666?text=Ushuaia+Paisaje'">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="py-16 bg-gradient-to-r from-gray-900 to-black border-t border-gray-800">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-3xl lg:text-4xl font-bold text-white mb-6">
                ¿Listo para ser parte de la familia <span class="text-gold-400">Lunáticos</span>?
            </h2>
            <p class="text-xl text-silver-300 mb-8 max-w-2xl mx-auto">
                Descubre nuestra colección completa y encuentra la indumentaria deportiva perfecta para ti
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('shop') }}" class="bg-gold-500 hover:bg-gold-400 text-black font-bold py-3 px-8 rounded-lg transition-colors">
                    Ver Productos
                </a>
                <a href="{{ route('contact') }}" class="bg-gray-800 hover:bg-gray-700 text-white border border-gray-700 font-bold py-3 px-8 rounded-lg transition-colors">
                    Contáctanos
                </a>
            </div>
        </div>
    </section>
</div>
@endsection

@push('scripts')
<script>
    // Intersection Observer for animations
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animate-fade-in');
            }
        });
    }, observerOptions);

    // Observe team cards and value cards
    document.querySelectorAll('.group').forEach(card => {
        observer.observe(card);
    });
</script>
@endpush
