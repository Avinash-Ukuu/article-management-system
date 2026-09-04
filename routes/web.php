<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/',             [HomeController::class,'home'])->name('home');

Route::get('/category/{slug}', function(){
    dd('hi');
    })->name('category.show');
Route::get('/tag/{slug}', function(){
    dd('hi');
    })->name('tag.show');


Route::get('/{slug}',       [HomeController::class, 'show'])->name('content.show');


// Route::get('/test-home', function () {
//     return view('frontend.test.testHome');
// });
Route::get('/test-detail', function () {
    return view('frontend.test.testDetail');
});


require __DIR__.'/auth.php';
