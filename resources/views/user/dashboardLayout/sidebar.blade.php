<div class="dashboard-sidebar">
    <button type="button" class="dashboard-sidebar__close d-lg-none d-flex"><i class="las la-times"></i></button>
    <div class="dashboard-sidebar__inner">
        
        <a href="{{ route('dashboard') }}" class="logo mb-48">
            <img src="{{ asset('assets/user/images/logo/logo.png') }}" alt="" class="white-version">
        </a>
        <a href="{{ route('dashboard') }}" class="logo logo_icon favicon mb-48">
            <img src="{{ asset('assets/user/images/thumbs/dashboard_sidebar_icon.png') }}" alt="">
        </a>

        <!-- Sidebar List Start -->
        <ul class="sidebar-list">
            <li class="sidebar-list__item">
                <a href="{{ route('dashboard') }}"
                    class="sidebar-list__link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                    <span class="sidebar-list__icon">
                        <i class="ti ti-device-heart-monitor"></i>
                    </span>
                    <span class="text">Dashboard</span>
                </a>
            </li>
            <li class="sidebar-list__item">
                <a href="{{ route('profile.user.edit', ['user' => $user->id]) }}"
                    class="sidebar-list__link {{ request()->routeIs('profile.user.edit', ['user' => $user->id]) ? 'active' : '' }}">
                    <span class="sidebar-list__icon">
                        <i class="ti ti-user"></i>
                    </span>
                    <span class="text">Profile</span>
                </a>
            </li>
            <li class="sidebar-list__item">
                <a href="#" class="sidebar-list__link">
                    <span class="sidebar-list__icon">
                        <i class="ti ti-settings"></i>
                    </span>
                    <span class="text">Settings</span>
                </a>
            </li>
            <li class="sidebar-list__item">
                <a href="dashboard-table.html" class="sidebar-list__link">
                    <span class="sidebar-list__icon">
                        <i class="ti ti-list-details"></i>
                    </span>
                    <span class="text">Table Design</span>
                </a>
            </li>
            <li class="sidebar-list__item">
                <a href="dashboard-form.html" class="sidebar-list__link">
                    <span class="sidebar-list__icon">
                        <i class="ti ti-list"></i>
                    </span>
                    <span class="text">Form Design</span>
                </a>
            </li>
            <li class="sidebar-list__item">
                <a href="#" class="sidebar-list__link"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit()">
                    <span class="sidebar-list__icon">
                        <i class="ti ti-logout"></i>
                    </span>
                    <span class="text">Logout</span>
                    <form id="logout-form" action="{{ route('logout') }}" method="post" class="hidden">
                        @csrf
                    </form>
                </a>
            </li>
        </ul>
        <!-- Sidebar List End -->

    </div>
</div>
