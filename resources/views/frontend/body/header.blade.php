<nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
            <div class="container" id="navbar_container">
                <a class="navbar-brand" href="{{url('/')}}"><img src="{{ asset('frontend/assets/images/navbar-logo.png') }}" alt="..." /></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars ms-1"></i>
                </button>
                
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav text-uppercase ms-auto py-0 py-lg-0">
                        <li class="nav-item"><a class="nav-link {{ Request::is('news') ? 'active' : '' }}" href="{{ url('/') }}#news">Berita</a></li>
                        <li class="nav-item"><a class="nav-link {{ Request::is('/') ? 'active' : '' }}" href="{{ url('/') }}#consultation">Konsultasi</a></li>
                        <li class="nav-item"><a class="nav-link {{ Request::is('team') ? 'active' : '' }}" href="{{ url('/team') }}">Tim PKBH</a></li>
                        <li class="nav-item"><a class="nav-link {{ Request::is('client') ? 'active' : '' }}" href="{{ url('/client') }}">Klien</a></li>
                        <div class="col-lg-4 col-md-4" id="search_bar">
                            <form class="header-search" action="{{ route('news.search') }}" method="post">
                                @csrf 
                                <input type="text" value="" name="search" placeholder="PENCARIAN" required="">
                                <button type="submit" value="Search"> <i class="las la-search"></i> </button>
                            </form>
                        </div>
                    </ul>

                    
                </div>
            </div>
        </nav>
<div id="myHeader">

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('frontend/assets/js/scripts.js') }}"></script>