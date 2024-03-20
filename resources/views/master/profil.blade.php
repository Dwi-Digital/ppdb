<!-- Menghubungkan dengan view template master -->
@extends('backend.index')

<!-- isi bagian judul halaman -->
<!-- cara penulisan isi section yang pendek -->
@section('judul_halaman', 'Halaman Profil')

<!-- isi bagian konten -->
<!-- cara penulisan isi section yang panjang -->
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <!-- Content -->

        <h4 class="py-3 mb-4">
            <span class="text-muted fw-light">Profil Pengguna</span>
        </h4>


        <!-- Header -->
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="user-profile-header-banner">
                        <img src="{{ asset('storage/images/profile-banner.png') }}" alt="Banner image" class="rounded-top">
                    </div>
                    <div class="user-profile-header d-flex flex-column flex-sm-row text-sm-start text-center mb-4">
                        <div class="flex-shrink-0 mt-n2 mx-sm-0 mx-auto">
                            <img src="{{ url('storage/images/user/' . Auth::user()->avatar) }}" alt="user image"
                                class="d-block h-auto ms-0 ms-sm-4 rounded user-profile-img">
                        </div>
                        <div class="flex-grow-1 mt-3 mt-sm-5">
                            <div
                                class="d-flex align-items-md-end align-items-sm-start align-items-center justify-content-md-between justify-content-start mx-4 flex-md-row flex-column gap-4">
                                <div class="user-profile-info">
                                    <h4>{{ Auth::user()->name }}</h4>
                                    <ul
                                        class="list-inline mb-0 d-flex align-items-center flex-wrap justify-content-sm-start justify-content-center gap-2">

                                        <li class="list-inline-item fw-medium">
                                            <i class='bx bx-buildings'></i> {{ Auth::user()->instansi }}
                                        </li>
                                        <li class="list-inline-item fw-medium">
                                            <i class='bx bx-calendar-alt'></i> Bergabung Sejak
                                            {{ \Carbon\Carbon::parse(Auth::user()->created_at)->diffForHumans() }}
                                        </li>
                                    </ul>
                                </div>
                                <a href="javascript:void(0)" class="btn btn-primary text-nowrap"  data-bs-toggle="modal"
                                data-bs-target="#upload{{ Auth::user()->id }}">
                                    <i class='bx bx-user-check me-1'></i> Ubah Foto
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/ Header -->


        <!-- User Profile Content -->
        <div class="row">
            <div class="col-xl-4 col-lg-5 col-md-5">
                <!-- About User -->
                <div class="card mb-4">
                    <div class="card-body">
                        <small class="text-muted text-uppercase">About</small>
                        <ul class="list-unstyled mb-4 mt-3">
                            <li class="d-flex align-items-center mb-3"><i class="bx bx-user"></i><span
                                    class="fw-medium mx-2">Nama Lengkap:</span> <span>{{ Auth::user()->name }}</span></li>
                            <li class="d-flex align-items-center text-wrap mb-3"><i class="bx bx-envelope"></i><span
                                    class="fw-medium mx-2">Email:</span> <span>{{ Auth::user()->email }}</span></li>
                            <li class="d-flex align-items-center mb-3"><i class="bx bx-star"></i><span
                                    class="fw-medium mx-2">Role:</span> <span>{{ Auth::user()->role }}</span></li>
                        </ul>

                    </div>
                </div>
                <!--/ About User -->
            </div>
            <div class="col-xl-8 col-lg-7 col-md-7">
                <!-- Activity Timeline -->
                <div class="card card-action mb-4">
                    <div class="card-header align-items-center">
                        <h5 class="card-action-title mb-0"><i class='bx bx-user-account me-2'></i>Update Data</h5>

                    </div>
                    <div class="card-body">
                        <form action="/update-user/{{ Auth::user()->id }}" class="row g-3" method="POST"
                            enctype="multipart/form-data">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                            <div class="col-12">
                                <label>nama Lengkap</label>
                                <input type="text" name="name"
                                    class="form-control @error('name') is-invalid @enderror" placeholder="Enter a name"
                                    value="{{ Auth::user()->name }}" tabindex="-1" autocomplete="off" required />

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-12">
                                <label>Instansi</label>
                                <input type="text" name="instansi"
                                    class="form-control @error('instansi') is-invalid @enderror"
                                    placeholder="Enter a Instansi" value="{{ Auth::user()->instansi }}" tabindex="-1"
                                    autocomplete="off" required />

                                @error('instansi')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-12">
                                <label>Email</label>
                                <input type="email" name="email"
                                    class="form-control  @error('email') is-invalid @enderror" placeholder="Enter a Email"
                                    value="{{ Auth::user()->email }}" tabindex="-1" autocomplete="off" required />
                                <p class="text-muted" style="margin-bottom: -5px;">Email Aktif</p>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-12">
                                <label>Password</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror"
                                    name="password" placeholder="Password" id="passwordKu" autocomplete="new-password"
                                    required>

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <input type="checkbox" class="passshow" onclick="showHide()"> Show Password
                            </div>


                            <div class="col-12 text-center">
                                <button type="submit" class="btn btn-primary me-sm-3 me-1">Update</button>

                            </div>
                        </form>
                    </div>
                </div>
                <!--/ Activity Timeline -->
            </div>
        </div>
        <!--/ User Profile Content -->

        <!-- / Content -->

    </div>

    <div class="modal fade" id="upload{{ Auth::user()->id }}" tabindex="-1" role="dialog" data-backdrop="static"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form method="post" action="/user_upload/{{ Auth::user()->id }}" enctype="multipart/form-data">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Upload Foto</h5>
                    </div>
                    <div class="modal-body">

                        {{ csrf_field() }}
                        {{ method_field('PUT') }}

                        <label>Pilih Foto</label>
                        <div class="form-group">
                            <input type="hidden" name="id" id="id" value="{{ Auth::user()->id }}">
                            <input type="file" name="avatar" id="avatar" value="{{ Auth::user()->avatar }}"
                                required="required">
                            <img src="{{ asset('storage/images/user/' . Auth::user()->avatar) }}" width="70px"
                                height="70px" alt="">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Upload</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
