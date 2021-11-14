<?php

		use App\Http\Controllers\Auth\FacebookController;
		use App\Http\Controllers\Auth\LoginController;
		use App\Http\Controllers\Controller;
		use App\Http\Controllers\HomeController;

		Route ::get('/', [HomeController::class, 'index']) -> name('indexFront');
		Route ::feeds();
		Route ::get('sitemap', [Controller::class, 'sitemap']);
//Admin Routes
		Auth ::routes();
		Route ::get('/logout', [LoginController::class, 'logout']);
		Route ::get('auth/facebook', [FacebookController::class, 'redirectToFacebook']);
		Route ::get('auth/facebook/callback', [FacebookController::class, 'handleFacebookCallback']);