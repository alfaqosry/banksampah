@extends('layouts.app')
@section('index_show', 'show')
@section('content')

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>{{ $title }}</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active">{{ $title }}</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="row">

                <!-- Left side columns -->
                <div class="col-lg-12">
                    <div class="row">

                        <div class="col-lg-12">

                         

                            @if (session('sukses'))
                                <div class="alert alert-success bg-success text-light border-0 alert-dismissible fade show"
                                    role="alert">
                                    {!! session('sukses') !!}
                                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif
                                <div class="row justify-content-center align-items-center g-2">
                                      <!-- Revenue Card -->
            <div class="col-xxl-12 col-md-12">
                <div class="card info-card revenue-card">
  
                  
  
                  <div class="card-body">
                    <h5 class="card-title">Saldo </h5>
  
                    <div class="d-flex align-items-center">
                      <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="bi bi-currency-dollar"></i>
                      </div>
                      <div class="ps-3">
                        <h6>Rp. {{$saldo}}</h6>
                  
  
                      </div>
                    </div>
                  </div>
  
                </div>
              </div><!-- End Revenue Card -->
  
                                </div>


                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $title }}</h5>

                                    <!-- Default Table -->
                                    <table class="table table-hover table-bordered">
                                        <thead>
                                            <tr>
                                                <th>NO</th>
                                                <th>Tanggal</th>
                                                <th>Jenis Transaksi</th>
                                                <th>Id Transaksi</th>
                                                <th>Jumlah Transaksi</th>
                                                <th>Status</th>
                                           
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach ($transaksi as $item)
                                            
                                            
                                                        <tr>
                                                           
                                                            <td scope="row">{{ $loop->iteration }}</td>
                                                            <td>{{$item->created_at}}</td>
                                                            <td>
                                                                @if ($item->jenis_transaksi == "Pemasukan")
                                                                <span class="badge rounded-pill bg-success">{{$item->jenis_transaksi}}</span>

                                                                @elseif ($item->jenis_transaksi == "Pengeluaran")

                                                                <span class="badge rounded-pill bg-danger">{{$item->jenis_transaksi}}</span>

                                                                @elseif ($item->jenis_transaksi == "Pending")
                                                                <span class="badge rounded-pill bg-warning">Pending</span>
                                                                @endif
                                                            
                                                            </td>
                                                            <td> {{ $item->id_transaksi }}</td>
                                                            <td>Rp. {{ $item->jmlh_transaksi}}</td>
                                                           
                                                            
                                                            <td>
                                                                @if ($item->status == "Berhasil")
                                                                <span class="badge rounded-pill bg-success">Berhasil</span>

                                                                @elseif ($item->status == "Gagal")

                                                                <span class="badge rounded-pill bg-danger">Gagal</span>

                                                                @elseif ($item->status == "Pending")
                                                                <span class="badge rounded-pill bg-warning">Pending</span>
                                                                @endif

                                                            </td>
                                                         
                                                        </tr>
                                                
                                            @endforeach

                                        </tbody>
                                    </table>
                                    <!-- End Default Table Example -->
                                </div>
                            </div>

                        </div>
                    </div><!-- End Left side columns -->





                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Pengumuman</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p>Apakah Anda yakin ingin menghapus pengumuman ini</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <a href="" class="btn btn-primary">Hapus</a>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
        </section>

    </main>

    <script>
        const exampleModal = document.getElementById('exampleModal')
        exampleModal.addEventListener('show.bs.modal', event => {
            // Button that triggered the modal
            const button = event.relatedTarget
            // Extract info from data-bs-* attributes
            const recipient = button.getAttribute('data-bs-id')
            // If necessary, you could initiate an AJAX request here
            // and then do the updating in a callback.
            //
            // Update the modal's content.
            const modalTitle = exampleModal.querySelector('.modal-title')
            const modalBodyInput = exampleModal.querySelector('.modal-footer a')

            modalTitle.textContent = "Hapus Pengumuman"
            modalBodyInput.href = "http://127.0.0.1:8000/pengumuman/delete/" + recipient
            console.log(modalBodyInput.href);
        })
    </script>

@endsection
