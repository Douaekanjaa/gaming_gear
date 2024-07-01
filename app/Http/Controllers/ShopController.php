<?php
// app/Http/Controllers/ShopController.php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index()
    {
        $products = Product::all(); 
        $brands = Brand::all();
        $categories = Category::all();

        return view('shop', compact('products', 'brands', 'categories'));

    }
}