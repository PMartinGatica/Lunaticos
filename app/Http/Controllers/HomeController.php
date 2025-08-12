<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Productos destacados (que tengan stock y estén publicados)
        $featuredProducts = Product::with('categories')
            ->where('stock_status', 'instock')
            ->where('status', 'published')
            ->where('is_featured', true)
            ->latest()
            ->limit(8)
            ->get();

        // Productos más recientes
        $newProducts = Product::with('categories')
            ->where('stock_status', 'instock')
            ->where('status', 'published')
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
