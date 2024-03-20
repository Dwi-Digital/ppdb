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
                <h5><i class="ti-folder"></i> AKUN DINAS </h5>
                <hr>
            </div>
            <div class="col-12 px-3">
                <button class="btn btn-primary user-up" data-bs-toggle="modal" data-bs-target="#addUserModal">
                    <i class="bx bx-plus"></i> Tambah Pengguna
                </button>

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
                                <th>Instansi</th>
                                <th>Roles</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $i=1 @endphp
                            @foreach ($users as $p)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td><img src="{{ url('storage/images/user/' . $p->avatar) }}" width="50px"
                                            alt=""></td>
                                    <td>{{ $p->name }}</td>
                                    <td>{{ $p->email }}</td>
                                    <td>{{ $p->instansi }}</td>
                                    <td>{{ $p->role }}</td>
                                    <td>

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
                    Halaman : {{ $users->currentPage() }} <br />
                    Jumlah Data : {{ $users->total() }} <br />
                    Data Per Halaman : {{ $users->perPage() }} <br />


                    {{ $users->links() }}
                </div>
            </div>
        </div>

    </div>

    <!-- Add user Modal -->
    <div class="modal fade" id="addUserModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-md modal-simple modal-dialog-centered modal-add-new-role">
            <div class="modal-content p-3 p-md-5">
                <div class="modal-body">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="text-center mb-4">
                        <h3 class="role-title">Tambah User</h3>
                        <p>Set role permissions</p>
                    </div>
                    <!-- Add role form -->
                    <form action="/store-user" class="row g-3" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="col-12">
                            <label>nama Lengkap</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                placeholder="Enter a name" tabindex="-1" autocomplete="off" required />

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-12">
                            <label>Instansi</label>
                            <input type="text" name="instansi"
                                class="form-control @error('instansi') is-invalid @enderror" placeholder="Enter a Instansi"
                                tabindex="-1" autocomplete="off" required />

                            @error('instansi')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-12">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control  @error('email') is-invalid @enderror"
                                placeholder="Enter a Email" tabindex="-1" autocomplete="off" required />
                            <p class="text-muted" style="margin-bottom: -5px;">Email Aktif</p>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-12">
                            <label>Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                name="password" placeholder="Password" id="passwordKu" autocomplete="new-password" required>

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <input type="checkbox" class="passshow" onclick="showHide()"> Show Password
                        </div>


                        <div class="col-12">
                            <label>Role</label>
                            <select name="role" id="role"
                                class="form-control @error('password') is-invalid @enderror" required>
                                <option value="">--Pilih role--</option>
                                @foreach ($role as $p)
                                    <option value="{{ $p->name }}">{{ $p->name }}</option>
                                @endforeach
                            </select>

                            @error('role')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            {{-- <input type="checkbox" class="passshow" onclick="showHide()"> Show Password --}}
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
@endsection
