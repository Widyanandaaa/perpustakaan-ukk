@extends('Layouts.navbar')

@section('title', 'PerpustakaAnya | Detail Buku')

@section('css')
  <link rel="stylesheet" href="{{ asset('template/plugins/toastr/toastr.min.css') }}">
@endsection

@section('header')
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Website pinjam buku dengan bunga 0%</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/home">Beranda</a></li>
            <li class="breadcrumb-item active">Detail Buku</li>
          </ol>
        </div>
      </div>
    </div>
    <!-- /.container-fluid -->
  </section>
@endsection

@section('main-content')
  <section class="content">
    <div class="container-fluid">
        <div class="row">
          <div class="col-md-8">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="row">
                      <div class="col-md-6">
                        <h3 class="font-weight-white ml-3"><b>Detail Buku</b></h3>
                        <div class="d-flex mb-2" style="margin-top: -5px">
                          <div class="bg-orange mr-2" style="width: 10px; height: 10px; margin-top: -2px; border-radius: 100%"></div>
                          <div class="bg-orange" style="width: 140px; height: 5px;"></div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        @guest
                        <button type="button" class="btn bg-gradient-info btn-sm px-4 mt-2 float-right toastrDefaultInfo">Pinjam</button>
                        @else
                          @if (auth()->user()->role == 'Member' && $book->book_count > 0)
                            <button type="button" class="btn bg-gradient-info btn-sm px-4 mt-2 float-right" data-toggle="modal" data-target="#borrow-modal">Pinjam</button>
                            
                            <div class="modal fade show" id="borrow-modal" style="display: none;" aria-modal="true" role="dialog">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header bg-teal">
                                    <h4 class="modal-title">Pinjam buku</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">×</span>
                                    </button>
                                  </div>
                                  <form action="{{ route('borrow.book', ['user_number' => auth()->user()->user_number, 'book_code' => $book->book_code]) }}" method="POST" name="borrow-book-form" id="formBorrow">
                                    @csrf
                                    <div class="modal-body">
                                      <label for="bookAmount">Jumlah buku yang ingin dipinjam</label>
                                      <input type="number" class="form-control" id="bookAmount" name="amount" value="1" placeholder="Isi jumlah buku yang ingin dipinjam">
                                      <p class="mt-4" style="margin-bottom: -10px">Jumlah buku yang tersisa : {{ $book->book_count  }}</p>
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                      <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                                      <button type="submit" class="btn bg-gradient-info">Pinjam</button>
                                    </div>
                                  </form>
                                </div>
                                <!-- /.modal-content -->
                              </div>
                              <!-- /.modal-dialog -->
                            </div>
                          @elseif (auth()->user()->role == 'Member' && $book->book_count <= 0)
                            <button type="button" class="btn bg-gradient-info btn-sm px-4 mt-2 float-right disabled">Pinjam</button>
                          @else
                          <button type="button" class="btn bg-gradient-info btn-sm px-4 mt-2 float-right toastrDefaultInfo">Pinjam</button>
                          @endif    
                        @endguest
                      </div>
                    </div>
                </div>
              <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                      @if ($book->book_count > 0)
                        <span class="badge badge-success ml-1 mt-1" style="position: absolute; opacity: 85%;">Tersedia</span>
                      @else
                        <span class="badge badge-secondary ml-1 mt-1" style="position: absolute; opacity: 85%;">Tidak tersedia</span>  
                      @endif
                        <img src="{{ asset('storage/images/' . $book->cover) }}" alt="{{ $book->title }}" style="width: 200px; height: 300px;">
                    </div>
                    <div class="col-sm-8">
                        <div class="ml-3">
                            <div class="row">
                                <h4 class="text-wrap">{{ $book->title }}</h4>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-4">
                                    <p class="card-text"><b>Kode Buku : </b></p>
                                    <p class="card-text"><b>Pengarang : </b></p>
                                    <p class="card-text"><b>Penerbit : </b></p>
                                    <p class="card-text"><b>Tahun Terbit : </b></p>
                                    <p class="card-text"><b>Kategori : </b></p>
                                    <p class="card-text"><b>Genre : </b></p>
                                </div>
                                <div class="col-sm-8">
                                    <p class="card-text">{{ $book->book_code }}</p>
                                    <p class="card-text">{{ $book->author }}</p>
                                    <p class="card-text">{{ $book->publisher }}</p>
                                    <p class="card-text">{{ $book->publication_year }}</p>
                                    <p class="card-text">{{ $book->category }}</p>
                                    <div class="row jusify-content-center">
                                        <div class="col-10">
                                          @if (isset($book->genres[0]))
                                            @foreach ($book->genres as $genre)
                                              <span class="badge badge-light mr-1 mb-1">{{ $genre->name }}</span>  
                                            @endforeach
                                          @else
                                              -
                                          @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                  <div class="row">
                      <div class="col-md-12">
                        {{ $book->synopsis }}
                      </div>
                  </div>
              </div>
            </div>
          </div>
          <!-- /.col-md-8 -->
          <div class="col-md-4">
            <div class="card card-teal card-outline mb-4">
              <div class="card-header">
                <h5 class="card-title m-0 ml-2">Genre</h5>
                <div class="d-flex mt-4">
                  <div class="bg-orange mr-1" style="width: 8px; height: 8px; margin-top: -2px; border-radius: 100%"></div>
                  <div class="bg-orange" style="width: 43px; height: 4px;"></div>
                </div>
              </div>
              <div class="card-body">
                <div class="row jusify-content-center">
                  @foreach ($genres as $genre)
                  <div class="col-4">
                      <a href="{{ route('genre-list', $genre->name) }}" class="btn btn-block btn-secondary btn-xs mb-2">{{ $genre->name }}</a>
                  </div>
                  @endforeach
                </div>
              </div>
            </div>
            <div class="card card-teal card-outline">
              <div class="card-header">
                <h5 class="card-title m-0 ml-2">Kategori</h5>
                <div class="d-flex mt-4">
                  <div class="bg-orange mr-1" style="width: 8px; height: 8px; margin-top: -2px; border-radius: 100%"></div>
                  <div class="bg-orange" style="width: 60px; height: 4px;"></div>
                </div>
              </div>
              <div class="card-body">
                <div class="row jusify-content-center">
                  <div class="col-4">
                      <a href="{{ route('category-list', 'Manga') }}" class="btn btn-block btn-secondary btn-xs mb-2">Manga</a>
                  </div>
                  <div class="col-4">
                      <a href="{{ route('category-list', 'Novel') }}" class="btn btn-block btn-secondary btn-xs mb-2">Novel</a>
                  </div>
                  <div class="col-4">
                      <a href="{{ route('category-list', 'Majalah') }}" class="btn btn-block btn-secondary btn-xs mb-2">Majalah</a>
                  </div>
                  <div class="col-4">
                      <a href="{{ route('category-list', 'Kamus') }}" class="btn btn-block btn-secondary btn-xs mb-2">Kamus</a>
                  </div>
                  <div class="col-4">
                      <a href="{{ route('category-list', 'Komik') }}" class="btn btn-block btn-secondary btn-xs mb-2">Komik</a>
                  </div>
                  <div class="col-4">
                      <a href="{{ route('category-list', 'Ensiklopedia') }}" class="btn btn-block btn-secondary btn-xs mb-2">Ensiklopedia</a>
                  </div>
                  <div class="col-4">
                      <a href="{{ route('category-list', 'Biografi') }}" class="btn btn-block btn-secondary btn-xs mb-2">Biografi</a>
                  </div>
                  <div class="col-4">
                      <a href="{{ route('category-list', 'Naskah') }}" class="btn btn-block btn-secondary btn-xs mb-2">Naskah</a>
                  </div>
                  <div class="col-4">
                      <a href="{{ route('category-list', 'Novel ringan') }}" class="btn btn-block btn-secondary btn-xs mb-2">Novel Ringan</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- /.col-md-3 -->
        </div>
        <!-- /.row -->
    </div>
  </section>
@endsection

@section('js')
  <script src="{{ asset('template/plugins/toastr/toastr.min.js') }}"></script>
  <script>
    $(document).ready(function () {
      $('.toastrDefaultInfo').click(function () {
        toastr.info('Silahkan login sebagai member untuk meminjam buku.');
      });
    });
  </script>
@endsection