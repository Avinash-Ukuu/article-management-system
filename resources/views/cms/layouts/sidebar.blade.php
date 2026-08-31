<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="{{ asset('assets/adminlte/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">AMS</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                @if (!empty(auth()->user()->profile_pic) && file_exists('uploads/users/' . auth()->user()->profile_pic))
                    <img height="30px" src="{{ asset('uploads/users/' . auth()->user()->profile_pic) }}"
                        class="img-circle elevation-2" alt="User Image">
                @else
                    <img height="30px" src="{{ asset('assets/adminlte/dist/img/user2-160x160.jpg') }}"
                        class="img-circle elevation-2" alt="User Image">
                @endif
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ auth()->user()->name ?? '' }}</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                    aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">

                <li class="nav-item">
                    <a href="{{ route('cms.dashboard') }}"
                        class="nav-link @if (Route::currentRouteName() == 'cms.dashboard') active @endif">
                        <i class="far fa-dot-circle nav-icon"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                @can('admin', new App\Models\User())
                    <li class="nav-item @if (in_array(Route::currentRouteName(), [
                            'cms.user.index',
                            'cms.role.index',
                            'cms.module.index',
                            'cms.permission.index',
                        ])) menu-open @endif">
                        <a href="#" class="nav-link  @if (in_array(Route::currentRouteName(), [
                                'cms.user.index',
                                'cms.role.index',
                                'cms.module.index',
                                'cms.permission.index',
                            ])) active @endif">
                            <i class="nav-icon fas fa-users"></i>
                            <p> User Management <i class="right fas fa-angle-left"></i></p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('cms.user.index') }}"
                                    class="nav-link @if (Route::currentRouteName() == 'cms.user.index') active @endif">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Users</p>
                                </a>
                            </li>
                            @can('superAdmin', new App\Models\User())
                                <li class="nav-item">
                                    <a href="{{ route('cms.role.index') }}"
                                        class="nav-link @if (Route::currentRouteName() == 'cms.role.index') active @endif">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Roles</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('cms.permission.index') }}"
                                        class="nav-link @if (Route::currentRouteName() == 'cms.permission.index') active @endif">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Permissions</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('cms.module.index') }}"
                                        class="nav-link @if (Route::currentRouteName() == 'cms.module.index') active @endif">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Modules</p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                <li class="nav-item">
                    <a href="{{ route('cms.categories.index') }}"
                        class="nav-link @if (Route::currentRouteName() == 'cms.categories.index') active @endif">
                        <i class="far fa-dot-circle nav-icon"></i>
                        <p>Categories</p>
                    </a>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
