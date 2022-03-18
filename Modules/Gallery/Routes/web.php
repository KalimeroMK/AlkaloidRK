<?php

    /*
    |--------------------------------------------------------------------------
    | Web Routes
    |--------------------------------------------------------------------------
    |
    | Here is where you can register web routes for your application. These
    | routes are loaded by the RouteServiceProvider within a group which
    | contains the "web" middleware group. Now create something great!
    |
    */

    use Illuminate\Support\Facades\Route;
    use Modules\Gallery\Http\Controllers\GalleryController;

    Route::prefix('admin')->group(function () {
        Route::get('gallery/{id}/post', [GalleryController::class, 'index'])->name('addGallery')->middleware('auth');
    });
