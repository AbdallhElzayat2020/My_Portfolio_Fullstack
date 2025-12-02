<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="{{ route(auth()->user()->isAdmin() || auth()->user()->hasPermission(1) ? 'dashboard' : 'welcome') }}"
            class="app-brand-link">
            <img src="{{ asset('assets/frontend/images/logo_main.png') }}" alt="Logo" width="100">
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
                <a href="{{ route('dashboard') }}" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-smart-home"></i>
                    <div data-i18n="Home">Home</div>
                </a>
            </li>
        @else
            <li class="menu-item {{ \App\Helpers\setSidebarActive(['welcome'], 'active open') }}">
                <a href="{{ route('welcome') }}" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-hand-stop"></i>
                    <div data-i18n="Welcome">مرحباً</div>
                </a>
            </li>
        @endif

        @if (auth()->user()->isAdmin() || auth()->user()->hasPermission(2))
            <li class="menu-item {{ \App\Helpers\setSidebarActive(['categories.*'], 'active open') }}">
                <a href="{{ route('categories.index') }}" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-smart-home"></i>
                    <div data-i18n="Categories">Categories</div>
                </a>
            </li>
        @endif

        @if (auth()->user()->isAdmin() || auth()->user()->hasPermission(3))
            <li class="menu-item {{ \App\Helpers\setSidebarActive(['partners.*'], 'active open') }}">
                <a href="{{ route('partners.index') }}" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-smart-home"></i>
                    <div data-i18n="Partners">Partners</div>
                </a>
            </li>
        @endif

        @if (auth()->user()->isAdmin() || auth()->user()->hasPermission(4))
            <li class="menu-item {{ \App\Helpers\setSidebarActive(['faqs.*'], 'active open') }}">
                <a href="{{ route('faqs.index') }}" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-smart-home"></i>
                    <div data-i18n="FAQs">FAQs</div>
                </a>
            </li>
        @endif

        @if (auth()->user()->isAdmin() || auth()->user()->hasPermission(5))
            <li class="menu-item {{ \App\Helpers\setSidebarActive(['achievements.*'], 'active open') }}">
                <a href="{{ route('achievements.index') }}" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-smart-home"></i>
                    <div data-i18n="Achievements">Achievements</div>
                </a>
            </li>
        @endif

        @if (auth()->user()->isAdmin() || auth()->user()->hasPermission(6))
            <li class="menu-item {{ \App\Helpers\setSidebarActive(['testimonials.*'], 'active open') }}">
                <a href="{{ route('testimonials.index') }}" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-smart-home"></i>
                    <div data-i18n="Clients Reviews">Clients Reviews</div>
                </a>
            </li>
        @endif

        @if (auth()->user()->isAdmin() || auth()->user()->hasPermission(7))
            <li class="menu-item {{ \App\Helpers\setSidebarActive(['industrials.*'], 'active open') }}">
                <a href="{{ route('industrials.index') }}" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-smart-home"></i>
                    <div data-i18n="Industrials">Industrials</div>
                </a>
            </li>
        @endif

        @if (auth()->user()->isAdmin() || auth()->user()->hasPermission(8))
            <li class="menu-item {{ \App\Helpers\setSidebarActive(['blogs.*'], 'active open') }}">
                <a href="{{ route('blogs.index') }}" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-smart-home"></i>
                    <div data-i18n="Blogs">Blogs</div>
                </a>
            </li>
        @endif

        @if (auth()->user()->isAdmin() || auth()->user()->hasPermission(9))
            <li class="menu-item {{ \App\Helpers\setSidebarActive(['services.*'], 'active open') }}">
                <a href="{{ route('services.index') }}" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-smart-home"></i>
                    <div data-i18n="Services">Services</div>
                </a>
            </li>
        @endif

        @if (auth()->user()->isAdmin() || auth()->user()->hasPermission(10))
            <li class="menu-item {{ \App\Helpers\setSidebarActive(['technologies.*'], 'active open') }}">
                <a href="{{ route('technologies.index') }}" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-smart-home"></i>
                    <div data-i18n="Technologies">Technologies</div>
                </a>
            </li>
        @endif

        @if (auth()->user()->isAdmin() || auth()->user()->hasPermission(11))
            <li class="menu-item {{ \App\Helpers\setSidebarActive(['projects.*'], 'active open') }}">
                <a href="{{ route('projects.index') }}" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-smart-home"></i>
                    <div data-i18n="Projects">Projects</div>
                </a>
            </li>
        @endif

        @if (auth()->user()->isAdmin() || auth()->user()->hasPermission(12))
            <li class="menu-item {{ \App\Helpers\setSidebarActive(['contacts.*'], 'active open') }}">
                <a href="{{ route('contacts.index') }}" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-smart-home"></i>
                    <div data-i18n="Contacts">Contacts</div>
                </a>
            </li>
        @endif

        @if (auth()->user()->isAdmin() || auth()->user()->hasPermission(13))
            <li class="menu-item {{ \App\Helpers\setSidebarActive(['get-quotes.*'], 'active open') }}">
                <a href="{{ route('get-quotes.index') }}" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-calculator"></i>
                    <div data-i18n="Get Quotes">طلبات السعر</div>
                </a>
            </li>
        @endif

        @if (auth()->user()->isAdmin() || auth()->user()->hasPermission(14))
            <li class="menu-item {{ \App\Helpers\setSidebarActive(['main-steps.*'], 'active open') }}">
                <a href="{{ route('main-steps.index') }}" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-smart-home"></i>
                    <div data-i18n="Main Steps">Main Steps</div>
                </a>
            </li>
        @endif

        <!-- Products Menu with Dropdown -->
        @if (auth()->user()->isAdmin() || auth()->user()->hasPermission(15) || auth()->user()->hasPermission(16))
            <li
                class="menu-item {{ \App\Helpers\setSidebarActive(['product-categories.*', 'products.*'], 'active open') }}">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons ti ti-shopping-cart"></i>
                    <div data-i18n="Store Management">Store Management</div>
                </a>
                <ul class="menu-sub">
                    @if (auth()->user()->isAdmin() || auth()->user()->hasPermission(15))
                        <li class="menu-item {{ \App\Helpers\setSidebarActive(['product-categories.*'], 'active') }}">
                            <a href="{{ route('product-categories.index') }}" class="menu-link">
                                <div data-i18n="Product Categories">Product Categories</div>
                            </a>
                        </li>
                    @endif
                    @if (auth()->user()->isAdmin() || auth()->user()->hasPermission(16))
                        <li class="menu-item {{ \App\Helpers\setSidebarActive(['products.*'], 'active') }}">
                            <a href="{{ route('products.index') }}" class="menu-link">
                                <div data-i18n="Products">Products</div>
                            </a>
                        </li>
                    @endif
                </ul>
            </li>
        @endif

        <!-- Roles & Users Menu with Dropdown -->
        @if (auth()->user()->isAdmin())
            <li class="menu-item {{ \App\Helpers\setSidebarActive(['roles.*', 'users.*'], 'active open') }}">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons ti ti-shield-lock"></i>
                    <div data-i18n="Roles & Users">Roles & Users</div>
                </a>
                <ul class="menu-sub">
                    @if (auth()->user()->isAdmin() || auth()->user()->hasPermission(18))
                        <li class="menu-item {{ \App\Helpers\setSidebarActive(['roles.*'], 'active') }}">
                            <a href="{{ route('roles.index') }}" class="menu-link">
                                <div data-i18n="Roles">Roles</div>
                            </a>
                        </li>
                    @endif
                    @if (auth()->user()->isAdmin() || auth()->user()->hasPermission(19))
                        <li class="menu-item {{ \App\Helpers\setSidebarActive(['users.*'], 'active') }}">
                            <a href="{{ route('users.index') }}" class="menu-link">
                                <div data-i18n="Users">Users</div>
                            </a>
                        </li>
                    @endif
                </ul>
            </li>
        @endif

        @if (auth()->user()->isAdmin() || auth()->user()->hasPermission(17))
            <li class="menu-item {{ \App\Helpers\setSidebarActive(['settings.*'], 'active open') }}">
                <a href="{{ route('settings.index') }}" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-settings"></i>
                    <div data-i18n="Settings">Settings</div>
                </a>
            </li>
        @endif

    </ul>
</aside>
