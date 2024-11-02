<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\providerController;
use App\Http\Controllers\travellerController;

Route::get('/', [userController::class, 'index']);

// Register Routes
Route::get('/register/traveller', [userController::class, 'traveller'])->name('registerTraveller');
Route::get('/register/provider', [userController::class, 'provider'])->name('registerProvider');
Route::post('/register/provider', [userController::class, 'storeProvider'])->name('storeProvider');
Route::post('/register/traveller', [userController::class, 'storeTraveller'])->name('storeTraveller');

// Login Route
Route::post('/login/{id}', [userController::class, 'login'])->name('login');

// Dashboard Routes
Route::get('/provider/dashboard', [providerController::class, 'index'])->name('providorDashboard')->middleware('auth');
Route::get('/traveller/dashboard', [travellerController::class, 'index'])->name('travellerDashboard')->middleware('auth');
Route::get('/admin/dashboard', [adminController::class, 'index'])->name('adminDashboard')->middleware('auth');

// Logout Route
Route::get('/logout', [userController::class, 'logout'])->name('logout')->middleware('auth');

//Admin Routes
Route::group(['prefix' => 'admin', 'middleware' => ['role:admin', 'auth']], function () {
    Route::get('/users/create', [AdminController::class, 'createUser'])->middleware('auth')->name('createUser');
    Route::post('/users/create', [AdminController::class, 'storeUser'])->middleware('auth')->name('storeUser');
    Route::get('/users/view', [AdminController::class, 'showUsers'])->name('showUsers');
    Route::get('/users/view/{id}', [AdminController::class, 'showUser'])->name('showUser');
    Route::delete('/users/delete/{id}', [AdminController::class, 'destroyUser'])->name('destroyUser');
    Route::get('/users/edit/{user}', [AdminController::class, 'editUser'])->name('editUser');
    Route::put('/users/edit/{user}', [AdminController::class, 'updateUser'])->name('updateUser');
});
