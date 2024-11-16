<aside class="left-sidebar with-vertical">
    <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
            <a href="./main/index.html" class="text-nowrap logo-img">
                <span class="fw-semibold fs-7 align-middle bg-primary rounded-circle text-white px-2" style="width: 100px; height: 100px;">A</span><span class="fw-semibold mx-2 fs-7 align-middle">bsensi</span>
            </a>
            <a href="javascript:void(0)" class="sidebartoggler ms-auto text-decoration-none fs-5 d-block d-xl-none">
                <i class="ti ti-x"></i>
            </a>
        </div>


        <nav class="sidebar-nav scroll-sidebar" data-simplebar>
            <ul id="sidebarnav">
                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">Home</span>
                </li>
                <li class="sidebar-item {{ Request::routeIs('dashboard.index') ? 'active' : '' }}">
                    <a class="sidebar-link {{ Request::routeIs('dashboard.index') ? 'active' : '' }}" href="{{ route('dashboard.index') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-layout-grid"></i>
                        </span>
                        <span class="hide-menu">Dashboard</span>
                    </a>
                </li>
                
                <li class="sidebar-item {{ Request::routeIs('admin.index') ? 'active' : '' }}">
                    <a class="sidebar-link {{ Request::routeIs('admin.index') ? 'active' : '' }}" href="{{ route('admin.index') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-user-circle"></i>
                        </span>
                        <span class="hide-menu">Admin</span>
                    </a>
                </li>

                <li class="sidebar-item {{ Request::routeIs('employee.index') ? 'active' : '' }}">
                    <a class="sidebar-link {{ Request::routeIs('employee.index') ? 'active' : '' }}" href="{{ route('employee.index') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-user-circle"></i>
                        </span>
                        <span class="hide-menu">Karyawan</span>
                    </a>
                </li>
                
                <li class="sidebar-item {{ Request::routeIs('slip_gaji.index') ? 'active' : '' }}">
                    <a class="sidebar-link {{ Request::routeIs('slip_gaji.index') ? 'active' : '' }}" href="{{ route('slip_gaji.index') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-report-money"></i>
                        </span>
                        <span class="hide-menu">Slip Gaji</span>
                    </a>
                </li>

                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">Master</span>
                </li>
                <li class="sidebar-item {{ Request::routeIs('work.index') ? 'active' : '' }}">
                    <a class="sidebar-link {{ Request::routeIs('work.index') ? 'active' : '' }}" href="{{ route('work.index') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-layout-grid"></i>
                        </span>
                        <span class="hide-menu">Hari Kerja</span>
                    </a>
                </li>
            </ul>
        </nav>

    </div>
</aside>