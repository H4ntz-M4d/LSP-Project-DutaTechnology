@extends('landing-page.layouts.layout')

@section('title', 'Ekosistem LSPTA')

@section('content')

    <!-- Shape -->
    <div class="shape shape-fluid-x shape-blur-2" style="color: #EEF5FF;">
        <svg viewBox="0 0 1400 768" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path
                d="M442.794 768c163.088 0 305.568-88.227 382.317-219.556l.183.556s.249-.749.762-2.181a440.362 440.362 0 0033.192-71.389C901.996 397.81 989.306 277.09 1144.29 206l-.92-.693C1230.34 171.296 1295.63 94.049 1312.83 0H1.294v295.514c-.663 9.909-1 19.908-1 29.986 0 244.386 198.114 442.5 442.5 442.5z"
                fill="currentColor" />
        </svg>
    </div>

    <!-- WELCOME -->
    <section class="position-relative pt-12 pt-md-12 mt-n11">

        <div class="row justify-content-center">
            <div class="col-12 col-md-10 col-lg-8 text-center">
                <!-- Headin -->
                <h1 class="display-3">
                    @foreach ($skema as $post)
                        {{ $post->judul }}
                    @endforeach
                </h1>
            </div>
        </div>

    </section>

    <!-- FLEXIBILITY -->

    <section class="pt-8 pb-8 pt-md-10 ">
        <div class="container">
            <div class="row gx-4 gy-4">

                @foreach ($modal as $post)
                    <div class="col-12 col-md-4 col-lg-3" data-aos="zoom-in">
                        <!-- Card -->
                        <div class="card shadow-light-lg mb-6 mb-md-0 lift lift-lg"
                            style="border-top: 2px solid #335EEA;  min-height: 320px;">
                            <!-- Image -->
                            <div class="icon icon-sm text-primary img-fluid mb-5 w-50 "
                                style="padding-left: 25px; padding-top: 25px;">
                                <a href="#detailCard{{ $post->id }}" data-bs-toggle="modal">
                                    <svg width="37" height="37" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <g fill="none" fill-rule="evenodd">
                                            <path d="M0 0h24v24H0z" />
                                            <path
                                                d="M5.857 2h7.88a1.5 1.5 0 01.968.355l4.764 4.029A1.5 1.5 0 0120 7.529v12.554c0 1.79-.02 1.917-1.857 1.917H5.857C4.02 22 4 21.874 4 20.083V3.917C4 2.127 4.02 2 5.857 2z"
                                                fill="#335EEA" opacity=".3" />
                                            <rect fill="#335EEA" x="6" y="11" width="9" height="2"
                                                rx="1" />
                                            <rect fill="#335EEA" x="6" y="15" width="5" height="2"
                                                rx="1" />
                                        </g>
                                    </svg>
                                </a>
                            </div>
                            <!-- Body -->
                            <div class="position-relative"
                                style="margin-left: 20px; margin-right: 20px; margin-bottom: 20px;">
                                <!-- Text -->
                                <p class="text-gray-700">
                                    {{ $post->judul_modal }}
                                </p>

                                <!-- Link -->
                                <a href="#detailCard{{ $post->id }}" data-bs-toggle="modal" style="color: #335eea">Read
                                    More</a>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div> <!-- / .row -->
        </div> <!-- / .container -->
    </section>


    @foreach ($modal as $post)
        <!-- detailCard  -->
        <div class="modal fade" id="detailCard{{ $post->id }}" tabindex="-1" role="dialog"
            aria-labelledby="modalTitle{{ $post->id }}" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content" style="align-items: center;">
                    <div class="card">

                        <div class="container">
                            <div class="header mt-3">
                                <h3 id="modalTitle{{ $post->id }}"><strong>{{ $post->judul_modal }}</strong></h3><br>
                                <button type="button" class="btn-close mt-1" data-bs-dismiss="modal" aria-label="Close"
                                    style="border: 2px solid #000; padding: 8px; border-radius: 100%;"></button>
                            </div>
                            <div class="subheader">
                                <strong> {{ $post->sub_judul_modal }} </strong>
                            </div>
                            <div class="content">
                                {!! $post->isi_modal !!}
                            </div>
                        </div>

                        </body>

                    </div>
                </div>
            </div>
        </div>
    @endforeach

@endsection
