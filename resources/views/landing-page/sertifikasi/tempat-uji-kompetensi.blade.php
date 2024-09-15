@extends('landing-page.layouts.layout')

@section('title', 'Ekosistem LSPTA')

@section('content')

    <!-- WELCOME -->
    <section class="position-relative pt-12 pt-md-12 mt-n11">

        <div class="row justify-content-center">
            <div class="col-12 col-md-10 col-lg-8 text-center">
                <!-- Headin -->
                <h1 class="display-3">
                    @if (!empty($header[0]))
                        {{ $header[0]->judul }}
                    @endif
                </h1>
            </div>
        </div>

    </section>

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
                                aria-label="Search our blog..." placeholder="Cari tempat..."
                                value="{{ request('search') }}">

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
                        <th scope="col">Nama TUK</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">No. Telepon</th>
                        <th scope="col">Email</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tabel as $post)
                        <tr>
                            <td scope="row">{{ $post->nama_tuk }}</td>
                            <td>{{ $post->alamat }}</td>
                            <td>{{ $post->no_telepon }}</td>
                            <td>{{ $post->email }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{ $tabel->links('pagination::bootstrap-5') }}
    </div>
@endsection
