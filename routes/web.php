<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FAQController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\TeamMemberController;
use App\Http\Controllers\AboutPageController;
use App\Http\Controllers\PricingController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\LogoController;

// Default Route
Route::get('/', function () {
    return view('welcome');
});

// Authentication Routes
Auth::routes();

// Home Route
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Middleware to protect routes
Route::group(['middleware' => 'auth'], function () {
    Route::resource('blogs', BlogController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('tags', TagController::class);

    Route::resource('faqs', FAQController::class);
    Route::resource('services', ServiceController::class);
    Route::resource('team', TeamMemberController::class);
    Route::resource('company', CompanyController::class);

    Route::get('/about', [AboutPageController::class, 'show'])->name('about.show');
    Route::get('/about/edit', [AboutPageController::class, 'edit'])->name('about.edit');
    Route::post('/about/update', [AboutPageController::class, 'update'])->name('about.update');

    Route::get('/pricing', [PricingController::class, 'index'])->name('pricing.index');
    Route::get('/pricing/create', [PricingController::class, 'create'])->name('pricing.create');
    Route::post('/pricing', [PricingController::class, 'store'])->name('pricing.store');
    Route::get('/pricing/{id}/edit', [PricingController::class, 'edit'])->name('pricing.edit');
    Route::put('/pricing/{id}', [PricingController::class, 'update'])->name('pricing.update');

    Route::get('/logo', [LogoController::class, 'show'])->name('logo.show');
    Route::get('/logo/edit', [LogoController::class, 'edit'])->name('logo.edit');
    Route::put('/logo', [LogoController::class, 'update'])->name('logo.update');
    Route::get('/contact/messages', [ContactController::class, 'index'])->name('contact.index');
    Route::post('/contact/messages/{id}/reply', [ContactController::class, 'reply'])->name('contact.reply');
    // Admin route to view contact messages
    Route::get('/admin/contact-messages', [ContactController::class, 'index'])->name('contact.index');
});

// Contact Routes (No Authentication Required)
Route::get('/contact', [ContactController::class, 'showForm'])->name('contact.form');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

//

use App\Http\Controllers\CommentController;

Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');
Route::post('/comments/{id}/reply', [CommentController::class, 'reply'])->name('comments.reply');
