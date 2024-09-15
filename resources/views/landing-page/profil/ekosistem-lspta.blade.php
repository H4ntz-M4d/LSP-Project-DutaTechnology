@extends('landing-page.layouts.layout')

@section('title', 'Ekosistem LSPTA')

@section('content')
    @foreach ($el_headers as $el_header)
        <!-- HEADER -->
        <section class="pt-4 pt-md-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-md-10 col-lg-9 col-xl-8 text-center">

                        <!-- Badge -->
                        <span class="badge rounded-pill text-bg-primary-subtle mb-4">
                            <span class="h6 text-uppercase">{{ $el_header->category }}</span>
                        </span>
                        <!-- Heading -->
                        <h1 class="display-4 mb-4">
                            {{ $el_header->title }}
                        </h1>
                        <div class="underline"></div>
                    </div>
                </div> <!-- / .row -->
            </div> <!-- / .container -->
        </section>
    @endforeach


    @foreach ($el_contents as $el_content)
        <!-- SECTION -->
        <section class="pt-6 pt-md-8">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-md-10 col-lg-9 col-xl-11">

                        <!-- Figure -->
                        <figure class="figure mb-6 text-center">

                            <!-- Image -->
                            <img class="figure-img img-fluid rounded lift lift-lg mx-auto d-block mb-4"
                                src="{{ asset('uploads/' . $el_content->gambar) }}" alt="...">

                            <!-- Caption -->
                            <figcaption class="figure-caption mb-4">
                                Gambar {{ $el_content->judul }}
                            </figcaption>

                        </figure>
                        <!-- Text -->
                        <p class="mb-6">
                            {!! $el_content->deskripsi !!}
                        </p>
                    </div>
                </div> <!-- / .row -->
            </div> <!-- / .container -->
        </section>
    @endforeach
@endsection
