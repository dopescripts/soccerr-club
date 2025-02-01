<?php

use App\Models\Categories;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\Wishlist;

function getCategories()
{
    return Categories::orderBy('name', 'asc')->get();
}
if (!function_exists('getCartCount')) {
    function getCartCount()
    {
        if (Auth::check()) {
            return Auth::user()->cart->count();
        }
        return 0;
    }
}
function getWishlist()
{
    if (Auth::check()) {
        $wishlistItems = Wishlist::where('user_id', Auth::id())->get();
        return $wishlistItems;
    }
    return null;
}
function isProductInWishlist($productId)
{
    if (Auth::check()) {
        if (Wishlist::where('user_id', Auth::id())->where('product_id', $productId)->exists()) {
            return true;
        }
    }
    return false;
}
function getCart()
{
    if (Auth::check()) {
        $cart = Cart::where('user_id', Auth::id())->first();
        return $cart;
    }
    return null;
}
?>