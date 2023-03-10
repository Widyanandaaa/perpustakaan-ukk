@extends('Layouts.navbar')

@section('title', 'PerpustakaAnya | Daftar Kategori')

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
            <li class="breadcrumb-item active">Daftar Kategori</li>
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
              <div class="card-body">
                <h3 class="font-weight-white ml-3"><b>Daftar Kategori Buku</b></h3>
                <div class="d-flex mb-2" style="margin-top: -5px">
                  <div class="bg-orange mr-2" style="width: 10px; height: 10px; margin-top: -2px; border-radius: 100%"></div>
                  <div class="bg-orange" style="width: 250px; height: 5px;"></div>
                </div>  
                <div class="row">
                  @if (isset($books[0]))
                    @foreach ($books as $book)
                      <!-- Book card -->
                      <div class="col-md-6">
                        <div class="card card-teal card-outline">
                          <div class="card-body">
                            <div class="row">
                              <div class="col-sm-5">
                                <a href="{{ route('book.show', $book->book_code) }}">
                                  <img src="{{ asset('storage/images/' . $book->cover) }}" alt="{{ $book->title }}" style="width: 110px; height: 165px;">
                                </a>
                              </div>
                              <div class="col-sm-7">
                                <a href="{{ route('book.show', $book->book_code) }}"><h5 class="text-truncate">{{ $book->title }}</h5></a>
                  
                                <p class="card-text text-muted text-wrap">{{ $book->author }}</p>
                                <div class="row jusify-content-center">
                                    <div class="col">
                                      @foreach ($book->genres as $genre)
                                        <span class="badge badge-light mr-1 mb-1">{{ $genre->name }}</span>
                                      @endforeach
                                    </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- End of Book Card -->
                    @endforeach
                  @else
                      <span class="mx-auto">--- Buku dengan kategori ini kosong ---</span>
                  @endif
                </div>
              </div>
              <div class="card-footer">
                {{ $books->links('Layouts.pagination') }}
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
          <!-- /.col-md-4 -->
        </div>
        <!-- /.row -->
    </div>
  </section>
@endsection