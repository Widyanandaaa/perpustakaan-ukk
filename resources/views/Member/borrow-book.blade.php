@extends('Layouts.navbar')

@section('title', 'PerpustakaAnya | Pinjam Buku')

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
            <li class="breadcrumb-item active">Riwayat Peminjaman</li>
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
              <div class="col-md-12">
                  <div class="card">
                      <div class="card-body">
                          <h3 class="font-weight-white ml-3"><b>Daftar Pinjaman Buku</b></h3>
                          <div class="d-flex mb-4" style="margin-top: -5px">
                            <div class="bg-orange mr-2" style="width: 10px; height: 10px; margin-top: -2px; border-radius: 100%"></div>
                            <div class="bg-orange" style="width: 268px; height: 5px;"></div>
                          </div>
                          <div class="row">
                            @foreach ($bb as $index => $item)
                            <div class="col-md-3">
                              <div class="card card-teal card-outline">
                                <div class="card-body">
                                  <a href="{{ route('book.show', $item->book_code) }}">
                                    @if ($item->status === 'Pending')
                                      <span class="badge badge-warning ml-1 mt-1" style="position: absolute; opacity: 85%;">Pending</span>
                                    @elseif ($item->status === 'Dipinjam')
                                      <span class="badge badge-success ml-1 mt-1" style="position: absolute; opacity: 85%;">Dipinjam</span>
                                    @elseif ($item->status === 'Ditolak')
                                      <span class="badge badge-danger ml-1 mt-1" style="position: absolute; opacity: 85%;">Ditolak</span>
                                    @elseif ($item->status === 'Dikembalikan')
                                      <span class="badge badge-info ml-1 mt-1" style="position: absolute; opacity: 85%;">Dikembalikan</span>
                                    @endif
                                    <img src="{{ asset('storage/images/' . $cover[$index]) }}" alt="{{ $item->book_title }}">
                                  </a>
                                  <a href="{{ route('book.show', $item->book_code) }}"><h5 class="text-wrap mt-3">{{ $item->book_title }}</h5></a>
                                </div>
                              </div>
                            </div>
                            @endforeach
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
    </section>
@endsection