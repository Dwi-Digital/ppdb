<!-- Menghubungkan dengan view template master -->
@extends('backend.index')

<!-- isi bagian judul halaman -->
<!-- cara penulisan isi section yang pendek -->
@section('judul_halaman', 'Halaman settings')

<!-- isi bagian konten -->
<!-- cara penulisan isi section yang panjang -->
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="col-lg-4 col-md-6">
            <div class="card">
                <div class="card-header">
                    <h5>Buka / Tutup Pendaftaran</h5>
                </div>
                <div class="card-body">
                    @foreach ($setPendaftaran as $p)
                        <a href="changeSetting/{{ $p->id }}" style="width: 100%"
                            class="btn btn-{{ $p->mode ? 'success' : 'danger' }}">
                            {{ $p->mode ? 'Pendaftaran di Buka' : 'Pendaftaran di Kunci' }}
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
