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
    use Modules\Score\Http\Controllers\ScoreController;

    Route::prefix('admin')->group(function () {
        Route::resource('scores', ScoreController::class)->middleware('auth');
    });