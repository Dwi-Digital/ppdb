<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="light-style layout-navbar-fixed layout-wide "
    dir="ltr" data-theme="theme-default"
    data-assets-path="https://demos.themeselection.com/sneat-bootstrap-html-admin-template/assets/"
    data-template="front-pages">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=yes, minimum-scale=1.0, maximum-scale=3.0" />

    <title>PPDB Aceh 2024 - Dinas Pendidikan Aceh</title>


    <meta name="description" content="Penerimaan Peserta Didik Baru Dinas Pendidikan Aceh" />
    <meta name="keywords" content="ppdb, dinas pendidikan aceh, aceh, zonasi">
    <!-- Canonical SEO -->



    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('storage/images/favicon.ico') }}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet">


    <link rel="stylesheet" href="{{ asset('front/css/boxicons.css') }}" />
    <link href="{{ asset('front/select2/css/select2.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('front/select2-bootstrap-5-theme/select2-bootstrap-5-theme.min.css') }}" rel="stylesheet" />


    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('front/css/core.css') }}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('front/css/themedefault.css') }}" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('front/css/demo.css') }}" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('front/css/front-page.css') }}" />
    <!-- Vendors CSS -->

    <link rel="stylesheet" href="{{ asset('front/css/nouislider.css') }}" />
    <link rel="stylesheet" href="{{ asset('front/css/swiper.css') }}" />

    <!-- Page CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css" />
    <link rel="stylesheet" href="{{ asset('front/css/front-page-landing.css') }}" />

    <!-- Helpers -->
    <script src="{{ asset('front/js/helpers.js') }}"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
    <script src="{{ asset('front/js/template-customizer.js') }}"></script>
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{ asset('front/js/front-config.js') }}"></script>

    <script src="{{ asset('front/js/dropdown-hover.js') }}"></script>
    <script src="{{ asset('front/js/mega-dropdown.js') }}"></script>

</head>

<body>



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

                            <img src="{{ 'storage/images/PPDB12.png' }}" class="d-lg-none d-md-none" width="100"
                                alt="" loading="lazy">
                            <img src="{{ 'storage/images/PPDB12.png' }}" class="d-none d-sm-block" width="150"
                                alt="" loading="lazy">

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

                    <!-- Style Switcher -->
                    <li class="nav-item dropdown-style-switcher dropdown me-2 me-xl-0">
                        <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);"
                            data-bs-toggle="dropdown">
                            <i class='bx bx-sm'></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end dropdown-styles">
                            <li>
                                <a class="dropdown-item" href="javascript:void(0);" data-theme="light">
                                    <span class="align-middle"><i class='bx bx-sun me-2'></i>Light</span>
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="javascript:void(0);" data-theme="dark">
                                    <span class="align-middle"><i class="bx bx-moon me-2"></i>Dark</span>
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="javascript:void(0);" data-theme="system">
                                    <span class="align-middle"><i class="bx bx-desktop me-2"></i>System</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <!-- / Style Switcher-->


                    <!-- navbar button: Start -->
                    <li>
                        <a href="/login" class="btn btn-primary" target="_blank"><span
                                class="tf-icons bx bx-user me-md-1"></span><span
                                class="d-none d-md-block">Login</span></a>
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
                        <h1 class="text-primary hero-title display-4 fw-bold" >P P D B <br>Dinas Pendidikan Aceh</h1>
                        <h2 class="hero-sub-title h6 mb-4 pb-1" >
                            Jalur Prestasi, Zonasi, Afirmasi dan Perpindahan Orang tua
                        </h2>
                        <div class="landing-hero-btn d-inline-block position-relative">
                            <span class="hero-btn-item position-absolute d-none d-md-flex text-heading"
                                >Daftar segera
                                <img src="{{ asset('storage/images/Join-community-arrow.png') }} "
                                loading="lazy" alt="Join community arrow" class="scaleX-n1-rtl" /></span>
                            <a href="/register" target="_blank" class="btn btn-primary" >Ayo mulai daftar </a>
                        </div>
                    </div>
                    <div id="heroDashboardAnimation" class="hero-animation-img">
                        <a href="/" target="_blank">
                            <div id="heroAnimationImg" class="position-relative hero-dashboard-img">
                                <img src="{{ asset('storage/images/PPDB.webp') }}" loading="lazy" alt="hero dashboard"
                                    class="animation-img"
                                    style="margin-top: 3em;border-radius:50px;box-shadow: 0 1px 10px 2px #1d1d1d6b;"
                                    />
                               
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="landing-hero-blank"></div>
        </section>
        <!-- Hero: End -->

        <!-- Useful features: Start -->
        <section id="landingZonasi" class="section-py landing-features">
            <div class="container">
                <div class="text-center mb-3 pb-1">
                    <span class="badge bg-label-primary" >Zonasi
                        PPDB</span>
                </div>
                <h3 class="text-center mb-1" >
                    <span class="section-title">Pencarian wilayah zonasi sekolah</span>
                </h3>
                <p class="text-center mb-3 mb-md-5 pb-3" >
                    Sesuaikan dengan data <b>DAPODIK</b> atau <b>KK</b> Calon Peserta Didik.
                </p>
                <div class="features-icon-wrapper row gx-0 gy-4 g-sm-5">
                    <div class="col-lg-6 col-sm-6 text-center features-icon-box" >
                        <div class="text-center mb-3">
                            <img src="https://demos.themeselection.com/sneat-bootstrap-html-admin-template/assets/img/front-pages/icons/laptop.png"
                                alt="lifebelt" loading="lazy"/>
                        </div>
                        <h5 class="mb-3">Verifikasi Data Via Data NISN</h5>
                        <p class="features-icon-description">Menverifikasi NISN Calon Pesera Didik yang dilakukan
                            melalui Laman <br> <a href="https://nisn.data.kemdikbud.go.id/" target="_blank"><b>https://nisn.data.kemdikbud.go.id</b></a>.</p>
                    </div>
                    <div class="col-lg-6 col-sm-6 text-center features-icon-box" >
                        <div class="text-center mb-3">
                            <img src="https://demos.themeselection.com/sneat-bootstrap-html-admin-template/assets/img/front-pages/icons/keyboard.png"
                                alt="google docs" loading="lazy"/>
                        </div>
                        <h5 class="mb-3">Verifikasi Data Kartu Keluarga (KK)</h5>
                        <p class="features-icon-description">Menverifikasi data Kependudukan yang ada di Kartu Keluarga
                            dan Membandingkan dengan data pada Sistem NISN.</p>
                        </p>
                    </div>
                </div>
                <div class="dtzonasi" >
                    <div class="text-center mb-4">
                        <span class="badge bg-label-primary">Cek Zonasi PPDB</span>
                    </div>

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
                                <select name="kecamatan" id="kecamatan" class="form-select input">
                                    <option>---Pilih Kecamatan---</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            {{-- <select name="desa" id="desa" class="form-control">
                            </select> --}}
                            <form action="/searchlive" method="GET">
                                <div class="form-group mb-2">
                                    <select type="search"  name="q" id="desa" value="{{ old('q') }}" class="form-control">
                                        <option>---Pilih Desa---</option>
                                    </select>

                                    {{-- <input class="form-control form-control-lg form-control-borderless" name="q"
                                        placeholder="Apa yang ingin Anda pelajari?"
                                        autocomplete="off"> --}}
                                </div>


                                <div class="form-group mb-2">

                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-primary"><i
                                                class="bx bx-search"></i>&nbsp;
                                            Cari Data zonasi</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>



                @if (count($zonasi) > 0)
                    <div class="table-responsive mt-4" >
                        <table class=" table table-striped" id="dt-zonasi-table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama Sekolah</th>
                                    <th>Desa</th>
                                    <th>Kuota</th>
                                    <th>Bobot</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $i=1 @endphp
                                @foreach ($zonasi as $p)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $p->id_zonasi }}</td>
                                        <td>{{ $p->id_desa }}</td>
                                        <td>100 Kuota</td>
                                        <td>{{ $p->bobot }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="table-responsive mt-4" >
                        <table class=" table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama Sekolah</th>
                                    <th>Kuota</th>
                                    <th>Bobot</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td colspan="4"  class="text-center align-middle">Data Kosong</td>
                                    
                                </tr>

                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </section>
        <!-- Useful features: End -->

        <!-- Real customers reviews: Start -->
        <section id="landingAlur" class="section-py bg-body landing-reviews pb-0">
            <!-- What people say slider: Start -->
            <div class="container">
                <div class="row align-items-center gx-0 gy-4 g-lg-5">
                    <div class="col-md-6 col-lg-5 col-xl-3" >
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
                    <div class="col-md-6 col-lg-7 col-xl-9" >
                        <div class="swiper-reviews-carousel overflow-hidden mb-5 pb-md-2 pb-md-3">
                            <div class="swiper" id="swiper-reviews">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <div class="card h-100">
                                            <img src="{{ asset('storage/images/infografis/7.webp') }}"
                                                alt="client logo" class=" img-fluid"
                                                style="width: 100%;border-radius:7px;" loading="lazy"/>
                                        </div>
                                    </div>

                                    <div class="swiper-slide">
                                        <div class="card h-100">
                                            <img src="{{ asset('storage/images/infografis/persyaratan1.webp') }}"
                                                alt="client logo" class=" img-fluid"
                                                style="width: 100%;border-radius:7px;" loading="lazy" />
                                        </div>
                                    </div>

                                    <div class="swiper-slide">
                                        <div class="card h-100">
                                            <img src="{{ asset('storage/images/infografis/persyaratan2.webp') }}"
                                                alt="client logo" class=" img-fluid"
                                                style="width: 100%;border-radius:7px;" loading="lazy"/>
                                        </div>
                                    </div>

                                    <div class="swiper-slide">
                                        <div class="card h-100">
                                            <img src="{{ asset('storage/images/infografis/4.webp') }}"
                                                alt="client logo" class=" img-fluid"
                                                style="width: 100%;border-radius:7px;" loading="lazy"/>
                                        </div>
                                    </div>

                                    <div class="swiper-slide">
                                        <div class="card h-100">
                                            <img src="{{ asset('storage/images/infografis/5.webp') }}"
                                                alt="client logo" class=" img-fluid"
                                                style="width: 100%;border-radius:7px;" loading="lazy"/>
                                        </div>
                                    </div>

                                    <div class="swiper-slide">
                                        <div class="card h-100">
                                            <img src="{{ asset('storage/images/infografis/6.webp') }}"
                                                alt="client logo" class=" img-fluid"
                                                style="width: 100%;border-radius:7px;" loading="lazy"/>
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
                    <span class="badge bg-label-primary" >Dokumen
                        Pendukung</span>
                </div>
                <h3 class="text-center mb-1" ><span
                        class="section-title">Dokumen
                        Pendukung
                        Sekolah Juara Untuk Semua
                    </span></h3>
                <p class="text-center mb-md-5 pb-3" >Dokumen yang
                    menyediakan informasi tambahan atau dukungan untuk
                    topik tertentu. Mereka digunakan untuk memberikan rincian, bukti, atau penjelasan yang lebih lengkap
                    tentang subjek yang sedang dibahas. Dokumen pendukung sering digunakan dalam berbagai konteks,
                    termasuk bisnis, hukum, akademik, dan administratif.</p>
                <div class="row gy-5 ">
                    <div class="col-lg-6">
                        <img src="{{ asset('storage/images/file.jpg') }}" alt="google docs" class=" w-100"
                        loading="lazy"/>
                    </div>
                    <div class="col-lg-6">
                        <div class="accordion mb-4" id="accordionExample" >
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
                                                <li><a
                                                        href="https://bit.ly/Surat_SPTJM_2024">https://bit.ly/Surat_SPTJM_2024</a>
                                                </li>
                                            </ul>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="accordion mb-4" id="accordionExample" >
                            <div class="card accordion-item active">
                                <h2 class="accordion-header" id="headingOne">
                                    <button type="button" class="accordion-button" data-bs-toggle="collapse"
                                        data-bs-target="#accordionOne" aria-expanded="true"
                                        aria-controls="accordionOne">
                                        Materi Sosialisasi
                                    </button>
                                </h2>

                                <div id="accordionOne" class="accordion-collapse collapse show"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <ul>
                                            <li>Materi Sosialisasi PPDB Aceh</li>
                                            <ul>
                                                <li><a href="">https://bit.ly/MATERI_SOSIALISASI_PPDB_2024</a>
                                                </li>
                                            </ul>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="accordion mb-4" id="accordionExample" >
                            <div class="card accordion-item active">
                                <h2 class="accordion-header" id="headingOne">
                                    <button type="button" class="accordion-button" data-bs-toggle="collapse"
                                        data-bs-target="#accordionOne" aria-expanded="true"
                                        aria-controls="accordionOne">
                                        Format Pengaduan PPDB
                                    </button>
                                </h2>

                                <div id="accordionOne" class="accordion-collapse collapse show"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <ul>
                                            <li>Format Pengaduan PPDB</li>
                                            <ul>
                                                <li><a href="">https://bit.ly/Format_Pengaduan_PPDB</a></li>
                                            </ul>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="accordion mb-4" id="accordionExample">
                            <div class="card accordion-item active">
                                <h2 class="accordion-header" id="headingOne">
                                    <button type="button" class="accordion-button" data-bs-toggle="collapse"
                                        data-bs-target="#accordionOne" aria-expanded="true"
                                        aria-controls="accordionOne">
                                        Format Verifikasi Dokumen Persyaratan PPDB
                                    </button>
                                </h2>

                                <div id="accordionOne" class="accordion-collapse collapse show"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <ul>
                                            <li>Format Verifikasi Dokumen Persyaratan PPDB</li>
                                            <ul>
                                                <li><a
                                                        href="">https://bit.ly/Format_Dokumen_Persyaratan_PPDB</a>
                                                </li>
                                            </ul>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="accordion" id="accordionExample" style="margin-bottom: -5em;"
                            >
                            <div class="card accordion-item active">
                                <h2 class="accordion-header" id="headingOne">
                                    <button type="button" class="accordion-button" data-bs-toggle="collapse"
                                        data-bs-target="#accordionOne" aria-expanded="true"
                                        aria-controls="accordionOne">
                                        Tanggung Jawab Mutlak/Pakta Integritas Keluarga Ekonomi Tidak Mampu

                                    </button>
                                </h2>

                                <div id="accordionOne" class="accordion-collapse collapse show"
                                    data-bs-parent="#accordionExample">
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
                        <span class="badge bg-label-primary" >Total Kuota
                            Setiap Jalur</span>
                    </div>
                    <div class="col-sm-6 col-lg-3" >
                        <div class="card border border-label-success shadow-none">
                            <div class="card-body text-center">
                                <img src="{{ asset('storage/images/award.png') }}" width="60" alt="laptop"
                                    class="mb-2" loading="lazy"/>
                                <h5 class="h2 mb-1">30 %</h5>
                                <p class="fw-medium mb-0">
                                    Jalur Prestasi
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-lg-3" >
                        <div class="card border border-label-primary shadow-none">
                            <div class="card-body text-center">
                                <img src="{{ asset('storage/images/zonasi.png') }}" width="60" alt="laptop"
                                    class="mb-2" loading="lazy"/>
                                <h5 class="h2 mb-1">50 %</h5>
                                <p class="fw-medium mb-0">
                                    Jalur Zonasi
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-lg-3" >
                        <div class="card border border-label-warning shadow-none">
                            <div class="card-body text-center">
                                <img src="{{ asset('storage/images/afirmasi.png') }}" width="60" alt="laptop"
                                    class="mb-2" loading="lazy"/>
                                <h5 class="h2 mb-1">15 %</h5>
                                <p class="fw-medium mb-0">
                                    Afirmasi
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-lg-3" >
                        <div class="card border border-label-info shadow-none">
                            <div class="card-body text-center">
                                <img src="{{ asset('storage/images/job.png') }}" width="60" alt="laptop"
                                    class="mb-2" loading="lazy"/>
                                <h5 class="h2 mb-1">5 %</h5>
                                <p class="fw-medium mb-0">
                                    Jalur Perpindahan Orang Tua
                                </p>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </section>
        <!-- Fun facts: End -->

        <!-- FAQ: Start -->
        <section id="landingFAQ" class="section-py bg-body landing-faq">
            <div class="container">
                <div class="text-center mb-3 pb-1">
                    <span class="badge bg-label-primary" >FAQ</span>
                </div>
                <h3 class="text-center mb-1" >Frequently asked <span
                        class="section-title">questions</span></h3>
                <p class="text-center mb-5 pb-3" >Beberapa pertanyaan yang
                    sering atau banyak ditanyakan.
                </p>
                <div class="row gy-5">
                    <div class="col-lg-5" >
                        <div class="text-center">
                            <img src="https://demos.themeselection.com/sneat-bootstrap-html-admin-template/assets/img/front-pages/landing-page/faq-boy-with-logos.png"
                                alt="faq boy with logos" class="faq-image" loading="lazy"/>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="accordion" id="accordionExample">
                            <div class="card accordion-item active" >
                                <h2 class="accordion-header" id="headingOne">
                                    <button type="button" class="accordion-button" data-bs-toggle="collapse"
                                        data-bs-target="#accordionOne" aria-expanded="true"
                                        aria-controls="accordionOne">
                                        Bagaimana kriteria seleksi jalur zonasi SMA dan SMK ?
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
                            <div class="card accordion-item" >
                                <h2 class="accordion-header" id="headingTwo">
                                    <button type="button" class="accordion-button collapsed"
                                        data-bs-toggle="collapse" data-bs-target="#accordionTwo"
                                        aria-expanded="false" aria-controls="accordionTwo">
                                        Kapan dilaksanakan pendaftaran jalur zonasi SMA dan SMK ?
                                    </button>
                                </h2>
                                <div id="accordionTwo" class="accordion-collapse collapse"
                                    aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        Pendaftaran dilaksanakan pada tahap 2 PPDB.
                                    </div>
                                </div>
                            </div>
                            <div class="card accordion-item" >
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
                                        Tidak ada jalur zonasi untuk SMK.
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
                            <div class="card accordion-item" >
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
                            <div class="card accordion-item" >
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
                        <h6 class="h2 text-primary fw-bold mb-1" >Tunggu
                            apa lagi?</h6>
                        <p class="fw-medium mb-4" >Ayo daftar sekarang
                            karena waktu terbtas.</p>
                        <a href="/access-pendaftaran" class="btn btn-primary" >Daftar disini</a>
                    </div>
                    <div class="col-lg-6 pt-lg-5 text-center text-lg-end">
                        <img src="{{ asset('storage/images/reg.png') }}" width="200" alt="cta dashboard"
                            class="img-fluid" loading="lazy" />
                    </div>
                </div>
            </div>
        </section>
        <!-- CTA: End -->

        <!-- Contact Us: Start -->
        <section id="landingPengaduan" class="section-py bg-body landing-contact">
            <div class="container">
                <div class="text-center mb-3 pb-1">
                    <span class="badge bg-label-primary" >Helpdesk/Call
                        Center</span></span>
                </div>
                <h3 class="text-center mb-1" ><span
                        class="section-title">Pusat Informasi</span></h3>
                <p class="text-center mb-4 mb-lg-5 pb-md-3" >Hubungi
                    jika anda kendala atau pertanyaan seputar PPDB.</p>
                <div class="row gy-4">
                    <div class="col-lg-5">
                        <div class="contact-img-box position-relative border p-2 h-100" >
                            <img src="{{ asset('storage/images/contact-customer-service.webp') }}"
                                alt="contact customer service" class="contact-img w-100 scaleX-n1-rtl img-fluid" loading="lazy"/>
                            <div class="pt-3 px-4 pb-1">
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
                        <div class="card" >
                            <div class="card-body">
                                <h4 class="mb-1">Kirim Pesan</h4>
                                <p class="mb-4">
                                    Jika ingin berdiskusi atau ingin menanyampaikan masalah ppdb bisa mengisi form
                                    dibawah ini atu menghubungi kami melalui <b>Email</b> <b class="text-danger">(Email
                                        Aktif)</b> dan <b>Telepon</b>.
                                </p>
                                <form>
                                    <div class="row g-4">
                                        <div class="col-md-6">
                                            <label class="form-label" for="contact-form-fullname">Nama</label>
                                            <input type="text" class="form-control" id="contact-form-fullname"
                                                placeholder="ex. Anonim" />
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label" for="contact-form-email">Email</label>
                                            <input type="text" id="contact-form-email" class="form-control"
                                                placeholder="admin@gmail.com" />
                                        </div>
                                        <div class="col-12">
                                            <label class="form-label" for="contact-form-message">Pesan</label>
                                            <textarea id="contact-form-message" class="form-control" rows="9" placeholder="Cara menemukan sekolah zonasi"></textarea>
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

                                <img src="{{ 'storage/images/PPDB12.png' }}" width="300" alt="" loading="lazy">

                            </span>
                            {{-- <span class="app-brand-text demo footer-link fw-bold ms-2 ps-1">disdik</span> --}}
                        </a>
                        <p class="footer-text footer-logo-description mb-4">
                            Panitia Penerimaan peserta Didik Baru <br> Dinas Pendidikan Aceh
                        </p>
                        <form class="footer-form">
                            <label for="footer-email" class="small">Subscribe untuk menerima info lainnya.</label>
                            <div class="d-flex mt-1">
                                <input type="email"
                                    class="form-control rounded-0 rounded-start-bottom rounded-start-top"
                                    id="footer-email" placeholder="Your email" />
                                <button type="submit"
                                    class="btn btn-primary shadow-none rounded-0 rounded-end-bottom rounded-end-top">
                                    Subscribe
                                </button>
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
                    <a href="https://www.facebook.com/dinaspendidikanaceh/" class="footer-link me-3" target="_blank">
                        <img src="{{ asset('storage/images/media/facebook-light.png') }}" alt="facebook icon"
                            data-app-light-img="front-pages/icons/facebook-light.png"
                            data-app-dark-img="front-pages/icons/facebook-dark.png" loading="lazy"/>
                    </a>
                    <a href="https://twitter.com/disdikacehprov" class="footer-link me-3" target="_blank">
                        <img src="{{ asset('storage/images/media/twitter-light.png') }}" alt="twitter icon"
                            data-app-light-img="front-pages/icons/twitter-light.png"
                            data-app-dark-img="front-pages/icons/twitter-dark.png" loading="lazy"/>
                    </a>
                    <a href="https://www.instagram.com/dinaspendidikanaceh/" class="footer-link" target="_blank">
                        <img src="{{ asset('storage/images/media/instagram-light.png') }}" alt="google icon"
                            data-app-light-img="front-pages/icons/instagram-light.png"
                            data-app-dark-img="front-pages/icons/instagram-dark.png" loading="lazy"/>
                    </a>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer: End -->


    <div class="buy-now">
        <div class="btn-group ">
            <button type="button"
                class="btn btn-success btn-icon rounded-pill dropdown-toggle hide-arrow btn-buy-now"
                data-bs-toggle="dropdown" aria-expanded="false"><img src="{{ asset('storage/images/wa.png') }}" loading="lazy"
                    alt="wa" width="60"></button>
            <ul class="dropdown-menu dropdown-menu-end">
                <li><a class="dropdown-item"
                        href="https://wa.me/6282165700141?text=%20am%20interested%20in%20your%20car%20for%20sale"
                        target="_blank">Ilham Syahputra</a></li>
                <li><a class="dropdown-item" href="javascript:void(0);">Ilham</a></li>
                <li><a class="dropdown-item" href="javascript:void(0);">Something else here</a></li>
                <li>
                    <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="javascript:void(0);">Separated link</a></li>
            </ul>
        </div>
    </div>

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="{{ asset('front/js/popper.js') }}"></script>
    <script src="{{ asset('front/js/bootstrap.js') }}"></script>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>




    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="{{ asset('front/js/nouislider.js') }}"></script>
    <script src="{{ asset('front/js/swiper.js') }}"></script>
    <script src="{{ asset('front/js/lazysizes.min.js') }}"></script>

    <!-- Main JS -->
    <script src="https://demos.themeselection.com/sneat-bootstrap-html-admin-template/assets/js/front-main.js"></script>


    <!-- Page JS -->
    <script src="{{ asset('front/js/front-page-landing.js') }}"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="{{ asset('front/select2/js/select2.min.js') }}"></script>

    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>


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


</body>

</html>

<!-- beautify ignore:end -->
