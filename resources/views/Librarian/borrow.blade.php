@extends('Layouts.sidebar')
@section('title', 'Pustakawan | Data Peminjaman')
@section('nav-borrow-open', 'menu-open')
@section('borrow-active', 'active')
@section('borrow-table-active', 'active')
@section('header', 'Kelola Data Peminjaman')

@section('css')
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="{{ asset('template/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
  
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('template/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('template/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('template/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endsection

@section('breadcrumb')
  <li class="breadcrumb-item"><a href="/pustakawan">Pustakawan</a></li>
  <li class="breadcrumb-item active">Peminjaman</li>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
      <table id="dataTable" class="table table-bordered table-striped table-hover">
        <thead>
        <tr>
          <th>No User</th>
          <th>Username</th>
          <th>Kode Buku</th>
          <th>Judul Buku</th>
          <th>Jumlah Pinjam</th>
          <th>Tanggal Peminjaman</th>
          <th>Tenggat Peminjaman</th>
          <th>Status</th>
          <th>Aksi</th>
        </tr>
        </thead>
        <tbody></tbody>
      </table>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->

  <div class="modal fade" id="accept-modal" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header bg-success">
          <h4 class="modal-title">Ubah Status Peminjaman</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <form action="" method="POST" name="accept-borrow-form" id="formAccept">
          @csrf
          @method('PATCH')
          <input type="hidden" name="status" value="Dipinjam">
          <div class="modal-body">
            <div class="row justify-content-center">
              <div class="col-sm-6">
                <div class="form-group">
                  <label>Tenggat Peminjaman:</label>
                    <div class="input-group date" id="reservationdate" data-target-input="nearest">
                        <input type="text" class="form-control datetimepicker-input" name="deadline" data-target="#reservationdate">
                        <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-md btn-default" data-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-md bg-gradient-success">Izinkan</button>
          </div>
        </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  
  <div class="modal fade" id="decline-modal" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header bg-danger">
          <h4 class="modal-title">Ubah Status Peminjaman</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
            <p id="declineText">yakin tolak peminjaman buku ini?</p>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-md btn-default" data-dismiss="modal">Batal</button>
          <form action="" method="POST" name="decline-borrow-form" id="formDecline">
            @csrf
            @method('PATCH')
            <input type="hidden" name="status" value="Ditolak">
            <button type="submit" class="btn btn-md bg-gradient-danger">Tolak</button>
          </form>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
@endsection

@section('js')
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ asset('template/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('template/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>

    <!-- DataTables  & Plugins -->
    <script src="{{ asset('template/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('template/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('template/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('template/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('template/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('template/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    
    <script>
        $(document).ready(function () {    
          $(function () {
              $('#reservationdate').datetimepicker({
              format: 'Y-MM-DD'
            });
          });  
          
          $(function () {
            var table = $('#dataTable').DataTable({
              processing: true,
              serverSide: true,
              ajax: "{{ route('borrow.index') }}",
              columns: [
                {data: 'user_number', title: 'No User'},
                {data: 'username', title: 'Username'},
                {data: 'book_code', title: 'Kode Buku'},
                {data: 'book_title', title: 'Judul Buku'},
                {data: 'borrowing_amount', title: 'Jumlah Pinjam', searchable: false},
                {data: 'borrow_date', title: 'Tanggal Peminjaman'},
                {data: 'deadline', title: 'Tenggat Peminjaman'},
                {data: 'status', title: 'Status'},
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
  
            table.on('click', '#acceptButton', function() {
              var tr = $(this).closest('tr');
              if( $(tr).hasClass('child') ) {
                tr = tr.prev('.parent');
              }
          
              var data = table.row(tr).data();
              console.log(data.bb_id);
  
              $('#acceptText').text(`Yakin izinkan peminjaman buku ${data.book_title} ?`);
              $('#formAccept').attr('action', `/pustakawan/kelola-peminjaman/${data.bb_id}`);
            });
  
            table.on('click', '#declineButton', function() {
              var tr = $(this).closest('tr');
              if( $(tr).hasClass('child') ) {
                tr = tr.prev('.parent');
              }
          
              var data = table.row(tr).data();
              console.log(data.bb_id);
  
              $('#declineText').text(`Yakin tolak peminjaman buku ${data.book_title} ?`);
              $('#formDecline').attr('action', `/pustakawan/kelola-peminjaman/${data.bb_id}`);
            });
          });
          });
      </script>
@endsection