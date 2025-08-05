<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Productos destacados (que tengan stock y estén activos)
        $featuredProducts = Product::with('category')
            ->where('stock', '>', 0)
            ->where('status', 'active')
            ->latest()
            ->limit(8)
            ->get();

        // Productos más recientes
        $newProducts = Product::with('category')
            ->where('stock', '>', 0)
            ->where('status', 'active')
            ->latest()
            ->limit(4)
            ->get();

        // Categorías principales
        $categories = Category::where('is_active', true)
            ->latest()
            ->limit(6)
            ->get();

        return view('home', compact('featuredProducts', 'newProducts', 'categories'));
    }
}
