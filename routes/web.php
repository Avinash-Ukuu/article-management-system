<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    dd("hi");
});


require __DIR__.'/auth.php';
