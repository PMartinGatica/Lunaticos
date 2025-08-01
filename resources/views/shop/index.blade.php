@extends('layouts.app')

@section('title', 'Tienda - Lunáticos Indumentaria Deportiva')
@section('description', 'Descubre nuestra colección completa de indumentaria deportiva y futbolística. Encuentra las mejores camisetas, equipaciones y accesorios deportivos.')

@section('content')
<div class="bg-black min-h-screen">
    <div class="container mx-auto px-4 py-8">
        <!-- Header Section -->
        <div class="text-center mb-12">
            <h1 class="text-4xl lg:text-5xl font-bold text-white mb-4">
                Nuestra <span class="text-gold-400">Tienda</span>
            </h1>
            <p class="text-xl text-silver-300 max-w-2xl mx-auto">
                Descubre la mejor indumentaria deportiva con la calidad y estilo que buscas
            </p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
            <!-- Sidebar Filters -->
            <div class="lg:col-span-1">
                <div class="bg-gray-900 rounded-xl p-6 border border-gray-800 sticky top-24">
                    <h3 class="text-xl font-semibold text-white mb-6">Filtros</h3>
                    
                    <form method="GET" action="{{ route('shop') }}" id="filter-form">
                        <!-- Search -->
                        <div class="mb-6">
                            <label class="block text-sm font-medium text-silver-300 mb-2">Buscar</label>
                            <input type="text" 
                                   name="search"
                                   value="{{ request('search') }}"
                                   placeholder="Buscar productos..." 
                                   class="w-full bg-gray-800 border border-gray-700 text-white rounded-lg px-4 py-3 focus:border-gold-500 focus:ring-2 focus:ring-gold-500/20 transition-all">
                        </div>

                        <!-- Categories -->
                        <div class="mb-6">
                            <label class="block text-sm font-medium text-silver-300 mb-2">Categorías</label>
                            <div class="space-y-2">
                                @if(isset($categories) && $categories->count() > 0)
                                    @foreach($categories as $category)
                                    <label class="flex items-center">
                                        <input type="checkbox" 
                                               name="categories[]" 
                                               value="{{ $category->id }}"
                                               {{ in_array($category->id, request('categories', [])) ? 'checked' : '' }}
                                               class="rounded border-gray-600 text-gold-500 focus:ring-gold-500/20 bg-gray-800">
                                        <span class="ml-2 text-silver-300">{{ $category->name }}</span>
                                    </label>
                                    @endforeach
                                @else
                                    <label class="flex items-center">
                                        <input type="checkbox" class="rounded border-gray-600 text-gold-500 focus:ring-gold-500/20 bg-gray-800">
                                        <span class="ml-2 text-silver-300">Camisetas de Fútbol</span>
                                    </label>
                                    <label class="flex items-center">
                                        <input type="checkbox" class="rounded border-gray-600 text-gold-500 focus:ring-gold-500/20 bg-gray-800">
                                        <span class="ml-2 text-silver-300">Pantalones Deportivos</span>
                                    </label>
                                    <label class="flex items-center">
                                        <input type="checkbox" class="rounded border-gray-600 text-gold-500 focus:ring-gold-500/20 bg-gray-800">
                                        <span class="ml-2 text-silver-300">Zapatillas</span>
                                    </label>
                                    <label class="flex items-center">
                                        <input type="checkbox" class="rounded border-gray-600 text-gold-500 focus:ring-gold-500/20 bg-gray-800">
                                        <span class="ml-2 text-silver-300">Accesorios</span>
                                    </label>
                                @endif
                            </div>
                        </div>

                        <!-- Sizes -->
                        <div class="mb-6">
                            <label class="block text-sm font-medium text-silver-300 mb-2">Talles</label>
                            <div class="grid grid-cols-3 gap-2">
                                @if(isset($sizes) && $sizes->count() > 0)
                                    @foreach($sizes as $size)
                                    <label class="flex items-center justify-center">
                                        <input type="checkbox" 
                                               name="sizes[]" 
                                               value="{{ $size->id }}"
                                               {{ in_array($size->id, request('sizes', [])) ? 'checked' : '' }}
                                               class="sr-only peer">
                                        <span class="w-full text-center py-2 px-1 text-xs border border-gray-700 rounded-lg bg-gray-800 text-silver-300 cursor-pointer transition-all peer-checked:bg-gold-500 peer-checked:text-black peer-checked:border-gold-500 hover:border-gold-500/50">
                                            {{ $size->name }}
                                        </span>
                                    </label>
                                    @endforeach
                                @else
                                    @foreach(['XS', 'S', 'M', 'L', 'XL', 'XXL'] as $size)
                                    <label class="flex items-center justify-center">
                                        <input type="checkbox" 
                                               name="sizes[]" 
                                               value="{{ $size }}"
                                               {{ in_array($size, request('sizes', [])) ? 'checked' : '' }}
                                               class="sr-only peer">
                                        <span class="w-full text-center py-2 px-1 text-xs border border-gray-700 rounded-lg bg-gray-800 text-silver-300 cursor-pointer transition-all peer-checked:bg-gold-500 peer-checked:text-black peer-checked:border-gold-500 hover:border-gold-500/50">
                                            {{ $size }}
                                        </span>
                                    </label>
                                    @endforeach
                                @endif
                            </div>
                        </div>

                        <!-- Price Range -->
                        <div class="mb-6">
                            <label class="block text-sm font-medium text-silver-300 mb-2">Rango de Precio</label>
                            <div class="grid grid-cols-2 gap-2">
                                <input type="number" 
                                       name="min_price"
                                       value="{{ request('min_price') }}"
                                       placeholder="Mín" 
                                       class="bg-gray-800 border border-gray-700 text-white rounded-lg px-3 py-2 focus:border-gold-500 text-sm">
                                <input type="number" 
                                       name="max_price"
                                       value="{{ request('max_price') }}"
                                       placeholder="Máx" 
                                       class="bg-gray-800 border border-gray-700 text-white rounded-lg px-3 py-2 focus:border-gold-500 text-sm">
                            </div>
                        </div>

                        <!-- Sort -->
                        <div class="mb-6">
                            <label class="block text-sm font-medium text-silver-300 mb-2">Ordenar por</label>
                            <select name="sort" class="w-full bg-gray-800 border border-gray-700 text-white rounded-lg px-4 py-3 focus:border-gold-500">
                                <option value="newest" {{ request('sort') == 'newest' ? 'selected' : '' }}>Más recientes</option>
                                <option value="price_asc" {{ request('sort') == 'price_asc' ? 'selected' : '' }}>Precio: menor a mayor</option>
                                <option value="price_desc" {{ request('sort') == 'price_desc' ? 'selected' : '' }}>Precio: mayor a menor</option>
                                <option value="popular" {{ request('sort') == 'popular' ? 'selected' : '' }}>Más populares</option>
                                <option value="rating" {{ request('sort') == 'rating' ? 'selected' : '' }}>Mejor valorados</option>
                            </select>
                        </div>

                        <!-- Apply/Clear Filters -->
                        <div class="space-y-2">
                            <button type="submit" class="w-full bg-gold-500 hover:bg-gold-400 text-black font-semibold py-2 px-4 rounded-lg transition-colors">
                                Aplicar Filtros
                            </button>
                            <a href="{{ route('shop') }}" class="w-full bg-gray-800 hover:bg-gray-700 text-silver-300 hover:text-white border border-gray-700 py-2 px-4 rounded-lg transition-colors text-center block">
                                Limpiar Filtros
                            </a>
                        </div>
                    </form>
                </div>
            </div>
            <!-- Products Grid -->
            <div class="lg:col-span-3">
                <!-- Results Header -->
                <div class="flex justify-between items-center mb-6">
                    <p class="text-silver-300">
                        @if(isset($products) && $products->count() > 0)
                            Mostrando <span class="text-white font-semibold">{{ $products->count() }}</span> de <span class="text-white font-semibold">{{ $products->total() ?? $products->count() }}</span> productos
                        @else
                            Mostrando <span class="text-white font-semibold">12</span> de <span class="text-white font-semibold">120</span> productos
                        @endif
                    </p>
                    <div class="flex space-x-2">
                        <button class="p-2 bg-gray-900 border border-gray-800 rounded-lg text-silver-400 hover:text-gold-400 transition-colors" title="Vista de cuadrícula">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/>
                            </svg>
                        </button>
                        <button class="p-2 bg-gray-900 border border-gray-800 rounded-lg text-silver-400 hover:text-gold-400 transition-colors" title="Vista de lista">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M3 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"/>
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Products Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">
                    @if(isset($products) && $products->count() > 0)
                        @foreach($products as $product)
                        <div class="elegant-product-card group">
                            <a href="{{ route('product.show', $product->slug) }}">
                                <div class="relative overflow-hidden rounded-t-xl">
                                    <img src="{{ $product->main_image ?? asset('images/placeholder-product.jpg') }}" 
                                         alt="{{ $product->name }}" 
                                         class="w-full h-64 object-cover transform group-hover:scale-105 transition-transform duration-300"
                                         onerror="this.src='https://via.placeholder.com/400x400/111111/666666?text={{ urlencode($product->name) }}'">
                                    
                                    @if($product->sale_price && $product->discount_percentage > 0)
                                    <div class="absolute top-3 right-3 bg-gold-500 text-black text-xs font-bold py-1 px-2 rounded-full">
                                        {{ $product->discount_percentage }}% OFF
                                    </div>
                                    @endif
                                    
                                    @if($product->is_new ?? false)
                                    <div class="absolute top-3 left-3 bg-green-500 text-white text-xs font-bold py-1 px-2 rounded-full">
                                        NUEVO
                                    </div>
                                    @endif
                                </div>
                            </a>
                            
                            <div class="p-4">
                                <div class="text-xs text-gold-400 font-medium mb-2">
                                    {{ $product->category->name ?? 'Sin categoría' }}
                                </div>
                                <h3 class="text-sm text-silver-300 line-clamp-2 mb-3 group-hover:text-white transition-colors">
                                    {{ $product->name }}
                                </h3>
                                <div class="flex items-center justify-between">
                                    @if($product->sale_price)
                                    <div class="flex items-center space-x-2">
                                        <p class="text-lg font-bold text-gold-400">${{ number_format($product->sale_price, 0, ',', '.') }}</p>
                                        <p class="text-sm text-gray-500 line-through">${{ number_format($product->price, 0, ',', '.') }}</p>
                                    </div>
                                    @else
                                    <p class="text-lg font-bold text-gold-400">${{ number_format($product->price, 0, ',', '.') }}</p>
                                    @endif
                                    <p class="text-xs text-silver-400">Envío gratis</p>
                                </div>
                                
                                <!-- Quick Actions -->
                                <div class="mt-3 flex space-x-2">
                                    <a href="{{ route('product.show', $product->slug) }}" class="flex-1 bg-gold-500 hover:bg-gold-400 text-black font-semibold py-2 px-3 rounded-lg text-sm transition-colors text-center">
                                        Ver Producto
                                    </a>
                                    <button class="p-2 bg-gray-800 hover:bg-gray-700 text-silver-400 hover:text-red-400 rounded-lg transition-colors" title="Agregar a favoritos">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    @else
                        <!-- Productos de ejemplo si no hay datos -->
                        @for($i = 1; $i <= 12; $i++)
                        <div class="elegant-product-card group">
                            <a href="{{ route('product.show', 'producto-' . $i) }}">
                                <div class="relative overflow-hidden rounded-t-xl">
                                    <img src="https://via.placeholder.com/400x400/111111/666666?text=Producto+{{ $i }}" 
                                         alt="Producto {{ $i }}" 
                                         class="w-full h-64 object-cover transform group-hover:scale-105 transition-transform duration-300">
                                    
                                    @if($i % 3 == 0)
                                    <div class="absolute top-3 right-3 bg-gold-500 text-black text-xs font-bold py-1 px-2 rounded-full">
                                        20% OFF
                                    </div>
                                    @endif
                                    
                                    @if($i % 4 == 0)
                                    <div class="absolute top-3 left-3 bg-green-500 text-white text-xs font-bold py-1 px-2 rounded-full">
                                        NUEVO
                                    </div>
                                    @endif
                                </div>
                            </a>
                            
                            <div class="p-4">
                                <div class="text-xs text-gold-400 font-medium mb-2">
                                    {{ ['Camisetas', 'Pantalones', 'Zapatillas', 'Accesorios'][($i-1) % 4] }}
                                </div>
                                <h3 class="text-sm text-silver-300 line-clamp-2 mb-3 group-hover:text-white transition-colors">
                                    Producto de ejemplo {{ $i }} - Indumentaria deportiva de alta calidad
                                </h3>
                                <div class="flex items-center justify-between">
                                    @if($i % 3 == 0)
                                    <div class="flex items-center space-x-2">
                                        <p class="text-lg font-bold text-gold-400">${{ number_format(50000 - ($i * 1000), 0, ',', '.') }}</p>
                                        <p class="text-sm text-gray-500 line-through">${{ number_format(62500 - ($i * 1250), 0, ',', '.') }}</p>
                                    </div>
                                    @else
                                    <p class="text-lg font-bold text-gold-400">${{ number_format(50000 - ($i * 1000), 0, ',', '.') }}</p>
                                    @endif
                                    <p class="text-xs text-silver-400">Envío gratis</p>
                                </div>
                                
                                <!-- Quick Actions -->
                                <div class="mt-3 flex space-x-2">
                                    <button class="flex-1 bg-gold-500 hover:bg-gold-400 text-black font-semibold py-2 px-3 rounded-lg text-sm transition-colors">
                                        Ver Producto
                                    </button>
                                    <button class="p-2 bg-gray-800 hover:bg-gray-700 text-silver-400 hover:text-red-400 rounded-lg transition-colors">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                        @endfor
                    @endif
                </div>

                <!-- Pagination -->
                @if(isset($products) && method_exists($products, 'links'))
                    <div class="mt-12">
                        {{ $products->links() }}
                    </div>
                @else
                    <div class="mt-12 flex justify-center">
                        <nav class="flex space-x-2">
                            <button class="px-3 py-2 bg-gray-900 border border-gray-800 text-silver-400 rounded-lg hover:bg-gray-800 transition-colors">
                                Anterior
                            </button>
                            <button class="px-3 py-2 bg-gold-500 text-black font-semibold rounded-lg">1</button>
                            <button class="px-3 py-2 bg-gray-900 border border-gray-800 text-silver-400 rounded-lg hover:bg-gray-800 transition-colors">2</button>
                            <button class="px-3 py-2 bg-gray-900 border border-gray-800 text-silver-400 rounded-lg hover:bg-gray-800 transition-colors">3</button>
                            <span class="px-3 py-2 text-silver-400">...</span>
                            <button class="px-3 py-2 bg-gray-900 border border-gray-800 text-silver-400 rounded-lg hover:bg-gray-800 transition-colors">10</button>
                            <button class="px-3 py-2 bg-gray-900 border border-gray-800 text-silver-400 rounded-lg hover:bg-gray-800 transition-colors">
                                Siguiente
                            </button>
                        </nav>
                    </div>
                @endif
            </div>
        </div>

        <!-- Featured Categories Section -->
        <section class="mt-16 py-12 border-t border-gray-800">
            <h2 class="text-3xl font-bold text-white text-center mb-8">
                Explora por <span class="text-gold-400">Categorías</span>
            </h2>
            <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-4">
                @if(isset($categories) && $categories->count() > 0)
                    @foreach($categories->take(6) as $category)
                    <a href="{{ route('shop', ['category' => $category->slug]) }}" class="group bg-gray-900 rounded-xl p-6 border border-gray-800 hover:border-gold-500/50 text-center transition-all duration-300 hover:scale-105">
                        <div class="w-16 h-16 bg-gradient-to-br from-gold-500 to-gold-600 rounded-full flex items-center justify-center mx-auto mb-3 group-hover:shadow-lg group-hover:shadow-gold-500/20">
                            <span class="text-black font-bold text-xl">{{ substr($category->name, 0, 1) }}</span>
                        </div>
                        <span class="text-sm text-silver-300 group-hover:text-gold-400 transition-colors">{{ $category->name }}</span>
                    </a>
                    @endforeach
                @else
                    @foreach(['Camisetas', 'Pantalones', 'Zapatillas', 'Accesorios', 'Equipaciones', 'Entrenamiento'] as $category)
                    <a href="#" class="group bg-gray-900 rounded-xl p-6 border border-gray-800 hover:border-gold-500/50 text-center transition-all duration-300 hover:scale-105">
                        <div class="w-16 h-16 bg-gradient-to-br from-gold-500 to-gold-600 rounded-full flex items-center justify-center mx-auto mb-3 group-hover:shadow-lg group-hover:shadow-gold-500/20">
                            <span class="text-black font-bold text-xl">{{ substr($category, 0, 1) }}</span>
                        </div>
                        <span class="text-sm text-silver-300 group-hover:text-gold-400 transition-colors">{{ $category }}</span>
                    </a>
                    @endforeach
                @endif
            </div>
        </section>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // Auto-submit form on filter change
    document.querySelectorAll('#filter-form input, #filter-form select').forEach(element => {
        element.addEventListener('change', function() {
            if (this.type !== 'text' && this.type !== 'number') {
                document.getElementById('filter-form').submit();
            }
        });
    });

    // Search functionality with debounce
    let searchTimeout;
    document.querySelector('input[name="search"]').addEventListener('input', function(e) {
        clearTimeout(searchTimeout);
        searchTimeout = setTimeout(() => {
            document.getElementById('filter-form').submit();
        }, 500);
    });

    // Add to favorites functionality
    document.querySelectorAll('[title="Agregar a favoritos"]').forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
            this.classList.toggle('text-red-500');
            // TODO: Implement favorites functionality
        });
    });

    // Intersection Observer for product animations
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

    document.querySelectorAll('.ml-product-card').forEach(card => {
        observer.observe(card);
    });
</script>
@endpush
