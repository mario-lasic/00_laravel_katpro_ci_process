<?php

    use App\Http\Controllers\Admin\UserController;
    use App\Http\Controllers\CategoryController;
    use App\Http\Controllers\CountryController;
    use App\Http\Controllers\DummyProductController;
    use App\Http\Controllers\ProductController;
    use App\Http\Controllers\ProfileController;
    use Illuminate\Support\Facades\Route;

    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware(['auth', 'verified'])->name('dashboard');

    Route::get('/admin', function () {
        Gate::authorize('admin-access');
        return view('admin.dashboard');
    })->middleware(['auth'])->name('admin.dashboard');

    Route::get('/admin/users', [UserController::class, 'index'])->middleware('auth')->name('admin.users.index');
    Route::get('/admin/users-paginated', [UserController::class, 'indexPaginated'])->middleware('auth')->name(
        'admin.users.index-paginated'
    );
    Route::get('/admin/users/{user}/edit', [UserController::class, 'edit'])->middleware('auth')->name(
        'admin.users.edit'
    );
    Route::put('/admin/users/{user}', [UserController::class, 'update'])->middleware('auth')->name(
        'admin.users.update'
    );
    Route::get('/admin/users/{user}/delete', [UserController::class, 'deletePreview'])->middleware('auth')->name(
        'admin.users.deletePreview'
    );
    Route::delete('/admin/users/{user}', [UserController::class, 'destroy'])->middleware('auth')->name(
        'admin.users.destroy'
    );

    //<!-- KATEGORIJE -->
    Route::resource('categories', CategoryController::class)->middleware('auth');
    Route::get('/categoriesDb', [CategoryController::class, 'indexDb'])->name('categories.db');

    //<!-- PRODUCTS -->
    Route::resource('products', ProductController::class)->middleware('auth');
    Route::get('/products-search', [ProductController::class, 'search'])->name('products.search');
    Route::get('/productsDb', [ProductController::class, 'indexDb'])->name('products.db');

    Route::get('/dummy-products', [DummyProductController::class, 'index'])->name('dummy.products');
    Route::post('/dummy-products', [DummyProductController::class, 'store'])->name('dummy.products.store');

    Route::get('/countries-product', [CountryController::class, 'index'])->name('countries.product');

    Route::middleware('auth')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });

    require __DIR__ . '/auth.php';
