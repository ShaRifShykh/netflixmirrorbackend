<!-- Menu -->
<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo ">
        <a href="#" class="app-brand-link">
            <span class="app-brand-logo demo">
                <img src="{{ asset("assets/img/logo.png") }}" alt="Image Not Found!" width="50">
            </span>
            <span class="app-brand-text demo menu-text fw-bold ms-2 text-uppercase">Netflix</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboards -->
        <li class="menu-item{{ request()->routeIs("admin.dashboard") ? ' active' : null }}">
            <a href="{{ route("admin.dashboard") }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div class="text-truncate" data-i18n="Dashboard">Dashboard</div>
            </a>
        </li>

        <!-- Main Navigation -->
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Main Navigation</span>
        </li>

        <li class="menu-item{{ request()->routeIs("admin.movies.*") ? ' active open' : null }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon fa-solid fa-camera"></i>
                <div class="text-truncate" data-i18n="Movies">Movies</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item{{ request()->routeIs("admin.movies.index") ? ' active' : null }}">
                    <a href="{{ route("admin.movies.index") }}" class="menu-link">
                        <div class="text-truncate" data-i18n="All Movies">All Movies</div>
                    </a>
                </li>
                <li class="menu-item{{ request()->routeIs("admin.movies.add") ? ' active' : null }}">
                    <a href="{{ route("admin.movies.add") }}" class="menu-link">
                        <div class="text-truncate" data-i18n="Add Movie">Add Movie</div>
                    </a>
                </li>
            </ul>
        </li>

        <li class="menu-item{{ request()->routeIs("admin.series.*") ? ' active open' : null }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon fa-solid fa-film"></i>
                <div class="text-truncate" data-i18n="Series">Series</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item{{ request()->routeIs("admin.series.index") ? ' active' : null }}">
                    <a href="{{ route("admin.series.index") }}" class="menu-link">
                        <div class="text-truncate" data-i18n="All Series">All Series</div>
                    </a>
                </li>
                <li class="menu-item{{ request()->routeIs("admin.movies.add") ? ' active' : null }}">
                    <a href="{{ route("admin.series.add") }}" class="menu-link">
                        <div class="text-truncate" data-i18n="Add Series">Add Series</div>
                    </a>
                </li>
            </ul>
        </li>


        <li class="menu-item{{ request()->routeIs("admin.episodes.*") ? ' active open' : null }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon fa-solid fa-film"></i>
                <div class="text-truncate" data-i18n="Episodes">Episodes</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item{{ request()->routeIs("admin.episodes.index") ? ' active' : null }}">
                    <a href="{{ route("admin.episodes.index") }}" class="menu-link">
                        <div class="text-truncate" data-i18n="All Episodes">All Episodes</div>
                    </a>
                </li>
                <li class="menu-item{{ request()->routeIs("admin.episodes.add") ? ' active' : null }}">
                    <a href="{{ route("admin.episodes.add") }}" class="menu-link">
                        <div class="text-truncate" data-i18n="Add Episode">Add Episode</div>
                    </a>
                </li>
            </ul>
        </li>


    </ul>
</aside>
<!-- / Menu -->
