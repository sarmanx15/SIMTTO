@extends('frontend.master',['title' => __('Dashboard')])

@section('content')
    <div class="row">
        <div class="col mb-4">
            <div class="card border-bottom-danger shadow">
                <div class="card-body">
                    <div class="row no-gutters align-items-center text-center">
                        <div class="col mr-2">
                            <div class=" h1 font-weight-bold text-danger text-uppercase mb-1">Informasi Ketersediaan Bed</div>
                            <div class="h4 mb-0 font-weight-bold text-gray-900">
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
                        <thead class="bg-dashboard-success text-white h4">
                            <th width="100px">NAMA KAMAR</th>
                            <th width="150px">KELAS</th>
                            <!-- <th>SLOT PRIA</th> -->
                            <!-- <th>SLOT WANITA</th> -->
                            <th width="80px">KUOTA</th>
                            <th width="100px">TEMPAT TIDUR TERPAKAI</th>
                            <th width="100px">TEMPAT TIDUR KOSONG</th>
                            <th width="150px">KETERANGAN</th>
                            <!-- <th>TERAKHIR UPDATE</th> -->
                        </thead>
                        <tbody>
                            @foreach ($kamar as $key => $kmr)
                                <tr @if ($key % 2 == 1) class="bg-dashboard-success text-white" @else class="text-gray-900" @endif>
                                    <td class="h4 mb-0 font-weight-normal">{{ strtoupper($kmr->catkamar->label) }}</td>
                                    <td class="h4 mb-0 font-weight">{{ $kmr->kelas->label }}</td>
                                    <td class="h4 mb-0 font-weight">{{ $kmr->total_kamar }}</td>
                                    <!-- <td class="h4 mb-0 font-weight">{{ $kmr->pria }}</td> -->
                                    <!-- <td class="h4 mb-0 font-weight">{{ $kmr->wanita }}</td> -->
                                    <td class="h4 mb-0 font-weight">{{ $kmr->total_terisi }}</td>
                                    <td class="h4 mb-0 font-weight">{{ $kmr->sisa_kamar }}</td>
                                    <td class="h4 mb-0 font-weight">{{ $kmr->keterangan }}</td>
                                    

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
            background: #5ed162 !important;
        }

        .table-responsive {
            height: calc(100vh - 300px) !important;
            overflow-y: auto;
            scroll-behavior: smooth;
            /* background: url("images/antrian/bed.jpg") center center no-repeat; */
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
   <!--  <script>
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
    </script> -->

    <script>
        
        $(document).ready(function() {
  
  pageScroll();
  $("#contain").mouseover(function() {
    clearTimeout(my_time);
  }).mouseout(function() {
    pageScroll();
  });
  
  getWidthHeader('id_header','id_scroll');
  
});

var my_time;
function pageScroll() {
    var objDiv = document.getElementById("ketersediaan-kamar-grid");
  objDiv.scrollTop = objDiv.scrollTop + 1;  
  if ((objDiv.scrollTop + 100) == objDiv.scrollHeight) {
    objDiv.scrollTop = 0;
  }
  my_time = setTimeout('pageScroll()', 25);
}

function getWidthHeader(id_header) {
  var colCount = 0;
  $('#' + id_scroll + ' tr:nth-child(1) td').each(function () {
    if ($(this).attr('colspan')) {
      colCount += +$(this).attr('colspan');
    } else {
      colCount++;
    }
  });
  
  for(var i = 1; i <= colCount; i++) {
    var th_width = $('#' + id_scroll + ' > tbody > tr:first-child > td:nth-child(' + i + ')').width();
    $('#' + id_header + ' > thead th:nth-child(' + i + ')').css('width',th_width + 'px');
  }
}

    </script>
@endpush
