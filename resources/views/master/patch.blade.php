@extends('backend.index')

<!-- isi bagian judul halaman -->
<!-- cara penulisan isi section yang pendek -->
@section('judul_halaman', 'Halaman Patch')

<!-- isi bagian konten -->
<!-- cara penulisan isi section yang panjang -->
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        {{-- <form action="{{ url('extract-zip') }}" method="POST" enctype="multipart/form-data"> --}}
                        <form id="uploadZipForm" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Update Patch Sistem <small style="color:green;"><b>Versi saat ini v
                                            1.0</b></small></label>
                                <input type="file" placeholder="ZIP" class="form-control" name="zip" id="zip">
                                <div class="progress mt-2" style="display: none;">
                                    <div class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="0"
                                        aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                            <div class="form-group mt-2" style="margin-bottom: -5px;">
                                <button type="submit" class="btn btn-block btn-primary">Perbaharui Patch</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            
            {{-- <div class="col-4">
                <div class="card">
                    <div class="card-body text-center">
                        <form action="{{ url('our_backup_database') }}" method="get">
                            <p>Backup Database Simpati-App</p>
                            <i class="ti-cloud" style="font-size:100px;color:rgba(0, 128, 0, 0.644);position:relative;top:-5px;"></i> <br>
                            <button style="submit" class="btn btn-primary"><i class="ti-cloud-down"></i> Backup Database</button>
                        </form>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
@endsection
