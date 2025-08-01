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
                <div class="text-center p-8 bg-white rounded-xl shadow-lg">
                    <div class="w-16 h-16 bg-lunaticos-red rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                        </svg>
                    </div>
                    <h3 class="font-heading text-xl font-semibold text-lunaticos-black mb-4">Pasión</h3>
                    <p class="text-gray-600">
                        Vivimos y respiramos deporte. Cada producto que elegimos refleja nuestro amor genuino por el juego.
                    </p>
                </div>

                <div class="text-center p-8 bg-white rounded-xl shadow-lg">
                    <div class="w-16 h-16 bg-lunaticos-green rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="font-heading text-xl font-semibold text-lunaticos-black mb-4">Calidad</h3>
                    <p class="text-gray-600">
                        No transigimos en calidad. Cada prenda debe superar nuestros estándares antes de llegar a vos.
                    </p>
                </div>

                <div class="text-center p-8 bg-white rounded-xl shadow-lg">
                    <div class="w-16 h-16 bg-lunaticos-gold rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
                        </svg>
                    </div>
                    <h3 class="font-heading text-xl font-semibold text-lunaticos-black mb-4">Comunidad</h3>
                    <p class="text-gray-600">
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

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="text-center">
                    <div class="w-32 h-32 rounded-full bg-gradient-to-r from-lunaticos-red to-lunaticos-green mx-auto mb-6 flex items-center justify-center">
                        <span class="text-white font-heading text-4xl font-bold">MG</span>
                    </div>
                    <h3 class="font-heading text-xl font-semibold text-lunaticos-black mb-2">Martín González</h3>
                    <p class="text-lunaticos-green font-medium mb-3">Fundador & CEO</p>
                    <p class="text-gray-600">
                        Ex jugador amateur con 15 años de experiencia en retail deportivo.
                    </p>
                </div>

                <div class="text-center">
                    <div class="w-32 h-32 rounded-full bg-gradient-to-r from-lunaticos-green to-lunaticos-gold mx-auto mb-6 flex items-center justify-center">
                        <span class="text-white font-heading text-4xl font-bold">LC</span>
                    </div>
                    <h3 class="font-heading text-xl font-semibold text-lunaticos-black mb-2">Laura Castro</h3>
                    <p class="text-lunaticos-green font-medium mb-3">Directora de Ventas</p>
                    <p class="text-gray-600">
                        Especialista en atención al cliente con pasión por el fútbol femenino.
                    </p>
                </div>

                <div class="text-center">
                    <div class="w-32 h-32 rounded-full bg-gradient-to-r from-lunaticos-gold to-lunaticos-red mx-auto mb-6 flex items-center justify-center">
                        <span class="text-white font-heading text-4xl font-bold">DR</span>
                    </div>
                    <h3 class="font-heading text-xl font-semibold text-lunaticos-black mb-2">Diego Rodríguez</h3>
                    <p class="text-lunaticos-green font-medium mb-3">Jefe de Logística</p>
                    <p class="text-gray-600">
                        Garantiza que tus productos lleguen en tiempo y forma a todo el país.
                    </p>
                </div>
            </div>
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
