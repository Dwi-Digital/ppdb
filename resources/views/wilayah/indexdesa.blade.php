<!-- Menghubungkan dengan view template master -->
@extends('backend.index')

<!-- isi bagian judul halaman -->
<!-- cara penulisan isi section yang pendek -->
@section('judul_halaman', 'Halaman Wilayah Desa')

<!-- isi bagian konten -->
<!-- cara penulisan isi section yang panjang -->
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
            <h5 class="card-header">Data Wilayah / <span onclick="goBack()" class=" btn badge bg-label-primary me-1"><i
                            class="bx bx-pointer"></i> {{ $tampil->nm_kec }}</span></a>
            </h5>
            <div class="col-6">
                <button class="btn btn-primary btn-wilayah" data-bs-toggle="modal" data-bs-target="#addDesaModal"><i
                        class="bx bx-plus"></i> Tambah</button>

                <button class="btn btn-primary btn-wilayah" data-bs-toggle="modal" data-bs-target="#UploadDesaModal"
                    style="margin-left:-1px;"><i class="bx bx-upload"></i>&nbsp;Upload</button>
            </div>
            <div class="table-responsive text-nowrap p-4">
                <table class="table table-striped" id="dt-users-table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Kode Wilayah</th>
                            <th>Nama Desa</th>
                            {{-- <th>Total Desa</th> --}}
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @php $i=1 @endphp
                        @foreach ($desa as $p)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $p->kode }}</td>
                                <td>{{ $p->nm_desa }}</td>
                                {{-- <td><a href="/show-wilayah-sekolah/{{ $p->slug }}">
                                        <span class="badge bg-label-primary me-1">{{ $p->desa_count }} Sekolah</span>
                                    </a></td> --}}
                                <td>

                                    <a class="dropdown-item" href="javascript:void(0);" data-bs-toggle="modal"
                                        data-bs-target="#editDesaModal{{ $p->id }}"><i
                                            class="bx bx-edit-alt me-1"></i>
                                        Edit</a>
                                    <a class="dropdown-item" href="/delete-wilayah-desa/{{ $p->id }}"><i
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
    <div class="modal fade" id="addDesaModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-md modal-simple modal-dialog-centered modal-add-new-role">
            <div class="modal-content p-3 p-md-5">
                <div class="modal-body">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="text-center mb-4">
                        <h3 class="role-title">Tambah Desa</h3>
                        <p>Masukkan kode dan nama Desa</p>
                    </div>
                    <!-- Add role form -->
                    <form action="/create-wilayah-desa" class="row g-3" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="col-12">
                            <label>Kode</label>
                            <input type="hidden" name="id_kec" value="{{ $tampil->nm_kec }}">
                            <input type="text" name="kode" class="form-control" placeholder="Enter a code"
                                tabindex="-1" autocomplete="off" autofocus />
                        </div>

                        <div class="col-12 mb-4">
                            <label>Nama</label>
                            <input type="text" name="nm_desa" class="form-control" placeholder="Enter a Name"
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

    <div class="modal fade" id="UploadDesaModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-md modal-simple modal-dialog-centered modal-add-new-role">
            <div class="modal-content p-3 p-md-5">
                <div class="modal-body">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="text-center mb-4">
                        <h3 class="role-title">Upload Desa</h3>
                        <p>Masukkan kode dan nama Desa</p>
                    </div>
                    <!-- Add role form -->
                    <form action="{{url('import_desa')}}" class="row g-3" method="POST" enctype="multipart/form-data">
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

    @foreach ($desa as $p)
        <div class="modal fade" id="editDesaModal{{ $p->id }}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-md modal-simple modal-dialog-centered modal-add-new-role">
                <div class="modal-content p-3 p-md-5">
                    <div class="modal-body">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        <div class="text-center mb-4">
                            <h3 class="role-title">Ubah Desa</h3>
                            <p>Masukkan kode dan nama Desa</p>
                        </div>
                        <!-- Add role form -->
                        <form action="/update-wilayah-desa/{{ $p->id }}" class="row g-3" method="POST"
                            enctype="multipart/form-data">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                            <div class="col-12">
                                <label>Kode</label>
                                <input type="hidden" value="{{ $p->id }}">
                                <input type="hidden" name="id_kec" value="{{ $tampil->nm_kec }}">
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
                                <input type="text" name="nm_desa" value="{{ $p->nm_desa }}" class="form-control"
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
