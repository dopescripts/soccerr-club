<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\CartItem;

class CartController extends Controller
{
    public function add(Request $request, $slug)
    {
        $product = Product::where('slug', $slug)->first();
        $p_price = number_format($product->price - $product->price * $product->discount_percentage, 2);
        $cart = Cart::firstOrCreate(['user_id' => auth()->id()]);
        $cartItem = CartItem::where('cart_id', $cart->id)->where('product_id', $product->id)->first();
        if ($cartItem) {
            $cartItem->quantity = $request->has('quantity') ? $request->quantity : $cartItem->quantity + 1;
            $cartItem->sub_total = $p_price * $cartItem->quantity; // Recalculate sub_total based on product price and quantity
            $cartItem->total = $cartItem->sub_total;
            $cartItem->save();
        } else {
            $cartItem = new CartItem;
            $cartItem->cart_id = $cart->id;
            $cartItem->product_id = $product->id;
            $cartItem->quantity = $request->has('quantity') ? $request->quantity : 1;
            $cartItem->sub_total = $p_price * $cartItem->quantity;
            $cartItem->total = $cartItem->sub_total;
            $cartItem->save();
        }
        return back()->with('success', 'Product added to cart.');
    }
    public function remove($slug)
    {
        $id = CartItem::where('product_id', Product::where('slug', $slug)->first()->id)->first()->id;
        $cartItem = CartItem::find($id);
        $cartItem->delete();
        return back()->with('success', 'Product removed from cart.');
    }
}
