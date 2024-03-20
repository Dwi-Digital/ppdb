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
            <h5 class="card-header">Data Zonasi</h5>
            <div class="col-6">
                <button class="btn btn-primary btn-wilayah" data-bs-toggle="modal" data-bs-target="#addZonasiModal"><i
                        class="bx bx-plus"></i> Tambah Zonasi</button>

                <button class="btn btn-primary btn-wilayah" data-bs-toggle="modal" data-bs-target="#UploadZonasiModal"
                    style="margin-left:-1px;"><i class="bx bx-upload"></i>&nbsp;Upload</button>
            </div>
            <div class="table-responsive text-nowrap p-4">
                <table class="table table-striped" id="dt-users-table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Kabupaten</th>
                            <th>Satpen</th>
                            <th>Zonasi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @php $i=1 @endphp
                        @foreach ($zonasi as $p)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $p->kab }}</td>
                                <td>{{ $p->satpen }}</td>
                                <td>
                                    <a href="/show-zonasi/{{ $p->slug }}">
                                        <span class="badge bg-label-primary me-1">{{ $p->zon_count }} Desa Zonasi</span>
                                    </a>
                                </td>
                                <td>

                                    {{-- <a class="dropdown-item" href="javascript:void(0);" data-bs-toggle="modal"
                                        data-bs-target="#editZonasiModal{{ $p->id }}"><i
                                            class="bx bx-edit-alt me-1"></i>
                                        Edit</a> --}}
                                    <a class="dropdown-item" href="/delete-sekolah-zonasi/{{ $p->id }}"><i
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

    {{-- model --}}
    <div class="modal fade" id="addZonasiModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-md modal-simple modal-dialog-centered modal-add-new-role">
            <div class="modal-content p-3 p-md-5">
                <div class="modal-body">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="text-center mb-4">
                        <h3 class="role-title">Tambah Zonasi</h3>
                        <p>Masukkan data Zonasi</p>
                    </div>
                    <!-- Add role form -->
                    <form action="/create-sekolah-zonasi" class="row g-3" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="col-12">
                            {{-- <label>Kode</label> --}}
                            <select name="kab" id="kab" class="form-select input">
                                <option value="">-Pilih Kabupaten-</option>
                                @foreach ($kabupaten as $p)
                                    <option value="{{ $p->nm_kab }}">{{ $p->nm_kab }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-12">
                            <label for="satpen">Masukkan Sekolah</label>
                            <select name="satpen" id="satpen" class="form-control">

                            </select>
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

    <div class="modal fade" id="UploadZonasiModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-md modal-simple modal-dialog-centered modal-add-new-role">
            <div class="modal-content p-3 p-md-5">
                <div class="modal-body">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="text-center mb-4">
                        <h3 class="role-title">Upload Zonasi</h3>
                        <p>Masukkan sekolah zonasi</p>
                        <a href="{{ asset('storage/format/format-zonasi.xlsx')}}" class="btn btn-danger" download >Download Format</a>
                    </div>
                    <!-- Add role form -->
                    <form action="{{ url('import_zonasi') }}" class="row g-3" method="POST" enctype="multipart/form-data">
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

    @foreach ($zonasi as $p)
        <div class="modal fade" id="editZonasiModal{{ $p->id }}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-md modal-simple modal-dialog-centered modal-add-new-role">
                <div class="modal-content p-3 p-md-5">
                    <div class="modal-body">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        <div class="text-center mb-4">
                            <h3 class="role-title">Tambah Zonasi</h3>
                            <p>Masukkan data Zonasi</p>
                        </div>
                        <!-- Add role form -->
                        <form action="/create-sekolah-zonasi" class="row g-3" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                            <div class="col-12">
                                <label for="upsatpen">Masukkan Sekolah</label>
                                <select name="satpen" id="upsatpen" class="form-control">
                                    <option value="">{{ $p->id }}</option>
                                </select>
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
