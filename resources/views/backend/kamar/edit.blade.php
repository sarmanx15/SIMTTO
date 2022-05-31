@extends('layouts.app',['title' => __('Edit Kamar')])
@section('content')
    <h1 class="h3 mb-0 text-gray-800">Manajemen Kamar</h1>
    <p class="mb-4">Lengkapi formulir berikut untuk mengupdate data kamar.</p>



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

                <form action="{{ route('kamar.update', $kamar->id) }}" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_method" value="PUT">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="nama_ruang">Nama Kamar</label>
                                <input type="text" name="nama_ruang"
                                    class="form-control @error('nama_ruang') is-invalid @enderror"
                                    value="{{ old('nama_ruang') ? old('nama_ruang') : $kamar->nama_ruang }}" required>
                                @error('nama_ruang')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                       <!--  <div class="col-md-4">
                            <div class="form-group">
                                <label for="pria">Slot Pria</label>
                                <input type="text" name="pria" class="form-control @error('pria') is-invalid @enderror"
                                    value="{{ old('pria') ? old('pria') : $kamar->pria }}" required>
                                @error('pria')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div> -->
                       <!--  <div class="col-md-4">
                            <div class="form-group">
                                <label for="wanita">Slot Wanita</label>
                                <input type="text" name="wanita" class="form-control @error('wanita') is-invalid @enderror"
                                    value="{{ old('wanita') ? old('wanita') : $kamar->wanita }}" required>
                                @error('wanita')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div> -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="total_terisi">Total Terisi</label>
                                <input type="text" name="total_terisi"
                                    class="form-control @error('total_terisi') is-invalid @enderror"
                                    value="{{ old('total_terisi') ? old('total_terisi') : $kamar->total_terisi }}"
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
                                    value="{{ old('sisa_kamar') ? old('sisa_kamar') : $kamar->sisa_kamar }}" required>
                                @error('sisa_kamar')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="total_kamar">Kuota Kamar</label>
                                <input type="text" name="total_kamar"
                                    class="form-control @error('total_kamar') is-invalid @enderror"
                                    value="{{ old('total_kamar') ? old('total_kamar') : $kamar->total_kamar }}" required>
                                @error('total_kamar')
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
                                    @foreach ($kelas as $kls)
                                        <option {{ $kls->id == $kamar->kelas_id ? 'selected' : '' }}
                                            value="{{ $kls->id }}">{{ $kls->label }}</option>
                                    @endforeach
                                </select>
                                @error('kelas_id')
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
