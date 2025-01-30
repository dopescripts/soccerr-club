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
function getCart()
{
    if (Auth::check()) {
        // Get all cart items for the logged-in user
        $cartItems = Cart::with('product')->where('user_id', Auth::id())->get();

        // Calculate subtotal
        $subTotal = $cartItems->sum(function ($cartItem) {
            $priceAfterDiscount = $cartItem->product->price - ($cartItem->product->price * $cartItem->product->discount_percentage);
            return $priceAfterDiscount * $cartItem->quantity;
        });

        // Define shipping cost (can be dynamic if needed)
        $shipping = 0.00; // Example: fixed shipping cost

        // Calculate total
        $total = $subTotal + $shipping;

        // Return data as an object with cart details
        return (object) [
            'items' => $cartItems,
            'sub_total' => $subTotal,
            'shipping' => $shipping,
            'total' => $total,
        ];
    }

    return null; // If not authenticated, return null
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
function isProductinCart($productId)
{
    if (Auth::check()) {
        if (Cart::where('user_id', Auth::id())->where('product_id', $productId)->exists()) {
            return true;
        }
    }
    return false;
}
?>