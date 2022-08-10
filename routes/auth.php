<?php

use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\SessionController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\PostCommentController;
use App\Http\Controllers\PostController;
use App\Models\post;
use Illuminate\Support\Facades\Route;
Route::middleware('guest')->group(function () {
    Route::get('register', [RegisterController::class, 'create'])
                ->name('register');
               
    Route::post('register', [RegisterController::class, 'store']);

    Route::get('login', [SessionController::class, 'create'])
                ->name('login');

    Route::post('login', [SessionController::class, 'store']); 

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
                ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
                ->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
                ->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
                ->name('password.update');
});

Route::middleware('auth')->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    //Admin
    Route::get('dashboard/admin', function() {
        return view('adminPanel');
    })->middleware('MustBeAdmin');
    Route::get('/dashboard/post/{post}/active', [PostController::class, 'active'])->middleware('MustBeAdmin');
    Route::get('/dashboard/post/{post}/inactive', [PostController::class, 'inactive'])->middleware('MustBeAdmin');

    Route::get('verify-email', [EmailVerificationPromptController::class, '__invoke'])
                ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', [VerifyEmailController::class, '__invoke'])
                ->middleware(['signed', 'throttle:6,1'])
                ->name('verification.verify');

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
                ->middleware('throttle:6,1')
                ->name('verification.send');

    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
                ->name('password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::post('logout', [SessionController::class, 'destroy'])
                ->name('logout');
    Route::post('/posts/{post:slug}/comments', [PostCommentController::class, 'store']);
    Route::get('/post/create', [PostController::class, 'create'])->name('newPost');
    Route::post('/post/store', [PostController::class, 'store']);
    Route::get('/dashboard/post/{post}/delete', [PostController::class, 'delete']);
    Route::get('/dashboard/post/{post}/edit', [PostController::class, 'edit']);
    Route::patch('/dashboard/post/{post}', [PostController::class, 'update']);
});
