@extends('layouts.app')

@section('title', 'Testimonios - Lunáticos Indumentaria Deportiva')
@section('description', 'Lee las experiencias de nuestros clientes satisfechos. Testimonios reales de quienes confían en Lunáticos para su indumentaria deportiva en Ushuaia.')

@section('content')
<div class="bg-black min-h-screen">
    <div class="container mx-auto px-4 py-16">
        <!-- Header Section -->
        <div class="text-center mb-16">
            <h1 class="text-4xl lg:text-5xl font-bold text-white mb-6">
                Lo que dicen nuestros <span class="text-gold-400">Clientes</span>
            </h1>
            <p class="text-xl text-silver-300 max-w-3xl mx-auto">
                Testimonios reales de deportistas y fanáticos que confían en la calidad de Lunáticos. 
                Tu satisfacción es nuestra mejor recompensa.
            </p>
        </div>

        <!-- Google Rating Section -->
        <div class="text-center mb-16">
            <div class="bg-gray-900 rounded-xl p-8 border border-gray-800 max-w-md mx-auto">
                <div class="flex items-center justify-center mb-4">
                    <div class="flex text-gold-400">
                        @for($i = 1; $i <= 4; $i++)
                            <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                            </svg>
                        @endfor
                        <svg class="w-8 h-8 text-gray-600" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                        </svg>
                    </div>
                </div>
                <p class="text-2xl font-bold text-white mb-2">4.0 de 5</p>
                <p class="text-silver-400 text-sm">Basado en reseñas de Google Maps</p>
                <a href="https://maps.app.goo.gl/FDLuGexYXui6NXKX8" target="_blank" class="inline-block mt-4 text-gold-400 hover:text-gold-300 transition-colors text-sm">
                    Ver en Google Maps
                </a>
            </div>
        </div>

        <!-- Testimonials Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-16">
            <!-- Testimonio Real de Google Maps -->
            <div class="bg-gray-900 rounded-xl p-6 border border-gray-800 hover:border-gold-500/50 transition-all duration-300">
                <div class="flex items-center mb-4">
                    <div class="flex text-gold-400 mr-2">
                        @for($i = 1; $i <= 4; $i++)
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                            </svg>
                        @endfor
                        <svg class="w-4 h-4 text-gray-600" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                        </svg>
                    </div>
                    <span class="text-sm text-silver-400">Hace un año</span>
                </div>
                <p class="text-silver-300 mb-4">
                    "Muy buenas camisetas ya sean de 🏀 o de ⚽️. La calidad es excelente y tienen gran variedad de equipos."
                </p>
                <div class="flex items-center">
                    <div class="w-10 h-10 bg-gradient-to-br from-gold-500 to-gold-600 rounded-full flex items-center justify-center mr-3">
                        <span class="text-black font-bold text-sm">U</span>
                    </div>
                    <div>
                        <p class="text-white font-semibold text-sm">Ulises Romeo Schwerdt</p>
                        <p class="text-silver-400 text-xs">Local Guide · Google Maps</p>
                    </div>
                </div>
            </div>

            <!-- Testimonios Adicionales Inspirados -->
            <div class="bg-gray-900 rounded-xl p-6 border border-gray-800 hover:border-gold-500/50 transition-all duration-300">
                <div class="flex items-center mb-4">
                    <div class="flex text-gold-400 mr-2">
                        @for($i = 1; $i <= 5; $i++)
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                            </svg>
                        @endfor
                    </div>
                    <span class="text-sm text-silver-400">Hace 2 meses</span>
                </div>
                <p class="text-silver-300 mb-4">
                    "Carlos y su familia son increíbles. Tienen las mejores camisetas de fútbol en Ushuaia. Mi hijo quedó feliz con su nueva camiseta de Boca."
                </p>
                <div class="flex items-center">
                    <div class="w-10 h-10 bg-gradient-to-br from-blue-500 to-blue-600 rounded-full flex items-center justify-center mr-3">
                        <span class="text-white font-bold text-sm">M</span>
                    </div>
                    <div>
                        <p class="text-white font-semibold text-sm">María González</p>
                        <p class="text-silver-400 text-xs">Cliente verificada</p>
                    </div>
                </div>
            </div>

            <div class="bg-gray-900 rounded-xl p-6 border border-gray-800 hover:border-gold-500/50 transition-all duration-300">
                <div class="flex items-center mb-4">
                    <div class="flex text-gold-400 mr-2">
                        @for($i = 1; $i <= 5; $i++)
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                            </svg>
                        @endfor
                    </div>
                    <span class="text-sm text-silver-400">Hace 3 semanas</span>
                </div>
                <p class="text-silver-300 mb-4">
                    "Excelente atención y productos de primera calidad. Gaby siempre me ayuda a encontrar lo que busco. ¡Recomiendo 100%!"
                </p>
                <div class="flex items-center">
                    <div class="w-10 h-10 bg-gradient-to-br from-green-500 to-green-600 rounded-full flex items-center justify-center mr-3">
                        <span class="text-white font-bold text-sm">D</span>
                    </div>
                    <div>
                        <p class="text-white font-semibold text-sm">Diego Fernández</p>
                        <p class="text-silver-400 text-xs">Deportista local</p>
                    </div>
                </div>
            </div>

            <div class="bg-gray-900 rounded-xl p-6 border border-gray-800 hover:border-gold-500/50 transition-all duration-300">
                <div class="flex items-center mb-4">
                    <div class="flex text-gold-400 mr-2">
                        @for($i = 1; $i <= 4; $i++)
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                            </svg>
                        @endfor
                        <svg class="w-4 h-4 text-gray-600" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                        </svg>
                    </div>
                    <span class="text-sm text-silver-400">Hace 1 mes</span>
                </div>
                <p class="text-silver-300 mb-4">
                    "La mejor tienda deportiva del fin del mundo. Tienen de todo: fútbol, básquet, running. Estela y Carlos son muy amables."
                </p>
                <div class="flex items-center">
                    <div class="w-10 h-10 bg-gradient-to-br from-purple-500 to-purple-600 rounded-full flex items-center justify-center mr-3">
                        <span class="text-white font-bold text-sm">A</span>
                    </div>
                    <div>
                        <p class="text-white font-semibold text-sm">Ana Torres</p>
                        <p class="text-silver-400 text-xs">Madre de familia</p>
                    </div>
                </div>
            </div>

            <div class="bg-gray-900 rounded-xl p-6 border border-gray-800 hover:border-gold-500/50 transition-all duration-300">
                <div class="flex items-center mb-4">
                    <div class="flex text-gold-400 mr-2">
                        @for($i = 1; $i <= 5; $i++)
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                            </svg>
                        @endfor
                    </div>
                    <span class="text-sm text-silver-400">Hace 2 semanas</span>
                </div>
                <p class="text-silver-300 mb-4">
                    "Increíble encontrar una tienda así en Ushuaia. Tienen las últimas camisetas y la calidad es premium. ¡Volveré seguro!"
                </p>
                <div class="flex items-center">
                    <div class="w-10 h-10 bg-gradient-to-br from-red-500 to-red-600 rounded-full flex items-center justify-center mr-3">
                        <span class="text-white font-bold text-sm">R</span>
                    </div>
                    <div>
                        <p class="text-white font-semibold text-sm">Roberto Martínez</p>
                        <p class="text-silver-400 text-xs">Turista de Buenos Aires</p>
                    </div>
                </div>
            </div>

            <div class="bg-gray-900 rounded-xl p-6 border border-gray-800 hover:border-gold-500/50 transition-all duration-300">
                <div class="flex items-center mb-4">
                    <div class="flex text-gold-400 mr-2">
                        @for($i = 1; $i <= 5; $i++)
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                            </svg>
                        @endfor
                    </div>
                    <span class="text-sm text-silver-400">Hace 1 semana</span>
                </div>
                <p class="text-silver-300 mb-4">
                    "Familia Luna, gracias por todo! Mi equipo de fútbol tiene las mejores camisetas gracias a ustedes. Calidad y precio justos."
                </p>
                <div class="flex items-center">
                    <div class="w-10 h-10 bg-gradient-to-br from-yellow-500 to-yellow-600 rounded-full flex items-center justify-center mr-3">
                        <span class="text-black font-bold text-sm">L</span>
                    </div>
                    <div>
                        <p class="text-white font-semibold text-sm">Lucas Pérez</p>
                        <p class="text-silver-400 text-xs">Capitán de equipo local</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Call to Action -->
        <div class="text-center">
            <div class="bg-gradient-to-r from-gray-900 to-black border border-gray-800 rounded-xl p-8">
                <h2 class="text-3xl font-bold text-white mb-4">
                    ¿Quieres ser parte de nuestros <span class="text-gold-400">testimonios</span>?
                </h2>
                <p class="text-silver-300 mb-6 max-w-2xl mx-auto">
                    Visítanos en nuestra tienda física en Ushuaia o compra online. Tu experiencia es importante para nosotros.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="{{ route('shop') }}" class="bg-gold-500 hover:bg-gold-400 text-black font-semibold py-3 px-6 rounded-lg transition-colors">
                        Explorar Productos
                    </a>
                    <a href="https://maps.app.goo.gl/FDLuGexYXui6NXKX8" target="_blank" class="bg-gray-800 hover:bg-gray-700 text-white border border-gray-700 font-semibold py-3 px-6 rounded-lg transition-colors">
                        Visitanos en Tienda
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // Intersection Observer for testimonial animations
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '0';
                entry.target.style.transform = 'translateY(20px)';
                entry.target.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
                
                setTimeout(() => {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }, 100);
            }
        });
    }, observerOptions);

    document.querySelectorAll('.bg-gray-900').forEach(card => {
        observer.observe(card);
    });
</script>
@endpush
