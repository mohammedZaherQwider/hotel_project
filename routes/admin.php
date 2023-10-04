<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\Admin\CountryController;
use App\Http\Controllers\Admin\HotelController;
use App\Http\Controllers\Admin\ImageController;
use App\Http\Controllers\Admin\ReservationController;
use App\Http\Controllers\Admin\Room_typeController;
use App\Http\Controllers\Admin\RoomController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::group(['prefix' => LaravelLocalization::setLocale()], function () {
    // Route::prefix('admin')->name('admin.')->middleware('auth:admin')->group(function() {
    Route::prefix('admin')->name('admin.')->middleware('auth:admin')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

        Route::resource('countries', CountryController::class);
        //Route::get('countries_pdf',[CountryController::class,'pdf'])->name('country_pdf');
        Route::resource('cities', CityController::class);
       // Route::get('cities_pdf',[CityController::class,'pdf'])->name('city_pdf');
        Route::resource('hotels', HotelController::class);
       // Route::get('hotels_pdf',[HotelController::class,'pdf'])->name('hotel_pdf');
        Route::resource('room_type', Room_typeController::class);
      //  Route::get('room_types_pdf',[Room_typeController::class,'pdf'])->name('room_type_pdf');
        Route::resource('rooms', RoomController::class);
       // Route::get('rooms_pdf',[RoomController::class,'pdf'])->name('room_pdf');
        Route::resource('reservations', ReservationController::class);
      //  Route::get('reservations_pdf',[ReservationController::class,'pdf'])->name('reservation_pdf');

        Route::get('/profile', [AdminController::class, 'profile'])->name('profile');
        Route::post('/profile', [AdminController::class, 'profile_update'])->name('profile');


        Route::post('/image', [ImageController::class, 'profile_image'])->name('profile_image');
        Route::post('/images', [ImageController::class, 'profile_images'])->name('profile_images');
        Route::get('/read/{id}', [AdminController::class, 'read'])->name('read');
    });
});
