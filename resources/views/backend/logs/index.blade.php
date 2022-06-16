@extends('layouts.app',['title' => __('Logs Activity')])
@section('Logs')active @endsection

@section('content')
    <h1 class="h3 mb-0 text-gray-800">Log Activity User</h1>
    <p class="mb-4">Halaman ini berfungsi untuk memonitoring aktifitas user terhadap perubahan data di sistem.</p>


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
            <h6 class="m-0 font-weight-bold text-primary">Data Aktivitas</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table  text-center" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col">User</th>
                            <th scope="col">Aktivitas</th>
                            <th scope="col">Waktu</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $key => $item)
                            <tr>
                                <th scope="row">{{ ++$key }}</th>
                                <td>{{ $item->user->name }}</td>
                                <td>{{ $item->description }}</td>
                                <td>{{ $item->created_at->diffForHumans() }}</td>
                                
                            </tr>
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