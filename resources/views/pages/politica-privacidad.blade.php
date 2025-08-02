@extends('layouts.app')

@section('title', 'Política de Privacidad - Lunáticos Indumentaria Deportiva')
@section('description', 'Política de privacidad y protección de datos de Lunáticos. Conoce cómo protegemos tu información personal.')

@section('content')
<div class="bg-black min-h-screen">
    <!-- Hero Section -->
    <section class="stadium-bg py-20">
        <div class="container mx-auto px-4 text-center">
            <h1 class="font-heading text-4xl lg:text-6xl font-bold text-white mb-6">
                Política de Privacidad
            </h1>
            <p class="text-xl text-gray-300 max-w-3xl mx-auto">
                Tu privacidad es importante para nosotros. Conoce cómo recopilamos, usamos y protegemos tu información personal.
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
                        En <span class="text-gold-400 font-semibold">Lunáticos</span>, una empresa familiar de Ushuaia, respetamos tu privacidad y nos comprometemos 
                        a proteger tu información personal. Esta política explica cómo recopilamos, usamos, compartimos y protegemos 
                        tu información cuando utilizas nuestro sitio web y servicios.
                    </p>
                    <div class="mt-4 p-3 bg-blue-900/20 border border-blue-500/30 rounded-lg">
                        <p class="text-blue-400">
                            <strong>Compromiso familiar:</strong> Como familia, entendemos la importancia de la confianza. 
                            Tratamos tu información con el mismo cuidado que trataríamos la de nuestros propios familiares.
                        </p>
                    </div>
                </div>

                <!-- Información que recopilamos -->
                <div class="mb-8">
                    <h2 class="text-2xl font-bold text-gold-400 mb-4">2. Información que Recopilamos</h2>
                    
                    <div class="space-y-6">
                        <div>
                            <h3 class="text-lg font-semibold text-white mb-3">2.1 Información Personal</h3>
                            <p class="text-gray-300 mb-3">Recopilamos información que nos proporcionas directamente:</p>
                            <ul class="list-disc list-inside space-y-2 ml-4 text-gray-300">
                                <li><strong>Datos de contacto:</strong> Nombre, apellido, email, teléfono</li>
                                <li><strong>Dirección de envío:</strong> Domicilio completo para entregas</li>
                                <li><strong>Información de pago:</strong> A través de procesadores seguros (MercadoPago)</li>
                                <li><strong>Comunicaciones:</strong> Mensajes enviados por WhatsApp o redes sociales</li>
                            </ul>
                        </div>

                        <div>
                            <h3 class="text-lg font-semibold text-white mb-3">2.2 Información Técnica</h3>
                            <ul class="list-disc list-inside space-y-2 ml-4 text-gray-300">
                                <li>Dirección IP y ubicación general</li>
                                <li>Tipo de navegador y dispositivo</li>
                                <li>Páginas visitadas y tiempo de navegación</li>
                                <li>Cookies y tecnologías similares</li>
                            </ul>
                        </div>

                        <div>
                            <h3 class="text-lg font-semibold text-white mb-3">2.3 Información de Preferencias</h3>
                            <ul class="list-disc list-inside space-y-2 ml-4 text-gray-300">
                                <li>Productos visitados y favoritos</li>
                                <li>Historial de compras</li>
                                <li>Preferencias de comunicación</li>
                                <li>Tallas y categorías de interés</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Cómo usamos la información -->
                <div class="mb-8">
                    <h2 class="text-2xl font-bold text-gold-400 mb-4">3. Cómo Usamos tu Información</h2>
                    
                    <div class="space-y-4">
                        <div class="bg-gradient-to-r from-green-900/20 to-emerald-900/20 border border-green-500/30 rounded-lg p-4">
                            <h3 class="text-lg font-semibold text-green-400 mb-2">Para procesar tus compras:</h3>
                            <ul class="list-disc list-inside space-y-1 ml-4 text-gray-300">
                                <li>Confirmar y procesar pedidos</li>
                                <li>Coordinar envíos y entregas</li>
                                <li>Gestionar pagos y facturación</li>
                                <li>Manejar devoluciones y cambios</li>
                            </ul>
                        </div>

                        <div class="bg-gradient-to-r from-blue-900/20 to-cyan-900/20 border border-blue-500/30 rounded-lg p-4">
                            <h3 class="text-lg font-semibold text-blue-400 mb-2">Para mejorar tu experiencia:</h3>
                            <ul class="list-disc list-inside space-y-1 ml-4 text-gray-300">
                                <li>Personalizar recomendaciones de productos</li>
                                <li>Recordar tus preferencias</li>
                                <li>Mejorar la funcionalidad del sitio</li>
                                <li>Proporcionar atención al cliente</li>
                            </ul>
                        </div>

                        <div class="bg-gradient-to-r from-purple-900/20 to-pink-900/20 border border-purple-500/30 rounded-lg p-4">
                            <h3 class="text-lg font-semibold text-purple-400 mb-2">Para comunicarnos contigo:</h3>
                            <ul class="list-disc list-inside space-y-1 ml-4 text-gray-300">
                                <li>Confirmar pedidos y envíos</li>
                                <li>Responder consultas y reclamos</li>
                                <li>Enviar ofertas y novedades (con tu consentimiento)</li>
                                <li>Notificar cambios importantes</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Compartir información -->
                <div class="mb-8">
                    <h2 class="text-2xl font-bold text-gold-400 mb-4">4. Compartir tu Información</h2>
                    
                    <div class="space-y-4">
                        <div class="bg-red-900/20 border border-red-500/30 rounded-lg p-4">
                            <h3 class="text-lg font-semibold text-red-400 mb-2">❌ NO vendemos tu información</h3>
                            <p class="text-gray-300">Como empresa familiar, nunca vendemos, alquilamos o comercializamos tu información personal a terceros.</p>
                        </div>

                        <div class="space-y-3">
                            <h3 class="text-lg font-semibold text-white">✅ Compartimos información solo cuando es necesario:</h3>
                            <ul class="list-disc list-inside space-y-2 ml-4 text-gray-300">
                                <li><strong>Procesadores de pago:</strong> MercadoPago para gestionar transacciones</li>
                                <li><strong>Servicios de envío:</strong> Correo Argentino, OCA, u otros transportes</li>
                                <li><strong>Requerimientos legales:</strong> Cuando la ley lo requiera</li>
                                <li><strong>Protección de derechos:</strong> Para proteger nuestros derechos o los de otros usuarios</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Cookies -->
                <div class="mb-8">
                    <h2 class="text-2xl font-bold text-gold-400 mb-4">5. Cookies y Tecnologías Similares</h2>
                    
                    <div class="space-y-4">
                        <p class="text-gray-300">Utilizamos cookies para mejorar tu experiencia de navegación:</p>
                        
                        <div class="grid md:grid-cols-2 gap-4">
                            <div class="bg-gray-800/50 rounded-lg p-4">
                                <h4 class="font-semibold text-white mb-2">🍪 Cookies Esenciales</h4>
                                <p class="text-gray-300 text-sm">Necesarias para el funcionamiento básico del sitio (carrito de compras, sesión de usuario).</p>
                            </div>
                            
                            <div class="bg-gray-800/50 rounded-lg p-4">
                                <h4 class="font-semibold text-white mb-2">📊 Cookies Analíticas</h4>
                                <p class="text-gray-300 text-sm">Nos ayudan a entender cómo usas el sitio para mejorarlo (Google Analytics).</p>
                            </div>
                            
                            <div class="bg-gray-800/50 rounded-lg p-4">
                                <h4 class="font-semibold text-white mb-2">🎯 Cookies de Personalización</h4>
                                <p class="text-gray-300 text-sm">Recordar tus preferencias y personalizar tu experiencia.</p>
                            </div>
                            
                            <div class="bg-gray-800/50 rounded-lg p-4">
                                <h4 class="font-semibold text-white mb-2">📢 Cookies de Marketing</h4>
                                <p class="text-gray-300 text-sm">Mostrar anuncios relevantes (solo con tu consentimiento).</p>
                            </div>
                        </div>
                        
                        <p class="text-yellow-400 bg-yellow-900/20 p-3 rounded-lg">
                            <strong>Control total:</strong> Puedes gestionar o desactivar las cookies desde la configuración de tu navegador.
                        </p>
                    </div>
                </div>

                <!-- Seguridad -->
                <div class="mb-8">
                    <h2 class="text-2xl font-bold text-gold-400 mb-4">6. Seguridad de tu Información</h2>
                    
                    <div class="space-y-4">
                        <p class="text-gray-300">Implementamos múltiples medidas de seguridad para proteger tu información:</p>
                        
                        <div class="grid md:grid-cols-2 gap-4">
                            <div class="space-y-3">
                                <h4 class="font-semibold text-green-400">🔒 Medidas Técnicas</h4>
                                <ul class="list-disc list-inside space-y-1 text-gray-300 text-sm ml-4">
                                    <li>Certificado SSL para cifrado de datos</li>
                                    <li>Servidores seguros y actualizados</li>
                                    <li>Firewalls y sistemas de detección</li>
                                    <li>Respaldos regulares de información</li>
                                </ul>
                            </div>
                            
                            <div class="space-y-3">
                                <h4 class="font-semibold text-blue-400">👥 Medidas Administrativas</h4>
                                <ul class="list-disc list-inside space-y-1 text-gray-300 text-sm ml-4">
                                    <li>Acceso limitado a datos personales</li>
                                    <li>Capacitación en privacidad familiar</li>
                                    <li>Políticas internas de seguridad</li>
                                    <li>Auditorías regulares de procesos</li>
                                </ul>
                            </div>
                        </div>
                        
                        <div class="bg-orange-900/20 border border-orange-500/30 rounded-lg p-4">
                            <p class="text-orange-400">
                                <strong>Importante:</strong> Aunque implementamos las mejores prácticas de seguridad, 
                                ningún sistema es 100% seguro. Te recomendamos mantener seguras tus credenciales de acceso.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Derechos -->
                <div class="mb-8">
                    <h2 class="text-2xl font-bold text-gold-400 mb-4">7. Tus Derechos</h2>
                    
                    <div class="space-y-4">
                        <p class="text-gray-300">Como usuario, tienes los siguientes derechos sobre tu información personal:</p>
                        
                        <div class="space-y-3">
                            <div class="flex items-start space-x-3">
                                <span class="text-gold-400 font-bold text-lg">👀</span>
                                <div>
                                    <h4 class="font-semibold text-white">Derecho de Acceso</h4>
                                    <p class="text-gray-300 text-sm">Conocer qué información tenemos sobre ti y cómo la usamos.</p>
                                </div>
                            </div>
                            
                            <div class="flex items-start space-x-3">
                                <span class="text-gold-400 font-bold text-lg">✏️</span>
                                <div>
                                    <h4 class="font-semibold text-white">Derecho de Rectificación</h4>
                                    <p class="text-gray-300 text-sm">Corregir información incorrecta o desactualizada.</p>
                                </div>
                            </div>
                            
                            <div class="flex items-start space-x-3">
                                <span class="text-gold-400 font-bold text-lg">🗑️</span>
                                <div>
                                    <h4 class="font-semibold text-white">Derecho de Supresión</h4>
                                    <p class="text-gray-300 text-sm">Solicitar la eliminación de tu información personal (sujeto a obligaciones legales).</p>
                                </div>
                            </div>
                            
                            <div class="flex items-start space-x-3">
                                <span class="text-gold-400 font-bold text-lg">📧</span>
                                <div>
                                    <h4 class="font-semibold text-white">Derecho de Oposición</h4>
                                    <p class="text-gray-300 text-sm">Oponerte al procesamiento de tu información para fines de marketing.</p>
                                </div>
                            </div>
                            
                            <div class="flex items-start space-x-3">
                                <span class="text-gold-400 font-bold text-lg">📦</span>
                                <div>
                                    <h4 class="font-semibold text-white">Derecho de Portabilidad</h4>
                                    <p class="text-gray-300 text-sm">Obtener una copia de tu información en formato estructurado.</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="bg-green-900/20 border border-green-500/30 rounded-lg p-4">
                            <p class="text-green-400">
                                <strong>¿Cómo ejercer tus derechos?</strong> Simplemente contactanos por WhatsApp. 
                                Como familia, responderemos de manera rápida y cercana a todas tus solicitudes.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Menores -->
                <div class="mb-8">
                    <h2 class="text-2xl font-bold text-gold-400 mb-4">8. Protección de Menores</h2>
                    <div class="space-y-4">
                        <p class="text-gray-300">
                            Nuestros servicios están dirigidos a personas mayores de 18 años. No recopilamos intencionalmente 
                            información personal de menores de edad sin el consentimiento de sus padres o tutores.
                        </p>
                        <div class="bg-purple-900/20 border border-purple-500/30 rounded-lg p-4">
                            <p class="text-purple-400">
                                <strong>Compromiso familiar:</strong> Si eres padre/madre y crees que tu hijo menor ha proporcionado 
                                información personal, contactanos inmediatamente para eliminarla.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Cambios -->
                <div class="mb-8">
                    <h2 class="text-2xl font-bold text-gold-400 mb-4">9. Cambios en esta Política</h2>
                    <div class="space-y-4">
                        <p class="text-gray-300">
                            Podemos actualizar esta política de privacidad ocasionalmente para reflejar cambios en nuestras 
                            prácticas o por requerimientos legales. Te notificaremos sobre cambios significativos y 
                            actualizaremos la fecha de "última actualización" en la parte superior.
                        </p>
                        <p class="text-yellow-400 bg-yellow-900/20 p-3 rounded-lg">
                            <strong>Recomendación:</strong> Revisa esta política periódicamente para mantenerte informado 
                            sobre cómo protegemos tu información.
                        </p>
                    </div>
                </div>

                <!-- Contacto -->
                <div class="mb-8">
                    <h2 class="text-2xl font-bold text-gold-400 mb-4">10. Contacto sobre Privacidad</h2>
                    <div class="space-y-4">
                        <p class="text-gray-300">
                            Si tienes preguntas, inquietudes o solicitudes relacionadas con esta política de privacidad 
                            o el tratamiento de tu información personal, no dudes en contactarnos:
                        </p>
                        
                        <div class="bg-gradient-to-r from-gold-500/10 to-yellow-500/10 border border-gold-500/30 rounded-lg p-6">
                            <h3 class="text-lg font-semibold text-gold-400 mb-4">Familia Luna - Lunáticos</h3>
                            
                            <div class="grid md:grid-cols-2 gap-4">
                                <div>
                                    <h4 class="font-semibold text-white mb-2">📞 Contacto Directo</h4>
                                    <p class="text-gray-300 text-sm">
                                        <strong>WhatsApp:</strong> <a href="{{ route('whatsapp') }}" class="text-gold-400 hover:text-gold-300 transition-colors">Escribinos aquí</a>
                                    </p>
                                    <p class="text-gray-300 text-sm">
                                        <strong>Respuesta:</strong> Dentro de 48 horas
                                    </p>
                                </div>
                                
                                <div>
                                    <h4 class="font-semibold text-white mb-2">📍 Ubicación</h4>
                                    <p class="text-gray-300 text-sm">Ushuaia, Tierra del Fuego</p>
                                    <p class="text-gray-300 text-sm">Argentina</p>
                                </div>
                            </div>
                            
                            <div class="mt-4 p-3 bg-black/30 rounded-lg">
                                <p class="text-sm text-gray-400">
                                    🏠 <strong>Nuestro compromiso familiar:</strong> No somos una gran corporación con departamentos 
                                    impersonales. Somos una familia que valora la confianza y la transparencia. 
                                    Tu privacidad es tan importante para nosotros como lo es para ti.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Footer del documento -->
                <div class="text-center pt-8 border-t border-gray-700">
                    <p class="text-gray-400 text-sm mb-2">
                        Al utilizar nuestros servicios, confirmas que has leído y comprendido esta política de privacidad.
                    </p>
                    <p class="text-gold-400 font-semibold">
                        ¡Gracias por confiar en la Familia Luna!
                    </p>
                    <p class="text-gray-500 text-xs mt-2">
                        Documento vigente desde el 2 de Agosto de 2025
                    </p>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
