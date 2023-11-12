<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Tandur <sup>Tm</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">
    @if (Auth::user()->type == 'admin')
        {
        <!-- Nav Item - Dashboard -->
        <li class="nav-item {{ request()->is('dashboard') ? 'active' : '' }}">
            <a class="nav-link" href="dashboard/">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <!-- Nav Item - Tanaman (Admin) -->
        <li class="nav-item {{ request()->is('admin/tanamans') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('tanamans.index') }}">
                <i class="fas fa-fw fa-leaf"></i>
                <span>Tanaman (Admin)</span>
            </a>
        </li>
        <li class="nav-item {{ request()->is('profile') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('profile') }}">
                <i class="fas fa-fw fa-user"></i>
                <span>Profile</span>
            </a>
        </li>
        }
    @elseif(Auth::user()->type == 'supplier')
        {
        <!-- Nav Item - Dashboard -->
        <li class="nav-item {{ request()->is('dashboard') ? 'active' : '' }}">
            <a class="nav-link" href="dashboard/">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <!-- Nav Item - Tanaman (supplier) -->
        <li class="nav-item {{ request()->is('supplier/tanaman') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('tanamans.index') }}">
                <i class="fas fa-fw fa-leaf"></i>
                <span>Tanaman (supplier)</span>
            </a>
        </li>
        <li class="nav-item {{ request()->is('profile') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('profile') }}">
                <i class="fas fa-fw fa-user"></i>
                <span>Profile</span>
            </a>
        </li>
        }
    @else
        <!-- Nav Item - Dashboard -->
        <li class="nav-item {{ request()->is('dashboard') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('dashboard') }}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseData"
                aria-expanded="true" aria-controls="collapseData">
                <i class="fas fa-fw fa-leaf"></i>
                <span>Data Pertanian</span>
            </a>
            <div id="collapseData" class="collapse" aria-labelledby="headingData" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Data Pertanian<h6>
                            <a class="collapse-item" href="{{ route('tanamens') }}">Tanaman</a>
                            <a class="collapse-item" href="{{ route('bibits') }}">Bibit</a>
                            <a class="collapse-item" href="{{ route('pupuks') }}">Pupuk</a>
                            <a class="collapse-item" href="{{ route('alats') }}">Alat Pertanian</a>
                </div>
            </div>
        </li>
        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Karyawan
        </div>

        <!-- Nav Item - Karyawan  (User) -->
        <li class="nav-item {{ request()->is('user/users') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('users') }}">
                <i class="fas fa-fw fa-leaf"></i>
                <span>Karyawan</span>
            </a>
        </li>
        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Interface
        </div>

        <li class="nav-item {{ request()->is('profile') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('profile') }}">
                <i class="fas fa-fw fa-user"></i>
                <span>Profile</span>
            </a>
        </li>
    @endif
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
