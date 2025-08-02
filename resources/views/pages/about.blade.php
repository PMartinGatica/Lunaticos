@extends('layouts.app')

@section('title', 'Nosotros - Lunáticos Indumentaria Deportiva')
@section('description', 'Conoce la historia de Lunáticos, nuestra pasión por el deporte y nuestro compromiso con la calidad en indumentaria deportiva.')

@section('content')
<div class="bg-black">
    <!-- Hero Section -->
    <section class="stadium-bg py-20">
        <div class="container mx-auto px-4 text-center">
            <h1 class="font-heading text-4xl lg:text-6xl font-bold text-white mb-6">
                Nuestra Historia
            </h1>
            <p class="text-xl text-gray-300 max-w-3xl mx-auto">
                Somos más que una tienda de indumentaria deportiva. Somos fanáticos del deporte 
                que entienden la pasión de cada jugador.
            </p>
        </div>
    </section>

    <!-- Story Section -->
    <section class="py-20">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div>
                    <h2 class="font-heading text-3xl lg:text-4xl font-bold text-lunaticos-white mb-6">
                        Todo Comenzó con una Pasión
                    </h2>
                    <div class="space-y-4 text-gray-600 text-lg">
                        <p>
                            En el año 2020, un grupo de amigos unidos por la pasión del fútbol decidió 
                            crear algo más que una simple tienda. Queríamos un lugar donde cada deportista 
                            pudiera encontrar no solo productos de calidad, sino también la inspiración 
                            para dar lo mejor de sí.
                        </p>
                        <p>
                            Así nació <strong class="text-lunaticos-red">Lunáticos</strong>, con la misión 
                            de brindar indumentaria deportiva de primera calidad que acompañe a cada atleta 
                            en su camino hacia la excelencia.
                        </p>
                        <p>
                            Hoy, después de años de crecimiento, seguimos siendo esos mismos fanáticos 
                            del primer día, pero con un equipo más grande y la experiencia necesaria 
                            para entender exactamente lo que necesitás.
                        </p>
                    </div>
                </div>
                <div class="relative">
                    <img src="{{ asset('images/about-team.jpg') }}" alt="Equipo Lunáticos" 
                         class="rounded-xl shadow-lg w-full">
                    <div class="absolute -bottom-6 -right-6 w-24 h-24 bg-lunaticos-green rounded-full flex items-center justify-center animate-pulse-glow">
                        <svg class="w-12 h-12 text-white" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Values Section -->
    <section class="py-20 bg-black">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="font-heading text-3xl lg:text-4xl font-bold text-lunaticos-white mb-4">
                    Nuestros Valores
                </h2>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                    Los principios que guían cada decisión que tomamos
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="text-center p-8 bg-gradient-to-br from-gray-900 to-black rounded-xl shadow-2xl border border-gray-800 hover:border-gold-500/50 transition-all duration-300 hover:scale-105 group">
                    <div class="w-20 h-20 bg-gradient-to-br from-red-500 to-red-600 rounded-full flex items-center justify-center mx-auto mb-6 shadow-lg group-hover:shadow-red-500/30 transition-all duration-300">
                        <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                        </svg>
                    </div>
                    <h3 class="font-heading text-xl font-semibold text-white mb-4 group-hover:text-gold-400 transition-colors">Pasión</h3>
                    <p class="text-gray-300 group-hover:text-gray-200 transition-colors">
                        Vivimos y respiramos deporte. Cada producto que elegimos refleja nuestro amor genuino por el juego.
                    </p>
                </div>

                <div class="text-center p-8 bg-gradient-to-br from-gray-900 to-black rounded-xl shadow-2xl border border-gray-800 hover:border-gold-500/50 transition-all duration-300 hover:scale-105 group">
                    <div class="w-20 h-20 bg-gradient-to-br from-green-500 to-green-600 rounded-full flex items-center justify-center mx-auto mb-6 shadow-lg group-hover:shadow-green-500/30 transition-all duration-300">
                        <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="font-heading text-xl font-semibold text-white mb-4 group-hover:text-gold-400 transition-colors">Calidad</h3>
                    <p class="text-gray-300 group-hover:text-gray-200 transition-colors">
                        No transigimos en calidad. Cada prenda debe superar nuestros estándares antes de llegar a vos.
                    </p>
                </div>

                <div class="text-center p-8 bg-gradient-to-br from-gray-900 to-black rounded-xl shadow-2xl border border-gray-800 hover:border-gold-500/50 transition-all duration-300 hover:scale-105 group">
                    <div class="w-20 h-20 bg-gradient-to-br from-gold-400 to-yellow-500 rounded-full flex items-center justify-center mx-auto mb-6 shadow-lg group-hover:shadow-gold-500/30 transition-all duration-300">
                        <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                    </div>
                    <h3 class="font-heading text-xl font-semibold text-white mb-4 group-hover:text-gold-400 transition-colors">Comunidad</h3>
                    <p class="text-gray-300 group-hover:text-gray-200 transition-colors">
                        Creemos en el poder del deporte para unir personas. Somos parte de tu equipo, dentro y fuera de la cancha.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Mission Section -->
    <section class="stadium-bg py-20">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div class="order-2 lg:order-1">
                    <img src="{{ asset('images/mission.jpg') }}" alt="Nuestra Misión" 
                         class="rounded-xl shadow-lg w-full">
                </div>
                <div class="order-1 lg:order-2">
                    <h2 class="font-heading text-3xl lg:text-4xl font-bold text-white mb-6">
                        Nuestra Misión
                    </h2>
                    <div class="space-y-4 text-gray-300 text-lg">
                        <p>
                            Equipar a cada deportista con la indumentaria de máxima calidad que necesita 
                            para alcanzar su mejor versión. No importa si sos un profesional o jugás 
                            los fines de semana con amigos.
                        </p>
                        <p>
                            Queremos ser tu aliado en cada momento importante: desde tu primer partido 
                            hasta tu mayor victoria. Porque entendemos que detrás de cada camiseta hay 
                            una historia, un sueño, una pasión.
                        </p>
                    </div>
                    
                    <div class="grid grid-cols-2 gap-6 mt-8">
                        <div class="text-center">
                            <div class="text-3xl font-bold text-lunaticos-green mb-2">1000+</div>
                            <div class="text-gray-300">Clientes Satisfechos</div>
                        </div>
                        <div class="text-center">
                            <div class="text-3xl font-bold text-lunaticos-green mb-2">5000+</div>
                            <div class="text-gray-300">Productos Vendidos</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Team Section -->
    <section class="py-20 bg-black">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="font-heading text-3xl lg:text-4xl font-bold white-lunaticos-black mb-4">
                    Conocé al Equipo
                </h2>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                    Los fanáticos del deporte que hacen posible Lunáticos cada día
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="text-center group">
                    <div class="relative">
                        <div class="w-40 h-40 rounded-full bg-gradient-to-br from-gray-200 via-gray-100 to-gray-300 mx-auto mb-6 flex items-center justify-center shadow-2xl border-4 border-white group-hover:scale-105 transition-all duration-300">
                            <span class="text-gray-800 font-heading text-5xl font-bold">AL</span>
                        </div>
                        <div class="absolute -top-2 -right-2 w-6 h-6 bg-gold-500 rounded-full flex items-center justify-center">
                            <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                            </svg>
                        </div>
                    </div>
                    <h3 class="font-heading text-2xl font-bold text-white mb-2">Alejandro Luna</h3>
                    <p class="text-gold-400 font-semibold mb-3 text-lg">Papá & Fundador</p>
                    <p class="text-gray-300 text-sm leading-relaxed">
                        El corazón de Lunáticos. Con su experiencia y amor por el deporte, 
                        convirtió un sueño familiar en realidad.
                    </p>
                </div>

                <div class="text-center group">
                    <div class="relative">
                        <div class="w-40 h-40 rounded-full bg-gradient-to-br from-gold-300 via-gold-200 to-yellow-300 mx-auto mb-6 flex items-center justify-center shadow-2xl border-4 border-white group-hover:scale-105 transition-all duration-300">
                            <span class="text-gray-800 font-heading text-5xl font-bold">AV</span>
                        </div>
                        <div class="absolute -top-2 -right-2 w-6 h-6 bg-pink-500 rounded-full flex items-center justify-center">
                            <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
                            </svg>
                        </div>
                    </div>
                    <h3 class="font-heading text-2xl font-bold text-white mb-2">Alejandra Villegas</h3>
                    <p class="text-gold-400 font-semibold mb-3 text-lg">Mamá & Alma de la empresa</p>
                    <p class="text-gray-300 text-sm leading-relaxed">
                        La fuerza que mantiene todo unido. Su calidez y dedicación 
                        se sienten en cada detalle de nuestra atención.
                    </p>
                </div>

                <div class="text-center group">
                    <div class="relative">
                        <div class="w-40 h-40 rounded-full bg-gradient-to-br from-gray-400 via-gray-300 to-gray-500 mx-auto mb-6 flex items-center justify-center shadow-2xl border-4 border-white group-hover:scale-105 transition-all duration-300">
                            <span class="text-white font-heading text-5xl font-bold">GL</span>
                        </div>
                        <div class="absolute -top-2 -right-2 w-6 h-6 bg-blue-500 rounded-full flex items-center justify-center">
                            <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M13 9h-2V7h2m0 10h-2v-6h2m-1-9A10 10 0 0 0 2 12a10 10 0 0 0 10 10 10 10 0 0 0 10-10A10 10 0 0 0 12 2z"/>
                            </svg>
                        </div>
                    </div>
                    <h3 class="font-heading text-2xl font-bold text-white mb-2">Gabriel Luna</h3>
                    <p class="text-gold-400 font-semibold mb-3 text-lg">Hijo & Nueva generación</p>
                    <p class="text-gray-300 text-sm leading-relaxed">
                        Trae ideas frescas y energía joven. Representa el futuro 
                        de Lunáticos sin perder la esencia familiar.
                    </p>
                </div>
            </div>

            <!-- Family Message -->
            <!-- <div class="mt-16 text-center bg-gradient-to-r from-gray-900 to-black rounded-2xl p-8 border border-gray-800">
                <h3 class="text-2xl font-bold text-gold-400 mb-4">Somos Familia, Como Vos</h3>
                <p class="text-gray-300 text-lg max-w-3xl mx-auto leading-relaxed">
                    No somos una gran corporación. Somos una familia de Ushuaia que ama el deporte 
                    tanto como vos. Cada producto que elegimos, cada cliente que atendemos, 
                    lo hacemos con el corazón. <span class="text-gold-400 font-semibold">Porque entendemos que detrás de cada camiseta 
                    hay una historia, un sueño, una pasión.</span>
                </p>
                <div class="mt-6 flex justify-center">
                    <div class="bg-gold-500 text-black px-6 py-2 rounded-full font-semibold">
                        🏠 Familia Luna - Desde Ushuaia para todo el país
                    </div>
                </div>
            </div> -->
        </div>
    </section>

    <!-- CTA Section -->
    <section class="stadium-bg py-20">
        <div class="container mx-auto px-4 text-center">
            <h2 class="font-heading text-3xl lg:text-4xl font-bold text-white mb-6">
                ¿Listo para Formar Parte de la Familia?
            </h2>
            <p class="text-xl text-gray-300 mb-8 max-w-2xl mx-auto">
                Sumate a miles de deportistas que ya confían en Lunáticos para equiparse
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('shop') }}" class="btn-primary text-lg px-8 py-4">
                    Explorar Productos
                </a>
                <a href="{{ route('contact') }}" class="btn-outline text-lg px-8 py-4">
                    Contactanos
                </a>
            </div>
        </div>
    </section>
</div>
@endsection
