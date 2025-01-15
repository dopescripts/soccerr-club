<?php

namespace App\Http\Controllers;

use App\Models\Vendor;
use Illuminate\Http\Request;

class VendorController extends Controller
{
    public function vendor(){
        $vendor = Vendor::all();
        return view('admin.pages.vendor', compact('vendor'));
    }
    public function vendor_store(Request $request, Vendor $vendor)
    {
        $request -> validate([
            'name' => 'required',
            'email' => 'required',
            'role' => 'required',
            'password' => 'required'
        ]);
        $vendor = new Vendor();
        $vendor->name = $request->name;
        $vendor->email = $request->email;
        $vendor->role = $request->role;
        $vendor->remember_token = rand(1000, 9999);
        $vendor->password = bcrypt($request->password);
        $vendor->save();
        return redirect()->back()->with('success', 'Vendor Added Successfully');
    }
    public function vendor_delete($id){
        $vendor = Vendor::find($id);
        $vendor->delete();
        return redirect()->back()->with('success', 'Vendor Deleted Successfully');
    }
}
