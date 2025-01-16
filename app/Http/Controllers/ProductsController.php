<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Vendor;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function products()
    {
        $products = Product::all();
        return view('admin.pages.products', compact('products'));
    }
    public function products_add()
    {
        $category = Categories::all();
        $vendor = Vendor::all();
        return view('admin.pages.createproduct', compact('category', 'vendor'));
    }
    public function products_create(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'category' => 'required|exists:categories,id', // Validate category exists
            'vendor' => 'required|exists:vendors,id',     // Validate vendor exists
            'description' => 'required',
            'price' => 'required|numeric|min:0',         // Use numeric validation
            'quant' => 'required|integer|min:1',         // Ensure quantity is an integer and greater than 0
            'discount' => 'nullable|numeric|min:0|max:100', // Validate discount percentage
            'thumbImg' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Images array is optional
        ]);
    
        $imagePaths = [];
    
        if ($request->file('thumbImg')->isValid()) {
            $product = new Product;
    
            // Handle thumbnail image
            if ($request->hasFile('thumbImg')) {
                $thumbImage = $request->file('thumbImg');
                $thumbImageName = time() . '_thumb.' . $thumbImage->getClientOriginalExtension();
                $thumbImage->storeAs('uploads/products', $thumbImageName, 'public'); // Save in 'storage/app/public/uploads/products'
                $product->thumb = $thumbImageName;
            }
    
            // Handle multiple images
            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $file) {
                    if ($file->isValid()) {
                        $path = $file->store('uploads/products', 'public'); // Save to 'storage/app/public/uploads/products'
                        $imagePaths[] = $path; // Add path to array
                    }
                }
            }
    
            // Assign product properties
            $product->name = $request->name;
            $product->price = $request->price;
            $product->quantity = $request->quant;
            $product->description = $request->description;
            $product->images = json_encode($imagePaths);
    
            if ($request->has('tags')) {
                $product->tags = $request->tags;
            }
    
            $product->is_featured = $request->has('featured') ? 1 : 0;
            $product->discount_percentage = $request->input('discount', 0); // Default to 0 if no discount
    
            $product->category_id = $request->category;
            $product->vendor_id = $request->vendor;
    
            $product->save();
    
            return redirect()->back()->with('success', 'Product added successfully!');
        }
    
        return redirect()->back()->with('error', 'Invalid thumbnail image.');
    }
}