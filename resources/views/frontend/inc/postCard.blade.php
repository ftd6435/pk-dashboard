@foreach ($posts as $post)      
    <div class="col-lg-4 col-md-6">
        <div class="bg-light">
            <img class="img-fluid" src="/storage/images/posts/{{ $post->image }}" alt="">
            <div class="p-4">
                <div class="d-flex justify-content-between mb-4">
                    <div class="d-flex align-items-center">
                        @php
                            $postImage = $post->user->avatar ? '/storage/images/users/' . $post->user->avatar : '/img/avatar.jpeg';
                        @endphp

                        <img class="rounded-circle me-2" src="{{ $postImage }}" width="35" height="35" alt="image-{{ $post->user->name }}">
                        <span>{{ $post->user->name }}</span>
                    </div>
                    <div class="d-flex align-items-center">
                        <span class="ms-3"><i class="far fa-calendar-alt text-primary me-2"></i>{{ $post->postDate($post->created_at) }}</span>
                    </div>
                </div>
                <h4 class="text-uppercase mb-3">{{ $post->title($post->title) }}</h4>
                <a class="text-uppercase fw-bold" href="{{ route('details', $post->id) }}">Lire Plus <i class="bi bi-arrow-right"></i></a>
            </div>
        </div>
    </div>
@endforeach    