<div class="app-sidebar sidebar-shadow">
    <div class="app-header__logo">
        <div class="logo-src"></div>
        <div class="header__pane ml-auto">
            <div>
                <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                                    <span class="hamburger-box">
                                        <span class="hamburger-inner"></span>
                                    </span>
                </button>
            </div>
        </div>
    </div>
    <div class="app-header__mobile-menu">
        <div>
            <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                                <span class="hamburger-box">
                                    <span class="hamburger-inner"></span>
                                </span>
            </button>
        </div>
    </div>
    <div class="app-header__menu">
                        <span>
                            <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                                <span class="btn-icon-wrapper">
                                    <i class="fa fa-ellipsis-v fa-w-6"></i>
                                </span>
                            </button>
                        </span>
    </div>    <div class="scrollbar-sidebar">
        <div class="app-sidebar__inner">
            <ul class="vertical-nav-menu">
                <li class="app-sidebar__heading">Dashboards</li>
                <li>
                    <a href="{{url('/admin')}}" class="@yield('home-active')">
                        <i class="metismenu-icon pe-7s-display2"></i>
                        Dashboard Example 1
                    </a>
                </li>
            </ul>
            <ul class="vertical-nav-menu">
                <li class="app-sidebar__heading">Admin Management</li>
                <li>
                    <a href="{{route('admin.admin-user.index')}}" class="@yield('admin-user-active')">
                        <i class="metismenu-icon pe-7s-users"></i>
                        <span class="text-capitalize">Admin List</span>
                    </a>
                    <a href="{{route('admin.admin-user.create')}}" class="@yield('admin-user-create-active')">
                        <i class="metismenu-icon pe-7s-add-user"></i>
                        <span class="text-capitalize">Add new Admin</span>
                    </a>
                </li>
            </ul>
            <ul class="vertical-nav-menu">
                <li class="app-sidebar__heading">User Management</li>
                <li>
                    <a href="{{route('admin.user.index')}}" class="@yield('user-active')">
                        <i class="metismenu-icon pe-7s-users"></i>
                        <span class="text-capitalize">User List</span>
                    </a>
                    <a href="{{route('admin.user.create')}}" class="@yield('user-create-active')">
                        <i class="metismenu-icon pe-7s-add-user"></i>
                        <span class="text-capitalize">Add new User</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
