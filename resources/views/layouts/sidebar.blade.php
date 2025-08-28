<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
    <div class="sidebar-brand">
        <a href="{{ route('dashboard') }}" class="brand-link">
            @if ($about->logo && \Storage::disk('public')->exists($about->logo))
                <img src="{{ asset('storage/' . $about->logo) }}" alt="logo" loading="lazy" class="brand-image opacity-75 shadow">
            @else
                {{-- fallback: no logo uploaded --}}
                <img src="{{ asset('images/default-logo.png') }}" alt="logo" width="120" loading="lazy" class="brand-image opacity-75 shadow">
            @endif
            <span class="brand-text fw-light">Pamir Tiling</span>
        </a>
    </div>

    <div class="sidebar-wrapper">
        <nav class="mt-2">
            <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="navigation"
                aria-label="Main navigation" data-accordion="false" id="navigation">

                {{-- Dashboard --}}
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}"
                        class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-palette"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                {{-- Contacts --}}
                @php
                    $contactsOpen = request()->routeIs('contact.*') || request()->routeIs('contacts.*'); // support either naming
                @endphp
                <li class="nav-item {{ $contactsOpen ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ $contactsOpen ? 'active' : '' }}">
                        <i class="nav-icon bi-envelope"></i>
                        <p>
                            Contacts
                            <span class="nav-badge badge text-bg-secondary me-3" id="ContactCountBadge"></span>
                            <i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('contact.index') }}"
                                class="nav-link {{ request()->routeIs('contact.index') ? 'active' : '' }}">
                                <i class="nav-icon bi bi-list-task"></i>
                                <p>List</p>
                            </a>
                        </li>
                    </ul>
                </li>

                {{-- Services --}}
                @php
                    $servicesOpen = request()->routeIs('services.*') || request()->routeIs('service.*');
                @endphp
                <li class="nav-item {{ $servicesOpen ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ $servicesOpen ? 'active' : '' }}">
                        <i class="nav-icon bi bi-tools"></i>
                        <p>
                            Services
                            <span class="nav-badge badge text-bg-secondary me-3" id="ServiceCountBadge"></span>
                            <i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('services.index') }}"
                                class="nav-link {{ request()->routeIs('services.index') ? 'active' : '' }}">
                                <i class="nav-icon bi bi-list-task"></i>
                                <p>List</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('services.create') }}"
                                class="nav-link {{ request()->routeIs('services.create') ? 'active' : '' }}">
                                <i class="nav-icon bi bi-plus-circle"></i>
                                <p>Create Services</p>
                            </a>
                        </li>
                    </ul>
                </li>

                {{-- Projects --}}
                @php
                    $projectsOpen = request()->routeIs('projects.*') || request()->routeIs('project.*');
                @endphp
                <li class="nav-item {{ $projectsOpen ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ $projectsOpen ? 'active' : '' }}">
                        <i class="nav-icon bi bi-collection"></i>
                        <p>
                            Projects
                            <span class="nav-badge badge text-bg-secondary me-3" id="ProjectCountBadge"></span>
                            <i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('projects.index') }}"
                                class="nav-link {{ request()->routeIs('projects.index') ? 'active' : '' }}">
                                <i class="nav-icon bi bi-list-task"></i>
                                <p>List</p>
                            </a>
                        </li>
                        @if (Route::has('projects.create'))
                            <li class="nav-item">
                                <a href="{{ route('projects.create') }}"
                                    class="nav-link {{ request()->routeIs('projects.create') ? 'active' : '' }}">
                                    <i class="nav-icon bi-plus-circle"></i>
                                    <p>Create</p>
                                </a>
                            </li>
                        @endif
                    </ul>
                </li>

                {{-- Our Team --}}
                @php
                    $projectsOpen = request()->routeIs('our-team.*') || request()->routeIs('project.*');
                @endphp
                <li class="nav-item {{ $projectsOpen ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ $projectsOpen ? 'active' : '' }}">
                        <i class="nav-icon bi bi-collection"></i>
                        <p>
                            Our Team
                            <i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('our-team.index') }}"
                                class="nav-link {{ request()->routeIs('our-team.index') ? 'active' : '' }}">
                                <i class="nav-icon bi bi-list-task"></i>
                                <p>List</p>
                            </a>
                        </li>
                        @if (Route::has('our-team.create'))
                            <li class="nav-item">
                                <a href="{{ route('our-team.create') }}"
                                    class="nav-link {{ request()->routeIs('our-team.create') ? 'active' : '' }}">
                                    <i class="nav-icon bi-plus-circle"></i>
                                    <p>Create</p>
                                </a>
                            </li>
                        @endif
                    </ul>
                </li>

                {{-- About --}}
                <li class="nav-item">
                    <a href="{{ route('about.index') }}"
                        class="nav-link {{ request()->routeIs('about.index') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-info-circle"></i>
                        <p>About</p>
                    </a>
                </li>

            </ul>
        </nav>
    </div>
</aside>
