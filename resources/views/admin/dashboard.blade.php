@extends('admin.layout')

@section('title', 'Dashboard - Panel Admin Lunáticos')
@section('page-title', 'Dashboard')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    <!-- Productos -->
    <div class="bg-gray-800 rounded-lg p-6 border border-gray-700">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-400 text-sm">Total Productos</p>
                <p class="text-2xl font-semibold text-white">{{ $totalProducts }}</p>
            </div>
            <div class="bg-blue-900 p-3 rounded-lg">
                <svg class="w-6 h-6 text-blue-300" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 2L3 7v11a2 2 0 002 2h10a2 2 0 002-2V7l-7-5z" clip-rule="evenodd" />
                </svg>
            </div>
        </div>
    </div>

    <!-- Categorías -->
    <div class="bg-gray-800 rounded-lg p-6 border border-gray-700">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-400 text-sm">Categorías</p>
                <p class="text-2xl font-semibold text-white">{{ $totalCategories }}</p>
            </div>
            <div class="bg-green-900 p-3 rounded-lg">
                <svg class="w-6 h-6 text-green-300" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M7 3a1 1 0 000 2h6a1 1 0 100-2H7zM4 7a1 1 0 011-1h10a1 1 0 110 2H5a1 1 0 01-1-1zM2 11a2 2 0 012-2h12a2 2 0 012 2v4a2 2 0 01-2 2H4a2 2 0 01-2-2v-4z" />
                </svg>
            </div>
        </div>
    </div>

    <!-- Usuarios -->
    <div class="bg-gray-800 rounded-lg p-6 border border-gray-700">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-400 text-sm">Usuarios</p>
                <p class="text-2xl font-semibold text-white">{{ $totalUsers }}</p>
            </div>
            <div class="bg-purple-900 p-3 rounded-lg">
                <svg class="w-6 h-6 text-purple-300" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z" />
                </svg>
            </div>
        </div>
    </div>

    <!-- Stock Bajo -->
    <div class="bg-gray-800 rounded-lg p-6 border border-gray-700">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-400 text-sm">Stock Bajo</p>
                <p class="text-2xl font-semibold text-red-400">{{ $lowStockProducts }}</p>
            </div>
            <div class="bg-red-900 p-3 rounded-lg">
                <svg class="w-6 h-6 text-red-300" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                </svg>
            </div>
        </div>
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
    <!-- Productos Recientes -->
    <div class="bg-gray-800 rounded-lg border border-gray-700">
        <div class="p-6 border-b border-gray-700">
            <h3 class="text-lg font-semibold text-white">Productos Recientes</h3>
        </div>
        <div class="p-6">
            @if($recentProducts->count() > 0)
                <div class="space-y-3">
                    @foreach($recentProducts as $product)
                        <div class="flex items-center justify-between py-2">
                            <div>
                                <p class="text-white font-medium">{{ $product->name }}</p>
                                <p class="text-sm text-gray-400">{{ $product->category->name ?? 'Sin categoría' }}</p>
                            </div>
                            <div class="text-right">
                                <p class="text-gold-400 font-semibold">${{ number_format($product->price, 0, ',', '.') }}</p>
                                <p class="text-sm text-gray-400">Stock: {{ $product->stock }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="mt-4">
                    <a href="{{ route('admin.products') }}" class="text-gold-400 hover:text-gold-300 text-sm">Ver todos los productos →</a>
                </div>
            @else
                <p class="text-gray-400">No hay productos aún.</p>
            @endif
        </div>
    </div>

    <!-- Productos con Stock Bajo -->
    <div class="bg-gray-800 rounded-lg border border-gray-700">
        <div class="p-6 border-b border-gray-700">
            <h3 class="text-lg font-semibold text-white">Alertas de Stock</h3>
        </div>
        <div class="p-6">
            @if($lowStockList->count() > 0)
                <div class="space-y-3">
                    @foreach($lowStockList as $product)
                        <div class="flex items-center justify-between py-2">
                            <div>
                                <p class="text-white font-medium">{{ $product->name }}</p>
                                <p class="text-sm text-gray-400">{{ $product->category->name ?? 'Sin categoría' }}</p>
                            </div>
                            <div class="text-right">
                                <span class="inline-block px-2 py-1 text-xs font-semibold rounded-full {{ $product->stock <= 2 ? 'bg-red-900 text-red-200' : 'bg-yellow-900 text-yellow-200' }}">
                                    Stock: {{ $product->stock }}
                                </span>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="mt-4">
                    <a href="{{ route('admin.products') }}?filter=low_stock" class="text-red-400 hover:text-red-300 text-sm">Ver productos con stock bajo →</a>
                </div>
            @else
                <p class="text-gray-400">¡Todos los productos tienen stock suficiente!</p>
            @endif
        </div>
    </div>
</div>

<!-- Acciones Rápidas -->
<div class="mt-8">
    <h3 class="text-lg font-semibold text-white mb-4">Acciones Rápidas</h3>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <a href="{{ route('admin.products') }}" class="bg-gradient-to-r from-gold-600 to-gold-400 hover:from-gold-500 hover:to-gold-300 text-black font-semibold py-3 px-6 rounded-lg transition duration-300 text-center">
            Gestionar Productos
        </a>
        <a href="{{ route('admin.customers') }}" class="bg-gray-700 hover:bg-gray-600 text-white font-semibold py-3 px-6 rounded-lg transition duration-300 text-center">
            Ver Clientes
        </a>
        <a href="{{ route('admin.analytics') }}" class="bg-gray-700 hover:bg-gray-600 text-white font-semibold py-3 px-6 rounded-lg transition duration-300 text-center">
            Ver Estadísticas
        </a>
    </div>
</div>
@endsection
