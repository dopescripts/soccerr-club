<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function add($slug)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        $product = Product::where('slug', $slug)->first();
        $user = Auth::user();
        $wishlist = new Wishlist;
        $wishlist->user_id = $user->id;
        $wishlist->product_id = $product->id;
        $wishlist->quantity = 1;
        $wishlist->save();
        return redirect()->back()->with('success', 'Product added to wishlist');
    }
    public function remove($slug)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        $product = Product::where('slug', $slug)->first();
        $user = Auth::user();
        $wishlist = Wishlist::where('user_id', $user->id)->where('product_id', $product->id)->first();
        $wishlist->delete();
        return redirect()->back()->with('success', 'Product removed from wishlist');
    }
}
