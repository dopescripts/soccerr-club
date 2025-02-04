<?php

namespace App\Http\Controllers;

use App\Models\CompletedOrder;
use Illuminate\Http\Request;
use App\Models\CartItem;
use App\Models\Order;
use App\Models\Cart;
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
    public function approve(Request $request)
    {
        $order = Order::find($request->order_id);
        if (!$order) {
            return back()->with('error', 'Order not found.');
        }
        $cartItems = CartItem::where('cart_id', $order->cart_id)->get();
        $orderItems = $cartItems->map(function ($item) {
            return [
                'product_id' => $item->product->id,
                'product_name' => $item->product->name,
                'price' => $item->product->price,
                'quantity' => $item->quantity
            ];
        })->toArray();
        $completedOrder = new CompletedOrder;
        $completedOrder->user_id = $order->cart->user_id;
        if (!$order->cart) {
            return back()->with('error', 'Cart not found for this order.');
        }
        $completedOrder->total_price =  $order->cart->getTotalAttribute();
        $completedOrder->order_items = json_encode($orderItems);
        $completedOrder->order_number = $order->order_number;
        $completedOrder->save();
        $order->delete();
        CartItem::where('cart_id', $order->cart_id)->delete();
        return redirect()->route('completed.orders')->with('success', 'Order approved successfully.');
    }
}
