    <!-- Topbar Start -->
    <div class="container-fluid px-5 d-none d-lg-block">
        <div class="row gx-5">
            <div class="col-lg-4 text-center py-3">
                <div class="d-inline-flex align-items-center">
                    <i class="bi bi-geo-alt fs-1 text-primary me-3"></i>
                    <div class="text-start">
                        <h6 class="text-uppercase fw-bold">Notre Bureau</h6>
                        <span>123 Street, New York, USA</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 text-center border-start border-end py-3">
                <div class="d-inline-flex align-items-center">
                    <i class="bi bi-envelope-open fs-1 text-primary me-3"></i>
                    <div class="text-start">
                        <h6 class="text-uppercase fw-bold">Email Nous</h6>
                        <span>info@example.com</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 text-center py-3">
                <div class="d-inline-flex align-items-center">
                    <i class="bi bi-phone-vibrate fs-1 text-primary me-3"></i>
                    <div class="text-start">
                        <h6 class="text-uppercase fw-bold">Appelez Nous</h6>
                        <span>+012 345 6789</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->

    @php
        $navActive = request()->route()->getName();
        $dropDownActive = ($navActive === 'testimonial' || $navActive === 'blog') ? 'active' : '';
    @endphp

    <!-- Navbar Start -->
    <div class="container-fluid sticky-top bg-dark bg-light-radial shadow-sm px-5 pe-lg-0">
        <nav class="navbar navbar-expand-lg bg-dark bg-light-radial navbar-dark py-3 py-lg-0">
            <a href="{{ route('home') }}" class="navbar-brand">
                <h1 class="m-0 display-4 text-white"><img src="/img/header-logo.png" height="120" alt="logo"></h1>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto py-0">
                    <a href="{{ route('home') }}" class="nav-item nav-link {{ $navActive === 'home' ? 'active' : '' }}">Acceuil</a>
                    <a href="{{ route('about') }}" class="nav-item nav-link {{ $navActive === 'about' ? 'active' : '' }}">A Propos</a>
                    <a href="{{ route('service') }}" class="nav-item nav-link {{ $navActive === 'service' ? 'active' : '' }}">Services</a>
                    <a href="{{ route('project') }}" class="nav-item nav-link {{ $navActive === 'project' ? 'active' : '' }}">Projets</a>
                    <a href="{{ route('team') }}" class="nav-item nav-link {{ $navActive === 'team' ? 'active' : '' }}">équipe</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle {{ $dropDownActive }}" data-bs-toggle="dropdown">Pages</a>
                        <div class="dropdown-menu m-0">
                            <a href="{{ route('testimonial') }}" class="dropdown-item {{ $navActive === 'testimonial' ? 'active' : '' }}">Témoignage</a>
                            <a href="{{ route('blog') }}" class="dropdown-item {{ $navActive === 'blog' ? 'active' : '' }}">Articles</a>
                        </div>
                    </div>
                    <a href="{{ route('contact') }}" class="nav-item nav-link me-3 {{ $navActive === 'contact' ? 'active' : '' }}">Contact</a>
                </div>
            </div>
        </nav>
    </div>
    <!-- Navbar End -->