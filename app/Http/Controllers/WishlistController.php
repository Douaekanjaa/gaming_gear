<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function addToWishlist(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error_message', 'Please log in to add products to your wishlist.');
        }

        $productId = $request->input('product_id');
        $user = Auth::user();

        if ($user->wishlist()->where('product_id', $productId)->exists()) {
            return redirect()->back()->with('error_message', 'Product is already in your wishlist.');
        }

        $user->wishlist()->attach($productId);

        return redirect()->back()->with('success_message', 'Product added to wishlist successfully.');
    }

    public function index()
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error_message', 'Please log in to view your wishlist.');
        }

        $wishlistItems = Auth::user()->wishlist;
        return view('wishlist', compact('wishlistItems'));
    }

    public function removeFromWishlist($id)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error_message', 'Please log in to manage your wishlist.');
        }

        $user = Auth::user();
        $user->wishlist()->detach($id);
        return redirect()->route('wishlist')->with('success_message', 'Product removed from wishlist successfully.');
    }
}
