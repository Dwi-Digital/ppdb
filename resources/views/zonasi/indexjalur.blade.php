<!-- Menghubungkan dengan view template master -->
@extends('backend.index')

<!-- isi bagian judul halaman -->
<!-- cara penulisan isi section yang pendek -->
@section('judul_halaman', 'Halaman Jalur')

<!-- isi bagian konten -->
<!-- cara penulisan isi section yang panjang -->
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
            <h5 class="card-header">Data Jalur Pendaftaran</h5>
            <div class="col-6">
                <button class="btn btn-primary btn-wilayah" data-bs-toggle="modal" data-bs-target="#addJalurModal"><i
                        class="bx bx-plus"></i> Tambah Jalur</button>
            </div>
            <div class="table-responsive text-nowrap p-4">
                <table class="table table-striped" id="dt-users-table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Jalur</th>
                            <th>Kegiatan</th>
                            <th>Keterangan</th>
                            <th>Lokasi</th>
                            <th>Tanggal Mulai</th>
                            <th>Tanggal Akhir</th>
                            <th>Color</th>
                            <th>No Urut</th>
                            <th>Tayang</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @php $i=1 @endphp
                        @foreach ($jalur as $p)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $p->jalur }}</td>
                                <td>{{ $p->kegiatan }}</td>
                                <td>{{ $p->keterangan }}</td>
                                <td>{{ $p->lokasi }}</td>
                                <td>
                                    <span class="badge bg-label-success me-1">{{ $p->tgl_mulai }}</span>
                                </td>
                                <td>
                                    <span class="badge bg-label-danger me-1">{{ $p->tgl_selesai }}</span>
                                </td>
                                <td> <span class="btn bg-label-{{ $p->color }} me-1"></span></td>
                                <td>{{ $p->no_urut }}</td>
                                <td>
                                    <a href="change/{{ $p->id }}"
                                        class="badge bg-label-{{ $p->status ? 'success' : 'danger' }}">
                                        {{ $p->status ? 'Aktif' : 'Tidak Aktif' }}
                                    </a>
                                </td>
                                <td>

                                    <a class="dropdown-item" href="javascript:void(0);" data-bs-toggle="modal"
                                        data-bs-target="#editJalurModal{{ $p->id }}"><i
                                            class="bx bx-edit-alt me-1"></i>
                                        Edit</a>
                                    <a class="dropdown-item" href="/delete-jalur/{{ $p->id }}"><i
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

    <div class="modal fade" id="addJalurModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-simple modal-dialog-centered modal-add-new-role">
            <div class="modal-content p-3 p-md-5">
                <div class="modal-body">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="text-center mb-4">
                        <h3 class="role-title">Tambah Jalur Pendaftaran</h3>
                        <p>Masukkan data Jalur Pendaftaran</p>
                    </div>
                    <!-- Add role form -->
                    <div class="col-12">
                        <div class="row">
                            <form action="/create-jalur" class="row g-3" method="POST" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="col-6">
                                    <div class="col-12 mb-2">
                                        <label for="jalur">Masukkan Jalur</label>
                                        <input type="text" name="jalur" class="form-control"
                                            placeholder="Enter a Jalur" tabindex="-1" autocomplete="off" autofocus />
                                    </div>

                                    <div class="col-12 mb-2">
                                        <label for="kegiatan">Kegiatan</label>
                                        <input type="text" name="kegiatan" class="form-control"
                                            placeholder="Enter a Jalur" tabindex="-1" autocomplete="off" autofocus />
                                    </div>

                                    <div class="col-12 mb-2">
                                        <label for="Keterangan">Keterangan</label>
                                        <textarea name="keterangan" class="form-control" cols="30" rows="10"></textarea>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="col-12 mb-2">
                                        <label for="lokasi">Lokasi</label>
                                        <select name="lokasi" id="lokasi" class="form-control">
                                            <option value="Online">Online</option>
                                            <option value="Offline">Offline</option>
                                        </select>
                                    </div>

                                    <div class="col-12 mb-2">
                                        <label for="jalur">Tanggal Mulai</label>
                                        <input type="date" name="tgl_mulai" class="form-control"
                                            placeholder="Enter a Date" tabindex="-1" autocomplete="off" autofocus />
                                    </div>

                                    <div class="col-12 mb-2">
                                        <label for="jalur">Tanggal Akhir</label>
                                        <input type="date" name="tgl_selesai" class="form-control"
                                            placeholder="Enter a Date" tabindex="-1" autocomplete="off" autofocus />
                                    </div>

                                    <div class="col-12 mb-2">
                                        <label for="color">Color</label>
                                        <select name="color" id="color" class="form-control">
                                            <option value="primary">primary</option>
                                            <option value="danger">danger</option>
                                            <option value="warning">warning</option>
                                            <option value="info">info</option>
                                            <option value="success">success</option>
                                        </select>
                                    </div>

                                    <div class="col-12 mb-2">
                                        <label for="no_urut">No Urut</label>
                                        <input type="number" name="no_urut" class="form-control"
                                            placeholder="Enter a Number" tabindex="-1" autocomplete="off" autofocus />
                                    </div>

                                    <div class="col-12 mb-2">
                                        <label for="status">Status</label>
                                        <select name="status" id="aktif" class="form-control">
                                            <option value="1">Aktif</option>
                                            <option value="0">Tidak Aktif</option>
                                        </select>
                                    </div>


                                </div>
                                <div class="col-12 text-center">
                                    <button type="submit" class="btn btn-primary me-sm-3 me-1">Submit</button>
                                    <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="modal"
                                        aria-label="Close">Cancel</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!--/ Add role form -->
                </div>
            </div>
        </div>
    </div>

    @foreach ($jalur as $p)
        <div class="modal fade" id="editJalurModal{{ $p->id }}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-simple modal-dialog-centered modal-add-new-role">
                <div class="modal-content p-3 p-md-5">
                    <div class="modal-body">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        <div class="text-center mb-4">
                            <h3 class="role-title">Ubah Jalur Pendaftaran</h3>
                            <p>Masukkan data Jalur Pendaftaran</p>
                        </div>
                        <!-- Add role form -->
                        <form action="/update-jalur/{{ $p->id }}" class="row g-3" method="POST"
                            enctype="multipart/form-data">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                            <div class="col-6">
                                <div class="col-12 mb-2">
                                    <label for="jalur">Masukkan Jalur</label>
                                    <input type="text" name="id" value="{{$p->id}}">
                                    <input type="text" name="jalur" value="{{ $p->jalur }}" class="form-control"
                                        placeholder="Enter a Jalur" tabindex="-1" autocomplete="off" autofocus />
                                </div>

                                <div class="col-12 mb-2">
                                    <label for="kegiatan">Kegiatan</label>
                                    <input type="text" name="kegiatan" value="{{ $p->kegiatan }}" class="form-control"
                                        placeholder="Enter a Jalur" tabindex="-1" autocomplete="off" autofocus />
                                </div>

                                <div class="col-12 mb-2">
                                    <label for="Keterangan">Keterangan</label>
                                    <textarea name="keterangan" class="form-control" cols="30" rows="10">{{ $p->keterangan }}</textarea>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="col-12 mb-2">
                                    <label for="lokasi">Lokasi</label>
                                    <select name="lokasi" id="lokasi" class="form-control">
                                        <option value="{{ $p->lokasi }}">{{ $p->lokasi }}</option>
                                        <hr class="mt-2 mb-2">
                                        <option value="Online">Online</option>
                                        <option value="Offline">Offline</option>
                                    </select>
                                </div>

                                <div class="col-12 mb-2">
                                    <label for="jalur">Tanggal Mulai</label>
                                    <input type="date" name="tgl_mulai" value="{{ $p->tgl_mulai }}" class="form-control"
                                        placeholder="Enter a Date" tabindex="-1" autocomplete="off" autofocus />
                                </div>

                                <div class="col-12 mb-2">
                                    <label for="jalur">Tanggal Akhir</label>
                                    <input type="date" name="tgl_selesai" value="{{ $p->tgl_selesai }}" class="form-control"
                                        placeholder="Enter a Date" tabindex="-1" autocomplete="off" autofocus />
                                </div>

                                <div class="col-12 mb-2">
                                    <label for="color">Color</label>
                                    <select name="color" id="color" class="form-control">
                                        <option value="{{ $p->color }}"><b>{{ $p->color }}</b></option>
                                        <option value="primary">primary</option>
                                        <option value="danger">danger</option>
                                        <option value="warning">warning</option>
                                        <option value="info">info</option>
                                        <option value="success">success</option>
                                    </select>
                                </div>

                                <div class="col-12 mb-2">
                                    <label for="no_urut">No Urut</label>
                                    <input type="number" name="no_urut" value="{{ $p->no_urut }}" class="form-control"
                                        placeholder="Enter a Number" tabindex="-1" autocomplete="off" autofocus />
                                </div>

                                <div class="col-12 mb-2">
                                    <label for="status">Status</label>
                                    <select name="status" id="aktif" class="form-control">
                                        <option value="1">Aktif</option>
                                        <option value="0">Tidak Aktif</option>
                                    </select>
                                </div>

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
