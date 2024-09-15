@extends('landing-page.layouts.layout')

@section('title', 'Lembaga Sertifikasi Profesi Teknik Akutansi')

@section('content')
    <section class="pt-4 pt-md-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-10 col-lg-9 col-xl-8 text-center">

                    <!-- Badge -->
                    <span class="badge rounded-pill text-bg-primary-subtle mb-4">
                        <span class="h6 text-uppercase">{{ $kk_headers->category }}</span>
                    </span>
                    <!-- Heading -->
                    <h1 class="display-4 mb-4">
                        {{ $kk_headers->title }}
                    </h1>
                    <div class="underline"></div>
                </div>
            </div> <!-- / .row -->
        </div> <!-- / .container -->
    </section>
    @foreach ($bulan as $bulanItem)
        <section class="pt-6 pt-md-8">
            <div class="container pb-8 pb-md-11 border-bottom border-gray-300">
                <div class="row align-items-center mb-5">
                    <div class="col">

                        <!-- Heading -->
                        <h4 class="fw-bold mb-1">
                            {{ $bulanItem->bulan }}
                        </h4>

                        <!-- Text -->
                        <p class="fs-sm text-body-secondary mb-0">
                            Dibuat oleh Lembaga Sertifikasi Profesi
                        </p>

                    </div>
                    <div class="col-auto">

                        <!-- Badge -->
                        <span class="badge rounded-pill text-bg-success-subtle">
                            <span class="h6 text-uppercase">{{ $jumlahDataPerBulan[$bulanItem->id] }} Kegiatan</span>
                        </span>

                    </div>
                </div> <!-- / .row -->
                <div class="row">
                    <div class="col-12">

                        <!-- Table -->
                        <div class="table-responsive mb-0 mb-md-0">
                            <table class="table table-align-middle">
                                <thead>
                                    <tr>
                                        <th>
                                            <span class="h6 text-uppercase fw-bold">
                                                Kegiatan
                                            </span>
                                        </th>
                                        <th>
                                            <span class="h6 text-uppercase fw-bold">
                                                Minggu
                                            </span>
                                        </th>
                                        <th>
                                            <span class="h6 text-uppercase fw-bold">
                                                Bulan
                                            </span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($kalenderKegiatan[$bulanItem->id] as $kegiatan)
                                        <tr>
                                            <td>

                                                <a href="career-single.html" class="text-reset text-decoration-none">
                                                    <p class="mb-1">
                                                        {{ $kegiatan->kegiatan }}
                                                    </p>
                                                    <p class="fs-sm text-body-secondary mb-0">
                                                        Dibuat oleh Lembaga Sertifikasi Profesi
                                                    </p>
                                                </a>

                                            </td>
                                            <td>

                                                <a href="career-single.html" class="text-reset text-decoration-none">
                                                    <p class="fs-sm mb-0">
                                                        {{ $kegiatan->minggu }}
                                                    </p>
                                                </a>

                                            </td>
                                            <td>
                                                <a href="career-single.html" class="text-reset text-decoration-none">
                                                    <p class="fs-sm mb-0">
                                                        {{ $kegiatan->bulan->bulan }}
                                                    </p>
                                                </a>


                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div> <!-- / .row -->
            </div>
        </section>
    @endforeach
@endsection
