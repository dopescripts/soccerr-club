<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Models\Category;
use App\Models\FeaturedProducts;
use App\Models\Vendor;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
class ProductsController extends Controller
{
    public function products()
    {
        $products = Product::paginate(5);
        return view('admin.pages.products', compact('products'));
    }
    public function create()
    {
        $category = Category::all();
        $vendor = Vendor::all();
        return view('admin.pages.createproduct', compact('category', 'vendor'));
    }
    public function store(ProductStoreRequest $request)
    {
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

    public function edit($slug)
    {
        $product = Product::where('slug', $slug)->first();
        $category = Category::all();
        $vendor = Vendor::all();
        $featuredProducts = FeaturedProducts::pluck('product_id')->toArray();
        return view('admin.pages.editproduct', compact('product', 'category', 'vendor', 'featuredProducts'));
    }

    public function update(ProductUpdateRequest $request, $id)
    {
        $product = Product::findOrFail($id); // Use `findOrFail` to handle invalid IDs
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
    public function delete($id)
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
    public function deactivate(Request $request, $id)
    {
        $product = Product::find($id);
        if (!$product) {
            return redirect()->back()->with('error', 'Product not found.');
        }

        $product->is_active = 0;
        $product->save();

        return redirect()->route('admin.products')->with('success', 'Product status updated successfully!');
    }
    public function activate(Request $request, $id)
    {
        $product = Product::find($id);
        if (!$product) {
            return redirect()->back()->with('error', 'Product not found.');
        }

        $product->is_active = 1;
        $product->save();

        return redirect()->route('admin.products')->with('success', 'Product status updated successfully!');
    }
}
