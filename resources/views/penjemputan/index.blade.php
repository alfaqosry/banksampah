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



                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $title }}</h5>

                                    <!-- Default Table -->
                                    <table class="table table-hover table-bordered">
                                        <thead>
                                            <tr>
                                                <th>NO</th>
                                                <th>Tanggal</th>
                                                <th>Nama Penjual</th>
                                                <th>No Telepon</th>
                                                <th>Email</th>
                                                <th>Alamat</th>
                                                <th>Pesan</th>
                                                <th>Status</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach ($penjemputan as $item)
                                            
                                            
                                                        <tr>
                                                           
                                                            <td scope="row">{{ $loop->iteration }}</td>
                                                            <td>{{$item->created_at}}</td>
                                                            <td>{{ $item->nama }}</td>
                                                            <td> {{ $item->no_tlpn }}</td>
                                                            <td> {{ $item->email}}</td>
                                                            <td> {{ $item->alamat }}</td>
                                                            <td> {{ $item->pesan }}</td>
                                                            <td>
                                                                @if ($item->status == "Diajukan")
                                                                <span class="badge rounded-pill bg-primary">Dijukan</span>

                                                                @elseif ($item->status == "Diproses")

                                                                <span class="badge rounded-pill bg-secondary">DiProses</span>

                                                                @elseif ($item->status == "Dalam Penjemputan")
                                                                <span class="badge rounded-pill bg-info">Dalam Penjemputan</span>

                                                                @elseif ($item->status == "Selesai")

                                                                <span class="badge rounded-pill bg-succsess">Selesai</span>

                                                                @elseif ($item->status == "Ditolak")
                                                                <span class="badge rounded-pill bg-danger">Ditolak</span>

                                                                @elseif ($item->status == "Dibatalkan Penjual")

                                                                <span class="badge rounded-pill bg-danger">Dibatalkan Penjual</span>
                                                                @endif

                                                            </td>
                                                            <td>
                                                                <div class="btn-group" role="group" aria-label="Basic example">
                                                                <a href="{{ route('penjemputan.terima', $item->id) }}"
                                                                    class="btn btn-success btn-sm"> <i class="bi bi-check2"></i></a>
                                                                <a href="{{ route('penjemputan.tolak', $item->id) }}"
                                                                    class="btn btn-danger btn-sm"
                                                                    onclick="return confirm('Tolak Penjemputan ?')"> <i class="ri-close-line"></i></a>
                                                                </div>
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
