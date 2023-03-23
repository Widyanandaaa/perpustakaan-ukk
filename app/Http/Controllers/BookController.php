<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Genre;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Image   ;

class BookController extends Controller
{
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
                        <a href="' . route('book.edit', $book->book_code) . '" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                        &nbsp;&nbsp;
                        <a href="javascript:void(0)" id="deleteButton" data-id="' . $book->id . '" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-edit"><i class="fas fa-trash-alt"></i></a>
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
    public function create()
    {
        $genres = Genre::pluck('name', 'id');

        return view('Librarian.create-book', compact('genres'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'book_code' => 'required|unique:books',
            'author' => 'required',
            'publisher' => 'required',
            'synopsis' => 'required',
            'cover' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'category' => 'required',
            'genres' => 'array',
            'amount' => 'required',
            'publication_year' => 'required',
            'entry_date' => 'required',

        ]);

        $book = new Book([
            'title' => $validatedData['title'],
            'book_code' => $validatedData['book_code'],
            'author' => $validatedData['author'],
            'publisher' => $validatedData['publisher'],
            'synopsis' => $validatedData['synopsis'],
            'category' => $validatedData['category'],
            'book_count' => $validatedData['amount'],
            'publication_year' => $validatedData['publication_year'],
            'entry_date' => $validatedData['entry_date'],
        ]);

        if ($request->hasFile('cover')) {
            $image = $request->file('cover');
            $fileName = time().'.'.$image->getClientOriginalExtension();
        
            $image = Image::make($image);
            $image->fit(200, 300)->save(storage_path('app/public/images/' . $fileName));
        
            $book->cover = $fileName;
        }

        $book->save();

        $genres = $request->input('genres', []);
        foreach ($genres as $genreId) {
            $genre = Genre::find($genreId);
            $book->genres()->attach($genre);
        }

        return redirect()->route('book.index')->with('success', 'Data Buku Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book = Book::where('book_code', $id)->get();
        $book = $book[0];
        $selectedGenres = $book->genres->pluck('id')->toArray();
        $genres = Genre::pluck('name', 'id');

        return view('Librarian.edit-book', compact('book', 'genres', 'selectedGenres'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'book_code' => 'required',
            'author' => 'required',
            'publisher' => 'required',
            'synopsis' => 'required',
            'cover' => 'nullable|image|mimes:jpeg,png,jpg',
            'category' => 'required',
            'genres' => 'array',
            'amount' => 'required',
            'publication_year' => 'required',
            'entry_date' => 'required',

        ]);

        $book = Book::where('book_code', $id)->get();
        $book = $book[0];

        $book->title = $request->input('title');
        $book->book_code = $request->input('book_code');
        $book->author = $request->input('author');
        $book->publisher = $request->input('publisher');
        $book->synopsis = $request->input('synopsis');
        $book->category = $request->input('category');
        $book->book_count = $request->input('amount');
        $book->publication_year = $request->input('publication_year');
        $book->publication_year = $request->input('entry_date');
        
        if ($request->hasFile('cover')) {
            $image = $request->file('cover');
            $fileName = time().'.'.$image->getClientOriginalExtension();

            $image = Image::make($image);
            $image->fit(200, 300)->save(storage_path('app/public/images/' . $fileName));

            $book->cover = $fileName;
        }
        
        $book->save();
        $book->genres()->sync($request->input('genres', []));

        return redirect()->route('book.index')->with('success', "Data Buku $book->title Berhasil Diubah!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = Book::find($id);

        Book::destroy($id);
        // dd($book->title);

        return redirect()->route('book.index')->with('deleted', "Data Buku $book->title Berhasil Dihapus!");
    }

    public function librarianHome()
    {
        return view('Librarian.home');
    }
}