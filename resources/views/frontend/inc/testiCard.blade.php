@foreach ($projects as $project)
    @if ($project->testimonial)
        <div class="row gx-4 align-items-center">
            <div class="col-xl-4 col-lg-5 col-md-5">
                @php
                    $imagePath = $project->client->image ? "/storage/images/clients/" . $project->client->image : "/img/avatar.jpeg"
                @endphp
                <img class="img-fluid w-100 h-100 bg-light p-lg-3 mb-4 mb-md-0" src="{{ $imagePath }}" alt="">
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
@endforeach