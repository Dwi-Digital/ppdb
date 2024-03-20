<!-- Menghubungkan dengan view template master -->
@extends('backend.indexcpd')

<!-- isi bagian judul halaman -->
<!-- cara penulisan isi section yang pendek -->
@section('judul_halaman', 'Halaman Cpd')


<!-- isi bagian konten -->
<!-- cara penulisan isi section yang panjang -->
@section('content')
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-lg-3">
                <div class="card">
                    <div class="card-body text-center">
                        <img src="{{ url('storage/images/user/' . Auth::user()->avatar) }}" alt class="img-thumbnail"
                            style="width: 15em;height:17em;margin:auto;">
                        <p>
                            <small>
                                <span class="text-muted">Foto latar
                                    <b class="text-danger">MERAH</b></span> <br>
                                <span>MAX upload foto <b>1000 kb</b></span>
                            </small>
                        </p>
                        <button class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#upload{{ Auth::user()->id }}"><i class="bx bx-edit"></i>&nbsp;Ubah
                            Foto</button>
                    </div>
                </div>
                {{-- @if ($cpdkonfirs && $cpdkonfirs->konfir == 1)
                    <div class="card  mt-4">
                        <div class="card-body text-center">
                            <a href="/app-down-cpd-pdf" type="button" class="btn btn-danger btn-block">
                                <i class="bx bx-download"></i>&nbsp; Bukti Pendaftaran
                            </a>
                        </div>
                    </div>
                @endif --}}

                <div class="card mt-4">
                    <div class="card-header">
                        <p>Progres pendaftaran</p>
                        <hr>
                    </div>
                    <div class="card-body" style="margin-top: -1.5em;">

                        <?php
                        $step = '7';
                        $zonasi = $z;
                        $pribadi = $p;
                        $orangtua = $o;
                        $pendidikan = $pk;
                        $berkas = $b;
                        $konfir = $k;
                        $db = $zonasi + $pribadi + $orangtua + $pendidikan + $berkas + $konfir;
                        $bagi = $db / $step;
                        $hasil = $bagi * 100;
                        
                        // echo $hilai;
                        
                        ?>

                        <div class="d-flex justify-content-between align-items-center mb-1">
                            <span>Isi Data</span>
                            <span><?php echo number_format("$hasil"); ?> % Selesai</span>
                        </div>
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped progress-bar-animated bg-primary"
                                role="progressbar" style="width: <?php echo $hasil; ?>%" aria-valuenow="50" aria-valuemin="x0"
                                aria-valuemax="100"><?php echo number_format("$hasil"); ?> %</div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-lg-9">
                <div class="card p-2">
                    <h5 style="margin-bottom: -2px;">Form Data Pribadi : <b>{{ Auth::user()->name }}</b> <small
                            class="text-muted">calon peserta didik</small></h5>
                </div>
                <div class="nav-align-top mb-4 mt-2">
                    <ul class="nav nav-tabs nav-fill" role="tablist">
                        <li class="nav-item">
                            <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab"
                                data-bs-target="#navs-justified-zonasi" aria-controls="navs-justified-pribadi"
                                aria-selected="true">

                                @foreach ($cpdzonasi as $p)
                                    <?php
                                    if ($p->id_user == true) {
                                        echo "<i class='tf-icons bx bx-circle' style='color: green'></i>";
                                    } elseif ($p->id_user == null) {
                                        echo "<i class='tf-icons bx bx-circle' style='color: orange'></i>";
                                    }
                                    ?>
                                @endforeach

                                &nbsp; Zonasi

                            </button>
                        </li>
                        <li class="nav-item">
                            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                                data-bs-target="#navs-justified-pribadi" aria-controls="navs-justified-pribadi"
                                aria-selected="false">

                                @foreach ($cpdpribadi as $p)
                                    <?php
                                    if ($p->id_user == true) {
                                        echo "<i class='tf-icons bx bx-circle' style='color: green'></i>";
                                    } elseif ($p->id_user == null) {
                                        echo "<i class='tf-icons bx bx-circle' style='color: orange'></i>";
                                    }
                                    ?>
                                @endforeach

                                &nbsp;
                                Pribadi

                            </button>
                        </li>
                        <li class="nav-item">
                            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                                data-bs-target="#navs-justified-orangtua" aria-controls="navs-justified-orangtua"
                                aria-selected="false">


                                @foreach ($cpdortu as $p)
                                    <?php
                                    if ($p->id_user == true) {
                                        echo "<i class='tf-icons bx bx-circle' style='color: green'></i>";
                                    } elseif ($p->id_user == null) {
                                        echo "<i class='tf-icons bx bx-circle' style='color: orange'></i>";
                                    }
                                    ?>
                                @endforeach

                                &nbsp;
                                Orang Tua
                            </button>
                        </li>
                        <li class="nav-item">
                            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                                data-bs-target="#navs-justified-pendidikan" aria-controls="navs-justified-pendidikan"
                                aria-selected="false">

                                @foreach ($cpdpendidikan as $p)
                                    <?php
                                    if ($p->id_user == true) {
                                        echo "<i class='tf-icons bx bx-circle' style='color: green'></i>";
                                    } elseif ($p->id_user == null) {
                                        echo "<i class='tf-icons bx bx-circle' style='color: orange'></i>";
                                    }
                                    ?>
                                @endforeach

                                &nbsp;
                                Pendidikan
                            </button>
                        </li>

                        <li class="nav-item">
                            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                                data-bs-target="#navs-justified-berkas" aria-controls="navs-justified-berkas"
                                aria-selected="false">

                                @foreach ($cpdberkas as $p)
                                    <?php
                                    if ($p->id_user == true) {
                                        echo "<i class='tf-icons bx bx-circle' style='color: green'></i>";
                                    } elseif ($p->id_user == null) {
                                        echo "<i class='tf-icons bx bx-circle' style='color: orange'></i>";
                                    }
                                    ?>
                                @endforeach

                                &nbsp;
                                Berkas
                            </button>
                        </li>

                        <li class="nav-item">
                            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                                data-bs-target="#navs-justified-konfirmasi" aria-controls="navs-justified-konfirmasi"
                                aria-selected="false">

                                @foreach ($cpdkonfir as $p)
                                    <?php
                                    if ($p->id_user == true) {
                                        echo "<i class='tf-icons bx bx-circle' style='color: green'></i>";
                                    } elseif ($p->id_user == null) {
                                        echo "<i class='tf-icons bx bx-circle' style='color: orange'></i>";
                                    }
                                    ?>
                                @endforeach
                                &nbsp;

                                Konfirmasi
                            </button>
                        </li>
                    </ul>
                    <div class="tab-content">
                        {{-- CpdZonasi --}}
                        <div class="tab-pane fade show active" id="navs-justified-zonasi" role="tabpanel">
                            <div class="wilayah">
                                <form action="/cpd-store" class="row g-3" method="POST" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label">Kabupaten</label>
                                        <div class="col-sm-10">
                                            <input type="hidden" name="id_user" value="{{ Auth::user()->id }}">
                                            <input type="text" name="kabupaten" value="{{ Auth::user()->kabupaten }}"
                                                class="form-control" readonly required>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label">kecamatan</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="kecamatan" id="kecamatancpd"
                                                value="{{ Auth::user()->kecamatan }}" class="form-control" readonly
                                                required>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label">Desa</label>
                                        <div class="col-sm-10">
                                            <select name="desa" id="desa1" class="form-control">
                                                <option>---Pilih Desa---</option>
                                                <option value="{{ Auth::user()->desa }}">{{ Auth::user()->desa }}</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label">Sekolah</label>
                                        <div class="col-sm-10">
                                            <select name="sekolah" id="sekolah1" onblur="autofill()"
                                                class="form-control nisn">
                                                <option>---Pilih Sekolah---</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-sm-10">
                                            <input type="hidden" name="sekolah1" id="nama"
                                                placeholder="Autofill Here" readonly>
                                        </div>
                                    </div>

                                    <div class="container">
                                        <ul>
                                            <li>
                                                NB :
                                                Pastikan data dengan benar <span class="text-danger">*</span>
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="col-12 text-center">

                                        <button type="submit" class="btn btn-primary me-sm-3 me-1"
                                            style="width: 100%"><i class="bx bx-save"></i>&nbsp;Simpan Data
                                            Zonasi</button>


                                    </div>
                                </form>
                            </div>
                            <hr>
                            <div class="text-center" style="margin-bottom: -2em;">
                                <p class="badge bg-dark"> Data wilayah zonasi yang didaftar</p>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped mt-4">
                                    <thead>
                                        <tr>
                                            <th rowspan="2" class="text-center align-middle">#</th>
                                            <th rowspan="2" class="text-center align-middle">Kabupaten / Kota</th>
                                            <th rowspan="2" class="text-center align-middle">Kecamatan</th>
                                            <th rowspan="2" class="text-center align-middle">Desa</th>
                                            <th colspan="2" class="text-center align-middle">Sekolah | Bobot</th>
                                            <th rowspan="2" class="text-center align-middle">Aksi</th>

                                        </tr>
                                        <tr>
                                            <th class="text-center align-middle">Sekolah Pilihan</th>
                                            <th class="text-center align-middle">Bobot</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $i=1 @endphp
                                        @foreach ($cpdzonasi as $p)
                                            <tr>
                                                <td class="text-center align-middle" style="text-transform: uppercase">
                                                    {{ $i++ }}</td>
                                                <td class="text-center align-middle" style="text-transform: uppercase">
                                                    {{ $p->kabupaten }}</td>
                                                <td class="text-center align-middle" style="text-transform: uppercase">
                                                    {{ $p->kecamatan }}</td>
                                                <td class="text-center align-middle" style="text-transform: uppercase">
                                                    {{ $p->desa }}</td>
                                                <td class="text-center align-middle" style="text-transform: uppercase">
                                                    {{ $p->sek->id_zonasi }}</td>
                                                <td class="text-center align-middle" style="text-transform: uppercase">
                                                    {{ $p->sek->bobot }}</td>

                                                <td>
                                                    {{-- <a class="dropdown-item"
                                                        href="/delete-cpdzonasi/{{ $p->id }}"><i
                                                            class="bx bx-trash me-1"></i>
                                                        Delete</a> --}}


                                                    <?php
                                                    if ($k >= '1') {
                                                        echo "<p class='text-center badge bg-danger'><i class='bx bx-lock'></i>&nbsp;Sudah dikunci</p>";
                                                    } elseif ($k < '1') {
                                                        echo "<a class='dropdown-item'
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                href='/delete-cpdzonasi/$p->id'><i
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    class='bx bx-trash me-1'></i>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                Delete</a>";
                                                    }
                                                    ?>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <p class="badge bg-danger">Tidak dapat mengubah zonasi</p>
                            <p class="badge bg-danger">Batas penginputan hanya 2 sekolah</p>

                        </div>
                        {{-- cpdZonasi end --}}

                        {{-- cpdPribadi --}}
                        <div class="tab-pane fade " id="navs-justified-pribadi" role="tabpanel">
                            <form action="/cpd-store-pribadi" class="row g-3" method="POST"
                                enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="basic-default-name">Nama lengkap</label>
                                    <div class="col-sm-10">
                                        <input type="hidden" name="id_user" value="{{ Auth::user()->id }}"
                                            class="form-control" readonly />
                                        <input type="text" name="nama_siswa" value="{{ Auth::user()->name }}"
                                            class="form-control" readonly />
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="basic-default-name">Tanggal</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="tanggal" value="{{ Auth::user()->tanggal }}"
                                            class="form-control" placeholder="ex. 1996-03-30 (tahun-bulan-tanggal)"
                                            readonly />
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="basic-default-company">NISN</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="nisn" value="{{ Auth::user()->nisn }}"
                                            class="form-control" readonly />
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="basic-default-email">Jenis Kelamin</label>
                                    <div class="col-sm-10">
                                        <div class="input-group input-group-merge">
                                            <select name="kelamin" id="kelamin" class="form-control"
                                                autocomplete="off" required>

                                                <option value="">--pilih jenis kelamin--</option>
                                                <option value="Laki-laki">Laki-laki</option>
                                                <option value="Perempuan">Perempuan</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Agama</label>
                                    <div class="col-sm-10">
                                        <select name="agama" id="" class="form-control" required
                                            autocomplete="off">
                                            <option value="">--Pilih Agama--</option>
                                            <option value="Islam">Islam</option>
                                            <option value="Katolik">Katolik</option>
                                            <option value="Protestan">Protestan</option>
                                            <option value="Hindu">Hindu</option>
                                            <option value="Budha">Budha</option>
                                            <option value="Konghucu">Konghucu</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">No Hp</label>
                                    <div class="col-sm-10">
                                        <input type="number" name="nohp" class="form-control" required
                                            autocomplete="off" placeholder="ex. 08*************2">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Alamat</label>
                                    <div class="col-sm-10">
                                        <textarea name="alamat" class="form-control" placeholder="Jl. ........." autocapitalize="off" required></textarea>
                                    </div>
                                </div>

                                <div class="row justify-content-end">
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-primary" style="width: 100%;"><i
                                                class="bx bx-save"></i>&nbsp;Simpan Data Pribadi</button>
                                    </div>
                                </div>
                            </form>
                            <hr>
                            <div class="text-center" style="margin-bottom: -2em;">
                                <p class="badge bg-dark"> Data Pribadi Pendaftar</p>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped mt-4">
                                    <thead>
                                        <tr>
                                            <th class="text-center align-middle">#</th>
                                            <th class="text-center align-middle">Nama Pendaftar</th>
                                            <th class="text-center align-middle">NISN</th>
                                            <th class="text-center align-middle">Jenis Kelamin</th>
                                            <th class="text-center align-middle">Agama</th>
                                            <th class="text-center align-middle">No Hp</th>
                                            <th class="text-center align-middle">Alamat</th>
                                            <th class="text-center align-middle">Aksi</th>
                                        </tr>

                                    </thead>
                                    <tbody>
                                        @php $i=1 @endphp
                                        @foreach ($cpdpribadi as $p)
                                            <tr>
                                                <td class="text-center align-middle" style="text-transform: uppercase">
                                                    {{ $i++ }}</td>
                                                <td class="text-center align-middle" style="text-transform: uppercase">
                                                    {{ $p->nama_siswa }}</td>
                                                <td class="text-center align-middle" style="text-transform: uppercase">
                                                    {{ $p->nisn }}</td>
                                                <td class="text-center align-middle" style="text-transform: uppercase">
                                                    {{ $p->kelamin }}</td>
                                                <td class="text-center align-middle" style="text-transform: uppercase">
                                                    {{ $p->agama }}</td>
                                                <td class="text-center align-middle" style="text-transform: uppercase">
                                                    {{ $p->nohp }}</td>
                                                <td class="text-center align-middle" style="text-transform: uppercase">
                                                    {{ $p->alamat }}</td>
                                                <td>

                                                    {{-- <a class="dropdown-item"
                                                        href="/delete-cpdpribadi/{{ $p->id }}"><i
                                                            class="bx bx-trash me-1"></i>
                                                        Delete</a> --}}

                                                    <?php
                                                    if ($k >= '1') {
                                                        echo "<p class='text-center badge bg-danger'><i class='bx bx-lock'></i>&nbsp;Sudah dikunci</p>";
                                                    } elseif ($k < '1') {
                                                        echo "<a class='dropdown-item'
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                href='/delete-cpdpribadi/$p->id'><i
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    class='bx bx-trash me-1'></i>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                Delete</a>";
                                                    }
                                                    ?>

                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <p class="badge bg-danger">hanya dapat melakukan sekali pengisian</p>
                        </div>
                        {{-- CpdProbadi end --}}

                        {{-- cpdortu --}}
                        <div class="tab-pane fade" id="navs-justified-orangtua" role="tabpanel">
                            <form action="/tambah-wali" class="row g-3" method="POST" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="col-lg-3">
                                    <span class="badge bg-primary">Data Ayah</span>
                                </div>
                                <hr>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="basic-default-name">Nama Ayah</label>
                                    <div class="col-sm-10">
                                        <input type="hidden" name="id_user" value="{{ Auth::user()->id }}"
                                            class="form-control" readonly />
                                        <input type="text" name="nm_ayah" class="form-control"
                                            placeholder="ex. Anonim / Alm. Anonim" required autocomplete="off" />
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="basic-default-company">Pekerjaan</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="pekerjaan_ayah" class="form-control"
                                            placeholder="ex. Wiraswasta" autocomplete="0ff" required />
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="basic-default-company">No Hp</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="no_ayah" class="form-control"
                                            placeholder="ex. 0821**********2" autocomplete="0ff" required />
                                    </div>
                                </div>

                                <div class="col-lg-3">
                                    <span class="badge bg-primary">Data Ibu</span>
                                </div>
                                <hr>

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="basic-default-name">Nama Ibu</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="nm_ibu" class="form-control"
                                            placeholder="ex. Anonim / Almh. Anonim" required autocomplete="off" />
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="basic-default-company">Pekerjaan</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="pekerjaan_ibu" class="form-control"
                                            placeholder="ex. Ibu Rumah Tangga" autocomplete="0ff" required />
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="basic-default-company">No Hp</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="no_ibu" class="form-control"
                                            placeholder="ex. 0821**********2" autocomplete="0ff" required />
                                    </div>
                                </div>

                                <div class="col-lg-3">
                                    <span class="badge bg-primary">Data Wali</span>
                                </div>
                                <hr>

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="basic-default-name">Nama Wali</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="nm_wali" class="form-control"
                                            placeholder="ex. Anonim / Almh. Anonim" required autocomplete="off"
                                            required />
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="basic-default-company">Pekerjaan</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="pekerjaan_wali" class="form-control"
                                            placeholder="ex. Programmer/PNS/Ibu Rumah Tangga" autocomplete="0ff"
                                            crequired />
                                    </div>
                                </div>

                                <div class="row ">
                                    <label class="col-sm-2 col-form-label" for="basic-default-company">No Hp</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="no_wali" class="form-control"
                                            placeholder="ex. 0821**********2" autocomplete="0ff" required />
                                    </div>
                                </div>

                                <div class="col-lg-3 mb-3">
                                    <span class="badge bg-danger">masukkan dengan simbol ( <b>-</b> ) jika datanya
                                        kosong</span>
                                </div>

                                <div class="row justify-content-end">
                                    <div class="col-sm-10">

                                        <button type="submit" class="btn btn-primary" style="width: 100%;"><i
                                                class="bx bx-save"></i>&nbsp;Simpan Data Orang Tua</button>
                                    </div>
                                </div>
                            </form>

                            <hr>
                            <div class="text-center" style="margin-bottom: -2em;">
                                <p class="badge bg-dark"> Data Keluarga</p>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped mt-4">
                                    <thead>
                                        <tr>
                                            <th class="text-center align-middle">#</th>
                                            <th class="text-center align-middle">Nama Ayah</th>
                                            <th class="text-center align-middle">Nama Ibu</th>
                                            <th class="text-center align-middle">Nama Wali</th>
                                            <th class="text-center align-middle">Aksi</th>
                                        </tr>

                                    </thead>
                                    <tbody>
                                        @php $i=1 @endphp
                                        @foreach ($cpdortu as $p)
                                            <tr>
                                                <td class="text-center align-middle" style="text-transform: uppercase">
                                                    {{ $i++ }}</td>
                                                <td class="text-center align-middle" style="text-transform: uppercase">
                                                    {{ $p->nm_ayah }}</td>
                                                <td class="text-center align-middle" style="text-transform: uppercase">
                                                    {{ $p->nm_ibu }}</td>
                                                <td class="text-center align-middle" style="text-transform: uppercase">
                                                    {{ $p->nm_wali }}</td>

                                                <td>

                                                    {{-- <a class="dropdown-item" href="javascript:void(0);"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#editDzonasiModal{{ $p->id }}"><i
                                                            class="bx bx-edit-alt me-1"></i>
                                                        Edit</a> --}}
                                                    {{-- <a class="dropdown-item text-center"
                                                        href="/delete-cpdortu/{{ $p->id }}"><i
                                                            class="bx bx-trash me-1"></i>
                                                        Delete</a> --}}

                                                    <?php
                                                    if ($k >= '1') {
                                                        echo "<p class='text-center badge bg-danger'><i class='bx bx-lock'></i>&nbsp;Sudah dikunci</p>";
                                                    } elseif ($k < '1') {
                                                        echo "<a class='dropdown-item'
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                href='/delete-cpdortu/$p->id'><i
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    class='bx bx-trash me-1'></i>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                Delete</a>";
                                                    }
                                                    ?>

                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <p class="badge bg-danger">hanya dapat melakukan sekali pengisian</p>
                        </div>
                        {{-- cpdortu end --}}

                        {{-- cpdpendidikan --}}
                        <div class="tab-pane fade" id="navs-justified-pendidikan" role="tabpanel">
                            <form action="/cpd-store-pendidikan" class="row g-3" method="POST"
                                enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="row mb-2">
                                    <label class="col-sm-2 col-form-label">Nama Sekolah</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="nm_sekolah" value="{{ Auth::user()->instansi }}"
                                            class="form-control" autocomplete="off" placeholder="ex. SMP Negeri 1 Aceh"
                                            readonly required>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Provinsi</label>
                                    <div class="col-sm-10">
                                        <input type="hidden" name="id_user" value="{{ Auth::user()->id }}">
                                        <select name="provinsi" id="provinsip" class="form-select input">
                                            <option value="">--Pilih Provinsi--</option>
                                            @foreach ($provinsi as $p)
                                                <option value="{{ $p->id }}">{{ $p->nm_prov }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Kabupaten</label>
                                    <div class="col-sm-10">
                                        <select name="kabupaten" id="kabupatenp" class="form-select input">
                                            <option>---Pilih Kabupaten---</option>
                                        </select>
                                    </div>
                                </div>



                                <div class="container">
                                    <ul>
                                        <li>
                                            NB :
                                            Pastikan data dengan benar <span class="text-danger">*</span>
                                        </li>
                                    </ul>
                                </div>

                                <div class="col-12 text-center">
                                    <button type="submit" class="btn btn-primary me-sm-3 me-1" style="width: 100%"><i
                                            class="bx bx-save"></i>&nbsp;Simpan Data
                                        Pendidikan</button>
                                </div>
                            </form>

                            <hr>
                            <div class="mb-2 text-center">
                                <span class="badge bg-dark">Data Asal Sekolah</span>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped mt-4">
                                    <thead>
                                        <tr>
                                            <th class="text-center align-middle">#</th>
                                            <th class="text-center align-middle">Kabupaten</th>
                                            <th class="text-center align-middle">Asal Sekolah</th>
                                            <th class="text-center align-middle">Aksi</th>
                                        </tr>

                                    </thead>
                                    <tbody>
                                        @php $i=1 @endphp
                                        @foreach ($cpdpendidikan as $p)
                                            <tr>
                                                <td class="text-center align-middle" style="text-transform: uppercase">
                                                    {{ $i++ }}</td>
                                                <td class="text-center align-middle" style="text-transform: uppercase">
                                                    {{ $p->kabupaten }}</td>
                                                <td class="text-center align-middle" style="text-transform: uppercase">
                                                    {{ $p->nm_sekolah }}</td>


                                                <td>

                                                    {{-- <a class="dropdown-item" href="javascript:void(0);"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#editDzonasiModal{{ $p->id }}"><i
                                                            class="bx bx-edit-alt me-1"></i>
                                                        Edit</a> --}}
                                                    {{-- <a class="dropdown-item text-center"
                                                        href="/delete-cpdpendidikan/{{ $p->id }}"><i
                                                            class="bx bx-trash me-1"></i>
                                                        Delete</a> --}}

                                                    <?php
                                                    if ($k >= '1') {
                                                        echo "<p class='text-center badge bg-danger'><i class='bx bx-lock'></i>&nbsp;Sudah dikunci</p>";
                                                    } elseif ($k < '1') {
                                                        echo "<a class='dropdown-item'
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                href='/delete-cpdpendidikan/$p->id'><i
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    class='bx bx-trash me-1'></i>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                Delete</a>";
                                                    }
                                                    ?>

                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <p class="badge bg-danger">hanya dapat melakukan sekali pengisian</p>
                        </div>
                        {{-- cpdpendidikan end --}}

                        {{-- cpdberkas --}}
                        <div class="tab-pane fade" id="navs-justified-berkas" role="tabpanel">
                            <form action="/cpd-store-berkas" method="POST" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="form-group mb-3">
                                        <label for="berkas">Persyaratan</label>
                                        <input type="hidden" name="id_user" value="{{ Auth::user()->id }}">
                                        <input type="file" name="berkas" accept=".pdf"
                                            class="form-control  @error('berkas') is-invalid @enderror" required>
                                        <p class="text-muted">Max upload 1048 kb / 1 mb</p>

                                        @error('berkas')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary"><i class="bx bx-save"></i>&nbsp;
                                            Simpan BerkasPersyaratan</button>
                                    </div>
                                </div>
                            </form>
                            <hr>
                            <div class="mb-2 text-center">
                                <span class="badge bg-dark">Data berkas persyaratan dan pendukung</span>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped mt-4">
                                    <thead>
                                        <tr>
                                            <th class="text-center align-middle">#</th>
                                            <th class="text-center align-middle">Berkas</th>
                                            <th class="text-center align-middle">Aksi</th>
                                        </tr>

                                    </thead>
                                    <tbody>
                                        @php $i=1 @endphp
                                        @foreach ($cpdberkas as $p)
                                            <tr>
                                                <td class="text-center align-middle" style="text-transform: uppercase">
                                                    {{ $i++ }}</td>

                                                <td class="text-center align-middle" style="text-transform: uppercase">

                                                    <a href="javascript:void(0);" data-bs-toggle="modal"
                                                        data-bs-target="#lihat{{ $p->id }}">
                                                        <img src="storage/images/pdf.png" width="20px"> Lihat Berkas
                                                    </a>
                                                </td>


                                                <td>

                                                    {{-- <a class="dropdown-item" href="javascript:void(0);"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#editDzonasiModal{{ $p->id }}"><i
                                                            class="bx bx-edit-alt me-1"></i>
                                                        Edit</a> --}}
                                                    {{-- <a class="dropdown-item text-center"
                                                        href="/delete-cpdberkas/{{ $p->id }}"><i
                                                            class="bx bx-trash me-1"></i>
                                                        Delete</a> --}}

                                                    <?php
                                                    if ($k >= '1') {
                                                        echo "<p class='text-center badge bg-danger'><i class='bx bx-lock'></i>&nbsp;Sudah dikunci</p>";
                                                    } elseif ($k < '1') {
                                                        echo "<a class='dropdown-item'
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                href='/delete-cpdberkas/$p->id'><i
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    class='bx bx-trash me-1'></i>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                Delete</a>";
                                                    }
                                                    ?>

                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <p class="badge bg-danger">hanya dapat melakukan sekali pengisian</p>
                        </div>

                        {{-- cpdconfir --}}
                        <div class="tab-pane fade" id="navs-justified-konfirmasi" role="tabpanel">
                            <div class="timelines">
                                <table class="table table-responsive mt-2 mb-4">
                                    <span class="badge bg-primary">Data Zonasi</span>
                                    @foreach ($cpdzonasi as $p)
                                        <tr>
                                            <th>Kabupaten</th>
                                            <td>:</td>
                                            <td><b>{{ $p->kabupaten }}</b></td>

                                            <th>Kecamatan</th>
                                            <td>:</td>
                                            <td><b>{{ $p->kecamatan }}</b></td>
                                        </tr>

                                        <tr>
                                            <th>Desa</th>
                                            <td>:</td>
                                            <td><b>{{ $p->desa }}</b></td>

                                            <th>Sekolah</th>
                                            <td>:</td>
                                            <td><b>{{ $p->sekolah }}</b></td>
                                        </tr>
                                    @endforeach
                                </table>

                                <table class="table table-responsive mt-2">
                                    <span class="badge bg-primary">Data Pribadi</span>
                                    @foreach ($cpdpribadi as $p)
                                        <tr>
                                            <th>Nama Lengkap</th>
                                            <td>:</td>
                                            <td><b>{{ $p->nama_siswa }}</b></td>

                                            <th>NISN</th>
                                            <td>:</td>
                                            <td><b>{{ $p->nisn }}</b></td>
                                        </tr>

                                        <tr>
                                            <th>Jenis Kelamin</th>
                                            <td>:</td>
                                            <td><b>{{ $p->kelamin }}</b></td>

                                            <th>Agama</th>
                                            <td>:</td>
                                            <td><b>{{ $p->agama }}</b></td>
                                        </tr>

                                        <tr>
                                            <th>No Telepon/Hp</th>
                                            <td>:</td>
                                            <td><b>{{ $p->nohp }}</b></td>

                                            <th>Alamat</th>
                                            <td>:</td>
                                            <td><b>{{ $p->alamat }}</b></td>
                                        </tr>
                                    @endforeach
                                </table>


                                <table class="table table-responsive mt-2">
                                    <span class="badge bg-primary">Data Orang Tua</span>
                                    @foreach ($cpdortu as $p)
                                        <tr>
                                            <th>Nama Ayah</th>
                                            <td>:</td>
                                            <td><b>{{ $p->nm_ayah }}</b></td>

                                            <th>Nama Ibu</th>
                                            <td>:</td>
                                            <td><b>{{ $p->nm_ibu }}</b></td>

                                            <th>Nama Wali</th>
                                            <td>:</td>
                                            <td><b>{{ $p->nm_wali }}</b></td>
                                        </tr>
                                    @endforeach
                                </table>

                                <table class="table table-responsive mt-2">
                                    <span class="badge bg-primary">Data Pendidikan</span>
                                    @foreach ($cpdpendidikan as $p)
                                        <tr>
                                            <th>Asal Sekolah</th>
                                            <td>:</td>
                                            <td><b>{{ $p->nm_sekolah }}</b></td>

                                            <th>Kabupaten</th>
                                            <td>:</td>
                                            <td><b>{{ $p->kabupaten }}</b></td>

                                        </tr>
                                    @endforeach
                                </table>

                                <table class="table table-responsive mt-2">
                                    <span class="badge bg-primary">Data Pendidikan</span>
                                    @foreach ($cpdberkas as $p)
                                        <tr>
                                            <th>Berkas</th>
                                            <td>:</td>
                                            <td>
                                                <a href="javascript:void(0);" data-bs-toggle="modal"
                                                    data-bs-target="#lihat{{ $p->id }} " class="text-muted">
                                                    <img src="storage/images/pdf.png" width="20px"> Lihat Berkas
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>

                                <div class="alert alert-warning">
                                    <span>Petunjuk Mengenai Resume <br>
                                        <ul>
                                            <li><b>Pastikan Seluruh Data yang anda entri sudah benar.</b></li>
                                            <li>Pastikan Dokumen yang di Upload sudah benar.</li>
                                            <li>Jika sudah benar berikan tanda centang pada pernyataan dibawah ini, kemudian
                                                mengeklik tombol <b>"Akhiri Proses Pendaftaran"</b>. </li>
                                            <li>Setelah <b>Menyelesaikan Pendaftaran</b> anda tidak bisa lagi mengubah data.
                                            </li>
                                        </ul>
                                    </span>
                                </div>

                                <form action="/cpd-store-konfir" method="POST" enctype="multipart/form-data">
                                    {{ csrf_field() }}

                                    <div class="row">
                                        <div class="alert alert-danger form-check mb-4 px-5">
                                            <input type="hidden" name="id_user" value="{{ Auth::user()->id }}">
                                            <input class="form-check-input" type="checkbox" name="konfir"
                                                value="1" required id="defaultCheck3" />
                                            {{-- <input type="text" name="konfir"> --}}
                                            <label class="form-check-label" style="text-align: justify;"
                                                for="defaultCheck3">
                                                Demikian isian data pribadi saya buat sesuai dengan dokumen sebenarnya
                                                dan apabila dan ternyata isian yang saya buat tidak sesuai dengan
                                                dokumen, saya bersedia menanggung akibat yang ditimbulkan.
                                            </label>



                                            <?php
                                            if ($k >= '1') {
                                                echo "<button type='submit' class='btn btn-danger mt-2' disabled>Sudah Resume</button>";
                                            } elseif ($k < '1') {
                                                echo "<button type='submit' class='btn btn-danger mt-2'>Akhiri Proses
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        Pendaftaran</button>";
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- / Content -->

    <div class="modal fade" id="upload{{ Auth::user()->id }}" tabindex="-1" role="dialog" data-backdrop="static"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form method="post" action="/user_upload/{{ Auth::user()->id }}" enctype="multipart/form-data">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Upload Foto</h5>
                    </div>
                    <div class="modal-body">

                        {{ csrf_field() }}
                        {{ method_field('PUT') }}

                        <label>Pilih Foto</label>
                        <div class="form-group">
                            <input type="hidden" name="id" id="id" value="{{ Auth::user()->id }}">
                            <input type="file" name="avatar" id="avatar" value="{{ Auth::user()->avatar }}"
                                required="required">
                            <img src="{{ asset('storage/images/user/' . Auth::user()->avatar) }}" width="70px"
                                height="70px" alt="">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Upload</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    @foreach ($cpdberkas as $p)
        <div class="modal fade" id="lihat{{ $p->id }}" tabindex="-1" role="dialog" data-backdrop="static"
            aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <!--    <div class="modal-header">-->
                    <!--    <h5 class="modal-title" id="exampleModalLabel">Upload Foto</h5>-->
                    <!--</div>-->
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


@endsection
