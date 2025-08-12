<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Eliminar tablas existentes que vamos a recrear
        Schema::dropIfExists('products');
        Schema::dropIfExists('categories');
        
        // Crear tabla de categorías con nueva estructura
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->boolean('is_active')->default(true);
            $table->integer('sort_order')->default(0);
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->timestamps();
            
            $table->foreign('parent_id')->references('id')->on('categories')->onDelete('cascade');
            $table->index(['is_active', 'sort_order']);
        });

        // Crear tabla de atributos
        Schema::create('attributes', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // ej: "Talla", "Color", "Equipo"
            $table->string('slug')->unique();
            $table->enum('type', ['text', 'number', 'select', 'multiselect'])->default('select');
            $table->boolean('is_global')->default(true);
            $table->boolean('is_visible')->default(true);
            $table->boolean('is_required')->default(false);
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });

        // Crear tabla de valores de atributos
        Schema::create('attribute_values', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('attribute_id');
            $table->string('value'); // ej: "XL", "Rojo", "River Plate"
            $table->string('slug');
            $table->integer('sort_order')->default(0);
            $table->timestamps();
            
            $table->foreign('attribute_id')->references('id')->on('attributes')->onDelete('cascade');
            $table->unique(['attribute_id', 'slug']);
        });

        // Crear tabla principal de productos con estructura completa
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            
            // Campos básicos del producto
            $table->enum('type', ['simple', 'variable', 'grouped', 'external', 'variation'])->default('simple');
            $table->string('sku')->unique()->nullable();
            $table->string('name');
            $table->string('slug')->unique();
            
            // Estado y visibilidad
            $table->enum('status', ['draft', 'published', 'private'])->default('draft');
            $table->boolean('is_featured')->default(false);
            $table->enum('catalog_visibility', ['visible', 'catalog', 'search', 'hidden'])->default('visible');
            
            // Descripciones
            $table->text('short_description')->nullable();
            $table->longText('description')->nullable();
            
            // Precios y fechas de promoción
            $table->decimal('regular_price', 10, 2)->nullable();
            $table->decimal('sale_price', 10, 2)->nullable();
            $table->datetime('sale_price_start')->nullable();
            $table->datetime('sale_price_end')->nullable();
            
            // Impuestos
            $table->enum('tax_status', ['taxable', 'shipping', 'none'])->default('taxable');
            $table->string('tax_class')->nullable();
            
            // Inventario
            $table->boolean('manage_stock')->default(true);
            $table->integer('stock_quantity')->nullable();
            $table->enum('stock_status', ['instock', 'outofstock', 'onbackorder'])->default('instock');
            $table->integer('low_stock_threshold')->nullable();
            $table->enum('backorders', ['no', 'notify', 'yes'])->default('no');
            $table->boolean('sold_individually')->default(false);
            
            // Dimensiones y peso
            $table->decimal('weight', 8, 3)->nullable();
            $table->decimal('length', 8, 2)->nullable();
            $table->decimal('width', 8, 2)->nullable();
            $table->decimal('height', 8, 2)->nullable();
            
            // Configuraciones adicionales
            $table->boolean('reviews_allowed')->default(true);
            $table->text('purchase_note')->nullable();
            
            // Relaciones con otros productos
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->json('upsell_ids')->nullable();
            $table->json('cross_sell_ids')->nullable();
            $table->json('grouped_product_ids')->nullable();
            
            // Productos externos
            $table->string('external_url')->nullable();
            $table->string('button_text')->nullable();
            
            // Productos descargables
            $table->boolean('is_downloadable')->default(false);
            $table->integer('download_limit')->nullable();
            $table->integer('download_expiry')->nullable();
            
            // Clase de envío
            $table->string('shipping_class')->nullable();
            
            // Posición en catálogo
            $table->integer('menu_order')->default(0);
            
            // Metadatos adicionales
            $table->json('meta_data')->nullable();
            
            $table->timestamps();
            
            // Índices
            $table->foreign('parent_id')->references('id')->on('products')->onDelete('cascade');
            $table->index(['type', 'status']);
            $table->index(['stock_status', 'manage_stock']);
            $table->index('sku');
            $table->index('menu_order');
        });

        // Crear resto de tablas
        Schema::create('product_categories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('category_id');
            $table->timestamps();
            
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->unique(['product_id', 'category_id']);
        });

        Schema::create('tags', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->timestamps();
        });

        Schema::create('product_tags', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('tag_id');
            $table->timestamps();
            
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('tag_id')->references('id')->on('tags')->onDelete('cascade');
            $table->unique(['product_id', 'tag_id']);
        });

        Schema::create('product_attributes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('attribute_id');
            $table->json('attribute_values');
            $table->boolean('is_visible')->default(true);
            $table->boolean('is_variation')->default(false);
            $table->integer('position')->default(0);
            $table->timestamps();
            
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('attribute_id')->references('id')->on('attributes')->onDelete('cascade');
            $table->unique(['product_id', 'attribute_id']);
        });

        Schema::create('product_variation_attributes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('attribute_id');
            $table->unsignedBigInteger('attribute_value_id');
            $table->timestamps();
            
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('attribute_id')->references('id')->on('attributes')->onDelete('cascade');
            $table->foreign('attribute_value_id')->references('id')->on('attribute_values')->onDelete('cascade');
            $table->unique(['product_id', 'attribute_id'], 'product_variation_attribute_unique');
        });

        Schema::create('product_images', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->string('image_url');
            $table->string('alt_text')->nullable();
            $table->boolean('is_featured')->default(false);
            $table->integer('sort_order')->default(0);
            $table->timestamps();
            
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->index(['product_id', 'is_featured']);
        });

        Schema::create('product_downloads', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->string('name');
            $table->string('file_url');
            $table->timestamps();
            
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });

        Schema::create('product_imports', function (Blueprint $table) {
            $table->id();
            $table->string('filename');
            $table->integer('total_rows');
            $table->integer('processed_rows')->default(0);
            $table->integer('success_count')->default(0);
            $table->integer('error_count')->default(0);
            $table->json('errors')->nullable();
            $table->enum('status', ['pending', 'processing', 'completed', 'failed'])->default('pending');
            $table->timestamp('started_at')->nullable();
            $table->timestamp('completed_at')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->timestamps();
            
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });

        Schema::create('inventory_movements', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->enum('type', ['stock_in', 'stock_out', 'adjustment', 'sale', 'return', 'import']);
            $table->integer('quantity_before');
            $table->integer('quantity_change');
            $table->integer('quantity_after');
            $table->text('reason')->nullable();
            $table->string('reference')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->timestamps();
            
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
            $table->index(['product_id', 'created_at']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inventory_movements');
        Schema::dropIfExists('product_imports');
        Schema::dropIfExists('product_downloads');
        Schema::dropIfExists('product_images');
        Schema::dropIfExists('product_variation_attributes');
        Schema::dropIfExists('product_attributes');
        Schema::dropIfExists('product_tags');
        Schema::dropIfExists('tags');
        Schema::dropIfExists('product_categories');
        Schema::dropIfExists('products');
        Schema::dropIfExists('attribute_values');
        Schema::dropIfExists('attributes');
        Schema::dropIfExists('categories');
    }
};
