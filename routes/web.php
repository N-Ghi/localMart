<?php

use App\Services\GoogleService;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\GoogleController;
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

Route::get('authUrl', [GoogleService::class, 'initiateOAuthFlow']);

//Confirm Email
Route::get('/confirm/{token}',[GoogleController::class, 'confirmEmail'])->name('confirmEmail');

// Login Route
Route::post('/login/{id}', [userController::class, 'login'])->name('login');



Route::middleware(['auth'])->group(function () {

    //Admin Routes
    Route::prefix('admin')->middleware('role:admin')->group(function () 
    {
        //Admin Routes
        Route::get('/users/create', [AdminController::class, 'createUser'])->name('createUser');
        Route::post('/users/create', [AdminController::class, 'storeUser'])->name('storeUser');
        Route::get('/users/view', [AdminController::class, 'showUsers'])->name('showUsers');
        Route::get('/users/view/{id}', [AdminController::class, 'showUser'])->name('showUser');
        Route::delete('/users/delete/{id}', [AdminController::class, 'destroyUser'])->name('destroyUser');
        Route::get('/users/edit/{user}', [AdminController::class, 'editUser'])->name('editUser');
        Route::put('/users/edit/{user}', [AdminController::class, 'updateUser'])->name('updateUser');
        Route::get('/profile/view', [ProfileController::class, 'showProfiles'])->name('showProfiles');
    });
    Route::get('/booking/view', [BookingController::class, 'showBookings'])->name('showBookings')->middleware('permission:view-booking');

    Route::get('/service/view', [ServiceController::class, 'showServices'])->name('showServices');

    Route::get('/profile/view', [ProfileController::class, 'showMyProfiles'])->name('showMyProfiles')->middleware('permission:view-profile');


    // Dashboard Routes
    Route::get('/provider/dashboard', [providerController::class, 'index'])->name('providorDashboard');
    Route::get('/traveller/dashboard', [travellerController::class, 'index'])->name('travellerDashboard');
    Route::get('/admin/dashboard', [adminController::class, 'index'])->name('adminDashboard');

    // Logout Route
    Route::get('/logout', [userController::class, 'logout'])->name('logout');


    //Profile Routes
    Route::get('/profile/view/{profile}', [ProfileController::class, 'showProfile'])->name('showProfile')->middleware('permission:view-profile');
    Route::get('/profile/create', [ProfileController::class, 'createProfile'])->name('createProfile')->middleware('permission:create-profile');
    Route::post('/profile/create', [ProfileController::class, 'storeProfile'])->name('storeProfile')->middleware('permission:create-profile');
    Route::get('/profile/edit/{profile}', [ProfileController::class, 'editProfile'])->name('editProfile')->middleware('permission:edit-profile');
    Route::put('/profile/edit/{profile}', [ProfileController::class, 'updateProfile'])->name('updateProfile')->middleware('permission:edit-profile');
    Route::delete('/profile/delete/{profile}', [ProfileController::class, 'destroyProfile'])->name('destroyProfile')->middleware('permission:delete-profile');

    //Service Routes
    Route::get('/service/view/{service}', [ServiceController::class, 'showService'])->name('showService')->middleware('permission:view-service');
    Route::get('/service/create', [ServiceController::class, 'createService'])->name('createService')->middleware('permission:create-service');
    Route::post('/service/create', [ServiceController::class, 'storeService'])->name('storeService')->middleware('permission:create-service');
    Route::get('/service/edit/{service}', [ServiceController::class, 'editService'])->name('editService')->middleware('permission:edit-service');
    Route::put('/service/edit/{service}', [ServiceController::class, 'updateService'])->name('updateService')->middleware('permission:edit-service');
    Route::delete('/service/delete/{service}', [ServiceController::class, 'destroyService'])->name('destroyService')->middleware('permission:delete-service');

    //Booking Routes
    Route::post('/booking/create', [BookingController::class, 'createBooking'])->name('createBooking')->middleware('permission:create-booking');
    Route::get('/booking/view/{booking}', [BookingController::class, 'showMyBooking'])->name('showMyBooking')->middleware('permission:view-booking');
    Route::get('/booking/edit/{booking}', [BookingController::class, 'editBooking'])->name('editBooking')->middleware('permission:view-booking');
    Route::put('/booking/edit/{booking}', [BookingController::class, 'updateBooking'])->name('updateBooking')->middleware('permission:edit-booking');
    Route::delete('/booking/delete/{booking}', [BookingController::class, 'destroyBooking'])->name('destroyBooking')->middleware('permission:delete-booking');
    Route::get('/booking/upcoming', [travellerController::class, 'futureAdventures'])->name('futureAdventures');
    Route::get('/booking/past', [travellerController::class, 'pastAdventures'])->name('pastAdventures');

    //Payment Routes
    Route::post('/payment/create', [PaymentController::class, 'createPayment'])->name('createPayment')->middleware('permission:create-payment');


});