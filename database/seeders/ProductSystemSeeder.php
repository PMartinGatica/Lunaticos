<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Attribute;
use App\Models\AttributeValue;
use App\Models\Product;
use App\Models\Tag;

class ProductSystemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Crear categorías principales
        $conjuntos = Category::create([
            'name' => 'Conjuntos',
            'slug' => 'conjuntos',
            'description' => 'Conjuntos deportivos para niños y adultos',
            'is_active' => true,
            'sort_order' => 1
        ]);

        $buzos = Category::create([
            'name' => 'Buzos',
            'slug' => 'buzos',
            'description' => 'Buzos deportivos de equipos',
            'is_active' => true,
            'sort_order' => 2
        ]);

        $pantalones = Category::create([
            'name' => 'Pantalones',
            'slug' => 'pantalones',
            'description' => 'Pantalones deportivos',
            'is_active' => true,
            'sort_order' => 3
        ]);

        $camperas = Category::create([
            'name' => 'Camperas',
            'slug' => 'camperas',
            'description' => 'Camperas deportivas',
            'is_active' => true,
            'sort_order' => 4
        ]);

        // Crear atributos
        $talla = Attribute::create([
            'name' => 'Talla',
            'slug' => 'talla',
            'type' => 'select',
            'is_global' => true,
            'is_visible' => true,
            'sort_order' => 1
        ]);

        $equipo = Attribute::create([
            'name' => 'Equipo',
            'slug' => 'equipo',
            'type' => 'select',
            'is_global' => true,
            'is_visible' => true,
            'sort_order' => 2
        ]);

        // Crear valores de tallas
        $tallas = ['4', '6', '8', '10', '12', '14', '16', 'S', 'M', 'L', 'XL', 'XXL', 'XXXL', 'XXXXL'];
        foreach ($tallas as $index => $tallaValue) {
            AttributeValue::create([
                'attribute_id' => $talla->id,
                'value' => $tallaValue,
                'slug' => strtolower($tallaValue),
                'sort_order' => $index + 1
            ]);
        }

        // Crear valores de equipos
        $equipos = [
            'River Plate',
            'Boca Juniors',
            'AFA',
            'Barcelona',
            'Real Madrid',
            'Chelsea',
            'Milan',
            'Liverpool',
            'PSG',
            'Inter Miami'
        ];

        foreach ($equipos as $index => $equipoValue) {
            AttributeValue::create([
                'attribute_id' => $equipo->id,
                'value' => $equipoValue,
                'slug' => \Str::slug($equipoValue),
                'sort_order' => $index + 1
            ]);
        }

        // Crear algunas etiquetas
        $tags = ['Niños', 'Adultos', 'Deportivo', 'Fútbol', 'Argentina', 'Europa'];
        foreach ($tags as $tagName) {
            Tag::create([
                'name' => $tagName,
                'slug' => \Str::slug($tagName),
                'description' => "Etiqueta para productos $tagName"
            ]);
        }

        // Crear algunos productos de ejemplo
        $product1 = Product::create([
            'type' => 'simple',
            'sku' => 'BZPNTRIVNIN6',
            'name' => 'Conjunto Niño Pantalon - Buzo River Plate',
            'slug' => 'conjunto-nino-pantalon-buzo-river-plate-6',
            'status' => 'published',
            'is_featured' => true,
            'catalog_visibility' => 'visible',
            'short_description' => 'Conjunto deportivo de River Plate para niños talla 6',
            'description' => 'Conjunto completo de pantalón y buzo del Club Atlético River Plate. Ideal para niños que practican deportes o simplemente quieren mostrar su pasión por el club.',
            'regular_price' => 15000.00,
            'tax_status' => 'taxable',
            'manage_stock' => true,
            'stock_quantity' => 3,
            'stock_status' => 'instock',
            'low_stock_threshold' => 2,
            'reviews_allowed' => true,
            'menu_order' => 1
        ]);

        $product2 = Product::create([
            'type' => 'simple',
            'sku' => 'BZPNTBOCNIN8',
            'name' => 'Conjunto Niño Pantalon - Buzo Boca Juniors',
            'slug' => 'conjunto-nino-pantalon-buzo-boca-juniors-8',
            'status' => 'published',
            'is_featured' => false,
            'catalog_visibility' => 'visible',
            'short_description' => 'Conjunto deportivo de Boca Juniors para niños talla 8',
            'description' => 'Conjunto completo de pantalón y buzo del Club Atlético Boca Juniors. Perfecto para los pequeños fanáticos xeneizes.',
            'regular_price' => 15000.00,
            'tax_status' => 'taxable',
            'manage_stock' => true,
            'stock_quantity' => 2,
            'stock_status' => 'instock',
            'low_stock_threshold' => 1,
            'reviews_allowed' => true,
            'menu_order' => 2
        ]);

        // Asociar productos con categorías
        $product1->categories()->attach($conjuntos->id);
        $product2->categories()->attach($conjuntos->id);

        // Asociar productos con etiquetas
        $tagNinos = Tag::where('slug', 'ninos')->first();
        $tagFutbol = Tag::where('slug', 'futbol')->first();
        
        if ($tagNinos) $product1->tags()->attach($tagNinos->id);
        if ($tagFutbol) $product1->tags()->attach($tagFutbol->id);
        if ($tagNinos) $product2->tags()->attach($tagNinos->id);
        if ($tagFutbol) $product2->tags()->attach($tagFutbol->id);

        $this->command->info('✅ Sistema de productos inicializado con datos de ejemplo');
        $this->command->info('📦 Productos creados: ' . Product::count());
        $this->command->info('📂 Categorías creadas: ' . Category::count());
        $this->command->info('🏷️ Atributos creados: ' . Attribute::count());
        $this->command->info('🔤 Valores de atributos: ' . AttributeValue::count());
        $this->command->info('🏷️ Etiquetas creadas: ' . Tag::count());
    }
}
