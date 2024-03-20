<!-- Menghubungkan dengan view template master -->
@extends('backend.index')

<!-- isi bagian judul halaman -->
<!-- cara penulisan isi section yang pendek -->
@section('judul_halaman', 'Halaman UserDinas')

<!-- isi bagian konten -->
<!-- cara penulisan isi section yang panjang -->
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-lg-4">
                <a href="/app-access-user-dinas">
                    <div class="card">
                        <div class="card-body text-center align-middle">
                            <h5 class="mt-4">AKUN DINAS</h5>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-lg-4">
                <a href="/app-access-user-sekolah">
                    <div class="card">
                        <div class="card-body text-center align-middle">
                            <h5 class="mt-4">AKUN SEKOLAH</h5>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-lg-4">
                <a href="/app-access-user-cpd">
                    <div class="card">
                        <div class="card-body text-center align-middle">
                            <h5 class="mt-4">AKUN CPD</h5>
                        </div>
                    </div>
                </a>
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
                        <h3 class="role-title">Tambah Roles</h3>
                        <p>Set role permissions</p>
                    </div>
                    <!-- Add role form -->
                    <form action="/create-roles" class="row g-3" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="col-12 mb-4">
                            <label>Role Name</label>
                            <input type="hidden" name="id_user" value="{{ Auth::user()->id }}">
                            <input type="text" name="name" class="form-control" placeholder="Enter a role name"
                                tabindex="-1" autocomplete="off" autofocus />
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
