<?php

    use App\Http\Controllers\Admin\CategoryController;
    use App\Http\Controllers\Admin\DashboardController;
    use App\Http\Controllers\Admin\GalleryController;
    use App\Http\Controllers\Admin\LanguageController;
    use App\Http\Controllers\Admin\PostController;
    use App\Http\Controllers\Admin\RoleController;
    use App\Http\Controllers\Admin\SettingController;
    use App\Http\Controllers\Admin\SliderController;
    use App\Http\Controllers\Admin\TagController;
    use App\Http\Controllers\Admin\UserController;
    use App\Http\Controllers\Admin\YoutubeController;

    Route::resource('categories', CategoryController::class);
    Route::resource('posts', PostController::class);
    Route::resource('languages', LanguageController::class);
    Route::resource('tags', TagController::class);
    Route::resource('roles', RoleController::class);
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('users', UserController::class);
    Route::resource('settings', SettingController::class);
    Route::get('gallery/{id}/post', [GalleryController::class, 'index'])->name('addGallery');
    Route::resource('gallery', GalleryController::class);
    Route::resource('sliders', SliderController::class);
    Route::resource('youtube', YoutubeController ::class);
