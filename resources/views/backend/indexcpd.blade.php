<!doctype html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"
    class="light-style layout-navbar-fixed layout-menu-fixed layout-compact " dir="ltr" data-theme="theme-default"
    data-assets-path="https://demos.themeselection.com/sneat-bootstrap-html-admin-template/assets/"
    data-template="vertical-menu-template">

<head>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>PPDB Aceh 2024 - Dinas Pendidikan Aceh</title>


    <meta name="description"
        content="Most Powerful &amp; Comprehensive Bootstrap 5 HTML Admin Dashboard Template built for developers!" />
    <meta name="keywords" content="dashboard, bootstrap 5 dashboard, bootstrap 5 design, bootstrap 5">
    <!-- Canonical SEO -->
    <link rel="canonical" href="https://themeselection.com/item/sneat-bootstrap-html-admin-template/">


    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('storage/images/icons.webp') }}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css" />


    <!-- Icons -->
    <link rel="stylesheet" href="{{ asset('front/css/boxicons.css') }}" />
    <link rel="stylesheet" href="{{ asset('front/css/fontawesome.css') }}" />
    <link rel="stylesheet" href="{{ asset('front/css/flag-icons.css') }}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('front/css/core.css') }}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('front/css/themedefault.css') }}" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('front/css/demo.css') }}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('front/css/perfect-scrollbar.css') }}" />
    <link rel="stylesheet" href="{{ asset('front/css/typeahead.css') }}" />
    <link rel="stylesheet" href="{{ asset('front/css/apex-charts.css') }}" />

    {{-- sistem --}}
    <link rel="stylesheet" href="{{ asset('front/css/ppdbs.css') }}" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link href="{{ asset('front/select2/css/select2.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('front/select2-bootstrap-5-theme/select2-bootstrap-5-theme.min.css') }}" rel="stylesheet" />


    <link rel="stylesheet"
        href="https://demos.themeselection.com/sneat-bootstrap-html-admin-template/assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css">

    <link rel="stylesheet"
        href="https://demos.themeselection.com/sneat-bootstrap-html-admin-template/assets/vendor/libs/@form-validation/umd/styles/index.min.css" />


    <!-- Helpers -->
    <script src="https://demos.themeselection.com/sneat-bootstrap-html-admin-template/assets/vendor/js/helpers.js"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
    <script
        src="https://demos.themeselection.com/sneat-bootstrap-html-admin-template/assets/vendor/js/template-customizer.js">
    </script>
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="https://demos.themeselection.com/sneat-bootstrap-html-admin-template/assets/js/config.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">

    <style>
        #lulusText b {
            display: inline-block;
            animation: wave 2s infinite linear;
        }

        @keyframes wave {
            0% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-5px);
                /* Tinggi maksimum gelombang */
            }

            100% {
                transform: translateY(0);
            }
        }


        .animate-balloon {
            transition: transform 0.5s ease, opacity 0.5s ease;
            position: relative;
            overflow: hidden;
            background-color: transparent;
            border: none;
            display: inline-block;
            /* Tambahkan properti ini agar teks dapat muncul */
            padding: 10px 20px;
            /* Sesuaikan padding sesuai kebutuhan */
            text-decoration: none;
            /* Hapus underline bawaan dari anchor tag */
        }

        .animate-balloon::before {
            content: '';
            position: absolute;
            top: -100%;
            left: 50%;
            transform: translateX(-50%);
            width: 200%;
            height: 200%;
            background: rgba(255, 0, 0, 0.5);
            border-radius: 50%;
            animation: balloon 5s linear infinite;
        }

        .animate-balloon:hover {
            transform: scale(1.1);
            opacity: 0.8;
        }

        @keyframes balloon {
            0% {
                top: -100%;
            }

            50% {
                top: 0;
            }

            100% {
                top: -100%;
            }
        }
    </style>

</head>

<body>

    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-navbar-full layout-horizontal layout-without-menu">
        <div class="layout-container">

            <!-- Navbar -->
            @include('backend.navbarcpd')
            <!-- / Navbar -->



            <!-- Layout container -->
            <div class="layout-page">

                <!-- Content wrapper -->
                <div class="content-wrapper">

                    <!-- Menu -->
                    @include('backend.sidebarcpd')
                    <!-- / Menu -->

                    <!-- Content -->
                    @include('sweetalert::alert')
                    @yield('content')
                    <!--/ Content -->

                    @include('backend.footercpd')


                    <div class="content-backdrop fade"></div>
                </div>
                <!--/ Content wrapper -->
            </div>

            <!--/ Layout container -->
        </div>

    </div>



    <!-- Overlay -->
    <div class="layout-overlay layout-menu-toggle"></div>


    <!-- Drag Target Area To SlideIn Menu On Small Screens -->
    <div class="drag-target"></div>

    <!--/ Layout wrapper -->


    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> --}}

    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('front/select2/js/select2.min.js') }}"></script>

    <script src="{{ asset('front/js/popper.js') }}"></script>
    <script src="{{ asset('front/js/bootstrap.js') }}"></script>
    <script src="{{ asset('front/js/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('front/js/hammer.js') }}"></script>
    <script src="{{ asset('front/js/i18n.js') }}"></script>
    <script src="{{ asset('front/js/typeahead.js') }}"></script>
    <script src="{{ asset('front/js/menu.js') }}"></script>

    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>


    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="{{ asset('front/js/apexcharts.js') }}"></script>


    <!-- Main JS -->
    <script src="https://demos.themeselection.com/sneat-bootstrap-html-admin-template/assets/js/main.js"></script>


    <!-- Page JS -->
    <script src="{{ asset('front/js/dashboards-analytics.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>


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


    <script>
        $(document).ready(function() {
            $('#dt-users-table').DataTable({});
        });
    </script>

    <script type="text/javascript">
        var url = window.location;
        // for sidebar menu entirely but not cover treeview
        $('ul.menu-inner a').filter(function() {
            return this.href == url;
        }).parent().addClass('active');

        $('ul.menu-inner menu-item').filter(function() {
            return this.href == url;
        }).parent().addClass('active open');

        // for treeview
        $('ul.menu-item a').filter(function() {
            return this.href == url;
        }).closest('.menu-item').addClass('active open');

        $('ul.sub-menu a').filter(function() {
            return this.href == url;
        }).closest('.sub-menu').addClass('expand');
    </script>

    <script type="text/javascript">
        // CSRF Token
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $(document).ready(function() {

            $("#satpen").select2({
                theme: 'bootstrap-5',
                placeholder: 'select',
                dropdownParent: $("#addZonasiModal"),
                ajax: {
                    // url: 'get-sekolah',
                    url: "{{ route('get-sekolah') }}",
                    type: "post",
                    dataType: 'json',
                    delay: 250,
                    // theme: 'bootstrap-5',
                    data: function(params) {
                        return {
                            _token: CSRF_TOKEN,
                            search: params.term // search term

                        };
                    },
                    processResults: function(response) {
                        return {
                            results: response
                        };
                    },
                    cache: true
                }

            });

        });
    </script>

    <script type="text/javascript">
        // CSRF Token
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $(document).ready(function() {

            $("#desa1").select2({
                theme: 'bootstrap-5',
                placeholder: 'select',
                dropdownParent: $("#addDzonasiModal"),
                ajax: {
                    // url: 'get-sekolah',
                    url: "{{ route('get-desa') }}",
                    type: "post",
                    dataType: 'json',
                    delay: 250,
                    // theme: 'bootstrap-5',
                    data: function(params) {
                        return {
                            _token: CSRF_TOKEN,
                            search: params.term // search term

                        };
                    },
                    processResults: function(response) {
                        return {
                            results: response
                        };
                    },
                    cache: true
                }

            });

        });
    </script>

    <script>
        $(document).ready(function() {
            $('#aktif').select2({
                theme: 'bootstrap-5',
                dropdownParent: $("#addJalurModal")
            });

            $('#color').select2({
                theme: 'bootstrap-5',
                dropdownParent: $("#addJalurModal")
            });

            $('#lokasi').select2({
                theme: 'bootstrap-5',
                dropdownParent: $("#addJalurModal")
            });

            $('#kab').select2({
                theme: 'bootstrap-5',
                dropdownParent: $("#addZonasiModal")
            });
        });
    </script>

    <script>
        $(document).ready(function() {

            $('#jenjang').select2({
                theme: 'bootstrap-5',
                dropdownParent: $("#addSekolahModal")
            });

            $('#status').select2({
                theme: 'bootstrap-5',
                dropdownParent: $("#addSekolahModal")
            });

            $('#akreditasi').select2({
                theme: 'bootstrap-5',
                dropdownParent: $("#addSekolahModal")
            });

            $('#kabupaten').select2({
                theme: 'bootstrap-5',
                dropdownParent: $("#addDzonasiModal")
            });

            $('#kecamatan').select2({
                theme: 'bootstrap-5',
                dropdownParent: $("#addDzonasiModal")
            });

            $('#desa').select2({
                theme: 'bootstrap-5',
                dropdownParent: $("#addDzonasiModal")
            });

            $('#sekolah').select2({
                theme: 'bootstrap-5',
                dropdownParent: $("#addDzonasiModal")
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#kabupaten1').select2({
                theme: 'bootstrap-5',
                dropdownParent: $("#navs-justified-zonasi"),
            });

            $('#kecamatan1').select2({
                theme: 'bootstrap-5',
                dropdownParent: $("#navs-justified-zonasi")
            });

            $('#desa1').select2({
                theme: 'bootstrap-5',
                dropdownParent: $("#navs-justified-zonasi")
            });

            $('#sekolah1').select2({
                theme: 'bootstrap-5',
                dropdownParent: $("#navs-justified-zonasi")
            });

            $('#sekolah2').select2({
                theme: 'bootstrap-5',
                dropdownParent: $("#navs-justified-zonasi")
            });

            $('#agama').select2({
                theme: 'bootstrap-5',
                dropdownParent: $("#navs-justified-pribadi")
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#provinsip').select2({
                theme: 'bootstrap-5',
                dropdownParent: $("#navs-justified-pendidikan"),
            });

            $('#kabupatenp').select2({
                theme: 'bootstrap-5',
                dropdownParent: $("#navs-justified-pendidikan")
            });

            $('#instansisekolah').select2({
                theme: 'bootstrap-5',
                dropdownParent: $("#addUserModal")
            });

        });
    </script>


    <script>
        function startCalc() {
            interval = setInterval("calc()", 1);
        }

        function calc() {
            satu = document.autoSumForm.prestasi.value;
            dua = document.autoSumForm.pindahOrtu.value;
            tiga = document.autoSumForm.afirmasi.value;
            empat = document.autoSumForm.zonasi.value;
            document.autoSumForm.kuota.value = (satu * 1) + (dua * 1) + (tiga * 1) + (empat * 1);
        }

        function stopCalc() {
            clearInterval(interval);
        }
    </script>

    <script>
        function goBack() {
            window.history.back();
        }
    </script>


    {{-- select wilayah --}}
    <script type="text/javascript">
        $(document).ready(function() {
            $('#kabupaten').on('change', function() {
                var id = $(this).val();
                // console.log(kode_kategori);
                if (id) {
                    $.ajax({
                        url: '/getkecamatan/' + id,
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
                var id = $(this).val();
                // console.log(kode_kategori);
                if (id) {
                    $.ajax({
                        url: '/getdesa/' + id,
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
                                    $('select[name="id_desa"]').append(
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
                var id = $(this).val();
                // console.log(kode_kategori);
                if (id) {
                    $.ajax({
                        url: '/getsekolah/' + id,
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
                                        '<option value="' + sekolah.id + '">' +
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
    <script type="text/javascript">
        $(document).ready(function() {
            $('#kabupaten1').on('change', function() {
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
                                $('#kecamatan1').empty();
                                $('#kecamatan1').append('<option value="">-Pilih-</option>');
                                $.each(data, function(key, kecamatan) {
                                    $('select[name="kecamatan"]').append(
                                        '<option value="' + kecamatan.nm_kec +
                                        '">' +
                                        kecamatan.nm_kec + '</option>'
                                    );
                                });
                            } else {
                                $('#kecamatan1').empty();
                            }
                        }
                    });
                } else {
                    $('#kecamatan1').empty();
                }
            });


            // get desa
            $('#kecamatan1').on('change', function() {
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
                                $('#desa1').empty();
                                $('#desa1').append('<option value="">-Pilih-</option>');
                                $.each(data, function(key, desa) {
                                    $('select[name="desa"]').append(
                                        '<option value="' + desa.nm_desa + '">' +
                                        desa.nm_desa + '</option>'
                                    );
                                });
                            } else {
                                $('#desa1').empty();
                            }
                        }
                    });
                } else {
                    $('#desa1').empty();
                }
            });

            // get sekolah
            // $('#desa1').on('change', function() {
            //     var id = $(this).val();
            //     // console.log(kode_kategori);
            //     if (id) {
            //         $.ajax({
            //             url: '/getsekolah/' + id,
            //             type: 'GET',
            //             data: {
            //                 '_token': '{{ csrf_token() }}'
            //             },
            //             dataType: 'json',
            //             success: function(data) {
            //                 // console.log(data);
            //                 if (data) {
            //                     $('#sekolah1').empty();
            //                     $('#sekolah1').append('<option value="">-Pilih-</option>');
            //                     $.each(data, function(key, sekolah) {
            //                         $('select[name="sekolah"]').append(
            //                             '<option value="' + sekolah.id +
            //                             '" >' +
            //                             sekolah.id_zonasi + ' - ' + sekolah.bobot +
            //                             ' </option>'
            //                         );
            //                     });
            //                 } else {
            //                     $('#sekolah1').empty();
            //                 }
            //             }
            //         });
            //     } else {
            //         $('#sekolah1').empty();
            //     }
            // });

            $('#desa1').on('change', function() {
                var nm_kec = $('#kecamatancpd').val(); // Ambil nilai kecamatan dari input
                var nm_desa = $(this).val(); // Ambil nilai desa dari select

                // Lakukan permintaan AJAX untuk mendapatkan sekolah berdasarkan kecamatan dan desa
                $.ajax({
                    url: '/getsekolah/' + nm_kec + '/' + nm_desa,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        $('#sekolah1').empty(); // Kosongkan opsi pada dropdown sekolah
                        $('#sekolah1').append(
                        '<option value="">---Pilih ---</option>'); // Tambahkan opsi default

                        // Loop melalui data yang diterima dan tambahkan opsi ke dropdown sekolah
                        $.each(data, function(key, sekolah) {
                            $('#sekolah1').append('<option value="' + sekolah.id +
                                '">' + sekolah.id_zonasi + '</option>');
                        });

                       
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText); // Tampilkan pesan kesalahan jika ada
                    }
                });
            });


            $('#sekolah1').on('change', function() {
                var id_zonasi = $(this).val();
                // console.log(kode_kategori);
                if (id_zonasi) {
                    $.ajax({
                        url: '/getbobotsekolah/' + id_zonasi,
                        type: 'GET',
                        data: {
                            '_token': '{{ csrf_token() }}'
                        },
                        dataType: 'json',
                        success: function(data) {
                            // console.log(data);
                            if (data) {
                                $('#sekolah2').empty();
                                $('#sekolah2').append('<option value="">-Pilih-</option>');
                                $.each(data, function(key, bobot) {
                                    $('select[name="sekolah_p2"]').append(
                                        '<option value="' + sekolah.id + '" >' +
                                        bobot.id_zonasi + ' - ' + bobot.bobot +
                                        ' </option>'
                                    );
                                });
                            } else {
                                $('#sekolah2').empty();
                            }
                        }
                    });
                } else {
                    $('#sekolah2').empty();
                }
            });
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#provinsip').on('change', function() {
                var id = $(this).val();
                // console.log(kode_kategori);
                if (id) {
                    $.ajax({
                        url: '/getkabupaten/' + id,
                        type: 'GET',
                        data: {
                            '_token': '{{ csrf_token() }}'
                        },
                        dataType: 'json',
                        success: function(data) {
                            // console.log(data);
                            if (data) {
                                $('#kabupatenp').empty();
                                $('#kabupatenp').append('<option value="">-Pilih-</option>');
                                $.each(data, function(key, kabupaten) {
                                    $('select[name="kabupaten"]').append(
                                        '<option value="' + kabupaten.nm_kab +
                                        '">' +
                                        kabupaten.nm_kab + '</option>'
                                    );
                                });
                            } else {
                                $('#kabupatenp').empty();
                            }
                        }
                    });
                } else {
                    $('#kabupatenp').empty();
                }
            });


            // get desa
            $('#kecamatan1').on('change', function() {
                var id = $(this).val();
                // console.log(kode_kategori);
                if (id) {
                    $.ajax({
                        url: '/getdesa/' + id,
                        type: 'GET',
                        data: {
                            '_token': '{{ csrf_token() }}'
                        },
                        dataType: 'json',
                        success: function(data) {
                            // console.log(data);
                            if (data) {
                                $('#desa1').empty();
                                $('#desa1').append('<option value="">-Pilih-</option>');
                                $.each(data, function(key, desa) {
                                    $('select[name="desa"]').append(
                                        '<option value="' + desa.id + '">' +
                                        desa.nm_desa + '</option>'
                                    );
                                });
                            } else {
                                $('#desa1').empty();
                            }
                        }
                    });
                } else {
                    $('#desa1').empty();
                }
            });


        });
    </script>
    {{-- end select  --}}

    {{-- uotofill --}}


    <script>
        // Ketika terjadi perubahan pada dropdown menu
        $('#sekolah1').on('change', function() {
            // Mendapatkan nilai opsi yang dipilih
            var id = $(this).val();

            // Melakukan permintaan AJAX untuk mendapatkan nama dari ID yang dipilih
            $.ajax({
                url: '/getbobotsekolah/' + id, // Ganti URL dengan URL yang sesuai
                method: 'GET',
                dataType: 'json',
                success: function(response) {
                    // Menampilkan nama dalam input
                    $('#nama').val(response.id_zonasi);
                },
                error: function(xhr, status, error) {
                    console.error(error); // Menampilkan pesan error jika permintaan gagal
                }
            });
        });
    </script>


    <script>
        function showDetails() {
            var keterangan = document.getElementById("keterangan");
            var toggleBtn = document.getElementById("toggleBtn");

            if (keterangan.style.display === "block") {
                keterangan.style.display = "none";
                toggleBtn.textContent = "Tampilkan";
            } else {
                keterangan.style.display = "block";
                toggleBtn.textContent = "Sembunyikan";
            }
        }
    </script>

    <script>
        $(document).ready(function() {
            $("#showFilterBtn").click(function() {
                $("#filterForm").toggle(); // Menampilkan/menyembunyikan form filter
                if ($("#filterForm").is(":visible")) {
                    $("#filterBtnText").text("Sembunyikan Filter");
                } else {
                    $("#filterBtnText").text("Tampilkan Filter");
                }
            });
        });
    </script>

    <script>
        function limitCheckbox(checkbox) {
            var checkboxes = document.querySelectorAll('input[type="checkbox"]:checked');
            if (checkboxes.length > 2) {
                checkbox.checked = false;
                toastr.warning('Anda hanya dapat memilih dua sekolah.');
            }
        }
    </script>

    <script>
        document.getElementById('selectAll').addEventListener('change', function() {
            const checkboxes = document.querySelectorAll('input[type="checkbox"][name="selectedItems[]"]');
            checkboxes.forEach(function(checkbox) {
                checkbox.checked = event.target.checked;
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
