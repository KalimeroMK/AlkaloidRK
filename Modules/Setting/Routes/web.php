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
    use Modules\Setting\Http\Controllers\SettingController;

    Route::prefix('admin')->group(function () {
        Route::resource('settings', SettingController::class)->middleware('auth');
    });