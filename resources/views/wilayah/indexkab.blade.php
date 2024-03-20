<!-- Menghubungkan dengan view template master -->
@extends('backend.index')

<!-- isi bagian judul halaman -->
<!-- cara penulisan isi section yang pendek -->
@section('judul_halaman', 'Halaman Wilayah Kabupaten')

<!-- isi bagian konten -->
<!-- cara penulisan isi section yang panjang -->
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <!-- Striped Rows -->
        <div class="card">
            <h5 class="card-header">Data Wilayah / <span onclick="goBack()" class="btn badge bg-label-primary me-1"><i
                        class="bx bx-pointer"></i> {{ $tampil->nm_prov }}</span>
            </h5>
            <div class="col-6">
                <button class="btn btn-primary btn-wilayah" data-bs-toggle="modal" data-bs-target="#addKabModal"><i
                        class="bx bx-plus"></i> Tambah Kabupaten</button>


            </div>
            <div class="table-responsive text-nowrap p-4">
                <table class="table table-striped">
                    {{-- <table class="table table-striped" id="dt-users-table"> --}}
                    <thead>
                        <tr>
                            <th><input type="checkbox" id="selectAll"> All</th>
                            <th>No</th>
                            <th>ID</th>
                            <th>Kode Wilayah</th>
                            <th>Nama Kabupaten</th>
                            <th>Total Kecamatan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        <form action="/kabdeleteSelected" method="post">
                            @csrf
                            @php $i=1 @endphp
                            @foreach ($kabupaten as $p)
                                <tr>
                                    <td>
                                        <input type="checkbox" name="selectedItems[]" value="{{ $p->id }}">
                                    </td>
                                    <td>{{ $i++ }}</td>
                                    <td><span class="badge bg-label-dark me-1">{{ $p->id }}</span></td>
                                    <td>{{ $p->kode }}</td>
                                    <td>{{ $p->nm_kab }}</td>
                                    <td><a href="/show-wilayah-kec/{{ $p->slug }}">
                                            <span class="badge bg-label-primary me-1">{{ $p->kab_count }} Kecamatan</span>
                                        </a></td>
                                    <td>

                                        <a class="dropdown-item" href="javascript:void(0);" data-bs-toggle="modal"
                                            data-bs-target="#editKabModal{{ $p->id }}"><i
                                                class="bx bx-edit-alt me-1"></i>
                                            Edit</a>
                                        <a class="dropdown-item" href="/delete-wilayah-kab/{{ $p->id }}"><i
                                                class="bx bx-trash me-1"></i>
                                            Delete</a>

                                    </td>
                                </tr>
                            @endforeach
                            <div class="px-2 py-2" style="margin-left: -2em;margin-top:-1.8em;">
                                <button class="btn btn-danger btn-wilayah" type="submit">Hapus yang Dipilih</button>
                            </div>
                        </form>
                    </tbody>
                </table>
            </div>
            <div class="px-2 py-2">
                <br />
                Halaman : {{ $kabupaten->currentPage() }} <br />
                Jumlah Data : {{ $kabupaten->total() }} <br />
                Data Per Halaman : {{ $kabupaten->perPage() }} <br />


                {{ $kabupaten->links() }}
            </div>
        </div>
        <!--/ Striped Rows -->
    </div>

    <!-- Add user Modal -->
    <div class="modal fade" id="addKabModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-md modal-simple modal-dialog-centered modal-add-new-role">
            <div class="modal-content p-3 p-md-5">
                <div class="modal-body">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="text-center mb-4">
                        <h3 class="role-title">Tambah Kabupaten</h3>
                        <p>Masukkan kode dan nama Kabupaten</p>
                    </div>
                    <!-- Add role form -->
                    <form action="/create-wilayah-kab" class="row g-3" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="col-12">
                            <label>Kode</label>
                            <input type="hidden" name="id_prov" value="{{ $tampil->id }}">
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
                            <input type="text" name="nm_kab" class="form-control" placeholder="Enter a Name"
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


    @foreach ($kabupaten as $p)
        <div class="modal fade" id="editKabModal{{ $p->id }}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-md modal-simple modal-dialog-centered modal-add-new-role">
                <div class="modal-content p-3 p-md-5">
                    <div class="modal-body">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        <div class="text-center mb-4">
                            <h3 class="role-title">Ubah Kabupaten</h3>
                            <p>Masukkan kode dan nama Kabupaten</p>
                        </div>
                        <!-- Add role form -->
                        <form action="/update-wilayah-kab/{{ $p->id }}" class="row g-3" method="POST"
                            enctype="multipart/form-data">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                            <div class="col-12">
                                <label>Kode</label>
                                <input type="hidden" value="{{ $p->id }}">
                                <input type="hidden" name="id_prov" value="{{ $tampil->id }}">
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
                                <input type="text" name="nm_kab" value="{{ $p->nm_kab }}" class="form-control"
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
