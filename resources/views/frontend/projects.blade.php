@extends('frontend.frontend')

@section('title', 'Les projets')

@section('content')

    {{-- Header starts --}}
    @include('frontend.inc.header')
    {{-- Header ends --}}
    
        <!-- Page Header Start -->
        @include('frontend.inc.pageHeader', ['headtitle' => 'Projets', 'title' => 'Projet'])
        <!-- Page Header Start -->
        
    
        <!-- Portfolio Start -->
        <div class="container-fluid bg-light py-6 px-5">
            <div class="text-center mx-auto mb-5" style="max-width: 700px;">
                <h1 class="display-5 text-uppercase mb-4">Certains de Nos <span class="text-primary">Projets</span> Populaire de Rêve</h1>
            </div>
            <div class="row gx-5">
                <div class="col-12 text-center">
                    <div class="d-inline-block bg-dark-radial text-center pt-4 px-5 mb-5">
                        <ul class="list-inline mb-0" id="portfolio-flters">
                            <li class="btn btn-outline-primary bg-white p-2 active mx-2 mb-4" data-filter="*">
                                <img src="/img/portfolio-1.jpg" style="width: 150px; height: 100px;">
                                <div class="position-absolute top-0 start-0 end-0 bottom-0 m-2 d-flex align-items-center justify-content-center" style="background: rgba(4, 15, 40, .3);">
                                    <h6 class="text-white text-uppercase m-0">Tous</h6>
                                </div>
                            </li>
                            <li class="btn btn-outline-primary bg-white p-2 mx-2 mb-4" data-filter=".first">
                                <img src="/img/portfolio-2.jpg" style="width: 150px; height: 100px;">
                                <div class="position-absolute top-0 start-0 end-0 bottom-0 m-2 d-flex align-items-center justify-content-center" style="background: rgba(4, 15, 40, .3);">
                                    <h6 class="text-white text-uppercase m-0">Realiser</h6>
                                </div>
                            </li>
                            <li class="btn btn-outline-primary bg-white p-2 mx-2 mb-4" data-filter=".second">
                                <img src="/img/portfolio-3.jpg" style="width: 150px; height: 100px;">
                                <div class="position-absolute top-0 start-0 end-0 bottom-0 m-2 d-flex align-items-center justify-content-center" style="background: rgba(4, 15, 40, .3);">
                                    <h6 class="text-white text-uppercase m-0">En cours & En études</h6>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row g-5 portfolio-container">
                @include('frontend.inc.projectCard', ['projects' => $projects])

                {{-- Customized pagination --}}
                @include('frontend.inc.pkPagination', ['pkPagination' => $projects])
            </div>
        </div>
        <!-- Portfolio End -->

    {{-- Footer starts --}}
    @include('frontend.inc.footer')
    {{-- Footer ends --}}

@endsection