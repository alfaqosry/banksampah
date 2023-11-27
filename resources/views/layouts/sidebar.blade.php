<aside id="sidebar" class="sidebar">

  <ul class="sidebar-nav" id="sidebar-nav">


    <li class="nav-heading">{{auth()->user()->role}}</li>

    @if (auth()->user()->role == "Pengepul")

    <li class="nav-item">
      <a class="nav-link @if ( $title != 'Dasboard')
                collapsed
                @endif" href="{{route('dashboard')}}">
                <i class="bi bi-grid-fill"></i>
        <span>Dashboard</span>
      </a>
    </li><!-- End Profile Page Nav -->
    
    @php
      $count=DB::table('penjemputans')->where('pengepul_id', auth()->user()->id)->count();
    @endphp

    <li class="nav-item">
      <a class="nav-link @if ( $title != 'Penjemputan')
                collapsed
                @endif" href="{{route('penjemputan.index')}}">
                <i class="ri-account-pin-circle-fill"></i>
        <span>Penjemputan</span><span class="badge bg-danger ">{{$count}}</span>
      </a>
    </li><!-- End Profile Page Nav -->

    <li class="nav-item">
      <a class="nav-link @if ( $title != 'Transaksi')
                collapsed
                @endif" href="{{route('transaksi.index')}}">
                <i class="bi bi-currency-dollar"></i>
        <span>Transaksi</span>
      </a>
    </li><!-- End Profile Page Nav -->


@endif




@if (auth()->user()->role == "Petugas")

<li class="nav-item">
  <a class="nav-link @if ( $title != 'Dasboard')
            collapsed
            @endif" href="{{route('dashboard')}}">
            <i class="bi bi-grid-fill"></i>
    <span>Dashboard</span>
  </a>
</li><!-- End Profile Page Nav -->


<li class="nav-item">
  <a class="nav-link @if ( $title != 'Sampah')
            collapsed
            @endif" href="{{route('sampah')}}">
            <i class="bi bi-inboxes"></i>
    <span>Sampah</span>
  </a>
</li>


<li class="nav-item">
  <a class="nav-link @if ( $title != 'Setor Sampah')
            collapsed
            @endif" href="{{route('setor.index')}}">
            <i class="bi bi-inboxes"></i>
    <span>Setor Sampah</span>
  </a>
</li><!-- End Profile Page Nav -->

<li class="nav-item">
  <a class="nav-link @if ( $title != 'User')
            collapsed
            @endif" href="{{route('user')}}">
            <i class="bi bi-people"></i>
    <span>User</span>
  </a>
</li><!-- End Profile Page Nav -->


@endif
  </ul>

</aside>