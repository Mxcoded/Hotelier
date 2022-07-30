<!-- ======= Top Bar ======= -->
<div id="topbar" class="d-flex align-items-center fixed-top">
    <div class="container d-flex align-items-center justify-content-center justify-content-md-between">
        <div class="align-items-center d-none d-md-flex">
            <i class="bi bi-clock"></i>Disponible du Lundi - Samedi, 8AM  24/24h
            <?php echo date('d/m/Y, H:i') ?>
        </div>
        
        <div class="d-flex align-items-center">
            <i class="bi bi-phone"></i> Appellez-nous (+226) 57 64 46 96 / 61 84 99 19
        </div>
    </div>
</div>

<!-- ======= Header ======= -->
<header id="header" class="fixed-top copyright">
    <div class="container d-flex align-items-center">

        <a href="/" class="logo me-auto"><img src="{{ asset('frontend/medico/img/logo_esi.jpg') }}" alt=""></a>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <h1 class="logo me-auto"><a href="index.html">Medicio</a></h1> -->

        <nav id="navbar" class="navbar order-last order-lg-0">
            <ul>
                <li><a class="nav-link scrollto " href="/">Home</a></li>
                <li class="dropdown"><a href="{{ route('activites.index') }}"><span>Activités</span> </a>
                     {{-- <ul>
                        <li><a href="#">Activités 1</a></li>
                        <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-right"></i></a>
                            <ul>
                                <li><a href="#">Deep Drop Down 1</a></li>
                                <li><a href="#">Deep Drop Down 2</a></li>
                                <li><a href="#">Deep Drop Down 3</a></li>
                                <li><a href="#">Deep Drop Down 4</a></li>
                                <li><a href="#">Deep Drop Down 5</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Drop Down 2</a></li>
                        <li><a href="#">Drop Down 3</a></li>
                        <li><a href="#">Drop Down 4</a></li>
                    </ul> --}}
                </li> 

                <li><a class="nav-link scrollto" href="{{ route('programme.index') }}">Programmes</a></li>
                <li><a class="nav-link scrollto" href="{{ route('annonces') }}">Annonces</a></li>
                <li><a class="nav-link scrollto" href="{{ route('bureau.esi') }}"> Bureau des Etudiants </a></li>
            
                <!-- <li><a class="nav-link scrollto" href="#doctors">Structures</a></li> -->
                <li><a id="about" class="nav-link scrollto" href="/about">A Propos </a></li>
                @guest
                <li><a class="nav-link scrollto" href="{{ route('login') }}"><i class="fa lg fa-user-lock"> </i> </a></li>
                @else
                <li class="dropdown"><a href="#"><span>{{ Auth::user()->name }}</span> <i class="fas fa-hospital-user"></i></a>
                    <ul>
                        <li><a href="#">Mon profile</a></li>
                        <li>
                            <a onClick="event.preventDefault(); document.getElementById('deconnexion').submit()" class=""
                                href="">
                                Déconnexion</a>

                            <form method="post" id="deconnexion" action="{{ route("logout") }}">
                                @csrf
                                @method('post')
                            </form>
                        </li>
                    </ul>
                </li>
                @endguest
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->
    </div>
</header><!-- End Header -->