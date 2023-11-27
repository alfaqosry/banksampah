@extends('layouts.app-home')
@section('index_show', 'show')
@section('content')


    <main id="main" class="main ">




        <section class="section">
            <div class="row align-items-top">

                <div class="col-12">

                    @if(session('sukses'))
                    <div class="alert alert-success bg-success text-light border-0 alert-dismissible fade show" role="alert">
                      {{session('sukses')}}
                      <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
        
                    @endif 
                    @if(session('gagal'))

                    <div class="alert alert-danger bg-danger text-light border-0 alert-dismissible fade show" role="alert">
                      {{session('gagal')}}
                      <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                   
                    @endif  
                    {{-- <div class="card">



                        <!-- Slides with captions -->
                        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-indicators">
                                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0"
                                    class="active" aria-current="true" aria-label="Slide 1"></button>
                                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                                    aria-label="Slide 2"></button>
                                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                                    aria-label="Slide 3"></button>
                            </div>
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="{{ asset('frontend/assets/img/slides-1.jpg') }}" class="d-block w-100"
                                        alt="...">
                                    <div class="carousel-caption d-none d-md-block">
                                        <h5>First slide label</h5>
                                        <p>Some representative placeholder content for the first slide.</p>
                                    </div>
                                </div>

                                <div class="carousel-item">
                                    <img src="{{ asset('frontend/assets/img/slides-2.jpg') }}" class="d-block w-100"
                                        alt="...">
                                    <div class="carousel-caption d-none d-md-block">
                                        <h5>Second slide label</h5>
                                        <p>Some representative placeholder content for the second slide.</p>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <img src="{{ asset('frontend/assets/img/slides-3.jpg') }}" class="d-block w-100"
                                        alt="...">
                                    <div class="carousel-caption d-none d-md-block">
                                        <h5>Third slide label</h5>
                                        <p>Some representative placeholder content for the third slide.</p>
                                    </div>
                                </div>
                            </div>

                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                                data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                                data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>

                        </div><!-- End Slides with captions -->


                    </div> --}}

                </div>

                <div class="row">
                    <div class="pagetitle">
                        <h1>Rekomendasi Pengepul</h1>
                    </div>
                </div>

                @foreach ($user as $itemuser)
                    <div class="col-lg-4">

                        <!-- Card with an image on top -->
                        <div class="card">


                            <div class="card-body">
                                <div class="row">

                                    <div class="col-6 nav-profile d-flex align-items-center ">
                                        <img src="{{Storage::url($itemuser->foto)}}" style="width: 120px;height: 120px;" class="rounded-circle"
                                            alt="...">
                                    </div>
                                    <div class="col-6">




                                        <h5 class="card-title"> <a href="{{route('profile', $itemuser->username)}}">{{$itemuser->nama}}</a></h5>
                                        <p class="card-text"><i class="bx bxs-location-plus"></i> {{ $itemuser->alamat }}
                                        </p>

                                        @if (isset(auth()->user()->id))
                                            <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#ajukanjemput"
                                                data-bs-iduser="{{ auth()->user()->id }}"
                                                data-bs-idpengepul="{{ $itemuser->id }}"
                                                data-bs-nama="{{ $itemuser->nama }}">
                                                Ajukan
                                                Penjemputan
                                            </button>
                                        @else
                                            <a href="{{route('login')}}" class="btn btn-sm btn-primary">
                                                Ajukan
                                                Penjemputan
                                            </a>
                                        @endif

                                    </div>
                                </div>

                            </div>

                        </div><!-- End Card with an image on top -->

                    </div>
                @endforeach




                <div class="row">
                    <div class="pagetitle">
                        <h1>Daftar Sampah</h1>
                    </div>
                </div>

                @foreach ($sampah as $itemsampah)
                    <div class="col-lg-4">

                        <!-- Card with an image on top -->
                        <div class="card">
                            <div class="row">

                                <div class="col-6">
                                    <img src="{{Storage::url($itemsampah->foto)}}" class="card-img-top"
                                        alt="...">
                                </div>
                                <div class="col-6">

                                    <div class="card-body">




                                        <h5 class="card-title">{{ $itemsampah->nama_sampah }}</h5>
                                        <p class="card-text">Rp. {{ $itemsampah->harga_jual }} /
                                            {{ $itemsampah->satuan }}
                                        </p>
                                    </div>
                                </div>

                            </div>

                        </div><!-- End Card with an image on top -->

                    </div>
                @endforeach






            </div>
        </section>

        <!-- Vertically centered Modal -->

        <div class="modal fade" id="ajukanjemput" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="title-penjemputan"></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form class="row g-3 needs-validation" id="formedit" action="{{ route('ajukan.post') }}"
                            method="post" enctype="multipart/form-data" novalidate>
                            {{ csrf_field() }}

                            <div class="col-md-12 position-relative">

                                <input type="hidden" id="iduser" name="pengguna_id">
                                <input type="hidden" id="idpengepul" name="pengepul_id">

                                <div class="row-12 mt-3">
                                    <label for="pesanmodal" class="form-label">Pesan</label>
                                    <div class="input-group has-validation">
                                        <textarea name="pesan" id="pesan" style="height: 100px;"
                                            class="form-control @error('pesan') is-invalid @enderror"></textarea>

                                        @error('pesan')
                                            <div id="pesanmodalFeedback" class="invalid-tooltip">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button class="btn btn-primary" type="submit">Ajukan</button>
                    </div>
                    </form><!-- End Custom Styled Validation with Tooltips -->


                </div>
            </div>
        </div><!-- End Vertically centered Modal-->
    </main><!-- End #main -->
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script>
        const exampleModal = document.getElementById('ajukanjemput')
        exampleModal.addEventListener('show.bs.modal', event => {
            // Button that triggered the modal
            const button = event.relatedTarget
            // Extract info from data-bs-* attributes
            const id_user = button.getAttribute('data-bs-iduser')
            const id_pengepul = button.getAttribute('data-bs-idpengepul')
            const nama = button.getAttribute('data-bs-nama')

            const link = button.getAttribute('data-bs-link')



            //   const form =  exampleModal.querySelector('#formedit')
            const modalTitle = exampleModal.querySelector('#title-penjemputan')
            const modalBodyInput = exampleModal.querySelector('.modal-footer a')

            $("#iduser").val(id_user)
            $("#idpengepul").val(id_pengepul)

            console.log(nama);

            modalTitle.textContent = 'Ajukan Penjemputan ke ' + nama
            // //   modalBodyInput.href = "http://127.0.0.1:8000/pengumuman/delete/"+recipient
            //   console.log(link);
        });
    </script>

@endsection
