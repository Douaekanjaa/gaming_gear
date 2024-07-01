<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function showAllProducts()
    {
        $products = Product::all();
        $categories = Category::pluck('name', 'id');
        return view('admin.allproducts', ['products' => $products, 'categories' => $categories]);
    }
}
