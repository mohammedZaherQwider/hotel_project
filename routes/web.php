<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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
Route::resource('kofta',n::class);
Route::get('/page',[AdminController::class,'page'])->name('admin.page');
Route::get('/book', [AdminController::class, 'book'])->name('book');
Route::post('/book', [AdminController::class, 'book_data'])->name('book_data');
Route::group(['prefix' => LaravelLocalization::setLocale()], function () {

Route::get('/dashboard', function () {
    // return view('dashboard');
    if(auth()->guard('web')->check()) {
        return view('user.userIndex');
    }elseif( auth()->guard('admin')->check() ) {
        return view('admin.adminIndex');
    }
})->middleware(['auth:web,admin', 'verified'])->name('dashboard');
});
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
