@extends('layouts.app')
@section('index_show', 'show')
@section('content')
<main id="main" class="main">


    <div class="pagetitle">
        <h1>Setor Untuk Pengepul {{$user->nama}}</h1>
       
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="form-group mb-3">
                <a href="{{route('user')}}" class="btn btn-warning btn-sm"><i class="bi bi-arrow-left-circle"></i>
                    Kembali</a>
            </div>

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Setor Sampah</h5>

                    <!-- Custom Styled Validation with Tooltips -->
                    <form class="row g-3 needs-validation" action="{{ route('setor.store') }}" method="post"
                        enctype="multipart/form-data" novalidate>
                        {{ csrf_field() }}

                        <div class="col-md-12 position-relative">

                            <div class="row">


                                
                                    <label for="sampah_id" class="form-label">Sampah</label>
                                    <div class="input-group has-validation">
    
                                        <select class="form-select  @error('sampah_id') is-invalid @enderror"
                        
                                            id="sampah_id" aria-describedby="sampah_idPrepend" name="sampah_id">
                                            <option value="">Choose...</option>
                                           @foreach ($sampah as $itemsampah )
                                               
                                    
                                            <option value="{{$itemsampah->id}}">{{$itemsampah->nama_sampah}}</option>
                                          
                                    
                                            @endforeach
                                        </select>
    
                                        @error('sampah_id')
                                        <div id="sampah_idFeedback" class="invalid-tooltip">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>



                                    <label for="jumlah_sampah" class="form-label">Berat Sampah</label>
                                    <div class="input-group has-validation">
                                    <input type="text" class="form-control @error('jumlah_sampah') is-invalid @enderror "
                                        name="jumlah_sampah" id="jumlah_sampah" aria-describedby="jumlah_sampahPrepend" value="{{ old('jumlah_sampah') }}">
                                    {{-- <div class="valid-tooltip">
                                        Looks good!
                                    </div> --}}
                                    @error('jumlah_sampah')
                                    <div id="jumlah_sampahFeedback" class="invalid-tooltip">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                    </div>

                                    <input type="hidden" value="{{$user->id}}" name="pengepul_id">
                                


                         


                        <div class="form-check">

                        </div>







                        <div class="col-12">
                            <button class="btn btn-primary" type="submit">Setor</button>
                        </div>
                    </form><!-- End Custom Styled Validation with Tooltips -->

                </div>
            </div>

        </div>
        </div>
    </section>

</main><!-- End #main -->

{{-- 
<?php 
$prov_json = json_encode($provider);

 ?>
 <script>
$(document).ready(function(){
  $('#provider').change(function() {


    $(".moduloption").remove();

    var provider_kode = $(this).val();
    var prov = <?= $prov_json ?>;
    

    console.log(prov);

    for (i=0; i<prov.length; i++) {
       if (prov[i]['kode'] == provider_kode) {
        
        var modul = prov[i]['modul'];
       }
    
} 

for (i=0; i<modul.length; i++) {

  $('#modul').append("<option class='moduloption' value='"+ modul[i]['kode'] +"'>"+modul[i]['nama']+"</option>");
       
} 


  });
})
  </script> --}}

@endsection