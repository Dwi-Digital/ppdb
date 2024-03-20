<!-- Menghubungkan dengan view template master -->
@extends('backend.index')

<!-- isi bagian judul halaman -->
<!-- cara penulisan isi section yang pendek -->
@section('judul_halaman', 'Halaman Pengumuman')

<!-- isi bagian konten -->
<!-- cara penulisan isi section yang panjang -->
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
            <div class="card-header">
                <h5><i class="bx bx-volume-full"></i>&nbsp;Data Pengumuman Kelulusan</h5>
                <hr>
            </div>
            <div class="col-6">
                <a href="/app-access-pengumuman" class="btn btn-danger btn-wilayah" style="margin-right: -1em;"><i class="bx bx-refresh" ></i>&nbsp;Refresh</a>

                <button class="btn btn-primary btn-wilayah" data-bs-toggle="modal" data-bs-target="#uploadPengumumanModal"><i
                        class="bx bx-download"></i>&nbsp;Upload Pengumuman</button>
            </div>
            <div class="col-12 float-right mt-2">
                <form action="/searchpengumuman" method="GET" class="search-form">
                    <input type="text" name="p" class="search-input" placeholder="Cari Nama atau Bobot" autocomplete="off">
                    <button type="submit" class="search-button">
                        <i class="bx bx-search"></i>
                    </button>
                </form>
            </div>
            <div class="card-body">
                <div class="table-responsive text-wrap">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th rowspan="2" class="text-center align-middle">#</th>
                                <th rowspan="2" class="text-center align-middle">Wilayah Zonasi Desa</th>
                                <th colspan="2" class="text-center align-middle">Sekolah</th>
                                <th colspan="4" class="text-center align-middle">CPD</th>
                                <th rowspan="2" class="text-center align-middle">Asal Sekolah</th>
                                <th rowspan="2" class="text-center align-middle">Sekolah Lulus</th>
                                <th rowspan="2" class="text-center align-middle">Status Lulus</th>
                                <th rowspan="2" class="text-center align-middle">Action</th>

                            </tr>
                            <tr>
                                <th class="text-center align-middle">Sekolah</th>
                                <th class="text-center align-middle">Bobot</th>

                                <th class="text-center align-middle">NISN</th>
                                <th class="text-center align-middle">NAMA CPD</th>
                                <th class="text-center align-middle">UMUR</th>
                                <th class="text-center align-middle">KELAMIN</th>

                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @php $i=1 @endphp
                            @foreach ($pengumuman as $p)
                                <tr>
                                    <td class="text-center align-middle" style="text-transform: uppercase">
                                        {{ $i++ }}
                                    </td>
                                    <td class="text-center align-middle" style="text-transform: uppercase">
                                        {{ $p->wilayah }}</td>
                                    <td class="text-center align-middle" style="text-transform: uppercase">
                                        {{ $p->sekolah }}
                                    </td>
                                    <td class="text-center align-middle" style="text-transform: uppercase">
                                        {{ $p->bobot }}
                                    </td>
                                    <td class="text-center align-middle" style="text-transform: uppercase">
                                        {{ $p->nisn }}
                                    </td>
                                    <td class="text-center align-middle" style="text-transform: uppercase">
                                        {{ $p->nama_siswa }}
                                    </td>
                                    <td class="text-center align-middle" style="text-transform: uppercase">
                                        {{ $p->umur }}
                                    </td>

                                    <td class="text-center align-middle" style="text-transform: uppercase">
                                        {{ $p->kelamin }}
                                    </td>

                                    <td class="text-center align-middle" style="text-transform: uppercase">
                                        {{ $p->sekolah_asal }}
                                    </td>

                                    <td class="text-center align-middle" style="text-transform: uppercase">
                                        <span class="badge bg-label-success">{{ $p->sekolah_lulus }}</span>
                                    </td>

                                    <td class="text-center align-middle" style="text-transform: uppercase">
                                        <a href="changePengumuman/{{ $p->id }}"
                                            class="btn btn-{{ $p->status ? 'success' : 'danger' }}">
                                            {{ $p->status ? 'Lulus' : 'Gagal' }}
                                        </a>
                                    </td>
                                    <td class="text-center">
                                        <div class="btn-group " role="group" aria-label="Basic example">
                                            {{-- <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#editDataModal{{ $p->id }}"><i
                                                    class="bx bx-edit"></i></button> --}}

                                            <a type="button" class="btn btn-danger btn-sm"
                                                href="/delete-pengumuman/{{ $p->id }}"><i class="bx bx-trash"></i></a>
                                        </div>
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="px-2 py-2">
                    <br />
                    Halaman : {{ $pengumuman->currentPage() }} <br />
                    Jumlah Data : {{ $pengumuman->total() }} <br />
                    Data Per Halaman : {{ $pengumuman->perPage() }} <br />


                    {{ $pengumuman->links() }}
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="uploadPengumumanModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-md modal-simple modal-dialog-centered modal-add-new-role">
            <div class="modal-content p-3 p-md-5">
                <div class="modal-body">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="text-center mb-4">
                        <h3 class="role-title">Upload Data Pengumuman</h3>
                        <p>Upload data untuk pengumuman pendaftaran PPDB</p>
                        <a href="{{ asset('storage/format/format-pengumuman.xlsx')}}" class="btn btn-danger" download>Download format</a>
                    </div>
                    <!-- Add role form -->
                    <form action="{{ url('import_pengumuman') }}" class="row g-3" method="POST"
                        enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="col-12">
                            <label>File</label>
                            <input type="file" name="file" class="form-control" placeholder="Enter a code"
                                tabindex="-1" autocomplete="off" autofocus />
                        </div>

                        <div class="col-12 text-center">
                            <button type="submit" class="btn btn-primary me-sm-3 me-1">Upload</button>
                            <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="modal"
                                aria-label="Close">Cancel</button>
                        </div>
                    </form>
                    <!--/ Add role form -->
                </div>
            </div>
        </div>
    </div>
@endsection
