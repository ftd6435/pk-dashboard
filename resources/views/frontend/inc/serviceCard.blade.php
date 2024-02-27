@foreach ($services as $service)
    <div class="col-lg-4 col-md-6">
        <div class="service-item bg-white d-flex flex-column align-items-center text-center">
            <img class="img-fluid" src="/storage/images/services/{{ $service->image }}" alt="">
            <div class="service-icon bg-white">
                <i class="fa fa-3x fa-building text-primary"></i>
            </div>
            <div class="px-4 pb-4">
                <h4 class="text-uppercase mb-3">{{ $service->title($service->title) }}</h4>
                <p>{{ $service->description($service->description) }}</p>
                <a class="btn text-primary" href="{{ route('showService', $service->id) }}">Lire Plus <i class="bi bi-arrow-right"></i></a>
            </div>
        </div>
    </div>
@endforeach