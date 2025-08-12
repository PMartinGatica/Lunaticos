<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // Estadísticas principales
        $totalProducts = Product::count();
        $totalCategories = Category::count();
        $totalUsers = User::where('role', 'user')->count();
        $lowStockProducts = Product::where('stock_quantity', '<=', 5)
            ->where('manage_stock', true)
            ->count();
        
        // Productos más recientes
        $recentProducts = Product::with('categories')->latest()->limit(5)->get();
        
        // Productos con stock bajo
        $lowStockList = Product::with('categories')
            ->where('stock_quantity', '<=', 5)
            ->where('manage_stock', true)
            ->orderBy('stock_quantity', 'asc')
            ->limit(5)
            ->get();

        return view('admin.dashboard', compact(
            'totalProducts',
            'totalCategories', 
            'totalUsers',
            'lowStockProducts',
            'recentProducts',
            'lowStockList'
        ));
    }

    public function products()
    {
        $products = Product::with('category')->paginate(20);
        return view('admin.products', compact('products'));
    }

    public function orders()
    {
        // Por ahora placeholder - implementar cuando tengamos sistema de órdenes
        return view('admin.orders');
    }

    public function customers()
    {
        $customers = User::where('role', 'user')->paginate(20);
        return view('admin.customers', compact('customers'));
    }

    public function analytics()
    {
        // Estadísticas avanzadas
        $productsByCategory = Category::withCount('products')->get();
        $userRegistrations = User::selectRaw('DATE(created_at) as date, COUNT(*) as count')
            ->where('role', 'user')
            ->where('created_at', '>=', now()->subDays(30))
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        return view('admin.analytics', compact('productsByCategory', 'userRegistrations'));
    }
}
