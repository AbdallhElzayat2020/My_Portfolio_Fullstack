<?php

use App\Http\Controllers\Dashboard\{
    HomeController,
    CategoryController,
    BlogController,
    ServiceController,
    ProjectController,
    ContactController,
    TestimonialController,
    ToolController,
    AboutController,
    NumberController,
    RoleController,
    UserController,
    BrandController,
    FaqController,
};
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {
    // Dashboard Home
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard.home');

    // Categories Routes
    Route::resource('categories', CategoryController::class)->names([
        'index' => 'categories.index',
        'create' => 'categories.create',
        'store' => 'categories.store',
        'show' => 'categories.show',
        'edit' => 'categories.edit',
        'update' => 'categories.update',
        'destroy' => 'categories.destroy',
    ]);

    // Blogs Routes
    Route::resource('blogs', BlogController::class)->names([
        'index' => 'blogs.index',
        'create' => 'blogs.create',
        'store' => 'blogs.store',
        'show' => 'blogs.show',
        'edit' => 'blogs.edit',
        'update' => 'blogs.update',
        'destroy' => 'blogs.destroy',
    ]);

    // Services Routes
    Route::resource('services', ServiceController::class)->names([
        'index' => 'services.index',
        'create' => 'services.create',
        'store' => 'services.store',
        'show' => 'services.show',
        'edit' => 'services.edit',
        'update' => 'services.update',
        'destroy' => 'services.destroy',
    ]);

    // Projects Routes
    Route::resource('projects', ProjectController::class)->names([
        'index' => 'projects.index',
        'create' => 'projects.create',
        'store' => 'projects.store',
        'show' => 'projects.show',
        'edit' => 'projects.edit',
        'update' => 'projects.update',
        'destroy' => 'projects.destroy',
    ]);

    // Contacts Routes
    Route::resource('contacts', ContactController::class)->names([
        'index' => 'contacts.index',
        'create' => 'contacts.create',
        'store' => 'contacts.store',
        'show' => 'contacts.show',
        'edit' => 'contacts.edit',
        'update' => 'contacts.update',
        'destroy' => 'contacts.destroy',
    ]);

    // Testimonials Routes
    Route::resource('testimonials', TestimonialController::class)->names([
        'index' => 'testimonials.index',
        'create' => 'testimonials.create',
        'store' => 'testimonials.store',
        'show' => 'testimonials.show',
        'edit' => 'testimonials.edit',
        'update' => 'testimonials.update',
        'destroy' => 'testimonials.destroy',
    ]);

    // Brands Routes
    Route::resource('brands', BrandController::class)->names([
        'index' => 'brands.index',
        'create' => 'brands.create',
        'store' => 'brands.store',
        'show' => 'brands.show',
        'edit' => 'brands.edit',
        'update' => 'brands.update',
        'destroy' => 'brands.destroy',
    ]);

    // Tools/Technologies Routes
    Route::resource('technologies', ToolController::class)->names([
        'index' => 'technologies.index',
        'create' => 'technologies.create',
        'store' => 'technologies.store',
        'show' => 'technologies.show',
        'edit' => 'technologies.edit',
        'update' => 'technologies.update',
        'destroy' => 'technologies.destroy',
    ]);

    // About Routes
    Route::resource('abouts', AboutController::class)->names([
        'index' => 'abouts.index',
        'create' => 'abouts.create',
        'store' => 'abouts.store',
        'show' => 'abouts.show',
        'edit' => 'abouts.edit',
        'update' => 'abouts.update',
        'destroy' => 'abouts.destroy',
    ]);

    // Numbers Routes
    Route::resource('numbers', NumberController::class)->names([
        'index' => 'main-steps.index',
        'create' => 'main-steps.create',
        'store' => 'main-steps.store',
        'show' => 'main-steps.show',
        'edit' => 'main-steps.edit',
        'update' => 'main-steps.update',
        'destroy' => 'main-steps.destroy',
    ]);

    // Additional routes for missing models (placeholder routes)
    // These routes return to dashboard home for now - you can create controllers later
    Route::get('/partners', function () {
        return redirect()->route('dashboard.home');
    })->name('partners.index');

    // FAQs Routes
    Route::resource('faqs', FaqController::class)->names([
        'index' => 'faqs.index',
        'create' => 'faqs.create',
        'store' => 'faqs.store',
        'show' => 'faqs.show',
        'edit' => 'faqs.edit',
        'update' => 'faqs.update',
        'destroy' => 'faqs.destroy',
    ]);

    Route::get('/industrials', function () {
        return redirect()->route('dashboard.home');
    })->name('industrials.index');

    Route::get('/get-quotes', function () {
        return redirect()->route('dashboard.home');
    })->name('get-quotes.index');

    // Profile Routes
    Route::prefix('profile')->name('dashboard.profile.')->group(function () {
        Route::get('/', [ProfileController::class, 'edit'])->name('edit');
        Route::patch('/', [ProfileController::class, 'update'])->name('update');
    });

    // Password Update Route
    Route::put('/password', [\App\Http\Controllers\Auth\PasswordController::class, 'update'])->name('dashboard.password.update');

    // Roles Routes
    Route::resource('roles', RoleController::class)->names([
        'index' => 'roles.index',
        'create' => 'roles.create',
        'store' => 'roles.store',
        'show' => 'roles.show',
        'edit' => 'roles.edit',
        'update' => 'roles.update',
        'destroy' => 'roles.destroy',
    ]);

    // Users Routes
    Route::resource('users', UserController::class)->names([
        'index' => 'users.index',
        'create' => 'users.create',
        'store' => 'users.store',
        'show' => 'users.show',
        'edit' => 'users.edit',
        'update' => 'users.update',
        'destroy' => 'users.destroy',
    ]);
});

require __DIR__ . '/auth.php';
