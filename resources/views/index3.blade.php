@extends('master')
@section('konten')
    <div class="row">
        <div class="col mb-4">
            <div class="card border-bottom-primary shadow">
                <div class="card-body">
                    <div class="row no-gutters align-items-center text-center">
                        <div class="col mr-2">
                            <div class=" h2 font-weight-bold text-info text-uppercase mb-1">Informasi Ketersediaan Bed</div>
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
        <div class="col-md-12">
            <div class="card">
                <div class="table-responsive" id="ketersediaan-kamar-grid">
                    <table class="table table-bordered text-center table-stripped table-condensed" width="100%"
                        cellspacing="0">
                        <thead class="bg-gradient-info text-white h3">
                            <th>NAMA KAMAR</th>
                            <th>BED TERPAKAI</th>
                            <th>BED KOSONG</th>
                            <th>TOTAL BED</th>
                            <th>TERAKHIR UPDATE</th>
                        </thead>
                        <tbody>
                            @foreach ($kamar as $key => $kmr)
                                <tr @if ($key % 2 == 1) class="bg-info text-white" @endif>
                                    <td class="h4 mb-0 font-weight-bold">{{ $kmr->nama_ruang }}</td>
                                    <td class="h4 mb-0 font-weight-bold">{{ $kmr->total_terisi }}</td>
                                    <td class="h4 mb-0 font-weight-bold">{{ $kmr->sisa_kamar }}</td>
                                    <td class="h4 mb-0 font-weight-bold">{{ $kmr->sisa_kamar }}</td>
                                    <td class="h4 mb-0 font-weight-bold">{{ $kmr->updated_at->diffForhumans() }}</td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection
@push('css')
    <style>
        body {
            position: fixed;
            overflow-y: scroll;
            width: 100%;
        }

        tr.even td {
            background: #77d0c1 !important;
        }

        .table-responsive {
            height: calc(100vh - 300px) !important;
            overflow-y: auto;
            scroll-behavior: smooth;
            background: url("images/antrian/bed.jpg") center center no-repeat;
            background-size: cover;
        }

        .table-responsive thead {
            /* background: white; */
            position: sticky;
            top: 0;
            left: 0;
            border: solid 1px #000 !important;
            box-shadow: 0 2px 2px -1px rgba(0, 0, 0, 0.4);
            z-index: 100;
        }

        .table-responsive tbody tr {
            opacity: .9 !important;
        }

        /* ddsdsd */
        .table-responsive {
            overflow-y: auto;
        }

    </style>
@endpush
@push('js')
    <script>
        var ekt = document.body;
        if (ekt.requestFullscreen) {
            ekt.requestFullscreen();
        } else if (ekt.msRequestFullscreen) {
            ekt.msRequestFullscreen();
        } else if (ekt.mozRequestFullScreen) {
            ekt.mozRequestFullScreen();
        } else if (ekt.webkitRequestFullscreen) {
            ekt.webkitRequestFullscreen();
        }
    </script>
    <script>
        var $el = $(".table-responsive");

        function anim() {
            var st = $el.scrollTop();
            var sb = $el.prop("scrollHeight") - $el.innerHeight();
            $el.animate({
                scrollTop: st < sb / 2 ? sb : 0
            }, 6000, anim);
        }

        function stop() {
            $el.stop();
        }
        anim();
        $el.hover(stop, anim);
    </script>
@endpush
