<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\BorrowBack;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

use function PHPUnit\Framework\isNull;

class BorrowBackController extends Controller
{
    public function index(BorrowBack $bb, $username)
    {
        $bb = BorrowBack::where('username', $username)->paginate(12);

        foreach ($bb as $item) {
            $books = Book::where('book_code', $item->book_code)->get();

            foreach ($books as $book) {
                $cover[] = $book->cover;
            }
        }

        if (!isset($cover)) {
            $cover = [];
        }
        
        // dd($cover);

        return view('Member.borrow-book', compact('bb', 'cover'));
    }

    public function borrow(Request $request, $user_number, $book_code)
    {
        $user = Auth::user();
        $book = Book::where('book_code', $book_code)->get();
        $book = $book[0];
        $date = Carbon::today();
        $date = $date->format('Y-m-d');
        $amount = $request->input('amount');

        $count = $book->book_count - $amount;

        if ($count <= 0) {
            return redirect()->route('book.show', $book_code)->with('warning', 'Stok buku tidak mencukupi untuk peminjaman!');
        } else {
            $borrowing = new BorrowBack([
                'user_number' => $user->user_number,
                'username' => $user->username,
                'book_code' => $book_code,
                'book_title' => $book->title,
                'borrow_date' => $date,
                'deadline' => null,
                'return_date' => null,
                'borrowing_amount' => $amount,
                'fine' => null,
                'status' => 'Pending',
            ]);
    
            $borrowing->save();
            
            return redirect()->route('member.borrow.index', $user->username);
        }
    }

    public function borrowIndex(Request $request)
    {
        $borrows = BorrowBack::whereIn('status', ['Dipinjam', 'Pending'])->get();

        if ($request->ajax()) {
            return DataTables::of($borrows)
            ->addColumn('action', function ($borrow) {
                return '<a class="nav-link" data-toggle="dropdown" href="#">
                            <i class="fas fa-ellipsis-v" style="color: black"></i>
                        </a>
                            <ul class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                <li><a href="javascript:void(0)" id="acceptButton" data-id="' . $borrow->bb_id . '" class="dropdown-item" data-toggle="modal" data-target="#accept-modal">Izinkan</a></li>
                                <li><a href="javascript:void(0)" id="declineButton" data-id="' . $borrow->bb_id . '" class="dropdown-item" data-toggle="modal" data-target="#decline-modal">Tolak</a></li>
                            </ul>';
            })
            ->rawColumns(['action'])
            ->make(true);
        }

        return view('Librarian.borrow');
    }

    public function manageBorrow(Request $request, $id)
    {
        if ($request->input('status') === 'Dipinjam') {
            BorrowBack::where('bb_id', $id)->update([
                'status' => $request->input('status'),
                'deadline' => $request->input('deadline'),
            ]);
            
            $borrow = BorrowBack::where('bb_id', $id)->get();
            $borrow = $borrow[0];
            $book = Book::where('book_code', $borrow->book_code)->get();
            $book = $book[0];
            
            $book->book_count = $book->book_count - $borrow->borrowing_amount;
            $book->save();            
            
            return redirect()->route('borrow.index')->with('success', "Berhasil mengizinkan peminjaman buku $book->title!");
        } else {
            BorrowBack::where('bb_id', $id)->update([
                'status' => $request->input('status'),
            ]);

            $borrow = BorrowBack::where('bb_id', $id)->get();
            $borrow = $borrow[0];
            $book = Book::where('book_code', $borrow->book_code)->get();
            $book = $book[0];

            return redirect()->route('borrow.index')->with('deleted', "Berhasil menolak peminjaman buku $book->title!");
        }
    }

    public function returnIndex(Request $request)
    {
        $returns =  BorrowBack::whereIn('status', ['Dipinjam', 'Dikembalikan'])->get();

        if ($request->ajax()) {
            return DataTables::of($returns)
            ->addColumn('action', function ($return) {
                return '<a class="nav-link" data-toggle="dropdown" href="#">
                            <i class="fas fa-ellipsis-v" style="color: black"></i>
                        </a>
                            <ul class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                <li><a href="javascript:void(0)" id="acceptButton" data-id="' . $return->bb_id . '" class="dropdown-item" data-toggle="modal" data-target="#accept-modal">Kembalikan</a></li>
                            </ul>';
            })
            ->rawColumns(['action'])
            ->make(true);
        }

        return view('Librarian.return');
    }

    public function manageReturn(Request $request, $id)
    {
        $borrow = BorrowBack::where('bb_id', $id)->get();
        $borrow = $borrow[0];
        $deadline = Carbon::parse($borrow->deadline);
        $returnDate = Carbon::parse($request->input('return_date'));
        $daysLate = $deadline->diffInDays($returnDate, false);

        if ($daysLate > 0) {
            $fine = $daysLate * 5000;
        } else {
            $fine = 0;
        }

        BorrowBack::where('bb_id', $id)->update([
            'status' => $request->input('status'),
            'return_date' => $request->input('return_date'),
            'fine' => $fine,
        ]);

        return redirect()->route('return.index')->with('success', "Berhasil mengembalikan buku $borrow->book_title!");
    }
}
