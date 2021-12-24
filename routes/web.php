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
    Route::get('categories/{slug}', [HomeController::class, 'productCat'])->name('categories');
    Route::get('details/{slug}', [HomeController::class, 'postDetails'])->name('postDetails');
    Route::get('results', [HomeController::class, 'results'])->name('results');
    Route::get('galleries/{slug}', [HomeController::class, 'gallery'])->name('galleries');
    Route::get('galleries/details/{slug}', [HomeController::class, 'galleriesDetails'])->name('galleriesDetails');
    Route::get('kl7/{slug}', [HomeController::class, 'kl7'])->name('kl7');
    Route::get('player/{slug}', [HomeController::class, 'playerDetails'])->name('player');
    Route::feeds();
    Route::get('sitemap', [Controller::class, 'sitemap']);
//Admin Routes
    Auth::routes();
    Route::get('/logout', [LoginController::class, 'logout']);
    Route::get('auth/facebook', [FacebookController::class, 'redirectToFacebook']);
    Route::get('auth/facebook/callback', [FacebookController::class, 'handleFacebookCallback']);

    Route::get(
        '{locale}',
        static function ($locale) {
            Session::put('locale', $locale);

            return redirect()->back();
        }
    );
