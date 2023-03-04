@extends('Layouts.sidebar')
@section('title', 'Pustakawan | Edit Buku')
@section('nav-book-open', 'menu-open')
@section('book-active', 'active')
@section('header', 'Edit Buku')

@section('css')
  <!-- Select2 -->
  <link rel="stylesheet" href="{{ asset('template/plugins/select2/css/select2.min.css') }}">
  <link rel="stylesheet" href="{{ asset('template/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
  
@endsection

@section('breadcrumb')
  <li class="breadcrumb-item"><a href="/Pustakawan">Pustakawan</a></li>
  <li class="breadcrumb-item"><a href="{{ route('book.index') }}">Buku</a></li>
  <li class="breadcrumb-item active">Edit Buku</li>
@endsection

@section('content')
  <div class="card card-outline card-warning">
    <div class="card-body">
      <form action="{{ route('book.update', $book->book_code) }}" method="POST" name="edit-book-form" enctype="multipart/form-data">
        @method('PATCH')
        @csrf
        <input type="hidden" name="book_id">
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="bookTitle">Judul buku</label>
              <input type="text" class="form-control @error('title') is-invalid @enderror" id="bookTitle" name="title" placeholder="Isi judul" value="{{ $book->title }}">
              @error('title')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
            <div class="form-group">
              <label for="book_code">Kode buku</label>
              <input type="text" class="form-control @error('book_code') is-invalid @enderror" id="book_code" name="book_code" placeholder="Isi kode" value="{{ $book->book_code }}">
              @error('book_code')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
            <div class="form-group">
              <label for="bookAuthor">Pengarang buku</label>
              <input type="text" class="form-control @error('author') is-invalid @enderror" id="bookAuthor" name="author" placeholder="Isi pengarang" value="{{ $book->author }}">
              @error('author')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
            <div class="form-group">
              <label for="bookPublisher">Penerbit buku</label>
              <input type="text" class="form-control @error('publisher') is-invalid @enderror" id="bookPublisher" name="publisher" placeholder="Isi penerbit" value="{{ $book->publisher }}">
              @error('publisher')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
            <div class="form-group">
              <label for="bookSynopsis">Sinopsis buku</label>
              <textarea class="form-control @error('synopsis') is-invalid @enderror" id="bookSynopsis" rows="3" name="synopsis" placeholder="Isi sinopsis" style="height: 100px;">{{ $book->synopsis}}</textarea>
              @error('synopsis')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="bookCover">Cover buku</label>
              <div class="input-group">
                <div class="custom-file">
                  <input type="file" class="custom-file-input @error('cover') is-invalid @enderror" id="bookCover" name="cover">
                  <label class="custom-file-label" for="bookCover">Pilih cover</label>
                  @error('cover')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
              </div>
            </div>
            <div class="form-group">
              <label>Kategori buku</label>
              <select class="form-control select2 @error('category') is-invalid @enderror" name="category" style="width: 100%;">
                <option value="Manga" {{'Manga' == old('category', $book->category) ? 'selected' : '' }}>Manga</option>
                <option value="Novel" {{'Novel' == old('category', $book->category) ? 'selected' : '' }}>Novel</option>
                <option value="Majalah" {{'Majalah' == old('category', $book->category) ? 'selected' : '' }}>Majalah</option>
                <option value="Kamus" {{'Kamus' == old('category', $book->category) ? 'selected' : '' }}>Kamus</option>
                <option value="Komik" {{'Komik' == old('category', $book->category) ? 'selected' : '' }}>Komik</option>
                <option value="Ensiklopedia" {{'Ensiklopedia' == old('category', $book->category) ? 'selected' : '' }}>Ensiklopedia</option>
                <option value="Biografi" {{'Biografi' == old('category', $book->category) ? 'selected' : '' }}>Biografi</option>
                <option value="Naskah" {{'Naskah' == old('category', $book->category) ? 'selected' : '' }}>Naskah</option>
                <option value="Novel Ringan" {{'Novel Ringan' == old('category', $book->category) ? 'selected' : '' }}>Novel Ringan</option>
              </select>
              @error('category')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
            <div class="form-group">
              <label>Genre buku</label>
              <div class="select2-warning">
                <select class="select2 form-control @error('genres') is-invalid @enderror" id="select2Multiple" name="genres[]" multiple="multiple" data-placeholder="Pilih genre" style="width: 100%;">
                  @foreach ($genres as $id => $name)
                  <option value="{{ $id }}" {{ in_array($id, $selectedGenres) ? 'selected' : '' }}>{{ $name }}</option>
                  @endforeach
                </select>
                @error('genres')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
            </div>
            <div class="form-group">
              <label for="bookCount">Jumlah buku</label>
              <input type="number" class="form-control @error('amount') is-invalid @enderror" id="bookCount" name="amount" placeholder="Isi jumlah buku" value="{{ $book->book_count }}">
              @error('amount')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
            <div class="form-group">
              <label for="publication_year">Tahun terbit</label>
              <input type="number" class="form-control @error('publication_year') is-invalid @enderror" id="publication_year" name="publication_year" placeholder="Isi tahun terbit" value="{{ $book->publication_year }}">
              @error('publication_year')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
            <button type="submit" class="btn bg-gradient-success mt-3 float-right">Simpan</button>
          </div>
        </div>
      </form>
    </div>
  </div>
@endsection

@section('js')
<!-- Select2 -->
    <script src="{{ asset('template/plugins/select2/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('template/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
    <script>
      $(document).ready(function () {
        $('.select2').select2();
        $('#select2Multiple').val({{ json_encode($selectedGenres) }}).trigger('change');

        bsCustomFileInput.init();
      });
    </script>
@endsection