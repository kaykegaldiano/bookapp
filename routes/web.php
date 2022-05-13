<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Models\Book;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    $books = Book::paginate(5);

    if (Auth::check()) {
        return view('book.index', compact('books'));
    }

    return view('auth.login');
});

// books
Route::get('/books', [BookController::class, 'index'])->name('book.index')->middleware('auth');
Route::get('/books/create', [BookController::class, 'create'])->name('book.create')->middleware('auth');
Route::post('/books/store', [BookController::class, 'store'])->name('book.store');
Route::get('/books/{id}/edit', [BookController::class, 'edit'])->name('book.edit')->middleware('auth');
Route::match(['put', 'patch'], '/books/{id}', [BookController::class, 'update'])->name('book.update');
Route::delete('/books/{id}', [BookController::class, 'destroy'])->name('book.destroy');

// login, register, authentication
Route::get('/login', [AuthController::class, 'loginPage'])->name('auth.login');
Route::post('/login', [AuthController::class, 'login'])->name('auth.authenticate');

Route::get('/register', [AuthController::class, 'registerPage'])->name('auth.register');
Route::post('/register', [AuthController::class, 'register'])->name('auth.store');

Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');
