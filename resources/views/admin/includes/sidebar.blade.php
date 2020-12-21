<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('admin.dashboard') }}" class="brand-link">
        <img src="{{ asset('assets/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">{{ env('APP_NAME') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('assets/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ Auth::user()->name }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->

                <!-- Dashboard Link -->
                <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link">
                        <i class="fas fa-bars nav-icon"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                @if(Auth::user()->hasPermission('read-user'))
                    <!-- User Link -->
                        <li class="nav-item">
                            <a href="{{ route('admin.user.index') }}" class="nav-link">
                                <i class="fas fa-users nav-icon"></i>
                                <p>Users</p>
                            </a>
                        </li>
                @endif

                @if(Auth::user()->hasPermission('read-hospital'))
                    <!-- Hospital Link -->
                    <li class="nav-item">
                        <a href="{{ route('admin.hospital.index') }}" class="nav-link">
                            <i class="fas fa-hospital nav-icon"></i>
                            <p>Hospital [ Branches ]</p>
                        </a>
                    </li>
                @endif

                @if(Auth::user()->hasPermission('read-department'))
                    <!-- Departments Link -->
                        <li class="nav-item">
                            <a href="{{ route('admin.department.index') }}" class="nav-link">
                                <i class="fas fa-list nav-icon"></i>
                                <p>Departments</p>
                            </a>
                        </li>
                @endif

                @if(Auth::user()->hasPermission('read-doctor'))
                    <!-- Doctor Link -->
                        <li class="nav-item">
                            <a href="{{ route('admin.doctor.index') }}" class="nav-link">
                                <i class="fas fa-user-md nav-icon"></i>
                                <p>Doctors</p>
                            </a>
                        </li>
                @endif

                @if(Auth::user()->hasPermission('read-patient'))
                    <!-- Patient Link -->
                    <li class="nav-item">
                        <a href="{{ route('admin.patient.index') }}" class="nav-link">
                            <i class="fas fa-user-injured nav-icon"></i>
                            <p>Patients</p>
                        </a>
                    </li>
                @endif

                @if(Auth::user()->hasPermission('read-medicalFile'))
                    <!-- Medical File Link -->
                    <li class="nav-item">
                        <a href="{{ route('admin.medicalFile.index') }}" class="nav-link">
                            <i class="fas fa-file-medical-alt nav-icon"></i>
                            <p>Medical Files</p>
                        </a>
                    </li>
                @endif

                @if(Auth::user()->hasPermission('read-ticket'))
                     <!-- Tickets Link -->
                    <li class="nav-item">
                        <a href="{{ route('admin.ticket.index') }}" class="nav-link">
                            <i class="fas fa-ticket-alt nav-icon"></i>
                            <p>Tickets</p>
                        </a>
                    </li>
                @endif

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
