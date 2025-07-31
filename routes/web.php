<?php
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AuthChecker;
use Illuminate\Support\Facades\Route;




Route::get('login-form',[UserController::class,'loginForm'])->name('loginForm');
Route::post('login', [UserController::class, 'login'])->name('login');
Route::get('logout',[UserController::class,'logout'])->name('logout');

Route::middleware([AuthChecker::class])->group(function(){

    Route:: get('/',function(){
        return view('dashboard');
        })->name('dashboard');

    route::get('products/search',function(){
        return view("products.search");
        })->name('products.search');

    Route::resource('/products', ProductController::class);
    Route::get('/products/{id}/confirm-deletion', [ProductController::class, 'confirmDeletion'])
        ->name('products.confirm.deletion');


    route::get('categories/search',function(){
        return view("categories.search");
        })->name('categories.search');

    Route::resource('/categories', CategoryController::class);
    Route::get('/categories/{id}/confirm-deletion', [CategoryController::class, 'confirmDeletion'])
        ->name('categories.confirm.deletion');

});





   















