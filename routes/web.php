<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;




Route::resource('/contact', ContactController::class);
Route::get('/', function () {
    return view('frontview.home');
})->name('frontview.home');
Route::get('/admin', function () {
    return view('auth.login'); 
});
Route::get('/login', function () {
    return view('auth.login'); 
});

Auth::routes();

Route::get('/admin/home', [App\Http\Controllers\HomeController::class, 'index'])->name('admin.home');


// fontend

// Route::get('/home', [App\Http\Controllers\FrontendController::class, 'home'])->name('frontview.home');
Route::get('/grid', [App\Http\Controllers\FrontendController::class, 'grid'])->name('frontview.grid');
Route::get('/list', [App\Http\Controllers\FrontendController::class, 'list'])->name('frontview.list');
Route::get('/gridView', [App\Http\Controllers\FrontendController::class, 'products'])->name('gridView');

Route::get('/products/{url}',[App\Http\Controllers\FrontendController::class,'detail']);
// Route::get('/sortproduct', [App\Http\Controllers\FrontendController::class, 'sortproduct']);
Route::get('/front/getrangeajax', [App\Http\Controllers\FrontendController::class, 'getrangeajax']);
Route::get('/cart', [App\Http\Controllers\CartController::class, 'cart'])->name('productcart');
Route::post('/addtocart', [App\Http\Controllers\CartController::class, 'addtocart'])->name('addtocart');
Route::post('/removecart', [App\Http\Controllers\CartController::class, 'removecart'])->name('cart.remove');
Route::post('/updatecart', [App\Http\Controllers\CartController::class, 'updatecart'])->name('cart.update');

// checkout
Route::get('/billing', [App\Http\Controllers\CheckoutController::class, 'billing'])->name('cart.billing');
Route::post('/addbilling', [App\Http\Controllers\CheckoutController::class, 'addbilling'])->name('cart.addbilling');
Route::get('/shipping', [App\Http\Controllers\CheckoutController::class, 'shipping'])->name('cart.shipping');
Route::post('/addshipping', [App\Http\Controllers\CheckoutController::class, 'addshipping'])->name('cart.addshipping');
Route::get('/payment', [App\Http\Controllers\CheckoutController::class, 'payment'])->name('cart.payment');
Route::get('/orderreview', [App\Http\Controllers\CheckoutController::class, 'orderreview'])->name('cart.orderreview');
Route::post('/placeorder', [App\Http\Controllers\CheckoutController::class, 'placeorder'])->name('cart.placeorder');

Route::get('/thankyou', [App\Http\Controllers\CheckoutController::class, 'thankyou'])->name('cart.thankyou');
Route::get('/myorders', [App\Http\Controllers\CheckoutController::class, 'myorders'])->name('cart.myorders');
Route::get('/myorder_details/{id}', [App\Http\Controllers\CheckoutController::class, 'myorder_details'])->name('cart.myorder_details');



// address
Route::get('/address', [App\Http\Controllers\CheckoutController::class, 'address'])->name('cart.address');
Route::post('/save_address', [App\Http\Controllers\CheckoutController::class, 'save_address'])->name('cart.save_address');

Route::get('/get/session', function(){
    // Session::flush();
    $sessiondata = Session::get('cart');
    return $sessiondata;
});


// Route::post('/removecart', [App\Http\Controllers\CartController::class, 'removeCart'])->name('cart.remove');
