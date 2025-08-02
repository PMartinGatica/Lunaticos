@extends('layouts.app')

@section('title', 'Términos de Servicio - Lunáticos Indumentaria Deportiva')
@section('description', 'Términos de servicio de Lunáticos. Conoce las condiciones de uso de nuestros servicios y plataforma digital.')

@section('content')
<div class="bg-black min-h-screen">
    <!-- Hero Section -->
    <section class="stadium-bg py-20">
        <div class="container mx-auto px-4 text-center">
            <h1 class="font-heading text-4xl lg:text-6xl font-bold text-white mb-6">
                Términos de Servicio
            </h1>
            <p class="text-xl text-gray-300 max-w-3xl mx-auto">
                Condiciones claras y transparentes para el uso de nuestra plataforma digital y servicios.
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

                <!-- Aceptación -->
                <div class="mb-8">
                    <h2 class="text-2xl font-bold text-gold-400 mb-4">1. Aceptación de los Términos</h2>
                    <div class="space-y-4">
                        <p class="text-gray-300 leading-relaxed">
                            Al acceder y utilizar el sitio web de <span class="text-gold-400 font-semibold">Lunáticos</span>, 
                            aceptas estar legalmente vinculado por estos términos de servicio. Si no estás de acuerdo con 
                            alguno de estos términos, por favor no utilices nuestros servicios.
                        </p>
                        <div class="bg-blue-900/20 border border-blue-500/30 rounded-lg p-4">
                            <p class="text-blue-400">
                                <strong>Comunicación familiar:</strong> Como familia Luna, creemos en la transparencia. 
                                Estos términos están escritos en un lenguaje claro y directo, sin letra chica escondida.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Descripción del Servicio -->
                <div class="mb-8">
                    <h2 class="text-2xl font-bold text-gold-400 mb-4">2. Descripción del Servicio</h2>
                    <div class="space-y-4">
                        <p class="text-gray-300">
                            Lunáticos es una plataforma de comercio electrónico que ofrece:
                        </p>
                        
                        <div class="grid md:grid-cols-2 gap-4">
                            <div class="bg-gray-800/50 rounded-lg p-4">
                                <h3 class="font-semibold text-white mb-2">🛍️ Tienda Online</h3>
                                <ul class="text-gray-300 text-sm space-y-1">
                                    <li>• Indumentaria deportiva de calidad</li>
                                    <li>• Catálogo actualizado permanentemente</li>
                                    <li>• Sistema de búsqueda y filtros</li>
                                    <li>• Carrito de compras seguro</li>
                                </ul>
                            </div>
                            
                            <div class="bg-gray-800/50 rounded-lg p-4">
                                <h3 class="font-semibold text-white mb-2">📦 Servicios de Envío</h3>
                                <ul class="text-gray-300 text-sm space-y-1">
                                    <li>• Envíos a toda Argentina</li>
                                    <li>• Seguimiento de pedidos</li>
                                    <li>• Múltiples opciones de entrega</li>
                                    <li>• Retiro en punto de distribución</li>
                                </ul>
                            </div>
                            
                            <div class="bg-gray-800/50 rounded-lg p-4">
                                <h3 class="font-semibold text-white mb-2">💬 Atención Personalizada</h3>
                                <ul class="text-gray-300 text-sm space-y-1">
                                    <li>• Consultas por WhatsApp</li>
                                    <li>• Asesoramiento de tallas</li>
                                    <li>• Soporte post-venta</li>
                                    <li>• Trato familiar y cercano</li>
                                </ul>
                            </div>
                            
                            <div class="bg-gray-800/50 rounded-lg p-4">
                                <h3 class="font-semibold text-white mb-2">🔄 Garantías</h3>
                                <ul class="text-gray-300 text-sm space-y-1">
                                    <li>• 30 días para cambios</li>
                                    <li>• Productos con garantía</li>
                                    <li>• Política de devoluciones clara</li>
                                    <li>• Protección del consumidor</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Registro y Cuentas -->
                <div class="mb-8">
                    <h2 class="text-2xl font-bold text-gold-400 mb-4">3. Registro y Cuentas de Usuario</h2>
                    <div class="space-y-4">
                        <h3 class="text-lg font-semibold text-white">3.1 Creación de Cuenta</h3>
                        <p class="text-gray-300">
                            No es obligatorio crear una cuenta para navegar nuestro sitio, pero sí para realizar compras. 
                            Al crear una cuenta, debes proporcionar información precisa y actualizada.
                        </p>
                        
                        <div class="space-y-3">
                            <h4 class="font-semibold text-white">Responsabilidades del Usuario:</h4>
                            <ul class="list-disc list-inside space-y-2 ml-4 text-gray-300">
                                <li>Mantener la confidencialidad de tu información de acceso</li>
                                <li>Proporcionar datos reales y verificables</li>
                                <li>Actualizar tu información cuando sea necesario</li>
                                <li>Notificarnos sobre cualquier uso no autorizado</li>
                                <li>Ser responsable de todas las actividades bajo tu cuenta</li>
                            </ul>
                        </div>
                        
                        <div class="bg-green-900/20 border border-green-500/30 rounded-lg p-4">
                            <p class="text-green-400">
                                <strong>Ventajas de tener cuenta:</strong> Historial de compras, seguimiento de pedidos, 
                                wishlist personalizada, y proceso de compra más rápido.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Uso Aceptable -->
                <div class="mb-8">
                    <h2 class="text-2xl font-bold text-gold-400 mb-4">4. Uso Aceptable</h2>
                    <div class="space-y-4">
                        <p class="text-gray-300">
                            Al utilizar nuestros servicios, te comprometes a:
                        </p>
                        
                        <div class="grid md:grid-cols-2 gap-4">
                            <div class="space-y-3">
                                <h3 class="font-semibold text-green-400">✅ Comportamientos Permitidos</h3>
                                <ul class="list-disc list-inside space-y-1 text-gray-300 text-sm ml-4">
                                    <li>Navegar y comprar productos</li>
                                    <li>Dejar reseñas honestas</li>
                                    <li>Compartir productos en redes sociales</li>
                                    <li>Contactarnos con consultas legítimas</li>
                                    <li>Utilizar las funciones como están diseñadas</li>
                                </ul>
                            </div>
                            
                            <div class="space-y-3">
                                <h3 class="font-semibold text-red-400">❌ Comportamientos Prohibidos</h3>
                                <ul class="list-disc list-inside space-y-1 text-gray-300 text-sm ml-4">
                                    <li>Intentar hackear o dañar el sitio</li>
                                    <li>Crear cuentas falsas o múltiples</li>
                                    <li>Realizar compras fraudulentas</li>
                                    <li>Copiar contenido sin autorización</li>
                                    <li>Enviar spam o contenido malicioso</li>
                                    <li>Violar derechos de terceros</li>
                                </ul>
                            </div>
                        </div>
                        
                        <div class="bg-red-900/20 border border-red-500/30 rounded-lg p-4">
                            <p class="text-red-400">
                                <strong>Consecuencias:</strong> El incumplimiento de estas normas puede resultar en 
                                la suspensión o terminación de tu cuenta y la prohibición de usar nuestros servicios.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Pedidos y Pagos -->
                <div class="mb-8">
                    <h2 class="text-2xl font-bold text-gold-400 mb-4">5. Pedidos y Pagos</h2>
                    <div class="space-y-4">
                        <div class="grid md:grid-cols-2 gap-6">
                            <div>
                                <h3 class="text-lg font-semibold text-white mb-3">5.1 Proceso de Pedidos</h3>
                                <div class="space-y-2 text-gray-300 text-sm">
                                    <div class="flex items-center space-x-2">
                                        <span class="text-gold-400">1.</span>
                                        <span>Seleccionar productos y agregar al carrito</span>
                                    </div>
                                    <div class="flex items-center space-x-2">
                                        <span class="text-gold-400">2.</span>
                                        <span>Proporcionar información de envío</span>
                                    </div>
                                    <div class="flex items-center space-x-2">
                                        <span class="text-gold-400">3.</span>
                                        <span>Elegir método de pago</span>
                                    </div>
                                    <div class="flex items-center space-x-2">
                                        <span class="text-gold-400">4.</span>
                                        <span>Confirmar pedido</span>
                                    </div>
                                    <div class="flex items-center space-x-2">
                                        <span class="text-gold-400">5.</span>
                                        <span>Recibir confirmación por email/WhatsApp</span>
                                    </div>
                                </div>
                            </div>
                            
                            <div>
                                <h3 class="text-lg font-semibold text-white mb-3">5.2 Métodos de Pago</h3>
                                <ul class="space-y-2 text-gray-300 text-sm">
                                    <li class="flex items-center space-x-2">
                                        <span class="text-blue-400">💳</span>
                                        <span>MercadoPago (tarjetas de crédito/débito)</span>
                                    </li>
                                    <li class="flex items-center space-x-2">
                                        <span class="text-green-400">🏦</span>
                                        <span>Transferencia bancaria</span>
                                    </li>
                                    <li class="flex items-center space-x-2">
                                        <span class="text-purple-400">📱</span>
                                        <span>Pago móvil</span>
                                    </li>
                                    <li class="flex items-center space-x-2">
                                        <span class="text-yellow-400">💰</span>
                                        <span>Efectivo (retiro en punto)</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        
                        <div class="bg-yellow-900/20 border border-yellow-500/30 rounded-lg p-4">
                            <h4 class="font-semibold text-yellow-400 mb-2">Importante sobre Precios y Disponibilidad:</h4>
                            <ul class="text-gray-300 text-sm space-y-1">
                                <li>• Los precios están sujetos a cambios sin previo aviso</li>
                                <li>• Los productos están sujetos a disponibilidad de stock</li>
                                <li>• Nos reservamos el derecho de cancelar pedidos por falta de stock</li>
                                <li>• Los precios incluyen IVA donde corresponda</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Envíos y Entregas -->
                <div class="mb-8">
                    <h2 class="text-2xl font-bold text-gold-400 mb-4">6. Envíos y Entregas</h2>
                    <div class="space-y-4">
                        <div class="grid md:grid-cols-2 gap-4">
                            <div class="bg-blue-900/20 border border-blue-500/30 rounded-lg p-4">
                                <h3 class="font-semibold text-blue-400 mb-2">📦 Tiempos de Envío</h3>
                                <ul class="text-gray-300 text-sm space-y-1">
                                    <li><strong>CABA:</strong> 24-48 horas</li>
                                    <li><strong>GBA:</strong> 2-4 días hábiles</li>
                                    <li><strong>Interior:</strong> 3-7 días hábiles</li>
                                    <li><strong>Patagonia:</strong> 5-10 días hábiles</li>
                                </ul>
                            </div>
                            
                            <div class="bg-green-900/20 border border-green-500/30 rounded-lg p-4">
                                <h3 class="font-semibold text-green-400 mb-2">🚚 Opciones de Entrega</h3>
                                <ul class="text-gray-300 text-sm space-y-1">
                                    <li>• Envío a domicilio</li>
                                    <li>• Retiro en sucursal</li>
                                    <li>• Punto de entrega</li>
                                    <li>• Entrega express (CABA)</li>
                                </ul>
                            </div>
                        </div>
                        
                        <div class="space-y-3">
                            <h3 class="font-semibold text-white">Responsabilidades de Entrega:</h3>
                            <ul class="list-disc list-inside space-y-2 ml-4 text-gray-300">
                                <li>Proporcionaremos un número de seguimiento para todos los envíos</li>
                                <li>Es responsabilidad del cliente proporcionar una dirección correcta</li>
                                <li>Los tiempos de entrega son estimados y pueden variar por factores externos</li>
                                <li>Intentaremos contactarte si hay problemas con la entrega</li>
                                <li>Los paquetes no reclamados serán devueltos después de 15 días</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Devoluciones y Cambios -->
                <div class="mb-8">
                    <h2 class="text-2xl font-bold text-gold-400 mb-4">7. Devoluciones y Cambios</h2>
                    <div class="space-y-4">
                        <div class="bg-gradient-to-r from-green-900/20 to-emerald-900/20 border border-green-500/30 rounded-lg p-4">
                            <h3 class="font-semibold text-green-400 mb-2">✅ Política de 30 Días</h3>
                            <p class="text-gray-300 text-sm">
                                Tienes 30 días corridos desde la recepción del producto para solicitar cambios o devoluciones.
                            </p>
                        </div>
                        
                        <div class="grid md:grid-cols-2 gap-4">
                            <div>
                                <h4 class="font-semibold text-white mb-2">Condiciones para Cambios:</h4>
                                <ul class="list-disc list-inside space-y-1 text-gray-300 text-sm ml-4">
                                    <li>Producto en estado original</li>
                                    <li>Con etiquetas originales</li>
                                    <li>Sin uso evidente</li>
                                    <li>En empaque original</li>
                                    <li>Con comprobante de compra</li>
                                </ul>
                            </div>
                            
                            <div>
                                <h4 class="font-semibold text-white mb-2">Proceso de Devolución:</h4>
                                <ol class="list-decimal list-inside space-y-1 text-gray-300 text-sm ml-4">
                                    <li>Contactar por WhatsApp</li>
                                    <li>Explicar motivo del cambio/devolución</li>
                                    <li>Recibir autorización e instrucciones</li>
                                    <li>Enviar producto según indicaciones</li>
                                    <li>Recibir reembolso/producto nuevo</li>
                                </ol>
                            </div>
                        </div>
                        
                        <div class="bg-orange-900/20 border border-orange-500/30 rounded-lg p-4">
                            <h4 class="font-semibold text-orange-400 mb-2">Excepciones:</h4>
                            <p class="text-gray-300 text-sm">
                                No se aceptan devoluciones de productos personalizados, ropa interior, 
                                o productos dañados por mal uso del cliente.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Propiedad Intelectual -->
                <div class="mb-8">
                    <h2 class="text-2xl font-bold text-gold-400 mb-4">8. Propiedad Intelectual</h2>
                    <div class="space-y-4">
                        <p class="text-gray-300">
                            Todo el contenido de este sitio web, incluyendo pero no limitado a:
                        </p>
                        
                        <div class="grid md:grid-cols-2 gap-4">
                            <div class="bg-gray-800/50 rounded-lg p-4">
                                <h3 class="font-semibold text-white mb-2">📝 Contenido Protegido</h3>
                                <ul class="text-gray-300 text-sm space-y-1">
                                    <li>• Textos y descripciones</li>
                                    <li>• Imágenes y fotografías</li>
                                    <li>• Logo y marca "Lunáticos"</li>
                                    <li>• Diseño y layout del sitio</li>
                                    <li>• Código fuente</li>
                                </ul>
                            </div>
                            
                            <div class="bg-gray-800/50 rounded-lg p-4">
                                <h3 class="font-semibold text-white mb-2">⚖️ Derechos</h3>
                                <ul class="text-gray-300 text-sm space-y-1">
                                    <li>• Propiedad de Familia Luna</li>
                                    <li>• Protegido por leyes de copyright</li>
                                    <li>• Uso no autorizado prohibido</li>
                                    <li>• Reproducción requiere permiso</li>
                                    <li>• Violaciones serán perseguidas</li>
                                </ul>
                            </div>
                        </div>
                        
                        <div class="bg-blue-900/20 border border-blue-500/30 rounded-lg p-4">
                            <p class="text-blue-400">
                                <strong>Uso Permitido:</strong> Puedes utilizar nuestro contenido únicamente para 
                                realizar compras y para uso personal no comercial.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Limitación de Responsabilidad -->
                <div class="mb-8">
                    <h2 class="text-2xl font-bold text-gold-400 mb-4">9. Limitación de Responsabilidad</h2>
                    <div class="space-y-4">
                        <p class="text-gray-300">
                            Aunque nos esforzamos por brindar el mejor servicio, nuestra responsabilidad está limitada a:
                        </p>
                        
                        <div class="space-y-4">
                            <div class="bg-green-900/20 border border-green-500/30 rounded-lg p-4">
                                <h3 class="font-semibold text-green-400 mb-2">✅ Nos responsabilizamos por:</h3>
                                <ul class="list-disc list-inside space-y-1 text-gray-300 text-sm ml-4">
                                    <li>La calidad de los productos que vendemos</li>
                                    <li>El cumplimiento de nuestras políticas de envío</li>
                                    <li>La seguridad de los datos de pago (a través de procesadores seguros)</li>
                                    <li>Proporcionar información precisa sobre productos</li>
                                    <li>Atención al cliente profesional y cercana</li>
                                </ul>
                            </div>
                            
                            <div class="bg-red-900/20 border border-red-500/30 rounded-lg p-4">
                                <h3 class="font-semibold text-red-400 mb-2">❌ No nos responsabilizamos por:</h3>
                                <ul class="list-disc list-inside space-y-1 text-gray-300 text-sm ml-4">
                                    <li>Daños indirectos, incidentales o consecuentes</li>
                                    <li>Interrupciones del servicio por causas de fuerza mayor</li>
                                    <li>Pérdida de datos por problemas técnicos</li>
                                    <li>Decisiones de compra basadas en información de terceros</li>
                                    <li>Demoras causadas por servicios de terceros (correo, bancos)</li>
                                </ul>
                            </div>
                        </div>
                        
                        <div class="bg-yellow-900/20 border border-yellow-500/30 rounded-lg p-4">
                            <p class="text-yellow-400">
                                <strong>Límite máximo:</strong> En cualquier caso, nuestra responsabilidad total 
                                no excederá el valor del producto o servicio específico en cuestión.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Terminación -->
                <div class="mb-8">
                    <h2 class="text-2xl font-bold text-gold-400 mb-4">10. Terminación del Servicio</h2>
                    <div class="space-y-4">
                        <div class="grid md:grid-cols-2 gap-4">
                            <div>
                                <h3 class="font-semibold text-white mb-3">Tu parte:</h3>
                                <p class="text-gray-300 text-sm mb-2">
                                    Puedes dejar de usar nuestros servicios en cualquier momento:
                                </p>
                                <ul class="list-disc list-inside space-y-1 text-gray-300 text-sm ml-4">
                                    <li>Eliminando tu cuenta</li>
                                    <li>Dejando de acceder al sitio</li>
                                    <li>Contactándonos para eliminar datos</li>
                                </ul>
                            </div>
                            
                            <div>
                                <h3 class="font-semibold text-white mb-3">Nuestra parte:</h3>
                                <p class="text-gray-300 text-sm mb-2">
                                    Podemos suspender servicios por:
                                </p>
                                <ul class="list-disc list-inside space-y-1 text-gray-300 text-sm ml-4">
                                    <li>Violación de estos términos</li>
                                    <li>Actividad fraudulenta</li>
                                    <li>Comportamiento abusivo</li>
                                    <li>Incumplimiento de pagos</li>
                                </ul>
                            </div>
                        </div>
                        
                        <div class="bg-blue-900/20 border border-blue-500/30 rounded-lg p-4">
                            <p class="text-blue-400">
                                <strong>Supervivencia:</strong> Las secciones sobre limitación de responsabilidad, 
                                propiedad intelectual y resolución de disputas sobreviven a la terminación.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Ley Aplicable -->
                <div class="mb-8">
                    <h2 class="text-2xl font-bold text-gold-400 mb-4">11. Ley Aplicable y Jurisdicción</h2>
                    <div class="space-y-4">
                        <p class="text-gray-300">
                            Estos términos se rigen por las leyes de la República Argentina. 
                            Cualquier disputa será resuelta en los tribunales competentes de Ushuaia, Tierra del Fuego.
                        </p>
                        
                        <div class="bg-green-900/20 border border-green-500/30 rounded-lg p-4">
                            <h3 class="font-semibold text-green-400 mb-2">Resolución de Conflictos</h3>
                            <p class="text-gray-300 text-sm">
                                Antes de cualquier acción legal, nos comprometemos a intentar resolver 
                                cualquier disputa de manera amigable a través de comunicación directa.
                            </p>
                        </div>
                        
                        <div class="space-y-2">
                            <h4 class="font-semibold text-white">Protección del Consumidor:</h4>
                            <p class="text-gray-300 text-sm">
                                Estos términos no afectan los derechos del consumidor establecidos en la 
                                Ley de Defensa del Consumidor (Ley 24.240) ni otras leyes aplicables.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Cambios en Términos -->
                <div class="mb-8">
                    <h2 class="text-2xl font-bold text-gold-400 mb-4">12. Modificaciones de los Términos</h2>
                    <div class="space-y-4">
                        <p class="text-gray-300">
                            Podemos actualizar estos términos ocasionalmente para reflejar cambios en nuestros 
                            servicios, la ley, o por otras razones operativas.
                        </p>
                        
                        <div class="space-y-3">
                            <h3 class="font-semibold text-white">Proceso de Actualización:</h3>
                            <ol class="list-decimal list-inside space-y-2 ml-4 text-gray-300">
                                <li>Publicaremos la nueva versión en el sitio web</li>
                                <li>Actualizaremos la fecha de "última actualización"</li>
                                <li>Para cambios significativos, te notificaremos por email o WhatsApp</li>
                                <li>Los nuevos términos entran en vigencia inmediatamente</li>
                                <li>Tu uso continuado implica aceptación de los nuevos términos</li>
                            </ol>
                        </div>
                        
                        <div class="bg-yellow-900/20 border border-yellow-500/30 rounded-lg p-4">
                            <p class="text-yellow-400">
                                <strong>Tu opción:</strong> Si no estás de acuerdo con los nuevos términos, 
                                puedes dejar de usar nuestros servicios.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Contacto -->
                <div class="mb-8">
                    <h2 class="text-2xl font-bold text-gold-400 mb-4">13. Contacto y Soporte</h2>
                    <div class="space-y-4">
                        <p class="text-gray-300">
                            Para cualquier pregunta sobre estos términos de servicio o nuestros servicios:
                        </p>
                        
                        <div class="bg-gradient-to-r from-gold-500/10 to-yellow-500/10 border border-gold-500/30 rounded-lg p-6">
                            <h3 class="text-lg font-semibold text-gold-400 mb-4">Familia Luna - Lunáticos</h3>
                            
                            <div class="grid md:grid-cols-2 gap-4">
                                <div>
                                    <h4 class="font-semibold text-white mb-2">💬 Soporte General</h4>
                                    <p class="text-gray-300 text-sm">
                                        <strong>WhatsApp:</strong> <a href="{{ route('whatsapp') }}" class="text-gold-400 hover:text-gold-300 transition-colors">Chatea con nosotros</a>
                                    </p>
                                    <p class="text-gray-300 text-sm">
                                        <strong>Horario:</strong> Lun-Vie 9:00-18:00 ART
                                    </p>
                                </div>
                                
                                <div>
                                    <h4 class="font-semibold text-white mb-2">⚖️ Consultas Legales</h4>
                                    <p class="text-gray-300 text-sm">Para temas específicos sobre términos</p>
                                    <p class="text-gray-300 text-sm">Respuesta en 24-48 horas</p>
                                </div>
                            </div>
                            
                            <div class="mt-4 p-3 bg-black/30 rounded-lg">
                                <p class="text-sm text-gray-400">
                                    📍 <strong>Ubicación:</strong> Ushuaia, Tierra del Fuego, Argentina<br>
                                    🏠 <strong>Empresa familiar:</strong> Atención personalizada garantizada
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Footer del documento -->
                <div class="text-center pt-8 border-t border-gray-700">
                    <p class="text-gray-400 text-sm mb-2">
                        Al utilizar nuestros servicios, confirmas que has leído, comprendido y aceptado estos términos de servicio.
                    </p>
                    <p class="text-gold-400 font-semibold mb-2">
                        ¡Gracias por ser parte de la familia Lunáticos!
                    </p>
                    <p class="text-gray-500 text-xs">
                        Términos vigentes desde el 2 de Agosto de 2025
                    </p>
                    <p class="text-gray-500 text-xs mt-1">
                        Versión 1.0 - Familia Luna, Ushuaia
                    </p>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
