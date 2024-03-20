<!-- Menghubungkan dengan view template master -->
@extends('backend.index')

<!-- isi bagian judul halaman -->
<!-- cara penulisan isi section yang pendek -->
@section('judul_halaman', 'Halaman Database')

<!-- isi bagian konten -->
<!-- cara penulisan isi section yang panjang -->
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
            <h5 class="card-header"><i class="bx bx-data"></i>&nbsp;Data Awal</h5>
            <div class="col-6">
                {{-- <button class="btn btn-primary btn-wilayah" data-bs-toggle="modal" data-bs-target="#addDataModal"><i
                        class="bx bx-plus"></i> Basedata</button> --}}

                <button class="btn btn-success btn-wilayah"  data-bs-toggle="modal" data-bs-target="#UploadDataModal"><i
                        class="bx bx-upload"></i>&nbsp;Upload Data</button>
            </div>
            <div class="table-responsive text-wrap p-4">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">SEKOLAH</th>
                            <th class="text-center">NIK</th>
                            <th class="text-center">NISN</th>
                            <th class="text-center">Nama</th>
                            <th class="text-center">Tempat/Tanggal Lahir</th>
                            <th class="text-center">Jenis Kelamin</th>
                            <th class="text-center">Kab/Kota</th>
                            <th class="text-center">Kecamatan</th>
                            <th class="text-center">Desa</th>
                            <th class="text-center">Dusun</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @php $i=1 @endphp
                        @foreach ($data as $p)
                            <tr>
                                <td class="text-center">{{ $i++ }}</td>
                                <td class="text-center">{{ $p->sekolah }}</td>
                                <td class="text-center">{{ $p->nik }}</td>
                                <td class="text-center">{{ $p->nisn }}</td>
                                <td class="text-center">{{ $p->nama }}</td>
                                <td class="text-center">{{ $p->tmp_lahir }}, {{ $p->tgl_lahir }}</td>
                                <td class="text-center">{{ $p->kelamin }}</td>
                                <td class="text-center">{{ $p->kab_kota }}</td>
                                <td class="text-center">{{ $p->kec }}</td>
                                <td class="text-center">{{ $p->desa }}</td>
                                <td class="text-center">{{ $p->dusun }}</td>
                                <td class="text-center">
                                    <div class="btn-group " role="group" aria-label="Basic example">
                                        <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#editDataModal{{ $p->id }}"><i class="bx bx-edit"></i></button>

                                       

                                        <a type="button" class="btn btn-danger btn-sm"
                                            href="/delete-awal/{{ $p->id }}"><i class="bx bx-trash"></i></a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                
            </div>
           <div style="padding: 10px">
            <br/>
            Halaman : {{ $data->currentPage() }} <br/>
            Jumlah Data : {{ $data->total() }} <br/>
            Data Per Halaman : {{ $data->perPage() }} <br/>


            {{ $data->links() }}
           </div>
        </div>
    </div>

    @foreach ($data as $p)
        <div class="modal fade" id="editDataModal{{ $p->id }}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-md modal-simple modal-dialog-centered modal-add-new-role">
                <div class="modal-content p-3 p-md-5">
                    <div class="modal-body">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        <div class="text-center mb-4">
                            <h3 class="role-title">Ubah Data</h3>
                            <p>Masukkan data siswa.</p>
                        </div>
                        <!-- Add role form -->
                        <form action="/update-data-awal/{{ $p->id }}" class="row g-3" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                            <div class="col-12">
                                <label>NIK</label>
                                <input type="hidden" value="{{ $p->id }}">
                                <input type="text" name="nik" value="{{ $p->nik }}" class="form-control" placeholder="ex. 111******0000*****1" maxlength="16" minlength="16"
                                    tabindex="-1" autocomplete="off" autofocus />
                            </div>

                            <div class="col-12">
                                <label>NISN</label>
                                <input type="text" name="nisn" value="{{ $p->nisn }}" class="form-control" placeholder="ex. 111******1" maxlength="10" minlength="10"
                                    tabindex="-1" autocomplete="off" autofocus />
                            </div>

                            <div class="col-12">
                                <label>Nama</label>
                                <input type="text" name="nama" value="{{ $p->nama }}" class="form-control" placeholder="ex. Dwi Satria Pangestu"
                                    tabindex="-1" autocomplete="off" autofocus />
                            </div>

                            <div class="col-12">
                                <label>Tempat Lahir</label>
                                <input type="text" name="tmp_lahir" value="{{ $p->tmp_lahir }}" class="form-control" placeholder="ex. Aceh Besar"
                                    tabindex="-1" autocomplete="off" autofocus />
                                    <p class="text-muted">Masukkan tempat lahir sesuai dengan <b>AKTA LAHIR</b></p>
                            </div>
                            
                            <div class="col-12">
                                <label>Tanggal Lahir</label>
                                <input type="date" name="tgl_lahir" value="{{$p->tgl_lahir}}" class="form-control" placeholder="ex. 111******1"
                                    tabindex="-1" autocomplete="off" autofocus />
                            </div>

                            <div class="col-12">
                                <label>Jenis Kelamin</label>
                                <select name="kelamin" id="kelamin" class="form-control">
                                    <option value="{{$p->kelamin}}">{{$p->kelamin}}</option>
                                    <option value="L">L</option>
                                    <option value="P">P</option>
                                </select>
                            </div>

                            <div class="col-12">
                                <label>Kab/Kota</label>
                                <input type="text" name="kab_kota" value="{{$p->kab_kota}}" class="form-control" placeholder="ex. Aceh Besar"
                                    tabindex="-1" autocomplete="off" autofocus />
                            </div>

                            <div class="col-12">
                                <label>Kecamatan</label>
                                <input type="text" name="kec" value="{{$p->kec}}" class="form-control" placeholder="ex. Ingin Jaya"
                                    tabindex="-1" autocomplete="off" autofocus />
                            </div>

                            <div class="col-12">
                                <label>Desa</label>
                                <input type="text" name="desa" value="{{$p->desa}}" class="form-control" placeholder="ex. Paleuh Pulo"
                                    tabindex="-1" autocomplete="off" autofocus />
                            </div>

                            <div class="col-12">
                                <label>Dusun</label>
                                <input type="text" name="dusun" value="{{$p->dusun}}" class="form-control" placeholder="ex. To'Iman"
                                    tabindex="-1" autocomplete="off" autofocus />
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

    <div class="modal fade" id="UploadDataModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-md modal-simple modal-dialog-centered modal-add-new-role">
            <div class="modal-content p-3 p-md-5">
                <div class="modal-body">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="text-center mb-4">
                        <h3 class="role-title">Upload Data Awal</h3>
                        <p>Masukkan kode dan nama Data Awal</p>
                        <a href="{{ asset('storage/format/format-data-awal.xlsx')}}" class="btn btn-danger" download >Download Format</a>
                    </div>
                    <!-- Add role form -->
                    <form action="{{url('import_data')}}" class="row g-3" method="POST" enctype="multipart/form-data">
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
