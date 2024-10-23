<?php

use App\Http\Controllers\BoardingHouseController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

    //permissions
    Route::get('/permissions/create', [PermissionController::class, 'create'])->name('permissions.create');
    Route::post('/permissions', [PermissionController::class, 'store'])->name('permissions.store');
    Route::get('/permissions/{id}/edit', [PermissionController::class, 'edit'])->name('permissions.edit');
    Route::post('/permissions/{id}', [PermissionController::class, 'update'])->name('permissions.update');
    Route::delete('/permissions', [PermissionController::class, 'destroy'])->name('permissions.destroy');
    Route::get('/permissions', [PermissionController::class, 'index'])->name('permissions.index');

    //roles
    Route::get('/roles/create', [RoleController::class, 'create'])->name('roles.create');
    Route::post('/roles', [RoleController::class, 'store'])->name('roles.store');
    Route::get('/roles', [RoleController::class, 'index'])->name('roles.index');
    Route::get('/roles/{id}/edit', [RoleController::class, 'edit'])->name('roles.edit');
    Route::post('/roles/{id}', [RoleController::class, 'update'])->name('roles.update');
    Route::delete('/roles', [RoleController::class, 'destroy'])->name('roles.destroy');

    //boarding houses
    Route::get('/boardinghouses/create', [BoardingHouseController::class, 'create'])->name('boardinghouses.create');
    Route::post('/boardinghouses', [BoardingHouseController::class, 'store'])->name('boardinghouses.store');
    Route::get('/boardinghouses', [BoardingHouseController::class, 'index'])->name('boardinghouses.index');
    Route::get('/boardinghouses/{id}/info', [BoardingHouseController::class, 'show'])->name('boardinghouses.show');
    // Route::get('/roles/{id}/edit', [RoleController::class, 'edit'])->name('roles.edit');
    // Route::post('/roles/{id}', [RoleController::class, 'update'])->name('roles.update');
    // Route::delete('/roles', [RoleController::class, 'destroy'])->name('roles.destroy');

    //users
    // Route::get('/roles/create', [RoleController::class, 'create'])->name('roles.create');
    // Route::post('/roles', [RoleController::class, 'store'])->name('roles.store');
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::post('/users/{id}', [UserController::class, 'update'])->name('users.update');
    // Route::delete('/roles', [RoleController::class, 'destroy'])->name('roles.destroy');

    //comments and ratings
    Route::post('/boarding-houses/{boardingHouse}/reviews', [ReviewController::class, 'store'])->name('reviews.store');
});

require __DIR__.'/auth.php';
