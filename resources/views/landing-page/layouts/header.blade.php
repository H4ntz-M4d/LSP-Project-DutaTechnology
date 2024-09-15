    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg bg-white">
        <div class="container">

            <!-- Brand -->
            <a class="navbar-brand" href="/home">
                <img src="{{ asset('assets/img/illustrations/lsp_polinema.jpeg') }}" class="navbar-brand" alt="..."
                    width="110">
            </a>

            <!-- Toggler -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
                aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Collapse -->
            <div class="collapse navbar-collapse" id="navbarCollapse">

                <!-- Toggler -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
                    aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fe fe-x"></i>
                </button>

                <!-- Navigation -->
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" id="navbarLandings" href="/home" aria-haspopup="true"
                            aria-expanded="false">
                            Home
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarLandings" data-bs-toggle="dropdown" href="#"
                            aria-haspopup="true" aria-expanded="false">
                            Profil
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarProfile">
                            <a class="dropdown-item" href="/profil/sambutan-direktur">
                                Sambutan Direktur
                            </a>
                            <a class="dropdown-item" href="/profil/tentang-lsp">
                                Tentang LSP
                            </a>
                            <a class="dropdown-item" href="/profil/visi-misi">
                                Visi, Misi, dan Sasaran Mutu
                            </a>
                            <a class="dropdown-item" href="/profil/struktur-organisasi">
                                Struktur Organisasi
                            </a>
                            <a class="dropdown-item" href="/profil/ekosistem-lspta">
                                Ekosistem LSP
                            </a>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarPages" data-bs-toggle="dropdown" href="#"
                            aria-haspopup="true" aria-expanded="false">
                            Sertifikasi
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarSertikasi">
                            <a class="dropdown-item" href="/sertifikasi/alur-uji-dan-skema-sertifikasi">
                                Alur Uji dan Skema
                            </a>
                            <a class="dropdown-item" href="/sertifikasi/skkni">
                                SKKNI
                            </a>
                            <a class="dropdown-item" href="/sertifikasi/skema-sertifikasi">
                                Skema Sertifikasi
                            </a>
                            <a class="dropdown-item" href="/sertifikasi/tempat-uji-kompetensi">
                                Tempat Uji Kompetensi
                            </a>
                            <a class="dropdown-item" href="/sertifikasi/daftar-asesor">
                                Asesor
                            </a>
                            <a class="dropdown-item" href="pemegang-sertif.html">
                                Pemegang Sertifikat
                            </a>
                        </ul> <!-- / .row -->
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarAccount" data-bs-toggle="dropdown" href="#"
                            aria-haspopup="true" aria-expanded="false">
                            Informasi
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarAccount">
                            <a class="dropdown-item" href="/informasi/berita">
                                Berita
                            </a>
                            <a class="dropdown-item" href="/informasi/kalender-kegiatan">
                                Kalender Kegiatan
                            </a>
                            <a class="dropdown-item" href="/informasi/faq">
                                FAQ
                            </a>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDocumentation" data-bs-toggle="dropdown"
                            href="#" aria-haspopup="true" aria-expanded="false">
                            Formulir
                        </a>
                        <div class="dropdown-menu dropdown-menu-md" aria-labelledby="navbarDocumentation">
                            <div class="list-group list-group-flush">
                                <a class="list-group-item" href="/registrasi">

                                    <!-- Content -->
                                    <div class="ms-4">

                                        <!-- Heading -->
                                        <h6 class="fw-bold text-uppercase text-primary mb-0">
                                            Uji Kompetensi
                                        </h6>

                                        <!-- Text -->
                                        <p class="fs-sm text-gray-700 mb-0">
                                            Pendaftaran dan melakukan uji kompetensi
                                        </p>

                                    </div>

                                </a>
                                <a class="list-group-item" href="./docs/alerts.html">

                                    <!-- Content -->
                                    <div class="ms-4">

                                        <!-- Heading -->
                                        <h6 class="fw-bold text-uppercase text-primary mb-0">
                                            Pendaftaran Asesor
                                        </h6>

                                        <!-- Text -->
                                        <p class="fs-sm text-gray-700 mb-0">
                                            Melakukan pendaftaran untuk asesor
                                        </p>

                                    </div>

                                </a>
                                <a class="list-group-item" href="./docs/changelog.html">

                                    <!-- Content -->
                                    <div class="ms-4">

                                        <!-- Heading -->
                                        <h6 class="fw-bold text-uppercase text-primary mb-0">
                                            Pendaftaran TUK
                                        </h6>

                                        <!-- Text -->
                                        <p class="fs-sm text-gray-700 mb-0">
                                            Pendaftaran dari tempat uji kompetensi
                                        </p>

                                    </div>
                                </a>
                                <a class="list-group-item" href="./uji-kolektif.html">

                                    <!-- Content -->
                                    <div class="ms-4">

                                        <!-- Heading -->
                                        <h6 class="fw-bold text-uppercase text-primary mb-0">
                                            Permohonan Uji Kolektif
                                        </h6>

                                    </div>
                                </a>
                            </div>
                        </div>
                    </li>
                </ul>

                <!-- Button -->
                <a class="navbar-btn btn btn-sm btn-primary lift ms-auto" href="/login" target="_blank">
                    Login
                </a>

            </div>

        </div>
    </nav>
