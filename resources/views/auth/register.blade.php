<!-- Menghubungkan dengan view template master -->
@extends('layouts.app')

<!-- isi bagian judul halaman -->
<!-- cara penulisan isi section yang pendek -->
@section('judul_halaman', 'Halaman Pendaftaran')

<!-- isi bagian konten -->
<!-- cara penulisan isi section yang panjang -->
@section('content')
    <!-- Sections:Start -->
    <div data-bs-spy="scroll" class="scrollspy-example">
        <!-- Hero: Start -->
        <section id="hero-animation">
            <div id="#" class="section-py landing-hero position-relative">
                <div class="container">
                    <div class="hero-text-box text-center">
                        <h1 class="text-primary hero-title display-4 fw-bold">Pendaftaaran</h1>
                        <h2 class="hero-sub-title h6 mb-4 pb-1">
                            Kami menyediakan panduan untuk membantu anda, silahkan klik tombol berikut.
                        </h2>
                        <div class="landing-hero-btn d-inline-block position-relative">
                            <span class="hero-btn-item position-absolute d-none d-md-flex text-heading">Panduan Pendaftaran
                                <img src="https://demos.themeselection.com/sneat-bootstrap-html-admin-template/assets/img/front-pages/icons/Join-community-arrow.png"
                                    alt="Join community arrow" class="scaleX-n1-rtl" /></span>
                            <a href="/panduan" class="btn btn-primary">Baca Panduan Mendaftar</a>
                        </div>
                    </div>

                </div>
            </div>

            <div class="container pendaftaranUp">
                <div class="card" style="box-shadow: 0 0 10px   #2b2b2b80;">
                    <div class="card-header bg-pendaftaran">
                        <h4>Pendaftaran Akun</h4>
                    </div>
                    <div class="card-body ">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="row py-4">
                                <div class="col-6 ">
                                    <div class="container">

                                        <div class="form-group mb-2">
                                            <label for="nisn" class="mb-2">NISN <span class="text-danger">*</span>
                                            </label>

                                            <input type="text"
                                                class="form-control @error('nisn') is-invalid @enderror nisn"
                                                onblur="autofill()" name="nisn" value="{{ old('nisn') }}"
                                                placeholder="ex. 11*******5" autocomplete="off" maxlength="10"
                                                minlength="10" required>

                                            @error('nisn')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="form-group mb-2">
                                            <label for="name" class="mb-2">Nama Lengkap <span
                                                    class="text-danger">*</span></label>

                                            <input id="nama" type="text"
                                                class="form-control @error('name') is-invalid @enderror" name="name"
                                                value="{{ old('name') }}" placeholder="ex. Anonim" autocomplete="off"
                                                readonly required>

                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <input id="ins" type="hidden"
                                            class="form-control @error('instansi') is-invalid @enderror" name="instansi"
                                            value="{{ old('instansi') }}" placeholder="ex. Anonim" autocomplete="off"
                                            readonly required>


                                        <input id="kabupaten" type="hidden"
                                            class="form-control @error('kabupaten') is-invalid @enderror" name="kabupaten"
                                            value="{{ old('kabupaten') }}" placeholder="ex. Anonim" autocomplete="off"
                                            readonly required>

                                        <input id="kecamatan" type="hidden"
                                            class="form-control @error('kecamatan') is-invalid @enderror" name="kecamatan"
                                            value="{{ old('kecamatan') }}" placeholder="ex. Anonim" autocomplete="off"
                                            readonly required>

                                        <input id="desa" type="hidden"
                                            class="form-control @error('desa') is-invalid @enderror" name="desa"
                                            value="{{ old('desa') }}" placeholder="ex. Anonim" autocomplete="off" readonly
                                            required>

                                        <input id="tanggal" type="hidden"
                                            class="form-control @error('tanggal') is-invalid @enderror" name="tanggal"
                                            value="{{ old('tanggal') }}" placeholder="ex. Anonim" autocomplete="off"
                                            readonly required>

                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="form-group mb-2">
                                                    <label for="token" class="mb-2">Token <span
                                                            class="text-danger">*</span>
                                                    </label>
                                                    <input type="text" name="token" id="token"
                                                        class="form-control @error('token') is-invalid @enderror"
                                                        value="{{ old('token') }}" placeholder="ex. 1AkuCpd"
                                                        autocomplete="off" readonly required>

                                                    @error('token')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror

                                                </div>
                                            </div>
                                            <div class="col-lg-8">
                                                <div class="form-group mb-2">
                                                    <label for="tokenSekolah" class="mb-2">Verifikator <span
                                                            class="text-danger">*</span>
                                                    </label>
                                                    <input type="text" name="verifikator" id="verifikator"
                                                        class="form-control @error('verifikator') is-invalid @enderror"
                                                        value="{{ old('verifikator') }}" placeholder="Verifikator"
                                                        autocomplete="off" readonly required>

                                                    @error('verifikator')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror

                                                </div>
                                            </div>
                                            <p class="text-muted"> <i class="bx bx-info-circle"></i> Diperoleh dari
                                                panitia sekolah saat <b>VERIFIKASI</b></p>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="container">
                                        <div class="form-group mb-2">
                                            <label for="email" class="mb-2">Email <span class="text-danger">*</span>
                                            </label>

                                            <input id="email" type="email"
                                                class="form-control @error('email') is-invalid @enderror" name="email"
                                                value="{{ old('email') }}" placeholder="ex. cpd@gmail.com"
                                                autocomplete="off" required>

                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror

                                            <p class="text-muted mt-2"> <i class="bx bx-info-circle"></i> Masukkan email
                                                <b>AKTIF</b> anda
                                            </p>
                                        </div>

                                        <div class="form-group mb-2">
                                            <label for="password" class="mb-2">Password <span
                                                    class="text-danger">*</span>
                                            </label>

                                            <input type="password"
                                                class="form-control @error('password') is-invalid @enderror"
                                                name="password" placeholder="Password" id="passwordKu"
                                                autocomplete="new-password" required>

                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror

                                            {{-- <input type="password"
                                                class="form-control mt-2 @error('password') is-invalid @enderror"
                                                id="password-confirm passwordKu" name="password_confirmation"
                                                placeholder="Ulangi Password" required autocomplete="new-password"> --}}


                                            <input type="checkbox" class="passshow mt-3" onclick="showHide()"> Show
                                            Password

                                        </div>


                                        <div class="g-recaptcha" data-sitekey="{{ env('RECAPTCHA_SITE_KEY') }}"></div>


                                        <input type="hidden" name="role" value="cpd" readonly required>
                                        <?php
                                        
                                        /**
                                         * Fungsi untuk membuat nomor pendaftaran unik dengan format yang lebih keren.
                                         *
                                         * @param int $userId ID pengguna
                                         * @return string Nomor pendaftaran unik
                                         */
                                        function generateRegistrationNumber($userId)
                                        {
                                            // Mendapatkan timestamp saat ini dalam format yang lebih keren
                                            $timestamp = date('YmdHis');
                                        
                                            // Mendapatkan kode acak dengan panjang 6 karakter
                                            $randomCode = substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789'), 0, 12);
                                        
                                            // Menggabungkan timestamp, kode acak, dan ID pengguna
                                            $registrationNumber = 'REG-' . $timestamp . '-' . $randomCode . '-' . $userId;
                                        
                                            return $registrationNumber;
                                        }
                                        
                                        // Contoh penggunaan
                                        $userId = substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789'), 0, 6);// ID pengguna
                                        $registrationNumber = generateRegistrationNumber($userId);
                                        // echo 'Nomor Pendaftaran: ' . $registrationNumber;
                                        ?>


                                        <input type="hidden" name="unicCode" value="{{ $registrationNumber }}" readonly
                                            required>


                                    </div>

                                </div>
                                <div class="col-12 text-center mt-4" style="margin-bottom: -3em;">
                                    <button type="submit" class="btn btn-primary me-sm-3 me-1"><i
                                            class="bx bx-mail-send"></i>&nbsp; Daftar Akun PPDB</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
            <div class="landing-hero-blank"></div>
        </section>
        <!-- Hero: End -->
    </div>
@endsection
