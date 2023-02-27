@extends('Layouts.sidebar')
@section('title', 'Pustakawan | Tambah Buku')
@section('nav-book-open', 'menu-open')
@section('book-active', 'active')
@section('add-book-active', 'active')
@section('header', 'Tambah Buku')

@section('css')
  <!-- Select2 -->
  <link rel="stylesheet" href="{{ asset('template/plugins/select2/css/select2.min.css') }}">
  <link rel="stylesheet" href="{{ asset('template/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
  
@endsection

@section('breadcrumb')
  <li class="breadcrumb-item"><a href="/dashboard">Beranda</a></li>
  <li class="breadcrumb-item"><a href="/Pustakawan">Pustakawan</a></li>
  <li class="breadcrumb-item"><a href="{{ route('book.index') }}">Buku</a></li>
  <li class="breadcrumb-item active">Tambah Buku</li>
@endsection

@section('content')
  <div class="card card-outline card-warning">
    <div class="card-body">
      <form action="" method="POST" name="add-book-form">
        @csrf
        <input type="hidden" name="book_id">
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="bookTitle">Judul buku</label>
              <input type="text" class="form-control" id="bookTitle" name="title" placeholder="Isi judul">
            </div>
            <div class="form-group">
              <label for="bookCode">Kode buku</label>
              <input type="text" class="form-control" id="bookCode" name="bookCode" placeholder="Isi kode">
            </div>
            <div class="form-group">
              <label for="bookAuthor">Pengarang buku</label>
              <input type="text" class="form-control" id="bookAuthor" name="author" placeholder="Isi pengarang">
            </div>
            <div class="form-group">
              <label for="bookPublisher">Penerbit buku</label>
              <input type="text" class="form-control" id="bookPublisher" name="publisher" placeholder="Isi penerbit">
            </div>
            <div class="form-group">
              <label for="bookSynopsis">Sinopsis buku</label>
              <textarea class="form-control" id="bookSynopsis" rows="3" name="synopsis" placeholder="Isi sinopsis" style="height: 100px;"></textarea>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="bookCover">Cover buku</label>
              <div class="input-group">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="bookCover" name="cover">
                  <label class="custom-file-label" for="bookCover">Pilih cover</label>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label>Kategori buku</label>
              <select class="form-control select2" style="width: 100%;">
                <option selected="selected">Alabama</option>
                <option>Alaska</option>
                <option>California</option>
                <option>Delaware</option>
                <option>Tennessee</option>
                <option>Texas</option>
                <option>Washington</option>
              </select>
            </div>
            <div class="form-group">
              <label>Genre buku</label>
              <select class="select2 form-control" multiple="multiple" data-placeholder="Pilih genre" style="width: 100%;">
                <option>Alabama</option>
                <option>Alaska</option>
                <option>California</option>
                <option>Delaware</option>
                <option>Tennessee</option>
                <option>Texas</option>
                <option>Washington</option>
              </select>
            </div>
            <div class="form-group">
              <label for="bookCount">Jumlah buku</label>
              <input type="number" class="form-control" id="bookCount" name="Amount" placeholder="Isi jumlah buku">
            </div>
            <div class="form-group">
              <label for="publicationYear">Tahun terbit</label>
              <input type="number" class="form-control" id="publicationYear" name="publicationYear" placeholder="Isi tahun terbit">
            </div>
            <button type="button" class="btn bg-gradient-success mt-3 float-right">Simpan</button>
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

        bsCustomFileInput.init();
      });
    </script>
@endsection