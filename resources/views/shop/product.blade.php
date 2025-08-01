@extends('layouts.app')

@section('title', $product->name . ' - Lunáticos')
@section('description', $product->short_description ?? $product->description)

@section('content')
<div class="bg-black pt-8">
    <div class="container mx-auto px-4">
        <!-- Breadcrumb -->
        <nav class="mb-8">
            <ol class="flex items-center space-x-2 text-sm">
                <li><a href="{{ route('home') }}" class="text-lunaticos-green hover:text-green-600">Inicio</a></li>
                <li><span class="text-gray-400">/</span></li>
                <li><a href="{{ route('shop') }}" class="text-lunaticos-green hover:text-green-600">Tienda</a></li>
                <li><span class="text-gray-400">/</span></li>
                <li><a href="{{ route('shop', ['category' => $product->category->slug]) }}" class="text-lunaticos-green hover:text-green-600">{{ $product->category->name }}</a></li>
                <li><span class="text-gray-400">/</span></li>
                <li><span class="text-silver-300">{{ $product->name }}</span></li>
            </ol>
        </nav>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 mb-16">
            <!-- Product Images -->
            <div class="space-y-4">
                <!-- Main Image -->
                <div class="aspect-square rounded-xl overflow-hidden bg-gray-900 border border-gray-800">
                    <img id="main-image" src="{{ $product->main_image }}" alt="{{ $product->name }}" 
                         class="w-full h-full object-cover">
                </div>
                
                <!-- Thumbnail Images -->
                @if(count($product->images) > 1)
                    <div class="grid grid-cols-4 gap-4">
                        @foreach($product->images as $index => $image)
                            <button onclick="changeMainImage('{{ $image }}', this)" 
                                    class="aspect-square rounded-lg overflow-hidden bg-gray-900 border-2 {{ $index === 0 ? 'border-lunaticos-green' : 'border-gray-700' }} hover:border-lunaticos-green transition-colors">
                                <img src="{{ $image }}" alt="{{ $product->name }}" 
                                     class="w-full h-full object-cover">
                            </button>
                        @endforeach
                    </div>
                @endif
            </div>

            <!-- Product Info -->
            <div class="space-y-6">
                <!-- Category -->
                <div class="text-lunaticos-green font-medium">
                    {{ $product->category->name }}
                </div>

                <!-- Title -->
                <h1 class="font-heading text-3xl lg:text-4xl font-bold text-white">
                    {{ $product->name }}
                </h1>

                <!-- Price -->
                <div class="text-white">
                    @if($product->sale_price)
                        <div class="flex items-center space-x-4">
                            <span class="text-3xl font-bold">${{ number_format($product->sale_price, 0, ',', '.') }}</span>
                            <span class="text-xl text-gray-500 line-through">${{ number_format($product->price, 0, ',', '.') }}</span>
                            <span class="bg-lunaticos-red text-white px-3 py-1 rounded-full text-sm font-semibold">
                                -{{ $product->discount_percentage }}%
                            </span>
                        </div>
                    @else
                        <span class="text-3xl font-bold">${{ number_format($product->price, 0, ',', '.') }}</span>
                    @endif
                </div>

                <!-- Short Description -->
                @if($product->short_description)
                    <p class="text-silver-300 text-lg">
                        {{ $product->short_description }}
                    </p>
                @endif

                <!-- Stock Status -->
                <div class="flex items-center space-x-2">
                    @if($product->isInStock())
                        <div class="w-3 h-3 bg-green-500 rounded-full"></div>
                        <span class="text-green-600 font-medium">En Stock ({{ $product->stock }} unidades)</span>
                    @else
                        <div class="w-3 h-3 bg-red-500 rounded-full"></div>
                        <span class="text-red-600 font-medium">Sin Stock</span>
                    @endif
                </div>

                @if($product->isInStock())
                    <form id="add-to-cart-form" class="space-y-6">
                        @csrf
                        <!-- Size Selection -->
                        @if($product->sizes)
                            <div>
                                <label class="block text-sm font-medium text-silver-300 mb-2">
                                    Talle <span class="text-red-500">*</span>
                                </label>
                                <div class="grid grid-cols-6 gap-2">
                                    @foreach($product->sizes as $size)
                                        <label class="relative">
                                            <input type="radio" name="size" value="{{ $size }}" 
                                                   class="sr-only peer" required>
                                            <div class="border-2 border-gray-600 bg-gray-800 text-white rounded-lg py-2 px-3 text-center cursor-pointer peer-checked:border-lunaticos-green peer-checked:bg-lunaticos-green peer-checked:text-white transition-colors">
                                                {{ $size }}
                                            </div>
                                        </label>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        <!-- Color Selection -->
                        @if($product->colors)
                            <div>
                                <label class="block text-sm font-medium text-silver-300 mb-2">
                                    Color <span class="text-red-500">*</span>
                                </label>
                                <div class="flex flex-wrap gap-2">
                                    @foreach($product->colors as $color)
                                        <label class="relative">
                                            <input type="radio" name="color" value="{{ $color }}" 
                                                   class="sr-only peer" required>
                                            <div class="border-2 border-gray-600 bg-gray-800 text-white rounded-lg py-2 px-4 cursor-pointer peer-checked:border-lunaticos-green peer-checked:bg-lunaticos-green peer-checked:text-white transition-colors">
                                                {{ $color }}
                                            </div>
                                        </label>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        <!-- Quantity -->
                        <div>
                            <label class="block text-sm font-medium text-silver-300 mb-2">Cantidad</label>
                            <div class="flex items-center border border-gray-600 bg-gray-800 rounded-lg w-32">
                                <button type="button" onclick="changeQuantity(-1)" 
                                        class="px-3 py-2 text-white hover:text-lunaticos-green">-</button>
                                <input type="number" name="quantity" id="quantity" value="1" min="1" max="{{ $product->stock }}"
                                       class="w-full text-center border-0 focus:ring-0 bg-gray-800 text-white">
                                <button type="button" onclick="changeQuantity(1)" 
                                        class="px-3 py-2 text-white hover:text-lunaticos-green">+</button>
                            </div>
                        </div>

                        <!-- Add to Cart Buttons -->
                        <div class="space-y-4">
                            <button type="submit" class="w-full btn-primary text-lg py-4">
                                Agregar al Carrito
                            </button>
                            
                            <a href="{{ route('whatsapp', $product) }}" target="_blank"
                               class="w-full btn-secondary text-lg py-4 text-center block">
                                Consultar por WhatsApp
                            </a>
                        </div>
                    </form>
                @else
                    <div class="space-y-4">
                        <button disabled class="w-full bg-gray-300 text-gray-500 font-semibold py-4 px-6 rounded-lg cursor-not-allowed">
                            Sin Stock Disponible
                        </button>
                        
                        <a href="{{ route('whatsapp', $product) }}" target="_blank"
                           class="w-full btn-outline text-lg py-4 text-center block">
                            Consultar Disponibilidad
                        </a>
                    </div>
                @endif

                <!-- Product Details -->
                <div class="border-t border-gray-700 pt-6">
                    <h3 class="font-heading text-xl font-semibold text-white mb-4">Detalles del Producto</h3>
                    <div class="prose prose-gray max-w-none text-silver-300">
                        {{ $product->description }}
                    </div>
                </div>

                <!-- Product Meta -->
                <div class="border-t border-gray-700 pt-6 space-y-2 text-sm text-silver-300">
                    <div><strong>SKU:</strong> {{ $product->sku }}</div>
                    <div><strong>Categoría:</strong> <a href="{{ route('shop', ['category' => $product->category->slug]) }}" class="text-lunaticos-green hover:underline">{{ $product->category->name }}</a></div>
                </div>
            </div>
        </div>

        <!-- Related Products -->
        @if($relatedProducts->count() > 0)
            <section class="py-16 border-t border-gray-700">
                <h2 class="font-heading text-3xl font-bold text-white mb-8">Productos Relacionados</h2>
                
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                    @foreach($relatedProducts as $relatedProduct)
                        <div class="product-card relative group bg-gray-900 border border-gray-800 rounded-xl overflow-hidden">
                            <div class="aspect-square overflow-hidden">
                                <img src="{{ $relatedProduct->main_image }}" 
                                     alt="{{ $relatedProduct->name }}" 
                                     class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                                
                                @if($relatedProduct->sale_price)
                                    <div class="absolute top-4 left-4 bg-lunaticos-red text-white px-3 py-1 rounded-full text-sm font-semibold">
                                        -{{ $relatedProduct->discount_percentage }}%
                                    </div>
                                @endif
                            </div>
                            
                            <div class="p-6">
                                <div class="text-sm text-lunaticos-green font-medium mb-2">
                                    {{ $relatedProduct->category->name }}
                                </div>
                                <h3 class="font-heading text-xl font-semibold text-white mb-3 group-hover:text-lunaticos-red transition-colors">
                                    {{ $relatedProduct->name }}
                                </h3>
                                
                                <div class="text-white text-lg font-bold mb-4">
                                    @if($relatedProduct->sale_price)
                                        <span>${{ number_format($relatedProduct->sale_price, 0, ',', '.') }}</span>
                                        <span class="text-sm text-gray-500 line-through ml-2">${{ number_format($relatedProduct->price, 0, ',', '.') }}</span>
                                    @else
                                        <span>${{ number_format($relatedProduct->price, 0, ',', '.') }}</span>
                                    @endif
                                </div>
                                
                                <a href="{{ route('product.show', $relatedProduct->slug) }}" 
                                   class="w-full btn-primary text-center block">
                                    Ver Producto
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </section>
        @endif
    </div>
</div>
@endsection

@push('scripts')
<script>
    // Change main image
    function changeMainImage(imageSrc, element) {
        document.getElementById('main-image').src = imageSrc;
        
        // Update active thumbnail
        document.querySelectorAll('.grid button').forEach(btn => {
            btn.classList.remove('border-lunaticos-green');
            btn.classList.add('border-transparent');
        });
        element.classList.remove('border-transparent');
        element.classList.add('border-lunaticos-green');
    }

    // Change quantity
    function changeQuantity(delta) {
        const quantityInput = document.getElementById('quantity');
        const currentValue = parseInt(quantityInput.value);
        const maxValue = parseInt(quantityInput.max);
        const minValue = parseInt(quantityInput.min);
        
        const newValue = currentValue + delta;
        
        if (newValue >= minValue && newValue <= maxValue) {
            quantityInput.value = newValue;
        }
    }

    // Handle add to cart form submission
    document.getElementById('add-to-cart-form')?.addEventListener('submit', function(e) {
        e.preventDefault();
        
        const formData = new FormData(this);
        
        // TODO: Implement AJAX add to cart
        alert('Producto agregado al carrito (funcionalidad en desarrollo)');
    });
</script>
@endpush
