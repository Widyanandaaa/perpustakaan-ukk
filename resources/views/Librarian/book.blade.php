@extends('Layouts.sidebar')
@section('title', 'Pustakawan | Data Buku')
@section('nav-book-open', 'menu-open')
@section('book-active', 'active')
@section('book-table-active', 'active')
@section('header', 'Kelola Data Buku')

@section('css')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('template/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('template/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('template/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endsection

@section('breadcrumb')
  <li class="breadcrumb-item"><a href="/pustakawan">Pustakawan</a></li>
  <li class="breadcrumb-item active">Buku</li>
@endsection

@section('content')
@if (session('deleted'))
  <div class="card card-danger card-outline">
    <div class="card-header">
      <h4 class="card-title">{{ session('deleted') }}</h4>
      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
          <i class="fas fa-minus"></i>
        </button>
        <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
          <i class="fas fa-times"></i>
        </button>
      </div>
    </div>
  </div>
@endif
@if (session('success'))
  <div class="card card-success card-outline">
    <div class="card-header">
      <h4 class="card-title">{{ session('success') }}</h4>
      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
          <i class="fas fa-minus"></i>
        </button>
        <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
          <i class="fas fa-times"></i>
        </button>
      </div>
    </div>
  </div>
@endif

<div class="card">
    <div class="card-body">
      <table id="dataTable" class="table table-bordered table-striped table-hover">
        <thead>
        <tr>
          <th>Judul Buku</th>
          <th>Kode Buku</th>
          <th>Jumlah Buku</th>
          <th>Pengarang</th>
          <th>Penerbit</th>
          <th>Kategori</th>
          <th>Tahun Terbit</th>
          <th>Aksi</th>
        </tr>
        </thead>
        <tbody></tbody>
      </table>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->

  <div class="modal fade" id="modal-edit" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header bg-danger">
          <h4 class="modal-title">Hapus data buku</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <p id="deleteText">yakin hapus data buku ini?</p>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Batal</button>
          <form action="" method="POST" name="delete-book-form" id="formDelete">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
          </form>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
@endsection

@section('js')
    <!-- DataTables  & Plugins -->
    <script src="{{ asset('template/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('template/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('template/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('template/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('template/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('template/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    
    <script>
        $(document).ready(function () {
          var table = $('#dataTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('book.index') }}",
            columns: [
              {data: 'title', title: 'Judul'},
              {data: 'book_code', title: 'Kode Buku'},
              {data: 'book_count', title: 'Jumlah Buku', searchable: false},
              {data: 'author', title: 'pengarang'},
              {data: 'publisher', title: 'Penerbit'},
              {data: 'category', title: 'Kategori'},
              {data: 'publication_year', title: 'Tahun Terbit', searchable: false},
              {data: 'action', title: 'Aksi', orderable: false, searchable: false},
            ],
            "paging": true,
            "searching": true,
            "lengthChange": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
          });
          

          $('#search-input').on('keyup', function () {
            table.search(this.value).draw();
          });

          table.on('click', '#deleteButton', function() {
            var tr = $(this).closest('tr');
            if( $(tr).hasClass('child') ) {
              tr = tr.prev('.parent');
            }
        
            var data = table.row(tr).data();
            console.log(data.id);

            $('#deleteText').text(`Yakin hapus data ${data.title} ?`)
            $('#formDelete').attr('action', `/pustakawan/hapus/${data.id}`);
          });
        });
      </script>
@endsection