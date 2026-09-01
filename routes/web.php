<?php


use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('frontend.home');
});
Route::get('/detail', function () {
    return view('frontend.detail');
});


require __DIR__.'/auth.php';
