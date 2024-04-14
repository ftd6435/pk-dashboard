@extends('frontend.frontend')

@section('title', 'Page introuvable')

@section('content')

    {{-- Header starts --}}
    @include('frontend.inc.header')
    {{-- Header ends --}}

        <!-- Page Header Start -->
        @include('frontend.inc.pageHeader', ['headtitle' => 'Page d\'erreur', 'title' => 'Erreur'])
        <!-- Page Header Start -->
    
    
        <!-- Contact Start -->
        <div class="container-fluid py-6 px-5">
            <div class="text-center mx-auto mb-5" style="max-width: 600px;">
                <h1 class="display-5 text-uppercase mb-4"><span class="text-primary">Désole 🙏!</span> Cher(e) visiteur</h1>
            </div>

            <div class="row gx-0 align-items-center">
               <p class="primary-font">Une erreur de URL ou de Recherche est survenu lors de votre visite sur notre site, veuillez visiter les autres pages en cliquant sur l'un des boutons sur la bare de navigation le temps pour nous de révoir ce problème. Merci pour votre bonne compréhension</p>
            </div>
        </div>
        <!-- Contact End -->

    {{-- Footer starts --}}
    @include('frontend.inc.footer')
    {{-- Footer ends --}}

@endsection