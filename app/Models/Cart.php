<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $table = 'carts';
    protected $fillable = ['user_id'];

    // Automatically set the user_id to the authenticated user's ID
    protected static function boot()
    {
        parent::boot();
        static::creating(function ($cart) {
            $cart->user_id = auth()->id();
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function cartItems()
    {
        return $this->hasMany(CartItem::class);
    }
    public function getTotalAttribute()
    {
        return $this->cartItems()->sum('total') + $this->shipping;
    }
}
