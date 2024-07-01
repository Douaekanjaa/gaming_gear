<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function showCategories()
    {
        $categories = DB::table('categories')->get();
        return view('home', ['categories' => $categories]);
    }

    public function showCategoryProducts($category)
    {
        // Assuming you have a 'name' column in your categories table
        $categoryRecord = DB::table('categories')->where('name', $category)->first();
    
        if (!$categoryRecord) {
            // Handle case where category is not found
            abort(404);
        }
    
        // Use the 'category_id' column in the products table
        $products = DB::table('products')->where('category_id', $categoryRecord->id)->paginate(10);
    
        return view('products', ['category' => $category, 'products' => $products]);
    }
    
    
}
