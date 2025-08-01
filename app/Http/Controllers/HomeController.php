<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Productos destacados
        $featuredProducts = Product::with('category')
            ->active()
            ->featured()
            ->limit(8)
            ->get();

        // Productos más recientes
        $newProducts = Product::with('category')
            ->active()
            ->latest()
            ->limit(4)
            ->get();

        // Categorías principales
        $categories = Category::active()
            ->orderBy('sort_order')
            ->limit(6)
            ->get();

        return view('home', compact('featuredProducts', 'newProducts', 'categories'));
    }
}
