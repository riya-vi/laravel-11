<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard' ,[DashboardController::class , 'ShowUsers']);
// })->middleware(['auth', 'verified'])->name('dashboard');


// Route::get('/dashboard', [DashboardController::class, 'showUsers'])->middleware(['auth', 'verified'])->name('dashboard');

// Route::get('/users' , [UserController::class , 'index'])->middleware(['auth' , 'verified']) ;

Route::get('users/{id}', [AdminController::class, 'update'])->middleware(['auth', 'verified']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});

Route::resource('products', ProductController::class);

// Route::resources([
//     'products' => ProductController::class,
// ]);

// Route::get('product', [ProductController::class , 'index'])->middleware(['auth' , 'verified']) ;

// Route::put('/products/{product}' , [ProductController::class , 'update'])->name('products.update') ;

// Route::put('/products' , [ProductController::class , 'uploadProductFile'])->name('products.uploadProductImage') ;



//admin routes
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/admin/users', [AdminController::class, 'showUsers'])->name('admin.users');
    Route::put('/admin/users/{id}', [AdminController::class, 'update'])->name('admin.users.update');
    Route::get('/admin/products' , [ProductController::class , 'index'])->name('admin.products') ;
    Route::post('/users/search',[AdminController::class,'showUsers'])->name('admin.user.search');

    Route::get('/admin/products/categories',[CategoryController::class,'index'])->name('admin.products.category');
});

//user routes
Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/user/dashboard', [UserController::class, 'index'])->name('user.dashboard'); 
    Route::get('user/products' , [ProductController::class, 'showOwnProducts'])->name('user.products') ;
});


//Book routes
// Route::get('/books',[BookController::class , 'index']) ;

require __DIR__ . '/auth.php';
