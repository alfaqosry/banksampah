@extends('layouts.app')
@section('index_show', 'show')
@section('content')
<main id="main" class="main">


    <div class="pagetitle">
        <h1>Edit {{$sampah->nama_sampah}}</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">{{$title}}</li>
                <li class="breadcrumb-item active">Edit {{$sampah->nama_sampah}}</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="form-group mb-3">
                <a href="{{route('sampah')}}" class="btn btn-warning btn-sm"><i class="bi bi-arrow-left-circle"></i>
                    Kembali</a>
            </div>

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Edit {{$sampah->nama_sampah}}</h5>

                    <!-- Custom Styled Validation with Tooltips -->
                    <form class="row g-3 needs-validation" action="{{ route('sampah.update', $sampah->id) }}" method="post"
                    enctype="multipart/form-data" novalidate>
                    {{ csrf_field() }}

                    <div class="col-md-12 position-relative">

                        <div class="row">
                            <label for="nama_sampah" class="form-label">Nama Sampah</label>
                            <div class="input-group has-validation">
                            <input type="text" class="form-control @error('nama_sampah') is-invalid @enderror "
                                name="nama_sampah" id="nama_sampah" aria-describedby="nama_sampahPrepend" value="{{ $sampah->nama_sampah }}">
                            {{-- <div class="valid-tooltip">
                                Looks good!
                            </div> --}}
                            @error('nama_sampah')
                            <div id="nama_sampahFeedback" class="invalid-tooltip">
                                {{ $message }}
                            </div>
                            @enderror
                            </div>
                        </div>


                        <div class="col-md-12 position-relative">
                            <div class="row">
                                <label for="jenis_sampah" class="form-label">Jenis Sampah</label>
                                <div class="input-group has-validation">

                                    <select class="form-select select2 @error('jenis_sampah') is-invalid @enderror" id="jenis_sampah" name="jenis_sampah">
                                        <option>{{$sampah->jenis_sampah}}</option>

                                    
                                        <option>Organik</option>
                                        <option>Non Organik</option>
                                 
                                    </select>

                                    @error('jenis_sampah')
                                    <div id="jenis_sampahFeedback" class="invalid-tooltip">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>

                      


                    <div class="col-md-12 position-relative">
                        <div class="row">
                            <label for="satuan" class="form-label">Satuan</label>
                            <div class="input-group has-validation">

                                <select class="form-select select2 @error('satuan') is-invalid @enderror" id="satuan" name="satuan">
                                    <option >{{$sampah->satuan}}</option>

                                
                                    <option>Kg</option>
                                    <option>Meter</option>
                                
                                </select>

                                @error('satuan')
                                <div id="satuanFeedback" class="invalid-tooltip">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>


                        <div class="row">
                            <label for="harga" class="form-label">Harga Dasar</label>
                            <div class="input-group has-validation">
                            <input type="text" class="form-control @error('harga') is-invalid @enderror "
                                name="harga_dasar" id="harga" aria-describedby="hargaPrepend" value="{{ $sampah->harga_dasar }}">
                            {{-- <div class="valid-tooltip">
                                Looks good!
                            </div> --}}
                            @error('harga')
                            <div id="hargaFeedback" class="invalid-tooltip">
                                {{ $message }}
                            </div>
                            @enderror
                            </div>
                        </div>


                        <div class="row">
                            <label for="harga_jual" class="form-label">Harga Jual</label>
                            <div class="input-group has-validation">
                            <input type="text" class="form-control @error('harga_jual') is-invalid @enderror "
                                name="harga_jual" id="harga_jual" aria-describedby="harga_jualPrepend" value="{{ $sampah->harga_jual }}">
                            {{-- <div class="valid-tooltip">
                                Looks good!
                            </div> --}}
                            @error('harga_jual')
                            <div id="harga_jualFeedback" class="invalid-tooltip">
                                {{ $message }}
                            </div>
                            @enderror
                            </div>
                        </div>


                        <div class="row">

                            
                            <label for="foto" class="form-label">Foto</label>
                            <div class="input-group has-validation">
                                <input class="form-control" type="file" name="foto" value="{{ $sampah->foto }}">
                            {{-- <div class="valid-tooltip">
                                Looks good!
                            </div> --}}
                            @error('foto')
                            <div id="fotoFeedback" class="invalid-tooltip">
                                {{ $message }}
                            </div>
                            @enderror
                            </div>
                        </div>
                    

                    <div class="col-12 mt-4">
                        <button class="btn btn-primary" type="submit">Simpan</button>
                    </div>
                </form><!-- End Custom Styled Validation with Tooltips -->


                </div>
            </div>

        </div>
        </div>
    </section>

</main><!-- End #main -->



@endsection