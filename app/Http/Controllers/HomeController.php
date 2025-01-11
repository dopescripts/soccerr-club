<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('web.pages.home');
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
