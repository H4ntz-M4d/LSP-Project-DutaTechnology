@extends('landing-page.layouts.layout')

@section('title', 'Lembaga Sertifikasi Profesi Teknik Akutansi')

@section('content')

    <body class="bg-light">
        @foreach ($berita_headers as $berita_header)
            <!-- MODALS -->
            <!-- Heading -->
            <section class="pt-4 pt-md-5">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-12 col-md-10 col-lg-9 col-xl-8 text-center">

                            <!-- Badge -->
                            <span class="badge rounded-pill text-bg-primary-subtle mb-4">
                                <span class="h6 text-uppercase">{{ $berita_header->category }}</span>
                            </span>
                            <!-- Heading -->
                            <h1 class="display-4 mb-4">
                                {{ $berita_header->title }} <br>
                                {{ $berita_header->sub_title }}
                            </h1>
                            <!-- Text -->
                            <p class="fs-lg text-body-secondary mb-7 mb-md-9">
                                {{ $berita_header->description }}
                            </p>

                            <div class="underline"></div>
                        </div>
                    </div> <!-- / .row -->
                </div> <!-- / .container -->
            </section>
        @endforeach
        <!-- ARTICLES -->
        <section class="mt-8">
            <div class="container">
                <div class="row">
                    @foreach ($berita_contents as $berita_content)
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
                        <div class="justify-content-center">
                            {{ $berita_contents->links('pagination::bootstrap-5') }}
                        </div>

                    </div>
                </div> <!-- / .row -->
            </div> <!-- / .container -->
        </section>

        <!-- SHAPE -->
        <div class="position-relative">
            <div class="shape shape-bottom shape-fluid-x text-gray-200">
                <svg viewBox="0 0 2880 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0 48h2880V0h-720C1442.5 52 720 0 720 0H0v48z" fill="currentColor" />
                </svg>
            </div>
        </div>



    </body>
@endsection
