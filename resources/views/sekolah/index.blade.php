<!-- Menghubungkan dengan view template master -->
@extends('backend.index')

<!-- isi bagian judul halaman -->
<!-- cara penulisan isi section yang pendek -->
@section('judul_halaman', 'Halaman Sekolah')

<!-- isi bagian konten -->
<!-- cara penulisan isi section yang panjang -->
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">

            <h5 class="card-header">Data Sekolah</h5>
            <div class="col-6">
                <button class="btn btn-primary btn-wilayah" data-bs-toggle="modal" data-bs-target="#addSekolahModal"><i
                        class="bx bx-plus"></i> Tambah Sekolah</button>

                <button class="btn btn-primary btn-wilayah" data-bs-toggle="modal" data-bs-target="#UploadSekolahModal"
                    style="margin-left:-1px;"><i class="bx bx-upload"></i>&nbsp;Upload</button>

                    <a href="/app-access-sekolah" class="btn btn-danger btn-wilayah" style="margin-right: -1em;"><i class="bx bx-refresh" ></i>&nbsp;Refresh</a>


            </div>
            <div class="col-12 float-right mt-2">
                <form action="/searchsekolah" method="GET" class="search-form">
                    <input type="text" name="p" class="search-input" placeholder="Cari Nama Sekolah atau NPSN"
                        autocomplete="off">
                    <button type="submit" class="search-button">
                        <i class="bx bx-search"></i>
                    </button>
                </form>
            </div>
            <form action="/delete-deleteSelected" method="post">
                @csrf
                <div class="px-2 py-2" style="margin-left: -0.5em;margin-bottom:-1em;">
                    <button class="btn btn-danger btn-wilayah" type="submit">Hapus yang Dipilih</button>
                </div>

                <div class="table-responsive text-wrap p-4">
                    <table class="table table-striped">
                        {{-- <table class="table table-striped" id="dt-users-table"> --}}
                        <thead>
                            <tr>
                                <th class="text-center"><input type="checkbox" id="selectAll"> All</th>
                                <th class="text-center">NO</th>
                                <th class="text-center">Jenjang</th>
                                <th class="text-center">npsn</th>
                                <th class="text-center">Nama</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Akreditasi</th>
                                <th class="text-center">Prestasi</th>
                                <th class="text-center">Pindah Tugas</th>
                                <th class="text-center">Afirmasi</th>
                                <th class="text-center">Zonasi</th>
                                <th class="text-center">Daya Tampung</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">

                            @php $i=1 @endphp
                            @foreach ($sekolah as $p)
                                <tr>
                                    <td>
                                        <input type="checkbox" name="selectedItems[]" value="{{ $p->id }}">
                                    </td>
                                    <td class="text-center">{{ $i++ }}</td>
                                    <td class="text-center">{{ $p->jenjang }}</td>
                                    <td class="text-center">{{ $p->npsn }}</td>
                                    <td class="text-center">{{ $p->satpen }}</td>
                                    <td class="text-center">{{ $p->status }}</td>
                                    <td class="text-center">{{ $p->akreditasi }}</td>
                                    <td class="text-center">
                                        <span class="badge bg-label-dark me-1">{{ $p->prestasi }} Kuota</span>
                                    </td>
                                    <td class="text-center">
                                        <span class="badge bg-label-info me-1">{{ $p->pindahOrtu }} Kuota</span>
                                    </td>
                                    <td class="text-center">
                                        <span class="badge bg-label-warning me-1">{{ $p->afirmasi }} Kuota</span>
                                    </td>
                                    <td class="text-center">
                                        <span class="badge bg-label-danger me-1">{{ $p->zonasi }} Kuota</span>
                                    </td>
                                    <td class="text-center">
                                        <span class="badge bg-label-success me-1">{{ $p->kuota }} Daya Tampung</span>
                                    </td>
                                    <td class="text-center">
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#editSekolahModal{{ $p->id }}"><i
                                                    class="bx bx-edit"></i></button>

                                            {{-- <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                            data-bs-target="#editSekolahModal{{ $p->id }}"> <i
                                                class="bx bx-edit"></i></button> --}}

                                            <a type="button" class="btn btn-danger btn-sm"
                                                href="/delete-sekolah/{{ $p->id }}"><i class="bx bx-trash"></i></a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </form>
            <div class="px-2 py-2">
                <br />
                Halaman : {{ $sekolah->currentPage() }} <br />
                Jumlah Data : {{ $sekolah->total() }} <br />
                Data Per Halaman : {{ $sekolah->perPage() }} <br />


                {{ $sekolah->links() }}
            </div>

        </div>
    </div>

    <!-- Add user Modal -->
    <div class="modal fade" id="addSekolahModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-md modal-simple modal-dialog-centered modal-add-new-role">
            <div class="modal-content p-3 p-md-5">
                <div class="modal-body">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="text-center mb-4">
                        <h3 class="role-title">Tambah Sekolah</h3>
                        <p>Masukkan data sekolah</p>
                    </div>
                    <!-- Add role form -->
                    <form action="/create-sekolah" name="autoSumForm" class="row g-3" method="POST"
                        enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="col-12">
                            <label>Sekolah</label>
                            <select name="jenjang" id="jenjang" class="form-control" required>
                                <option value="">- pilih -</option>
                                <option value="SMA">SMA</option>
                            </select>
                        </div>

                        <div class="col-12">
                            <label>NPSN</label>
                            <input type="number" name="npsn" class="form-control @error('npsn') is-invalid @enderror"
                                value="{{ old('npsn') }}" placeholder="ex. 123456" tabindex="-1" autocomplete="off"
                                autofocus />
                            @error('npsn')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-12">
                            <label>Sekolah</label>
                            <input type="text" name="satpen" class="form-control"
                                placeholder="ex. SMA Negeri/Swasta ********" tabindex="-1" autocomplete="off"
                                autofocus />
                        </div>

                        <div class="col-12">
                            <label>Status</label>
                            <select name="status" id="status" class="form-control" required>
                                <option value="">- pilih -</option>
                                <option value="Negeri">Negeri</option>
                                <option value="Swasta">Swasta</option>
                            </select>
                        </div>

                        <div class="col-12">
                            <label>Akreditasi</label>
                            <select name="akreditasi" id="akreditasi" class="form-control" required>
                                <option value="">- pilih -</option>
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="C">C</option>
                                <option value="Belum Akreditasi">Belum Akreditasi</option>
                            </select>
                        </div>

                        <div class="col-12">
                            <label>Prestasi</label>
                            <input type="number" name="prestasi" class="form-control" placeholder="ex. 0"
                                onFocus="startCalc();" onBlur="stopCalc();" tabindex="-1" autocomplete="off"
                                autofocus />
                        </div>

                        <div class="col-12">
                            <label>Pindah Tugas Orang Tua dan Anak Guru</label>
                            <input type="number" name="pindahOrtu" class="form-control" placeholder="ex. 0"
                                onFocus="startCalc();" onBlur="stopCalc();" tabindex="-1" autocomplete="off"
                                autofocus />
                        </div>

                        <div class="col-12">
                            <label>Afirmasi</label>
                            <input type="number" name="afirmasi" class="form-control" placeholder="ex. 0"
                                onFocus="startCalc();" onBlur="stopCalc();" tabindex="-1" autocomplete="off"
                                autofocus />
                        </div>

                        <div class="col-12">
                            <label>Zonasi</label>
                            <input type="number" name="zonasi" class="form-control" placeholder="ex. 0"
                                onFocus="startCalc();" onBlur="stopCalc();" tabindex="-1" autocomplete="off"
                                autofocus />
                        </div>

                        <div class="col-12">
                            <label>Kuota</label>
                            <input type="number" name="kuota" value="0" readonly class="form-control"
                                placeholder="Enter a Kuota" tabindex="-1" autocomplete="off" autofocus />
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

    <!-- Add user Modal -->
    @foreach ($sekolah as $p)
        <div class="modal fade" id="editSekolahModal{{ $p->id }}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-md modal-simple modal-dialog-centered modal-add-new-role">
                <div class="modal-content p-3 p-md-5">
                    <div class="modal-body">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        <div class="text-center mb-4">
                            <h3 class="role-title">Ubah Sekolah</h3>
                            <p>Masukkan data sekolah</p>
                        </div>
                        <!-- Add role form -->
                        <form action="/update-sekolah/{{ $p->id }}" class="row g-3" method="POST"
                            enctype="multipart/form-data">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                            <div class="col-12">
                                <label>Sekolah</label>
                                <select name="jenjang" id="jenjang" class="form-control" required>
                                    <option value="{{ $p->jenjang }}">{{ $p->jenjang }}</option>
                                    <option value="SMA">SMA</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <label>Sekolah</label>
                                <input type="hidden" value="{{ $p->id }}">
                                <input type="text" name="satpen" value="{{ $p->satpen }}" class="form-control"
                                    placeholder="Enter a Satpen" tabindex="-1" autocomplete="off" autofocus />
                            </div>

                            <div class="col-12">
                                <label>NPSN</label>
                                <input type="number" name="npsn" value="{{ $p->npsn }}" class="form-control"
                                    placeholder="Enter a Npsn" tabindex="-1" autocomplete="off" autofocus />
                            </div>


                            <div class="col-12">
                                <label>Status</label>
                                <select name="status" id="status" class="form-control" required>
                                    <option value="{{ $p->status }}">{{ $p->status }}</option>
                                    <option value="Negeri">Negeri</option>
                                    <option value="Swasta">Swasta</option>
                                </select>
                            </div>

                            <div class="col-12">
                                <label>Akreditasi</label>
                                <select name="akreditasi" id="akreditasi" class="form-control" required>
                                    <option value="{{ $p->akreditasi }}">{{ $p->akreditasi }}</option>
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="C">C</option>
                                    <option value="Belum Akreditasi">Belum Akreditasi</option>
                                </select>
                            </div>

                            <div class="col-12">
                                <label>Prestasi</label>
                                <input type="number" name="prestasi" value="{{ $p->prestasi }}" class="form-control"
                                    placeholder="ex. 0" tabindex="-1" autocomplete="off" autofocus />
                            </div>

                            <div class="col-12">
                                <label>Pindah Tugas Orang Tua dan Anak Guru</label>
                                <input type="number" name="pindahOrtu" value="{{ $p->pindahOrtu }}"
                                    class="form-control" placeholder="ex. 0" tabindex="-1" autocomplete="off"
                                    autofocus />
                            </div>

                            <div class="col-12">
                                <label>Afirmasi</label>
                                <input type="number" name="afirmasi" value="{{ $p->afirmasi }}" class="form-control"
                                    placeholder="ex. 0" tabindex="-1" autocomplete="off" autofocus />
                            </div>

                            <div class="col-12">
                                <label>Zonasi</label>
                                <input type="number" name="zonasi" value="{{ $p->zonasi }}" class="form-control"
                                    placeholder="ex. 0" tabindex="-1" autocomplete="off" autofocus />
                            </div>

                            <div class="col-12">
                                <label>Kuota</label>
                                <input type="number" name="kuota" value="{{ $p->kuota }}" class="form-control"
                                    placeholder="Enter a Kuota" tabindex="-1" autocomplete="off" autofocus />
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
    <!--/ Add user Modal -->

    <div class="modal fade" id="UploadSekolahModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-md modal-simple modal-dialog-centered modal-add-new-role">
            <div class="modal-content p-3 p-md-5">
                <div class="modal-body">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="text-center mb-4">
                        <h3 class="role-title">Upload Sekolah</h3>
                        <p>Masukkan data kebutuhan kuota</p>
                        <a href="{{ asset('storage/format/format-kuota.xlsx') }}" class="btn btn-danger"
                            download>Download Format</a>
                    </div>
                    <!-- Add role form -->
                    <form action="{{ url('import_sekolah') }}" class="row g-3" method="POST"
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
