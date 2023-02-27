<?php

use App\Http\Controllers\BookController;
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

Route::middleware(['auth'])->group(function () {
    Route::get('/home', function () {
        return view('Member.home');
    });
    Route::get('/pustakawan', function() {
        return view('Librarian.home');
    });

    Route::controller(BookController::class)->group(function () {
        Route::get('/pustakawan/buku', 'index')->name('book.index');
        Route::get('daftar-buku/buku-{book_code}', 'show')->name('book.show');
        Route::get('/pustakawan/buku/tambah-buku', 'create')->name('book.create');
        Route::post('/pustakawan/buku/tambah-buku', 'store')->name('book.store');
        Route::get('/pustakawan/buku/{book_id}/edit', 'edit')->name('book.edit');
        Route::post('/pustakawan/buku/{book_id}/edit', 'update')->name('book.update');
        Route::post('/pustakawan/hapus','destroy')->name('book.destroy');
        Route::get('/daftar-buku', 'bookListIndex')->name('book-list.index');
    });
});