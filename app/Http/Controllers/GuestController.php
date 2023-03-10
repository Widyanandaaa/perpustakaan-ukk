<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Genre;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function index(Book $books, Genre $genres)
    {
        
    }
    public function genreList(Book $books, Genre $genres, $genre)
    {
        $books = Book::whereHas('genres', function ($query) use ($genre) {
            $query->where('name'enre);
        })->get();
        $categories = Book::pluck('category');
        $genres = Genre::all();

        return view('Guest.genre-list', compact('books', 'genres', 'categories'));
    }

    public function categoryList(Genre $genres, $category)
    {
        $books = Book::where('category', $category)->get();
        $categories = Book::pluck('category');
        $genres = Genre::all();

        return view('Guest.category-list', compact('books', 'genres', 'categories'));
    }

    public function showBook($id)
    {
        $book = Book::where('book_code', $id)->get();
        $book = $book[0];
        $categories = Book::pluck('category');
        $genres = Genre::all();

        return view('Guest.show-book', compact('book', 'genres', 'categories'));
    }
}
