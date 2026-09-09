<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/',                 [HomeController::class,'home'])->name('home');
Route::get('/search',           [HomeController::class, 'search'])->name('search');
Route::get('/category/{slug}',  [HomeController::class, 'category'])->name('category.show');
Route::get('/tag/{slug}',       [HomeController::class, 'tag'])->name('tag.show');
Route::get('/categories',       [HomeController::class, 'categories'])->name('categories');
Route::get('/about',            [HomeController::class, 'about'])->name('about');
// Route::get('/sitemap.xml',      [HomeController::class, 'sitemap'])->name('sitemap');
Route::get('{category}/{slug}', [HomeController::class, 'show'])->name('content.show');

require __DIR__.'/auth.php';
