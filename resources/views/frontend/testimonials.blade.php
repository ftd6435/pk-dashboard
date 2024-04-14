@extends('frontend.frontend')

@section('title', 'Les témoignages')

@section('content')

    {{-- Header starts --}}
    @include('frontend.inc.header')
    {{-- Header ends --}}

        <!-- Page Header Start -->
        @include('frontend.inc.pageHeader', ['headtitle' => 'Témoignages', 'title' => 'Témoignage'])
        <!-- Page Header Start -->
    
    
        <!-- Testimonial Start -->
        <div class="container-fluid bg-light py-6 px-5">
            <div class="text-center mx-auto mb-5" style="max-width: 700px;">
                <h1 class="display-5 text-uppercase mb-4">Ce Que Nos <span class="text-primary">Heureux Clients</span> Disent!!!</h1>
            </div>
            <div class="row gx-0 align-items-center">
                <div class="col-xl-4 col-lg-5 d-none d-lg-block">
                    <img class="img-fluid w-100 h-100" src="/img/testimonial.jpg">
                </div>
                <div class="col-xl-8 col-lg-7 col-md-12">
                    <div class="testimonial bg-light">
                        <div class="owl-carousel testimonial-carousel">
                            @foreach ($projects as $project)
                                @if ($project->testimonial)
                                    <div class="row gx-4 align-items-center">
                                        <div class="col-xl-4 col-lg-5 col-md-5">
                                            @php
                                                $testiImage = !$project->client->image ? "/img/avatar.jpeg" : "/storage/images/clients/" . $project->client->image
                                            @endphp
                                            <img class="img-fluid w-100 h-100 bg-light p-lg-3 mb-4 mb-md-0" src="{{ $testiImage }}" alt="">
                                        </div>
                                        <div class="col-xl-8 col-lg-7 col-md-7">
                                            <h4 class="text-uppercase mb-0">{{ $project->client->fullName }}</h4>
                                            <p>{{ $project->client->profession }}</p>
                                            <p class="fs-5 mb-0"><i class="fa fa-2x fa-quote-left text-primary me-2"></i> 
                                                {{ $project->testimonial }}
                                            </p>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
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