<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Admin\ProfileController as AdminProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\BillController;
use App\Models\User;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [ProductController::class, 'index'])->name('top');
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');

/* Route::get('/cart', [CartController::class, 'show'])->name('carts.show'); */
/* Route::post('/carts/store', [CartController::class, 'store'])->name('carts.store'); */
/* Route::post('/carts/update', [CartController::class, 'update'])->name('carts.update'); */
/* Route::post('/carts/delete', [CartController::class, 'delete'])->name('carts.delete'); */
/* Route::post('/carts/destroy', [CartController::class, 'destroy'])->name('carts.destroy'); */

Route::group(['prefix' => 'cart', 'as' => 'carts.'], function() {
    Route::middleware('auth')->group(function () {
        Route::get('/', [CartController::class, 'show'])->name('show');
        Route::post('/store', [CartController::class, 'store'])->name('store');
        Route::post('/update', [CartController::class, 'update'])->name('update');
        Route::post('/delete', [CartController::class, 'delete'])->name('delete');
        Route::post('/destroy', [CartController::class, 'destroy'])->name('destroy');
    });
});

Route::group(['prefix' => 'contact', 'as' => 'contacts.'], function() {
    Route::get('/', [ContactController::class, 'create'])->name('create');
    Route::post('/store', [ContactController::class, 'store'])->name('store');
    Route::get('/thanks', function () {
        return view('contacts.thanks');
    })->name('thanks');
});

Route::group(['prefix' => 'bills', 'as' => 'bills.'], function() {
    Route::middleware('auth')->group(function () {
        Route::get('/', [BillController::class, 'index'])->name('index');
        Route::get('/{bill}', [BillController::class, 'show'])->name('show');
    });
});

Route::prefix('payment')->name('payment.')->group(function () {
    Route::middleware('auth')->group(function () {
        Route::get('/', [PaymentController::class, 'checkout'])
            ->name('checkout');
        Route::post('/pay', [PaymentController::class, 'pay'])
            ->name('pay');
        Route::get('/create', [PaymentController::class, 'create'])
            ->name('create');
        Route::post('/store', [PaymentController::class, 'store'])
            ->name('store');
        Route::get('/success', [PaymentController::class, 'success'])
            ->name('success');
        Route::get('thanks', function () {
            return view('payment.thanks');
        })->name('thanks');
    });
});

Route::get('/billing-portal', function (\Illuminate\Http\Request $request) {
    return $request->user()->redirectToBillingPortal();
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/welcome', function () {
    return view('welcome');
});

// admin
Route::group(['prefix' => 'admin', 'as' => 'admin.'], function() {
    require __DIR__.'/admin.php';

    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->middleware(['auth:admin', 'verified'])->name('dashboard');

    Route::middleware('auth:admin')->group(function () {
        Route::get('/profile', [AdminProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [AdminProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [AdminProfileController::class, 'destroy'])->name('profile.destroy');

        Route::get('/products', [ProductController::class, 'index'])
            ->name('products.index');
        Route::get('/products/create', [ProductController::class, 'create'])
            ->name('products.create');
        Route::post('products/store', [ProductController::class, 'store'])
            ->name('products.store');
        Route::get('/products/{product}', [ProductController::class, 'show'])
            ->name('products.show');
        Route::get('/products/edit/{product}', [ProductController::class, 'edit'])
            ->name('products.edit');
        Route::post('/products/update/{product}', [ProductController::class, 'update'])
            ->name('products.update');
        Route::post('/products/destroy/{product}', [ProductController::class, 'destroy'])
            ->name('products.destroy');

        Route::get('/users', [UserController::class, 'index'])
            ->name('users.index');
        Route::get('/users/create', [UserController::class, 'create'])
            ->name('users.create');
        Route::post('users/store', [UserController::class, 'store'])
            ->name('users.store');
        Route::get('/users/{user}', [UserController::class, 'show'])
            ->name('users.show');
        Route::post('/users/update/{user}', [UserController::class, 'update'])
            ->name('users.update');
        Route::get('/users/edit/{user}', [UserController::class, 'edit'])
            ->name('users.edit');
        Route::post('/users/destroy/{user}', [UserController::class, 'destroy'])
            ->name('users.destroy');

        Route::get('/bills', [BillController::class, 'index'])
            ->name('bills.index');
        Route::get('/bills/{bill}', [BillController::class, 'show'])
            ->name('bills.show');

        Route::get('/contact', [ContactController::class, 'index'])
            ->name('contacts.index');
        Route::get('/contacts/{contact}', [ContactController::class, 'show'])
            ->name('contacts.show');
    });
});

// test
Route::get('test', [TestController::class, 'test']);
Route::get('test-database', [TestController::class, 'database']);
