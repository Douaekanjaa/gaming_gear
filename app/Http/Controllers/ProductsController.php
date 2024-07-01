<?php

namespace App\Http\Controllers;

use Stripe\Stripe;
use Dompdf\Dompdf;
use Dompdf\Options;
use App\Models\Order;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Pagination\Paginator;
use App\Http\Requests\AddProductRequest;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware('auth')->only('checkout');
    }
    
    public function index()
    {
        $categories = DB::table('categories')->get();
        $brands = DB::table('brands')->get();
        $products = Product::paginate(8); 
        return view('home', compact('categories', 'products', 'brands'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = DB::table('categories')->get();
        $brands = DB::table('brands')->get();
        return view('admin.addproducts', compact('categories', 'brands'));
    }
    
    /**
     * Store a newly created resource in storage.
     */
    public function store(AddProductRequest $request)
    {
        // Validation
        $request->validated();

        // Uploading product image
        $imageFilename = $request->file('productImage')->getClientOriginalName();
        $request->file('productImage')->move(public_path('images'), $imageFilename);

        // Creating product
        $product = new Product();
        $product->name = $request->input('productName');
        $product->description = $request->input('productDescription');
        $product->price = $request->input('productPrice');
        $product->category_id = $request->input('category');
        $product->image = $imageFilename;
        $product->brand_id = $request->input('brand');
        $product->save();

        // Saving gallery images
        if ($request->hasFile('productGallery')) {
            foreach ($request->file('productGallery') as $galleryImage) {
                $galleryFilename = $galleryImage->getClientOriginalName();
                $galleryImage->move(public_path('product_images'), $galleryFilename);

                $productImage = new ProductImage();
                $productImage->product_id = $product->id;
                $productImage->image_filename = $galleryFilename;
                $productImage->save();
            }
        }

        return back()->with('success','You have successfully added a new Product.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $product = Product::findOrFail($id);
        $images = ProductImage::where('product_id', $id)->get();
        return view('show', ['product' => $product, 'images' => $images]);
    }


    public function edit(string $id)
    {
        $categories = DB::table('categories')->get();
        $product = Product::find($id);
        return view('admin.editproduct')->with('product', $product)->with('categories' , $categories);
    }


    public function update(AddProductRequest $request, string $id)
    {
        $request->validated();

        $productName = $request->input('productName');
        $productDescription = $request->input('productDescription');
        $productPrice = $request->input('productPrice');
        $category = $request->input('category');

        $image = '';

        $product = Product::find($id);
        $product->name = $productName;
        $product->description = $productDescription;
        $product->price = $productPrice;
        $product->category_id = $category;

        if ($request->hasFile('productImage')) {
            $image = $request->file('productImage')->getClientOriginalName();
            $request->file('productImage')->move(public_path('images'), $image);
        } else {
            $image = $product->image;
        }
        $product->image = $image;

        $product->save();

        return back()->with('successupdate','You have successfully updated a product.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::find($id);
        $product->delete();
        return back()->with('successdelete','You have successfully deleted a product.');
    }

    public function checkout(Request $request)
    {
        Stripe::setApiKey(env('STRIPE_SECRET_KEY'));
        // Log the entry point of the checkout method
        Log::info('Checkout method called.');
        

        // Ensure user is authenticated
        if (!$request->user()) {
            // Log if the user is not authenticated
            Log::info('User is not authenticated.');
            
            // Redirect the user to the login page with a message
            return redirect()->route('login')->with('error', 'You need to log in to proceed to checkout.');
        }

        // Log user information for debugging
        Log::info('User authenticated:', ['user_id' => $request->user()->id, 'user_role' => $request->user()->role]);

        // Get the products from the user's shopping cart
        $user = $request->user();
        $cart = $user->shoppingCart;
        Log::info('Cart items:', $cart->toArray());
        // Check if the cart is not null and not empty
        if (!$cart || $cart->isEmpty()) {
            // Log if the cart is empty
            Log::info('User cart is empty.');

            // Handle case where cart is empty
            return redirect()->route('cart.show')->with('error', 'Your cart is empty. Please add some items to proceed to checkout.');
        }

        // Log cart items for debugging
        Log::info('Cart items:', $cart->toArray());

        // Calculate total price and prepare line items
        $totalPrice = 0;
        $lineItems = [];

        // Iterate through cart items to calculate total price and prepare line items
        foreach ($cart as $item) {
            $quantity = $item->pivot->quantity;
    
            // Log the quantity value
            Log::info('Quantity: ' . $quantity);
            $totalPrice += $item->price;
        
            $lineItems[] = [
                'price_data' => [
                    'currency' => 'usd',
                    'product_data' => [
                        'name' => $item->name,
                        // No need to include the 'images' key
                    ],
                    'unit_amount' => $item->price * 100,
                ],
                'quantity' => 1,
            ];
        }
        
        

        // Debugging: Log the total price and line items
        Log::info('Total price:', ['total_price' => $totalPrice]);
        Log::info('Line items:', $lineItems);

        // Generate the success URL with the actual session ID
        $successUrl = route('checkout.success', [], true) . "?session_id={CHECKOUT_SESSION_ID}";
        Log::info('Generated Success URL: ' . $successUrl);

        // Handle Stripe checkout session creation and order saving
        try {
            // Create a new checkout session
            $session = \Stripe\Checkout\Session::create([
                'line_items' => $lineItems,
                'mode' => 'payment',
                'success_url' => $successUrl,
                'cancel_url' => route('checkout.cancel', [], true),
            ]);

            // Save order details
            $order = new Order();
            $order->status = 'unpaid';
            $order->total_price = $totalPrice;
            $order->session_id = $session->id;
            $order->user_id = $user->id;
            $order->save();

            // Redirect to the Stripe checkout page
            return redirect($session->url);
        } catch (\Exception $e) {
            // Handle any exceptions
            Log::error('Stripe Exception: ' . $e->getMessage());
            // Redirect back with error message
            return back()->with('error', 'An error occurred during checkout. Please try again.');
        }
    }

    public function success(Request $request)
    {
        Stripe::setApiKey(env('STRIPE_SECRET_KEY'));
        $sessionId = $request->get('session_id');

        try {
            $session = \Stripe\Checkout\Session::retrieve($sessionId);
            if (!$session) {
                throw new NotFoundHttpException;
            }
            $customer = \Stripe\Customer::retrieve($session->customer);

            $order = Order::where('session_id', $session->id)->first();
            if (!$order) {
                throw new NotFoundHttpException();
            }
            if ($order->status === 'unpaid') {
                $order->status = 'paid';
                $order->save();
            }

            return view('chekout-success', compact('customer'));
        } catch (\Exception $e) {
            throw new NotFoundHttpException();
        }
    }

    public function cancel()
    {

    }

    public function webhook()
    {
        // This is your Stripe CLI webhook secret for testing your endpoint locally.
        Stripe::setApiKey(env('STRIPE_SECRET_KEY'));
        $endpoint_secret = env('STRIPE_WEBHOOK_SECRET');

        $payload = @file_get_contents('php://input');
        $sig_header = $_SERVER['HTTP_STRIPE_SIGNATURE'];
        $event = null;

        try {
            $event = \Stripe\Webhook::constructEvent(
                $payload, $sig_header, $endpoint_secret
            );
        } catch (\UnexpectedValueException $e) {
            // Invalid payload
            return response('', 400);
        } catch (\Stripe\Exception\SignatureVerificationException $e) {
            // Invalid signature
            return response('', 400);
        }

        // Handle the event
        switch ($event->type) {
            case 'checkout.session.completed':
                $session = $event->data->object;

                $order = Order::where('session_id', $session->id)->first();
                if ($order && $order->status === 'unpaid') {
                    $order->status = 'paid';
                    $order->save();
                    // Send email to customer
                }

            // ... handle other event types
            default:
                echo 'Received unknown event type ' . $event->type;
        }

        return response('');
    }

    public function cataloguepdf()
    {
        $products = Product::where('sale', true)->get();

        $data = [
            'products' => $products,
        ];

        $pdf = new Dompdf();

        $pdf->loadHtml(view('catalogue', $data));

        $pdf->render();

        return $pdf->stream('catalogue.pdf');
    }

}
