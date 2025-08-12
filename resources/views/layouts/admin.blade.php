<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Panel Admin - Lunáticos')</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- Custom Styles for Sidebar -->
    <style>
        /* Tooltip styles - only show when sidebar is collapsed */
        .sidebar-collapsed [data-tooltip] {
            position: relative;
        }
        
        .sidebar-collapsed [data-tooltip]:hover::before {
            content: attr(data-tooltip);
            position: absolute;
            left: 100%;
            top: 50%;
            transform: translateY(-50%);
            margin-left: 10px;
            padding: 8px 12px;
            background-color: rgba(17, 24, 39, 0.95);
            color: white;
            border-radius: 6px;
            font-size: 14px;
            white-space: nowrap;
            z-index: 1000;
            border: 1px solid rgba(75, 85, 99, 0.5);
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            pointer-events: none;
        }
        
        .sidebar-collapsed [data-tooltip]:hover::after {
            content: '';
            position: absolute;
            left: 100%;
            top: 50%;
            transform: translateY(-50%);
            margin-left: 4px;
            border: 6px solid transparent;
            border-right-color: rgba(17, 24, 39, 0.95);
            z-index: 1001;
            pointer-events: none;
        }
        
        /* Smooth transitions */
        .sidebar-transition {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        /* Custom scrollbar for sidebar */
        .sidebar-scroll::-webkit-scrollbar {
            width: 4px;
        }
        
        .sidebar-scroll::-webkit-scrollbar-track {
            background: transparent;
        }
        
        .sidebar-scroll::-webkit-scrollbar-thumb {
            background-color: rgba(75, 85, 99, 0.5);
            border-radius: 2px;
        }
        
        .sidebar-scroll::-webkit-scrollbar-thumb:hover {
            background-color: rgba(75, 85, 99, 0.8);
        }
        
        /* Responsive adjustments for main content */
        @media (max-width: 1023px) {
            #main-content {
                margin-left: 0 !important;
            }
        }
    </style>
    
    @stack('styles')
</head>
<body class="bg-gray-900 text-gray-100 font-sans antialiased">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <div id="sidebar" class="fixed inset-y-0 left-0 z-50 bg-gray-800 transform transition-all duration-300 ease-in-out sidebar-transition sidebar-scroll overflow-y-auto w-64">
            
            <!-- Logo -->
            <div class="flex items-center justify-between h-16 bg-gray-900 border-b border-gray-700 px-4">
                <div class="flex items-center" id="sidebar-logo">
                    <img src="{{ asset('imagenes/lunaticosnegro.jpg') }}" alt="Lunáticos Admin" class="h-8 w-auto">
                    <span class="ml-3 text-lg font-bold text-white transition-all duration-300" id="admin-text">Admin Panel</span>
                </div>
                <!-- Sidebar toggle button -->
                <button onclick="toggleSidebar()" 
                        class="p-2 rounded text-gray-400 hover:text-white hover:bg-gray-700 transition-colors duration-200"
                        id="sidebar-toggle-btn">
                    <svg class="w-4 h-4 transform transition-transform duration-300" 
                         id="sidebar-arrow"
                         fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                    </svg>
                </button>
            </div>
            
            <!-- Navigation -->
            <nav class="mt-4">
                <ul class="space-y-2 px-2">
                    <!-- Dashboard -->
                    <li>
                        <a href="{{ route('admin.dashboard') }}" 
                           class="nav-link flex items-center px-3 py-2 text-gray-300 rounded-lg hover:bg-gray-700 hover:text-white transition-colors duration-200 {{ request()->routeIs('admin.dashboard') ? 'bg-gray-700 text-white' : '' }}"
                           data-tooltip="Dashboard">
                            <svg class="w-5 h-5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zM3 10a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1v-6zM14 9a1 1 0 00-1 1v6a1 1 0 001 1h2a1 1 0 001-1v-6a1 1 0 00-1-1h-2z"></path>
                            </svg>
                            <span class="nav-text ml-3 transition-opacity duration-300">Dashboard</span>
                        </a>
                    </li>
                    
                    <!-- Productos -->
                    <li>
                        <a href="{{ route('admin.products.index') }}" 
                           class="nav-link flex items-center px-3 py-2 text-gray-300 rounded-lg hover:bg-gray-700 hover:text-white transition-colors duration-200 {{ request()->routeIs('admin.products.*') ? 'bg-gray-700 text-white' : '' }}"
                           data-tooltip="Productos">
                            <svg class="w-5 h-5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 2L3 7v11a2 2 0 002 2h10a2 2 0 002-2V7l-7-5z" clip-rule="evenodd" />
                            </svg>
                            <span class="nav-text ml-3 transition-opacity duration-300">Productos</span>
                        </a>
                    </li>
                    
                    <!-- Categorías -->
                    <li>
                        <a href="#" 
                           class="nav-link flex items-center px-3 py-2 text-gray-300 rounded-lg hover:bg-gray-700 hover:text-white transition-colors duration-200"
                           data-tooltip="Categorías">
                            <svg class="w-5 h-5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M7 3a1 1 0 000 2h6a1 1 0 100-2H7zM4 7a1 1 0 011-1h10a1 1 0 110 2H5a1 1 0 01-1-1zM2 11a2 2 0 012-2h12a2 2 0 012 2v4a2 2 0 01-2 2H4a2 2 0 01-2-2v-4z"></path>
                            </svg>
                            <span class="nav-text ml-3 transition-opacity duration-300">Categorías</span>
                        </a>
                    </li>
                    
                    <!-- Pedidos -->
                    <li>
                        <a href="#" 
                           class="nav-link flex items-center px-3 py-2 text-gray-300 rounded-lg hover:bg-gray-700 hover:text-white transition-colors duration-200"
                           data-tooltip="Pedidos">
                            <svg class="w-5 h-5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z"></path>
                            </svg>
                            <span class="nav-text ml-3 transition-opacity duration-300">Pedidos</span>
                        </a>
                    </li>
                    
                    <!-- Clientes -->
                    <li>
                        <a href="#" 
                           class="nav-link flex items-center px-3 py-2 text-gray-300 rounded-lg hover:bg-gray-700 hover:text-white transition-colors duration-200"
                           data-tooltip="Clientes">
                            <svg class="w-5 h-5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z"></path>
                            </svg>
                            <span class="nav-text ml-3 transition-opacity duration-300">Clientes</span>
                        </a>
                    </li>
                    
                    <!-- Inventario -->
                    <li>
                        <a href="#" 
                           class="nav-link flex items-center px-3 py-2 text-gray-300 rounded-lg hover:bg-gray-700 hover:text-white transition-colors duration-200"
                           data-tooltip="Inventario">
                            <svg class="w-5 h-5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path>
                            </svg>
                            <span class="nav-text ml-3 transition-opacity duration-300">Inventario</span>
                        </a>
                    </li>
                    
                    <!-- Reportes -->
                    <li>
                        <a href="#" 
                           class="nav-link flex items-center px-3 py-2 text-gray-300 rounded-lg hover:bg-gray-700 hover:text-white transition-colors duration-200"
                           data-tooltip="Reportes">
                            <svg class="w-5 h-5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M2 11a1 1 0 011-1h2a1 1 0 011 1v5a1 1 0 01-1 1H3a1 1 0 01-1-1v-5zM8 7a1 1 0 011-1h2a1 1 0 011 1v9a1 1 0 01-1 1H9a1 1 0 01-1-1V7zM14 4a1 1 0 011-1h2a1 1 0 011 1v12a1 1 0 01-1 1h-2a1 1 0 01-1-1V4z"></path>
                            </svg>
                            <span class="nav-text ml-3 transition-opacity duration-300">Reportes</span>
                        </a>
                    </li>
                    
                    <!-- Configuración -->
                    <li>
                        <a href="#" 
                           class="nav-link flex items-center px-3 py-2 text-gray-300 rounded-lg hover:bg-gray-700 hover:text-white transition-colors duration-200"
                           data-tooltip="Configuración">
                            <svg class="w-5 h-5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd"></path>
                            </svg>
                            <span class="nav-text ml-3 transition-opacity duration-300">Configuración</span>
                        </a>
                    </li>
                </ul>
            </nav>
            
            <!-- User Info -->
            <div class="absolute bottom-0 left-0 right-0 p-3 border-t border-gray-700">
                <div class="flex items-center" :class="{ 'justify-center': sidebarCollapsed }">
                    <div class="w-8 h-8 bg-gray-600 rounded-full flex items-center justify-center flex-shrink-0">
                        <span class="text-sm font-medium">{{ substr(Auth::user()->name ?? 'A', 0, 1) }}</span>
                    </div>
                    <div class="ml-3 flex-1 transition-opacity duration-300" 
                         :class="{ 'opacity-0 hidden': sidebarCollapsed }" 
                         x-show="!sidebarCollapsed">
                        <p class="text-sm font-medium text-white truncate">{{ Auth::user()->name ?? 'Admin' }}</p>
                        <form method="POST" action="{{ route('logout') }}" class="inline">
                            @csrf
                            <button type="submit" class="text-xs text-gray-400 hover:text-white">Cerrar sesión</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div id="main-content" class="flex-1 flex flex-col transition-all duration-300 ease-in-out" style="margin-left: 256px;">
            <!-- Top Header -->
            <header class="bg-gray-800 border-b border-gray-700 px-6 py-4">
                <div class="flex items-center justify-between">
                    <!-- Mobile menu button -->
                    <button onclick="toggleMobileSidebar()" class="lg:hidden p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                    
                    <!-- Desktop sidebar toggle (visible when collapsed) -->
                    <button onclick="toggleSidebar()" 
                            id="header-toggle-btn"
                            class="hidden lg:hidden p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 transition-colors duration-200">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                    
                    <!-- Page Title -->
                    <h1 class="text-xl font-semibold text-white">@yield('page-title', 'Panel de Administración')</h1>
                    
                    <!-- Right side actions -->
                    <div class="flex items-center space-x-4">
                        <a href="{{ route('home') }}" target="_blank" class="text-gray-400 hover:text-white">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            </header>

            <!-- Page Content -->
            <main class="flex-1 overflow-y-auto bg-gray-900 p-6">
                @if(session('success'))
                    <div class="mb-6 bg-green-800 border border-green-700 text-green-100 px-4 py-3 rounded-lg" role="alert">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <svg class="h-5 w-5 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm">{{ session('success') }}</p>
                            </div>
                        </div>
                    </div>
                @endif

                @if(session('error'))
                    <div class="mb-6 bg-red-800 border border-red-700 text-red-100 px-4 py-3 rounded-lg" role="alert">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <svg class="h-5 w-5 text-red-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm">{{ session('error') }}</p>
                            </div>
                        </div>
                    </div>
                @endif

                @yield('content')
            </main>
        </div>
    </div>

    @stack('scripts')
    
    <script>
        // Estado global del sidebar
        let sidebarCollapsed = false;
        let mobileSidebarOpen = false;
        
        // Referencias a elementos DOM
        let sidebar, mainContent, headerToggleBtn, sidebarToggleBtn, sidebarArrow, adminText;
        
        // Inicializar cuando el DOM esté listo
        document.addEventListener('DOMContentLoaded', function() {
            // Obtener referencias a elementos
            sidebar = document.getElementById('sidebar');
            mainContent = document.getElementById('main-content');
            headerToggleBtn = document.getElementById('header-toggle-btn');
            sidebarToggleBtn = document.getElementById('sidebar-toggle-btn');
            sidebarArrow = document.getElementById('sidebar-arrow');
            adminText = document.getElementById('admin-text');
            
            console.log('DOM cargado, elementos encontrados:', {
                sidebar: !!sidebar,
                mainContent: !!mainContent,
                headerToggleBtn: !!headerToggleBtn,
                sidebarToggleBtn: !!sidebarToggleBtn,
                sidebarArrow: !!sidebarArrow,
                adminText: !!adminText
            });
            
            // Cargar preferencia guardada
            const savedState = localStorage.getItem('sidebarCollapsed');
            if (savedState === 'true') {
                sidebarCollapsed = true;
            }
            
            // Aplicar estado inicial
            updateSidebarVisibility();
        });
        
        // Función para alternar el sidebar en desktop
        function toggleSidebar() {
            console.log('toggleSidebar llamado, estado actual:', sidebarCollapsed);
            sidebarCollapsed = !sidebarCollapsed;
            updateSidebarVisibility();
            
            // Guardar preferencia en localStorage
            localStorage.setItem('sidebarCollapsed', sidebarCollapsed);
        }
        
        // Función para alternar el sidebar en móvil
        function toggleMobileSidebar() {
            console.log('toggleMobileSidebar llamado, estado actual:', mobileSidebarOpen);
            mobileSidebarOpen = !mobileSidebarOpen;
            updateMobileSidebarVisibility();
        }
        
        // Actualizar visibilidad del sidebar desktop
        function updateSidebarVisibility() {
            if (!sidebar || !mainContent) return;
            
            console.log('Actualizando visibilidad del sidebar, collapsed:', sidebarCollapsed);
            
            if (sidebarCollapsed) {
                // Sidebar colapsado
                sidebar.classList.remove('w-64');
                sidebar.classList.add('w-16');
                
                // Ajustar margin-left del contenido principal
                mainContent.style.marginLeft = '64px'; // 4rem = 64px
                
                // Mostrar botón en header si existe
                if (headerToggleBtn) {
                    headerToggleBtn.classList.remove('lg:hidden');
                    headerToggleBtn.classList.add('lg:block');
                }
                
                // Rotar flecha del sidebar
                const sidebarArrow = document.getElementById('sidebar-arrow');
                if (sidebarArrow) {
                    sidebarArrow.style.transform = 'rotate(180deg)';
                }
                
                // Ocultar texto del admin
                const adminText = document.getElementById('admin-text');
                if (adminText) {
                    adminText.style.opacity = '0';
                    adminText.style.width = '0';
                    adminText.style.overflow = 'hidden';
                }
                
                // Ocultar textos de navegación
                const navTexts = sidebar.querySelectorAll('.nav-text');
                navTexts.forEach(text => {
                    text.style.opacity = '0';
                    text.style.width = '0';
                    text.style.overflow = 'hidden';
                });
                
                // Centrar enlaces de navegación
                const navLinks = sidebar.querySelectorAll('.nav-link');
                navLinks.forEach(link => {
                    link.classList.add('justify-center');
                    link.classList.remove('justify-start');
                    link.style.paddingLeft = '12px';
                    link.style.paddingRight = '12px';
                });
                
            } else {
                // Sidebar expandido
                sidebar.classList.remove('w-16');
                sidebar.classList.add('w-64');
                
                // Ajustar margin-left del contenido principal
                mainContent.style.marginLeft = '256px'; // 16rem = 256px
                
                // Ocultar botón en header si existe
                if (headerToggleBtn) {
                    headerToggleBtn.classList.add('lg:hidden');
                    headerToggleBtn.classList.remove('lg:block');
                }
                
                // Restaurar flecha del sidebar
                const sidebarArrow = document.getElementById('sidebar-arrow');
                if (sidebarArrow) {
                    sidebarArrow.style.transform = 'rotate(0deg)';
                }
                
                // Mostrar texto del admin
                const adminText = document.getElementById('admin-text');
                if (adminText) {
                    adminText.style.opacity = '1';
                    adminText.style.width = 'auto';
                    adminText.style.overflow = 'visible';
                }
                
                // Mostrar textos de navegación
                const navTexts = sidebar.querySelectorAll('.nav-text');
                navTexts.forEach(text => {
                    text.style.opacity = '1';
                    text.style.width = 'auto';
                    text.style.overflow = 'visible';
                });
                
                // Restaurar alineación de enlaces de navegación
                const navLinks = sidebar.querySelectorAll('.nav-link');
                navLinks.forEach(link => {
                    link.classList.remove('justify-center');
                    link.classList.add('justify-start');
                    link.style.paddingLeft = '12px';
                    link.style.paddingRight = '8px';
                });
            }
        }
        
        // Actualizar visibilidad del sidebar móvil
        function updateMobileSidebarVisibility() {
            if (!sidebar) return;
            
            if (mobileSidebarOpen) {
                sidebar.classList.remove('-translate-x-full');
                sidebar.classList.add('translate-x-0');
            } else {
                sidebar.classList.add('-translate-x-full');
                sidebar.classList.remove('translate-x-0');
            }
        }
        
        // Manejar cambios de tamaño de ventana
        window.addEventListener('resize', function() {
            // En móvil, asegurar que el sidebar esté oculto
            if (window.innerWidth < 1024) {
                mobileSidebarOpen = false;
                updateMobileSidebarVisibility();
            }
        });
        
        // Agregar tooltips para modo colapsado
        function initTooltips() {
            const navLinks = sidebar.querySelectorAll('.nav-link[data-tooltip]');
            navLinks.forEach(link => {
                link.addEventListener('mouseenter', function(e) {
                    if (sidebarCollapsed) {
                        // Crear y mostrar tooltip
                        const tooltip = document.createElement('div');
                        tooltip.className = 'fixed bg-gray-700 text-white px-2 py-1 rounded text-sm z-50 pointer-events-none';
                        tooltip.textContent = this.getAttribute('data-tooltip');
                        tooltip.id = 'nav-tooltip';
                        
                        document.body.appendChild(tooltip);
                        
                        const rect = this.getBoundingClientRect();
                        tooltip.style.left = (rect.right + 10) + 'px';
                        tooltip.style.top = (rect.top + rect.height/2 - tooltip.offsetHeight/2) + 'px';
                    }
                });
                
                link.addEventListener('mouseleave', function() {
                    const tooltip = document.getElementById('nav-tooltip');
                    if (tooltip) {
                        tooltip.remove();
                    }
                });
            });
        }
        
        // Inicializar tooltips después de cargar el DOM
        document.addEventListener('DOMContentLoaded', function() {
            setTimeout(initTooltips, 100);
        });
    </script>
</body>
</html>
