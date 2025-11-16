<div class="sidebar-wrapper sidebar-theme">
    <nav id="sidebar">
        <div class="navbar-nav theme-brand flex-row  text-center">
            <div class="nav-logo">
                <div class="nav-item theme-logo">
                    <a href="{{ route("dashboard.index") }}">
                        <img src="{{ asset("src/assets/img/mlvt_banner_logo.png") }}" alt="logo">
                    </a>
                </div>
            </div>
            <div class="nav-item sidebar-toggle">
                <div class="btn-toggle sidebarCollapse">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevrons-left"><polyline points="11 17 6 12 11 7"></polyline><polyline points="18 17 13 12 18 7"></polyline></svg>
                </div>
            </div>
        </div>
        <ul class="list-unstyled menu-categories" id="accordionExample">
            <li class="menu {{ Route::currentRouteName() == 'dashboard.index' ? 'active' : '' }}">
                <a href="{{ route("dashboard.index") }}" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <i data-lucide="home"></i>
                        <span>{{ __("menus.sidebar.home") }}</span>
                    </div>
                </a>
            </li>
            {!! $sideMenus['sidemenus'] !!}
            @if (session('is_admin') == '2')
            <li class="menu menu-heading">
                <div class="heading"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minus"><line x1="5" y1="12" x2="19" y2="12"></line></svg><span>{{ __("menus.sidebar.role.setting") }}</span></div>
            </li>
            <li class="menu {{ Request::routeIs('modules.*') ? 'active' : '' }}">
                <a href="{{ route("modules.index") }}" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <i data-lucide="folder"></i>
                        <span>{{ __("menus.sidebar.role.modules") }}</span>
                    </div>
                </a>
            </li>
            <li class="menu {{ Request::routeIs('setups.pages.*') ? 'active' : '' }}">
                <a href="{{ route("setups.pages.index") }}" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <i data-lucide="files"></i>
                        <span>{{ __("menus.sidebar.role.pages") }}</span>
                    </div>
                </a>
            </li>
            <li class="menu {{ Request::routeIs('setups.roles.*') ? 'active' : '' }}">
                <a href="{{ route("setups.roles.index") }}" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <i data-lucide="shield"></i>
                        <span>{{ __("menus.sidebar.role.permission") }}</span>
                    </div>
                </a>
            </li>
            <li class="menu {{ Request::routeIs('setups.users.*') ? 'active' : '' }}">
                <a href="{{ route("setups.users.index") }}" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <i data-lucide="user"></i>
                        <span>{{ __("menus.sidebar.role.user") }}</span>
                    </div>
                </a>
            </li>
            @endif
        </ul>
    </nav>
</div>
