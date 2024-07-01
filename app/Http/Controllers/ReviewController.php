<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function store(Product $product, Request $request)
    {
        $request->validate([
            'content' => 'required|string',
        ]);

        // Create review
        $review = new Review();
        $review->content = $request->input('content');
        $review->user_id = auth()->user()->id; // Assuming you have authentication
        $review->product_id = $product->id;
        $review->save();

        return redirect()->back()->with('success', 'Review added successfully!');
    }

    public function index(Product $product)
    {
        $reviews = $product->reviews()->with('user')->get();

        return view('reviews.index', compact('product', 'reviews'));
    }
}
