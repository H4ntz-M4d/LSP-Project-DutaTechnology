@extends('landing-page.layouts.layout')

@section('title', 'Visi Misi LSP Polinema')

@section('content')
    <!-- HEADER -->
    @foreach ($visi_content as $item)
        <section class="pt-8 pt-md-11">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-md-10 col-lg-9 col-xl-8">

                        <!-- Heading -->
                        <h1 class="display-4 text-center">
                            {{ $item->judul }}
                        </h1>

                        <!-- Text -->
                        <h2 class="mb-1 text-center text-body-secondary">
                            {!! $item->sub_judul !!}
                        </h2>

                    </div>
                </div> <!-- / .row -->
            </div> <!-- / .container -->
        </section>

        <!-- SECTION -->
        <section class="py-3 py-md-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-md-10 col-lg-9 col-xl-11">

                        <!-- Text -->
                        <p class="mb-0">
                            {!! $item->text !!}
                        </p>

                    </div>
                </div> <!-- / .row -->
            </div> <!-- / .container -->
        </section>
    @endforeach

@endsection
