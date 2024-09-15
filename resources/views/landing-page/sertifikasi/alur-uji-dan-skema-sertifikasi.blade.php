@extends('landing-page.layouts.layout')

@section('title', 'Alur Uji dan Skema Sertifikasi')

@section('content')
    @foreach ($au_ss_headers as $au_ss_header)
        <!-- HEADER -->
        <section class="pt-4 pt-md-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-md-10 col-lg-9 col-xl-8 text-center">

                        <!-- Badge -->
                        <span class="badge rounded-pill text-bg-primary-subtle mb-4">
                            <span class="h6 text-uppercase">{{ $au_ss_header->category }}</span>
                        </span>
                        <!-- Heading -->
                        <h1 class="display-4 mb-4">
                            {{ $au_ss_header->title }}
                        </h1>
                        <div class="underline"></div>
                    </div>
                </div> <!-- / .row -->
            </div> <!-- / .container -->
        </section>
    @endforeach


    @foreach ($au_ss_contents as $au_ss_content)
        <!-- SECTION -->
        <section class="pt-6 pt-md-8">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-md-10 col-lg-9 col-xl-11">

                        <!-- Figure -->
                        <figure class="figure mb-6 text-center">

                            <!-- Image -->
                            <img class="figure-img img-fluid rounded lift lift-lg mx-auto d-block mb-4"
                                src="{{ asset('uploads/' . $au_ss_content->gambar) }}" alt="...">

                            <!-- Caption -->
                            <figcaption class="figure-caption mb-4">
                                Gambar {{ $au_ss_content->judul }}
                            </figcaption>

                        </figure>

                        <!-- Text -->
                        <p class="mb-6">
                            {!! $au_ss_content->deskripsi !!}
                        </p>
                    </div>
                </div> <!-- / .row -->
            </div> <!-- / .container -->
        </section>
    @endforeach
@endsection
