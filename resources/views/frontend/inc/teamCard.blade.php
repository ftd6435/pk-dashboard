
@foreach ($members as $member)
    <div class="col-xl-{{ isset($show) && $show === '4' ? 4 : 3 }} col-lg-4 col-md-6">
        <div class="row g-0">
            <div class="col-10" style="min-height: 300px;">
                <div class="position-relative h-100">
                    <img class="position-absolute w-100 h-100" src="/storage/images/team/{{ $member->avatar }}" style="object-fit: cover;">
                </div>
            </div>
            <div class="col-2">
                <div class="h-100 d-flex flex-column align-items-center justify-content-between bg-light">
                    @if ($member->facebook)<a class="btn" href="#"><i class="fab fa-facebook-f"></i></a>@endif   
                    @if ($member->linkedin)<a class="btn" href="#"><i class="fab fa-linkedin-in"></i></a>@endif
                    @if ($member->instagram)<a class="btn" href="#"><i class="fab fa-instagram"></i></a>@endif
                </div>
            </div>
            <div class="col-12">
                <div class="bg-light p-4">
                    <a href="{{ route('showMember', $member->id) }}">
                        <h4 class="text-uppercase">{{ $member->fullName }}</h4>
                    </a>
                    <span>{{ $member->position }}</span>
                </div>
            </div>
        </div>
    </div>
@endforeach