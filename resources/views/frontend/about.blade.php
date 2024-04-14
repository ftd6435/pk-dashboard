@extends('frontend.frontend')

@section('title', "A propos de")

@section('content')

    {{-- Header starts --}}
    @include('frontend.inc.header')
    {{-- Header ends --}}

    <!-- Page Header Start -->
    @include('frontend.inc.pageHeader', ['headtitle' => 'A Propos de nous', 'title' => 'A Propos'])
    <!-- Page Header Start -->


    <!-- About Start -->
    <div class="container-fluid py-6 px-5">
        <div class="row g-5">
            <div class="col-lg-7">
                <h1 class="display-5 text-uppercase mb-4">We are <span class="text-primary">the Leader</span> in Construction Industry</h1>
                <h4 class="text-uppercase mb-3 text-body">Tempor erat elitr at rebum at at clita. Diam dolor diam ipsum tempor sit diam amet diam et eos labore</h4>
                <p>Tempor erat elitr at rebum at at clita aliquyam consetetur. Diam dolor diam ipsum et, tempor voluptua sit consetetur sit. Aliquyam diam amet diam et eos sadipscing labore. Clita erat ipsum et lorem et sit, sed stet no labore lorem sit. Sanctus clita duo justo et tempor</p>
                <div class="row gx-5 py-2">
                    <div class="col-sm-6 mb-2">
                        <p class="fw-bold mb-2"><i class="fa fa-check text-primary me-3"></i>Perfect Planning</p>
                        <p class="fw-bold mb-2"><i class="fa fa-check text-primary me-3"></i>Professional Workers</p>
                        <p class="fw-bold mb-2"><i class="fa fa-check text-primary me-3"></i>First Working Process</p>
                    </div>
                    <div class="col-sm-6 mb-2">
                        <p class="fw-bold mb-2"><i class="fa fa-check text-primary me-3"></i>Perfect Planning</p>
                        <p class="fw-bold mb-2"><i class="fa fa-check text-primary me-3"></i>Professional Workers</p>
                        <p class="fw-bold mb-2"><i class="fa fa-check text-primary me-3"></i>First Working Process</p>
                    </div>
                </div>
                <p class="mb-4">Tempor erat elitr at rebum at at clita aliquyam consetetur. Diam dolor diam ipsum et, tempor voluptua sit consetetur sit. Aliquyam diam amet diam et eos labore</p>
                <img src="/img/signature.jpg" alt="">
            </div>
            <div class="col-lg-5 pb-5" style="min-height: 400px;">
                <div class="position-relative bg-dark-radial h-100 ms-5">
                    <img class="position-absolute w-100 h-100 mt-5 ms-n5" src="/img/about.jpg" style="object-fit: cover;">
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


    <!-- Appointment Start -->
    <div class="container-fluid bg-light py-6 px-5">
        <div class="row gx-5">
            @include('frontend.inc.form')
        </div>
    </div>
    <!-- Appointment End -->


    <!-- Team Start -->
    <div class="container-fluid py-6 px-5">
        <div class="text-center mx-auto mb-5" style="max-width: 700px;">
            <h1 class="display-5 text-uppercase mb-4">Nous Sommes des <span class="text-primary">Experts & Professionels</span> Travailleurs</h1>
        </div>
        <div class="row g-5">
            @include('frontend.inc.teamCard', ['members' => $members])
        </div>
    </div>
    <!-- Team End -->

    {{-- Footer starts --}}
    @include('frontend.inc.footer')
    {{-- Footer ends --}}

@endsection