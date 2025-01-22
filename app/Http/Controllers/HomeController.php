<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;
use App\Models\Product;
use App\Models\Team;
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
        $categories = Categories::all();
        return view('web.pages.categoryproducts', compact('category', 'categories'));
    }
    public function login()
    {
        return view('auth.login');
    }
    public function products()
    {
        $products = Product::all();
        $category = Categories::all();
        return view('web.pages.allproducts', compact('products', 'category'));
    }
    public function categories()
    {
        $categories = Categories::all();
        return view('web.pages.categories', compact('categories'));
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
        return view('web.pages.team');
    }
}
