<header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
        <a href="{{route('home.index')}}" class="logo d-flex align-items-center">
            <img src="assets/img/logo.png" alt="">
            <span class="d-none d-lg-block">Bank Sampah</span>

        </a>
        <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <div class="search-bar">
        <form class="search-form d-flex align-items-center" method="POST" action="#">
            <input type="text" name="query" placeholder="Search" title="Enter search keyword">
            <button type="submit" title="Search"><i class="bi bi-search"></i></button>
        </form>
    </div><!-- End Search Bar -->

    <nav class="header-nav ms-auto">
        <ul class="d-flex align-items-center">

            <li class="nav-item d-block d-lg-none">
                <a class="nav-link nav-icon search-bar-toggle " href="#">
                    <i class="bi bi-search"></i>
                </a>
            </li><!-- End Search Icon-->


            @if (!isset(auth()->user()->nama))
<li class="nav-item mr-4 ">
<a href="{{route('login')}}" class="btn btn-primary">Login</a>
<a href="{{route('registrasi')}}" class="btn btn-warning">Daftar</a>


</li>
@endif
@if (isset(auth()->user()->nama))
<li class="nav-item dropdown pe-3">

    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
        <img src="{{Storage::url(auth()->user()->foto)}}"  alt="Profile" class="rounded-circle">
        <span class="d-none d-md-block dropdown-toggle ps-2">
            @if (isset( auth()->user()->nama))
                
            
            {{  auth()->user()->nama }}
            @endif
        
        
        </span>
        
    </a><!-- End Profile Iamge Icon -->

    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
        <li class="dropdown-header">
            <h6>   @if (isset(auth()->user()->nama))
                
            
                {{  auth()->user()->nama }}
                @endif</h6>

        </li>
        <li>
            <hr class="dropdown-divider">
        </li>

        <li>
            <a class="dropdown-item d-flex align-items-center" href="{{route('profile', auth()->user()->username)}}">
                <i class="bi bi-person"></i>
                <span>My Profile</span>
            </a>
        </li>


            @if (auth()->user()->role == "Penjual")
            <li>
                <hr class="dropdown-divider">
            </li>

            <li>
                <a class="dropdown-item d-flex align-items-center" href="{{route('penjemputan.riwayat')}}">
                    <i class="bi bi-person"></i>
                    <span>Riwayat Penjemputan</span>
                </a>
            </li>
            @endif

            @if (auth()->user()->role == "Pengepul")
                
     

            <li>
                <hr class="dropdown-divider">
            </li>
    
            <li>
                <a class="dropdown-item d-flex align-items-center" href="{{route('dashboard')}}">
                    <i class="bi bi-grid-fill"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li>

                @endif

            <hr class="dropdown-divider">
        </li>

        
        <button type="button" class="dropdown-item d-flex align-items-center" data-bs-toggle="modal"
            data-bs-target="#logout">
            <i class="bi bi-box-arrow-right"></i>
            <span>Sign Out</span>
        </button>
</li>

@endif
           
        </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

        </ul>
    </nav><!-- End Icons Navigation -->

</header>
