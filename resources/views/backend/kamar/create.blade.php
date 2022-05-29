@extends('layouts.app',['title' => __('Tambah Kamar')])

@section('content')
    <h1 class="h3 mb-0 text-gray-800">Tambah Data Kamar</h1>
    <p class="mb-4">Lengkapi formulir berikut untuk menambahkan data kamar.</p>



    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show my-1" role="alert">
            {{ session('error') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Informasi Kamar</h6>
        </div>
        <div class="card-body">
            <div class="col-12">
                <form action="{{ route('kamar.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="nama_ruang">Nama Kamar</label>
                                <input type="text" name="nama_ruang"
                                    class="form-control @error('nama_ruang') is-invalid @enderror"
                                    value="{{ old('nama_ruang') }}" required>
                                @error('nama_ruang')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">

                            <div class="form-group">
                                <label for="kelas_id">Kelas</label>
                                <select name="kelas_id" id="kelas_id"
                                    class="form-control @error('kelas_id') is-invalid @enderror" required>
                                    <option value="" disabled selected>Choose one</option>
                                    @foreach ($kelas as $kelas_id)
                                        <option value="{{ $kelas_id->id }}">{{ $kelas_id->label }}</option>
                                    @endforeach
                                </select>
                                @error('kelas_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">

                            <div class="form-group">
                                <label for="pria">Slot Pria</label>
                                <input name="pria" id="pria" class="form-control @error('pria') is-invalid @enderror"
                                    required>{{ old('pria') }}</textarea>
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
                                <input name="wanita" id="wanita" class="form-control @error('wanita') is-invalid @enderror"
                                    required>{{ old('wanita') }}</textarea>
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
                                    value="{{ old('total_terisi') }}" required>
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
                                    value="{{ old('sisa_kamar') }}" required>
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
                                    value="{{ old('total_kamar') }}" required>
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
@endsection
