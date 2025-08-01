@extends('layouts.app')

@section('title', 'Preguntas Frecuentes - Lunáticos')
@section('description', 'Encuentra respuestas a las preguntas más comunes sobre nuestros productos, envíos, pagos y políticas de cambio.')

@section('content')
<div class="bg-gray-50 pt-8">
    <div class="container mx-auto px-4">
        <!-- Header -->
        <div class="text-center mb-16">
            <h1 class="font-heading text-4xl lg:text-5xl font-bold text-lunaticos-black mb-4">
                Preguntas Frecuentes
            </h1>
            <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                Encontrá respuestas rápidas a las consultas más comunes. Si no encontrás lo que buscás, 
                no dudes en contactarnos.
            </p>
        </div>

        <div class="max-w-4xl mx-auto">
            <!-- Search Box -->
            <div class="mb-12">
                <div class="relative">
                    <input type="text" id="faq-search" placeholder="Buscar en preguntas frecuentes..." 
                           class="w-full px-6 py-4 pl-12 text-lg border border-gray-300 rounded-xl focus:ring-2 focus:ring-lunaticos-green focus:border-transparent">
                    <div class="absolute left-4 top-1/2 transform -translate-y-1/2">
                        <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <!-- FAQ Categories -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
                <button onclick="filterFAQs('all')" class="faq-filter-btn bg-lunaticos-green text-white p-4 rounded-lg font-semibold transition-colors" data-category="all">
                    Todas las Preguntas
                </button>
                <button onclick="filterFAQs('orders')" class="faq-filter-btn bg-white text-lunaticos-black border border-gray-300 p-4 rounded-lg font-semibold hover:bg-lunaticos-green hover:text-white transition-colors" data-category="orders">
                    Pedidos y Pagos
                </button>
                <button onclick="filterFAQs('shipping')" class="faq-filter-btn bg-white text-lunaticos-black border border-gray-300 p-4 rounded-lg font-semibold hover:bg-lunaticos-green hover:text-white transition-colors" data-category="shipping">
                    Envíos y Entregas
                </button>
            </div>

            <!-- FAQ Items -->
            <div class="space-y-4">
                @foreach($faqs as $index => $faq)
                    <div class="faq-item bg-white rounded-xl shadow-lg" data-category="orders">
                        <button onclick="toggleFAQ({{ $index }})" class="w-full px-6 py-6 text-left flex justify-between items-start hover:bg-gray-50 transition-colors rounded-xl">
                            <div class="flex-1 pr-4">
                                <h3 class="font-semibold text-lunaticos-black text-lg mb-2">
                                    {{ $faq['question'] }}
                                </h3>
                            </div>
                            <div class="flex-shrink-0">
                                <svg class="w-6 h-6 text-lunaticos-green transform transition-transform duration-200" id="faq-icon-{{ $index }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </div>
                        </button>
                        <div id="faq-content-{{ $index }}" class="hidden px-6 pb-6">
                            <div class="text-gray-600 text-lg leading-relaxed">
                                {{ $faq['answer'] }}
                            </div>
                        </div>
                    </div>
                @endforeach

                <!-- Additional FAQ Items by Category -->
                <div class="faq-item bg-white rounded-xl shadow-lg" data-category="shipping">
                    <button onclick="toggleFAQ('shipping1')" class="w-full px-6 py-6 text-left flex justify-between items-start hover:bg-gray-50 transition-colors rounded-xl">
                        <div class="flex-1 pr-4">
                            <h3 class="font-semibold text-lunaticos-black text-lg mb-2">
                                ¿Cuánto cuesta el envío?
                            </h3>
                        </div>
                        <div class="flex-shrink-0">
                            <svg class="w-6 h-6 text-lunaticos-green transform transition-transform duration-200" id="faq-icon-shipping1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </div>
                    </button>
                    <div id="faq-content-shipping1" class="hidden px-6 pb-6">
                        <div class="text-gray-600 text-lg leading-relaxed">
                            El costo de envío varía según la zona de destino. En CABA y GBA el costo es de $1.500, 
                            mientras que para el interior del país varía entre $2.000 y $3.500. 
                            ¡Envío gratis en compras superiores a $50.000!
                        </div>
                    </div>
                </div>

                <div class="faq-item bg-white rounded-xl shadow-lg" data-category="shipping">
                    <button onclick="toggleFAQ('shipping2')" class="w-full px-6 py-6 text-left flex justify-between items-start hover:bg-gray-50 transition-colors rounded-xl">
                        <div class="flex-1 pr-4">
                            <h3 class="font-semibold text-lunaticos-black text-lg mb-2">
                                ¿Puedo rastrear mi pedido?
                            </h3>
                        </div>
                        <div class="flex-shrink-0">
                            <svg class="w-6 h-6 text-lunaticos-green transform transition-transform duration-200" id="faq-icon-shipping2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </div>
                    </button>
                    <div id="faq-content-shipping2" class="hidden px-6 pb-6">
                        <div class="text-gray-600 text-lg leading-relaxed">
                            ¡Absolutamente! Una vez que tu pedido sea despachado, te enviaremos un código de 
                            seguimiento por email y WhatsApp para que puedas rastrear tu paquete en tiempo real.
                        </div>
                    </div>
                </div>

                <div class="faq-item bg-white rounded-xl shadow-lg" data-category="orders">
                    <button onclick="toggleFAQ('orders1')" class="w-full px-6 py-6 text-left flex justify-between items-start hover:bg-gray-50 transition-colors rounded-xl">
                        <div class="flex-1 pr-4">
                            <h3 class="font-semibold text-lunaticos-black text-lg mb-2">
                                ¿Puedo cancelar mi pedido?
                            </h3>
                        </div>
                        <div class="flex-shrink-0">
                            <svg class="w-6 h-6 text-lunaticos-green transform transition-transform duration-200" id="faq-icon-orders1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </div>
                    </button>
                    <div id="faq-content-orders1" class="hidden px-6 pb-6">
                        <div class="text-gray-600 text-lg leading-relaxed">
                            Sí, podés cancelar tu pedido sin costo hasta 2 horas después de realizarlo, 
                            siempre que aún no haya sido preparado para el envío. Contactanos por WhatsApp o email.
                        </div>
                    </div>
                </div>

                <div class="faq-item bg-white rounded-xl shadow-lg" data-category="orders">
                    <button onclick="toggleFAQ('orders2')" class="w-full px-6 py-6 text-left flex justify-between items-start hover:bg-gray-50 transition-colors rounded-xl">
                        <div class="flex-1 pr-4">
                            <h3 class="font-semibold text-lunaticos-black text-lg mb-2">
                                ¿Emiten factura?
                            </h3>
                        </div>
                        <div class="flex-shrink-0">
                            <svg class="w-6 h-6 text-lunaticos-green transform transition-transform duration-200" id="faq-icon-orders2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </div>
                    </button>
                    <div id="faq-content-orders2" class="hidden px-6 pb-6">
                        <div class="text-gray-600 text-lg leading-relaxed">
                            Sí, emitimos tanto facturas A como B. Solo indicanos en el momento de la compra 
                            si necesitás factura y proporcionanos tus datos fiscales.
                        </div>
                    </div>
                </div>
            </div>

            <!-- Contact Section -->
            <div class="mt-16 bg-white rounded-xl shadow-lg p-8 text-center">
                <h2 class="font-heading text-2xl font-bold text-lunaticos-black mb-4">
                    ¿No encontraste lo que buscabas?
                </h2>
                <p class="text-gray-600 mb-6">
                    Nuestro equipo está disponible para ayudarte con cualquier consulta específica que tengas
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="{{ route('whatsapp') }}" target="_blank" class="btn-primary">
                        Consultar por WhatsApp
                    </a>
                    <a href="{{ route('contact') }}" class="btn-outline">
                        Enviar Email
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // Toggle FAQ
    function toggleFAQ(index) {
        const content = document.getElementById(`faq-content-${index}`);
        const icon = document.getElementById(`faq-icon-${index}`);
        
        if (content.classList.contains('hidden')) {
            content.classList.remove('hidden');
            icon.style.transform = 'rotate(180deg)';
        } else {
            content.classList.add('hidden');
            icon.style.transform = 'rotate(0deg)';
        }
    }

    // Filter FAQs by category
    function filterFAQs(category) {
        const faqItems = document.querySelectorAll('.faq-item');
        const filterBtns = document.querySelectorAll('.faq-filter-btn');
        
        // Update active button
        filterBtns.forEach(btn => {
            if (btn.dataset.category === category) {
                btn.classList.remove('bg-white', 'text-lunaticos-black', 'border-gray-300');
                btn.classList.add('bg-lunaticos-green', 'text-white');
            } else {
                btn.classList.remove('bg-lunaticos-green', 'text-white');
                btn.classList.add('bg-white', 'text-lunaticos-black', 'border', 'border-gray-300');
            }
        });
        
        // Show/hide FAQ items
        faqItems.forEach(item => {
            if (category === 'all' || item.dataset.category === category) {
                item.style.display = 'block';
            } else {
                item.style.display = 'none';
            }
        });
    }

    // Search functionality
    document.getElementById('faq-search').addEventListener('input', function(e) {
        const searchTerm = e.target.value.toLowerCase();
        const faqItems = document.querySelectorAll('.faq-item');
        
        faqItems.forEach(item => {
            const question = item.querySelector('h3').textContent.toLowerCase();
            const answer = item.querySelector('.text-gray-600').textContent.toLowerCase();
            
            if (question.includes(searchTerm) || answer.includes(searchTerm) || searchTerm === '') {
                item.style.display = 'block';
            } else {
                item.style.display = 'none';
            }
        });
    });
</script>
@endpush
