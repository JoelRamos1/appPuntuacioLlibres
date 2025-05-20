<?php

// Controllers
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminBookController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\AdminCategoryController;

use App\Http\Controllers\BooksController;

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\IsAdmin;
use Illuminate\Http\Request;

// Models
use App\Models\Book;

// Ruta raiz
Route::get('/', function () {
    return view('home');
});

// Rutas de auth
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Ruta de los libros
Route::get('/books', [BooksController::class, 'index'])
        ->middleware(['auth', 'verified'])
        ->name('books.index');

Route::get('/books/show/{id}', [BooksController::class, 'show'])
        ->middleware(['auth', 'verified'])
        ->name('books.show');

// Ruta de las valoraciones
Route::get('/books/create/valuation/{id}', [BooksController::class, 'create'])
    ->middleware(['auth', 'verified'])
    ->name('create.valuation');

Route::post('/books/valuate/{id}', [Bookscontroller::class, 'store'])->middleware(['auth', 'verified'])->name('valuate');

Route::get('/books/edit/valuation/{id}', [BooksController::class, 'edit'])
    ->middleware(['auth', 'verified']);

Route::post('/books/update/valuation/{id}', [BooksController::class, 'update'])
    ->middleware(['auth', 'verified']);

// Rutas de admin
Route::get('/admin', function () {
    return view('admin.dashboard');
})->middleware(IsAdmin::class)->name('admin.dashboard');

Route::middleware(['auth', IsAdmin::class])->prefix('admin')->name('admin.')->group(function () {
    // Usuarios
    Route::resource('users', AdminUserController::class);
    // Route::get('users/show/{id}', [AdminUserController::class, 'show']);
    // Route::get('users/edit/{id}', [AdminUserController::class, 'edit']);
    // Route::post('users/update/{id}', [AdminUserController::class, 'update']);
    // Route::post('users/delete/{id}', [AdminUserController::class, 'destroy']);

    // Libros
    Route::resource('books', AdminBookController::class);
    // Route::get('books/show/{id}', [AdminBookController::class, 'show']);
    // Route::get('books/edit/{id}', [AdminBookController::class, 'edit']);
    // Route::post('books/updating/{id}', [AdminBookController::class, 'update']);
    // Route::post('books/delete/{id}', [AdminBookController::class, 'destroy']);

    // Categorias
    Route::resource('categories', AdminCategoryController::class);
    // Route::get('categories/show/{id}', [AdminCategoryController::class, 'show']);
    // Route::get('categories/edit/{id}', [AdminCategoryController::class, 'edit']);
});

// Dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';
