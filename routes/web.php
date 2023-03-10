<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\BorrowBackController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\LoginController;
use App\Models\BorrowBack;
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
    return redirect()->intended('/home');
});

Route::controller(LoginController::class)->group(function (){
    Route::get('/login', 'showLoginForm')->name('login');
    Route::post('/login', 'loginProcess')->name('login');
    Route::post('/logout', 'logout')->name('logout');
});

Route::controller(MemberController::class)->group(function () {
    Route::get('/home', 'index')->name('home.index');
    Route::get('/daftar-genre-{name}', 'genreList')->name('genre-list');
    Route::get('/daftar-kategori-{category}', 'categoryList')->name('category-list');
    Route::get('/buku-{book_code}', 'showBook')->name('book.show');
    Route::get('/buku/cari', 'search')->name('book.search');
});

Route::middleware(['auth', 'member'])->group(function () {
    Route::controller(BorrowBackController::class)->group(function () {
        Route::get('/riwayat-peminjaman-{username}', 'index')->name('member.borrow.index');
        Route::post('/member-{user_number}/pinjam-buku-{book_code}', 'borrow')->name('borrow.book');
    });
});

Route::middleware(['auth', 'librarian'])->group(function () {
    Route::controller(BookController::class)->group(function () {
        Route::get('/pustakawan', 'librarianHome')->name('librarian.index');
        Route::get('/pustakawan/buku', 'index')->name('book.index');
        Route::get('/pustakawan/buku/tambah-buku', 'create')->name('book.create');
        Route::post('/pustakawan/buku/tambah-buku', 'store')->name('book.store');
        Route::get('/pustakawan/buku/{book_code}/edit', 'edit')->name('book.edit'); 
        Route::patch('/pustakawan/buku/{book_code}/edit', 'update')->name('book.update');
        Route::delete('/pustakawan/hapus/{id}','destroy')->name('book.destroy');
    });

    Route::controller(BorrowBackController::class)->group(function () {
        Route::get('/pustakawan/kelola-peminjaman', 'borrowIndex')->name('borrow.index');
        Route::patch('/pustakawan/kelola-peminjaman/{bb_id}', 'manageBorrow')->name('manage.borrow');
        Route::get('/pustakawan/kelola-pengembalian', 'returnIndex')->name('return.index');
        Route::patch('/pustakawan/kelola-pengembalian/{bb_id}', 'manageReturn')->name('manage.return');
    });
});