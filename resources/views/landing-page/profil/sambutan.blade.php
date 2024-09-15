@extends('landing-page.layouts.layout')

@section('title', 'Sambutan Direktur')

@section('content')
    <section class="py-8 py-md-11 border-bottom">
        <div class="container">
            @foreach ($sambutan_header as $item)
                <div class="row justify-content-center">
                    <div class="col-12 col-md-10 col-lg-8 text-center">

                        <!-- Preheader -->
                        <h6 class="text-uppercase text-primary" data-aos="fade-up">
                            {{ $item->header }}
                        </h6>

                        <!-- Headin -->
                        <h1 class="display-1 fw-bold" data-aos="fade-up" data-aos-delay="50">
                            {{ $item->judul }}
                        </h1>

                        <!-- Text -->
                        <p class="lead text-body-secondary mb-6" data-aos="fade-up" data-aos-delay="100">
                            {{ $item->sub_judul }}
                        </p>

                    </div>
                </div> <!-- / .row -->
                <div class="row">
                    <div class="col-12" data-aos="fade-up" data-aos-delay="200">

                        <!-- Video -->
                        <div class="ratio ratio-16x9">
                            <video class="rounded-lg bg-light shadow-lg" src="{{ asset('uploads/' . $item->video) }}"
                                autoplay loop controls>
                                Sorry, your browser doesn't support embedded videos,
                                but don't worry, you can <a href="assets/video/video-1.mp4">download it</a>
                                and watch it with your favorite video player!
                            </video>
                        </div>

                    </div>
                </div> <!-- / .row -->
            @endforeach
        </div> <!-- / .container -->
    </section>

    <!-- STEPS -->
    <div class="position-relative mt-n12 mt-md-n15">
        <div class="shape shape-bottom shape-fluid-x text-black">
            <svg viewBox="0 0 2880 250" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M720 125L2160 0h720v250H0V125h720z" fill="currentColor" />
            </svg>
        </div>
    </div>

    <!-- STEPS -->
    <div class="section bg-black pt-12 pt-md-15 pb-8 pb-md-11">
        <div class="container">
            @foreach ($sambutan_content as $item)
                <div class="row justify-content-between align-items-center mb-5">
                    <div class="col-12 col-md-4 order-md-2 text-center">

                        <!-- Image -->
                        <img class="img-fluid w-75 w-md-100 mb-6 mb-md-0" src="{{ asset('uploads/' . $item->image) }}"
                            alt="...">

                    </div>
                    <div class="col-12 col-md-7 order-md-1">

                        <!-- Heading -->
                        <h2 class="text-white" style="max-width: 450px;">
                            {{ $item->judul }}
                        </h2>

                        <!-- Text -->
                        <div class="lead text-body-secondary text-opacity-80 mb-0">
                            {{ $item->deskripsi }}
                        </div>

                    </div>
                </div> <!-- / .row -->
                <div class="row">
                    <div class="col-12 col-lg-16">
                        <div class="row">
                            <div class="col-auto col-lg-12">

                                <!-- Step -->
                                <div class="row gx-0 align-items-center mb-md-5">
                                    <div class="col">

                                        <!-- Divider -->
                                        <hr class="d-none d-md-block text-gray-900 text-opacity-50 me-n7">

                                    </div>
                                </div> <!-- / .row -->

                            </div>
                            <div class="col col-md-0 ms-n5 ms-md-0">

                                <!-- Heading -->
                                <h3 class="text-white">
                                    {{ $item->sub_judul }}
                                </h3>

                                <!-- Text -->
                                <h4 class="text-body-secondary text-opacity-80 mb-6 mb-md-0">
                                    {!! $item->teks !!}
                                </h4>

                            </div>
                        </div> <!-- / .row -->
                    </div>
                </div> <!-- / .row -->
            @endforeach
        </div> <!-- / .container-->
    </div>
@endsection
