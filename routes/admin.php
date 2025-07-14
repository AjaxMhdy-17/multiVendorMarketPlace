<?php

use App\Http\Controllers\Admin\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Admin\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Admin\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Admin\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Admin\Auth\NewPasswordController;
use App\Http\Controllers\Admin\Auth\PasswordController;
use App\Http\Controllers\Admin\Auth\PasswordResetLinkController;
use App\Http\Controllers\Admin\Auth\RegisteredUserController;
use App\Http\Controllers\Admin\Auth\VerifyEmailController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\KycSettingController;
use App\Http\Controllers\Admin\KycSubmissionController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\RolePermissionController;
use App\Http\Controllers\Admin\RoleUserController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\SubCategoryController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest:admin')->prefix('admin')->as('admin.')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])
        ->name('register');
    Route::post('register', [RegisteredUserController::class, 'store']);
    Route::get('login', [AuthenticatedSessionController::class, 'create'])
        ->name('login');
    Route::post('login', [AuthenticatedSessionController::class, 'store']);
    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
        ->name('password.request');
    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
        ->name('password.email');
    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
        ->name('password.reset');
    Route::post('reset-password', [NewPasswordController::class, 'store'])
        ->name('password.store');
});

Route::middleware('auth:admin')->prefix('admin')->as('admin.')->group(function () {
    Route::get('verify-email', EmailVerificationPromptController::class)
        ->name('verification.notice');
    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
        ->middleware(['signed', 'throttle:6,1'])
        ->name('verification.verify');
    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
        ->middleware('throttle:6,1')
        ->name('verification.send');
    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
        ->name('password.confirm');
    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);
    Route::put('password', [PasswordController::class, 'update'])->name('password.update');
    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');

        
    Route::get('/dashboard', function () {
        $data['title'] = "dashboard";
        return view('admin.dashboard.index', $data);
    })->name('dashboard');


    Route::resource('profile', ProfileController::class);
    
    Route::middleware('superAdmin')->prefix('roles')->as('roles.')->group(function () {
        Route::resource('permissions', RolePermissionController::class);
        Route::resource('user', RoleUserController::class);
    });
    Route::prefix('kyc')->as('kyc.')->group(function () {
        Route::get('setting', [KycSettingController::class, 'index'])->name('setting.index');
        Route::put('setting', [KycSettingController::class, 'store'])->name('setting.store');
        Route::post('submission/bulk-delete', [KycSubmissionController::class, 'bulkDelete'])->name('submission.bulk-delete');
        Route::resource('submission', KycSubmissionController::class);
    });
    Route::prefix('category')->as('category.')->group(function () {
        Route::resource('all', CategoryController::class);
        Route::resource('sub', SubCategoryController::class);
    });
    Route::resource('setting', SettingController::class);
});
