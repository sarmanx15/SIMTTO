@extends('admin.layouts.main')
@section('konten')
<!-- <h1>User</h1> -->
<!-- DataTales Example -->
<div class="card shadow mb-2">
    <div class="card-header py-3">
        <div class="row">
            <div class="col">
                <a href="#" type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#tambahuser"><i class="fas fa-plus"></i> Tambah User</a>
            </div>
            <div class="col">
                <p class="m-0 float-right pt-1 font-weight-bold text-primary">
                    Jumlah User : {{$countUser}} User
                </p>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama</th>
                        <th>E-mail</th>
                        <th>Roles</th>
                        <th>Kamar</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($User as $u)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$u->name}}</td>
                        <td>{{$u->email}}</td>
                        <td>{{$u->roles}}</td>
                        <td>{{$u->kamar}}</td>
                        <td>
                            <center>
                                <a href="user/delete/{{$u->id_user}}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                <button href="user/edit/{{$u->id_user}}" class="btn btn-warning btn-sm" id="btn-edit-user" data-toggle="modal" data-target="#edituser" data-id_user="{{$u->id_user}}" data-name="{{$u->name}}" data-email="{{$u->email}}" data-kamar="{{$u->kamar}}" data-password="{{$u->password}}" data-roles="{{$u->roles}}">
                                    <i class="fa fa-edit"></i></button>
                            </center>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal Tambah Data -->
<div class="modal fade" id="tambahuser" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-bold " id="exampleModalLongTitle"><i class="fas fa-user text-purple"></i> Form Tambah User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid px-4">
                    <form action="/user/create" method="POST" enctype="multipart/form-data" class="mr-8">
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" required="required" name="name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" required="required" name="email">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-sm-2 col-form-label">Password</label>
                            <div class="col-sm-10">
                                <input type="password" encrypt="sha1" pattern=".{6,}" class="form-control" required="required" name="password">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="roles" class="col-sm-2 col-form-label">Roles</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="roles" id="roles">
                                    <option value="Admin">Admin</option>
                                    <option value="Pasien">Pasien</option>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-purple">Simpan</button>
                            <button type="submit" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal Edit Data -->
<div class="modal fade" id="edituser" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-bold " id="exampleModalLongTitle"><i class="fas fa-user text-purple"></i> Form Edit User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid px-4">
                    <form action="{{route('update.user')}}" method="POST" enctype="multipart/form-data" class="mr-8">
                        @csrf
                        <input type="hidden" class="form-control" name="id_user" id="edit-id_user"><br>
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" required="required" name="name" id="edit-name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" required="required" name="email" id="edit-email">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="kamar" class="col-sm-2 col-form-label">Kamar</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" required="required" name="kamar" id="edit-kamar">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-sm-2 col-form-label">Password</label>
                            <div class="col-sm-10">
                                <input type="password" encrypt="sha1" pattern=".{6,}" class="form-control" required="required" name="password" id="edit-password">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="roles" class="col-sm-2 col-form-label">Roles</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="roles" id="edit-roles">
                                    <option value="Admin">Admin</option>
                                    <option value="Pasien">Pasien</option>
                                </select>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-purple">Simpan</button>
                            <button type="submit" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection