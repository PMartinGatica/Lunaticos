<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        // Campos básicos
        'type',
        'sku',
        'name',
        'slug',
        
        // Estado y visibilidad
        'status',
        'is_featured',
        'catalog_visibility',
        
        // Descripciones
        'short_description',
        'description',
        
        // Precios
        'regular_price',
        'sale_price',
        'sale_price_start',
        'sale_price_end',
        
        // Impuestos
        'tax_status',
        'tax_class',
        
        // Inventario
        'manage_stock',
        'stock_quantity',
        'stock_status',
        'low_stock_threshold',
        'backorders',
        'sold_individually',
        
        // Dimensiones
        'weight',
        'length',
        'width',
        'height',
        
        // Configuraciones
        'reviews_allowed',
        'purchase_note',
        
        // Relaciones
        'parent_id',
        'upsell_ids',
        'cross_sell_ids',
        'grouped_product_ids',
        
        // Externos
        'external_url',
        'button_text',
        
        // Descargables
        'is_downloadable',
        'download_limit',
        'download_expiry',
        
        // Envío
        'shipping_class',
        
        // Orden
        'menu_order',
        
        // Metadatos
        'meta_data'
    ];

    protected $casts = [
        'is_featured' => 'boolean',
        'manage_stock' => 'boolean',
        'sold_individually' => 'boolean',
        'reviews_allowed' => 'boolean',
        'is_downloadable' => 'boolean',
        'regular_price' => 'decimal:2',
        'sale_price' => 'decimal:2',
        'weight' => 'decimal:3',
        'length' => 'decimal:2',
        'width' => 'decimal:2',
        'height' => 'decimal:2',
        'sale_price_start' => 'datetime',
        'sale_price_end' => 'datetime',
        'upsell_ids' => 'json',
        'cross_sell_ids' => 'json',
        'grouped_product_ids' => 'json',
        'meta_data' => 'json',
    ];

    // Relaciones
    public function categories()
    {
        return $this->belongsToMany(Category::class, 'product_categories');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'product_tags');
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }

    public function featuredImage()
    {
        return $this->hasOne(ProductImage::class)->where('is_featured', true);
    }

    public function downloads()
    {
        return $this->hasMany(ProductDownload::class);
    }

    public function attributes()
    {
        return $this->hasMany(ProductAttribute::class);
    }

    public function variationAttributes()
    {
        return $this->hasMany(ProductVariationAttribute::class);
    }

    public function parent()
    {
        return $this->belongsTo(Product::class, 'parent_id');
    }

    public function variations()
    {
        return $this->hasMany(Product::class, 'parent_id')->where('type', 'variation');
    }

    public function inventoryMovements()
    {
        return $this->hasMany(InventoryMovement::class);
    }

    // Métodos auxiliares para compatibilidad con código anterior
    public function category()
    {
        return $this->categories()->first();
    }

    public function getCategoryAttribute()
    {
        return $this->categories()->first();
    }

    public function getStockAttribute()
    {
        return $this->stock_quantity;
    }

    public function getPriceAttribute()
    {
        return $this->regular_price;
    }

    // Scopes
    public function scopePublished($query)
    {
        return $query->where('status', 'published');
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    public function scopeInStock($query)
    {
        return $query->where('stock_status', 'instock');
    }

    public function scopeVariable($query)
    {
        return $query->where('type', 'variable');
    }

    public function scopeSimple($query)
    {
        return $query->where('type', 'simple');
    }

    public function scopeActive($query)
    {
        return $query->where('status', 'published');
    }

    // Métodos auxiliares
    public function getCurrentPrice()
    {
        if ($this->sale_price && $this->isOnSale()) {
            return $this->sale_price;
        }
        return $this->regular_price;
    }

    public function isOnSale()
    {
        if (!$this->sale_price) {
            return false;
        }

        $now = now();
        
        if ($this->sale_price_start && $now < $this->sale_price_start) {
            return false;
        }
        
        if ($this->sale_price_end && $now > $this->sale_price_end) {
            return false;
        }
        
        return true;
    }

    public function isInStock()
    {
        return $this->stock_status === 'instock';
    }

    public function isVariable()
    {
        return $this->type === 'variable';
    }

    public function isVariation()
    {
        return $this->type === 'variation';
    }

    public function hasStock()
    {
        if (!$this->manage_stock) {
            return true;
        }
        
        return $this->stock_quantity > 0;
    }

    public function canBackorder()
    {
        return in_array($this->backorders, ['yes', 'notify']);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    // Eventos del modelo
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($product) {
            if (empty($product->slug)) {
                $product->slug = Str::slug($product->name);
            }
        });

        static::updating(function ($product) {
            if ($product->isDirty('name') && empty($product->slug)) {
                $product->slug = Str::slug($product->name);
            }
        });
    }
}
