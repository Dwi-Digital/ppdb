<!-- Menghubungkan dengan view template master -->
@extends('backend.index')

<!-- isi bagian judul halaman -->
<!-- cara penulisan isi section yang pendek -->
@section('judul_halaman', 'Halaman Wilayah Provinsi')

<!-- isi bagian konten -->
<!-- cara penulisan isi section yang panjang -->
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <!-- Striped Rows -->
        <div class="card">
            <h5 class="card-header">Data Wilayah</h5>
            <div class="col-6">
                <button class="btn btn-primary btn-wilayah" data-bs-toggle="modal" data-bs-target="#addWilayahModal"><i
                        class="bx bx-plus"></i> Tambah Provinsi</button>
            </div>
            <form action="/wilayahdeleteSelected" method="post">
                @csrf
                <div class="px-2 py-2" style="margin-left: -0.5em;margin-bottom:-1em;">
                    <button class="btn btn-danger btn-wilayah" type="submit">Hapus yang Dipilih</button>
                </div>
                <div class="table-responsive text-nowrap p-4">
                    <table class="table table-striped">
                        {{-- <table class="table table-striped" id="dt-users-table"> --}}
                        <thead>
                            <tr>
                                <th><input type="checkbox" id="selectAll"> All</th>
                                <th>No</th>
                                <th>Kode Wilayah</th>
                                <th>Nama Provinsi</th>
                                <th>Total Kabupaten</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">

                            @php $i=1 @endphp
                            @foreach ($provinsi as $p)
                                <tr>
                                    <td>
                                        <input type="checkbox" name="selectedItems[]" value="{{ $p->id }}">
                                    </td>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $p->kode }}</td>
                                    <td>{{ $p->nm_prov }}</td>
                                    <td><a href="/show-wilayah-kab/{{ $p->slug }}">
                                            <span class="badge bg-label-primary me-1">{{ $p->prov_count }} Kabupaten</span>
                                        </a></td>
                                    <td>

                                        <a class="dropdown-item" href="javascript:void(0);" data-bs-toggle="modal"
                                            data-bs-target="#editWilayahModal{{ $p->id }}"><i
                                                class="bx bx-edit-alt me-1"></i>
                                            Edit</a>
                                        <a class="dropdown-item" href="/delete-wilayah-prov/{{ $p->id }}"><i
                                                class="bx bx-trash me-1"></i>
                                            Delete</a>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </form>
            <div class="px-2 py-2">
                <br />
                Halaman : {{ $provinsi->currentPage() }} <br />
                Jumlah Data : {{ $provinsi->total() }} <br />
                Data Per Halaman : {{ $provinsi->perPage() }} <br />


                {{ $provinsi->links() }}
            </div>
        </div>
        <!--/ Striped Rows -->
    </div>

    <!-- Add user Modal -->
    <div class="modal fade" id="addWilayahModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-md modal-simple modal-dialog-centered modal-add-new-role">
            <div class="modal-content p-3 p-md-5">
                <div class="modal-body">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="text-center mb-4">
                        <h3 class="role-title">Tambah Provinsi</h3>
                        <p>Masukkan kode dan nama Provinsi</p>
                    </div>
                    <!-- Add role form -->
                    <form action="/create-wilayah-prov" class="row g-3" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="col-12">
                            <label>Kode</label>
                            <input type="text" name="kode" class="form-control @error('kode') is-invalid @enderror"
                                value="{{ old('kode') }}" placeholder="Enter a code" tabindex="-1" autocomplete="off"
                                autofocus />
                            @error('kode')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-12 mb-4">
                            <label>Nama</label>
                            <input type="text" name="nm_prov" class="form-control" placeholder="Enter a Name"
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

    @foreach ($provinsi as $p)
        <div class="modal fade" id="editWilayahModal{{ $p->id }}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-md modal-simple modal-dialog-centered modal-add-new-role">
                <div class="modal-content p-3 p-md-5">
                    <div class="modal-body">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        <div class="text-center mb-4">
                            <h3 class="role-title">Ubah Provinsi</h3>
                            <p>Masukkan kode dan nama Provinsi</p>
                        </div>
                        <!-- Add role form -->
                        <form action="/update-wilayah-prov/{{ $p->id }}" class="row g-3" method="POST"
                            enctype="multipart/form-data">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                            <div class="col-12">
                                <label>Kode</label>
                                <input type="hidden" value="{{ $p->id }}">
                                <input type="text" name="kode" value="{{ $p->kode }}" class="form-control"
                                    placeholder="Enter a code" tabindex="-1" autocomplete="off" autofocus />
                            </div>

                            <div class="col-12 mb-4">
                                <label>Nama</label>
                                <input type="text" name="nm_prov" value="{{ $p->nm_prov }}" class="form-control"
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
