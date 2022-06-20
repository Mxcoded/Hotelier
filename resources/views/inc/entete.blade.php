<!-- ======= Top Bar ======= -->
<div id="topbar" class="d-flex align-items-center fixed-top">
    <div class="container d-flex align-items-center justify-content-center justify-content-md-between">
        <div class="align-items-center d-none d-md-flex">
            <i class="bi bi-clock"></i> Monday - Saturday, 8AM to 10PM
            <?php echo date('d/m/Y, H:i') ?>
        </div>
        <div class="d-flex align-items-center">
            <i class="bi bi-phone"></i> Appellez-nous +1 5589 55488 55
        </div>
    </div>
</div>

<!-- ======= Header ======= -->
<header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

        <a href="index.html" class="logo me-auto"><img src="{{ asset('frontend/medico/img/logo.png') }}" alt=""></a>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <h1 class="logo me-auto"><a href="index.html">Medicio</a></h1> -->

        <nav id="navbar" class="navbar order-last order-lg-0">
            <ul>
                <li><a class="nav-link scrollto " href="#hero">Home</a></li>
                <li><a class="nav-link scrollto" href="#about">Programmes</a></li>
                <li><a class="nav-link scrollto" href="#services">Services</a></li>
                <li><a class="nav-link scrollto" href="#departments">Annonces</a></li>
                <li><a class="nav-link scrollto" href="#doctors">Structures</a></li>
                <li class="dropdown"><a href="#"><span>Activités</span> <i class="bi bi-chevron-down"></i></a>
                    <ul>
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
                    </ul>
                </li>
                <li><a class="nav-link scrollto" href="#contact">About</a></li>
                @guest
                <li><a class="nav-link scrollto" href="{{ route('login') }}"><i class="fa lg fa-user-lock"> </i> </a></li>
                @else
                <li class="dropdown"><a href="#"><span>{{ Auth::user()->name }}</span> <i class="bi bi-chevron-down"></i></a>
                    <ul>
                        <li><a href="#">Mon profile</a></li>
                        <li>
                            <a onClick="event.preventDefault(); document.getElementById('deconnexion').submit()" class=""
                                href="">
                                <i class="fa fa-power-off"></i>
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