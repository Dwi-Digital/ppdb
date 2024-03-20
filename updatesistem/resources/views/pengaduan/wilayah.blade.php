<!-- Menghubungkan dengan view template master -->
@extends('layouts.app')

<!-- isi bagian judul halaman -->
<!-- cara penulisan isi section yang pendek -->
@section('judul_halaman', 'Halaman Pengaduan Wilayah')

<!-- isi bagian konten -->
<!-- cara penulisan isi section yang panjang -->
@section('content')
    <div class="container">
        <div class="pengaduanDown">
            <div class="jumbotron bg-pengaduan">
                <h3 class="h3">Syarat Penyampaian Pengaduan</h3>
                <i class="bx bx-paperclip"></i>
                <ul>
                    <li>
                        <p>Prioritas pelapor orangtua siswa / siswa ybs, jika wali harus dilengkapi surat kuasa, ttd di atas
                            materai</p>
                    </li>

                    <li>
                        <p>Menyerahkan / mengupload fotocopy identitas pelapor</p>
                    </li>

                    <li>
                        <p>Mengisi Formulir Pengaduan</p>
                    </li>

                    <li>
                        <p>Menyertakan foto bukti permasalahan / diupload di media layanan pengaduan</p>
                    </li>
                </ul>
            </div>

            <div class="table-pengaduan" style="text-align: center;margin-top: 2em;">
                <h4 >Hotline PPDB 2024 - Cabang Dinas Pendidikan Wilayah</h4>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th rowspan="2" class="text-center align-middle">No</th>
                                <th rowspan="2" class="text-center align-middle">Cabang Dinas</th>
                                <th colspan="3" class="text-center align-middle">Kabupaten Kota</th>
                                <th rowspan="2" class="text-center align-middle">Layanan Hotline</th>
                            </tr>
    
                            <tr>
                                <th class="text-center align-middle">1</th>
                                <th class="text-center align-middle">2</th>
                                <th class="text-center align-middle">3</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Cabang Dinas Wilayah I</td>
                                <td>Kab. Aceh Singkil</td>
                                <td>Kota. Subulussalam</td>
                                <td></td>
                                <td>0821-6570-0141</td>
                            </tr>
    
                            <tr>
                                <td>2</td>
                                <td>Cabang Dinas Wilayah II</td>
                                <td>Kab. Pidiel</td>
                                <td>Kab. Pidie Jaya</td>
                                <td></td>
                                <td>0821-6570-0141</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
