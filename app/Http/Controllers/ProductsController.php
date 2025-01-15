<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function products() 
    {
        return view('admin.pages.products');
    }
    public function products_add()
    {
        return view('admin.pages.createproduct');
    }
}
