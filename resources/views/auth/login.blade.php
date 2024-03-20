<!-- Menghubungkan dengan view template master -->
@extends('layouts.app')

<!-- isi bagian judul halaman -->
<!-- cara penulisan isi section yang pendek -->
@section('judul_halaman', 'Halaman Login')


<!-- isi bagian konten -->
<!-- cara penulisan isi section yang panjang -->
@section('content')
    <div class="authentication-wrapper authentication-cover">
        <div class="authentication-inner row m-0">
            <!-- /Left Text -->
            <div class="d-none d-lg-flex col-lg-7 col-xl-8 align-items-center p-5">
                <div class="w-100 d-flex justify-content-center">
                    <img src="{{ asset('storage/images/boy-with-rocket-light.png') }}" width="65%" class="img-fluid"
                        alt="Login image">
                </div>
            </div>
            <!-- /Left Text -->

            <!-- Login -->
            <div class="d-flex col-12 col-lg-5 col-xl-4 align-items-center authentication-bg p-sm-5 p-4">
                <div class="d-lg-none d-md-none" style="margin-top: 2em">
                </div>
                <div class="w-px-400 mx-auto" >

                    <h4 class="mb-2" style="margin-top: 2em">Login Akun PPDB</h4>
                    <p class="mb-4">Pastikan anda sudah memiliki akun yang aktif.</p>

                    <form id="formAuthentication" class="mb-3" action="{{ route('login') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="email" class="form-label">Email or Username</label>
                            <input type="text" name="email" class="form-control" id="email" name="email-username"
                                placeholder="Enter your email or username" autofocus>
                        </div>
                        <div class="mb-3 form-password-toggle">
                            <div class="d-flex justify-content-between">
                                <label class="form-label" for="password">Password</label>
                                <a href="/forgot-password">
                                    <small>Forgot Password?</small>
                                </a>
                            </div>
                            <div class="input-group input-group-merge">
                                <input type="password" name="password" id="passwordKu" class="form-control" name="password"
                                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                    aria-describedby="password" />
                                {{-- <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span> --}}
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="form-check">
                                <input type="checkbox" class="passshow" style="margin-left:-1em;" onclick="showHide()">
                                Show Password
                            </div>
                        </div>
                         <div class="mb-3">
                        <div class="g-recaptcha" data-sitekey="{{ env('RECAPTCHA_SITE_KEY') }}"></div>
                        </div>
                        
                        <button type="submit" id="submitButton" class="btn btn-primary d-grid w-100">
                            Sign in
                        </button>
                    </form>

                    <p class="text-center">
                        <span>Developed by </span>
                        <a href="#">
                            <span>PT. Ananda Digital</span>
                        </a>
                    </p>

                </div>

            </div>
            <!-- /Login -->
        </div>
    </div>

    <!-- / Content -->


    {{-- <div class="buy-now">
      <a href="https://themeselection.com/item/sneat-bootstrap-html-admin-template/" target="_blank" class="btn btn-danger btn-buy-now">Buy Now</a>
    </div> --}}
@endsection
