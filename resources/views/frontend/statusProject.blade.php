@extends('frontend.frontend')

@section('title', 'Les projets ' . $projects[0]->status)

@section('content')

    {{-- Header starts --}}
    @include('frontend.inc.header')
    {{-- Header ends --}}
    
        <!-- Page Header Start -->
        <div class="container-fluid page-header">
            <h1 class="display-3 text-uppercase text-white mb-3">Projets {{ $projects[0]->status }}</h1>
            <div class="d-inline-flex text-white">
                <h6 class="text-uppercase m-0"><a href="{{ route('home') }}">Acceuil</a></h6>
                <h6 class="text-white m-0 px-3">/</h6>
                <h6 class="text-uppercase m-0"><a href="{{ route('project') }}">Projets</a></h6>
                <h6 class="text-white m-0 px-3">/</h6>
                <h6 class="text-uppercase text-white m-0">{{ $projects[0]->status }}</h6>
            </div>
        </div>
        <!-- Page Header Start -->
        
    
        <!-- Portfolio Start -->
        <div class="container-fluid bg-light py-6 px-5">
            <div class="text-center mx-auto mb-5" style="max-width: 700px;">
                <h1 class="display-5 text-uppercase mb-4">Certains de Nos <span class="text-primary">Projets {{ $projects[0]->status }}</span></h1>
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