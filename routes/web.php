<?php

use App\Http\Controllers\CollectionController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VariantController;
use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/tail', function () {
    return Inertia::render('helloTail', [
        'hello' => 'Hello World!'
    ]);
});

Route::get('/user/create', function () {
    return User::factory(5)->create();
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::prefix('/user')->middleware(['auth'])->group(function () {
    Route::get('/list', [UserController::class, 'index'])->name('user.index');
    Route::get('/cadastrar', [UserController::class, 'create'])->name('user.create');
    Route::post('/cadastrar', [UserController::class, 'store'])->name('user.store');
    Route::get('/editar/{id}', [UserController::class, 'show'])->name('user.edit');
    Route::post('/editar', [UserController::class, 'update'])->name('user.update');
    Route::get('/deletar/{id}', [UserController::class, 'destroy'])->name('user.delete');
});

Route::prefix('/product')->middleware(['auth'])->group(function () {
    Route::get('/list', [ProductController::class, 'index'])->name('product.index');
    Route::get('/cadastrar', [ProductController::class, 'create'])->name('product.create');
    Route::post('/cadastrar', [ProductController::class, 'store'])->name('product.store');
    Route::get('/editar/{id}', [ProductController::class, 'show'])->name('product.edit');
    Route::post('/editar', [ProductController::class, 'update'])->name('product.update');
    Route::get('/deletar/{id}', [ProductController::class, 'destroy'])->name('product.delete');
    Route::get('/create', function () {
       return Product::factory(5)->create();
    });
});

Route::prefix('/image')->middleware(['auth'])->group(function () {
    Route::get('/list', [ImageController::class, 'index'])->name('image.index');
    Route::get('/cadastrar', [ImageController::class, 'create'])->name('image.create');
    Route::post('/cadastrar', [ImageController::class, 'store'])->name('image.store');
    Route::get('/editar/{id}', [ImageController::class, 'show'])->name('image.edit');
    Route::post('/editar', [ImageController::class, 'update'])->name('image.update');
    Route::get('/deletar/{id}', [ImageController::class, 'destroy'])->name('image.delete');

});


Route::prefix('/variant')->middleware(['auth'])->group(function () {
    Route::get('/list', [VariantController::class, 'index'])->name('variant.index');
    Route::get('/cadastrar', [VariantController::class, 'create'])->name('variant.create');
    Route::post('/cadastrar', [VariantController::class, 'store'])->name('variant.store');
    Route::get('/editar/{id}', [VariantController::class, 'show'])->name('variant.edit');
    Route::post('/editar', [VariantController::class, 'update'])->name('variant.update');
    Route::get('/deletar/{id}', [VariantController::class, 'destroy'])->name('variant.delete');

});

Route::prefix('/collection')->middleware(['auth'])->group(function () {
    Route::get('/list', [CollectionController::class, 'index'])->name('collection.index');
    Route::get('/cadastrar', [CollectionController::class, 'create'])->name('collection.create');
    Route::post('/cadastrar', [CollectionController::class, 'store'])->name('collection.store');
    Route::get('/editar/{id}', [CollectionController::class, 'show'])->name('collection.edit');
    Route::post('/editar', [CollectionController::class, 'update'])->name('collection.update');
    Route::get('/deletar/{id}', [CollectionController::class, 'destroy'])->name('collection.delete');

});

Route::prefix('/tag')->middleware(['auth'])->group(function () {
    Route::get('/list', [UserController::class, 'index'])->name('tag.index');
});

require __DIR__ . '/auth.php';