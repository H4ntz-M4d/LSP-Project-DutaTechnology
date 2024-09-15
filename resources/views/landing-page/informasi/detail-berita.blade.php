@extends('landing-page.layouts.layout')

@section('title', 'Detail Berita')

@section('content')
    <!-- HEADER -->
    <section class="pt-6 pt-md-8">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-10 col-lg-9 col-xl-11">

                    <!-- Badge -->
                    <span class="badge rounded-pill text-bg-primary-subtle mb-4">
                        <span class="h6 text-uppercase">Informasi</span>
                    </span>
                    <!-- Heading -->
                    <h1 class="display-4 mb-4">
                        {{ $berita->judul }}
                    </h1>
                    <!-- Text -->
                    <small class="text-gray-700">
                        <span class="font-weight-bold">Lembaga Sertifikasi Profesi - </span>
                        <span>{{ date('d/m/y, H:i', strtotime($berita->updated_at)) }} WIB</span>
                    </small>
                </div>
            </div> <!-- / .row -->
        </div> <!-- / .container -->
    </section>


    <!-- SECTION -->
    <section class="mb-6 pt-6 pt-md-8">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-10 col-lg-9 col-xl-11">

                    <!-- Figure -->
                    <figure class="figure mb-6 text-center">

                        <!-- Image -->
                        <img class="figure-img img-fluid rounded lift lift-lg mx-auto d-block mb-4"
                            src="{{ asset('uploads/' . $berita->gambar) }}" alt="...">

                        <!-- Caption -->
                        <figcaption class="figure-caption mb-4">
                            Gambar {{ $berita->judul }}
                        </figcaption>

                    </figure>

                    <!-- Text -->
                    <p class="mb-6">
                        {!! $berita->deskripsi !!}
                    </p>

                </div>
            </div> <!-- / .row -->
        </div> <!-- / .container -->
    </section>
@endsection
