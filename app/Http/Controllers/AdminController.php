<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function index(){
        return view('admin.pages.home');
    }
    public function login()
    {
        return view('admin.pages.login');
    }
    public function categories(Categories $category){
        $category = Categories::all();
        return view('admin.pages.categories', compact('category'));
    }
    public function store_category(Request $request, Categories $category)
    {
        $request->validate([
            'category_name' => 'required',
            'category_img' => 'required|file|image|mimes:jpeg,png,jpg,gif,svg|',
        ]);
        if ($request->file('category_img')->isValid()) {
            $category = new Categories;
            if ($request->hasFile('category_img')) {
                $image = $request->file('category_img');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('public'), $imageName);
                $category->image = $imageName;
                $category->name = $request->input('category_name');
                $category->save();
        }
    }
        else {
            // Handle error, e.g., log or return a message
            return back()->with('error', 'Invalid image file.');
        }

        return back()->with('success', 'Category added successfully.');
    }
    public function update_category(Request $request, $id)
    {
        $category = Categories::find($id);
        $request->validate([
            'category_name' => 'required',
            'category_img' => 'file|image|mimes:jpeg,png,jpg,gif,svg|',
        ]);
        if ($request->hasFile('category_img') && $request->file('category_img')->isValid()) {
            if ($category->image && file_exists(public_path('public/' . $category->image))) {
                unlink(public_path('public/' . $category->image)); // Delete the old image
            }
            
            $image = $request->file('category_img');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('public'), $imageName);
            $category->image = $imageName;
        }
        $category->name = $request->input('category_name');
        $category->save();
        return back()->with('success', 'Category updated successfully.');
    }
    public function delete_category($id)
    {
        $category = Categories::find($id);
        if ($category->image && file_exists(public_path('public/' . $category->image))) {
            unlink(public_path('public/' . $category->image)); // Delete the image
        }
        $category->delete();
        return back()->with('success', 'Category deleted successfully.');
    }
}
