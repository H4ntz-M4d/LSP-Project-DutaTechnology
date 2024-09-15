@extends('landing-page.layouts.layout')

@section('title', 'Sambutan Direktur')

@section('content')
    <section data-jarallax data-speed=".8" class="pt-10 pt-md-14 pb-12 pb-md-15 overlay overlay-primary jarallax">

        <!-- Content -->
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-11 text-center">

                    @foreach ($about_header as $item)
                        <!-- Heading -->
                        <h1 class="display-3 text-white mb-6 mt-n3" style="font-weight: 500; font-family: Poppins">
                            {{ $item->judul }}
                        </h1>

                        <h3 class="display-3 fw-bold text-white mb-6 mt-n3 text-opacity-80"
                            style="font-weight: 300; font-family: Poppins">
                            {{ $item->sub_judul }}
                        </h3>

                        <!-- Button -->
                        <a class="btn btn-pill btn-white shadow lift" data-bigpicture='{"ytSrc": "{{ $item->yt_id }}"}'
                            href="#">
                            <i class="fe fe-eye me-2"></i>
                            {{ $item->tombol_text }}
                        </a>
                    @endforeach

                </div>
            </div> <!-- / .row -->
        </div> <!-- / .container -->

        <!-- Shape -->
        <div class="position-absolute end-0 bottom-0 start-0">

            <!-- Shape -->
            <div class="position-relative shape shape-bottom shape-fluid-x text-white">
                <svg viewBox="0 0 2880 250" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M720 125L2160 0h720v250H0V125h720z" fill="currentColor" />
                </svg>
            </div>

            <!-- Button -->
            <div class="position-absolute center">
                <a class="btn btn-light btn-rounded-circle lift" data-scroll href="#payItDown">
                    <i class="fe fe-arrow-down"></i>
                </a>
            </div>

        </div>

    </section>

    <section class="pt-8 pt-md-11" id="payItDown">
        <div class="container">
            @foreach ($about_content as $item)
                <div class="row justify-content-center">
                    <div class="col-12 col-md-10 col-lg-8 text-center">

                        <!-- Badge -->
                        <span class="badge rounded-pill text-bg-primary-subtle mb-3">
                            <span class="h6 text-uppercase">{{ $item->heading }}</span>
                        </span>

                        <!-- Heading -->
                        <h1>
                            {{ $item->judul }} <span class="text-primary">{{ $item->span }}.</span>
                        </h1>

                        <!-- Text -->
                        <p class="lead text-gray-700 mb-7 mb-md-9">
                            {{ $item->sub_judul }}
                        </p>

                    </div>
                </div> <!-- / .row -->
                <section class="pt-6 pt-md-4 pb-lg-10">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-12 col-md-10 col-lg-9 col-xl-12">

                                <!-- Text -->
                                <p>
                                    {!! $item->text !!}
                                </p>

                            </div>
                        </div> <!-- / .row -->
                    </div> <!-- / .container -->
                </section>
            @endforeach

        </div> <!-- / .container -->
    </section>
@endsection
