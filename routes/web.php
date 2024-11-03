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

    //User Routes
    Route::get('/users/create', [AdminController::class, 'createUser'])->middleware('auth')->name('createUser');
    Route::post('/users/create', [AdminController::class, 'storeUser'])->middleware('auth')->name('storeUser');
    Route::get('/users/view', [AdminController::class, 'showUsers'])->name('showUsers');
    Route::get('/users/view/{id}', [AdminController::class, 'showUser'])->name('showUser');
    Route::delete('/users/delete/{id}', [AdminController::class, 'destroyUser'])->name('destroyUser');
    Route::get('/users/edit/{user}', [AdminController::class, 'editUser'])->name('editUser');
    Route::put('/users/edit/{user}', [AdminController::class, 'updateUser'])->name('updateUser');

    //Profile Routes
    Route::get('/profile/view', [AdminController::class, 'showProfiles'])->name('showProfiles');
    Route::get('/profile/view/{profile}', [AdminController::class, 'showProfile'])->name('showProfile');
    Route::get('/profile/create', [AdminController::class, 'createProfile'])->name('createProfile');
    Route::post('/profile/create', [AdminController::class, 'storeProfile'])->name('storeProfile');
    Route::get('/profile/edit/{profile}', [AdminController::class, 'editProfile'])->name('editProfile');
    Route::put('/profile/edit/{profile}', [AdminController::class, 'updateProfile'])->name('updateProfile');
    Route::delete('/profile/delete/{profile}', [AdminController::class, 'destroyProfile'])->name('destroyProfile');

    //Service Routes
    Route::get('/service/view', [AdminController::class, 'showServices'])->name('showServices');
    Route::get('/service/view/{service}', [AdminController::class, 'showService'])->name('showService');
    Route::get('/service/create', [AdminController::class, 'createService'])->name('createService');
    Route::post('/service/create', [AdminController::class, 'storeService'])->name('storeService');
    Route::get('/service/edit/{service}', [AdminController::class, 'editService'])->name('editService');
    Route::put('/service/edit/{service}', [AdminController::class, 'updateService'])->name('updateService');
    Route::delete('/service/delete/{service}', [AdminController::class, 'destroyService'])->name('destroyService');

    //Booking Routes
    Route::post('/booking/create', [AdminController::class, 'createBooking'])->name('createBooking');
    Route::get('/booking/view', [AdminController::class, 'showBookings'])->name('showBookings');
    Route::get('/booking/view/{booking}', [AdminController::class, 'showBooking'])->name('showBooking');
    Route::get('/booking/edit/{booking}', [AdminController::class, 'editBooking'])->name('editBooking');
    Route::put('/booking/edit/{booking}', [AdminController::class, 'updateBooking'])->name('updateBooking');
    Route::delete('/booking/delete/{booking}', [AdminController::class, 'destroyBooking'])->name('destroyBooking');

    //Payment Routes
    Route::post('/payment/create', [AdminController::class, 'createPayment'])->name('createPayment');

});
