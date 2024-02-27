@foreach ($projects as $key => $project)
  @php
    $images = $project->projectImages($project->images);
  @endphp
    <div class="col-xl-4 col-lg-6 col-md-6 portfolio-item {{ $project->status === "realiser" ? 'first' : 'second' }}">
        <div class="position-relative portfolio-box">
            <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                  @foreach ($images as $key => $image)
                    <div class="carousel-item {{ $key === 0 ? 'active' : '' }}" data-bs-interval="10000">
                      <img src="/storage/images/projects/{{ $image }}" class="d-block w-100" alt="...">
                    </div>
                  @endforeach
                </div>
            </div>
            <a class="portfolio-title shadow-sm" href="{{ route('showProject', $project->id) }}">
                <p class="h4 text-uppercase d-flex align-items-center justify-content-between">
                  <span>{{ $project->name($project->title) }}</span>
                  <span class="fw-medium px-2 py-1 {{ $project->status === "en cours" ? 'bg-warning' : ($project->status === "en etudes" ? "bg-info" :  "bg-success") }} text-white" style="font-size: 0.7rem;" >{{ $project->status }}</span>
                </p>
                <span class="text-body"><i class="fa-solid fa-info font-semibold text-primary me-2"></i>{{ $project->details($project->details) }}</span>
            </a>
            <a class="portfolio-btn" href="{{ route('showProject', $project->id) }}">
                <i class="bi bi-plus text-white"></i>
            </a>
        </div>
    </div>
@endforeach

