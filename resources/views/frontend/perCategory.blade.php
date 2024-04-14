@extends('frontend.frontend')

@section('title', 'Les articles de la catégorie ' . $posts[0]->category->name)

@section('content')

    {{-- Header starts --}}
    @include('frontend.inc.header')
    {{-- Header ends --}}
    
        <!-- Page Header Start -->
        <div class="container-fluid page-header">
            <h1 class="display-3 text-uppercase text-white mb-3">Catégorie {{ $posts[0]->category->name }}</h1>
            <div class="d-inline-flex text-white">
                <h6 class="text-uppercase m-0"><a href="{{ route('home') }}">Acceuil</a></h6>
                <h6 class="text-white m-0 px-3">/</h6>
                <h6 class="text-uppercase m-0"><a href="{{ route('blog') }}">Articles</a></h6>
                <h6 class="text-white m-0 px-3">/</h6>
                <h6 class="text-uppercase text-white m-0">{{ $posts[0]->category->name }}</h6>
            </div>
        </div>
        <!-- Page Header Start -->
    
    
        <!-- Blog Start -->
        <div class="container-fluid py-6 px-5">
            <div class="text-center mx-auto mb-5" style="max-width: 600px;">
                <h1 class="display-5 text-uppercase mb-4">Les Articles de la catégorie <span class="text-primary">{{ $posts[0]->category->name }}</span></h1>
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