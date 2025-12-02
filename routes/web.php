<?php

use App\Http\Controllers\ProfileController;

use App\Http\Controllers\Website\{
    HomeController,
    AboutController,
    ServiceController,
    PortfolioController,
    BlogController,
    ContactController,
};

use Illuminate\Support\Facades\Route;


Route::name('website.')->group(function () {

    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/about', [AboutController::class, 'index'])->name('about');
    Route::get('/services', [ServiceController::class, 'index'])->name('services');
    Route::get('/portfolio', [PortfolioController::class, 'index'])->name('portfolio');
    // Route::get('/portfolio-details/{slug}', [PortfolioController::class, 'showDetails'])->name('portfolio-details');
    Route::get('/portfolio-details', [PortfolioController::class, 'showDetails'])->name('portfolio-details');
    Route::get('/blog', [BlogController::class, 'index'])->name('blog');
    // Route::get('/blog-details/{slug}', [BlogController::class, 'showDetails'])->name('blog-details');
    Route::get('/blog-details', [BlogController::class, 'showDetails'])->name('blog-details');
    Route::get('/contact', [ContactController::class, 'index'])->name('contact');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
require __DIR__ . '/dashboard.php';
