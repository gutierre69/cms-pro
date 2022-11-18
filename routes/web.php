<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();




/* --- ADMIN --- */
Route::get('/admin', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin');
Route::get('/admin/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin-dashboard');

/* --- CATEGORY ADMIN --- */
Route::get('/admin/category', [App\Http\Controllers\Admin\CategoryController::class, 'index'])->name('admin-category');
Route::post('/admin/category', [App\Http\Controllers\Admin\CategoryController::class, 'store'])->name('admin-category-store');
Route::post('/admin/category/update/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'update'])->name('admin-category-update');
Route::get('/admin/category/new', [App\Http\Controllers\Admin\CategoryController::class, 'new'])->name('admin-category-new');
Route::get('/admin/category/edit/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'edit'])->name('admin-category-edit');
Route::get('/admin/category/delete/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'delete'])->name('admin-category-delete');

/* --- POSTS ADMIN --- */
Route::get('/admin/post', [App\Http\Controllers\Admin\PostController::class, 'index'])->name('admin-post');
Route::post('/admin/post', [App\Http\Controllers\Admin\PostController::class, 'store'])->name('admin-post-store');
Route::post('/admin/post/update/{id}', [App\Http\Controllers\Admin\PostController::class, 'update'])->name('admin-post-update');
Route::get('/admin/post/new', [App\Http\Controllers\Admin\PostController::class, 'new'])->name('admin-post-new');
Route::get('/admin/post/edit/{id}', [App\Http\Controllers\Admin\PostController::class, 'edit'])->name('admin-post-edit');
Route::get('/admin/post/delete/{id}', [App\Http\Controllers\Admin\PostController::class, 'delete'])->name('admin-post-delete');

/* --- CONFIG ADMIN --- */
Route::get('/admin/config', [App\Http\Controllers\Admin\ConfigController::class, 'index'])->name('admin-config');
Route::post('/admin/config', [App\Http\Controllers\Admin\ConfigController::class, 'store'])->name('admin-config-store');
Route::post('/admin/config/update/{id}', [App\Http\Controllers\Admin\ConfigController::class, 'update'])->name('admin-config-update');
Route::get('/admin/config/new', [App\Http\Controllers\Admin\ConfigController::class, 'new'])->name('admin-config-new');
Route::get('/admin/config/edit/{id}', [App\Http\Controllers\Admin\ConfigController::class, 'edit'])->name('admin-config-edit');
Route::get('/admin/config/delete/{id}', [App\Http\Controllers\Admin\ConfigController::class, 'delete'])->name('admin-config-delete');

/* --- MENU ADMIN --- */
Route::get('/admin/menu', [App\Http\Controllers\Admin\MenuController::class, 'index'])->name('admin-menu');
Route::post('/admin/menu/save', [App\Http\Controllers\Admin\MenuController::class, 'save'])->name('admin-menu-save');

/* --- MENU ADMIN --- */
Route::get('/admin/user/change-password', [App\Http\Controllers\Admin\UserController::class, 'index'])->name('admin-user-password');
Route::post('/admin/user/change-password', [App\Http\Controllers\Admin\UserController::class, 'save'])->name('admin-user-password-save');

/* --- WEBSITE--- */
Route::get('/', [App\Http\Controllers\Website\HomeController::class, 'index'])->name('home');

Route::get('/category/{slug}', [App\Http\Controllers\Website\CategoryController::class, 'single'])->name('category-single');
Route::get('/contact', [App\Http\Controllers\Website\ContactController::class, 'index'])->name('contact');
Route::post('/contact', [App\Http\Controllers\Website\ContactController::class, 'send'])->name('contact-send');

Route::get('/{slug}', [App\Http\Controllers\Website\PostController::class, 'single'])->name('single');