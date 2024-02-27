<div class="col-lg-4 mb-5 mb-lg-0">
    <div class="mb-4">
        <h1 class="display-5 text-uppercase mb-4">Prenez <span class="text-primary">Une Séconde</span></h1>
    </div>
    <p class="mb-5">Et jeter un coup d'oeil a nos projets etc... Diam diam ut et eos duo duo sed. Lorem elitr sadipscing eos et ut et stet justo, sit dolore et voluptua labore. Ipsum erat et ea ipsum magna sadipscing lorem. Sit lorem sea sanctus eos. Sanctus sit tempor dolores ipsum stet justo sit erat ea, sed diam sanctus takimata sit. Et at voluptua amet erat justo amet ea ipsum eos, eirmod accusam sea sed ipsum kasd ut.</p>
    <a class="btn btn-primary py-3 px-5" href="{{ route('project') }}">Nos Projets</a>
</div>
<div class="col-lg-8">
    <div class="bg-light text-center p-5">
        <form action="{{ route('sendMessage') }}" method="POST">
            @csrf

            <div class="row g-3">
                <div class="col-12 col-sm-6">
                    <input type="text" name="name" class="form-control border-0" placeholder="Your Name" style="height: 55px;">
                </div>
                <div class="col-12 col-sm-6">
                    <input type="email" name="email" class="form-control border-0" placeholder="Your Email" style="height: 55px;">
                </div>
                <div class="col-12">
                    <input type="text" name="subject" class="form-control border-0" placeholder="Sujet" style="height: 55px;">
                </div>
                <div class="col-12">
                    <textarea class="form-control border-0" rows="5" name="message" placeholder="Message"></textarea>
                </div>
                <div class="col-12">
                    <button class="btn btn-primary w-100 py-3" type="submit">Envoyer Message</button>
                </div>
            </div>
        </form>
    </div>
</div>