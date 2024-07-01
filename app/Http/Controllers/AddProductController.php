<?php
/* 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AddProductController extends Controller
{
    public function showAddProductForm()
    {
        $categories = DB::table('categories')->get();
        return view('admin.addproducts', ['categories' => $categories]);
    }


        public function addProduct(Request $request)
        {
            $request->validate([
                'productName' => 'required|string|max:255',
                'productDescription' => 'required|string',
                'productPrice' => 'required|numeric',
                'category' => 'required|exists:categories,id',
                'productImage' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
        
            $imageFileName = $request->file('productImage')->getClientOriginalName();
        
            DB::table('products')->insert([
                'name' => $request->input('productName'),
                'description' => $request->input('productDescription'),
                'price' => $request->input('productPrice'),
                'category_id' => $request->input('category'),
                'image' => $imageFileName,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        
            $request->file('productImage')->move(public_path('images'), $imageFileName);
        
            return redirect()->back()->with('success', 'Product added successfully.');
        }
}
 */