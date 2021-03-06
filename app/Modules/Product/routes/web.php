<?php

use App\Modules\Product\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;


Route::prefix('/product')->group(function() {

    Route::group(["middleware" => ["auth"]], function(){
    Route::get('/', 'ProductController@welcome')->name('product.index');
    Route::get('/addproduct', [ProductController::class,'formdata'])->name('product.add');
    Route::post('/addproduct', [ProductController::class,'getdata'])->name('product.save');
    Route::get('/deleteproduct/{id}', [ProductController::class,'deletedata'])->name('product.delete');
    Route::post('/restore', [ProductController::class,'restore_data'])->name('product.restore');
    Route::post('/changestatus', [ProductController::class,'changestatus']);
    Route::get('/edit/{id}', [ProductController::class,'edit'])->name('product.edit');
    Route::post('/update/{id}', [ProductController::class,'update'])->name('product.update');
    Route::get('/trash', 'ProductController@showtrash')->name('product.showtrash');
    Route::get('/restoretrash/{id}', 'ProductController@restoretrash')->name('product.restoretrash');

});
});
