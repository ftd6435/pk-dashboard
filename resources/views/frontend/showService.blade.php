@extends('frontend.frontend')

@section('content')

    {{-- Header starts --}}
    @include('frontend.inc.header')
    {{-- Header ends --}}

        <!-- Page Header Start -->
        <div class="container-fluid page-header">
            <h1 class="display-3 text-uppercase text-white mb-3">Detail du service</h1>
            <div class="d-inline-flex text-white">
                <h6 class="text-uppercase m-0"><a href="{{ route('home') }}">Acceuil</a></h6>
                <h6 class="text-white m-0 px-3">/</h6>
                <h6 class="text-uppercase m-0"><a href="{{ route('service') }}">Services</a></h6>
                <h6 class="text-white m-0 px-3">/</h6>
                <h6 class="text-uppercase text-white m-0">detail</h6>
            </div>
        </div>
        <!-- Page Header Start -->
    
    
        <!-- Blog Start -->
        <div class="container-fluid py-6 px-5">
            <div class="row g-5">
                <div class="col-lg-8">
                    <!-- Service Detail Start -->
                    <div class="mb-5">
                        <img class="img-fluid w-100 rounded mb-5" src="/storage/images/services/{{ $service->image }}" alt="article-{{ $service->id }}">
                        
                        {{-- Service title OR headline  --}}
                        <h1 class="text-uppercase mb-4 d-flex align-items-center">{{ $service->title }}</h1>

                        {{-- Service description OR details  --}}
                        <p>{{ $service->description }}</p>
                    </div>
                    <!-- Project Detail End -->
    
                    <!-- Comment List Start -->
                    <div class="mb-5">
                        <h3 class="text-uppercase mb-4">{{ count($service->serviceComments) }} Commentaire{{ count($service->serviceComments) > 1 ? 's' : ''}}</h3>
                        @foreach ($service->serviceComments->where('parent_id', null) as $comment)
                            @include('frontend.inc.comments', ['comment' => $comment])
                        @endforeach
                    </div>
                    <!-- Comment List End -->
    
                    <!-- Comment Form Start -->
                    <div class="bg-light p-5">
                        <h3 class="text-uppercase mb-4">Laissez un commentaire</h3>
                        @include('pages.admin.include.success')

                        <form action="{{ route('service.comments.store') }}" method="POST">
                            @csrf

                            <input type="hidden" name="service_id" value="{{ $service->id }}">
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

                    {{-- More services starts --}}
                    <div class="row g-5">
                        @include('frontend.inc.serviceCard', ['services' => $services])
                    </div>
                  {{-- More services ends --}}
                </div>
    
                <!-- Sidebar Start -->
                <div class="col-lg-4">
                    <!-- Search Form Start -->
                    <div class="mb-5">
                        <div class="input-group">
                            <input type="text" class="form-control p-3" placeholder="Keyword">
                            <button class="btn btn-primary px-3"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                    <!-- Search Form End -->
    
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
                        <img src="/storage/images/services/{{ $service->image }}" alt="" class="img-fluid rounded">
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