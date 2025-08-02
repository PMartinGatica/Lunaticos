@extends('layouts.app')

@section('title', 'Términos y Condiciones - Lunáticos Indumentaria Deportiva')
@section('description', 'Términos y condiciones de uso de Lunáticos. Conoce nuestras políticas de compra, envío y devoluciones.')

@section('content')
<div class="bg-black min-h-screen">
    <!-- Hero Section -->
    <section class="stadium-bg py-20">
        <div class="container mx-auto px-4 text-center">
            <h1 class="font-heading text-4xl lg:text-6xl font-bold text-white mb-6">
                Términos y Condiciones
            </h1>
            <p class="text-xl text-gray-300 max-w-3xl mx-auto">
                Conoce nuestros términos de uso y condiciones de compra para una experiencia transparente y segura.
            </p>
        </div>
    </section>

    <!-- Content Section -->
    <section class="py-16 bg-black">
        <div class="container mx-auto px-4 max-w-4xl">
            <div class="bg-gradient-to-br from-gray-900 to-black rounded-2xl p-8 border border-gray-800 shadow-2xl">
                
                <!-- Última actualización -->
                <div class="mb-8 text-center">
                    <p class="text-gray-400 text-sm">
                        <span class="font-semibold text-gold-400">Última actualización:</span> 2 de Agosto de 2025
                    </p>
                </div>

                <!-- Introducción -->
                <div class="mb-8">
                    <h2 class="text-2xl font-bold text-gold-400 mb-4">1. Introducción</h2>
                    <p class="text-gray-300 leading-relaxed">
                        Bienvenido a <span class="text-gold-400 font-semibold">Lunáticos</span>, una empresa familiar dedicada a la venta de indumentaria deportiva. 
                        Al acceder y utilizar nuestro sitio web, aceptas cumplir con estos términos y condiciones. 
                        Si no estás de acuerdo con alguno de estos términos, te pedimos que no utilices nuestros servicios.
                    </p>
                </div>

                <!-- Información de la empresa -->
                <div class="mb-8">
                    <h2 class="text-2xl font-bold text-gold-400 mb-4">2. Información de la Empresa</h2>
                    <div class="text-gray-300 space-y-2">
                        <p><span class="font-semibold text-white">Razón Social:</span> Familia Luna - Lunáticos</p>
                        <p><span class="font-semibold text-white">Ubicación:</span> Ushuaia, Tierra del Fuego, Argentina</p>
                        <p><span class="font-semibold text-white">Propietarios:</span> Alejandro Luna, Alejandra Villegas y Gabriel Luna</p>
                        <p><span class="font-semibold text-white">Contacto:</span> Disponible a través de WhatsApp y redes sociales</p>
                    </div>
                </div>

                <!-- Productos y servicios -->
                <div class="mb-8">
                    <h2 class="text-2xl font-bold text-gold-400 mb-4">3. Productos y Servicios</h2>
                    <div class="text-gray-300 space-y-4">
                        <p>Ofrecemos indumentaria deportiva de alta calidad, incluyendo:</p>
                        <ul class="list-disc list-inside space-y-2 ml-4">
                            <li>Camisetas de fútbol oficiales y réplicas</li>
                            <li>Pantalones y shorts deportivos</li>
                            <li>Calzado deportivo</li>
                            <li>Accesorios deportivos</li>
                            <li>Equipaciones completas</li>
                        </ul>
                        <p>Todos nuestros productos pasan por un control de calidad antes de ser enviados.</p>
                    </div>
                </div>

                <!-- Precios y pagos -->
                <div class="mb-8">
                    <h2 class="text-2xl font-bold text-gold-400 mb-4">4. Precios y Métodos de Pago</h2>
                    <div class="text-gray-300 space-y-4">
                        <p>Los precios están expresados en pesos argentinos (ARS) e incluyen IVA cuando corresponda.</p>
                        <h3 class="text-lg font-semibold text-white mt-4 mb-2">Métodos de pago aceptados:</h3>
                        <ul class="list-disc list-inside space-y-2 ml-4">
                            <li>MercadoPago (tarjetas de crédito y débito)</li>
                            <li>Transferencia bancaria</li>
                            <li>Efectivo (solo en entregas presenciales en Ushuaia)</li>
                        </ul>
                        <p class="text-yellow-400 bg-yellow-900/20 p-3 rounded-lg">
                            <strong>Importante:</strong> Los precios pueden variar sin previo aviso. El precio válido será el vigente al momento de la confirmación de la compra.
                        </p>
                    </div>
                </div>

                <!-- Envíos -->
                <div class="mb-8">
                    <h2 class="text-2xl font-bold text-gold-400 mb-4">5. Envíos y Entregas</h2>
                    <div class="text-gray-300 space-y-4">
                        <h3 class="text-lg font-semibold text-white">Cobertura:</h3>
                        <p>Realizamos envíos a todo el territorio argentino.</p>
                        
                        <h3 class="text-lg font-semibold text-white mt-4">Tiempos de entrega:</h3>
                        <ul class="list-disc list-inside space-y-2 ml-4">
                            <li><strong>Ushuaia:</strong> 1-2 días hábiles</li>
                            <li><strong>Patagonia:</strong> 3-5 días hábiles</li>
                            <li><strong>Resto del país:</strong> 5-7 días hábiles</li>
                        </ul>
                        
                        <p class="text-blue-400 bg-blue-900/20 p-3 rounded-lg">
                            Los tiempos pueden extenderse durante feriados, clima adverso o situaciones extraordinarias.
                        </p>
                    </div>
                </div>

                <!-- Devoluciones -->
                <div class="mb-8">
                    <h2 class="text-2xl font-bold text-gold-400 mb-4">6. Política de Devoluciones y Cambios</h2>
                    <div class="text-gray-300 space-y-4">
                        <h3 class="text-lg font-semibold text-white">Condiciones:</h3>
                        <ul class="list-disc list-inside space-y-2 ml-4">
                            <li>Tienes 30 días corridos desde la recepción para solicitar cambios o devoluciones</li>
                            <li>Los productos deben estar en perfecto estado, con etiquetas originales</li>
                            <li>No haber sido utilizados ni lavados</li>
                            <li>Conservar el packaging original</li>
                        </ul>
                        
                        <h3 class="text-lg font-semibold text-white mt-4">Productos NO elegibles:</h3>
                        <ul class="list-disc list-inside space-y-2 ml-4">
                            <li>Productos personalizados o con nombres estampados</li>
                            <li>Ropa interior o productos de higiene personal</li>
                            <li>Productos en liquidación o con descuento superior al 50%</li>
                        </ul>
                        
                        <p class="text-green-400 bg-green-900/20 p-3 rounded-lg">
                            <strong>¡Somos familia!</strong> Entendemos que a veces los talles no son los esperados. Contactanos por WhatsApp y encontraremos la mejor solución juntos.
                        </p>
                    </div>
                </div>

                <!-- Responsabilidades -->
                <div class="mb-8">
                    <h2 class="text-2xl font-bold text-gold-400 mb-4">7. Responsabilidades</h2>
                    <div class="text-gray-300 space-y-4">
                        <h3 class="text-lg font-semibold text-white">Del usuario:</h3>
                        <ul class="list-disc list-inside space-y-2 ml-4">
                            <li>Proporcionar información veraz y actualizada</li>
                            <li>Verificar la información de envío antes de confirmar la compra</li>
                            <li>Cuidar las credenciales de acceso a su cuenta</li>
                            <li>Utilizar el sitio de manera responsable</li>
                        </ul>
                        
                        <h3 class="text-lg font-semibold text-white mt-4">De Lunáticos:</h3>
                        <ul class="list-disc list-inside space-y-2 ml-4">
                            <li>Entregar productos en perfecto estado y dentro de los plazos establecidos</li>
                            <li>Mantener la confidencialidad de los datos personales</li>
                            <li>Brindar atención al cliente de calidad</li>
                            <li>Cumplir con las políticas de devolución establecidas</li>
                        </ul>
                    </div>
                </div>

                <!-- Limitaciones -->
                <div class="mb-8">
                    <h2 class="text-2xl font-bold text-gold-400 mb-4">8. Limitaciones de Responsabilidad</h2>
                    <div class="text-gray-300 space-y-4">
                        <p>Lunáticos no se hace responsable por:</p>
                        <ul class="list-disc list-inside space-y-2 ml-4">
                            <li>Demoras en envíos causadas por terceros (correos, transporte)</li>
                            <li>Daños ocasionados por uso inadecuado de los productos</li>
                            <li>Problemas técnicos temporales en el sitio web</li>
                            <li>Decisiones de compra basadas en información incorrecta proporcionada por el usuario</li>
                        </ul>
                    </div>
                </div>

                <!-- Modificaciones -->
                <div class="mb-8">
                    <h2 class="text-2xl font-bold text-gold-400 mb-4">9. Modificaciones de los Términos</h2>
                    <p class="text-gray-300">
                        Nos reservamos el derecho de modificar estos términos y condiciones en cualquier momento. 
                        Las modificaciones entrarán en vigor inmediatamente después de su publicación en el sitio web. 
                        Te recomendamos revisar esta página periódicamente para estar al tanto de cualquier cambio.
                    </p>
                </div>

                <!-- Contacto -->
                <div class="mb-8">
                    <h2 class="text-2xl font-bold text-gold-400 mb-4">10. Contacto</h2>
                    <div class="text-gray-300 space-y-4">
                        <p>Para cualquier consulta sobre estos términos y condiciones, puedes contactarnos:</p>
                        <div class="bg-gradient-to-r from-gold-500/10 to-yellow-500/10 border border-gold-500/30 rounded-lg p-4">
                            <h3 class="text-lg font-semibold text-gold-400 mb-2">Familia Luna - Lunáticos</h3>
                            <p><strong>WhatsApp:</strong> <a href="{{ route('whatsapp') }}" class="text-gold-400 hover:text-gold-300 transition-colors">Escribinos aquí</a></p>
                            <p><strong>Ubicación:</strong> Ushuaia, Tierra del Fuego</p>
                            <p class="text-sm text-gray-400 mt-2">
                                🏠 Somos una familia que ama el deporte tanto como vos. No somos una gran corporación, somos gente de a pie con pasión por lo que hacemos.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Footer del documento -->
                <div class="text-center pt-8 border-t border-gray-700">
                    <p class="text-gray-400 text-sm">
                        Al realizar una compra en Lunáticos, confirmas que has leído, entendido y aceptado estos términos y condiciones.
                    </p>
                    <p class="text-gold-400 font-semibold mt-2">
                        ¡Gracias por confiar en la Familia Luna!
                    </p>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
