<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Genre;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Book $books, Genre $genres)
    {
        $books = Book::all();
        $categories = Book::pluck('category');
        $genres = Genre::all();

        return view('Member.home', compact('books', 'genres', 'categories'));
    }

    public function librarianHome()
    {
        return view('Librarian.home');
    }

    public function genreList(Book $books, Genre $genres, $genre)
    {
        $books = Book::whereHas('genres', function ($query) use ($genre) {
            $query->where('name', $genre);
        })->get();
        $categories = Book::pluck('category');
        $genres = Genre::all();

        return view('Member.genre-list', compact('books', 'genres', 'categories'));
    }

    public function categoryList(Genre $genres, $category)
    {
        $books = Book::where('category', $category)->get();
        $categories = Book::pluck('category');
        $genres = Genre::all();

        return view('Member.category-list', compact('books', 'genres', 'categories'));
    }
}
