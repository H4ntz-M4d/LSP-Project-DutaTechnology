@extends('landing-page.layouts.layout')

@section('title', 'Home')

@section('content')
    <!-- BANNER -->
    <section class="overlay overlay-primary overlay-80 pt-4 pt-md-11 pb-10 bg-cover jarallax" data-jarallax data-speed=".8"
        style="background-image: url('assets/img/photos/bg-kampus.png');">
        <div class="contain">
            @foreach ($banner as $item)
                <div class="row align-items-center">
                    <div class="col-12 col-md-5 col-lg-6 order-md-2">

                        <!-- Image -->
                        <img src="{{ asset('uploads/' . $item->image) }}" class="img-fluid mw-md-150 mw-lg-110 mb-6 mb-md-0"
                            alt="..." data-aos="fade-up" data-aos-delay="100">

                    </div>

                    <div class="col-12 col-md-7 col-lg-6 order-md-1" data-aos="fade-up">
                        <!-- Heading -->
                        <h1 class="display-5 text-center text-md-start text-white" style="font-family: Poppins">
                            <span class="text-light" style="font-weight: 600">{{ $item->heading }} </span> <br>
                            <p style="font-weight: 300">{{ $item->paragraph }}</p>
                        </h1>

                        <!-- Text -->
                        <p class="lead text-center text-md-start text-white mb-6 mb-lg-8">
                            {{ $item->description }}
                        </p>

                    </div>

                </div> <!-- / .row -->
            @endforeach
        </div> <!-- / .container -->
    </section>

    <!-- BRANDS -->
    <section class="py-6 py-md-8" data-aos="fade-up" data-aos-delay="100">
        <div class="container">
            <div class="flickity-viewport"
                data-flickity='{"imagesLoaded": true, "initialIndex": 6, "pageDots": false, "prevNextButtons": false, "contain": true}'>
                <!-- Brand -->
                @foreach ($partners as $item)
                    <div class="d-block col-4 col-md-3 col-lg-2">

                        <!-- Brand -->
                        <div class="d-flex justify-content-center align-items-center"
                            style="min-height: 100px; min-width: 100px;">
                            <img src="{{ asset('uploads/' . $item->images) }}" alt="" class="img-fluid"
                                style="max-width: 100%; max-height: 80px;">
                        </div>

                    </div>
                @endforeach
            </div>
        </div> <!-- / .container -->
    </section>

    <!-- BERITA -->
    <section class="py-8 py-md-11 bg-gradient-light-white border-bottom" data-aos="fade-up" data-aos-delay="100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-10 col-lg-8 text-center">
                    @foreach ($berita_headers as $item)
                        <!-- Badge -->
                        <span class="badge rounded-pill text-bg-primary-subtle mb-3">
                            <span class="h6 text-uppercase">{{ $item->category }}</span>
                        </span>

                        <!-- Heading -->
                        <h1>
                            {{ $item->title }} <br>
                            {{ $item->sub_title }}
                        </h1>

                        <!-- Text -->
                        <p class="fs-lg text-body-secondary mb-7 mb-md-9">
                            {{ $item->description }}
                        </p>
                    @endforeach
                </div>
                <!-- ARTICLES -->
                <section class="mt-8">
                    <div class="container">
                        <div class="row">
                            @foreach ($berita_card as $berita_content)
                                <div class="col-12 col-md-6 col-lg-4 d-flex">

                                    <!-- Card -->
                                    <div class="card mb-6 shadow-light-lg lift lift-lg">

                                        <!-- Image -->
                                        <a class="card-img-top" href="/informasi/berita/{{ $berita_content->id }}">

                                            <!-- Image -->
                                            <img src="{{ asset('uploads/' . $berita_content->gambar) }}" alt="..."
                                                class="card-img-top" style="height: 200px; object-fit:fill;">

                                            <!-- Shape -->
                                            <div class="position-relative">
                                                <div class="shape shape-bottom shape-fluid-x text-white">
                                                    <svg viewBox="0 0 2880 480" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M2160 0C1440 240 720 240 720 240H0v240h2880V0h-720z"
                                                            fill="currentColor" />
                                                    </svg>
                                                </div>
                                            </div>

                                        </a>

                                        <!-- Body -->
                                        <a href="/informasi/berita/{{ $berita_content->id }}" class="text-decoration-none">
                                            <div class="card-body">

                                                <!-- Badge -->
                                                <span
                                                    class="badge rounded-pill text-bg-primary-desat badge-float badge-float-outside">
                                                    Baru
                                                </span>

                                                <!-- Heading -->
                                                <h4 class="fw-bold">
                                                    {{ $berita_content->judul }}
                                                </h4>

                                                <!-- Text -->
                                                <p class="text-body-secondary">
                                                    {{ Str::limit(strip_tags($berita_content->deskripsi), 150) }}
                                                </p>

                                                <!-- Link -->

                                            </div>
                                        </a>


                                        <!-- Meta -->
                                        <a class="card-meta mt-auto" href="/informasi/berita/{{ $berita_content->id }}">
                                            <div class="card-body">

                                                <a class="fs-sm fw-bold d-block mb-5 btn btn-primary text-decoration-none"
                                                    href="/informasi/berita/{{ $berita_content->id }}">
                                                    Read More <i class="fe fe-arrow-right ms-3"></i>
                                                </a>

                                                <!-- Divider -->
                                                <hr class="card-meta-divider">

                                                <!-- Author -->
                                                <h6 class="text-body-secondary me-2 mb-0">
                                                    Oleh Lembaga Sertifikasi Profesi
                                                </h6>

                                                <!-- Date -->
                                                <p class="h6 text-uppercase text-body-secondary mb-0 me-2">
                                                    {{ date('d/m/y, H:i', strtotime($berita_content->updated_at)) }} WIB
                                                </p>
                                            </div>

                                        </a>

                                    </div>

                                </div>
                            @endforeach
                        </div> <!-- / .row -->
                    </div> <!-- / .container -->
                </section>

                <!-- MORE -->
                <section class="py-7 py-md-10">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-12 col-md-9 col-lg-8 col-xl-7">

                                <!-- Button -->
                                <a href="/informasi/berita"
                                    class="btn w-100 btn-outline-gray-300 d-flex align-items-center">
                                    <span class="mx-auto">Load more</span> <i class="fe fe-arrow-right"></i>
                                </a>

                            </div>
                        </div> <!-- / .row -->
                    </div> <!-- / .container -->
                </section>
            </div> <!-- / .container -->

            <!--begin::Chart widget 3-->
            <!--end::Chart widget 3-->
    </section>

    <section class="py-8 py-md-11 bg-gradient-light-white" data-aos="fade-up" data-aos-delay="100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-10 col-lg-8 text-center">
                    @foreach ($berita_headers as $item)
                        <!-- Badge -->
                        <span class="badge rounded-pill text-bg-primary-subtle mb-3">
                            <span class="h6 text-uppercase">{{ $item->category }}</span>
                        </span>

                        <!-- Heading -->
                        <h1>
                            Grafik LSP <br>
                            Polinema
                        </h1>
                    @endforeach
                </div>
            </div>
            <div class="container">
                <section class="py-6 py-md-8 " data-aos="fade-up" data-aos-delay="100">
                    <div class="card_chart">
                        <h2>Pengguna LSP Polinema</h2>
                        <p>Month-to-month Comparison</p>
                        <div class="pulse"></div>
                        <div class="chart-area">
                            <div class="grid"></div>
                        </div>
                    </div>
                </section>
            </div>
        </div>

    </section>
    {{-- @include('landing-page.layouts.grafik') --}}

    <!-- LATEST POSTS -->
    <section class="py-8 py-md-8">
        <div class="container">
            <div class="row align-items-center">
                @foreach ($pengumuman as $item)
                    <div class="col-12 col-md-6">
                        <!-- Preheading -->
                        <h6 class="text-uppercase text-primary fw-bold">
                            {{ $item->heading }}
                        </h6>

                        <!-- Heading -->
                        <h2>
                            {{ $item->judul }}
                        </h2>

                        <!-- Text -->
                        <p class="text-body-secondary mb-6 mb-md-8">
                            {{ $item->deskripsi }}
                        </p>


                    </div>
                    <div class="col-12 col-md-6">

                        <!-- Image -->
                        <img src="{{ asset('uploads/' . $item->image) }}" class="img-fluid" alt="...">

                    </div>
                @endforeach
            </div> <!-- / .row -->
            <div class="row align-items-center">
                <div class="col-12 col-lg-12">
                    <!-- Card -->
                    <div class="card card-border border-primary shadow-light-lg mb-6 mb-md-8" data-aos="fade-up">
                        <div class="card-body">

                            <!-- Heading -->
                            <h6 class="text-uppercase text-primary d-inline-block mb-5 me-1">
                                KLASTER
                            </h6>

                            <!-- List group -->
                            <div>
                                <div class="list-group list-group-flush">
                                    @foreach ($list_pengumuman as $index => $item)
                                        @php
                                            $helpId = 'help' . ($index + 1);
                                            $helpHeadingId = $helpId . 'Heading';
                                            $helpAccordionId = 'helpAccordion' . ($index + 1);
                                        @endphp
                                        <a class="list-group-item text-reset text-decoration-none" href="#!"
                                            role="button" data-bs-toggle="collapse"
                                            data-bs-target="#{{ $helpId }}" aria-expanded="false"
                                            aria-controls="{{ $helpId }}">

                                            <p class="fw-bold fs-lg" id="{{ $helpHeadingId }}">
                                                {{ $item->judul }}
                                            </p>
                                            <p class="fs-sm text-body-secondary">
                                                {{ $item->sub_judul }}
                                            </p>
                                            <div class="accordion-collapse collapse" id="{{ $helpId }}"
                                                aria-labelledby="{{ $helpHeadingId }}"
                                                data-bs-parent="#{{ $helpAccordionId }}">
                                                <div class="accordion-body">

                                                    <!-- Text -->
                                                    <p class="text-gray-900">
                                                        {{ $item->deskripsi }}
                                                    </p>


                                                </div>
                                            </div>

                                        </a>
                                    @endforeach
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div> <!-- / .row -->
        </div> <!-- / .container -->
    </section>

@endsection
