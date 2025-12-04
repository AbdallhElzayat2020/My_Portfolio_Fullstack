<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="{{ route(auth()->user()->isAdmin() || auth()->user()->hasPermission(1) ? 'dashboard.home' : 'welcome') }}"
            class="app-brand-link fs-4">
            Abdullah
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
            <i class="ti menu-toggle-icon d-none d-xl-block ti-sm align-middle"></i>
            <i class="ti ti-x d-block d-xl-none ti-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">

        @if (auth()->user()->isAdmin() || auth()->user()->hasPermission(1))
            <li class="menu-item {{ \App\Helpers\setSidebarActive(['dashboard'], 'active open') }}">
                <a href="{{ route('dashboard.home') }}" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-smart-home"></i>
                    <div data-i18n="Home">Home</div>
                </a>
            </li>
        @endif

        @if (auth()->user()->isAdmin() || auth()->user()->hasPermission(2))
            <li class="menu-item {{ \App\Helpers\setSidebarActive(['categories.*'], 'active open') }}">
                <a href="{{ route('categories.index') }}" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-category"></i>
                    <div data-i18n="Categories">Categories</div>
                </a>
            </li>
        @endif

        @if (auth()->user()->isAdmin() || auth()->user()->hasPermission(8))
            <li class="menu-item {{ \App\Helpers\setSidebarActive(['blogs.*'], 'active open') }}">
                <a href="{{ route('blogs.index') }}" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-news"></i>
                    <div data-i18n="Blogs">Blogs</div>
                </a>
            </li>
        @endif

        @if (auth()->user()->isAdmin() || auth()->user()->hasPermission(9))
            <li class="menu-item {{ \App\Helpers\setSidebarActive(['services.*'], 'active open') }}">
                <a href="{{ route('services.index') }}" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-briefcase"></i>
                    <div data-i18n="Services">Services</div>
                </a>
            </li>
        @endif

        @if (auth()->user()->isAdmin() || auth()->user()->hasPermission(11))
            <li class="menu-item {{ \App\Helpers\setSidebarActive(['projects.*'], 'active open') }}">
                <a href="{{ route('projects.index') }}" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-layout-kanban"></i>
                    <div data-i18n="Projects">Projects</div>
                </a>
            </li>
        @endif

        @if (auth()->user()->isAdmin() || auth()->user()->hasPermission(12))
            <li class="menu-item {{ \App\Helpers\setSidebarActive(['contacts.*'], 'active open') }}">
                <a href="{{ route('contacts.index') }}" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-mail"></i>
                    <div data-i18n="Contacts">Contacts</div>
                </a>
            </li>
        @endif

        @if (auth()->user()->isAdmin() || auth()->user()->hasPermission(6))
            <li class="menu-item {{ \App\Helpers\setSidebarActive(['testimonials.*'], 'active open') }}">
                <a href="{{ route('testimonials.index') }}" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-messages"></i>
                    <div data-i18n="Testimonials">Testimonials</div>
                </a>
            </li>
        @endif

        @if (auth()->user()->isAdmin())
            <li class="menu-item {{ \App\Helpers\setSidebarActive(['brands.*'], 'active open') }}">
                <a href="{{ route('brands.index') }}" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-building-store"></i>
                    <div data-i18n="Brands">Brands</div>
                </a>
            </li>
        @endif

        @if (auth()->user()->isAdmin() || auth()->user()->hasPermission(4))
            <li class="menu-item {{ \App\Helpers\setSidebarActive(['faqs.*'], 'active open') }}">
                <a href="{{ route('faqs.index') }}" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-help"></i>
                    <div data-i18n="FAQs">FAQs</div>
                </a>
            </li>
        @endif

        @if (auth()->user()->isAdmin())
            <li class="menu-item {{ \App\Helpers\setSidebarActive(['technologies.*'], 'active open') }}">
                <a href="{{ route('technologies.index') }}" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-cpu"></i>
                    <div data-i18n="Technologies">Technologies</div>
                </a>
            </li>
        @endif

        @if (auth()->user()->isAdmin() || auth()->user()->hasPermission(5))
            <li class="menu-item {{ \App\Helpers\setSidebarActive(['abouts.*'], 'active open') }}">
                <a href="{{ route('abouts.index') }}" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-user"></i>
                    <div data-i18n="About">About</div>
                </a>
            </li>
        @endif

        @if (auth()->user()->isAdmin() || auth()->user()->hasPermission(14))
            <li class="menu-item {{ \App\Helpers\setSidebarActive(['main-steps.*'], 'active open') }}">
                <a href="{{ route('main-steps.index') }}" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-numbers"></i>
                    <div data-i18n="Numbers">Numbers / Statistics</div>
                </a>
            </li>
        @endif

        <!-- Roles & Users Menu with Dropdown -->
        @if (auth()->user()->isAdmin() || auth()->user()->hasPermission(18) || auth()->user()->hasPermission(19))
            <li class="menu-item {{ \App\Helpers\setSidebarActive(['roles.*', 'users.*'], 'active open') }}">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons ti ti-shield-lock"></i>
                    <div data-i18n="Roles & Users">Roles & Users</div>
                </a>
                <ul class="menu-sub">
                    @if (auth()->user()->isAdmin() || auth()->user()->hasPermission(18))
                        <li class="menu-item {{ \App\Helpers\setSidebarActive(['roles.*'], 'active') }}">
                            <a href="{{ route('roles.index') }}" class="menu-link">
                                <i class="menu-icon tf-icons ti ti-shield"></i>
                                <div data-i18n="Roles">Roles</div>
                            </a>
                        </li>
                    @endif
                    @if (auth()->user()->isAdmin() || auth()->user()->hasPermission(19))
                        <li class="menu-item {{ \App\Helpers\setSidebarActive(['users.*'], 'active') }}">
                            <a href="{{ route('users.index') }}" class="menu-link">
                                <i class="menu-icon tf-icons ti ti-users"></i>
                                <div data-i18n="Users">Users</div>
                            </a>
                        </li>
                    @endif
                </ul>
            </li>
        @endif

    </ul>
</aside>