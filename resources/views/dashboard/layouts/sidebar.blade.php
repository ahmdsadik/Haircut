<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="{{ route('dashboard.index') }}" class="app-brand-link">
              <span class="app-brand-logo demo">
                <img width="40px" height="40px" src="{{ \App\Models\Setting::getImage('logo') ?? asset('assets/default/s.svg') }}" alt="logo">
              </span>
            <span class="app-brand-text demo menu-text fw-bolder ms-2">{{ \App\Models\Setting::getByKey('website-title','title') }}</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboard -->
        <li @class(['menu-item','active' => request()->routeIs('dashboard.index')])  >
            <a href="{{ route('dashboard.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
            </a>
        </li>


        <li @class(['menu-item'])  >
            <a href="{{ route('home') }}" target="_blank" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-heart "></i>
                <div data-i18n="Analytics">Website</div>
            </a>
        </li>

        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Pages</span>
        </li>

        <!-- Cards -->
        <li @class(['menu-item','active' => request()->routeIs('dashboard.specializations.index') || request()->routeIs('dashboard.specializations.create') ])>
            <a href="{{ route('dashboard.specializations.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-category bx-sm"></i>
                <div data-i18n="Basic">Specialization</div>
            </a>
        </li>

        <li @class(['menu-item','active' => request()->routeIs('dashboard.services.index') || request()->routeIs('dashboard.services.create')])>
            <a href="{{ route('dashboard.services.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-handicap bx-sm"></i>
                <div data-i18n="Basic">Services</div>
            </a>
        </li>

        <li @class(['menu-item','active' => request()->routeIs('dashboard.stylists.index') || request()->routeIs('dashboard.stylists.create')])>
            <a href="{{ route('dashboard.stylists.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-body bx-sm"></i>
                <div data-i18n="Basic">Stylists</div>
            </a>
        </li>

        <li @class(['menu-item','active' => request()->routeIs('dashboard.appointments.index') || request()->routeIs('dashboard.appointments.create')])>
            <a href="{{ route('dashboard.appointments.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-calendar bx-sm"></i>
                <div data-i18n="Basic">Appointments</div>
            </a>
        </li>


        <!-- Components -->
        <li class="menu-header small text-uppercase"><span class="menu-header-text">Settings</span></li>


        <li @class(['menu-item','active' => request()->routeIs('dashboard.working-hours.index') || request()->routeIs('dashboard.working-hours.create')])>
            <a href="{{ route('dashboard.working-hours.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-hourglass bx-sm"></i>
                <div data-i18n="Basic">Working Hours</div>
            </a>
        </li>

        <li @class(['menu-item','active' => request()->routeIs('dashboard.settings.index') || request()->routeIs('dashboard.settings.create')])>
            <a href="{{ route('dashboard.settings.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-cog bx-sm"></i>
                <div data-i18n="Basic">Settings</div>
            </a>
        </li>
    </ul>
</aside>
