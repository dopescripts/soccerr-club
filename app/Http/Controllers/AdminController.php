<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;
use App\Models\CompletedOrder;
use App\Models\Product;
use App\Models\Vendor;
use App\Models\Order;
use Illuminate\Support\Facades\Storage;
use App\Models\User;

class AdminController extends Controller
{
    public function index(){
        $products = Product::orderby('id', 'desc')->where('is_active', '1')->take(6)->get();
        $vendors = Vendor::all();
        $orders = Order::all();
        return view('admin.pages.home', compact('products', 'vendors', 'orders'));
    }
    public function login()
    {
        return view('admin.pages.login');
    }
    public function categories(Categories $category){
        $categories = Categories::paginate(4);
        return view('admin.pages.categories', compact('categories'));
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
            'category_img' => 'file|image|mimes:jpeg,png,jpg,gif,svg,webp|',
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
        return redirect()->back()->with('toast_error', 'Deleted successfully!');
    }
    public function users(){
        $users = User::paginate(10);
        return view('admin.pages.users', compact('users'));
    }
    public function pending()
    {
        $orders = Order::orderby('id', 'desc')->where('status', 'pending')->get();
        return view('admin.pages.pendingOrders', compact('orders'));
    }
    public function completed()
    {
        $orders = CompletedOrder::orderby('id', 'desc')->where('status', 'completed')->get();
        return view('admin.pages.completedOrders', compact('orders'));
    }
    public function order_detail($order_number)
    {
        $order = CompletedOrder::where('order_number', $order_number)->first();
        return view('admin.pages.orderDetail', compact('order'));
    }
}
