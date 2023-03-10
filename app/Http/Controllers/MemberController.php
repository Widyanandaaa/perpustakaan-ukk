<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Genre;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function index(Book $books, Genre $genres)
    {
        $books = Book::paginate(8);
        $genres = Genre::all();

        return view('Member.home', compact('books', 'genres'));
    }

    public function genreList(Book $books, Genre $genres, $genre)
    {
        $books = Book::whereHas('genres', function ($query) use ($genre) {
            $query->where('name', $genre);
        })->paginate(8);
        $genres = Genre::all();

        return view('Member.genre-list', compact('books', 'genres'));
    }

    public function categoryList(Genre $genres, $category)
    {
        $books = Book::where('category', $category)->paginate(8);
        $genres = Genre::all();

        return view('Member.category-list', compact('books', 'genres'));
    }

    public function showBook($id)
    {
        $book = Book::where('book_code', $id)->get();
        $book = $book[0];
        $genres = Genre::all();

        return view('Member.show-book', compact('book', 'genres'));
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        $books = Book::query()
                ->where('title', 'like', "%$query%")
                ->orWhere('book_code', 'like', "%$query%")
                ->orWhere('author', 'like', "%$query%")
                ->orWhere('publisher', 'like', "%$query%")
                ->paginate(8);

        $genres = Genre::all();

        return view('Member.home', compact('books', 'genres'));
    }
}
