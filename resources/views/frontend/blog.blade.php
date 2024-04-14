@extends('frontend.frontend')

@section('title', 'Les articles')

@section('content')

    {{-- Header starts --}}
    @include('frontend.inc.header')
    {{-- Header ends --}}
    
        <!-- Page Header Start -->
        @include('frontend.inc.pageHeader', ['headtitle' => 'Les Articles', 'title' => 'Article'])
        <!-- Page Header Start -->
    
    
        <!-- Blog Start -->
        <div class="container-fluid py-6 px-5">
            <div class="text-center mx-auto mb-5" style="max-width: 600px;">
                <h1 class="display-5 text-uppercase mb-4">Les Derniers <span class="text-primary">Articles</span> De Notre Blog</h1>
            </div>
            <div class="row g-5">
                @include('frontend.inc.postCard', ['posts' => $posts])

                {{-- Customized pagination --}}
                @include('frontend.inc.pkPagination', ['pkPagination' => $posts])
            </div>
        </div>
        <!-- Blog End -->

    {{-- Footer starts --}}
    @include('frontend.inc.footer')
    {{-- Footer ends --}}

@endsection