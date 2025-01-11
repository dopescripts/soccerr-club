<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
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
    public function category() {
        $this->belongsTo(Categories::class);
    }
    public function vendor() {
        $this->belongsTo(Vendor::class);
    }
    public function orders() {
        $this->hasMany(Orders::class);
    }
}
