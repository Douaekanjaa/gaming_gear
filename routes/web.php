<?php
/* web.php */
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\WishlistController;



Route::get('/register', [UserController::class, 'registerForm'])->name('register');
Route::post('/register', [UserController::class, 'register']);

Route::get('/login', [UserController::class, 'loginForm'])->name('login');
Route::post('/login', [UserController::class, 'login']);

Route::post('/logout', [UserController::class, 'logout']);


Route::get('/', [ProductsController::class, 'index'])->name('home');

Route::get('/category/{category}', [CategoryController::class, 'showCategoryProducts'])->name('category.products');

Route::resource('products', ProductsController::class);

Route::get('/products/{id}', [ProductsController::class, 'show'])->name('show');


Route::group(['middleware' => 'adminuser:'.User::ADMIN_ROLE], function () {
    Route::get('/admin-dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    Route::get('/admin-dashboard/showproducts', [ProductController::class, 'showAllProducts'])->name('showproducts');

    

    Route::post('/admin-dashboard/products', [ProductsController::class, 'store'])->name('store');

    Route::get('/admin-dashboard/products/{id}/edit', [ProductsController::class, 'edit'])->name('edit');
    Route::delete('/admin-dashboard/products/{id}', [ProductsController::class, 'destroy'])->name('destroy');
});

Route::group(['middleware' => 'useruser:'.User::USER_ROLE], function () {
    // ...
});

Route::get('/about', function () {
    return view('aboutus');
})->name('about');






Route::get('/shop', [ShopController::class, 'index'])->name('shop.index');



Route::post('/cart/add', [CartController::class, 'addItem'])->name('cart.add');
Route::get('/cart', [CartController::class, 'showCart'])->name('cart.show');

Route::delete('/cart/{rowId}/remove', [CartController::class, 'removeItem'])->name('cart.remove');
Route::post('/cart/{rowId}/update', [CartController::class, 'updateQuantity'])->name('cart.update');



Route::post('/wishlist/add', [WishlistController::class, 'addToWishlist'])->name('wishlist.add');
Route::get('/wishlist', [WishlistController::class, 'index'])->name('wishlist');
Route::delete('/wishlist/remove/{id}', [WishlistController::class, 'removeFromWishlist'])->name('wishlist.remove');

Route::middleware('auth')->group(function () {
    Route::post('/products/{product}/reviews', [ReviewController::class, 'store'])->name('reviews.store');
});

Route::get('/products/{product}/reviews', [ReviewController::class, 'index'])->name('reviews.index');




Route::post('/checkout', [ProductsController::class, 'checkout'])->name('checkout');
Route::get('/success', [ProductsController::class, 'success'])->name('checkout.success');
Route::get('/cancel', [ProductsController::class, 'cancel'])->name('checkout.cancel');
Route::post('/webhook', [ProductsController::class, 'webhook'])->name('checkout.webhook');


Route::get('/catalogue', [ProductsController::class, 'cataloguepdf'])->name('catalogue');


Route::get('/account', [UserController::class, 'account'])->name('account')->middleware('useruser:'.User::USER_ROLE);
Route::put('/account/{user}', [UserController::class, 'update'])->name('account.update');


