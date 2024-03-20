<!-- Menghubungkan dengan view template master -->
@extends('backend.index')

<!-- isi bagian judul halaman -->
<!-- cara penulisan isi section yang pendek -->
@section('judul_halaman', 'Halaman verifikasi token')

<!-- isi bagian konten -->
<!-- cara penulisan isi section yang panjang -->
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="alert alert-danger">
            <p><i class="bx bx-info-circle"></i>&nbsp;INFO PENTING <br>Jika CPD tidak mempunyai <b>NISN</b>, maka CPD harus
                kembali kesekolah
                asal untuk menanyakan <b>NISN</b> ke Operator Sekolah. <br>
                Jika data CPD <b>Tidak Muncul</b> saat <b>Input NISN</b> silahkan isi link berikut <a href="">(Link
                    Data Tidak Muncul)</a>
            </p>
        </div>
        <div class="row">
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <h5>Verifikasi</h5>
                    </div>
                    <div class="card-body">
                        <form action="/create-verifikasi" name="autoSumForm" class="row g-3" method="POST"
                            enctype="multipart/form-data">
                            {{ csrf_field() }}

                            <div class="col-12">
                                <label>Sekolah Verifikasi</label>
                                <input type="hidden" name="id_user" value="{{ Auth::user()->id }}">
                                <input type="text" name="verifikator" value="{{ Auth::user()->instansi }}"
                                    class="form-control" readonly tabindex="-1" autocomplete="off" autofocus />
                                <p class="text-muted mt-2">Sudah Otomatis</p>
                            </div>

                            <div class="col-12" style="margin-top: -10px;">
                                <label>NISN</label>
                                <input type="text" name="nisn" onblur="autofill()" maxlength="10" minlength="10"
                                    class="form-control nisn @error('nisn') is-invalid @enderror"
                                    placeholder="masukkan nisn pendaftar" tabindex="-1" autocomplete="off" autofocus />
                                @error('nisn')
                                    <span class="invalid-feedback" role="alert">
                                        {{-- <strong>{{ $message }}</strong> --}}
                                        <strong>Sudah pernah diverifikasi di sekolah lain</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-12">
                                <label>Data CPD</label>
                                <input type="text" name="nama" id="nama" class="form-control mb-2" readonly
                                    autocomplete="off" placeholder="Auto" autofocus />

                                <input type="text" name="tanggal" id="tanggal" class="form-control mb-2" readonly autocomplete="off" placeholder="Auto" autofocus />

                                <input type="text" name="sekolah" id="skl" class="form-control mb-2" readonly
                                    autocomplete="off" placeholder="Auto" autofocus />

                                <input type="text" name="kabupaten" id="kab_kota" class="form-control mb-2" readonly
                                    autocomplete="off" placeholder="Auto" autofocus />

                                <input type="text" name="kecamatan" id="kec" class="form-control mb-2" readonly
                                    autocomplete="off" placeholder="Auto" autofocus />

                                <input type="text" name="desa" id="ds" class="form-control" readonly
                                    autocomplete="off" placeholder="Auto" autofocus />

                                <p class="text-muted mt-2">Sudah Otomatis</p>
                            </div>


                            <div class="col-12" style="margin-top: -10px;">
                                <?php
                                $karakter = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz123456789';
                                $shuffle = substr(str_shuffle($karakter), 0, 8);
                                ?>
                                <label>Token</label>
                                <input type="text" name="token" value="<?php echo $shuffle; ?>" class="form-control"
                                    readonly placeholder="masukkan nisn pendaftar" tabindex="-1" autocomplete="off"
                                    autofocus />
                                <p class="text-muted mt-2">Sudah Otomatis</p>
                            </div>


                            <div class="col-12 text-center">
                                <button type="submit" class="btn btn-primary me-sm-3 me-1">Submit</button>
                                <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="modal"
                                    aria-label="Close">Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-lg-8">
                <div class="card">
                    <h5 class="card-header">Data Verifikasi</h5>

                    <div class="table-responsive text-wrap p-4">
                        <table class="table table-striped">
                        {{-- <table class="table table-striped" id="dt-users-table"> --}}
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">Verifikaror</th>
                                    <th class="text-center">NISN</th>
                                    <th class="text-center">Nama</th>
                                    <th class="text-center">Token</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                @php $i=1 @endphp
                                @foreach ($token as $p)
                                    <tr>
                                        <td class="text-center">{{ $i++ }}</td>
                                        <td class="text-center">{{ $p->verifikator }}</td>
                                        <td class="text-center">{{ $p->nisn }}</td>
                                        <td class="text-center">{{ $p->nama }}</td>
                                        <td class="text-center">{{ $p->token }}</td>

                                        <td class="text-center">
                                            <div class="btn-group " role="group" aria-label="Basic example">

                                                <a href="/cetak/{{ $p->id }}" class="btn btn-dark"
                                                    style="text-decoration:none;" download>
                                                    <img src="{{ asset('storage/images/word.png') }}" width="30px">
                                                </a>

                                                <a type="button" class="btn btn-danger btn-sm"
                                                    href="/delete-verifikator/{{ $p->id }}"><i
                                                        class="bx bx-trash"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="px-2 py-2">
                        <br />
                        Halaman : {{ $token->currentPage() }} <br />
                        Jumlah Data : {{ $token->total() }} <br />
                        Data Per Halaman : {{ $token->perPage() }} <br />
    
    
                        {{ $token->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
