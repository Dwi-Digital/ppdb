<!-- Menghubungkan dengan view template master -->
@extends('backend.index')

<!-- isi bagian judul halaman -->
<!-- cara penulisan isi section yang pendek -->
@section('judul_halaman', 'Halaman Pengaduhan')

<!-- isi bagian konten -->
<!-- cara penulisan isi section yang panjang -->
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-2">List Pengaduan</h4>
        <p>Halaman ini merupakan pengaduan jika ada kendala atau salah pengisian Pendaftaran PPDB.</p>
        <div class="card">
            <div class="card-header">
                <h5>Data Pengaduan</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped text-wrap">
                        <thead>
                            <tr>
                                <th class="text-center align-middle">#</th>
                                <th class="text-center align-middle">Nama Pengaduh</th>
                                <th class="text-center align-middle">Email</th>
                                <th class="text-center align-middle">Pengaduhan</th>
                                <th class="text-center align-middle">Bukti</th>
                                <th class="text-center align-middle">Proses</th>
                                <th class="text-center align-middle">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $i=1 @endphp
                            @foreach ($pengaduan as $p)
                                <tr>
                                    <td class="text-center align-middle">1</td>
                                    <td class="text-center align-middle">{{ $p->name }}</td>
                                    <td class="text-center align-middle">{{ $p->email }}</td>
                                    <td class="align-middle" style="text-align: justify;">{{ $p->pengaduan }}</td>
                                    <td class="text-center align-middle">
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#gambarModal{{ $p->id }}">
                                            <img src="{{ asset('storage/bukti/' . $p->bukti) }}" alt="bukti"
                                                width="100px">
                                        </a>
                                    </td>

                                    <td>
                                        <a href="" class="btn btn-outline-danger">Belum Baca</a>
                                    </td>
                                    <td>
                                        <a type="button" class="btn btn-danger btn-sm"
                                                href="/delete-pengaduan/{{ $p->id }}">
                                                <i class="bx bx-trash"></i>
                                            </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="px-2 py-2">
                    <br />

                    {{ $pengaduan->links() }}
                </div>
            </div>
        </div>
    </div>
    @foreach ($pengaduan as $p)
        <!-- Modal -->
        <div class="modal fade" id="gambarModal{{ $p->id }}" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <img src="{{ asset('storage/bukti/' . $p->bukti) }}" alt="bukti" width="100%">
            </div>
        </div>
    @endforeach

@endsection
