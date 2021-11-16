<?php

    use App\Http\Controllers\Auth\FacebookController;
    use App\Http\Controllers\Auth\LoginController;
    use App\Http\Controllers\Controller;
    use App\Http\Controllers\HomeController;
    use Spatie\Honeypot\ProtectAgainstSpam;

    Route::get('/', [HomeController::class, 'index'])->name('indexFront');
    Route::get('contact', [HomeController::class, 'contact'])->name('contact');
    Route::post('contact', [HomeController::class, 'contactPost'])->name('contactPost')->middleware(ProtectAgainstSpam::class);
    Route::get('about_us', [HomeController::class, 'aboutUs'])->name('about_us');

    Route::feeds();
    Route::get('sitemap', [Controller::class, 'sitemap']);
//Admin Routes
    Auth::routes();
    Route::get('/logout', [LoginController::class, 'logout']);
    Route::get('auth/facebook', [FacebookController::class, 'redirectToFacebook']);
    Route::get('auth/facebook/callback', [FacebookController::class, 'handleFacebookCallback']);