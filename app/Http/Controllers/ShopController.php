<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::with('categories')->active();

        // Filtrar por categoría
        if ($request->has('category') && $request->category != '') {
            $query->whereHas('categories', function($q) use ($request) {
                $q->where('slug', $request->category);
            });
        }

        // Filtrar por precio
        if ($request->has('min_price') && $request->min_price != '') {
            $query->where('price', '>=', $request->min_price);
        }

        if ($request->has('max_price') && $request->max_price != '') {
            $query->where('price', '<=', $request->max_price);
        }

        // Buscar por nombre
        if ($request->has('search') && $request->search != '') {
            $query->where(function($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%')
                  ->orWhere('description', 'like', '%' . $request->search . '%');
            });
        }

        // Ordenar
        $sortBy = $request->get('sort', 'name');
        switch ($sortBy) {
            case 'price_low':
                $query->orderBy('price', 'asc');
                break;
            case 'price_high':
                $query->orderBy('price', 'desc');
                break;
            case 'newest':
                $query->latest();
                break;
            default:
                $query->orderBy('name', 'asc');
        }

        $products = $query->paginate(12);
        
        // Obtener categorías de forma más directa para evitar problemas de eager loading
        try {
            $categories = \App\Models\Category::where('is_active', true)->orderBy('sort_order')->get();
        } catch (\Exception $e) {
            // Si hay error, usar colección vacía
            $categories = collect([]);
            \Log::error('Error al cargar categorías: ' . $e->getMessage());
        }

        return view('shop.index', compact('products', 'categories'));
    }

    public function cart()
    {
        $cartItems = session()->get('cart', []);
        $total = 0;

        foreach ($cartItems as $item) {
            $total += $item['price'] * $item['quantity'];
        }

        return view('shop.cart', compact('cartItems', 'total'));
    }

    public function addToCart(Request $request, Product $product)
    {
        $cart = session()->get('cart', []);
        $size = $request->get('size');
        $color = $request->get('color');
        $quantity = $request->get('quantity', 1);

        $cartKey = $product->id . '_' . $size . '_' . $color;

        if (isset($cart[$cartKey])) {
            $cart[$cartKey]['quantity'] += $quantity;
        } else {
            $cart[$cartKey] = [
                'product_id' => $product->id,
                'name' => $product->name,
                'price' => $product->current_price,
                'image' => $product->main_image,
                'size' => $size,
                'color' => $color,
                'quantity' => $quantity,
                'slug' => $product->slug
            ];
        }

        session()->put('cart', $cart);

        return response()->json([
            'success' => true,
            'message' => 'Producto agregado al carrito',
            'cart_count' => count($cart)
        ]);
    }

    public function updateCart(Request $request, $id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            if ($request->quantity > 0) {
                $cart[$id]['quantity'] = $request->quantity;
            } else {
                unset($cart[$id]);
            }
            session()->put('cart', $cart);
        }

        return redirect()->route('cart.index')->with('success', 'Carrito actualizado');
    }

    public function removeFromCart($id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return redirect()->route('cart.index')->with('success', 'Producto eliminado del carrito');
    }

    public function checkout()
    {
        $cartItems = session()->get('cart', []);
        
        if (empty($cartItems)) {
            return redirect()->route('shop')->with('error', 'Tu carrito está vacío');
        }

        $total = 0;
        foreach ($cartItems as $item) {
            $total += $item['price'] * $item['quantity'];
        }

        return view('shop.checkout', compact('cartItems', 'total'));
    }

    public function processCheckout(Request $request)
    {
        // TODO: Implementar procesamiento de checkout con MercadoPago
        return redirect()->route('shop')->with('success', 'Pedido procesado exitosamente');
    }
}
