@extends('frontend.frontend')

@section('content')

    {{-- Header starts --}}
    @include('frontend.inc.header')
    {{-- Header ends --}}

        <!-- Page Header Start -->
        @include('frontend.inc.pageHeader', ['headtitle' => 'Notre équipe', 'title' => "L'équipe"])
        <!-- Page Header Start -->
    
    
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