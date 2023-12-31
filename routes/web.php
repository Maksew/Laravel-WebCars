<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\VehicleController;
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

Route::get('/', [VehicleController::class, 'index'])->name('dashboard');
Route::get('/dashboard', [VehicleController::class, 'index'])->name('dashboard.index');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('register', [RegisteredUserController::class, 'store']);

Route::get('/rating/create', [RatingController::class, 'create'])->name('rating.create');
Route::post('/rating/store', [RatingController::class, 'store'])->name('rating.store');

Route::get('/vehicles/create', [VehicleController::class, 'create'])->name('vehicle.create')->middleware('auth');
Route::post('/vehicles', [VehicleController::class, 'store'])->name('store.vehicle');
Route::get('/vehicles', [VehicleController::class, 'index'])->name('vehicle.index');
Route::delete('/vehicles/{vehicle}', [VehicleController::class, 'destroy'])->name('vehicle.destroy');


Route::get('/get-models-by-brand/{brand}', [VehicleController::class, 'getModelsByBrand']);

Route::post('comments', [CommentController::class, 'store'])->name('comments.store');
Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');
Route::get('/comments/{comment}/edit', [CommentController::class, 'edit'])->name('comments.edit');
Route::put('/comments/{comment}', [CommentController::class, 'update'])->name('comments.update');


require __DIR__ . '/auth.php';
