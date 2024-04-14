@extends('frontend.frontend')

@section('title', 'Contact')

@section('content')

    {{-- Header starts --}}
    @include('frontend.inc.header')
    {{-- Header ends --}}

        <!-- Page Header Start -->
        @include('frontend.inc.pageHeader', ['headtitle' => 'Contact', 'title' => 'Contact'])
        <!-- Page Header Start -->
    
    
        <!-- Contact Start -->
        <div class="container-fluid py-6 px-5">
            <div class="text-center mx-auto mb-5" style="max-width: 600px;">
                <h1 class="display-5 text-uppercase mb-4"><span class="text-primary">N'hésitez pas</span> a nous contacter</h1>
            </div>

            @include('frontend.inc.success')

            <div class="row gx-0 align-items-center">
                <div class="col-lg-6 mb-5 mb-lg-0" style="height: 600px;">
                    <iframe class="w-100 h-100" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3970.751105050337!2d-0.1895328252545999!3d5.603737894377105!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xfdf9971eded60d9%3A0x82103eabc2fb6d4f!2sFrench%20Hostel!5e0!3m2!1sfr!2sgh!4v1709094952490!5m2!1sfr!2sgh" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
                <div class="col-lg-6">
                    <div class="contact-form bg-light p-5">
                        <form class="row g-3" action="{{ route('sendMessage') }}" method="POST">
                            @csrf

                            <div class="col-12 col-sm-6">
                                <input type="text" name="name" class="form-control border-0" placeholder="Votre Nom" style="height: 55px;">
                            </div>
                            <div class="col-12 col-sm-6">
                                <input type="email" name="email" class="form-control border-0" placeholder="Votre Email" style="height: 55px;">
                            </div>
                            <div class="col-12">
                                <input type="text" name="subject" class="form-control border-0" placeholder="Sujet" style="height: 55px;">
                            </div>
                            <div class="col-12">
                                <textarea class="form-control border-0" rows="4" name="message" placeholder="Message"></textarea>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary w-100 py-3" type="submit">Envoyer Message</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Contact End -->

    {{-- Footer starts --}}
    @include('frontend.inc.footer')
    {{-- Footer ends --}}

@endsection