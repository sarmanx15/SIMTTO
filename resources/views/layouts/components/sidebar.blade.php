<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

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

    <!-- Heading -->
    <div class="sidebar-heading">
        Manajemen Bed
    </div>
    @if (auth()->user()->admin == 1)
        <li class="nav-item {{ request()->is('kelas') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('kelas.index') }}">
                <i class="fas fa-landmark"></i>
                <span>Kelas</span></a>
        </li>
    @endif
    <li class="nav-item {{ request()->is('kamar') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('kamar.index') }}">
            <i class="fas fa-bed"></i>
            <span>Kamar</span></a>
    </li>


    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item {{ request()->is('posts') ? 'active' : '' }}"">
                <a class=" nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
        aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-users"></i>
        <span>Users</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Manajemen User:</h6>
                <a class="collapse-item" href="{{ route('profile.edit') }}">Profile</a>
                @if (auth()->user()->admin == 1)
                    <a class="collapse-item" href="{{ route('user.index') }}">Kelola User</a>
                @endif
            </div>
        </div>
    </li>

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>


</ul>
