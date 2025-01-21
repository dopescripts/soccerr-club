<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\FeaturedProducts;
use App\Models\Vendor;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
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
                $files = $request->file('images'); // This will now include an ordered array
                foreach ($files as $key => $file) {
                    if ($file->isValid()) {
                       try {
                            $path = $file->store('uploads/products', 'public');
                            $imagePaths[$key] = $path;
                        } catch (\Exception $e) {
                            // Handle errors, e.g., log or add error messages
                            Log::error("File upload failed: " . $e->getMessage());
                        }

                    }
                }
                ksort($imagePaths);
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
            if ($request->input('featured')) {
                FeaturedProducts::updateOrCreate(
                    ['product_id' => $product->id], // Check if this product already exists in FeaturedProducts
                    [] // No additional fields to update
                );
            }
            return redirect()->route('admin.products')->with('success', 'Product added successfully!');
        }

        return redirect()->back()->with('error', 'Invalid thumbnail image.');
    }

    public function products_edit($slug)
    {
        $product = Product::where('slug', $slug)->first();
        $category = Categories::all();
        $vendor = Vendor::all();
        $featuredProducts = FeaturedProducts::pluck('product_id')->toArray();
        return view('admin.pages.editproduct', compact('product', 'category', 'vendor', 'featuredProducts'));
    }

    public function products_update(Request $request, $id)
    {
        $product = Product::findOrFail($id); // Use `findOrFail` to handle invalid IDs
        $request->validate([
            'name' => 'required|max:255',
            'category' => 'required|exists:categories,id',
            'vendor' => 'required|exists:vendors,id',
            'description' => 'required',
            'price' => 'required|numeric|min:0',
            'quant' => 'required|integer|min:1',
            'discount' => 'nullable|numeric|min:0|max:100',
            'thumbImg' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Handle images array
        $imagePaths = [];
        if ($request->hasFile('images')) {
            $existingImages = json_decode($product->images, true) ?? []; // Ensure valid JSON

            foreach ($existingImages as $image) {
                $filePath = public_path('storage/' . $image);
                if (file_exists($filePath)) {
                    @unlink($filePath); // Suppress errors with '@' and proceed
                }
            }
                $files = $request->file('images'); // This will now include an ordered array
                foreach ($files as $key => $file) {
                    if ($file->isValid()) {
                       try {
                            $path = $file->store('uploads/products', 'public');
                            $imagePaths[$key] = $path;
                        } catch (\Exception $e) {
                            // Handle errors, e.g., log or add error messages
                            Log::error("File upload failed: " . $e->getMessage());
                        }

                    }
                }
                ksort($imagePaths);
            $product->images = json_encode($imagePaths);
        }

        // Handle thumbnail image
        if ($request->hasFile('thumbImg')) {
            $thumbPath = public_path('storage/uploads/products/' . $product->thumb);
            if (file_exists($thumbPath)) {
                @unlink($thumbPath);
            }
            $thumbImage = $request->file('thumbImg');
            $thumbImageName = time() . '_thumb.' . $thumbImage->getClientOriginalExtension();
            $thumbImage->storeAs('uploads/products', $thumbImageName, 'public');
            $product->thumb = $thumbImageName;
        }

        // Update product details
        $product->name = $request->name;
        $product->price = $request->price;
        $product->quantity = $request->quant;
        $product->description = $request->description;
        $product->tags = $request->tags ?? $product->tags; // Preserve existing tags if not updated
        $product->is_featured = $request->has('featured') ? 1 : 0;
        $product->discount_percentage = $request->input('discount', 0);
        $product->category_id = $request->category;
        $product->vendor_id = $request->vendor;

        // Update featured products
        if ($request->has('featured')) {
            $existingFeature = FeaturedProducts::where('product_id', $product->id)->first();
            if (!$existingFeature) {
                $featured = new FeaturedProducts();
                $featured->product_id = $product->id;
                $featured->save();
            }
        }
        else {
            $existingFeature = FeaturedProducts::where('product_id', $product->id)->first();
            if ($existingFeature) {
                $existingFeature->delete();
            }
        }

        $product->save();

        return redirect()->route('admin.products')->with('success', 'Product updated successfully!');
    }
    public function products_delete($id)
    {
        $product = Product::find($id);
        if (!$product) {
            return redirect()->back()->with('error', 'Product not found.');
        }

        // Delete associated images
        $images = json_decode($product->images, true) ?? [];
        foreach ($images as $image) {
            $filePath = public_path('storage/' . $image);
            if (file_exists($filePath)) {
                @unlink($filePath); // Suppress errors with '@' and proceed
            }
        }

        // Delete thumbnail image
        $thumbPath = public_path('storage/uploads/products/' . $product->thumb);
        if (file_exists($thumbPath)) {
            @unlink($thumbPath); // Suppress errors with '@' and proceed
        }

        // Delete product
        $product->delete();

        return redirect()->route('admin.products')->with('success', 'Product deleted successfully!');
    }
}
