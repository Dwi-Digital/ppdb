<!-- Menghubungkan dengan view template master -->
@extends('backend.index')

<!-- isi bagian judul halaman -->
<!-- cara penulisan isi section yang pendek -->
@section('judul_halaman', 'Halaman Roles')

<!-- isi bagian konten -->
<!-- cara penulisan isi section yang panjang -->
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">

        <h4 class="py-3 mb-2">Roles List</h4>
        <p>A role provided access to predefined menus and features so that depending on <br> assigned role an administrator
            can have access to what user needs.</p>
        <!-- Role cards -->
        <div class="row g-4">
            @php $i=1 @endphp
            @foreach ($roles as $p)
                <div class="col-xl-4 col-lg-6 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between mb-2">
                                <h6 class="fw-normal">Total {{ $p->roles_count }} users</h6>
                                <ul class="list-unstyled d-flex align-items-center avatar-group mb-0">
                                    {{-- <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
                                        title="Dwi Satria Pangestu" class="avatar avatar-sm pull-up">
                                        <img class="rounded-circle" src="{{ url('storage/images/user.png') }}"
                                            alt="Avatar">
                                    </li> --}}


                                </ul>
                            </div>
                            <div class="d-flex justify-content-between align-items-end">
                                <div class="role-heading">
                                    <h4 class="mb-1">{{ $p->name }}</h4>
                                    <a href="javascript:;" data-bs-toggle="modal"
                                        data-bs-target="#editRoleModal{{ $p->id }}"
                                        class="role-edit-modal"><small>Edit Role</small></a>
                                </div>
                                <a href="/delete-roles/{{ $p->id }}" class="text-muted"><i
                                        class="bx bx-trash"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

            <div class="col-xl-4 col-lg-6 col-md-6">
                <div class="card h-100">
                    <div class="row h-100">
                        <div class="col-sm-5">
                            <div class="d-flex align-items-end h-100 justify-content-center mt-sm-0 mt-3">
                                <img src="../../assets/img/illustrations/sitting-girl-with-laptop-light.png"
                                    class="img-fluid" alt="Image" width="120"
                                    data-app-light-img="illustrations/sitting-girl-with-laptop-light.png"
                                    data-app-dark-img="illustrations/sitting-girl-with-laptop-dark.png">
                            </div>
                        </div>
                        <div class="col-sm-7">
                            <div class="card-body text-sm-end text-center ps-sm-0">
                                <button data-bs-target="#addRoleModal" data-bs-toggle="modal"
                                    class="btn btn-primary mb-3 text-nowrap add-new-role">Add New Role</button>
                                <p class="mb-0">Add role, if it does not exist</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/ Role cards -->
    </div>


    <!-- Add Role Modal -->
    <div class="modal fade" id="addRoleModal" tabindex="-1" aria-hidden="true">
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
    <!--/ Add Role Modal -->

    @foreach ($roles as $p)
        <div class="modal fade" id="editRoleModal{{ $p->id }}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-md modal-simple modal-dialog-centered modal-add-new-role">
                <div class="modal-content p-3 p-md-5">
                    <div class="modal-body">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        <div class="text-center mb-4">
                            <h3 class="role-title">Update Roles</h3>
                            <p>Set role permissions</p>
                        </div>
                        <!-- Add role form -->
                        <form action="/update-roles/{{ $p->id }}" class="row g-3" method="POST"
                            enctype="multipart/form-data">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                            <div class="col-12 mb-4">
                                <label>Role Name</label>
                                <input type="hidden" name="id" value="{{ $p->id }}">
                                <input type="hidden" name="id_user" value="{{ Auth::user()->id }}">
                                <input type="text" name="name" value="{{ $p->name }}" class="form-control"
                                    placeholder="Enter a role name" tabindex="-1" autocomplete="off" autofocus />
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
