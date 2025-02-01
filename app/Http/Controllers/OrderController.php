<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Order;
use App\Models\User;

class OrderController extends Controller
{
    public function place_order(Request $request)
    {
        $cart = Cart::where('user_id', auth()->id())->first();
        $order = new Order;
        $order->cart_id = $cart->id;
        $order->status = 'pending';
        $order->save();
        return redirect()->route('home')->with('success', 'Order placed successfully.');
    }
}
