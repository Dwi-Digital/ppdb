<!-- Menghubungkan dengan view template master -->
@extends('backend.index')

<!-- isi bagian judul halaman -->
<!-- cara penulisan isi section yang pendek -->
@section('judul_halaman', 'Halaman Zonasi')

<!-- isi bagian konten -->
<!-- cara penulisan isi section yang panjang -->
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
            <h5 class="card-header">Data Zonasi / <span onclick="goBack()" class="btn badge bg-label-primary me-1"><i
                        class="bx bx-pointer"></i>
                    {{ $tampil->satpen }}</span></h5>

            <div class="col-6">
                <button class="btn btn-primary btn-wilayah" data-bs-toggle="modal" data-bs-target="#addDzonasiModal"><i
                        class="bx bx-plus"></i> Tambah Desa Zonasi</button>

                <button class="btn btn-primary btn-wilayah" data-bs-toggle="modal" data-bs-target="#UploadDzonasiModal"
                    style="margin-left:-1px;"><i class="bx bx-upload"></i>&nbsp;Upload</button>
            </div>

            <div class="table-responsive text-nowrap p-4">
                <table class="table table-striped" id="dt-users-table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Desa Zonasi</th>
                            <th>Sekolah Zonasi</th>
                            <th>Bobot Zonasi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @php $i=1 @endphp
                        @foreach ($dzonasi as $p)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>
                                    <span class="badge bg-label-primary me-1">Zonasi Desa <b>{{ $p->id_desa }}</b></span>
                                </td>
                                <td><span class="badge bg-label-danger me-1"><b>{{ $p->id_zonasi }}</b></span></td>
                                <td><span class="badge bg-label-dark me-1"><b>{{ $p->bobot }}</b></span></td>
                                <td>

                                    {{-- <a class="dropdown-item" href="javascript:void(0);" data-bs-toggle="modal"
                                        data-bs-target="#editDzonasiModal{{ $p->id }}"><i
                                            class="bx bx-edit-alt me-1"></i>
                                        Edit</a> --}}
                                    <a class="dropdown-item" href="/delete-desa-zonasi/{{ $p->id }}"><i
                                            class="bx bx-trash me-1"></i>
                                        Delete</a>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="modal fade" id="UploadDzonasiModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-md modal-simple modal-dialog-centered modal-add-new-role">
            <div class="modal-content p-3 p-md-5">
                <div class="modal-body">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="text-center mb-4">
                        <h3 class="role-title">Upload Desa Zonasi</h3>
                        <p>Masukkan sekolah zonasi</p>
                        <a href="{{ asset('storage/format/format-dzonasi.xlsx')}}" class="btn btn-danger" download >Download Format</a>
                    </div>
                    <!-- Add role form -->
                    <form action="{{ url('import_dzonasi') }}" class="row g-3" method="POST" enctype="multipart/form-data">
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

    {{-- model --}}
    <div class="modal fade" id="addDzonasiModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-md modal-simple modal-dialog-centered modal-add-new-role">
            <div class="modal-content p-3 p-md-5">
                <div class="modal-body">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="text-center mb-4">
                        <h3 class="role-title">Tambah Desa Zonasi</h3>
                        <p>Masukkan kode dan nama Desa Zonasi</p>
                    </div>
                    <!-- Add role form -->
                    <form action="/create-desa-zonasi" class="row g-3" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="col-12">
                            {{-- <label>Kode</label> --}}
                            <input type="hidden" name="id_zonasi" value="{{ $tampil->satpen }}">
                            <select name="kabupaten" id="kabupaten" class="form-select input">
                                <option value="">-Pilih Kabupaten-</option>
                                @foreach ($kabupaten as $p)
                                    <option value="{{ $p->nm_kab }}">{{ $p->nm_kab }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-12 ">
                            <label>kecamatan</label>
                            {{-- <select name="desa" id="desa" class="form-control">
                            </select> --}}
                            <select name="id_kec" id="kecamatan" class="form-select input">
                                <option>---Pilih Kecamatan---</option>
                            </select>
                        </div>

                        <div class="col-12">
                            <label>Desa</label>
                            {{-- <select name="desa" id="desa" class="form-control">
                            </select> --}}
                            <select name="id_desa" id="desa" class="form-control">
                                <option>---Pilih Desa---</option>
                            </select>
                        </div>

                        <div class="col-12 mb-4">
                            <label>Bobot</label>
                            <input type="text" name="bobot" class="form-control" required>
                        </div>

                        <div class="col-12 text-center">
                            <button type="submit" class="btn btn-primary me-sm-3 me-1">Submit</button>
                            <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="modal"
                                aria-label="Close">Cancel</button>
                        </div>
                    </form>
                    <!--/ Add role form -->
                </div>
            </div>
        </div>
    </div>

    @foreach ($dzonasi as $p)
        <div class="modal fade" id="editDzonasiModal{{ $p->id }}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-md modal-simple modal-dialog-centered modal-add-new-role">
                <div class="modal-content p-3 p-md-5">
                    <div class="modal-body">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        <div class="text-center mb-4">
                            <h3 class="role-title">Tambah Desa Zonasi</h3>
                            <p>Masukkan kode dan nama Desa Zonasi</p>
                        </div>
                        <!-- Add role form -->
                        <form action="/update-desa-zonasi/{{ $p->id }}" class="row g-3" method="POST"
                            enctype="multipart/form-data">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                            <div class="col-12">
                                {{-- <label>Kode</label> --}}
                                <input type="hidden" value="{{ $p->id }}">
                                <input type="hidden" name="id_zonasi" value="{{ $tampil->id }}">

                            </div>

                            <div class="col-12 mb-4">
                                <label>Nama</label>
                                <input type="text" name="desa" value="{{ $p->desa }}" class="form-control"
                                    placeholder="Enter a Name" tabindex="-1" autocomplete="off" autofocus />
                            </div>

                            <div class="col-12 text-center">
                                <button type="submit" class="btn btn-primary me-sm-3 me-1">Submit</button>
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
@endsection
