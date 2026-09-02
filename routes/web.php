<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/',             [HomeController::class,'home'])->name('home');
Route::get('/detail', function () {
    return view('frontend.detail');
});


require __DIR__.'/auth.php';
