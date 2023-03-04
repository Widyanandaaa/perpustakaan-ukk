<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
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
    return view('welcome');
});

Route::controller(LoginController::class)->group(function (){
    Route::get('/login', 'showLoginForm')->name('login');
    Route::post('/login', 'loginProcess')->name('login');
});

Route::controller(HomeController::class)->group(function () {
    Route::get('/home', 'index')->name('home.index');
    Route::get('/pustakawan', 'librarianHome')->name('librarian.index');
    Route::get('/list-genre-{name}', 'genreList')->name('genre-list');
    Route::get('/list-kategori-{category}', 'categoryList')->name('category-list');
});

Route::controller(BookController::class)->group(function () {
    Route::get('/pustakawan/buku', 'index')->name('book.index');
    Route::get('/buku-{book_code}', 'show')->name('book.show');
    Route::get('/pustakawan/buku/tambah-buku', 'create')->name('book.create');
    Route::post('/pustakawan/buku/tambah-buku', 'store')->name('book.store');
    Route::get('/pustakawan/buku/{book_code}/edit', 'edit')->name('book.edit');
    Route::patch('/pustakawan/buku/{book_code}/edit', 'update')->name('book.update');
    Route::delete('/pustakawan/hapus/{id}','destroy')->name('book.destroy');
});
