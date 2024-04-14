@extends('frontend.frontend')

@section('title', $member->fullName)
@section('description', Str::limit($member->description, 200))
@section('image', '/storage/images/team/' .  $member->avatar)

@section('content')

    {{-- Header starts --}}
    @include('frontend.inc.header')
    {{-- Header ends --}}

        <!-- Page Header Start -->
        <div class="container-fluid page-header">
            <h1 class="display-3 text-uppercase text-white mb-3">Membre de l'équipe</h1>
            <div class="d-inline-flex text-white">
                <h6 class="text-uppercase m-0"><a href="{{ route('home') }}">Acceuil</a></h6>
                <h6 class="text-white m-0 px-3">/</h6>
                <h6 class="text-uppercase m-0"><a href="{{ route('team') }}">équipe</a></h6>
                <h6 class="text-white m-0 px-3">/</h6>
                <h6 class="text-uppercase text-white m-0">Membre</h6>
            </div>
        </div>
        <!-- Page Header Start -->
    
    
        <!-- Blog Start -->
        <div class="container-fluid py-6 px-5">
            <div class="row g-5">
                <div class="col-lg-8">
                    <!-- Member Detail Start -->
                    <div class="mb-5">
                        {{-- Member name  --}}
                        <h2 class="text-capitalize mb-3">{{ $member->fullName }}</h2>

                        <div class="mb-3 d-flex align-items-center justify-content-between">
                            <span><i class="fw-bold me-3">Position:</i> {{ $member->position }}</span>
                            <div class="d-flex align-items-center gap-3">
                                <span class="fw-medium"><i>Suivez moi:</i></span>
                                @if ($member->facebook)<a href=""><i class='bx bxl-facebook-circle fs-5' ></i></a>@endif
                                @if ($member->instagram)<a href=""><i class='bx bxl-instagram-alt fs-5' ></i></a>@endif
                                @if ($member->linkedin)<a href=""><i class='bx bxl-linkedin-square fs-5' ></i></a>@endif
                            </div>
                        </div>

                        <div class="d-flex align-items-center gap-4 mb-3">
                            <span><i class='bx bx-envelope text-primary me-2'></i> {{ $member->firstLetter($member->email) }}</span>
                            <span class="text-capitalize"><i class='bx bx-current-location text-primary me-2' ></i> {{ $member->address }}</span>
                        </div>

                        <img class="img-fluid w-100 rounded mb-5" src="/storage/images/team/{{ $member->avatar }}" alt="member-{{ $member->id }}">

                        {{-- Service description OR details  --}}
                        <p>{{ $member->description }}</p>
                    </div>
                    <!-- Member Detail End -->

                    {{-- More members starts --}}
                    <div class="row g-5">
                        @include('frontend.inc.teamCard', ['members' => $members, 'show' => '4'])
                    </div>
                  {{-- More members ends --}}
                </div>
    
                <!-- Sidebar Start -->
                <div class="col-lg-4">
                    <!-- Status Start -->
                    <div class="mb-5">
                        <h3 class="text-uppercase mb-4">Projets</h3>
                        <div class="d-flex flex-column justify-content-start bg-light p-4">
                            @foreach ($status as $st)                              
                                <a class="h6 text-uppercase mb-4 d-flex justify-content-between" href="{{ route('showPerStatus', $st->status) }}"><span><i class="fa fa-angle-right me-2"></i>{{ $st->status }}</span> <span>{{ $st->numberCount }}</span></a>
                            @endforeach
                        </div>
                    </div>
                    <!-- Status End -->
    
                    <!-- Recent Post Start -->
                    <div class="mb-5">
                        <h3 class="text-uppercase mb-4">Derniers Articles</h3>
                        <div class="bg-light p-4">
                            @foreach ($posts as $post)
                                <div class="d-flex mb-3">
                                    <img class="img-fluid" src="/storage/images/posts/{{ $post->image }}" style="width: 100px; height: 100px; object-fit: cover;" alt="">
                                    <a href="{{ route('details', $post->id) }}" class="h6 d-flex align-items-center bg-white text-uppercase px-3 mb-0">{{ Str::limit($post->title, 50) }}
                                    </a>
                                </div>
                            @endforeach                                           
                        </div>
                    </div>
                    <!-- Recent Post End -->
    
                    <!-- Image Start -->
                    <div class="mb-5 d-md-none d-lg-block">
                        <img src="/storage/images/team/{{ $member->avatar }}" alt="" class="img-fluid rounded">
                    </div>
                    <!-- Image End -->
                </div>
                <!-- Sidebar End -->
            </div>
        </div>
        <!-- Blog End -->

    {{-- Footer starts --}}
    @include('frontend.inc.footer')
    {{-- Footer ends --}}

@endsection