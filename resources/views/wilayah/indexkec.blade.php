<!-- Menghubungkan dengan view template master -->
@extends('backend.index')

<!-- isi bagian judul halaman -->
<!-- cara penulisan isi section yang pendek -->
@section('judul_halaman', 'Halaman Wilayah Kecamatan')

<!-- isi bagian konten -->
<!-- cara penulisan isi section yang panjang -->
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
            <h5 class="card-header">Data Wilayah /<span onclick="goBack()" class="btn badge bg-label-primary me-1"><i
                            class="bx bx-pointer"></i> {{ $tampil->nm_kab }}</span>
            </h5>
            <div class="col-6">
                <button class="btn btn-primary btn-wilayah" data-bs-toggle="modal" data-bs-target="#addKecModal"><i
                        class="bx bx-plus"></i>&nbsp;Tambah</button>

                <button class="btn btn-primary btn-wilayah" data-bs-toggle="modal" data-bs-target="#UploadKecModal" style="margin-left:-1px;"><i
                        class="bx bx-upload"></i>&nbsp;Upload</button>
            </div>
            <div class="table-responsive text-nowrap p-4">
                <table class="table table-striped" id="dt-users-table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>ID</th>
                            <th>Kode Wilayah</th>
                            <th>Nama Kecamatan</th>
                            <th>Total Desa</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @php $i=1 @endphp
                        @foreach ($kecamatan as $p)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $p->id }}</td>
                                <td>{{ $p->kode }}</td>
                                <td>{{ $p->nm_kec }}</td>
                                <td><a href="/show-wilayah-desa/{{ $p->slug }}">
                                        <span class="badge bg-label-primary me-1">{{ $p->kec_count }} Desa</span>
                                    </a></td>
                                <td>

                                    <a class="dropdown-item" href="javascript:void(0);" data-bs-toggle="modal"
                                        data-bs-target="#editKecModal{{ $p->id }}"><i
                                            class="bx bx-edit-alt me-1"></i>
                                        Edit</a>
                                    <a class="dropdown-item" href="/delete-wilayah-kec/{{ $p->id }}"><i
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

    <!-- Add user Modal -->
    <div class="modal fade" id="addKecModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-md modal-simple modal-dialog-centered modal-add-new-role">
            <div class="modal-content p-3 p-md-5">
                <div class="modal-body">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="text-center mb-4">
                        <h3 class="role-title">Tambah Kecamatan</h3>
                        <p>Masukkan kode dan nama Kecamatan</p>
                    </div>
                    <!-- Add role form -->
                    <form action="/create-wilayah-kec" class="row g-3" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="col-12">
                            <label>Kode</label>
                            <input type="hidden" name="id_kab" value="{{ $tampil->nm_kab }}">
                            <input type="text" name="kode" class="form-control" placeholder="Enter a code"
                                tabindex="-1" autocomplete="off" autofocus />
                        </div>

                        <div class="col-12 mb-4">
                            <label>Nama</label>
                            <input type="text" name="nm_kec" class="form-control" placeholder="Enter a Name"
                                tabindex="-1" autocomplete="off" autofocus />
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
    <!--/ Add user Modal -->

    <div class="modal fade" id="UploadKecModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-md modal-simple modal-dialog-centered modal-add-new-role">
            <div class="modal-content p-3 p-md-5">
                <div class="modal-body">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="text-center mb-4">
                        <h3 class="role-title">Upload Kecamatan</h3>
                        <p>Masukkan kode dan nama Kecamatan</p>
                    </div>
                    <!-- Add role form -->
                    <form action="{{url('import_kec')}}" class="row g-3" method="POST" enctype="multipart/form-data">
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

    @foreach ($kecamatan as $p)
        <div class="modal fade" id="editKecModal{{ $p->id }}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-md modal-simple modal-dialog-centered modal-add-new-role">
                <div class="modal-content p-3 p-md-5">
                    <div class="modal-body">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        <div class="text-center mb-4">
                            <h3 class="role-title">Ubah Kecamatan</h3>
                            <p>Masukkan kode dan nama Kecamatan</p>
                        </div>
                        <!-- Add role form -->
                        <form action="/update-wilayah-kec/{{ $p->id }}" class="row g-3" method="POST"
                            enctype="multipart/form-data">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                            <div class="col-12">
                                <label>Kode</label>
                                <input type="hidden" value="{{ $p->id }}">
                                <input type="hidden" name="id_kab" value="{{ $tampil->nm_kab }}">
                                <input type="text" name="kode"
                                    class="form-control @error('kode') is-invalid @enderror" value="{{ $p->kode }}"
                                    placeholder="Enter a code" tabindex="-1" autocomplete="off" autofocus />
                                @error('kode')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-12 mb-4">
                                <label>Nama</label>
                                <input type="text" name="nm_kec" value="{{ $p->nm_kec }}" class="form-control"
                                    placeholder="Enter a Name" tabindex="-1" autocomplete="off" autofocus />
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
@endsection
