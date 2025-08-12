@extends('layouts.admin')

@section('title', 'Productos')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <!-- Header -->
    <div class="flex justify-between items-center mb-8">
        <div>
            <h1 class="text-3xl font-bold text-white">Productos</h1>
            <p class="text-gray-400 mt-1">Gestiona tu catálogo de productos</p>
        </div>
        <div class="flex space-x-3">
            <a href="{{ route('admin.import.index') }}" 
               class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-500 text-white font-medium rounded-lg transition duration-200">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                </svg>
                Importar Productos
            </a>
            <a href="{{ route('admin.products.create') }}" 
               class="inline-flex items-center px-4 py-2 bg-yellow-500 hover:bg-yellow-400 text-gray-900 font-medium rounded-lg transition duration-200">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                </svg>
                Nuevo Producto
            </a>
        </div>
    </div>

    <!-- Filtros y ordenamiento -->
    <div class="bg-gray-800 rounded-lg border border-gray-700 p-6 mb-6">
        <form method="GET" action="{{ route('admin.products.index') }}" class="space-y-4">
            <div class="grid grid-cols-1 md:grid-cols-5 gap-4">
                <!-- Búsqueda -->
                <div>
                    <label for="search" class="block text-sm font-medium text-gray-300 mb-2">Buscar</label>
                    <input type="text" 
                           id="search" 
                           name="search" 
                           value="{{ request('search') }}"
                           placeholder="Nombre o SKU..."
                           class="w-full bg-gray-700 border border-gray-600 rounded-lg px-4 py-2 text-white placeholder-gray-400 focus:border-yellow-500 focus:ring-yellow-500">
                </div>

                <!-- Categoría -->
                <div>
                    <label for="category" class="block text-sm font-medium text-gray-300 mb-2">Categoría</label>
                    <select id="category" 
                            name="category" 
                            class="w-full bg-gray-700 border border-gray-600 rounded-lg px-4 py-2 text-white focus:border-yellow-500 focus:ring-yellow-500">
                        <option value="">Todas las categorías</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Estado -->
                <div>
                    <label for="status" class="block text-sm font-medium text-gray-300 mb-2">Estado</label>
                    <select id="status" 
                            name="status" 
                            class="w-full bg-gray-700 border border-gray-600 rounded-lg px-4 py-2 text-white focus:border-yellow-500 focus:ring-yellow-500">
                        <option value="">Todos los estados</option>
                        <option value="published" {{ request('status') === 'published' ? 'selected' : '' }}>Publicado</option>
                        <option value="draft" {{ request('status') === 'draft' ? 'selected' : '' }}>Borrador</option>
                        <option value="private" {{ request('status') === 'private' ? 'selected' : '' }}>Privado</option>
                    </select>
                </div>

                <!-- Ordenar por -->
                <div>
                    <label for="sort_by" class="block text-sm font-medium text-gray-300 mb-2">Ordenar por</label>
                    <select id="sort_by" 
                            name="sort_by" 
                            class="w-full bg-gray-700 border border-gray-600 rounded-lg px-4 py-2 text-white focus:border-yellow-500 focus:ring-yellow-500">
                        <option value="id" {{ request('sort_by', 'id') === 'id' ? 'selected' : '' }}>ID</option>
                        <option value="name" {{ request('sort_by') === 'name' ? 'selected' : '' }}>Nombre</option>
                        <option value="sku" {{ request('sort_by') === 'sku' ? 'selected' : '' }}>SKU</option>
                        <option value="regular_price" {{ request('sort_by') === 'regular_price' ? 'selected' : '' }}>Precio</option>
                        <option value="stock_quantity" {{ request('sort_by') === 'stock_quantity' ? 'selected' : '' }}>Stock</option>
                        <option value="created_at" {{ request('sort_by') === 'created_at' ? 'selected' : '' }}>Fecha creación</option>
                    </select>
                </div>

                <!-- Orden -->
                <div>
                    <label for="sort_order" class="block text-sm font-medium text-gray-300 mb-2">Orden</label>
                    <select id="sort_order" 
                            name="sort_order" 
                            class="w-full bg-gray-700 border border-gray-600 rounded-lg px-4 py-2 text-white focus:border-yellow-500 focus:ring-yellow-500">
                        <option value="asc" {{ request('sort_order', 'desc') === 'asc' ? 'selected' : '' }}>Ascendente</option>
                        <option value="desc" {{ request('sort_order', 'desc') === 'desc' ? 'selected' : '' }}>Descendente</option>
                    </select>
                </div>
            </div>

            <!-- Botones y resultados por página -->
            <div class="flex items-center justify-between flex-wrap gap-4">
                <div class="flex space-x-3">
                    <button type="submit" 
                            class="px-4 py-2 bg-yellow-500 hover:bg-yellow-400 text-gray-900 font-medium rounded-lg transition duration-200">
                        Filtrar
                    </button>
                    <a href="{{ route('admin.products.index') }}" 
                       class="px-4 py-2 bg-gray-600 hover:bg-gray-500 text-white rounded-lg transition duration-200">
                        Limpiar
                    </a>
                </div>

                <!-- Resultados por página -->
                <div class="flex items-center space-x-2">
                    <label for="per_page" class="text-sm text-gray-300">Mostrar:</label>
                    <select id="per_page" 
                            name="per_page" 
                            onchange="this.form.submit()"
                            class="bg-gray-700 border border-gray-600 rounded px-3 py-1 text-white text-sm focus:border-yellow-500 focus:ring-yellow-500">
                        <option value="10" {{ request('per_page', 25) == 10 ? 'selected' : '' }}>10</option>
                        <option value="25" {{ request('per_page', 25) == 25 ? 'selected' : '' }}>25</option>
                        <option value="50" {{ request('per_page', 25) == 50 ? 'selected' : '' }}>50</option>
                        <option value="100" {{ request('per_page', 25) == 100 ? 'selected' : '' }}>100</option>
                    </select>
                    <span class="text-sm text-gray-300">por página</span>
                </div>
            </div>
        </form>
    </div>

    <!-- Acciones masivas -->
    <form id="bulk-actions-form" method="POST" action="{{ route('admin.products.bulk-action') }}">
        @csrf
        <div class="bg-gray-800 rounded-lg border border-gray-700 p-4 mb-6">
            <div class="flex items-center justify-between flex-wrap gap-4">
                <select name="action" 
                        class="bg-gray-700 border border-gray-600 rounded-lg px-4 py-2 text-white focus:border-yellow-500 focus:ring-yellow-500">
                    <option value="">Acciones masivas...</option>
                    <option value="publish">Publicar seleccionados</option>
                    <option value="draft">Marcar como borrador</option>
                    <option value="delete">Eliminar seleccionados</option>
                </select>
                <button type="submit" 
                        class="px-4 py-2 bg-yellow-500 hover:bg-yellow-400 text-gray-900 font-medium rounded-lg transition duration-200">
                    Aplicar
                </button>
                <span class="text-gray-400 text-sm" id="selected-count">0 productos seleccionados</span>
            </div>
        </div>

        <!-- Estadísticas -->
        <div class="bg-gray-800 rounded-lg border border-gray-700 p-4 mb-6">
            <div class="text-center text-gray-300">
                <span class="text-lg font-medium">
                    {{ $products->total() }} productos en total
                </span>
                @if(request()->hasAny(['search', 'category', 'status']))
                    <span class="text-sm text-gray-400 ml-2">
                        ({{ $products->count() }} mostrados)
                    </span>
                @endif
            </div>
        </div>

        <!-- Tabla de productos -->
        <div class="bg-gray-800 rounded-lg border border-gray-700 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full divide-y divide-gray-700">
                    <thead class="bg-gray-700">
                        <tr>
                            <th class="w-12 px-4 py-3 text-left">
                                <input type="checkbox" 
                                       id="select-all" 
                                       class="rounded border-gray-500 bg-gray-600 text-yellow-500 focus:ring-yellow-500 focus:ring-2">
                            </th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">
                                ID / Producto
                            </th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider min-w-[120px]">
                                SKU
                            </th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider min-w-[100px]">
                                Precio
                            </th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider min-w-[80px]">
                                Stock
                            </th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider min-w-[100px]">
                                Estado
                            </th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider min-w-[120px]">
                                Acciones
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-gray-800 divide-y divide-gray-700">
                        @forelse($products as $product)
                            <tr class="hover:bg-gray-700 transition-colors duration-150">
                                <td class="px-4 py-4">
                                    <input type="checkbox" 
                                           name="products[]" 
                                           value="{{ $product->id }}" 
                                           class="product-checkbox rounded border-gray-500 bg-gray-600 text-yellow-500 focus:ring-yellow-500 focus:ring-2">
                                </td>
                                <td class="px-4 py-4">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-10 w-10">
                                            @if($product->images->count() > 0)
                                                <img class="h-10 w-10 rounded-lg object-cover" 
                                                     src="{{ asset('storage/' . $product->images->first()->image_path) }}" 
                                                     alt="{{ $product->name }}">
                                            @else
                                                <div class="h-10 w-10 rounded-lg bg-gray-600 flex items-center justify-center">
                                                    <svg class="h-6 w-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                                    </svg>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-xs text-gray-500 font-mono">#{{ $product->id }}</div>
                                            <div class="text-sm font-medium text-white">{{ Str::limit($product->name, 30) }}</div>
                                            <div class="text-sm text-gray-400">
                                                @if($product->categories->count() > 0)
                                                    {{ $product->categories->first()->name }}
                                                @else
                                                    Sin categoría
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-4 py-4 text-sm text-gray-300">
                                    {{ $product->sku ?: '-' }}
                                </td>
                                <td class="px-4 py-4">
                                    <div class="text-sm text-white font-medium">
                                        ${{ number_format($product->regular_price, 0, ',', '.') }}
                                    </div>
                                    @if($product->sale_price)
                                        <div class="text-xs text-yellow-400">
                                            Oferta: ${{ number_format($product->sale_price, 0, ',', '.') }}
                                        </div>
                                    @endif
                                </td>
                                <td class="px-4 py-4">
                                    @if($product->manage_stock)
                                        <div class="flex items-center">
                                            <span class="text-sm text-white font-medium">{{ $product->stock_quantity ?? 0 }}</span>
                                            @if($product->stock_quantity <= 5)
                                                <span class="ml-2 inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-red-900 text-red-200">
                                                    Bajo
                                                </span>
                                            @endif
                                        </div>
                                    @else
                                        <span class="text-sm text-gray-400">Sin gestión</span>
                                    @endif
                                </td>
                                <td class="px-4 py-4">
                                    @if($product->status === 'published')
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-900 text-green-200">
                                            Publicado
                                        </span>
                                    @elseif($product->status === 'draft')
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-900 text-yellow-200">
                                            Borrador
                                        </span>
                                    @else
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-700 text-gray-300">
                                            Privado
                                        </span>
                                    @endif
                                </td>
                                <td class="px-4 py-4">
                                    <div class="flex items-center space-x-3">
                                        <a href="{{ route('admin.products.show', $product) }}" 
                                           class="text-blue-400 hover:text-blue-300 transition-colors" 
                                           title="Ver">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                            </svg>
                                        </a>
                                        <a href="{{ route('admin.products.edit', $product) }}" 
                                           class="text-yellow-400 hover:text-yellow-300 transition-colors" 
                                           title="Editar">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                            </svg>
                                        </a>
                                        <form method="POST" action="{{ route('admin.products.toggle-status', $product) }}" class="inline">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" 
                                                    class="text-green-400 hover:text-green-300 transition-colors" 
                                                    title="Cambiar estado">
                                                @if($product->status === 'published')
                                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                                    </svg>
                                                @else
                                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.878 9.878L3 3m6.878 6.878L21 21"></path>
                                                    </svg>
                                                @endif
                                            </button>
                                        </form>
                                        <form method="POST" action="{{ route('admin.products.destroy', $product) }}" 
                                              class="inline" 
                                              onsubmit="return confirm('¿Estás seguro de eliminar este producto?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" 
                                                    class="text-red-400 hover:text-red-300 transition-colors" 
                                                    title="Eliminar">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="px-4 py-12 text-center">
                                    <div class="flex flex-col items-center">
                                        <svg class="w-12 h-12 text-gray-500 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                                        </svg>
                                        <p class="text-gray-400 text-lg mb-2">No se encontraron productos</p>
                                        <p class="text-gray-500 text-sm mb-4">Comienza agregando tu primer producto</p>
                                        <a href="{{ route('admin.products.create') }}" 
                                           class="inline-flex items-center px-4 py-2 bg-yellow-500 hover:bg-yellow-400 text-gray-900 font-medium rounded-lg transition duration-200">
                                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                            </svg>
                                            Crear Producto
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </form>

    <!-- Paginación mejorada -->
    @if($products->hasPages())
        <div class="mt-6">
            <div class="bg-gray-800 rounded-lg border border-gray-700 p-4">
                <div class="flex items-center justify-between flex-wrap gap-4">
                    <!-- Información de paginación -->
                    <div class="text-sm text-gray-300">
                        Mostrando {{ $products->firstItem() }} a {{ $products->lastItem() }} de {{ $products->total() }} productos
                    </div>
                    
                    <!-- Enlaces de paginación -->
                    <div class="flex items-center space-x-2">
                        {{-- Página anterior --}}
                        @if ($products->onFirstPage())
                            <span class="px-3 py-2 text-gray-500 bg-gray-700 rounded-lg">
                                Anterior
                            </span>
                        @else
                            <a href="{{ $products->appends(request()->query())->previousPageUrl() }}" 
                               class="px-3 py-2 text-white bg-gray-700 hover:bg-gray-600 rounded-lg transition duration-200">
                                Anterior
                            </a>
                        @endif

                        {{-- Números de página --}}
                        @foreach ($products->appends(request()->query())->getUrlRange(1, $products->lastPage()) as $page => $url)
                            @if ($page == $products->currentPage())
                                <span class="px-3 py-2 text-gray-900 bg-yellow-500 rounded-lg font-medium">
                                    {{ $page }}
                                </span>
                            @else
                                <a href="{{ $url }}" 
                                   class="px-3 py-2 text-white bg-gray-700 hover:bg-gray-600 rounded-lg transition duration-200">
                                    {{ $page }}
                                </a>
                            @endif
                        @endforeach

                        {{-- Página siguiente --}}
                        @if ($products->hasMorePages())
                            <a href="{{ $products->appends(request()->query())->nextPageUrl() }}" 
                               class="px-3 py-2 text-white bg-gray-700 hover:bg-gray-600 rounded-lg transition duration-200">
                                Siguiente
                            </a>
                        @else
                            <span class="px-3 py-2 text-gray-500 bg-gray-700 rounded-lg">
                                Siguiente
                            </span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const selectAll = document.getElementById('select-all');
    const checkboxes = document.querySelectorAll('.product-checkbox');
    const selectedCount = document.getElementById('selected-count');
    const bulkForm = document.getElementById('bulk-actions-form');

    function updateSelectedCount() {
        const checked = document.querySelectorAll('.product-checkbox:checked').length;
        selectedCount.textContent = `${checked} productos seleccionados`;
        
        // Update select all checkbox state
        selectAll.indeterminate = checked > 0 && checked < checkboxes.length;
        selectAll.checked = checked === checkboxes.length && checkboxes.length > 0;
    }

    selectAll.addEventListener('change', function() {
        checkboxes.forEach(checkbox => {
            checkbox.checked = this.checked;
        });
        updateSelectedCount();
    });

    checkboxes.forEach(checkbox => {
        checkbox.addEventListener('change', updateSelectedCount);
    });

    bulkForm.addEventListener('submit', function(e) {
        const checkedBoxes = document.querySelectorAll('.product-checkbox:checked');
        const action = bulkForm.querySelector('[name="action"]').value;
        
        if (checkedBoxes.length === 0) {
            e.preventDefault();
            alert('Selecciona al menos un producto');
            return;
        }
        
        if (!action) {
            e.preventDefault();
            alert('Selecciona una acción');
            return;
        }
        
        if (action === 'delete') {
            if (!confirm(`¿Estás seguro de eliminar ${checkedBoxes.length} productos?`)) {
                e.preventDefault();
            }
        }
    });

    // Initialize count
    updateSelectedCount();
});
</script>
@endpush
@endsection
