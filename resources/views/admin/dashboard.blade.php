@extends('admin.layouts.main')
@section('konten')
<div class="row">
    <div class="col mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Banyak Kamar</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{$countKamar}}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-bed fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col mb-4">
        <div class="card border-left-danger shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Banyak User</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{$countUser}}</div>
                    </div>
                    <div class="col-auto">
                        <i class="bi bi-person"></i>
                        <!-- <i class="fa-solid fa-user fa-2x text-gray-300"></i> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
        @foreach ($kamar as $kmr)
            <div class="col-md-4 mb-4">
                <div class="card shadow" style="border-radius: 5px; margin-top:10px">
                    <div class="card-header bg-info py-3">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <h3 class="m-0 font-weight-bold text-white">{{ $kmr->nama_ruang }}</h3>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-bed fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card py-2 border-left-primary mb-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2 text-center">
                                                <div class="text-lg font-weight-bold text-success text-uppercase mb-1">
                                                    Kamar Kosong</div>
                                                <div class="h2 mb-0 font-weight-bold text-gray-800">{{ $kmr->sisa_kamar }}
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card py-2 border-left-danger mb-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2 text-center">
                                                <div class="text-lg font-weight-bold text-success text-uppercase mb-1">
                                                    Total Kamar</div>
                                                <div class="h2 mb-0 font-weight-bold text-gray-800">
                                                    {{ $kmr->total_kamar }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-6 mb-4">
                        <a class="text-xs font-weight-bold text-success text-uppercase">Last Update :
                            {{ $kmr->updated_at }}</a>
                    </div>
                </div>
            </div>
        @endforeach



@endsection