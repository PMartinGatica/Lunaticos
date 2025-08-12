<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\Attribute;
use App\Models\AttributeValue;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Product::with(['categories', 'tags']);

        // Filtros
        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%')
                  ->orWhere('sku', 'like', '%' . $request->search . '%');
        }

        if ($request->filled('category')) {
            $query->whereHas('categories', function ($q) use ($request) {
                $q->where('slug', $request->category);
            });
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('stock_status')) {
            $query->where('stock_status', $request->stock_status);
        }

        // Ordenamiento - por defecto por ID ascendente, pero permitir otros
        $sortBy = $request->get('sort_by', 'id');
        $sortOrder = $request->get('sort_order', 'asc');
        
        $allowedSorts = ['id', 'name', 'sku', 'regular_price', 'stock_quantity', 'created_at'];
        if (!in_array($sortBy, $allowedSorts)) {
            $sortBy = 'id';
        }
        
        if (!in_array($sortOrder, ['asc', 'desc'])) {
            $sortOrder = 'asc';
        }

        $query->orderBy($sortBy, $sortOrder);

        // Paginación - 25 productos por página
        $perPage = $request->get('per_page', 25);
        if (!in_array($perPage, [10, 25, 50, 100])) {
            $perPage = 25;
        }

        $products = $query->paginate($perPage)->appends($request->query());
        $categories = Category::where('is_active', true)->get();

        return view('admin.products.index', compact('products', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::where('is_active', true)->get();
        $attributes = Attribute::with('attributeValues')->get();
        $tags = Tag::all();

        return view('admin.products.create', compact('categories', 'attributes', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'sku' => 'nullable|string|unique:products,sku',
            'type' => 'required|in:simple,variable,grouped,external',
            'regular_price' => 'nullable|numeric|min:0',
            'sale_price' => 'nullable|numeric|min:0',
            'stock_quantity' => 'nullable|integer|min:0',
            'categories' => 'array',
            'tags' => 'array',
        ]);

        $product = Product::create([
            'type' => $request->type,
            'sku' => $request->sku,
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'status' => $request->status ?? 'draft',
            'is_featured' => $request->boolean('is_featured'),
            'catalog_visibility' => $request->catalog_visibility ?? 'visible',
            'short_description' => $request->short_description,
            'description' => $request->description,
            'regular_price' => $request->regular_price,
            'sale_price' => $request->sale_price,
            'sale_price_start' => $request->sale_price_start,
            'sale_price_end' => $request->sale_price_end,
            'tax_status' => $request->tax_status ?? 'taxable',
            'manage_stock' => $request->boolean('manage_stock'),
            'stock_quantity' => $request->stock_quantity,
            'stock_status' => $request->stock_status ?? 'instock',
            'low_stock_threshold' => $request->low_stock_threshold,
            'backorders' => $request->backorders ?? 'no',
            'sold_individually' => $request->boolean('sold_individually'),
            'weight' => $request->weight,
            'length' => $request->length,
            'width' => $request->width,
            'height' => $request->height,
            'reviews_allowed' => $request->boolean('reviews_allowed', true),
            'purchase_note' => $request->purchase_note,
            'shipping_class' => $request->shipping_class,
            'menu_order' => $request->menu_order ?? 0,
        ]);

        // Asociar categorías
        if ($request->filled('categories')) {
            $product->categories()->sync($request->categories);
        }

        // Asociar etiquetas
        if ($request->filled('tags')) {
            $product->tags()->sync($request->tags);
        }

        return redirect()->route('admin.products.index')
                        ->with('success', 'Producto creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        $product->load(['categories', 'tags', 'images', 'attributes', 'inventoryMovements']);
        
        return view('admin.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories = Category::where('is_active', true)->get();
        $attributes = Attribute::with('attributeValues')->get();
        $tags = Tag::all();
        
        $product->load(['categories', 'tags', 'images', 'attributes']);

        return view('admin.products.edit', compact('product', 'categories', 'attributes', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'sku' => 'nullable|string|unique:products,sku,' . $product->id,
            'type' => 'required|in:simple,variable,grouped,external',
            'regular_price' => 'nullable|numeric|min:0',
            'sale_price' => 'nullable|numeric|min:0',
            'stock_quantity' => 'nullable|integer|min:0',
            'categories' => 'array',
            'tags' => 'array',
        ]);

        $product->update([
            'type' => $request->type,
            'sku' => $request->sku,
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'status' => $request->status ?? 'draft',
            'is_featured' => $request->boolean('is_featured'),
            'catalog_visibility' => $request->catalog_visibility ?? 'visible',
            'short_description' => $request->short_description,
            'description' => $request->description,
            'regular_price' => $request->regular_price,
            'sale_price' => $request->sale_price,
            'sale_price_start' => $request->sale_price_start,
            'sale_price_end' => $request->sale_price_end,
            'tax_status' => $request->tax_status ?? 'taxable',
            'manage_stock' => $request->boolean('manage_stock'),
            'stock_quantity' => $request->stock_quantity,
            'stock_status' => $request->stock_status ?? 'instock',
            'low_stock_threshold' => $request->low_stock_threshold,
            'backorders' => $request->backorders ?? 'no',
            'sold_individually' => $request->boolean('sold_individually'),
            'weight' => $request->weight,
            'length' => $request->length,
            'width' => $request->width,
            'height' => $request->height,
            'reviews_allowed' => $request->boolean('reviews_allowed', true),
            'purchase_note' => $request->purchase_note,
            'shipping_class' => $request->shipping_class,
            'menu_order' => $request->menu_order ?? 0,
        ]);

        // Actualizar categorías
        if ($request->filled('categories')) {
            $product->categories()->sync($request->categories);
        } else {
            $product->categories()->detach();
        }

        // Actualizar etiquetas
        if ($request->filled('tags')) {
            $product->tags()->sync($request->tags);
        } else {
            $product->tags()->detach();
        }

        return redirect()->route('admin.products.index')
                        ->with('success', 'Producto actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('admin.products.index')
                        ->with('success', 'Producto eliminado exitosamente.');
    }

    /**
     * Toggle product status
     */
    public function toggleStatus(Product $product)
    {
        $product->update([
            'status' => $product->status === 'published' ? 'draft' : 'published'
        ]);

        return back()->with('success', 'Estado del producto actualizado.');
    }

    /**
     * Bulk actions
     */
    public function bulkAction(Request $request)
    {
        $action = $request->action;
        $productIds = $request->products;

        if (!$productIds) {
            return back()->with('error', 'No se seleccionaron productos.');
        }

        switch ($action) {
            case 'delete':
                Product::whereIn('id', $productIds)->delete();
                $message = 'Productos eliminados exitosamente.';
                break;
            case 'publish':
                Product::whereIn('id', $productIds)->update(['status' => 'published']);
                $message = 'Productos publicados exitosamente.';
                break;
            case 'draft':
                Product::whereIn('id', $productIds)->update(['status' => 'draft']);
                $message = 'Productos marcados como borrador.';
                break;
            default:
                return back()->with('error', 'Acción no válida.');
        }

        return back()->with('success', $message);
    }
}
