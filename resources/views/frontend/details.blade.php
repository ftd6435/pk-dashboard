@extends('frontend.frontend')

@section('title', $post->title)
@section('description', $post->content($post->content))
@section('image', '/storage/images/posts/' . $post->image)

@section('content')

    {{-- Header starts --}}
    @include('frontend.inc.header')
    {{-- Header ends --}}

        <!-- Page Header Start -->
        @include('frontend.inc.pageHeader', ['headtitle' => 'Detail Article', 'title' => 'Detail'])
        <!-- Page Header Start -->
    
    
        <!-- Blog Start -->
        <div class="container-fluid py-6 px-5">
            <div class="row g-5">
                <div class="col-lg-8">
                    <!-- Blog Detail Start -->
                    <div class="mb-5">
                        <img class="img-fluid w-100 rounded" src="/storage/images/posts/{{ $post->image }}" alt="article-{{ $post->id }}">
                      
                        <ul class="d-flex mt-8 mb-8 mx-0 px-2 py-3" style="list-style: none">
                            <li class="me-4 d-flex align-item-center justify-content-center"><span class="fw-bold primary-font me-2">Partager</span> <span><i class="fa-solid fa-share"></i></span></li>
                            <li class="me-3 social-media"><a href="{{ $shareLinks['facebook'] }}"><i class="fa-brands fa-facebook fs-5"></i></a></li>
                            <li class="me-3 social-media"><a href="{{ $shareLinks['twitter'] }}"><i class="fa-brands fa-twitter fs-5"></i></a></li>
                            <li class="me-3 social-media"><a href="{{ $shareLinks['linkedin'] }}"><i class="fa-brands fa-linkedin fs-5"></i></a></li>
                            <li class="me-3 social-media"><a href="{{ $shareLinks['whatsapp'] }}"><i class="fa-brands fa-whatsapp fs-5"></i></a></li>
                        </ul>
                        <h1 class="text-uppercase mb-4 headline-font">{{ $post->title }}</h1>

                        <p class="primary-font">{{ $post->content }}</p>
                    </div>
                    <!-- Blog Detail End -->
    
                    <!-- Comment List Start -->
                    <div class="mb-5">
                        <h3 class="text-uppercase mb-4">{{ count($post->comments) }} Commentaire{{ count($post->comments) > 1 ? 's' : ''}}</h3>
                        @foreach ($post->comments->where('parent_id', null) as $comment)
                            @include('frontend.inc.comments', ['comment' => $comment])
                        @endforeach
                    </div>
                    <!-- Comment List End -->
    
                    <!-- Comment Form Start -->
                    <div class="bg-light p-5">
                        <h3 class="text-uppercase mb-4">Laissez un commentaire</h3>

                        @includeIf('pages.admin.include.success')

                        <form action="{{ route('comments.store') }}" method="POST">
                            @csrf

                            <input type="hidden" name="post_id" value="{{ $post->id }}">
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
    
                    <!-- Category Start -->
                    <div class="mb-5">
                        <h3 class="text-uppercase mb-4">Catégories</h3>
                        <div class="d-flex flex-column justify-content-start bg-light p-4">
                            @foreach ($categories as $category)                              
                                <a class="h6 text-uppercase mb-4" href="{{ route('showPerCaegory', $category->id) }}"><i class="fa fa-angle-right me-2"></i>{{ $category->name }}</a>
                            @endforeach
                        </div>
                    </div>
                    <!-- Category End -->
    
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
                        <img src="/storage/images/posts/{{ $post->image }}" alt="" class="img-fluid rounded">
                    </div>
                    <!-- Image End -->
    
                    <!-- Tags Start -->
                    <div class="mb-5">
                        <h3 class="text-uppercase mb-4">Projets</h3>
                        <div class="d-flex flex-wrap m-n1">
                            @foreach ($status as $st)                            
                                <a href="{{ route('showPerStatus', $st->status) }}" class="btn btn-outline-dark m-1">{{ $st->status }}</a>
                            @endforeach
                        </div>
                    </div>
                    <!-- Tags End -->
                </div>
                <!-- Sidebar End -->
            </div>
        </div>
        <!-- Blog End -->

    {{-- Footer starts --}}
    @include('frontend.inc.footer')
    {{-- Footer ends --}}

@endsection