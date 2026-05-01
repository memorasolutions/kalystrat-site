<?php

use Illuminate\Support\Facades\Route;
use Modules\Frontend\Http\Controllers\HomeController;
use Modules\Frontend\Http\Controllers\newsController;
use Modules\Frontend\Http\Controllers\pagesController;
use Modules\Frontend\Http\Controllers\serviceController;

// P22-S20f Cleanup status (2026-04-29) : routes legacy Construz conservées car références
// résiduelles dans home/home[2-5]*.blade.php, elements/header2.blade.php, elements/mobileMenu.blade.php.
// Ces vues ne sont pas affichées en production (ks-header unifié + index.blade.php uniquement) mais
// php génère les liens via route(...) au rendu, donc supprimer les routes ferait planter ces vues.
// Suppression complète possible APRÈS refactor des vues legacy (tâche #86 différée à #79 PASS 2 footer/menu cleanup).
//
// Routes ACTIVES utilisées par le site Kalystrat : / (index), /a-propos, /service, /project, /contact, /faq, /carrieres, /filiales/{slug}.
// Routes INACTIVES (alias compat) : /home[1-5]-op, /home[2-5], /about, /shop*, /cart, /checkout, /wishlist, /team*, /service-details, /project-details, /blog*.

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

Route::post('/contact', [\Modules\Frontend\Http\Controllers\ContactController::class, 'store'])
    ->name('contact.store')
    ->middleware('throttle:5,1');

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

// P22-S20e Note : routes /robots.txt et /sitemap.xml gérées par Module SEO (priorité supérieure).
