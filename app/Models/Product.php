<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory;
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($products) {
            $products->slug = Str::slug($products->name);
        });
    }

    protected $table = 'products';

    protected $fillable = [
        'name',
        'description',
        'tags',
        'quantity',
        'thumb',
        'images',
        'is_active',
        'is_featured',
        'discount_percentage',
        'price',
    ];

    /**
     * Get the category that owns the Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Categories::class, 'category_id');
    }

    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
    }

    public function orders()
    {
        return $this->hasMany(Orders::class);
    }

    public function reviews()
    {
        return $this->hasMany(Reviews::class);
    }

    public function latest()
    {
        return $this->belongsToMany(LatestProducts::class);
    }

    public function featured()
    {
        return $this->hasMany(FeaturedProducts::class);
    }
}

