<?php

use App\Modules\Colour\Http\Controllers\ColourController;
use Illuminate\Support\Facades\Route;


Route::prefix('/colour')->group(function() 
{
    Route::group(["middleware" => ["auth"]], function(){
Route::get('/', 'ColourController@welcome')->name('colour.index');
Route::get('/addcolour', [ColourController::class,'formdata'])->name('colour.add');
Route::post('/addcolour', [ColourController::class,'getdata'])->name('colour.save');
Route::get('/deletecolour/{id}', [ColourController::class,'deletedata'])->name('colour.delete');
Route::post('/restoreall', [ColourController::class,'Restoreall'])->name('colour.restoreall');
Route::post('/changestatus', [ColourController::class,'changestatus']);
Route::get('/edit/{id}', [ColourController::class,'edit'])->name('colour.edit');
Route::post('/update/{id}', [ColourController::class,'update'])->name('colour.update');
Route::get('/trash','ColourController@showtrash')->name('colour.showtrash');
Route::get('/restoretrash/{id}', 'ColourController@restoretrash')->name('colour.restoretrash');
});
});