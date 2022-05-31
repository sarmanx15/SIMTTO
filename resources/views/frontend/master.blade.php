<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta http-equiv="refresh" content="40">
    <link href="{{ asset('img') }}/AWS.png" rel="icon" type="image/png">
    <!-- Custom fonts for this template-->
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
    {{-- <link href="{{ asset('css/custom.css') }}" rel="stylesheet"> --}}
    <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    {{-- <script src="{{ asset('js/loader.js') }}"></script> --}}
    <title>
        @if (isset($title))
            {{ $title }} ::
        @endif {{ config('app.name', 'SIMPATI AWS :: Sistem Informasi Tempat Tidur RSUD AW SJAHRANIE') }}
    </title>
    @stack('css')
</head>

<body id="page-top">

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-dashboard-gradient-success topbar mb-4 static-top shadow ">
                <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
                <div class="sidebar-brand-icon">
                    {{-- <i class="fas fa-laugh-wink"></i> --}}
                    <img src="{{ asset('img/AWS.png') }}" class="" width="90" alt="">
                </div>
            </a>
                <a class="align-items-center" href="#">
                    
                    <div class="sidebar-brand-text text-white mx-3 small">SISTEM INFORMASI TEMPAT TIDUR</div>
                    <div class="h3 sidebar-brand-text text-white mx-3 font-weight-bold">RSUD ABDOEL WAHAB SJAHRANIE</div>
                </a>
               <header>
                   
               </header>
            </nav>
            <!-- End of Topbar -->
            <!-- Begin Page Content -->
            <div class="container-fluid">

                @yield('content')
{{-- <div id="broadcast"></div> --}}
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- End of Main Content -->
        <!-- Footer -->
        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright &copy; RSUD AW SJAHRANIE {{ now()->year }} by <a href="https://www.instagram.com/rzkyafriani/" target="_blank">KiMan Studio</a> </span>
                </div>
            </div>
        </footer>
        <!-- End of Footer -->
    </div>
    <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->
    <!-- Bootstrap core JavaScript-->
        <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('vendor') }}/jquery/jquery.min.js"></script>
    <script src="{{ asset('vendor') }}/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('vendor') }}/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('js') }}/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->

    <!-- Page level custom scripts -->
    <script src='https://cdn.jsdelivr.net/npm/simple-datatables@latest' type="text/javascript"></script>
    
    <script src="{{ asset('js') }}/dashboard.js"></script>
    @stack('js')

</body>

</html>
