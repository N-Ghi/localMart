<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiceController;
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
Route::group(['prefix' => 'admin', 'middleware' => ['role:admin', 'auth']], function () 
{
    //Admin Routes
    Route::get('/users/create', [AdminController::class, 'createUser'])->middleware('auth')->name('createUser');
    Route::post('/users/create', [AdminController::class, 'storeUser'])->middleware('auth')->name('storeUser');
    Route::get('/users/view', [AdminController::class, 'showUsers'])->name('showUsers');
    Route::get('/users/view/{id}', [AdminController::class, 'showUser'])->name('showUser');
    Route::delete('/users/delete/{id}', [AdminController::class, 'destroyUser'])->name('destroyUser');
    Route::get('/users/edit/{user}', [AdminController::class, 'editUser'])->name('editUser');
    Route::put('/users/edit/{user}', [AdminController::class, 'updateUser'])->name('updateUser');
});
//Profile Routes
Route::get('/profile/view', [ProfileController::class, 'showProfiles'])->name('showProfiles');
Route::get('/profile/view/{profile}', [ProfileController::class, 'showProfile'])->name('showProfile');
Route::get('/profile/create', [ProfileController::class, 'createProfile'])->name('createProfile');
Route::post('/profile/create', [ProfileController::class, 'storeProfile'])->name('storeProfile');
Route::get('/profile/edit/{profile}', [ProfileController::class, 'editProfile'])->name('editProfile');
Route::put('/profile/edit/{profile}', [ProfileController::class, 'updateProfile'])->name('updateProfile');
Route::delete('/profile/delete/{profile}', [ProfileController::class, 'destroyProfile'])->name('destroyProfile');

//Service Routes
Route::get('/service/view', [ServiceController::class, 'showServices'])->name('showServices');
Route::get('/service/view/{service}', [ServiceController::class, 'showService'])->name('showService');
Route::get('/service/create', [ServiceController::class, 'createService'])->name('createService');
Route::post('/service/create', [ServiceController::class, 'storeService'])->name('storeService');
Route::get('/service/edit/{service}', [ServiceController::class, 'editService'])->name('editService');
Route::put('/service/edit/{service}', [ServiceController::class, 'updateService'])->name('updateService');
Route::delete('/service/delete/{service}', [ServiceController::class, 'destroyService'])->name('destroyService');

//Booking Routes
Route::post('/booking/create', [BookingController::class, 'createBooking'])->name('createBooking');
Route::get('/booking/view', [BookingController::class, 'showBookings'])->name('showBookings');
Route::get('/booking/view/{booking}', [BookingController::class, 'showBooking'])->name('showBooking');
Route::get('/booking/edit/{booking}', [BookingController::class, 'editBooking'])->name('editBooking');
Route::put('/booking/edit/{booking}', [BookingController::class, 'updateBooking'])->name('updateBooking');
Route::delete('/booking/delete/{booking}', [BookingController::class, 'destroyBooking'])->name('destroyBooking');

//Payment Routes
Route::post('/payment/create', [PaymentController::class, 'createPayment'])->name('createPayment');


