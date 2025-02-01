<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $fillable = ['order_number', 'cart_id', 'status'];
    protected static function boot()
    {
        parent::boot();
        static::creating(function ($order) {
            $order->order_number = bin2hex(random_bytes(8));
        });
    }
    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }
}
