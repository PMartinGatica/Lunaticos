<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $camisetasCategory = Category::where('slug', 'camisetas-de-futbol')->first();
        $pantalonesCategory = Category::where('slug', 'pantalones-deportivos')->first();
        $zapatillasCategory = Category::where('slug', 'zapatillas')->first();
        $accesoriosCategory = Category::where('slug', 'accesorios')->first();

        $products = [
            // Camisetas
            [
                'name' => 'Camiseta Argentina Titular 2024',
                'description' => 'Camiseta oficial de la Selección Argentina. Tecnología Climacool para máximo rendimiento. Incluye escudo bordado y números termoadhesivos.',
                'short_description' => 'Camiseta oficial de la Selección Argentina con tecnología Climacool',
                'price' => 25000,
                'sale_price' => 22000,
                'sizes' => ['S', 'M', 'L', 'XL', 'XXL'],
                'colors' => ['Celeste y Blanco'],
                'images' => [
                    'https://via.placeholder.com/500x500/87CEEB/FFFFFF?text=Argentina+Titular',
                    'https://via.placeholder.com/500x500/87CEEB/FFFFFF?text=Argentina+Espalda',
                ],
                'stock' => 50,
                'is_featured' => true,
                'sku' => 'ARG-TIT-2024',
                'category_id' => $camisetasCategory->id,
            ],
            [
                'name' => 'Camiseta Brasil Titular 2024',
                'description' => 'La icónica camiseta amarilla de Brasil. Confeccionada con materiales premium y tecnología de secado rápido.',
                'short_description' => 'Camiseta oficial de Brasil con tecnología de secado rápido',
                'price' => 24000,
                'sizes' => ['S', 'M', 'L', 'XL'],
                'colors' => ['Amarillo'],
                'images' => [
                    'https://via.placeholder.com/500x500/FFD700/000000?text=Brasil+Titular',
                ],
                'stock' => 30,
                'is_featured' => true,
                'sku' => 'BRA-TIT-2024',
                'category_id' => $camisetasCategory->id,
            ],
            [
                'name' => 'Camiseta Real Madrid Local',
                'description' => 'Camiseta del Real Madrid temporada actual. Diseño clásico en blanco con detalles dorados.',
                'short_description' => 'Camiseta oficial del Real Madrid',
                'price' => 28000,
                'sale_price' => 25000,
                'sizes' => ['S', 'M', 'L', 'XL', 'XXL'],
                'colors' => ['Blanco'],
                'images' => [
                    'https://via.placeholder.com/500x500/FFFFFF/000000?text=Real+Madrid',
                ],
                'stock' => 25,
                'is_featured' => true,
                'sku' => 'RM-LOC-2024',
                'category_id' => $camisetasCategory->id,
            ],
            [
                'name' => 'Camiseta Barcelona Local',
                'description' => 'Camiseta del FC Barcelona con los tradicionales colores azulgrana. Tecnología Nike Dri-FIT.',
                'short_description' => 'Camiseta oficial del FC Barcelona',
                'price' => 28000,
                'sizes' => ['S', 'M', 'L', 'XL'],
                'colors' => ['Azulgrana'],
                'images' => [
                    'https://via.placeholder.com/500x500/A50044/004C99?text=Barcelona',
                ],
                'stock' => 20,
                'is_featured' => false,
                'sku' => 'FCB-LOC-2024',
                'category_id' => $camisetasCategory->id,
            ],

            // Pantalones
            [
                'name' => 'Pantalón Deportivo Adidas',
                'description' => 'Pantalón deportivo de entrenamiento. Cómodo y resistente, ideal para ejercicio y uso casual.',
                'short_description' => 'Pantalón deportivo cómodo para entrenamiento',
                'price' => 15000,
                'sizes' => ['S', 'M', 'L', 'XL'],
                'colors' => ['Negro', 'Azul Marino', 'Gris'],
                'images' => [
                    'https://via.placeholder.com/500x500/000000/FFFFFF?text=Pantalon+Adidas',
                ],
                'stock' => 40,
                'is_featured' => false,
                'sku' => 'PAN-ADI-001',
                'category_id' => $pantalonesCategory->id,
            ],

            // Zapatillas
            [
                'name' => 'Zapatillas Nike Mercurial',
                'description' => 'Zapatillas de fútbol para césped natural. Excelente tracción y comodidad para el mejor rendimiento.',
                'short_description' => 'Zapatillas de fútbol Nike para césped natural',
                'price' => 45000,
                'sale_price' => 38000,
                'sizes' => ['39', '40', '41', '42', '43', '44'],
                'colors' => ['Negro', 'Blanco'],
                'images' => [
                    'https://via.placeholder.com/500x500/000000/FFFFFF?text=Nike+Mercurial',
                ],
                'stock' => 15,
                'is_featured' => true,
                'sku' => 'ZAP-NIK-MER',
                'category_id' => $zapatillasCategory->id,
            ],

            // Accesorios
            [
                'name' => 'Medias de Fútbol Adidas',
                'description' => 'Pack de 3 pares de medias de fútbol. Material transpirable y cómodo.',
                'short_description' => 'Pack de 3 pares de medias de fútbol',
                'price' => 8000,
                'sizes' => ['S', 'M', 'L'],
                'colors' => ['Blanco', 'Negro', 'Azul'],
                'images' => [
                    'https://via.placeholder.com/500x500/FFFFFF/000000?text=Medias+Adidas',
                ],
                'stock' => 60,
                'is_featured' => false,
                'sku' => 'MED-ADI-001',
                'category_id' => $accesoriosCategory->id,
            ],
        ];

        foreach ($products as $productData) {
            Product::create($productData);
        }
    }
}
