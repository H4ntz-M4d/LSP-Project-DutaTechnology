@extends('landing-page.layouts.layout')

@section('title', 'Ekosistem LSPTA')

@section('content')


    <!-- WELCOME -->
    <section data-jarallax data-speed=".8" class="pt-10 pb-11 py-md-14 overlay overlay-black overlay-60 jarallax"
        style="background-image: url(assets/img/covers/cover-4.jpg);">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-10 col-lg-8 text-center">

                    <!-- Heading -->
                    <h1 class="display-2 fw-bold text-white">
                        @if (!empty($header[0]))
                            {{ $header[0]->judul }}
                        @endif
                    </h1>

                </div>
            </div> <!-- / .row -->
        </div> <!-- / .container -->
    </section>

    <!-- SHAPE -->
    <div class="position-relative">
        <div class="shape shape-bottom shape-fluid-x text-light">
            <svg viewBox="0 0 2880 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M0 48h2880V0h-720C1442.5 52 720 0 720 0H0v48z" fill="currentColor" />
            </svg>
        </div>
    </div>

    <!-- SEARCH -->
    <section class="py-6">
        <div class="container">
            <div class="row">
                <div class="col-12">

                    <!-- Form -->
                    <form class="rounded shadow">
                        <div class="input-group input-group-lg">

                            <!-- Text -->
                            <span class="input-group-text border-0 pe-1">
                                <i class="fe fe-search"></i>
                            </span>

                            <!-- Input -->
                            <input type="search" id="search" name="search" class="form-control border-0 px-1"
                                aria-label="Cari Nama" placeholder="Cari nama...." value="{{ request('search') }}">

                            <!-- Text -->
                            <span class="input-group-text border-0 py-0 ps-1 pe-3">

                                <!-- Button -->
                                <button type="submit" class="btn btn-sm btn-primary">
                                    Search
                                </button>

                            </span>

                        </div>
                    </form>

                </div>
            </div> <!-- / .row -->
        </div>
    </section>

    <!--table-->
    <div class="container">
        <div class="table-responsive" data-aos="zoom-in">
            <table class="table table-dark table-bordered dataTable table-striped">
                <thead>
                    <tr role="row">
                        <th scope="col">No Register</th>
                        <th scope="col">Nama Lengkap</th>
                        <th scope="col">Instansi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tabel as $post)
                        <tr>
                            <td scope="row">{{ $post->no_register }}</td>
                            <td>{{ $post->nama_lengkap }}</td>
                            <td>{{ $post->instansi }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{ $tabel->links('pagination::bootstrap-5') }}
    </div>
@endsection
