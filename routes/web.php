<?php


use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home.index');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::get('admin/dashboard', function () {
//     $data['title'] = "dashboard";
//     return view('admin.dashboard.index', $data);
// })->middleware(['auth:admin', 'verified'])->name('admin.dashboard');


Route::middleware('auth')->group(function () {


    Route::get('/dashboard', function () {
        return view('user.panel.dashboard.index');
    })->name('dashboard');

    Route::prefix('profile')->as('profile.')->group(function () {
        Route::resource('user', ProfileController::class);
    });
});



// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__ . '/auth.php';
