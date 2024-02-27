@extends('frontend.frontend')

@section('content')

    {{-- Header starts --}}
    @include('frontend.inc.header')
    {{-- Header ends --}}

        <!-- Page Header Start -->
        @include('frontend.inc.pageHeader', ['headtitle' => 'Nos Services', 'title' => 'Service'])
        <!-- Page Header Start -->
    
    
        <!-- Services Start -->
        <div class="container-fluid bg-light py-6 px-5">
            <div class="text-center mx-auto mb-5" style="max-width: 700px;">
                <h1 class="display-5 text-uppercase mb-4">Nous Fournisons <span class="text-primary">Les Meilleurs</span> Services de Constructions</h1>
            </div>
            <div class="row g-5">
                @include('frontend.inc.serviceCard', ['services' => $services])      
            </div>
        </div>
        <!-- Services End -->
    
    
        <!-- Appointment Start -->
        <div class="container-fluid py-6 px-5">
            <div class="row gx-5">
                @include('frontend.inc.form')
            </div>
        </div>
        <!-- Appointment End -->
    
    
        <!-- Testimonial Start -->
        <div class="container-fluid bg-light py-6 px-5">
            <div class="text-center mx-auto mb-5" style="max-width: 600px;">
                <h1 class="display-5 text-uppercase mb-4">Ce Que Nos <span class="text-primary">Heureux Clients</span> Disent!!!</h1>
            </div>
            <div class="row gx-0 align-items-center">
                <div class="col-xl-4 col-lg-5 d-none d-lg-block">
                    <img class="img-fluid w-100 h-100" src="/img/testimonial.jpg">
                </div>
                <div class="col-xl-8 col-lg-7 col-md-12">
                    <div class="testimonial bg-light">
                        <div class="owl-carousel testimonial-carousel">
                            @include('frontend.inc.testiCard', ['projects' => $projects])
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Testimonial End -->

    {{-- Footer starts --}}
    @include('frontend.inc.footer')
    {{-- Footer ends --}}

@endsection