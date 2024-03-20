<!-- Menghubungkan dengan view template master -->
@extends('backend.indexcpd')

<!-- isi bagian judul halaman -->
<!-- cara penulisan isi section yang pendek -->
@section('judul_halaman', 'Halaman Pengumuman')

<!-- isi bagian konten -->
<!-- cara penulisan isi section yang panjang -->
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="col-lg-12">
            <div class="col-lg-12 mx-auto">
                <div class="card ">

                    @foreach ($lulus as $p)
                        @if ($p->status == 1)
                            <div class="card-body text-center">
                                <div class="border" style="border: 1px solid;padding:10px;">
                                    <h3>Selamat</h3>
                                    <p>Hai, <b>{{ Auth::user()->name }}</b> anda dinyatakan </p>
                                    <h2 id="lulusText" style="color: green;"><b>L</b>U<b>L</b>U<b>S</b></h2>
                                    <p>Silahkan download tanda bukti kelulusan anda</p>
                                    <a href="/app-access-cpd-pdf" class="btn btn-danger animate-balloon">
                                        <span class="btn-text" style="color: black;"><i
                                                class="bx bx-download"></i>&nbsp;Cetak Tanda
                                            Kelulusan</span>
                                    </a>
                                </div>

                            </div>
                            <div class="show mb-4" style="text-align: center;">
                                <a href="#" id="toggleBtn" onclick="showDetails()">Tampilkan</a>
                            </div>

                            {{-- tampilak keterangan --}}
                            <div class="teble-responsive" id="keterangan" style="display: none;padding:20px;">
                                <div class="text-center">
                                    <h5>Keterangan Kelulusan</h5>
                                </div>
                                <table class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="text-center align-middle">No.</th>
                                            <th class="text-center align-middle">Sekolah Daftar</th>
                                            <th class="text-center align-middle">Sekolah Lulus</th>
                                            <th class="text-center align-middle">Bobot</th>
                                            <th class="text-center align-middle">Nisn</th>
                                            <th class="text-center align-middle">Nama Siswa</th>
                                            <th class="text-center align-middle">Umur</th>
                                            <th class="text-center align-middle">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $i=1 @endphp
                                        @foreach ($lulus as $p)
                                            <tr>
                                                <td class="text-center align-middle"> {{ $i++ }}</td>
                                                <td class="text-center align-middle"> <span
                                                        class="badge bg-label-dark">{{ $p->sekolah }}</span> </td>
                                                <td class="text-center align-middle"> <span
                                                        class="badge bg-label-success">{{ $p->sekolah_lulus }}</span>
                                                </td>
                                                <td class="text-center align-middle">
                                                    @if ($p->bobot == 20)
                                                        <h4 class="badge bg-label-success">{{ $p->bobot }}
                                                        </h4>
                                                    @elseif($p->bobot == 15)
                                                        <h4 class="badge bg-label-indo">{{ $p->bobot }}</h4>
                                                    @elseif($p->bobot == 12)
                                                        <h4 class="badge bg-label-warning"><b>{{ $p->bobot }}</h4>
                                                    @endif
                                                </td>
                                                <td class="text-center align-middle"> {{ $p->nisn }} </td>
                                                <td class="text-center align-middle"> {{ $p->nama_siswa }} </td>
                                                <td class="text-center align-middle"> {{ $p->umur }} </td>
                                                <td class="text-center align-middle">
                                                    @if ($p->status == 1)
                                                        <h4 class="mt-3" style="color: green;"><b>LULUS</b></h4>
                                                    @elseif($p->status == 0)
                                                        <h4 class="mt-3" style="color: red;"><b>GAGAL</b></h4>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                        <!-- Tambahkan baris tabel sesuai kebutuhan Anda -->
                                    </tbody>
                                </table>
                                <p class="mt-4">Kelulusan di hitung dari <b>Bobot Tempat Tinggal</b></p>
                            </div>
                        @elseif($p->status == 0)
                            <div class="card-body text-center">
                                <div class="border" style="border: 1px solid;padding:10px;">
                                    <h3>Mohon Maaf</h3>
                                    <p>Hai, <b>{{ Auth::user()->name }}</b> anda dinyatakan </p>
                                    <h2 id="lulusText" style="color: red;"><b>G</b>A<b>G</b>A<b>L</b></h2>
                                    <p>Silahkan klik tautan dibawah ini untuk memilih sekolah lainnya</p>
                                    <a data-bs-toggle="modal" data-bs-target="#ceksekolahlain"
                                        class="btn btn-danger animate-balloon">
                                        <span class="btn-text" style="color: black;"><i class="bx bx-show"></i>&nbsp;Cek
                                            Sekolah Lain</span>
                                    </a>
                                </div>

                            </div>
                            <div class="show mb-4" style="text-align: center;">
                                <a href="#" id="toggleBtn" onclick="showDetails()">Tampilkan</a>
                            </div>

                            {{-- tampilak keterangan --}}
                            <div class="teble-responsive text-center" id="keterangan" style="display: none;padding:20px;">
                                {{-- <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Sekolah Daftar</th>
                                            <th>Sekolah Lulus</th>
                                            <th>Nisn</th>
                                            <th>Nama Siswa</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $i=1 @endphp
                                        @foreach ($lulus as $p)
                                            <tr>
                                                <td> {{ $i++ }}</td>
                                                <td> <span class="badge bg-label-dark">{{ $p->sekolah }}</span> </td>
                                                <td> <span class="badge bg-label-success">{{ $p->sekolah_lulus }}</span>
                                                </td>
                                                <td> {{ $p->nisn }} </td>
                                                <td> {{ $p->nama_siswa }} </td>
                                                <td>
                                                    @if ($p->status == 1)
                                                        <h4 class="mt-3" style="color: green;"><b>LULUS</b></h4>
                                                    @elseif($p->status == 0)
                                                        <h4 class="mt-3" style="color: red;"><b>GAGAL</b></h4>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                        <!-- Tambahkan baris tabel sesuai kebutuhan Anda -->
                                    </tbody>
                                </table> --}}
                                <h5>Maaf anda dinyatakan <b class="text-danger">TIDAK LULUS</b> seleksi PPDB</h5>
                                <p class="mt-4">Kelulusan di hitung dari <b>Bobot Tempat Tinggal</b> dan <b>Umur</b></p>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="ceksekolahlain" tabindex="-1" role="dialog" data-backdrop="static" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Sekolah Lainya </h5>
                </div>
                <div class="modal-body">
                    <!-- Isi modal disini -->
                    <div class="table-responsive">
                        <button class="btn btn-outline-danger" id="showFilterBtn"><i
                                class="bx bx-filter-alt"></i>&nbsp;<span id="filterBtnText">Tampilkan Filter</span></button>
                        <div id="filterForm" style="display: none;">
                            <form method="POST" action="/cpd-pilihan2">
                                <!-- Form filter di sini -->
                                <div class="form-group mt-4">
                                    <label for="exampleFormControlSelect1">Filter Kabupaten</label>
                                    <select class="form-control" id="exampleFormControlSelect1" name="kabupaten">
                                        <option value="Kabupaten 1">Kabupaten 1</option>
                                        <option value="Kabupaten 2">Kabupaten 2</option>
                                        <!-- Tambahkan opsi-opsi lainnya sesuai kebutuhan -->
                                    </select>
                                </div>
                            </form>
                        </div>

                        <form method="POST" action="/cpd-pilihan2">
                            {{ csrf_field() }}
                            <input type="hidden" name="id_user" value="{{ Auth::user()->id }}">
                            <input type="hidden" name="kabupaten" value="{{ Auth::user()->kabupaten }}">
                            <input type="hidden" name="kecamatan" value="{{ Auth::user()->kecamatan }}">
                            <input type="hidden" name="desa" value="{{ Auth::user()->desa }}">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>No</th>
                                        <th>Kabupaten</th>
                                        <th>Nama Sekolah</th>
                                        <th>Kuota</th>
                                        <th>Pendaftar</th>
                                        <th>Sisa Kuota</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i = 1;
                                        $countChecked = 0;
                                    @endphp
                                    @foreach ($zonasi as $z)
                                        @php
                                            $pengurangan = $z->jumlah ? $z->jumlah->kuota - $z->total_pendaftar : 0;
                                        @endphp
                                        @if ($pengurangan != 0)
                                            <tr>


                                                <td>
                                                    <input type="checkbox" name="pilihan[]" value="{{ $z->id }}"
                                                        onchange="limitCheckbox(this)">
                                                </td>

                                                <td>{{ $i++ }}</td>
                                                <td>{{ $z->kab }}</td>
                                                <td>{{ $z->satpen }}</td>
                                                <td>{{ $z->jumlah->kuota }}</td>
                                                <td>{{ $z->total_pendaftar }}</td>
                                                <td>{{ max(0, $pengurangan) }}</td>
                                            </tr>
                                            @php
                                                if ($countChecked >= 2) {
                                                    continue;
                                                }
                                                $countChecked++;
                                            @endphp
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                            <button type="submit" class="btn btn-primary btn-sm" style="float: right">Simpan</button>
                        </form>
                    </div>
                    <div class="px-2 py-2">
                        <br />
                        {{-- Halaman : {{ $zonasi->currentPage() }} <br />
                        Jumlah Data : {{ $zonasi->total() }} <br />
                        Data Per Halaman : {{ $zonasi->perPage() }} <br /> --}}


                        {{ $zonasi->links() }}
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>



@endsection
