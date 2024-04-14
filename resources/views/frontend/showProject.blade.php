@extends('frontend.frontend')

@section('title', $project->title)
@section('description', $project->details)

@section('content')

    {{-- Header starts --}}
    @include('frontend.inc.header')
    {{-- Header ends --}}

        <!-- Page Header Start -->
        <div class="container-fluid page-header">
            <h1 class="display-3 text-uppercase text-white mb-3">Detail du projet</h1>
            <div class="d-inline-flex text-white">
                <h6 class="text-uppercase m-0"><a href="{{ route('home') }}">Acceuil</a></h6>
                <h6 class="text-white m-0 px-3">/</h6>
                <h6 class="text-uppercase m-0"><a href="{{ route('project') }}">Projets</a></h6>
                <h6 class="text-white m-0 px-3">/</h6>
                <h6 class="text-uppercase text-white m-0">detail</h6>
            </div>
        </div>
        <!-- Page Header Start -->
    
        @php
            $images = $project->projectImages($project->images);
        @endphp

        <!-- Blog Start -->
        <div class="container-fluid py-6 px-5">
            <div class="row g-5">
                <div class="col-lg-8">
                    <!-- Project Detail Start -->
                    <div class="mb-5">
                        <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                @foreach ($images as $key => $image)
                                    <div class="carousel-item {{ $key === 0 ? 'active' : '' }}" data-bs-interval="10000">
                                        <img src="/storage/images/projects/{{ $image }}" class="d-block w-100" alt="...">
                                    </div>
                                @endforeach
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
                              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                              <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
                              <span class="carousel-control-next-icon" aria-hidden="true"></span>
                              <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                        
                        {{-- Project title OR headline  --}}
                        <h1 class="text-uppercase my-4 d-flex align-items-center"><span class="border fw-medium fs-6 px-3 py-1 {{ $project->status === "en cours" ? 'bg-warning' : ($project->status === "en etudes" ? "bg-info" :  "bg-success") }} rounded-2xl me-3">{{ $project->status }}</span> {{ $project->title }}</h1>

                        <ul class="row gx-4">
                            <li class="col"><span class="fw-bold text-primary fs-5">Début:</span> <span class="text-capitalize">{{ $project->formatDateString($project->startDate) }}</span></li>
                            <li class="col"><span class="fw-bold text-primary fs-5">Fin:</span> <span class="text-capitalize">{{ $project->formatDateString($project->endDate) }}</span></li>
                            <li class="col"><span class="fw-bold text-primary fs-5">Durée:</span> <span class="text-capitalize">{{ $project->dateDifference($project->startDate, $project->endDate) }} mois</span></li>
                        </ul>

                        {{-- Project description OR details  --}}
                        <p>{{ $project->details }}</p>

                        {{-- Project testimonial  --}}
                        @if($project->testimonial)
                            <div class="row gx-4 align-items-center">
                                <div class="col-xl-4 col-lg-5 col-md-5">
                                    <img class="img-fluid w-100 h-100 bg-light p-lg-3 mb-4 mb-md-0" src="/storage/images/clients/{{ $project->client->image }}" alt="">
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

                        <div class="d-flex align-items-center justify-content-between mt-4">
                            <p class="fs-6"><span class="fw-medium">Autheur:</span> <span class="capitalize italic">{{ $project->user->name }}</span></p>
                            <p class="fs-6"><span class="fw-medium">Enrégistré:</span> <span class="capitalize italic">{{ $project->shortDateFormat($project->created_at) }}</span></p>
                        </div>
                    </div>
                    <!-- Project Detail End -->
    
                    <!-- Comment List Start -->
                    <div class="mb-5">
                        <h3 class="text-uppercase mb-4">{{ count($project->projectComments) }} Commentaire{{ count($project->projectComments) > 1 ? 's' : ''}}</h3>
                        @foreach ($project->projectComments->where('parent_id', null) as $comment)
                            @include('frontend.inc.comments', ['comment' => $comment])
                        @endforeach
                    </div>
                    <!-- Comment List End -->
    
                    <!-- Comment Form Start -->
                    <div class="bg-light p-5">
                        <h3 class="text-uppercase mb-4">Laissez un commentaire</h3>
                        @include('pages.admin.include.success')

                        <form action="{{ route('project.comments.store') }}" method="POST">
                            @csrf

                            <input type="hidden" name="project_id" value="{{ $project->id }}">
                            <input type="hidden" name="parent_id" id="parentID">

                            <div class="row g-3">
                                <div class="col-12 col-sm-6">
                                    <input type="text" name="name" class="form-control bg-white border-0" placeholder="Votre Nom" style="height: 55px;">
                                </div>
                                <div class="col-12 col-sm-6">
                                    <input type="email" name="email" class="form-control bg-white border-0" placeholder="Votre Email" style="height: 55px;">
                                </div>
                                <div class="col-12">
                                    <textarea name="content" class="form-control bg-white border-0" rows="5" placeholder="Votre commentaire..."></textarea>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary w-100 py-3" type="submit">Laissez Votre Commentaire</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- Comment Form End -->

                    {{-- More projects starts --}}
                    {{-- <div class="row g-5 portfolio-container">
                        @include('frontend.inc.projectCard', ['projects' => $projects])
                    </div> --}}
                    {{-- More projects ends --}}
                </div>
    
                <!-- Sidebar Start -->
                <div class="col-lg-4">
                    <!-- SEARCH FORM TO IMPLEMENT LATER STARTS -->
                        {{-- <div class="mb-5">
                            <div class="input-group">
                                <input type="text" class="form-control p-3" placeholder="Keyword">
                                <button class="btn btn-primary px-3"><i class="fa fa-search"></i></button>
                            </div>
                        </div> --}}
                    <!-- SEARCH FORM TO IMPLEMENT LATER ENDS -->
    
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
                    <div class="mb-5">
                        <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                @foreach ($images as $key => $image)
                                    <div class="carousel-item {{ $key === 0 ? 'active' : '' }}" data-bs-interval="10000">
                                        <img src="/storage/images/projects/{{ $image }}" class="d-block w-100" alt="...">
                                    </div>
                                @endforeach
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
                              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                              <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
                              <span class="carousel-control-next-icon" aria-hidden="true"></span>
                              <span class="visually-hidden">Next</span>
                            </button>
                        </div>
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