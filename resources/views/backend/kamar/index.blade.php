@extends('layouts.app',['title' => __('Kamar')])

@section('content')
    <h1 class="h3 mb-0 text-gray-800">Manajemen Kamar</h1>
    <p class="mb-4">Berikut ini adalah data yang tersimpan di sistem</p>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">

        <a href="{{ route('kamar.create') }}" class="btn btn-primary my-3">
            Tambah Kamar
        </a>
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
                            <th scope="col">#</th>
                            <th scope="col">Quick Update</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Kelas</th>
                            <th scope="col">Slot Pria</th>
                            <th scope="col">Slot Wanita</th>
                            <th scope="col">Kamar Terisi</th>
                            <th scope="col">Sisa Kamar</th>
                            <th scope="col">Total Kamar</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kamar as $key => $item)
                            <tr>
                                <th scope="row">{{ ++$key }}</th>
                                <td>
                                    <button class="btn btn-primary btn-sm" data-toggle="modal"
                                        data-target="#editModal-{{ $item->id }}">
                                        <i class="fas fa-pen"></i>
                                    </button>
                                </td>
                                <td>{{ $item->nama_ruang }}</td>
                                <td>{{ $item->kelas->label }}</td>
                                <td>{{ $item->pria }}</td>
                                <td>{{ $item->wanita }}</td>
                                <td>{{ $item->total_terisi }}</td>
                                <td>{{ $item->sisa_kamar }}</td>
                                <td>{{ $item->total_kamar }}</td>

                                <td>
                                    <a href="{{ route('kamar.edit', $item->id) }}"
                                        class="btn btn-success btn-sm">Edit</a>
                                    <form method="POST" action="{{ route('kamar.destroy', [$item->id]) }}"
                                        class="d-inline" onsubmit="return confirm('Move post to trash ?')">
                                        @csrf
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="submit" value="Delete" class="btn btn-danger btn-sm">
                                    </form>
                                </td>
                            </tr>
                            <div class="modal fade" id="editModal-{{ $item->id }}" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel"><strong> Update Stok Kamar
                                                    {{ $item->nama_ruang }}</strong></h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('kamar.update', $item->id) }}" method="POST"
                                                enctype="multipart/form-data">
                                                <input type="hidden" name="_method" value="PUT">
                                                @csrf
                                                <div class="row">
                                                    <input type="hidden" name="nama_ruang"
                                                        value="{{ old('nama_ruang') ? old('nama_ruang') : $item->nama_ruang }}">
                                                    <input type="hidden" name="kelas_id"
                                                        value="{{ old('kelas_id') ? old('kelas_id') : $item->kelas_id }}">

                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="pria">Slot Pria</label>
                                                            <input type="text" name="pria"
                                                                class="form-control @error('pria') is-invalid @enderror"
                                                                value="{{ old('pria') ? old('pria') : $item->pria }}"
                                                                required>
                                                            @error('pria')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="wanita">Slot Wanita</label>
                                                            <input type="text" name="wanita"
                                                                class="form-control @error('wanita') is-invalid @enderror"
                                                                value="{{ old('wanita') ? old('wanita') : $item->wanita }}"
                                                                required>
                                                            @error('wanita')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="total_terisi">Total Terisi</label>
                                                            <input type="text" name="total_terisi"
                                                                class="form-control @error('total_terisi') is-invalid @enderror"
                                                                value="{{ old('total_terisi') ? old('total_terisi') : $item->total_terisi }}"
                                                                required>
                                                            @error('total_terisi')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="sisa_kamar">Sisa Kamar</label>
                                                            <input type="text" name="sisa_kamar"
                                                                class="form-control @error('sisa_kamar') is-invalid @enderror"
                                                                value="{{ old('sisa_kamar') ? old('sisa_kamar') : $item->sisa_kamar }}"
                                                                required>
                                                            @error('sisa_kamar')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="total_kamar">Total Kamar</label>
                                                            <input type="text" name="total_kamar"
                                                                class="form-control @error('total_kamar') is-invalid @enderror"
                                                                value="{{ old('total_kamar') ? old('total_kamar') : $item->total_kamar }}"
                                                                required>
                                                            @error('total_kamar')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </div>

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