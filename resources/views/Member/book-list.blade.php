@extends('Layouts.navbar')

@section('title', 'PerpustakaAnya | Daftar Buku')
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
            <li class="breadcrumb-item active">Daftar Buku</li>
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
          <div class="col-lg-12">
            <div class="card">
              <div class="card-body">
                <h3 class="font-weight-white mb-4"><b>Daftar buku</b></h3>
                <div class="row">
                      <!-- Book card -->
                      <div class="col-lg-4">
                        <div class="card card-teal card-outline">
                          <div class="card-body">
                            <div class="row">
                              <div class="col-sm-5 bg-info">
                                
                              </div>
                              <div class="col-sm-7">
                                <h6 class="card-title">Zrul Tempest</h6>
                  
                                <p class="card-text">Azriel Zidane</p>
                                <div class="row jusify-content-center">
                                    <div class="col">
                                        <span class="badge badge-danger mr-1 mb-1">genre</span>
                                        <span class="badge badge-warning mr-1 mb-1">genre</span>
                                        <span class="badge badge-success mr-1 mb-1">genre</span>
                                        <span class="badge badge-light mr-1 mb-1">genre</span>
                                        <span class="badge badge-light mr-1 mb-1">genre</span>
                                        <span class="badge badge-light mr-1 mb-1">genre</span>
                                        <span class="badge badge-light mr-1 mb-1">genre</span>
                                    </div>
                                </div>
                                <div class="row mt-3 justify-content-center">
                                    <div class="col">
                                        <a href="daftar-buku/buku-{{$book->book_code}}" type="button" class="btn btn-sm btn-info">Lihat Detail</a>
                                    </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- End of Book Card -->
                      <!-- Book card -->
                      <div class="col-lg-4">
                        <div class="card card-teal card-outline">
                          <div class="card-body">
                            <div class="row">
                              <div class="col-sm-5 bg-info">
                                
                              </div>
                              <div class="col-sm-7">
                                <h6 class="card-title">Zrul Tempest</h6>
                  
                                <p class="card-text">Azriel Zidane</p>
                                <div class="row jusify-content-center">
                                    <div class="col">
                                        <span class="badge badge-danger mr-1 mb-1">genre</span>
                                        <span class="badge badge-warning mr-1 mb-1">genre</span>
                                        <span class="badge badge-success mr-1 mb-1">genre</span>
                                        <span class="badge badge-light mr-1 mb-1">genre</span>
                                        <span class="badge badge-light mr-1 mb-1">genre</span>
                                        <span class="badge badge-light mr-1 mb-1">genre</span>
                                        <span class="badge badge-light mr-1 mb-1">genre</span>
                                    </div>
                                </div>
                                <div class="row mt-3 justify-content-center">
                                    <div class="col">
                                        <button href="#" type="button" class="btn btn-sm btn-info">Lihat Detail</button>
                                    </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- End of Book Card -->
                      <!-- Book card -->
                      <div class="col-lg-4">
                        <div class="card card-teal card-outline">
                          <div class="card-body">
                            <div class="row">
                              <div class="col-sm-5 bg-info">
                                
                              </div>
                              <div class="col-sm-7">
                                <h6 class="card-title">Zrul Tempest</h6>
                  
                                <p class="card-text">Azriel Zidane</p>
                                <div class="row jusify-content-center">
                                    <div class="col">
                                        <span class="badge badge-danger mr-1 mb-1">genre</span>
                                        <span class="badge badge-warning mr-1 mb-1">genre</span>
                                        <span class="badge badge-success mr-1 mb-1">genre</span>
                                        <span class="badge badge-light mr-1 mb-1">genre</span>
                                        <span class="badge badge-light mr-1 mb-1">genre</span>
                                        <span class="badge badge-light mr-1 mb-1">genre</span>
                                        <span class="badge badge-light mr-1 mb-1">genre</span>
                                    </div>
                                </div>
                                <div class="row mt-3 justify-content-center">
                                    <div class="col">
                                        <button href="#" type="button" class="btn btn-sm btn-info">Lihat Detail</button>
                                    </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- End of Book Card -->
                      <!-- Book card -->
                      <div class="col-lg-4">
                        <div class="card card-teal card-outline">
                          <div class="card-body">
                            <div class="row">
                              <div class="col-sm-5 bg-info">
                                
                              </div>
                              <div class="col-sm-7">
                                <h6 class="card-title">Zrul Tempest</h6>
                  
                                <p class="card-text">Azriel Zidane</p>
                                <div class="row jusify-content-center">
                                    <div class="col">
                                        <span class="badge badge-danger mr-1 mb-1">genre</span>
                                        <span class="badge badge-warning mr-1 mb-1">genre</span>
                                        <span class="badge badge-success mr-1 mb-1">genre</span>
                                        <span class="badge badge-light mr-1 mb-1">genre</span>
                                        <span class="badge badge-light mr-1 mb-1">genre</span>
                                        <span class="badge badge-light mr-1 mb-1">genre</span>
                                        <span class="badge badge-light mr-1 mb-1">genre</span>
                                    </div>
                                </div>
                                <div class="row mt-3 justify-content-center">
                                    <div class="col">
                                        <button href="#" type="button" class="btn btn-sm btn-info">Lihat Detail</button>
                                    </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- End of Book Card -->
                      <!-- Book card -->
                      <div class="col-lg-4">
                        <div class="card card-teal card-outline">
                          <div class="card-body">
                            <div class="row">
                              <div class="col-sm-5 bg-info">
                                
                              </div>
                              <div class="col-sm-7">
                                <h6 class="card-title">Zrul Tempest</h6>
                  
                                <p class="card-text">Azriel Zidane</p>
                                <div class="row jusify-content-center">
                                    <div class="col">
                                        <span class="badge badge-danger mr-1 mb-1">genre</span>
                                        <span class="badge badge-warning mr-1 mb-1">genre</span>
                                        <span class="badge badge-success mr-1 mb-1">genre</span>
                                        <span class="badge badge-light mr-1 mb-1">genre</span>
                                        <span class="badge badge-light mr-1 mb-1">genre</span>
                                        <span class="badge badge-light mr-1 mb-1">genre</span>
                                        <span class="badge badge-light mr-1 mb-1">genre</span>
                                    </div>
                                </div>
                                <div class="row mt-3 justify-content-center">
                                    <div class="col">
                                        <button href="#" type="button" class="btn btn-sm btn-info">Lihat Detail</button>
                                    </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- End of Book Card -->
                      <!-- Book card -->
                      <div class="col-lg-4">
                        <div class="card card-teal card-outline">
                          <div class="card-body">
                            <div class="row">
                              <div class="col-sm-5 bg-info">
                                
                              </div>
                              <div class="col-sm-7">
                                <h6 class="card-title">Zrul Tempest</h6>
                  
                                <p class="card-text">Azriel Zidane</p>
                                <div class="row jusify-content-center">
                                    <div class="col">
                                        <span class="badge badge-danger mr-1 mb-1">genre</span>
                                        <span class="badge badge-warning mr-1 mb-1">genre</span>
                                        <span class="badge badge-success mr-1 mb-1">genre</span>
                                        <span class="badge badge-light mr-1 mb-1">genre</span>
                                        <span class="badge badge-light mr-1 mb-1">genre</span>
                                        <span class="badge badge-light mr-1 mb-1">genre</span>
                                        <span class="badge badge-light mr-1 mb-1">genre</span>
                                    </div>
                                </div>
                                <div class="row mt-3 justify-content-center">
                                    <div class="col">
                                        <button href="#" type="button" class="btn btn-sm btn-info">Lihat Detail</button>
                                    </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- End of Book Card -->
                      <!-- Book card -->
                      <div class="col-lg-4">
                        <div class="card card-teal card-outline">
                          <div class="card-body">
                            <div class="row">
                              <div class="col-sm-5 bg-info">
                                
                              </div>
                              <div class="col-sm-7">
                                <h6 class="card-title">Zrul Tempest</h6>
                  
                                <p class="card-text">Azriel Zidane</p>
                                <div class="row jusify-content-center">
                                    <div class="col">
                                        <span class="badge badge-danger mr-1 mb-1">genre</span>
                                        <span class="badge badge-warning mr-1 mb-1">genre</span>
                                        <span class="badge badge-success mr-1 mb-1">genre</span>
                                        <span class="badge badge-light mr-1 mb-1">genre</span>
                                        <span class="badge badge-light mr-1 mb-1">genre</span>
                                        <span class="badge badge-light mr-1 mb-1">genre</span>
                                        <span class="badge badge-light mr-1 mb-1">genre</span>
                                    </div>
                                </div>
                                <div class="row mt-3 justify-content-center">
                                    <div class="col">
                                        <button href="#" type="button" class="btn btn-sm btn-info">Lihat Detail</button>
                                    </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- End of Book Card -->
                      <!-- Book card -->
                      <div class="col-lg-4">
                        <div class="card card-teal card-outline">
                          <div class="card-body">
                            <div class="row">
                              <div class="col-sm-5 bg-info">
                                
                              </div>
                              <div class="col-sm-7">
                                <h6 class="card-title">Zrul Tempest</h6>
                  
                                <p class="card-text">Azriel Zidane</p>
                                <div class="row jusify-content-center">
                                    <div class="col">
                                        <span class="badge badge-danger mr-1 mb-1">genre</span>
                                        <span class="badge badge-warning mr-1 mb-1">genre</span>
                                        <span class="badge badge-success mr-1 mb-1">genre</span>
                                        <span class="badge badge-light mr-1 mb-1">genre</span>
                                        <span class="badge badge-light mr-1 mb-1">genre</span>
                                        <span class="badge badge-light mr-1 mb-1">genre</span>
                                        <span class="badge badge-light mr-1 mb-1">genre</span>
                                    </div>
                                </div>
                                <div class="row mt-3 justify-content-center">
                                    <div class="col">
                                        <button href="#" type="button" class="btn btn-sm btn-info">Lihat Detail</button>
                                    </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- End of Book Card -->
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
          <!-- /.col-md-12 -->
        </div>
        <!-- /.row -->
    </div>
  </section>
@endsection