<!-- Menghubungkan dengan view template master -->
@extends('backend.index')

<!-- isi bagian judul halaman -->
<!-- cara penulisan isi section yang pendek -->
@section('judul_halaman', 'Halaman UserDinas')

<!-- isi bagian konten -->
<!-- cara penulisan isi section yang panjang -->
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
            <div class="card-header">
                <h5><i class="ti-folder"></i> AKUN CPD </h5>
                <hr>
            </div>
            
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped display">
                    {{-- <table id="dt-users-table" class="table table-striped display"> --}}
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Avatar</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Asal Sekolah</th>
                                <th>Roles</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $i=1 @endphp
                            @foreach ($cpd as $p)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td><img src="{{ url('storage/images/user/' . $p->avatar) }}" width="50px"
                                        alt=""></td>
                                    <td>{{$p->name}}</td>
                                    <td>{{$p->email}}</td>
                                    <td>{{$p->instansi}}</td>
                                    <td>{{$p->role}}</td><td>

                                        <div class="btn-group " role="group" aria-label="Basic example">
                                            {{-- <button type="button" class="btn btn-warning btn-sm"data-bs-toggle="modal"
                                            data-bs-target="#editDataModal{{ $p->id }}"> <i
                                                class="bx bx-edit"></i></button> --}}
    
    
                                            <a type="button" class="btn btn-danger btn-sm"
                                                href="/delete-user/{{ $p->id }}"><i class="bx bx-trash"></i></a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="px-2 py-2">
                    <br />
                    Halaman : {{ $cpd->currentPage() }} <br />
                    Jumlah Data : {{ $cpd->total() }} <br />
                    Data Per Halaman : {{ $cpd->perPage() }} <br />
    
    
                    {{ $cpd->links() }}
                </div>
            </div>
        </div>

    </div>
@endsection




