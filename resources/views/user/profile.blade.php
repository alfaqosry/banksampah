@extends('layouts.app-home')


@section('content')


    <main id="main" class="main">

        <div class="pagetitle">
            <h1>{{ $user->nama }}</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home.index') }}">Home</a></li>
                    <li class="breadcrumb-item active">{{ $user->nama }}</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
        @if (session('sukses'))
            <div class="alert alert-success bg-success text-light border-0 alert-dismissible fade show" role="alert">
                {!! session('sukses') !!}
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <section class="section profile">
            <div class="row">
                <div class="col-xl-4">


                    <div class="card">
                        <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

                            <img src="{{ Storage::url($user->foto) }}" alt="Profile" class="rounded-circle">
                            <h2>{{ $user->nama }}</h2>
                            <h3>{{ $user->role }}</h3>


                            @if (!isset(auth()->user()->username) ||isset(auth()->user()->username) == $user->username )
                                @if (isset(auth()->user()->id))
                                    <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#ajukanjemput" data-bs-iduser="{{ auth()->user()->id }}"
                                        data-bs-idpengepul="{{ $user->id }}" data-bs-nama="{{ $user->nama }}">
                                        Ajukan
                                        Penjemputan
                                    </button>
                                @else
                                    <a href="{{ route('login') }}" class="btn btn-sm btn-primary">
                                        Ajukan
                                        Penjemputan
                                    </a>
                                @endif
                            @endif

                        </div>
                    </div>

                </div>

                <div class="col-xl-8">

                    <div class="card">
                        <div class="card-body pt-3">
                            <!-- Bordered Tabs -->
                            <ul class="nav nav-tabs nav-tabs-bordered">

                                <li class="nav-item">
                                    <button class="nav-link active" data-bs-toggle="tab"
                                        data-bs-target="#profile-overview">Overview</button>
                                </li>

                                @if (isset(auth()->user()->username) && auth()->user()->username == $user->username)
                                    <li class="nav-item">
                                        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit
                                            Profile</button>
                                    </li>



                                    <li class="nav-item">
                                        <button class="nav-link" data-bs-toggle="tab"
                                            data-bs-target="#profile-change-password">Change Password</button>
                                    </li>
                                @endif

                            </ul>
                            <div class="tab-content pt-2">

                                <div class="tab-pane fade show active profile-overview" id="profile-overview">

                                    <h5 class="card-title">Profile Details</h5>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label ">Nama</div>
                                        <div class="col-lg-9 col-md-8">{{ $user->nama }}</div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Alamat</div>
                                        <div class="col-lg-9 col-md-8">{{ $user->alamat }}</div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">No HP</div>
                                        <div class="col-lg-9 col-md-8">{{ $user->no_tlpn }}</div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Email</div>
                                        <div class="col-lg-9 col-md-8">{{ $user->email }}</div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Bergabung Sejak</div>
                                        <div class="col-lg-9 col-md-8">{{ $user->created_at }}</div>
                                    </div>



                                </div>

                                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                                    <!-- Profile Edit Form -->
                                    <form class="row g-3 needs-validation"
                                        action="{{ route('profile.update', $user->id) }}" method="post"
                                        enctype="multipart/form-data" novalidate>
                                        {{ csrf_field() }}
                                        <div class="row mb-3">
                                            <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile
                                                Image</label>
                                            <div class="col-md-8 col-lg-9">
                                                <img src="{{ Storage::url($user->foto) }}" alt="Profile">
                                                <div class="pt-2">
                                                    <input class="form-control" type="file" name="foto"
                                                        value="{{ $user->foto }}">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="nama" class="col-md-4 col-lg-3 col-form-label">Nama</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="nama" type="text" class="form-control" id="nama"
                                                    value="{{ $user->nama }}">
                                            </div>
                                        </div>



                                        <div class="row mb-3">
                                            <label for="no_tlpn" class="col-md-4 col-lg-3 col-form-label">No
                                                Telepon</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="no_tlpn" type="text" class="form-control" id="no_tlpn"
                                                    value="{{ $user->no_tlpn }}">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="email" type="email" class="form-control" id="email"
                                                    value="{{ $user->email }}">
                                            </div>
                                        </div>



                                        <div class="row mb-3">
                                            <label for="alamat" class="col-md-4 col-lg-3 col-form-label">Alamat</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="alamat" type="text" class="form-control" id="alamat"
                                                    value="{{ $user->alamat }}">
                                            </div>
                                        </div>



                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                        </div>
                                    </form><!-- End Profile Edit Form -->

                                </div>



                                <div class="tab-pane fade pt-3" id="profile-change-password">
                                    <!-- Change Password Form -->
                                    <form>

                                        <div class="row mb-3">
                                            <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current
                                                Password</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="password" type="password" class="form-control"
                                                    id="currentPassword">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New
                                                Password</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="newpassword" type="password" class="form-control"
                                                    id="newPassword">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter
                                                New Password</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="renewpassword" type="password" class="form-control"
                                                    id="renewPassword">
                                            </div>
                                        </div>

                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary">Change Password</button>
                                        </div>
                                    </form><!-- End Change Password Form -->

                                </div>

                            </div><!-- End Bordered Tabs -->

                        </div>
                    </div>

                </div>
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
