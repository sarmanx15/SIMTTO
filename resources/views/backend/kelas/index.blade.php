@extends('layouts.app',['title' => __('Kelas')])

@section('content')
    <h1 class="h3 mb-0 text-gray-800">Kategori Kelas</h1>
    <p class="mb-4">Kategori kelas digunakan sebagai data master untuk menambah data kamar, berikut ini adalah data yang tersimpan di sistem</p>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">

        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addModal">
            Tambah Kelas
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
            <h6 class="m-0 font-weight-bold text-primary">Data Kelas</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kelas as $key => $item)
                            <tr>
                                <th scope="row">{{ ++$key }}</th>
                                <td>{{ $item->label }}</td>
                                <td>
                                    <button class="btn btn-primary btn-sm" data-toggle="modal"
                                        data-target="#editModal-{{ $item->id }}">
                                        Edit
                                    </button>
                                    <form method="POST" action="{{ route('kelas.destroy', [$item->id]) }}"
                                        class="d-inline" onsubmit="return confirm('Delete this data permanently?')">
                                        @csrf
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="submit" value="Delete" class="btn btn-danger btn-sm">
                                    </form>
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
                                            <form action="{{ route('kelas.update', $item->id) }}" method="POST">
                                                <input type="hidden" name="_method" value="PUT">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="label">Name</label>
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
                    <form action="{{ route('kelas.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="label">Nama Kelas</label>
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