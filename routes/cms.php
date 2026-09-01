<?php

use App\Http\Controllers\cms\CategoryController;
use App\Http\Controllers\cms\ContentController;
use App\Http\Controllers\cms\DashboardController;
use App\Http\Controllers\cms\ModuleController;
use App\Http\Controllers\cms\PermissionController;
use App\Http\Controllers\cms\RoleController;
use App\Http\Controllers\cms\TagController;
use App\Http\Controllers\cms\UserController;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| CMS Routes
|--------------------------------------------------------------------------
|
| Here is where you can register CMS routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "CMS" middleware group. Make something great!
|
*/


Route::get('/dashboard',                    [DashboardController::class,'dashboard'])->name('dashboard');

// User Management
Route::resource('user',                     UserController::class);
Route::resource("role",                     RoleController::class);
Route::resource("module",                   ModuleController::class);
Route::resource("permission",               PermissionController::class);
Route::get("assign/user/roles/{id}",        [UserController::class,'assignRoleForm'])->name('assignRoles');
Route::post("submit/user/roles",            [UserController::class,'assignRole'])->name('submitRole');
Route::get("assign/role/permissions/{id}",  [RoleController::class,'assignPermissionForm'])->name('assignPermissions');
Route::post("submit/role/permissions",      [RoleController::class,'assignPermission'])->name('submitPermission');
Route::get("/change/password",              [UserController::class,'changePassword'])->name("changePassword");
Route::post("/update/password",             [UserController::class,'updatePassword'])->name("updatePassword");
Route::get("switch/user/form",              [UserController::class,'switchUserForm'])->name('switchUserForm');
Route::post("switch/user",                  [UserController::class,'switchUser'])->name('switchUser');
Route::get("logout/switch/user",            [UserController::class,'logoutSwitchUser'])->name('logoutSwitchUser');

// Categories
Route::resource('categories',               CategoryController::class);
Route::patch('categories/{category}/toggle-status',[CategoryController::class, 'toggleStatus'])->name('categories.toggle-status');

// Tag
Route::resource('tags',                     TagController::class);

// Content
Route::resource('content',                  ContentController::class);
Route::patch('content/{content}/toggle-status',    [ContentController::class, 'toggleStatus'])->name('content.toggle-status');
Route::patch('content/{content}/toggle-featured',  [ContentController::class, 'toggleFeatured'])->name('content.toggle-featured');
