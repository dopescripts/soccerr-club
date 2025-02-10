<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reviews;
class ReviewController extends Controller
{
    public function add_review(Request $request)
    {
        $request->validate([
            'product' => 'required',
            'user' => 'required',
            'rating' => 'required',
        ]);

        $review = new Reviews();
        $review->product_id = $request->product;
        $review->user_id = $request->user;
        $review->rating = $request->rating;
        $review->comment = $request->review;
        $review->save();

        return redirect()->back()->with('success', 'Review added successfully');
    }
}
