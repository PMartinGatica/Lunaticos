<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function show(Product $product)
    {
        // Verificar que el producto esté activo
        if (!$product->is_active) {
            abort(404);
        }

        // Productos relacionados (misma categoría)
        $relatedProducts = Product::with('category')
            ->active()
            ->where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->limit(4)
            ->get();

        return view('shop.product', compact('product', 'relatedProducts'));
    }
}
