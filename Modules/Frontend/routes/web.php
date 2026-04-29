<?php

use Illuminate\Support\Facades\Route;
use Modules\Frontend\Http\Controllers\HomeController;
use Modules\Frontend\Http\Controllers\newsController;
use Modules\Frontend\Http\Controllers\pagesController;
use Modules\Frontend\Http\Controllers\serviceController;

// Construz native routes (TEL QUEL - noms identiques au theme original pour que les vues fonctionnent sans modif)
Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/home1-op', 'home1Op')->name('home1Op');
    Route::get('/home2-op', 'home2Op')->name('home2Op');
    Route::get('/home3-op', 'home3Op')->name('home3Op');
    Route::get('/home4-op', 'home4Op')->name('home4Op');
    Route::get('/home5-op', 'home5Op')->name('home5Op');
    Route::get('/home2', 'home2')->name('home2');
    Route::get('/home3', 'home3')->name('home3');
    Route::get('/home4', 'home4')->name('home4');
    Route::get('/home5', 'home5')->name('home5');
    Route::get('/about', 'about')->name('about');
    Route::get('/contact', 'contact')->name('contact');
});

Route::controller(newsController::class)->group(function () {
    Route::get('/blog', 'blog')->name('blog');
    Route::get('/blog-details', 'blogDetails')->name('blogDetails');
});

Route::controller(pagesController::class)->group(function () {
    Route::get('/cart', 'cart')->name('cart');
    Route::get('/checkout', 'checkout')->name('checkout');
    Route::get('/project', 'project')->name('project');
    Route::get('/project-details', 'projectDetails')->name('projectDetails');
    Route::get('/shop', 'shop')->name('shop');
    Route::get('/shop-details', 'shopDetails')->name('shopDetails');
    Route::get('/team', 'team')->name('team');
    Route::get('/team-details', 'teamDetails')->name('teamDetails');
    Route::get('/wishlist', 'wishlist')->name('wishlist');
});

Route::controller(serviceController::class)->group(function () {
    Route::get('/service', 'service')->name('service');
    Route::get('/service-details', 'serviceDetails')->name('serviceDetails');
});
