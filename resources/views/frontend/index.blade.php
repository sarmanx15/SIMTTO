@extends('frontend.master',['title' => __('Dashboard')])

@section('content')
    <div class="row">
        <div class="col mb-4">
            <div class="card border-bottom-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center text-center">
                        <div class="col mr-2">
                            <div class="text-lg font-weight-bold text-info text-uppercase mb-1">
                                Info Kamar</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                @php
                                    Carbon\Carbon::setLocale('id');
                                @endphp
                                <b>
                                    {{-- <span id="jam">{!! Carbon\Carbon::now() !!}</span> --}}
                                    <span id="date"></span>
                                    <strong>-</strong>
                                    <span id="jam"></span>
                                </b>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        @foreach ($kamar as $kmr)
            <div class="col-md-3 mb-4">
                <div class="card shadow" style="border-radius: 5px; margin-top:10px">
                    <div class="card-header bg-info py-3">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <h3 class="m-0 font-weight-bold text-white">{{ $kmr->$catkamar->label }}</h3>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-bed fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="card py-2 border-left-primary mb-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2 text-center">
                                                <div class="text-xs font-weight-bold text-gray-800 text-uppercase mb-1">
                                                    Kamar Terpakai</div>
                                                <div class="h2 mb-0 font-weight-bold text-primary">{{ $kmr->total_terisi }}
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card py-2 border-left-danger mb-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2 text-center">
                                                <div class="text-xs font-weight-bold text-gray-800 text-uppercase mb-1">
                                                    Kamar Kosong</div>
                                                <div class="h2 mb-0 font-weight-bold text-danger">
                                                    {{ $kmr->sisa_kamar }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card py-2 border-left-success mb-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2 text-center">
                                                <div class="text-xs font-weight-bold text-gray-800 text-uppercase mb-1">
                                                    Kamar Kosongv</div>
                                                <div class="h2 mb-0 font-weight-bold text-success">
                                                    {{ $kmr->sisa_kamar }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-6 mb-4">
                        <a class="text-xs font-weight-bold text-dark text-uppercase">Last Update :
                            {{ tgl_id($kmr->updated_at) }}</a>
                    </div>
                </div>
            </div>
        @endforeach

    </div>
@endsection
