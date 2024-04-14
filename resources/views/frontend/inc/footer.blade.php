<div class="footer container-fluid position-relative bg-dark bg-light-radial text-white-50 py-6 px-5">
    <div class="row g-5">
        <div class="col-lg-6 pe-lg-5">
            <a href="index.html" class="navbar-brand">
                <h1 class="m-0 display-4 text-white"><img src="/img/header-logo.png" alt="logo" height="120"></h1>
            </a>
            <p>Aliquyam sed elitr elitr erat sed diam ipsum eirmod eos lorem nonumy. Tempor sea ipsum diam  sed clita dolore eos dolores magna erat dolore sed stet justo et dolor.</p>
            <p><i class="fa fa-map-marker-alt me-2"></i>123 Street, New York, USA</p>
            <p><i class="fa fa-phone-alt me-2"></i>+012 345 67890</p>
            <p><i class="fa fa-envelope me-2"></i>info@example.com</p>
            <div class="d-flex justify-content-start mt-4">
                <a class="btn btn-lg btn-primary btn-lg-square rounded-0 me-2" href="#"><i class="fab fa-twitter"></i></a>
                <a class="btn btn-lg btn-primary btn-lg-square rounded-0 me-2" href="#"><i class="fab fa-facebook-f"></i></a>
                <a class="btn btn-lg btn-primary btn-lg-square rounded-0 me-2" href="#"><i class="fab fa-linkedin-in"></i></a>
                <a class="btn btn-lg btn-primary btn-lg-square rounded-0" href="#"><i class="fab fa-instagram"></i></a>
            </div>
        </div>
        <div class="col-lg-6 ps-lg-5">
            <div class="row g-5">
                <div class="col-sm-6">
                    <h4 class="text-white text-uppercase mb-4">Liens rapide</h4>
                    <div class="d-flex flex-column justify-content-start">
                        <a class="text-white-50 mb-2" href="{{ route('home') }}"><i class="fa fa-angle-right me-2"></i>Acceuil</a>
                        <a class="text-white-50 mb-2" href="{{ route('about') }}"><i class="fa fa-angle-right me-2"></i>A Propos</a>
                        <a class="text-white-50 mb-2" href="{{ route('service') }}"><i class="fa fa-angle-right me-2"></i>Nos Services</a>
                        <a class="text-white-50 mb-2" href="{{ route('team') }}"><i class="fa fa-angle-right me-2"></i>Notre équipe</a>
                        <a class="text-white-50" href="{{ route('contact') }}"><i class="fa fa-angle-right me-2"></i>Nous Contacter</a>
                    </div>
                </div>
                <div class="col-sm-6">
                    <h4 class="text-white text-uppercase mb-4">Liens Populaire</h4>
                    <div class="d-flex flex-column justify-content-start">
                        <a class="text-white-50 mb-2" href="{{ route('testimonial') }}"><i class="fa fa-angle-right me-2"></i>Témoignage</a>
                        <a class="text-white-50 mb-2" href="{{ route('project') }}"><i class="fa fa-angle-right me-2"></i>Nos Projets</a>
                        <a class="text-white-50 mb-2" href="{{ route('blog') }}"><i class="fa fa-angle-right me-2"></i>Nos Articles</a>
                    </div>
                </div>
                <div class="col-sm-12">
                    <h4 class="text-white text-uppercase mb-4">Newsletter</h4>
                    <form class="w-100" action="{{ route('newsletter') }}" method="POST">
                        @csrf

                        <div class="input-group">
                            <input type="email" name="email" class="form-control border-light" style="padding: 20px 30px;" placeholder="Votre Adresse Email"><button class="btn btn-primary px-4">S'abonnez</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid bg-dark bg-light-radial text-white border-top border-primary px-0">
    <div class="d-flex flex-column flex-md-row justify-content-between">
        <div class="py-4 px-5 text-center text-md-start">
            <p class="mb-0">&copy; <a class="text-primary" href="#">Your Site Name</a>. All Rights Reserved.</p>
        </div>
        <div class="py-4 px-5 bg-primary footer-shape position-relative text-center text-md-end">
            @guest
                <p class="mb-0">
                    <a class="text-dark" href="{{ route('login') }}">Se connecter</a>
                </p>        
            @endguest

            @auth
                <p class="mb-0">
                    <a class="text-dark" href="{{ route('dashboard') }}">Dashboard</a>
                </p>
            @endauth
        </div>
    </div>
</div>