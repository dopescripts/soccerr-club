<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;

class HomeController extends Controller
{
    public function index()
    {
        $category = Categories::all();
        return view('web.pages.home', compact('category'));
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
        return view('web.pages.allproducts');
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
        return view('web.pages.team');
    }
}
