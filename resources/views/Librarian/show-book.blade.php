@extends('Layouts.navbar')

@section('title', 'PerpustakaAnya | Detail Buku')
@section('user-dropdown')
  <li><a href="#" class="dropdown-item">Kelola akun</a></li>
  <li><a href="#" class="dropdown-item">Kelola Peminjaman</a></li>
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
                        <button type="button" class="btn bg-gradient-info btn-sm px-4 mt-2 float-right">Pinjam</button>
                      </div>
                    </div>
                </div>
              <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <span class="badge badge-success ml-1 mt-1" style="position: absolute; opacity: 85%;">Tersedia</span>
                        <img src="{{ asset('storage/images/' . $book->cover) }}" alt="{{ $book->title }}" style="width: 200px; height: 300px;">
                    </div>
                    <div class="col-sm-8">
                        <div class="ml-3">
                            <div class="row">
                                <h4>{{ $book->title }}</h4>
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
                  @foreach ($categories as $category)
                  <div class="col-4">
                      <a href="{{ route('category-list', $category) }}" class="btn btn-block btn-secondary btn-xs mb-2">{{ $category }}</a>
                  </div>
                  @endforeach
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