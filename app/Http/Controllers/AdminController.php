<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        return view('admin.pages.home');
    }
    public function login()
    {
        return view('admin.pages.login');
    }
}
