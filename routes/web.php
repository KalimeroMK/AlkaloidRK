<?php

    use Illuminate\Support\Facades\Route;
    use Modules\Home\Http\Controllers\HomeController;
    use Modules\User\Http\Controllers\Auth\ForgotPasswordController;
    use Modules\User\Http\Controllers\Auth\LoginController;
    use Modules\User\Http\Controllers\Auth\ResetPasswordController;
    use Spatie\Honeypot\ProtectAgainstSpam;

    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    //Forgot Password Routes
    Route::get('/password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
    Route::post('/password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
    //Reset Password Routes
    Route::get('/password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
    Route::post('/password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');
    Route::get('/', [HomeController::class, 'index'])->name('indexFront');
    Route::get('results', [HomeController::class, 'results'])->name('results');
    Route::get('contact', [HomeController::class, 'contact'])->name('contact');
    Route::post('contact', [HomeController::class, 'contactPost'])->name('contactPost')->middleware(ProtectAgainstSpam::class);
    Route::get('about_us', [HomeController::class, 'aboutUs'])->name('about_us');
    Route::get('category/{slug}', [HomeController::class, 'productCat'])->name('categories');
    Route::get('details/{slug}', [HomeController::class, 'postDetails'])->name('postDetails');
    Route::get('galleries/{slug}', [HomeController::class, 'gallery'])->name('galleries');
    Route::get('galleries/details/{slug}', [HomeController::class, 'galleriesDetails'])->name('galleriesDetails');
    Route::get('kl7/{slug}', [HomeController::class, 'kl7'])->name('kl7');
    Route::get('player/{slug}', [HomeController::class, 'playerDetails'])->name('player');
    Route::get('feed', [HomeController::class, '__invoke'])->name("feeds.main");