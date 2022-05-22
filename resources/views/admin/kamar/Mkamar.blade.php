@extends('admin.layouts.main')
@section('konten')
<div class="card shadow mb-2">
    <div class="card-header py-3">
        <div class="row">
            <div class="col">
                <a href="#" type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#tambahkamar"><i class="fas fa-plus"></i> Tambah Kamar</a>
            </div>
            <div class="col">
                <p class="m-0 float-right pt-1 font-weight-bold text-primary">
                    Jumlah Kamar : {{$countKamar}} Kamar
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
                        <th>Kelas Perawatan</th>
                        <th>Total Kamar</th>
                        <th>Sisa Kamar</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($Kamar as $k)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$k->nama_ruang}}</td>
                        <td>{{$k->kelas_perawatan}}</td>
                        <td>{{$k->total_kamar}}</td>
                        <td>{{$k->sisa_kamar}}</td>
                        <td>
                            <center>
                                <a href="kamar/delete/{{$k->id_ruang}}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                <button href="kamar/edit/{{$k->id_ruang}}" class="btn btn-warning btn-sm" id="btn-edit-user" data-toggle="modal" data-target="#editkamar" data-id_ruang="{{$k->id_ruang}}" data-nama_ruang="{{$k->nama}}" data-kelas_perawatan="{{$k->kelas_perawatan}}" data-total="{{$k->total_kamar}}">
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
<div class="modal fade" id="tambahkamar" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-bold " id="exampleModalLongTitle"><i class="fas fa-user text-purple"></i> Form Tambah Kamar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid px-4">
                    <form action="/kamar/create" method="POST" enctype="multipart/form-data" class="mr-8">
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Nama Ruang</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" required="required" name="nama_ruang">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="roles" class="col-sm-2 col-form-label">Kelas Perawatan</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="kelas_perawatan" id="edit-kelas_perawatan">
                                    <option value="vvip">VVIP</option>
                                    <option value="vip">VIP</option>
                                    <option value="kelas1_anak">Kelas 1 Anak</option>
                                    <option value="kelas1_dewasa">Kelas 1 Dewasa</option>
                                    <option value="kelas2_anak">Kelas 2 Anak</option>
                                    <option value="kelas2_dewasa">Kelas 2 Dewasa</option>
                                    <option value="kelas3_anak">Kelas 3 Anak</option>
                                    <option value="kelas3_dewasa">Kelas 3 Dewasa</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-sm-2 col-form-label">Total Kamar</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" required="required" name="total_kamar">
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
                <h5 class="modal-title font-weight-bold " id="exampleModalLongTitle"><i class="fas fa-user text-purple"></i> Form Edit Kamar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid px-4">
                    <form action="{{route('update.kamar')}}" method="POST" enctype="multipart/form-data" class="mr-8">
                        @csrf
                        <input type="hidden" class="form-control" name="id_ruang" id="edit-id_ruang"><br>
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Nama Ruang</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" required="required" name="nama_ruang" id="edit-nama_ruang">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="roles" class="col-sm-2 col-form-label">Kelas Perawatan</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="kelas_perawatan" id="edit-kelas_perawatan">
                                    <option value="vvip">VVIP</option>
                                    <option value="vip">VIP</option>
                                    <option value="kelas1_anak">Kelas 1 Anak</option>
                                    <option value="kelas1_dewasa">Kelas 1 Dewasa</option>
                                    <option value="kelas2_anak">Kelas 2 Anak</option>
                                    <option value="kelas2_dewasa">Kelas 2 Dewasa</option>
                                    <option value="kelas3_anak">Kelas 3 Anak</option>
                                    <option value="kelas3_dewasa">Kelas 3 Dewasa</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-sm-2 col-form-label">Total Kamar</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" required="required" name="total_kamar" id="edit-total">
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