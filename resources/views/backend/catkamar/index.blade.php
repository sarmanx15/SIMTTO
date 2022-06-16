@extends('layouts.app',['title' => __('Kategori Kamar')])
@section('DataMasterNav')active @endsection
@section('CatKamar')active @endsection
@section('DataMaster')show @endsection
@section('content')
    <h1 class="h3 mb-0 text-gray-800">Kamar</h1>
    <p class="mb-4">Kategori Kamar digunakan sebagai data master kamar, sebelum menambahkan info bed diharapkan untuk menambahkan data kategori kamar dan kelas kamar terlebih dahulu</p>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">

        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addModal">
            Tambah Kamar
        </button>
    </div>


    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show my-1" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <!-- DataTales Example -->

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Kamar</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col">Nama Kamar</th>
                            <th scope="col">Jumlah Kelas</th>
                            <th scope="col">Petugas</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $key => $item)
                            <tr>
                                <th scope="row">{{ ++$key }}</th>
                                <td>{{ $item->label }}</td>
                                <td>{{ count($item->kamar) }}</td>
                                <td>{{ count($item->user) }}</td>
                                <td>
                                    <button class="btn btn-primary btn-sm" data-toggle="modal"
                                        data-target="#editModal-{{ $item->id }}">
                                        Edit
                                    </button>
                                    @if(count($item->kamar) == 0 && count($item->user) == 0)
                                    <form method="POST" action="{{ route('catkamar.destroy', [$item->id]) }}"
                                        class="d-inline" onsubmit="return confirm('Delete this data permanently?')">
                                        @csrf
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="submit" value="Delete" class="btn btn-danger btn-sm">
                                    </form>
                                    @endif
                                </td>
                            </tr>
                            <!-- Edit Modal -->
                            <div class="modal fade" id="editModal-{{ $item->id }}" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Edit Category</h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('catkamar.update', $item->id) }}" method="POST">
                                                <input type="hidden" name="_method" value="PUT">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="label">Nama Kamar</label>
                                                    <input type="text" name="label" class="form-control" id="label"
                                                        value="{{ $item->label }}" required>
                                                </div>
                                                
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Add Modal -->
    <div class="modal fade" id="addModal" role="dialog" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Kelas</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('catkamar.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="label">Nama Kamar</label>
                            <input type="text" name="label" class="form-control " id="label" required autofocus>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
<script>
      $(function() {
        $('#dataTable').DataTable(
        {

        });
      });
    </script>
    
@endsection