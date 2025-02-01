<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;
use App\Models\Product;
use App\Models\Team;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
class HomeController extends Controller
{
    public function index()
    {
        $category = Categories::all();
        $products = Product::all();
        $team = Team::take(4)->get();
        $latest_products = Product::orderby('id', 'desc')->take(20)->get();
        return view('web.pages.home', compact('category', 'products', 'latest_products', 'team'));
    }
    public function product($slug)
    {
        $product = Product::where('slug', $slug)->first();
        $latest_products = Product::orderby('id', 'desc')->take(20)->get();
        return view('web.pages.product', compact('latest_products', 'product'));
    }
    public function category_detail($id)
    {
        $category = Categories::find($id);
        return view('web.pages.categoryproducts', compact('category'));
    }
    public function login()
    {
        return view('auth.login');
    }
    public function products()
    {
        $products = Product::orderby('id', 'desc')->get()->where('is_active', 1);
        return view('web.pages.allproducts', compact('products'));
    }
    public function categories()
    {
        return view('web.pages.categories');
    }
    public function contact()
    {
        return view('web.pages.contact');
    }
    public function about()
    {
        return view('web.pages.about');
    }
    public function team()
    {
        $team = Team::all();
        return view('web.pages.team', compact('team'));
    }
    public function checkout($id)
    {

        $cart = Cart::find($id);
        $cartauth = Cart::where('user_id', Auth::id())->first();
        if ($cartauth->id != $cart->id) {
            return redirect()->route('home')->with('error', 'You are not authorized to view this page.');
        }
        return view('web.pages.checkout', compact('cart'));
    }
}
