<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $categories = [
            [
                'name' => 'Camisetas de Fútbol',
                'description' => 'Camisetas oficiales y réplicas de los mejores equipos del mundo',
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'name' => 'Pantalones Deportivos',
                'description' => 'Pantalones cortos y largos para entrenamientos y partidos',
                'sort_order' => 2,
                'is_active' => true,
            ],
            [
                'name' => 'Zapatillas',
                'description' => 'Calzado deportivo para todas las superficies',
                'sort_order' => 3,
                'is_active' => true,
            ],
            [
                'name' => 'Accesorios',
                'description' => 'Medias, guantes, cintas y más accesorios deportivos',
                'sort_order' => 4,
                'is_active' => true,
            ],
            [
                'name' => 'Equipaciones Completas',
                'description' => 'Sets completos de camiseta y pantalón',
                'sort_order' => 5,
                'is_active' => true,
            ],
            [
                'name' => 'Ropa de Entrenamiento',
                'description' => 'Buzos, camperas y ropa para entrenar',
                'sort_order' => 6,
                'is_active' => true,
            ],
        ];

        foreach ($categories as $categoryData) {
            Category::create($categoryData);
        }
    }
}
