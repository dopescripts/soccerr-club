<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        return view('cart');
    }

    public function add(Request $request, $slug)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        $product = Product::where('slug', $slug)->first();
        $user = Auth::user();
        $cart = new Cart;
        $cart->user_id = $user->id;
        $cart->product_id = $product->id;
        // Set quantity to 1 if not provided
        $cart->quantity = ($request->has('quantity')) ? $request->quantity : 1;
        $cart->sub_total = ($product->price - $product->price * $product->discount_percentage) * $cart->quantity;
        $cart->shipping = 0.00; // Set shipping to 0 for now
        $cart->total = $cart->sub_total + $cart->shipping;
        $cart->save();
        return redirect()->back()->with('success', 'Product added to cart');
    }

    public function remove($slug)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        $product = Product::where('slug', $slug)->first();
        $user = Auth::user();
        $cart = Cart::where('user_id', $user->id)->where('product_id', $product->id)->first();
        $cart->delete();
        return redirect()->back()->with('success', 'Product removed from cart');
    }
}
