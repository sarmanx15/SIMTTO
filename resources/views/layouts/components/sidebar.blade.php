<ul class="navbar-nav bg-primary sidebar sidebar-dark accordion text-white" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('home') }}">
        <div class="sidebar-brand-icon">
            <img src="{{ asset('img/AWS.PNG') }}" width="90" alt="">
        </div>
        {{-- <div class="sidebar-brand-text mx-3"><sup>RSUD AW Sjahranie</sup></div> --}}
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ request()->is('home') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('home') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">


    {{-- @if (auth()->user()->admin == 1)
    <!-- Heading -->
    <div class="sidebar-heading">
        DATA MASTER
    </div>
        <li class="nav-item {{ request()->is('catkamar') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('catkamar.index') }}">
                <i class="fas fa-landmark"></i>
                <span>Kamar</span></a>
        </li>
        <li class="nav-item {{ request()->is('kelas') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('kelas.index') }}">
                <i class="fas fa-landmark"></i>
                <span>Kelas</span></a>
        </li>
    @endif --}}
    <div class="sidebar-heading">
        Manajemen Kamar
    </div>
    <li class="nav-item @yield('UpdateKamar')">
        <a class="nav-link" href="{{ route('kamar.index') }}">
            <i class="fas fa-bed"></i>
            <span>Update Kamar</span></a>
    </li>

    @if (auth()->user()->admin == 1)
        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item @yield('DataMasterNav')">
                <a class="   nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOne"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-landmark"></i>

            <span>Data Master</span>
            </a>
            <div id="collapseOne" class="collapse @yield('DataMaster')" aria-labelledby="headingTwo"
                data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    {{-- <h6 class="collapse-header">Manajemen User:</h6> --}}
                    <a class="collapse-item @yield('CatKamar')" href="{{ route('catkamar.index') }}">
                        <span>Kamar</span></a>
                    <a class="collapse-item @yield('Kelas')" href="{{ route('kelas.index') }}">
                        <span>Kelas</span></a>
                    {{-- <a class="collapse-item" href="{{ route('user.index') }}">Kelola User</a> --}}
                </div>
            </div>
        </li>
    @endif

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item @yield('DataUserNav')">
                <a class="   nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
        aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-users"></i>
        <span>Users</span>
        </a>
        <div id="collapseTwo" class="collapse @yield('DataUser')" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Manajemen User:</h6>
                <a class="collapse-item @yield('Profile')" href="{{ route('profile.edit') }}">Profile</a>
                @if (auth()->user()->admin == 1)
                    <a class="collapse-item @yield('ManageUser')" href="{{ route('user.index') }}">Kelola User</a>
                @endif
            </div>
        </div>
    </li>
    @if (auth()->user()->admin == 1)

    <div class="sidebar-heading">
        Monitoring
    </div>
    <li class="nav-item @yield('Logs')">
        <a class="nav-link" href="{{ route('logs.index') }}">
            <i class="fas fa-history"></i>
            <span>Logs Activity User</span></a>
    </li>
@endif

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>


</ul>
