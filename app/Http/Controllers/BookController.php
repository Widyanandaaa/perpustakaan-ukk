<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use DataTables;

class BookController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $books = Book::all();

        if ($request->ajax()) {
            return Datatables::of($books)
            ->addColumn('action', function ($book) {
                return '<div class="d-flex justify-content-center">
                        <a href="' . route('book.edit', $book->book_id) . '" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                        &nbsp;&nbsp;
                        <a href="javascript:void(0)" id="tombol-hapus" data-id="' . $book->book_id . '" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-edit"><i class="fas fa-trash-alt"></i></a>
                        </div>';
            })
            ->rawColumns(['action'])
            ->make(true);
        }

        return view('Librarian.book');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Book $book)
    {
        return view('Librarian.create-book', ['book' => $book]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        return view('Librarian.edit-book', ['book' => $book]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        //
    }

    public function bookListIndex(Book $book)
    {
        // dd($book->book_code);
        return view('Member.book-list', ['book' => $book]);
    }
}
