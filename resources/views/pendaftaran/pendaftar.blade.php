<!-- Menghubungkan dengan view template master -->
@extends('backend.index')

<!-- isi bagian judul halaman -->
<!-- cara penulisan isi section yang pendek -->
@section('judul_halaman', 'Halaman Database')

<!-- isi bagian konten -->
<!-- cara penulisan isi section yang panjang -->
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="alert alert-danger">
            <h5><i class="bx bx-info-circle"></i> Informasi</h5>
            <ul>
                <li>
                    <p>Utamakan Pendaftar dengan bobot 20 kemudian baru bobot 15 dan 12</p>
                </li>
            </ul>
        </div>
        <div class="card">
            <h5 class="card-header">Data Pendaftar</h5>
            <div class="col-6 px-4 ">
                @if (Auth::check() && Auth::user()->role == 'Sekolah')
                @foreach ($pendaftar as $p)
                <h5>Kuota : <span class="badge bg-label-dark">{{ $p->kuozon->kuota }}</span> | Jumlah diterima : <span class="badge bg-label-danger">{{ $jumlahSekolah }}</span></h5>
                @endforeach
                @endif
            </div>

            {{-- <div class="col-6">
                <button class="btn btn-primary btn-wilayah" data-bs-toggle="modal" data-bs-target="#addDzonasiModal"><i
                        class="bx bx-plus"></i> Tambah Desa Zonasi</button>
            </div> --}}
            <div class="col-lg-4 float-right mt-2 px-4">

                @if (Auth::check() && Auth::user()->role == 'Super Admin' or Auth::check() && Auth::user()->role == 'Pengembang')
                    <a href="/export_excel" class="btn btn-outline-success"> <img src="{{ asset('storage/images/excel.png') }}"
                            width="25px" alt="excel">&nbsp;Export
                        Excel</a>
                @endif

            </div>

            <div class="table-responsive text-wrap p-4">
                <table class="table table-striped table-bordered">
                    {{-- id="dt-users-table" --}}
                    <thead>
                        <tr>
                            <th rowspan="2" class="text-center align-middle">#</th>
                            <th rowspan="2" class="text-center align-middle">UnicCode</th>
                            <th rowspan="2" class="text-center align-middle">Wilayah Zonasi Desa</th>
                            <th colspan="2" class="text-center align-middle">Sekolah</th>
                            <th colspan="8" class="text-center align-middle">CPD</th>
                            <th colspan="3" class="text-center align-middle">Orang Tua</th>
                            <th rowspan="2" class="text-center align-middle">Asal Sekolah</th>
                            <th rowspan="2" class="text-center align-middle">Berkas</th>
                            <th rowspan="2" class="text-center align-middle">Kelengkapan Berkas</th>
                            <th rowspan="2" class="text-center align-middle">Lulus</th>
                            <th rowspan="2" class="text-center align-middle">Action</th>

                        </tr>
                        <tr>
                            <th class="text-center align-middle">Sekolah</th>
                            <th class="text-center align-middle">Bobot</th>

                            <th class="text-center align-middle">NIK</th>
                            <th class="text-center align-middle">NISN</th>
                            <th class="text-center align-middle">NAMA CPD</th>
                            <th class="text-center align-middle">TANGGAL</th>
                            <th class="text-center align-middle">UMUR</th>
                            <th class="text-center align-middle">JENIS KELAMIN</th>
                            <th class="text-center align-middle">AGAMA</th>
                            <th class="text-center align-middle">NO HP</th>

                            <th class="text-center align-middle">NAMA AYAH</th>
                            <th class="text-center align-middle">NAMA IBU</th>
                            <th class="text-center align-middle">NAMA WALI</th>

                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @php $i=1 @endphp
                        @foreach ($pendaftar as $p)
                            <tr>
                                <td class="text-center align-middle" style="text-transform: uppercase">{{ $i++ }}
                                </td>
                                <td class="text-center align-middle" style="text-transform: uppercase">
                                    {{ $p->unic->unicCode }}
                                </td>
                                <td class="text-center align-middle" style="text-transform: uppercase">
                                    {{ $p->desa }}</td>
                                <td class="text-center align-middle" style="text-transform: uppercase">
                                    {{ $p->sek->id_zonasi }}
                                </td>
                                <td class="text-center align-middle" style="text-transform: uppercase"> {{ $p->sek->bobot }}
                                </td>

                                <td class="text-center align-middle" style="text-transform: uppercase">
                                    {{ $p->pribadi->nik }}
                                </td>
                                <td class="text-center align-middle" style="text-transform: uppercase">
                                    {{ $p->pribadi->nisn }}
                                </td>
                                <td class="text-center align-middle" style="text-transform: uppercase">
                                    {{ $p->pribadi->nama_siswa }}
                                </td>
                                <td class="text-center align-middle" style="text-transform: uppercase">
                                    {{ $p->pribadi->tanggal }}
                                </td>
                                <td class="text-center align-middle" style="text-transform: uppercase">
                                    <?php
                                    $umur = \Carbon\Carbon::parse($p->pribadi->tanggal)
                                        ->diff(\Carbon\Carbon::now())
                                        ->format('%y tahun, %m bulan, dan %d hari');
                                    ?>
                                    {{ $umur }}
                                </td>
                                <td class="text-center align-middle" style="text-transform: uppercase">
                                    {{ $p->pribadi->kelamin }}
                                </td>
                                <td class="text-center align-middle" style="text-transform: uppercase">
                                    {{ $p->pribadi->agama }}
                                </td>
                                <td class="text-center align-middle" style="text-transform: uppercase">
                                    {{ $p->pribadi->nohp }}
                                </td>

                                <td class="text-center align-middle" style="text-transform: uppercase">
                                    {{ $p->ortu->nm_ayah }}
                                <td class="text-center align-middle" style="text-transform: uppercase">
                                    {{ $p->ortu->nm_ibu }}
                                <td class="text-center align-middle" style="text-transform: uppercase">
                                    {{ $p->ortu->nm_wali }}
                                </td>


                                <td class="text-center align-middle" style="text-transform: uppercase">
                                    {{ $p->pendidikan->nm_sekolah }}
                                </td>

                                <td class="text-center align-middle" style="text-transform: uppercase">
                                    <a href="javascript:void(0);" data-bs-toggle="modal"
                                        data-bs-target="#lihat{{ $p->berkas->id }}">
                                        <img src="storage/images/pdf.png" width="50px">
                                    </a>
                                </td>



                                <td>
                                    <a href="changeBerkas/{{ $p->id }}"
                                        class="btn btn-{{ $p->status ? 'success' : 'danger' }}">
                                        {{ $p->status ? 'Lengkap' : 'Belum Cek' }}
                                    </a>
                                </td>

                                <td class="text-center align-middle" style="text-transform: uppercase">
                                    {{ $p->lulus }}
                                </td>
                                <td class="text-center align-middle" style="text-transform: uppercase">
                                    @if ($p->kuozon->kuota > $jumlahSekolah)
                                        <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#editLulusModal{{ $p->id }}">
                                            <i class="bx bx-edit"></i>
                                        </button>
                                    @elseif($p->kuozon->kuota = $jumlahSekolah)
                                        <button class="btn btn-danger" disabled>Kuota Penuh</button>
                                    @endif

                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="px-4 py-2">
                <br />
                Halaman : {{ $pendaftar->currentPage() }} <br />
                Jumlah Data : {{ $pendaftar->total() }} <br />
                Data Per Halaman : {{ $pendaftar->perPage() }} <br />


                {{ $pendaftar->links() }}
            </div>
        </div>
    </div>
@endsection

@foreach ($cpdberkas as $p)
    <div class="modal fade" id="lihat{{ $p->id }}" tabindex="-1" role="dialog" data-backdrop="static"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                {{-- <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Upload Foto</h5>
                </div> --}}
                <div class="modal-body">
                    <iframe src="{{ asset('storage/berkas/' . $p->berkas) }}#toolbar=0" width="100%"
                        height="800px"></iframe>
                </div>
                <div class="modal-footer">

                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endforeach

@foreach ($pendaftar as $p)
    <div class="modal fade" id="editLulusModal{{ $p->id }}" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-md modal-simple modal-dialog-centered modal-add-new-role">
            <div class="modal-content p-3 p-md-5">
                <div class="modal-body">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="text-center mb-4">
                        <h3 class="role-title">Ubah Data</h3>
                        <p>Masukkan data sekolah lulus.</p>
                    </div>
                    <!-- Add role form -->
                    <form action="{{ route('pendaftaran.updateLulus') }}" class="row g-3" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="col-12">
                            <label>Status Lulus</label>
                            <input type="hidden" id="id_user" name="id_user" value="{{ $p->id_user }}">
                            <input type="text" name="lulus" value="{{ Auth::user()->instansi }}"
                                class="form-control" readonly autocomplete="off" autofocus />
                        </div>

                        <div class="col-12 text-center">
                            <button type="submit" class="btn btn-primary me-sm-3 me-1">Update</button>
                            <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="modal"
                                aria-label="Close">Cancel</button>
                        </div>
                    </form>
                    <!--/ Add role form -->
                </div>
            </div>
        </div>
    </div>
@endforeach
