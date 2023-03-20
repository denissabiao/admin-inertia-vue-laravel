<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
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

Route::prefix('/tag')->middleware(['auth'])->group(function () {
    Route::get('/list', [UserController::class, 'index'])->name('tag.index');
});

require __DIR__ . '/auth.php';