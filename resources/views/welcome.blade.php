<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="light-style layout-navbar-fixed layout-wide ">

<head>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Google Tag Manager -->
    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-W8KFZ82R');
    </script>
    <!-- End Google Tag Manager -->

    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=yes, minimum-scale=1.0, maximum-scale=5.0" />

    <title>PPDB Aceh 2024 - Dinas Pendidikan Aceh</title>


    <meta name="description" content="Penerimaan Peserta Didik Baru Dinas Pendidikan Aceh" />
    <meta name="keywords" content="ppdb, dinas pendidikan aceh, aceh, zonasi">
    <!-- Canonical SEO -->



    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('storage/images/icon.webp') }}" />

    <!-- Fonts -->
    {{-- <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet"> --}}


    <link rel="stylesheet" href="{{ asset('front/css/boxicons.css') }}" />
    <link href="{{ asset('front/select2/css/select2.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('front/select2-bootstrap-5-theme/select2-bootstrap-5-theme.min.css') }}" rel="stylesheet" />


    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('front/css/core.css') }}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('front/css/themedefault.css') }}" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('front/css/demo.css') }}" />
    <!--<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">-->

    <link rel="stylesheet" href="{{ asset('front/css/front-page.css') }}" />
    <link rel="stylesheet" href="{{ asset('front/css/pengumuman.css') }}" />
    <!-- Vendors CSS -->

    <link rel="stylesheet" href="{{ asset('front/css/nouislider.css') }}" />
    <link rel="stylesheet" href="{{ asset('front/css/swiper.css') }}" />

    <!-- Page CSS -->
    <link rel="stylesheet" href="{{ asset('front/css/dataTables.css') }}" />
    <link rel="stylesheet" href="{{ asset('front/css/front-page-landing.css') }}" />

    <!-- Helpers -->
    <script src="{{ asset('front/js/helpers.js') }}"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
    <!--<script src="{{ asset('front/js/template-customizer.js') }}"></script>-->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{ asset('front/js/front-config.js') }}"></script>

    <script src="{{ asset('front/js/dropdown-hover.js') }}"></script>
    <script src="{{ asset('front/js/mega-dropdown.js') }}"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">


</head>

<body>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-W8KFZ82R" height="0" width="0"
            style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->


    <!-- Navbar: Start -->
    <nav class="layout-navbar shadow-none py-0">
        <div class="container">
            <div class="navbar navbar-expand-lg landing-navbar px-3 px-md-4 ">
                <!-- Menu logo wrapper: Start -->
                <div class="navbar-brand app-brand demo d-flex py-0 me-4">
                    <!-- Mobile menu toggle: Start-->
                    <button class="navbar-toggler border-0 px-0 me-2" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <i class="tf-icons bx bx-menu bx-sm align-middle"></i>
                    </button>
                    <!-- Mobile menu toggle: End-->
                    <a href="/" class="app-brand-link">
                        <span class="app-brand-logo demo">

                            <img src="{{ 'storage/images/PPDB12.webp' }}" class="d-lg-none d-md-none" width="100"
                                alt="">
                            <img src="{{ 'storage/images/PPDB12.webp' }}" class="d-none d-sm-block" width="150"
                                alt="">

                        </span>
                        {{-- <span class="app-brand-text demo menu-text fw-bold ms-2 ps-1">Sneat</span> --}}
                    </a>
                </div>
                <!-- Menu logo wrapper: End -->
                <!-- Menu wrapper: Start -->
                <div class="collapse navbar-collapse landing-nav-menu" id="navbarSupportedContent">
                    <button class="navbar-toggler border-0 text-heading position-absolute end-0 top-0 scaleX-n1-rtl"
                        type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="tf-icons bx bx-x bx-sm"></i>
                    </button>
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link fw-medium" aria-current="page" href="/#landingHome">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fw-medium" href="/#landingZonasi">Zonasi PPDB</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link fw-medium" href="/#landingDokumen">Dokumen Pendukung</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link fw-medium" href="/pengaduanWilayah">Pengaduan Wilayah</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link fw-medium" href="/#landingFAQ">FAQ</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link fw-medium" href="/#landingPengaduan">Helpdesk</a>
                        </li>

                    </ul>
                </div>
                <div class="landing-menu-overlay d-lg-none"></div>
                <!-- Menu wrapper: End -->
                <!-- Toolbar: Start -->
                <ul class="navbar-nav flex-row align-items-center ms-auto">

                    <!-- navbar button: Start -->
                    <li>
                        <a href="/login" class="btn glass-btn" target="_blank">
                            <span class="tf-icons bx bx-user me-md-1 text-container blur-animation"></span>
                            <span class="d-none d-md-block text-container blur-animation">Login</span>
                        </a>
                    </li>
                    <!-- navbar button: End -->
                </ul>
                <!-- Toolbar: End -->
            </div>
        </div>
    </nav>
    <!-- Navbar: End -->


    <!-- Sections:Start -->
    <div data-bs-spy="scroll" class="scrollspy-example ">
        <!-- Hero: Start -->
        <section id="hero-animation">
            <div id="landingHome" class="section-py landing-hero position-relative">
                <div class="container">
                    <div class="hero-text-box text-center">

                        <div id="countdown" class="mb-4 atas"></div>
                        <h1 class="text-primary hero-title display-4 fw-bold">P P D B <br>Dinas Pendidikan Aceh</h1>
                        <h2 class="hero-sub-title h6 mb-4 pb-1">
                            <span class="badge bg-info">Jalur</span> <span class="badge bg-danger">Prestasi </span>
                            <span class="badge bg-dark">Zonasi</span> <span class="badge bg-danger">Afirmasi dan
                                Perpindahan Orang tua</span>
                        </h2>
                        <div class="landing-hero-btn d-inline-block position-relative">
                            <span class="hero-btn-item position-absolute d-none d-md-flex text-heading">Daftar segera
                                <img src="{{ asset('storage/images/Join-community-arrow.png') }} "
                                    alt="Join community arrow" class="scaleX-n1-rtl" /></span>

                            @foreach ($setPendaftaran as $p)
                                @if ($p->mode == 1)
                                    <a href="/register" target="_blank" class="btn btn-primary">Ayo mulai daftar </a>
                                @elseif($p->mode == 0)
                                    <a href="#" target="_blank" class="btn btn-danger disabled">Sesi
                                        Pendaftaran <br> Sudah ditutup </a>
                                @endif
                            @endforeach
                        </div>
                    </div>
                    <div id="heroDashboardAnimation" class="hero-animation-img">
                        <a href="/" target="_blank">
                            <div id="heroAnimationImg" class="position-relative hero-dashboard-img">
                                <img src="{{ asset('storage/images/PPDB.webp') }}" alt="hero dashboard"
                                    class="animation-img"
                                    style="margin-top: 3em;border-radius:50px;box-shadow: 0 1px 10px 2px #1d1d1d6b;" />

                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="landing-hero-blank">

            </div>
        </section>
        <!-- Hero: End -->

        <!-- Useful features: Start -->
        <section id="landingZonasi" class="section-py landing-features">
            <div class="container">
                <div class="text-center mb-3 pb-1">
                    <span class="badge bg-label-primary">Zonasi
                        PPDB</span>
                </div>
                <h3 class="text-center mb-1">
                    <span class="section-title">Pencarian wilayah zonasi sekolah</span>
                </h3>
                <p class="text-center mb-3 mb-md-5 pb-3">
                    Sesuaikan dengan data <b>NISN</b> atau <b>KK</b> Calon Peserta Didik.
                </p>
                <div class="features-icon-wrapper row gx-0 gy-4 g-sm-5">
                    <div class="col-lg-6 col-sm-6 text-center features-icon-box">
                        <div class="text-center mb-3">
                            <img src="{{ asset('storage/images/laptop.webp') }}" alt="lifebelt" />
                        </div>
                        <h5 class="mb-3">Verifikasi Data Via Data NISN</h5>
                        <p class="features-icon-description">Menverifikasi NISN Calon Pesera Didik yang dilakukan
                            melalui Laman <br> <a href="https://nisn.data.kemdikbud.go.id/"
                                target="_blank"><b>https://nisn.data.kemdikbud.go.id</b></a>.</p>
                    </div>
                    <div class="col-lg-6 col-sm-6 text-center features-icon-box">
                        <div class="text-center mb-3">
                            <img src="{{ asset('storage/images/keyboard.webp') }}" alt="google docs" />
                        </div>
                        <h5 class="mb-3">Verifikasi Data Kartu Keluarga (KK)</h5>
                        <p class="features-icon-description">Menverifikasi data Kependudukan yang ada di Kartu Keluarga
                            dan Membandingkan dengan data pada Sistem NISN.</p>
                        </p>
                    </div>
                </div>
                <div class="dtzonasi">
                    <div class="text-center mb-4">
                        <span class="badge bg-label-primary">Cek Zonasi PPDB</span>
                    </div>

                    {{-- <form id="searchForm"> --}}
                    <div class="row">
                        <div class="col-lg-6">
                            {{-- <label>Kode</label> --}}
                            <div class="form-group mb-2">
                                <select name="kabupaten" id="kabupaten" class="form-select input">
                                    <option value="">--Pilih Kabupaten--</option>
                                    @foreach ($kabupaten as $p)
                                        <option value="{{ $p->nm_kab }}">{{ $p->nm_kab }}</option>
                                    @endforeach
                                </select>
                            </div>

                            {{-- <select name="desa" id="desa" class="form-control">
                            </select> --}}
                            <div class="form-group  mb-2">
                                <select name="kecamatan" id="kecamatan" value="{{ old('kecamatan') }}"
                                    class="form-select input">
                                    <option>---Pilih Kecamatan---</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            {{-- <select name="desa" id="desa" class="form-control">
                            </select> --}}

                            <div class="form-group mb-2">
                                <select type="search" name="q" id="desa" value="{{ old('q') }}"
                                    class="form-control">
                                    <option>---Pilih Desa---</option>
                                </select>
                            </div>

                            <div class="form-group mb-2">
                                <div class="input-group-append">
                                    <button type="button" id="searchButton" class="btn btn-primary"
                                        style="width:100%;">
                                        <i class="bx bx-search"></i>&nbsp; Cari Data zonasi
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- </form> --}}

                </div>

                <div id="result"></div>
                <div id="loading" class="text-center" style="display: none;">
                    <div class="spinner-border text-primary" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                </div>

            </div>
        </section>
        <!-- Useful features: End -->

        <!-- Real customers reviews: Start -->
        <section id="landingAlur" class="section-py bg-body landing-reviews pb-0">
            <!-- What people say slider: Start -->
            <div class="container">
                <div class="row align-items-center gx-0 gy-4 g-lg-5">
                    <div class="col-md-6 col-lg-5 col-xl-3">
                        <div class="mb-3 pb-1">
                            <span class="badge bg-label-primary">Bagan Alur Pendaftaran</span>
                        </div>
                        <h3 class="mb-1"><span class="section-title">Infografis</span></h3>
                        <p class="mb-3 mb-md-5">
                            Informasi mengenai alur Pendaftaran Peserta Didik Baru.
                        </p>
                        <div class="landing-reviews-btns d-flex align-items-center gap-3">
                            <button id="reviews-previous-btn" class="btn btn-label-primary reviews-btn"
                                type="button">
                                <i class="bx bx-chevron-left bx-sm"></i>
                            </button>
                            <button id="reviews-next-btn" class="btn btn-label-primary reviews-btn" type="button">
                                <i class="bx bx-chevron-right bx-sm"></i>
                            </button>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-7 col-xl-9">
                        <div class="swiper-reviews-carousel overflow-hidden mb-5 pb-md-2 pb-md-3">
                            <div class="swiper" id="swiper-reviews">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <div class="card h-100">
                                            <img src="{{ asset('storage/images/infografis/7.webp') }}"
                                                alt="client logo" class=" img-fluid"
                                                style="width: 100%;border-radius:7px;" />
                                        </div>
                                    </div>

                                    <div class="swiper-slide">
                                        <div class="card h-100">
                                            <img src="{{ asset('storage/images/infografis/persyaratan1.webp') }}"
                                                alt="client logo" class=" img-fluid"
                                                style="width: 100%;border-radius:7px;" />
                                        </div>
                                    </div>

                                    <div class="swiper-slide">
                                        <div class="card h-100">
                                            <img src="{{ asset('storage/images/infografis/persyaratan2.webp') }}"
                                                alt="client logo" class=" img-fluid"
                                                style="width: 100%;border-radius:7px;" />
                                        </div>
                                    </div>

                                    <div class="swiper-slide">
                                        <div class="card h-100">
                                            <img src="{{ asset('storage/images/infografis/alur.webp') }}"
                                                alt="client logo" class=" img-fluid"
                                                style="width: 100%;border-radius:7px;" />
                                        </div>
                                    </div>

                                    <div class="swiper-slide">
                                        <div class="card h-100">
                                            <img src="{{ asset('storage/images/infografis/5.webp') }}"
                                                alt="client logo" class=" img-fluid"
                                                style="width: 100%;border-radius:7px;" />
                                        </div>
                                    </div>

                                    <div class="swiper-slide">
                                        <div class="card h-100">
                                            <img src="{{ asset('storage/images/infografis/6.webp') }}"
                                                alt="client logo" class=" img-fluid"
                                                style="width: 100%;border-radius:7px;" />
                                        </div>
                                    </div>


                                </div>
                                <div class="swiper-button-next"></div>
                                <div class="swiper-button-prev"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- What people say slider: End -->
            <hr class="m-0" />
            <!-- Logo slider: Start -->

            <!-- Logo slider: End -->
        </section>
        <!-- Real customers reviews: End -->

        <!-- Our great team: Start -->
        <section id="landingDokumen" class="section-py landing-team">
            <div class="container">
                <div class="text-center mb-3 pb-1">
                    <span class="badge bg-label-primary">Dokumen
                        Pendukung</span>
                </div>
                <h3 class="text-center mb-1">
                    <span class="section-title">Dokumen Pendukung Sekolah Juara Untuk Semua
                    </span>
                </h3>
                <p class="text-center mb-md-5 pb-3">Dokumen yang
                    menyediakan informasi tambahan atau dukungan untuk
                    topik tertentu. Mereka digunakan untuk memberikan rincian, bukti, atau penjelasan yang lebih lengkap
                    tentang subjek yang sedang dibahas. Dokumen pendukung sering digunakan dalam berbagai konteks,
                    termasuk bisnis, hukum, akademik, dan administratif.</p>
                <div class="row gy-5 ">
                    <div class="col-lg-6">
                        <img src="{{ asset('storage/images/file.webp') }}" alt="google docs" class=" w-100" />
                    </div>
                    <div class="col-lg-6">
                        <div class="accordion" id="accordionExample">
                            <div class="card accordion-item active">
                                <h2 class="accordion-header" id="headingOne">
                                    <button type="button" class="accordion-button" data-bs-toggle="collapse"
                                        data-bs-target="#accordionOne" aria-expanded="true"
                                        aria-controls="accordionOne">
                                        Surat Pernyataan Pertanggung Jawaban Mutlak
                                    </button>
                                </h2>

                                <div id="accordionOne" class="accordion-collapse collapse show"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <ul>
                                            <li>Link Download</li>
                                            <ul>
                                                <li>
                                                    <a
                                                        href="https://bit.ly/Surat_SPTJM_2024">https://bit.ly/Surat_SPTJM_2024</a>
                                                </li>
                                            </ul>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="card accordion-item active">
                                <h2 class="accordion-header" id="headingTwo">
                                    <button type="button" class="accordion-button collapsed"
                                        data-bs-toggle="collapse" data-bs-target="#accordionTwo"
                                        aria-expanded="false" aria-controls="accordionTwo">
                                        Materi Sosialisasi
                                    </button>
                                </h2>
                                <div id="accordionTwo" class="accordion-collapse collapse show"
                                    aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <ul>
                                            <li>Materi Sosialisasi PPDB Aceh</li>
                                            <ul>
                                                <li>
                                                    <a href="">https://bit.ly/MATERI_SOSIALISASI_PPDB_2024</a>
                                                </li>
                                            </ul>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="card accordion-item active">
                                <h2 class="accordion-header" id="headingFour">
                                    <button type="button" class="accordion-button collapsed"
                                        data-bs-toggle="collapse" data-bs-target="#accordionFour"
                                        aria-expanded="false" aria-controls="accordionFour">
                                        Format Verifikasi Dokumen Persyaratan PPDB
                                    </button>
                                </h2>
                                <div id="accordionFour" class="accordion-collapse collapse show"
                                    aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <ul>
                                            <li>Format Verifikasi Dokumen Persyaratan PPDB</li>
                                            <ul>
                                                <li><a href="">https://bit.ly/Format_Verifikasi_Dokumen_PPDB</a>
                                                </li>
                                            </ul>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="card accordion-item active" style="border-radius:10px;">
                                <h2 class="accordion-header" id="headingFive">
                                    <button type="button" class="accordion-button collapsed"
                                        data-bs-toggle="collapse" data-bs-target="#accordionFive"
                                        aria-expanded="false" aria-controls="accordionFive">
                                        Tanggung Jawab Mutlak/Pakta Integritas Keluarga Ekonomi Tidak Mampu
                                    </button>
                                </h2>
                                <div id="accordionFive" class="accordion-collapse collapse show"
                                    aria-labelledby="headingFive" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <ul>
                                            <li>Tanggung Jawab Mutlak/Pakta Integritas Keluarga Ekonomi Tidak Mampu
                                            </li>
                                            <ul>
                                                <li><a
                                                        href="">https://bit.ly/Dokumen_Keluarga_Ekonomi_Tidak_Mampu</a>
                                                </li>
                                            </ul>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Our great team: End -->


        <!-- Fun facts: Start -->
        <section id="landingFunFacts" class="section-py landing-fun-facts">
            <div class="container">
                <div class="row gy-3 text-center">
                    <div class="text-center mb-3 pb-1">
                        <span class="badge bg-label-primary">Total Kuota
                            Setiap Jalur</span>
                        <p>Hanya Buka Jalur <b>ZONASI</b></p>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="card border border-label-success shadow-none">
                            <div class="card-body text-center">
                                <img src="{{ asset('storage/images/award.webp') }}" width="60" alt="laptop"
                                    class="mb-2" />
                                <h5 class="h2 mb-1">30 %</h5>
                                <p class="fw-medium mb-0">
                                    Jalur Prestasi
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-lg-3">
                        <div class="card border border-label-primary shadow-none">
                            <div class="card-body text-center">
                                <img src="{{ asset('storage/images/zonasi.webp') }}" width="60" alt="laptop"
                                    class="mb-2" />
                                <h5 class="h2 mb-1">50 %</h5>
                                <p class="fw-medium mb-0">
                                    Jalur Zonasi
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-lg-3">
                        <div class="card border border-label-warning shadow-none">
                            <div class="card-body text-center">
                                <img src="{{ asset('storage/images/afirmasi.webp') }}" width="60" alt="laptop"
                                    class="mb-2" />
                                <h5 class="h2 mb-1">15 %</h5>
                                <p class="fw-medium mb-0">
                                    Afirmasi
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-lg-3">
                        <div class="card border border-label-info shadow-none">
                            <div class="card-body text-center">
                                <img src="{{ asset('storage/images/job.webp') }}" width="60" alt="laptop"
                                    class="mb-2" />
                                <h5 class="h2 mb-1">5 %</h5>
                                <p class="fw-medium mb-0">
                                    Jalur Perpindahan Orang Tua
                                </p>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="mt-4 text-center">
                    <h5>Tabel Pemantauan Kuota Sekolah dan Jumlah Pendaftar</h5>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped" id="dt-zonasi-table">
                        <thead>
                            <tr>
                                <th class="text-left align-middle">#</th>
                                <th class="text-left align-middle">jenjang</th>
                                <th class="text-left align-middle">npsn</th>
                                <th class="text-left align-middle">sekolah</th>
                                <th class="text-left align-middle">status</th>
                                <th class="text-left align-middle">Kuota</th>
                                <th class="text-left align-middle">Jumlah Pendaftar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php  $i=1 @endphp
                            @foreach ($total_daftar as $data)
                                <tr>
                                    <td class="text-left align-middle">{{ $i++ }}</td>
                                    <td class="text-left align-middle">{{ $data->jenjang }}</td>
                                    <td class="text-left align-middle">{{ $data->npsn }}</td>
                                    <td class="text-left align-middle">{{ $data->satpen }}</td>
                                    <td class="text-left align-middle">{{ $data->status }}</td>
                                    <td class="text-left align-middle">{{ $data->kuota }}</td>
                                    <td class="text-left align-middle"
                                        style="color: {{ $data->kuota < $data->cpd_zonasi_count ? 'red' : 'black' }}">
                                        <b>{{ $data->cpd_zonasi_count }}</b> Pendaftar
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
        <!-- Fun facts: End -->

        <!-- FAQ: Start -->
        <section id="landingFAQ" class="section-py bg-body landing-faq">

            <div class="container">
                <div class="text-center mb-3 pb-1">
                    <span class="badge bg-label-primary">FAQ</span>
                </div>
                <h3 class="text-center mb-1">Frequently asked <span class="section-title">questions</span></h3>
                <p class="text-center mb-5 pb-3">Beberapa pertanyaan yang
                    sering atau banyak ditanyakan.
                </p>
                <div class="row gy-5">
                    <div class="col-lg-5">
                        <div class="text-center">
                            <img src="{{ asset('storage/images/faq.png') }}" alt="faq boy with logos"
                                class="faq-image w-100" />
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="accordion" id="accordionExample">
                            <div class="card accordion-item active">
                                <h2 class="accordion-header" id="headingOne">
                                    <button type="button" class="accordion-button" data-bs-toggle="collapse"
                                        data-bs-target="#accordionOne" aria-expanded="true"
                                        aria-controls="accordionOne">
                                        Bagaimana kriteria seleksi jalur zonasi SMA ?
                                    </button>
                                </h2>

                                <div id="accordionOne" class="accordion-collapse collapse show"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        Ditentukan berdasarkan jarak. Namun, jika ada beberapa peserta dengan jumlah
                                        nilai yang sama, maka diutamakan peserta yang lebih tua.
                                    </div>
                                </div>
                            </div>
                            <div class="card accordion-item">
                                <h2 class="accordion-header" id="headingTwo">
                                    <button type="button" class="accordion-button collapsed"
                                        data-bs-toggle="collapse" data-bs-target="#accordionTwo"
                                        aria-expanded="false" aria-controls="accordionTwo">
                                        Kapan dilaksanakan pendaftaran jalur zonasi SMA ?
                                    </button>
                                </h2>
                                <div id="accordionTwo" class="accordion-collapse collapse"
                                    aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        Pendaftaran dilaksanakan pada tahap 2 PPDB.
                                    </div>
                                </div>
                            </div>
                            <div class="card accordion-item">
                                <h2 class="accordion-header" id="headingThree">
                                    <button type="button" class="accordion-button collapsed"
                                        data-bs-toggle="collapse" data-bs-target="#accordionThree"
                                        aria-expanded="false" aria-controls="accordionThree">
                                        Berapa persen kuota zonasi SMA ?
                                    </button>
                                </h2>
                                <div id="accordionThree" class="accordion-collapse collapse"
                                    aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        Masing-masing disediakan kuota sebesar 50%.

                                    </div>
                                </div>
                            </div>
                            <div class="card accordion-item">
                                <h2 class="accordion-header" id="headingFour">
                                    <button type="button" class="accordion-button collapsed"
                                        data-bs-toggle="collapse" data-bs-target="#accordionFour"
                                        aria-expanded="false" aria-controls="accordionFour">
                                        Berapa banyak sekolah yang dipilih dalam pendaftaran jalur zonasi ?
                                    </button>
                                </h2>
                                <div id="accordionFour" class="accordion-collapse collapse"
                                    aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        Untuk pendaftar dalam dan luar zonasi, boleh memilih 1 SMA Negeri, 1 SMA Swasta.
                                    </div>
                                </div>
                            </div>
                            <div class="card accordion-item">
                                <h2 class="accordion-header" id="headingFive">
                                    <button type="button" class="accordion-button collapsed"
                                        data-bs-toggle="collapse" data-bs-target="#accordionFive"
                                        aria-expanded="false" aria-controls="accordionFive">
                                        Apa saja dokumen persyaratan ppdb ?
                                    </button>
                                </h2>
                                <div id="accordionFive" class="accordion-collapse collapse"
                                    aria-labelledby="headingFive" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <ul>
                                            <li>
                                                UMUM
                                            </li>
                                            <ol>
                                                <li>Ijazah/Surat Keterangan Lulus/Kartu peserta Ujian Sekolah</li>
                                                <li>Akta Kelahiran/Surat Keterangan Lahir</li>
                                                <li>Kartu Keluarga (minimal satu tahun), KTP</li>
                                                <li>Buku Rapor (semester 1 s.d. 5)</li>
                                                <li>Surat Tanggung Jawab Mutlak Orang Tua</li>
                                            </ol>
                                            <li class="mt-2">KHUSUS</li>
                                            <ol>
                                                <li>Kartu Program Penanganan Kemiskinan/Terdaftar pada DTKS Dinsos (bagi
                                                    jalur - afirmasi/KETM)</li>
                                                <li>Surat Keterangan Domisili dari RT/RW (bagi afirmasi korban bencana
                                                    alam/sosial)</li>
                                                <li>Surat Tugas Orangtua (bagi jalur perpindahan tugas orangtua/wali,
                                                    maks. 3 tahun/anak guru)</li>
                                                <li>Piagam dan Dokumentasi Prestasi (untuk jalur prestasi kejuaraan)
                                                    maks. 5 tahun, min. 6 bulan</li>
                                            </ol>
                                        </ul>

                                        * Setiap dokumen difoto/scan aslinya, UPLOAD (diunggah) ke website PPDB *
                                    </div>
                                </div>
                            </div>
                            <div class="card accordion-item">
                                <h2 class="accordion-header" id="headingSix">
                                    <button type="button" class="accordion-button collapsed"
                                        data-bs-toggle="collapse" data-bs-target="#accordionSix"
                                        aria-expanded="false" aria-controls="accordionSix">
                                        Apa persyaratan umum PPDB ?
                                    </button>
                                </h2>
                                <div id="accordionSix" class="accordion-collapse collapse"
                                    aria-labelledby="headingSix" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        Kartu keluarga yang sudah berumur 1 tahun atau lebih <br>
                                        * Kartu Keluarga Yang Belum 1 Tahun Atau Masih Baru Karena Perubahan (Kelahiran,
                                        Meninggal, Kepindahan) Anggota Keluarga Dapat Melampirkan Surat Keterangan Dari
                                        RT/RW Yang Menerangkan Lamanya Domisili.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- FAQ: End -->

        <!-- CTA: Start -->
        <section id="landingCTA" class="section-py landing-cta p-lg-0 pb-0">
            <div class="container">
                <div class="row align-items-center gy-5 gy-lg-0">
                    <div class="col-lg-6 text-center text-lg-start">
                        <h6 class="h2 text-primary fw-bold mb-1">Tunggu
                            apa lagi?</h6>
                        <p class="fw-medium mb-4">Ayo daftar sekarang
                            karena waktu terbtas.</p>
                        <a href="/register" class="btn btn-primary">Daftar disini</a>
                    </div>
                    <div class="col-lg-6 pt-lg-5 text-center text-lg-end">
                        <img src="{{ asset('storage/images/reg.webp') }}" width="200" alt="cta dashboard"
                            class="img-fluid" />
                    </div>
                </div>
            </div>
        </section>
        <!-- CTA: End -->

        <!-- Contact Us: Start -->
        <section id="landingPengaduan" class="section-py bg-body landing-contact">
            <div class="container">
                <div class="text-center mb-3 pb-1">

                </div>
                <h3 class="text-center mb-1"><span class="section-title">Pusat Informasi</span></h3>
                <p class="text-center mb-4 mb-lg-5 pb-md-3">Hubungi
                    jika anda kendala atau pertanyaan seputar PPDB.</p>
                <div class="row gy-4">
                    <div class="col-lg-5">
                        <div class="contact-img-box position-relative border p-2 h-100">
                            <img src="{{ asset('storage/images/contact-customer-service1.webp') }}"
                                alt="contact customer service" class="contact-img w-100 scaleX-n1-rtl img-fluid" />
                            <div class="pt-3 px-4 pb-1" style="margin-top: -4em">
                                <div class="row gy-3 gx-md-4">
                                    <div class="col-md-6 col-lg-12 col-xl-6">
                                        <div class="d-flex align-items-center">
                                            <div class="badge bg-label-primary rounded p-2 me-2"><i
                                                    class="bx bx-envelope bx-sm"></i></div>
                                            <div>
                                                <p class="mb-0">Email</p>
                                                <h5 class="mb-0">
                                                    <a href="mailto:ppdbonlineaceh@gmail.com"
                                                        class="text-heading">ppdbonlineaceh@gmail.com</a>
                                                </h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-12 col-xl-6">
                                        <div class="d-flex align-items-center">
                                            <div class="badge bg-label-success rounded p-2 me-2">
                                                <i class="bx bx-phone-call bx-sm"></i>
                                            </div>
                                            <div>
                                                <p class="mb-0">Telepon</p>
                                                <h5 class="mb-0"><a href="tel:+1234-568-963"
                                                        class="text-heading">+1234 568 963</a></h5>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="mb-1">Kirim Pesan</h4>
                                <p class="mb-4">
                                    Jika ingin berdiskusi atau ingin menanyampaikan masalah ppdb bisa mengisi form
                                    dibawah ini atau menghubungi kami melalui <b>Email</b> <b
                                        class="text-danger">(Email
                                        Aktif)</b> dan <b>Telepon</b>.
                                </p>
                                <form action="/app-store-pengaduhan" method="POST" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div class="row g-4">
                                        <div class="col-md-6">
                                            <label class="form-label" for="contact-form-fullname">Nama</label>
                                            <input type="text" name="name" class="form-control"
                                                placeholder="ex. Anonim" autocomplete="off" required />
                                        </div>

                                        <div class="col-md-6">
                                            <label class="form-label" for="contact-form-email">Email</label>
                                            <input type="email" name="email" class="form-control"
                                                placeholder="admin@gmail.com" required />
                                        </div>

                                        <div class="col-12">
                                            <label class="form-label">File Fhoto/Screanshoot</label>
                                            <input type="file" name="bukti" class="form-control"
                                                accept=".jpg,.jpeg,.png"required />

                                            <p class="text-muted">Max 1 Mb</p>

                                            <label class="form-label" for="contact-form-message">Pesan</label>
                                            <textarea name="pengaduan" class="form-control" rows="5" placeholder="Cara menemukan sekolah zonasi" required></textarea>


                                        </div>

                                        <div class="col-12">
                                            <button type="submit" class="btn btn-primary"><i class="bx bx-send"></i>
                                                &nbsp; Kirim</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Contact Us: End -->
    </div>
    <!-- / Sections:End -->



    <!-- Footer: Start -->
    <footer class="landing-footer bg-body footer-text" style="margin-bottom: -2em">
        <div class="footer-top">
            <div class="container">
                <div class="row gx-0 gy-4 g-md-5">
                    <div class="col-lg-5">
                        <a href="" class="app-brand-link mb-4">
                            <span class="app-brand-logo demo">

                                <img src="{{ 'storage/images/PPDB12.webp' }}" width="300" alt="">

                            </span>
                            {{-- <span class="app-brand-text demo footer-link fw-bold ms-2 ps-1">disdik</span> --}}
                        </a>
                        <p class="footer-text footer-logo-description mb-4">
                            Panitia Penerimaan peserta Didik Baru <br> Dinas Pendidikan Aceh
                        </p>
                        <form class="footer-form">
                            <label for="footer-email" class="small">Total pengunjung sistem.</label>
                            <div class="d-flex mt-1">
                                <span class="badge bg-label-primary "><b class="count">{{ $view->total() }}</b> kali dikunjungi</span>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-6">
                        <h6 class="footer-title mb-4">Halaman</h6>
                        <ul class="list-unstyled">
                            <li class="mb-3">
                                <a href="/#landingZonasi" target="_blank" class="footer-link">Zonasi PPDB</a>
                            </li>
                            <li class="mb-3">
                                <a href="/#landingDokumen" target="_blank" class="footer-link">Dokumen Pendukung</a>
                            </li>
                            <li class="mb-3">
                                <a href="/#landingFAQ" target="_blank" class="footer-link">FAQ</a>
                            </li>
                            <li class="mb-3">
                                <a href="/#landingPengaduan" target="_blank" class="footer-link">Helpdesk/Call
                                    Center</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-6">
                        <h6 class="footer-title mb-4">Dinas</h6>
                        <ul class="list-unstyled">
                            <li class="mb-3">
                                <a href="https://disdik.acehprov.go.id/" class="footer-link">Dinas Pendidikan</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-3 col-md-4">
                        <h6 class="footer-title mb-4">Video pengunaan PPDB</h6>

                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom py-3">
            <div
                class="container d-flex flex-wrap justify-content-between flex-md-row flex-column text-center text-md-start">
                <div class="mb-2 mb-md-0">
                    <span class="footer-text">©
                        <script>
                            document.write(new Date().getFullYear());
                        </script>
                    </span>
                    <a href="#" target="_blank" class="fw-medium text-white footer-link">PPDB Dinas Pendidikan
                        Aceh,</a>
                    <span class="footer-text"> Made with ❤️ PT. Ananda Digital.</span>
                </div>
                <div>
                    <a href="https://schoolmedia.co.id/" class="footer-link me-3" target="_blank">
                        didukung oleh <b>School Media</b>
                    </a>

                </div>
            </div>
        </div>
    </footer>
    <!-- Footer: End -->


    <!-- Kontainer untuk tombol WhatsApp -->
    <div id="whatsapp-button" class="whatsapp-hide">
        <a href="https://wa.me/1234567890" target="_blank" class="whatsapp-link">
            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor"
                class="bi bi-whatsapp" viewBox="0 0 16 16">
                <path fill="#fff"
                    d="M13.601 2.326A7.85 7.85 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.9 7.9 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.9 7.9 0 0 0 13.6 2.326zM7.994 14.521a6.6 6.6 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.56 6.56 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592m3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.73.73 0 0 0-.529.247c-.182.198-.691.677-.691 1.654s.71 1.916.81 2.049c.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232" />
            </svg>
        </a>
    </div>

    <div id="admin-list" class="admin-list">
        <p><a href="https://wa.me/1234567890" target="_blank">Admin 1</a></p>
        <p><a href="https://wa.me/1234567891" target="_blank">Admin 2</a></p>
        <p><a href="https://wa.me/1234567892" target="_blank">Admin 3</a></p>
    </div>

    <script>
        // Ambil elemen tombol WhatsApp dan daftar admin
        var whatsappButton = document.getElementById('whatsapp-button');
        var adminList = document.getElementById('admin-list');

        // Tambahkan event listener untuk klik pada tombol WhatsApp
        whatsappButton.addEventListener('click', function() {
            // Toggle tampilan daftar admin
            adminList.classList.toggle('whatsapp-hide');
        });
    </script>


    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="{{ asset('front/js/popper.js') }}"></script>
    <script src="{{ asset('front/js/bootstrap.js') }}"></script>

    <!--<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>-->





    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="{{ asset('front/js/nouislider.js') }}"></script>
    <script src="{{ asset('front/js/swiper.js') }}"></script>
    {{-- <script src="{{ asset('front/js/lazysizes.min.js') }}"></script>  --}}

    <!-- Main JS -->
    <script src="{{ asset('front/js/front-main.js') }}"></script>


    <!-- Page JS -->
    <script src="{{ asset('front/js/front-page-landing.js') }}"></script>

    <script src="{{ asset('front/js/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ asset('front/select2/js/select2.min.js') }}"></script>

    <script src="{{ asset('front/js/dataTables.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>


    <script>
        $(document).ready(function() {

            var counters = $(".count");
            var countersQuantity = counters.length;
            var counter = [];

            for (i = 0; i < countersQuantity; i++) {
                counter[i] = parseInt(counters[i].innerHTML);
            }

            var count = function(start, value, id) {
                var localStart = start;
                setInterval(function() {
                    if (localStart < value) {
                        localStart++;
                        counters[id].innerHTML = localStart;
                    }
                }, 40);
            }

            for (j = 0; j < countersQuantity; j++) {
                count(0, counter[j], j);
            }
        });
    </script>
    <script>
        $(document).ready(function() {

            $('#kabupaten').select2({
                theme: 'bootstrap-5',
            });

            $('#kecamatan').select2({
                theme: 'bootstrap-5',
            });

            $('#desa').select2({
                theme: 'bootstrap-5',
            });

            $('#sekolah').select2({
                theme: 'bootstrap-5',
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#dt-zonasi-table').DataTable({});
        });

        $(document).ready(function() {
            $('#dt-zonasi-table1').DataTable({});
        });
    </script>


    <script type="text/javascript">
        $(document).ready(function() {
            $('#kabupaten').on('change', function() {
                var nm_kab = $(this).val();
                // console.log(kode_kategori);
                if (nm_kab) {
                    $.ajax({
                        url: '/getkecamatan/' + nm_kab,
                        type: 'GET',
                        data: {
                            '_token': '{{ csrf_token() }}'
                        },
                        dataType: 'json',
                        success: function(data) {
                            // console.log(data);
                            if (data) {
                                $('#kecamatan').empty();
                                $('#kecamatan').append('<option value="">-Pilih-</option>');
                                $.each(data, function(key, kecamatan) {
                                    $('select[name="kecamatan"]').append(
                                        '<option value="' + kecamatan.nm_kec +
                                        '">' +
                                        kecamatan.nm_kec + '</option>'
                                    );
                                });
                            } else {
                                $('#kecamatan').empty();
                            }
                        }
                    });
                } else {
                    $('#kecamatan').empty();
                }
            });


            // get desa
            $('#kecamatan').on('change', function() {
                var nm_kec = $(this).val();
                // console.log(kode_kategori);
                if (nm_kec) {
                    $.ajax({
                        url: '/getdesa/' + nm_kec,
                        type: 'GET',
                        data: {
                            '_token': '{{ csrf_token() }}'
                        },
                        dataType: 'json',
                        success: function(data) {
                            // console.log(data);
                            if (data) {
                                $('#desa').empty();
                                $('#desa').append('<option value="">-Pilih-</option>');
                                $.each(data, function(key, desa) {
                                    $('select[name="q"]').append(
                                        '<option value="' + desa.nm_desa + '">' +
                                        desa.nm_desa + '</option>'
                                    );
                                });
                            } else {
                                $('#desa').empty();
                            }
                        }
                    });
                } else {
                    $('#desa').empty();
                }
            });

            // get sekolah
            $('#desa').on('change', function() {
                var nm_desa = $(this).val();
                // console.log(kode_kategori);
                if (nm_desa) {
                    $.ajax({
                        url: '/getsekolah/' + nm_desa,
                        type: 'GET',
                        data: {
                            '_token': '{{ csrf_token() }}'
                        },
                        dataType: 'json',
                        success: function(data) {
                            // console.log(data);
                            if (data) {
                                $('#sekolah').empty();
                                $('#sekolah').append('<option value="">-Pilih-</option>');
                                $.each(data, function(key, sekolah) {
                                    $('select[name="sekolah"]').append(
                                        '<option value="' + sekolah.id_zonasi +
                                        '">' +
                                        sekolah.id_zonasi + '</option>'
                                    );
                                });
                            } else {
                                $('#sekolah').empty();
                            }
                        }
                    });
                } else {
                    $('#sekolah').empty();
                }
            });
        });
    </script>

    @foreach ($jalur as $p)
        <script>
            function startCountdown(startDate, endDate) {
                var countdown = setInterval(function() {
                    var now = new Date().getTime();
                    var distanceStart = startDate - now;
                    var distanceEnd = endDate - now;

                    if (distanceStart > 0) {
                        var days = Math.floor(distanceStart / (1000 * 60 * 60 * 24));
                        var hours = Math.floor((distanceStart % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                        var minutes = Math.floor((distanceStart % (1000 * 60 * 60)) / (1000 * 60));
                        var seconds = Math.floor((distanceStart % (1000 * 60)) / 1000);

                        document.getElementById("countdown").innerHTML = `
                    <div class="countdown-item1"><span class="countdown-value">${days}</span> <span class="countdown-label">hari</span></div>
                    <div class="countdown-item1"><span class="countdown-value">${hours}</span> <span class="countdown-label">jam</span></div>
                    <div class="countdown-item1"><span class="countdown-value">${minutes}</span> <span class="countdown-label">menit</span></div>
                    <div class="countdown-item"><span class="countdown-value">${seconds}</span> <span class="countdown-label">detik</span></div>
                    <div class="mt-2"><span class="countdown-value">{{ $p->jalur }}</span> <span class="countdown-label">{{ $p->keterangan }}</span> dimulai dalam</div>
                `;
                    } else if (distanceEnd > 0) {
                        var days = Math.floor(distanceEnd / (1000 * 60 * 60 * 24));
                        var hours = Math.floor((distanceEnd % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                        var minutes = Math.floor((distanceEnd % (1000 * 60 * 60)) / (1000 * 60));
                        var seconds = Math.floor((distanceEnd % (1000 * 60)) / 1000);

                        document.getElementById("countdown").innerHTML = `
                    <div class="countdown-item1"><span class="countdown-value">${days}</span> <span class="countdown-label">hari</span></div>
                    <div class="countdown-item1"><span class="countdown-value">${hours}</span> <span class="countdown-label">jam</span></div>
                    <div class="countdown-item1"><span class="countdown-value">${minutes}</span> <span class="countdown-label">menit</span></div>
                    <div class="countdown-item"><span class="countdown-value">${seconds}</span> <span class="countdown-label">detik</span></div>

                    <div class="mt-2"><span class="countdown-value"> {{ $p->jalur }}</span> <span class="countdown-label">{{ $p->keterangan }}</span> Berakhir dalam </div>
                `;
                    } else {
                        clearInterval(countdown);
                        document.getElementById("countdown").innerHTML = "Pengumuman telah berakhir!";
                    }
                }, 1000);
            }

            // Tanggal mulai pengumuman
            var startDate = new Date('{{ $p->tgl_mulai }} 00:00:00').getTime();

            // Tanggal selesai pengumuman
            var endDate = new Date('{{ $p->tgl_selesai }} 00:00:00').getTime();

            // Mulai hitung mundur
            startCountdown(startDate, endDate);
        </script>
    @endforeach

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            setTimeout(function() {
                document.getElementById('whatsapp-button').classList.add('show');
            }, 1000); // Tampilkan tombol setelah 1 detik (opsional)
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('searchButton').addEventListener('click', function() {
                var inputQuery = document.getElementById('desa').value;
                var kecamatan = document.getElementById('kecamatan').value; // Periksa nilai input kecamatan
                if (!kecamatan) {
                    alert('Pilih kecamatan terlebih dahulu!');
                    return; // Jika kecamatan kosong, hentikan proses pencarian
                }
                var xhr = new XMLHttpRequest();
                xhr.open('GET', '/searchlive?q=' + inputQuery + '&kecamatan=' + kecamatan,
                    true); // Sertakan parameter kecamatan dalam permintaan AJAX
                xhr.onreadystatechange = function() {
                    if (xhr.readyState == 4 && xhr.status == 200) {
                        document.getElementById('loading').style.display =
                            'none'; // Sembunyikan loading setelah data diterima
                        var response = JSON.parse(xhr.responseText);
                        var zonasi = response.zonasi;

                        var resultHTML =
                            '<div class="table-responsive mt-4"><table class="table table-striped"><thead><tr><th>#</th><th>Nama Sekolah</th><th>Desa</th><th>Kuota</th><th>Sisa Kuota</th><th>Bobot</th></tr></thead><tbody>';
                        for (var i = 0; i < zonasi.length; i++) {
                            var kuotaSetelahPengurangan = parseInt(zonasi[i].kuota) - parseInt(zonasi[i]
                                .total_pendaftar);
                            var statusKuota = kuotaSetelahPengurangan === 0 ? 'Kuota Sudah Terpenuhi' :
                                kuotaSetelahPengurangan;


                            resultHTML += '<tr><td>' + (i + 1) + '</td><td>' + zonasi[i].id_zonasi +
                                '</td><td>' + zonasi[i].id_desa + '</td><td>' + zonasi[i].kuota +
                                '</td><td>' + statusKuota + '</td><td>' + zonasi[i].bobot +
                                '</td></tr>';
                        }
                        resultHTML += '</tbody></table></div>';
                        document.getElementById('result').innerHTML = resultHTML;
                    }
                };
                xhr.send();
                document.getElementById('loading').style.display =
                    'block'; // Tampilkan loading saat permintaan dikirim
            });
        });
    </script>

    <script>
        // Fungsi untuk menampilkan Toastr
        function showToast(message, type) {
            toastr[type](message, '', {
                progressBar: true,
                // positionClass: 'toast-bottom-right',
                timeOut: 3000,
                extendedTimeOut: 1000
            });
        }

        // Menampilkan pesan Toastr jika ada
        var successMessage = '{{ session('success') }}';
        if (successMessage) {
            showToast(successMessage, 'success');
            // Hapus pesan session agar tidak muncul lagi saat refresh
            '{{ session()->forget('success') }}';
        }
    </script>

</body>

</html>

<!-- beautify ignore:end -->
