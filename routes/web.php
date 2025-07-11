<?php


use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\ItemController;
use App\Http\Controllers\User\KycVerificationController;
use App\Http\Controllers\User\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home.index');

// Route::get('/', [HomeController::class, 'index'])->name('home.index');

Route::middleware('auth')->group(function () {

    Route::get('/dashboard', function () {
        return view('user.panel.dashboard.index');
    })->name('dashboard');

    Route::prefix('profile')->as('profile.')->group(function () {
        Route::resource('user', ProfileController::class);
    });
    Route::resource('kyc', KycVerificationController::class)->middleware('kyc');
    Route::middleware('isAuthor')->as('author.')->group(function () {
        Route::get('item/category', [ItemController::class, 'categoryStore'])->name('category.store');
        Route::resource('item', ItemController::class);
    });
});


require __DIR__ . '/auth.php';
