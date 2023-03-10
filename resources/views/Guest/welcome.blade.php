@extends('Layouts.navbar')

@section('title', 'PerpustakaAnya')
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
            <li class="breadcrumb-item active">Beranda</li>
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
                <h3 class="font-weight-white ml-3"><b>Beranda</b></h3>
                <div class="d-flex mb-2" style="margin-top: -5px">
                  <div class="bg-orange mr-2" style="width: 10px; height: 10px; margin-top: -2px; border-radius: 100%"></div>
                  <div class="bg-orange" style="width: 100px; height: 5px;"></div>
                </div>
                <div class="row">
                  @foreach ($books as $book)
                    <!-- Book card -->
                    <div class="col-md-6">
                      <div class="card card-teal card-outline">
                        <div class="card-body">
                          <div class="row">
                            <div class="col-sm-5">
                              <a href="{{ route('book.show', $book->book_code) }}">
                                <img src="{{ asset('storage/images/' . $book->cover) }}" alt="{{ $book->title }}" style="width: 100px; height: 150px;">
                              </a>
                            </div>
                            <div class="col-sm-7">
                              <a href="{{ route('book.show', $book->book_code) }}"><h5 class="card-title">{{ $book->title }}</h5></a>
                
                              <p class="card-text text-muted">{{ $book->author }}</p>
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
                  </div>
              </div>
              <div class="card-footer">
                <ul class="pagination justify-content-center">
                    <li class="paginate_button page-item previous disabled" id="example2_previous">
                        <a href="#" aria-controls="example2" data-dt-idx="0" tabindex="0" class="page-link">Previous</a>
                    </li>
                    <li class="paginate_button page-item active">
                        <a href="#" aria-controls="example2" data-dt-idx="1" tabindex="0" class="page-link">1</a>
                    </li>
                    <li class="paginate_button page-item ">
                        <a href="#" aria-controls="example2" data-dt-idx="2" tabindex="0" class="page-link">2</a>
                    </li>
                    <li class="paginate_button page-item ">
                        <a href="#" aria-controls="example2" data-dt-idx="3" tabindex="0" class="page-link">3</a>
                    </li>
                    <li class="paginate_button page-item ">
                        <a href="#" aria-controls="example2" data-dt-idx="4" tabindex="0" class="page-link">4</a>
                    </li>
                    <li class="paginate_button page-item ">
                        <a href="#" aria-controls="example2" data-dt-idx="5" tabindex="0" class="page-link">5</a>
                    </li>
                    <li class="paginate_button page-item ">
                        <a href="#" aria-controls="example2" data-dt-idx="6" tabindex="0" class="page-link">6</a>
                    </li>
                    <li class="paginate_button page-item next" id="example2_next">
                        <a href="#" aria-controls="example2" data-dt-idx="7" tabindex="0" class="page-link">Next</a>
                    </li>
                </ul>
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
          <!-- /.col-md-4 -->
        </div>
        <!-- /.row -->
    </div>
  </section>
@endsection