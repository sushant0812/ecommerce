<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\Vendor\ProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';



Route::middleware(['auth'])->group(function () {
    Route::get('/become-vendor', [VendorController::class, 'create']);
    Route::post('/become-vendor', [VendorController::class, 'store']);
});

Route::middleware(['auth', 'admin'])->group(function () {

    Route::get('/admin/vendors', [VendorController::class, 'index']);
    Route::post('/admin/vendors/{id}/approve', [VendorController::class, 'approve']);
    Route::post('/admin/vendors/{id}/reject', [VendorController::class, 'reject']);

});


Route::middleware(['auth'])->group(function () {

    Route::get('/vendor/products', [ProductController::class, 'index']);
    Route::get('/vendor/products/create', [ProductController::class, 'create']);
    Route::post('/vendor/products', [ProductController::class, 'store']);

});