<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="light-style layout-navbar-fixed layout-wide ">

<head>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>PPDB Aceh 2024 - Dinas Pendidikan Aceh</title>


    <meta name="description" content="Penerimaan Peserta Didik Baru Dinas Pendidikan Aceh" />
    <meta name="keywords" content="ppdb, dinas pendidikan aceh, aceh, zonasi">
    <!-- Canonical SEO -->


    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('storage/images/icon.webp') }}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet">


    <link rel="stylesheet" href="{{ asset('front/css/boxicons.css') }}" />

    {{-- ppdb --}}
    <link rel="stylesheet" href="{{ asset('landing/css/ppdb1.css') }}" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link href="{{ asset('front/select2/css/select2.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('front/select2-bootstrap-5-theme/select2-bootstrap-5-theme.min.css') }}" rel="stylesheet" />


    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('front/css/core.css') }}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('front/css/themedefault.css') }}" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('front/css/demo.css') }}" />
    <link rel="stylesheet" href="{{ asset('front/css/front-page.css') }}" />
    <!-- Vendors CSS -->

    <link rel="stylesheet" href="{{ asset('front/css/nouislider.css') }}" />
    <link rel="stylesheet" href="{{ asset('front/css/swiper.css') }}" />

    <!-- Page CSS -->

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

    <style>
        #recaptcha-info {
            position: fixed;
            bottom: 20px;
            right: 20px;
            padding: 10px;
            border-radius: 20px;
            background-color: #4CAF50;
            font-family: Arial, sans-serif;
            font-size: 14px;
            color: #FFF;
            display: flex;
            align-items: center;
            transition: opacity 0.3s ease-in-out, transform 0.3s ease-in-out;
            opacity: 0;
            transform: translateY(100%);
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
        }

        #recaptcha-info.show {
            opacity: 1;
            transform: translateY(0);
        }

        .recaptcha-text {
            margin: 0 5px;
        }

        .recaptcha-logo {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            border: 2px solid #FFF;
            padding: 2px;
            background-color: #FFF;
            transition: transform 0.3s ease-in-out;
        }

        .recaptcha-logo:hover {
            transform: rotate(360deg);
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            showRecaptchaInfo();
        });

        // Fungsi untuk menampilkan teks "Protected by reCAPTCHA"
        function showRecaptchaInfo() {
            var recaptchaInfo = document.getElementById('recaptcha-info');
            recaptchaInfo.classList.remove('recaptcha-hide');
            setTimeout(function() {
                recaptchaInfo.classList.add('show');
            }, 100);
        }

        // Fungsi untuk menyembunyikan teks "Protected by reCAPTCHA"
        function hideRecaptchaInfo() {
            var recaptchaInfo = document.getElementById('recaptcha-info');
            recaptchaInfo.classList.remove('show');
            setTimeout(function() {
                recaptchaInfo.classList.add('recaptcha-hide');
            }, 300);
        }

        // Contoh pemanggilan fungsi
        showRecaptchaInfo(); // Tampilkan teks saat halaman dimuat
        setTimeout(hideRecaptchaInfo, 5000); // Sembunyikan teks setelah 5 detik (opsional)
    </script>

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

                    <!-- Style Switcher -->
                    <!--<li class="nav-item dropdown-style-switcher dropdown me-2 me-xl-0">-->
                    <!--    <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);"-->
                    <!--        data-bs-toggle="dropdown">-->
                    <!--        <i class='bx bx-sm'></i>-->
                    <!--    </a>-->
                    <!--    <ul class="dropdown-menu dropdown-menu-end dropdown-styles">-->
                    <!--        <li>-->
                    <!--            <a class="dropdown-item" href="javascript:void(0);" data-theme="light">-->
                    <!--                <span class="align-middle"><i class='bx bx-sun me-2'></i>Light</span>-->
                    <!--            </a>-->
                    <!--        </li>-->
                    <!--        <li>-->
                    <!--            <a class="dropdown-item" href="javascript:void(0);" data-theme="dark">-->
                    <!--                <span class="align-middle"><i class="bx bx-moon me-2"></i>Dark</span>-->
                    <!--            </a>-->
                    <!--        </li>-->
                    <!--        <li>-->
                    <!--            <a class="dropdown-item" href="javascript:void(0);" data-theme="system">-->
                    <!--                <span class="align-middle"><i class="bx bx-desktop me-2"></i>System</span>-->
                    <!--            </a>-->
                    <!--        </li>-->
                    <!--    </ul>-->
                    <!--</li>-->
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

    @include('sweetalert::alert')
    <main class = "">
        @yield('content')

        <div id="recaptcha-info" class="recaptcha-hide">
            <span class="recaptcha-text">Protected by</span>
            <img src="https://www.gstatic.com/recaptcha/api2/logo_48.png" alt="reCAPTCHA Logo"
                class="recaptcha-logo">
            <span class="recaptcha-text">reCAPTCHA</span>
        </div>


    </main>

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
                        <img src="{{ asset('storage/images/media/facebook-light.png') }}" alt="facebook icon" />
                    </a>
                    <a href="https://twitter.com/disdikacehprov" class="footer-link me-3" target="_blank">
                        <img src="{{ asset('storage/images/media/twitter-light.png') }}" alt="twitter icon" />
                    </a>
                    <a href="https://www.instagram.com/dinaspendidikanaceh/" class="footer-link" target="_blank">
                        <img src="{{ asset('storage/images/media/instagram-light.png') }}" alt="google icon" />
                    </a>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer: End -->
    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->

    <script src="{{ asset('front/js/popper.js') }}"></script>
    <script src="{{ asset('front/js/bootstrap.js') }}"></script>

    <!-- endbuild -->
    <script src="https://www.google.com/recaptcha/api.js"></script>



    <!-- Vendors JS -->
    <script src="{{ asset('front/js/nouislider.js') }}"></script>
    <script src="{{ asset('front/js/swiper.js') }}"></script>

    <!-- Main JS -->
    <script src="https://demos.themeselection.com/sneat-bootstrap-html-admin-template/assets/js/front-main.js"></script>


    <!-- Page JS -->
    <script src="{{ asset('front/js/front-page-landing.js') }}"></script>

    <script src="{{ asset('front/select2/js/select2.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('#jenis').select2({
                theme: 'bootstrap-5',
                // dropdownParent: $("#addJalurModal")
            });
        });
    </script>

    <script>
        function showHide() {
            var inputan = document.getElementById("passwordKu");
            if (inputan.type === "password") {
                inputan.type = "text";
            } else {
                inputan.type = "password";
            }
        }
    </script>


    {{-- uotofill --}}
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            // Memanggil fungsi autofill saat nilai input .nisn berubah
            $(".nisn").on('keyup', function() {
                autofill();
            });
        });

        function autofill() {
            var nisn = $(".nisn").val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });

            $.ajax({
                url: '/gettoken/' + nisn,
                method: "get",
                dataType: 'json',
                processData: false,
                contentType: false,
                success: function(response) {
                    // Mengisi nilai input dengan data dari respons
                    $("#ins").val(response.sekolah)
                    $("#nama").val(response.nama)
                    $("#tanggal").val(response.tanggal)
                    $("#kabupaten").val(response.kabupaten)
                    $("#kecamatan").val(response.kecamatan)
                    $("#desa").val(response.desa)
                    $("#token").val(response.token)
                    $("#verifikator").val(response.verifikator)
                }
            });
        }
    </script>




</body>

</html>

<!-- beautify ignore:end -->
