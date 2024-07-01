<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
    public function addItem(Request $request)
    {
        $productId = $request->input('product_id');
        $product = Product::find($productId);
    
        if (!$product) {
            return redirect()->route('cart.show')->with('error_message', 'Invalid product.');
        }
    
        // Add item to the session cart
        Cart::add($product->id, $product->name, 1, $product->price);
    
        // Synchronize the session cart with the database cart
        $user = $request->user();
        $user->shoppingcart()->sync(Cart::content()->pluck('id'));
    
        return redirect()->route('cart.show')->with('success_message', 'Item added to cart successfully!');
    }
    


    public function showCart()
{
    $cartItems = Cart::content();
    
    // Check if cart items exist
    if ($cartItems->isEmpty()) {
        $cartItems = collect(); // Set $cartItems to an empty collection
    }

    return view('cart', compact('cartItems'));
}
    public function removeItem($rowId)
    {
        Cart::remove($rowId);
        return redirect()->route('cart.show')->with('success_message', 'Item removed from cart successfully.');
    }
    public function updateQuantity(Request $request, $rowId)
{
    // Get the quantity from the request
    $quantity = $request->input('quantity');

    // Validate the quantity
    $validatedData = $request->validate([
        'quantity' => 'required|numeric|min:1',
    ]);

    // Update the quantity in the cart
    Cart::update($rowId, $quantity);

    // Synchronize the session cart with the database cart
    $user = $request->user();
    $user->shoppingcart()->sync(Cart::content()->pluck('id'));

    // Redirect back to the cart page with a success message
    return redirect()->route('cart.show')->with('success_message', 'Cart updated successfully.');
}

    

}
