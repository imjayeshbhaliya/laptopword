<?php

use Illuminate\Support\Facades\Route;
use App\Modules\Allorder\Http\Controllers\AllorderController;



Route::group(["prefix"=>"admin/allorder","middleware" => ["auth"]], function(){
        Route::get('/', 'AllorderController@welcome')->name('allorder.index');

        Route::get('/invoice/{id}', [AllorderController::class,'invoice'])->name('allorder.invoice');
        Route::get('/edit/{id}', [AllorderController::class,'edit'])->name('allorder.edit');
        Route::post('/update/{id}', [AllorderController::class,'update'])->name('allorder.invoice');
});

Route::group(["prefix"=>"admin/users","middleware" => ["auth"]], function(){
        Route::get('/', 'AllorderController@users')->name('allorder.users');
});