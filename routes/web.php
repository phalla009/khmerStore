<?php
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('index');
// })->name('index');

// Route::get('/about', function () {
//     return view('about');
// })->name('about');

// Route::get('/contact', function () {
//     return view('contact');
// })->name('contact'); 

// Route::get('/student/{id}/{name?}', function ($id, $name = null) {
//     return view('testing', compact('id','name'));
// })->where([
//     'id' => '[0-9]+$',
//     'name' => '[a-zA-Z \.]*$'
// ]);


// Route::get('/', function () {
//     return view('layouts/master');
// })->name(name: 'layouts/master');

// Route::get('/product/index',[ProductController::class,'index'] );
// Route::get('/product/edit',[ProductController::class,'edit'] );
// Route::get('/product/store',action: [ProductController::class,'store'] );
// Route::get('/product/create',action: [ProductController::class,'create'] );
// Route::get('/product/update',action: [ProductController::class,'update'] );
// Route::get('/product/show',action: [ProductController::class,'show'] );
// Route::get('/product/delete',action: [ProductController::class,'destroy'] );



Route:: get('/',function(){
    return view('dashboard');
})->name('dashboard');


route::get('login-form',[UserController::class,'loginForm'])->name('loginForm');
route::get('login',[UserController::class,'login'])->name('login');
Route::post('login', [UserController::class, 'login'])->name('login');




route::get('products/search',function(){
    return view("products.search");
})->name('products.search');
Route::resource('/products', ProductController::class);

// Route::get('products/confirm-delete/{id}',[ProductController::class,'confirmDelete'])->name('[products.confirm.deletion');

Route::get('/products/{id}/confirm-deletion', [ProductController::class, 'confirmDeletion'])
    ->name('products.confirm.deletion');


   















