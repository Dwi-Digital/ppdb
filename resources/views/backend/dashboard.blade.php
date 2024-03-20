<!-- Menghubungkan dengan view template master -->
@extends('backend.index')

<!-- isi bagian judul halaman -->
<!-- cara penulisan isi section yang pendek -->
@section('judul_halaman', 'Halaman Dashboard')


<!-- isi bagian konten -->
<!-- cara penulisan isi section yang panjang -->
@section('content')
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">

        <!-- dashboard -->
        @if (Auth::check() && Auth::user()->role == 'Super Admin' or Auth::check() && Auth::user()->role == 'Pengembang')
            <div class="col-12 col-lg-12 order-2 order-md-12 order-lg-12 mb-4">
                <!-- Card Border Shadow -->
                <div class="row dashboard">
                    <div class="col-sm-6 col-lg-3 mb-4">
                        <div class="card card-border-shadow-primary h-100">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-2 pb-1">
                                    <div class="avatar me-2">
                                        <span class="avatar-initial rounded bg-label-primary"><i
                                                class="bx bx-barcode-reader"></i></span>
                                    </div>
                                    <h4 class="ms-1 mb-0">{{ $t->total() }}</h4>
                                </div>
                                <p class="mb-1">Verifikasi</p>
                                <p class="mb-0">
                                    {{-- <span class="fw-medium me-1">70%</span> --}}
                                    <small class="text-muted">Sudah Verifikasi Berkas</small>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3 mb-4">
                        <div class="card card-border-shadow-warning h-100">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-2 pb-1">
                                    <div class="avatar me-2">
                                        <span class="avatar-initial rounded bg-label-success"><i
                                                class='bx bxs-user-account'></i></span>
                                    </div>
                                    <h4 class="ms-1 mb-0">{{ $k }}</h4>
                                </div>
                                <p class="mb-1">Mengisi data</p>
                                <p class="mb-0">
                                    <?php
                                    $user = $u;
                                    $konfir = $k;
                                    
                                    if ($user != null && $user != 0) {
                                        $bagi = $konfir / $user;
                                        $hasil1 = $bagi * 100;
                                    
                                        echo "<span class='fw-medium me-1'>" . number_format($hasil1) . "%</span>";
                                    }
                                    
                                    
                                    ?>
                                    {{-- <span class="fw-medium me-1">{{ number_format($hasil1) }}%</span> --}}
                                    <small class="text-muted">dari Pendaftar</small>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3 mb-4">
                        <div class="card card-border-shadow-danger h-100">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-2 pb-1">
                                    <div class="avatar me-2">
                                        <span class="avatar-initial rounded bg-label-danger"><i
                                                class='bx bxs-user-account'></i></span>
                                    </div>
                                    <h4 class="ms-1 mb-0">{{ $u - $k }}</h4>
                                </div>
                                <p class="mb-1">Belum Isi Data</p>
                                <p class="mb-0">
                                    <?php
                                    $user = $u;
                                    $konfir = $k;
                                    
                                    if ($user != null && $user != 0) {
                                        $bagi = $konfir / $user;
                                        $hasil = $bagi * 100;
                                    
                                        echo "<span class='fw-medium me-1'>" . number_format($hasil - 100) . "%</span>";
                                    }
                                    
                                   
                                    
                                    ?>
                                    <small class="text-muted">dari Pendaftar</small>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3 mb-4">
                        <div class="card card-border-shadow-info h-100">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-2 pb-1">
                                    <div class="avatar me-2">
                                        <span class="avatar-initial rounded bg-label-info"><i class='bx bx-data'></i></span>
                                    </div>
                                    <h4 class="ms-1 mb-0">{{ $d->total() }}</h4>
                                </div>
                                <p class="mb-1">Basedata</p>
                                <p class="mb-0">
                                    {{-- <span class="fw-medium me-1">-2.5%</span> --}}
                                    <small class="text-muted">Terdata Di sistem</small>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/ Card Border Shadow -->
            </div>
        @endif
        <!--/ Total Revenue -->
        {{-- <div class="col-12 col-md-8 col-lg-4 order-3 order-md-2">
       
    </div> --}}
        <div class="row">
            <!-- Order Statistics -->
            @if (Auth::check() && Auth::user()->role == 'Super Admin' or Auth::check() && Auth::user()->role == 'Pengembang')
                <div class="col-md-6 col-lg-4 col-xl-4 order-0 mb-4">
                    <div class="card h-60">
                        <div class="card-header d-flex align-items-center justify-content-between pb-0">
                            <div class="card-title mb-0">
                                <h5 class="m-0 me-2">Statistik Pendaftar</h5>
                                <small class="text-muted">{{ $useracount}} Total Pendaftar</small>
                            </div>
                            {{-- <div class="dropdown">
                            <button class="btn p-0" type="button" id="orederStatistics" data-bs-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="orederStatistics">
                                <a class="dropdown-item" href="javascript:void(0);">Select All</a>
                                <a class="dropdown-item" href="javascript:void(0);">Refresh</a>
                                <a class="dropdown-item" href="javascript:void(0);">Share</a>
                            </div>
                        </div> --}}
                        </div>
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <div class="d-flex flex-column align-items-center gap-1">
                                    <h2 class="mb-2">{{ $useracount}}</h2>
                                    <span>Total Pendaftar</span>
                                </div>
                                <div id="donutChart"></div>
                            </div>
                            <ul class="p-0 m-0">
                                <li class="d-flex mb-4 pb-1">
                                    <div class="avatar flex-shrink-0 me-3">
                                        <span class="avatar-initial rounded bg-label-primary"><i
                                                class='bx bx-male'></i></span>
                                    </div>
                                    <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                        <div class="me-2">
                                            <h6 class="mb-0">Pendaftar Laki-laki</h6>
                                            {{-- <small class="text-muted">Mobile, Earbuds, TV</small> --}}
                                        </div>
                                        <div class="user-progress">
                                            <small class="fw-medium">{{ $laki }}</small>
                                        </div>
                                    </div>
                                </li>

                                <li class="d-flex mb-4 pb-1">
                                    <div class="avatar flex-shrink-0 me-3">
                                        <span class="avatar-initial rounded bg-label-danger"><i
                                                class='bx bx-female'></i></span>
                                    </div>
                                    <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                        <div class="me-2">
                                            <h6 class="mb-0">Pendaftar Perempuan</h6>
                                            {{-- <small class="text-muted">Mobile, Earbuds, TV</small> --}}
                                        </div>
                                        <div class="user-progress">
                                            <small class="fw-medium">{{ $perempuan }}</small>
                                        </div>
                                    </div>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>
            @endif
            <!--/ Order Statistics -->




            <!-- Activity Timeline -->
            <div class="col-md-12 col-lg-8 order-4 order-lg-3 ">
                <div class="card" style="height: 30em">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h5 class="card-title m-0 me-2">Activity Timeline</h5>
                        {{-- <div class="dropdown">
                            <button class="btn p-0" type="button" id="timelineWapper" data-bs-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="timelineWapper">
                                <a class="dropdown-item" href="javascript:void(0);">Select All</a>
                                <a class="dropdown-item" href="javascript:void(0);">Refresh</a>
                                <a class="dropdown-item" href="javascript:void(0);">Share</a>
                            </div>
                        </div> --}}
                    </div>
                    <div class="card-body timelines">
                        <!-- Activity Timeline -->
                        <ul class="timeline">
                            @foreach ($logs as $p)
                                <li class="timeline-item timeline-item-transparent">
                                    <span class="timeline-point-wrapper"><span
                                            class="timeline-point timeline-point-primary"></span></span>
                                    <div class="timeline-event">
                                        <div class="timeline-header mb-1">
                                            <h6 class="mb-0">{{ $p->users->name }}</h6>
                                            <small
                                                class="text-muted">{{ \Carbon\Carbon::parse($p->created_at)->diffForHumans() }}</small>
                                        </div>
                                        <p class="mb-2">{{ $p->status }}</p>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                        <!-- /Activity Timeline -->
                    </div>
                </div>
            </div>
            <!--/ Activity Timeline -->

        </div>

    </div>
    <!-- / Content -->
@endsection


