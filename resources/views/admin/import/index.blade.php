@extends('admin.layout')

@section('title', 'Importar Productos')
@section('page-title', 'Importación Masiva de Productos')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h2 class="text-2xl font-bold text-white">Importar Productos</h2>
            <p class="text-gray-400 text-sm mt-1">Carga masiva de productos desde archivo CSV</p>
        </div>
        <a href="{{ route('admin.products.index') }}" 
           class="inline-flex items-center px-4 py-2 bg-gray-600 hover:bg-gray-500 text-white font-medium rounded-lg transition duration-200">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
            </svg>
            Volver a Productos
        </a>
    </div>

    <!-- Información del CSV -->
    <div class="bg-blue-900 border border-blue-700 rounded-lg p-6">
        <div class="flex items-start">
            <div class="flex-shrink-0">
                <svg class="w-6 h-6 text-blue-400" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
                </svg>
            </div>
            <div class="ml-3">
                <h3 class="text-lg font-medium text-blue-200">Formato del archivo CSV</h3>
                <div class="mt-2 text-blue-300 text-sm">
                    <p class="mb-2">Tu archivo CSV debe contener las siguientes columnas (en este orden):</p>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-2 text-xs bg-blue-800 p-4 rounded">
                        <span>• ID</span>
                        <span>• Tipo</span>
                        <span>• SKU</span>
                        <span>• Nombre</span>
                        <span>• Publicado</span>
                        <span>• ¿Está destacado?</span>
                        <span>• Visibilidad en el catálogo</span>
                        <span>• Descripción corta</span>
                        <span>• Descripción</span>
                        <span>• Precio rebajado</span>
                        <span>• Precio normal</span>
                        <span>• ¿En inventario?</span>
                        <span>• Inventario</span>
                        <span>• Categorías</span>
                        <span>• Etiquetas</span>
                        <span>• Nombre del atributo 1</span>
                        <span>• Valor(es) del atributo 1</span>
                        <span>• Y más...</span>
                    </div>
                    <p class="mt-3 text-blue-200">
                        <strong>Nota:</strong> Los campos obligatorios son <strong>Nombre</strong> y <strong>SKU</strong>. 
                        Si el precio no se especifica, se usará $15.000 por defecto.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Formulario de Importación -->
    <div class="bg-gray-800 rounded-lg border border-gray-700">
        <form action="{{ route('admin.import.products') }}" method="POST" enctype="multipart/form-data" class="p-6">
            @csrf
            
            <div class="space-y-6">
                <!-- Archivo CSV -->
                <div>
                    <label for="csv_file" class="block text-sm font-medium text-gray-300 mb-2">
                        Archivo CSV
                        <span class="text-red-400">*</span>
                    </label>
                    <div class="flex items-center justify-center w-full">
                        <label for="csv_file" class="flex flex-col items-center justify-center w-full h-32 border-2 border-gray-600 border-dashed rounded-lg cursor-pointer bg-gray-700 hover:bg-gray-600 transition-colors">
                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                <svg class="w-10 h-10 mb-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                                </svg>
                                <p class="mb-2 text-sm text-gray-400">
                                    <span class="font-semibold">Click para seleccionar</span> o arrastra el archivo
                                </p>
                                <p class="text-xs text-gray-500">CSV (MAX. 10MB)</p>
                            </div>
                            <input id="csv_file" name="csv_file" type="file" class="hidden" accept=".csv,.txt" required />
                        </label>
                    </div>
                    @error('csv_file')
                        <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Información del archivo seleccionado -->
                <div id="file-info" class="hidden bg-green-900 border border-green-500 rounded-lg p-4">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <svg class="w-6 h-6 text-green-400 mr-3" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                            </svg>
                            <div>
                                <p class="text-green-200 font-medium flex items-center">
                                    <span class="mr-2">✅ Archivo listo para importar:</span>
                                    <span id="file-name" class="font-bold"></span>
                                </p>
                                <p class="text-green-300 text-sm flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                    </svg>
                                    Tamaño: <span id="file-size" class="font-medium ml-1"></span>
                                </p>
                            </div>
                        </div>
                        <button type="button" class="clear-file text-green-300 hover:text-white transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Opciones de Importación -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="space-y-4">
                        <h3 class="text-lg font-medium text-white">Opciones de Importación</h3>
                        
                        <div class="flex items-center">
                            <input id="update_existing" name="update_existing" type="checkbox" 
                                   class="h-4 w-4 text-yellow-500 focus:ring-yellow-500 border-gray-600 bg-gray-700 rounded" checked>
                            <label for="update_existing" class="ml-2 block text-sm text-gray-300">
                                Actualizar productos existentes (por SKU)
                            </label>
                        </div>
                        
                        <div class="flex items-center">
                            <input id="create_categories" name="create_categories" type="checkbox" 
                                   class="h-4 w-4 text-yellow-500 focus:ring-yellow-500 border-gray-600 bg-gray-700 rounded" checked>
                            <label for="create_categories" class="ml-2 block text-sm text-gray-300">
                                Crear categorías automáticamente
                            </label>
                        </div>
                        
                        <div class="flex items-center">
                            <input id="create_attributes" name="create_attributes" type="checkbox" 
                                   class="h-4 w-4 text-yellow-500 focus:ring-yellow-500 border-gray-600 bg-gray-700 rounded" checked>
                            <label for="create_attributes" class="ml-2 block text-sm text-gray-300">
                                Crear atributos y valores automáticamente
                            </label>
                        </div>
                    </div>

                    <div class="space-y-4">
                        <h3 class="text-lg font-medium text-white">Vista Previa</h3>
                        <div class="bg-gray-700 rounded-lg p-4">
                            <p class="text-gray-400 text-sm mb-2">Se procesarán:</p>
                            <ul class="text-sm text-gray-300 space-y-1">
                                <li>• Productos con todas sus propiedades</li>
                                <li>• Categorías basadas en tipo de producto</li>
                                <li>• Tags de equipos y tipos</li>
                                <li>• Atributos de talla automáticamente</li>
                                <li>• Inventario y precios</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Botones de Acción -->
                <div class="flex items-center justify-between pt-6 border-t border-gray-700">
                    <div class="text-sm text-gray-400">
                        <p>⚠️ Esta operación puede tomar varios minutos dependiendo del tamaño del archivo.</p>
                    </div>
                    <div class="flex space-x-3">
                        <button type="button" onclick="window.location.href='{{ route('admin.products.index') }}'" 
                                class="px-4 py-2 bg-gray-600 hover:bg-gray-500 text-white font-medium rounded-lg transition duration-200">
                            Cancelar
                        </button>
                        <button type="submit" 
                                class="px-6 py-2 bg-yellow-500 hover:bg-yellow-400 text-gray-900 font-semibold rounded-lg transition duration-200">
                            <svg class="w-5 h-5 mr-2 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M9 12l2 2 4-4"></path>
                            </svg>
                            Importar Productos
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <!-- Historial de Importaciones -->
    <div class="bg-gray-800 rounded-lg border border-gray-700 p-6">
        <h3 class="text-lg font-medium text-white mb-4">Consejos para una Importación Exitosa</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <h4 class="font-medium text-gray-300 mb-2">✅ Recomendaciones</h4>
                <ul class="text-sm text-gray-400 space-y-1">
                    <li>• Usa el archivo CSV original como referencia</li>
                    <li>• Asegúrate de que los SKUs sean únicos</li>
                    <li>• Verifica que los precios sean números válidos</li>
                    <li>• Usa nombres descriptivos para los productos</li>
                    <li>• Mantén consistencia en nombres de equipos</li>
                </ul>
            </div>
            <div>
                <h4 class="font-medium text-gray-300 mb-2">⚠️ Problemas Comunes</h4>
                <ul class="text-sm text-gray-400 space-y-1">
                    <li>• SKUs duplicados causan actualizaciones</li>
                    <li>• Precios vacíos usan valor por defecto ($15.000)</li>
                    <li>• Caracteres especiales pueden causar errores</li>
                    <li>• Archivo muy grande puede agotar memoria</li>
                    <li>• Encoding incorrecto corrompe caracteres</li>
                </ul>
            </div>
        </div>
    </div>
</div>

@push('styles')
<style>
    .drop-zone-active {
        animation: pulse 1.5s infinite;
    }
    
    .file-loaded {
        animation: fadeIn 0.5s ease-in-out;
    }
    
    @keyframes pulse {
        0%, 100% {
            opacity: 1;
        }
        50% {
            opacity: 0.7;
        }
    }
    
    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(-10px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    .clear-file:hover {
        background-color: rgba(239, 68, 68, 0.2);
        border-radius: 4px;
    }
</style>
@endpush

@push('scripts'>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const fileInput = document.getElementById('csv_file');
    const fileInfo = document.getElementById('file-info');
    const fileName = document.getElementById('file-name');
    const fileSize = document.getElementById('file-size');
    const dropZone = document.querySelector('label[for="csv_file"]');
    const dropZoneContent = dropZone.querySelector('div');

    console.log('Script cargado correctamente');

    // Función para mostrar información del archivo
    function showFileInfo(file) {
        console.log('Mostrando info del archivo:', file.name);
        
        fileName.textContent = file.name;
        fileSize.textContent = `${(file.size / 1024 / 1024).toFixed(2)} MB`;
        fileInfo.classList.remove('hidden');
        fileInfo.classList.add('file-loaded');
        
        // Cambiar el aspecto del drop zone para mostrar que hay un archivo
        dropZoneContent.innerHTML = `
            <div class="flex items-center justify-center">
                <svg class="w-10 h-10 text-green-400 mr-4" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                </svg>
                <div class="text-center">
                    <p class="text-green-400 font-bold text-lg">✅ ${file.name}</p>
                    <p class="text-green-300 text-sm">${(file.size / 1024 / 1024).toFixed(2)} MB - Listo para importar</p>
                    <p class="text-gray-400 text-xs mt-1">Click para cambiar archivo</p>
                </div>
            </div>
        `;
        
        dropZone.classList.remove('border-gray-600', 'bg-gray-700', 'hover:bg-gray-600');
        dropZone.classList.add('border-green-500', 'bg-green-900', 'hover:bg-green-800');
        
        // Mostrar mensaje de éxito
        showNotification('Archivo cargado correctamente', 'success');
    }

    // Función para resetear el drop zone
    function resetDropZone() {
        console.log('Reseteando drop zone');
        
        fileInfo.classList.add('hidden');
        fileInfo.classList.remove('file-loaded');
        dropZoneContent.innerHTML = `
            <svg class="w-10 h-10 mb-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
            </svg>
            <p class="mb-2 text-sm text-gray-400">
                <span class="font-semibold">Click para seleccionar</span> o arrastra el archivo
            </p>
            <p class="text-xs text-gray-500">CSV (MAX. 10MB)</p>
        `;
        
        dropZone.classList.remove('border-green-500', 'bg-green-900', 'border-yellow-500', 'bg-yellow-900', 'hover:bg-green-800', 'drop-zone-active');
        dropZone.classList.add('border-gray-600', 'bg-gray-700', 'hover:bg-gray-600');
    }

    // Función para mostrar notificaciones
    function showNotification(message, type = 'info') {
        const notification = document.createElement('div');
        notification.className = `fixed top-4 right-4 z-50 p-4 rounded-lg shadow-lg transition-all duration-500 transform translate-x-full`;
        
        if (type === 'success') {
            notification.classList.add('bg-green-600', 'text-white');
            notification.innerHTML = `
                <div class="flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                    </svg>
                    ${message}
                </div>
            `;
        } else if (type === 'error') {
            notification.classList.add('bg-red-600', 'text-white');
            notification.innerHTML = `
                <div class="flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                    </svg>
                    ${message}
                </div>
            `;
        }
        
        document.body.appendChild(notification);
        
        // Animar entrada
        setTimeout(() => {
            notification.classList.remove('translate-x-full');
        }, 100);
        
        // Animar salida después de 3 segundos
        setTimeout(() => {
            notification.classList.add('translate-x-full');
            setTimeout(() => {
                document.body.removeChild(notification);
            }, 500);
        }, 3000);
    }

    // Event listener para cambio de archivo
    fileInput.addEventListener('change', function(e) {
        console.log('Archivo cambiado:', e.target.files);
        
        const file = e.target.files[0];
        if (file) {
            console.log('Archivo seleccionado:', file.name, file.size);
            
            // Validar tipo de archivo
            if (!file.name.toLowerCase().endsWith('.csv') && !file.name.toLowerCase().endsWith('.txt')) {
                showNotification('Por favor selecciona un archivo CSV o TXT', 'error');
                fileInput.value = '';
                resetDropZone();
                return;
            }
            
            // Validar tamaño (10MB)
            if (file.size > 10 * 1024 * 1024) {
                showNotification('El archivo es demasiado grande. Máximo 10MB permitido.', 'error');
                fileInput.value = '';
                resetDropZone();
                return;
            }
            
            showFileInfo(file);
        } else {
            resetDropZone();
        }
    });

    // Prevenir comportamiento por defecto para drag & drop
    ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
        dropZone.addEventListener(eventName, preventDefaults, false);
        document.body.addEventListener(eventName, preventDefaults, false);
    });

    function preventDefaults(e) {
        e.preventDefault();
        e.stopPropagation();
    }

    // Highlight cuando se arrastra sobre el drop zone
    ['dragenter', 'dragover'].forEach(eventName => {
        dropZone.addEventListener(eventName, function(e) {
            console.log('Drag over/enter');
            dropZone.classList.remove('border-gray-600', 'bg-gray-700', 'border-green-500', 'bg-green-900');
            dropZone.classList.add('border-yellow-500', 'bg-yellow-900', 'drop-zone-active');
            
            // Cambiar contenido temporalmente
            if (!fileInput.files.length) {
                dropZoneContent.innerHTML = `
                    <svg class="w-12 h-12 mb-3 text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                    </svg>
                    <p class="mb-2 text-lg text-yellow-400 font-bold">
                        ⬇️ Suelta el archivo aquí
                    </p>
                    <p class="text-sm text-yellow-300">Archivo CSV listo para cargar</p>
                `;
            }
        }, false);
    });

    // Quitar highlight cuando se sale del drop zone
    ['dragleave', 'drop'].forEach(eventName => {
        dropZone.addEventListener(eventName, function(e) {
            console.log('Drag leave/drop');
            dropZone.classList.remove('drop-zone-active');
            
            if (fileInput.files.length > 0) {
                dropZone.classList.remove('border-yellow-500', 'bg-yellow-900');
                dropZone.classList.add('border-green-500', 'bg-green-900');
            } else {
                dropZone.classList.remove('border-yellow-500', 'bg-yellow-900');
                dropZone.classList.add('border-gray-600', 'bg-gray-700');
                
                // Restaurar contenido original si no hay archivo
                setTimeout(() => {
                    if (!fileInput.files.length) {
                        resetDropZone();
                    }
                }, 100);
            }
        }, false);
    });

    // Manejar drop
    dropZone.addEventListener('drop', function(e) {
        console.log('Archivo dropeado');
        
        const dt = e.dataTransfer;
        const files = dt.files;
        
        if (files.length > 0) {
            const file = files[0];
            console.log('Archivo dropeado:', file.name);
            
            // Validar tipo de archivo
            if (!file.name.toLowerCase().endsWith('.csv') && !file.name.toLowerCase().endsWith('.txt')) {
                showNotification('Por favor arrastra un archivo CSV o TXT', 'error');
                return;
            }
            
            // Validar tamaño (10MB)
            if (file.size > 10 * 1024 * 1024) {
                showNotification('El archivo es demasiado grande. Máximo 10MB permitido.', 'error');
                return;
            }
            
            // Asignar archivo al input
            fileInput.files = files;
            
            // Mostrar información del archivo
            showFileInfo(file);
        }
    }, false);

    // Agregar un botón para limpiar el archivo
    document.addEventListener('click', function(e) {
        if (e.target.classList.contains('clear-file')) {
            fileInput.value = '';
            resetDropZone();
        }
    });
});
</script>
@endpush
@endsection
