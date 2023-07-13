<div class="app-sidebar sidebar-shadow">
    <div class="app-header__logo">
        <div class="logo-src"></div>
        <div class="header__pane ms-auto">
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
            <button type="button"
                    class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                <span class="btn-icon-wrapper">
                    <i class="fa fa-ellipsis-v fa-w-6"></i>
                </span>
            </button>
        </span>
    </div>
    <div class="scrollbar-sidebar">
        <div class="app-sidebar__inner">
            <ul class="vertical-nav-menu">
                <li class="app-sidebar__heading">Main</li>
                <li>
                    <a href="{{ route('dashboard') }}" @if(request()->routeIs('dashboard')) { class="mm-active" } @endif>
                        <i class="metismenu-icon pe-7s-rocket"></i>
                        {{ __('Dashboard') }}
                    </a>
                </li>
                @foreach(getMenus() as $menu)
                    <li>
                        <a href="{{ $menu->slug }}"
                           @if(!empty($menu->subMenus))
                               @foreach($menu->subMenus as $sub)
                                   @if(request()->segment(1) === $sub->slug)
                                   class="mm-active"
                                    @endif
                                @endforeach
                            @elseif(request()->segment(1) === $menu->slug)
                                class="mm-active"
                            @endif
                        >
                            <i class="{{ $menu->icon }}"></i>
                            {{ $menu->name }}
                            @if(!empty($menu->subMenus))
                                <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                            @endif
                        </a>
                        @if(!empty($menu->subMenus))
                            @foreach($menu->subMenus as $sub)
                                <ul
                                    @if(request()->segment(1) === explode('.', $sub->slug)[1])
                                    class="mm-collapse mm-show"
                                    @endif
                                >
                                    <li>
                                        <a href="{{ route($sub->slug) }}"
                                           @if(request()->segment(1) === explode('.', $sub->slug)[1])
                                           class="mm-active"
                                            @endif
                                        >
                                            {{ $sub->name }}
                                        </a>
                                    </li>
                                </ul>
                            @endforeach
                        @endif
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>


{{--                <li>--}}
{{--                    <a href="#"--}}
{{--                       @if(request()->routeIs('faculties.index') || request()->routeIs('majors.index') || request()->routeIs('classrooms.index'))--}}
{{--                       class="mm-active"--}}
{{--                       @endif--}}
{{--                    >--}}
{{--                        <i class="metismenu-icon pe-7s-diamond"></i>--}}
{{--                        Master Data--}}
{{--                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>--}}
{{--                    </a>--}}
{{--                    <ul--}}
{{--                    @if(request()->routeIs('faculties.index') || request()->routeIs('majors.index') || request()->routeIs('classrooms.index'))--}}
{{--                    class="mm-collapse mm-show"--}}
{{--                    @endif--}}
{{--                    >--}}
{{--                        @can('view-any', App\Models\Faculty::class)--}}
{{--                            <li>--}}
{{--                                <a href="{{ route('faculties.index') }}" @if(request()->routeIs('faculties.index')) { class="mm-active" } @endif>--}}
{{--                                    <i class="metismenu-icon"></i>--}}
{{--                                    Faculties--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                        @endcan--}}
{{--                        @can('view-any', App\Models\Major::class)--}}
{{--                            <li>--}}
{{--                                <a href="{{ route('majors.index') }}" @if(request()->routeIs('majors.index')) { class="mm-active" } @endif>--}}
{{--                                    <i class="metismenu-icon"></i>--}}
{{--                                    Majors--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                        @endcan--}}
{{--                        @can('view-any', App\Models\Classroom::class)--}}
{{--                            <li>--}}
{{--                                <a href="{{ route('classrooms.index') }}" @if(request()->routeIs('classrooms.index')) { class="mm-active" } @endif>--}}
{{--                                    <i class="metismenu-icon"></i>--}}
{{--                                    Classrooms--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                        @endcan--}}
{{--                    </ul>--}}
{{--                </li>--}}

{{--                @if (Auth::user()->can('view-any', Spatie\Permission\Models\Role::class) || Auth::user()->can('view-any', Spatie\Permission\Models\Permission::class))--}}
{{--                    <li>--}}
{{--                        <a href="#"--}}
{{--                           @if(request()->routeIs('roles.index') || request()->routeIs('permissions.index') || request()->routeIs('users.index'))--}}
{{--                           class="mm-active"--}}
{{--                            @endif--}}
{{--                        >--}}
{{--                            <i class="metismenu-icon pe-7s-car"></i>--}}
{{--                            RBAC--}}
{{--                            <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>--}}
{{--                        </a>--}}
{{--                        <ul--}}
{{--                            @if(request()->routeIs('roles.index') || request()->routeIs('permissions.index') || request()->routeIs('users.index'))--}}
{{--                            class="mm-collapse mm-show"--}}
{{--                            @endif--}}
{{--                        >--}}
{{--                            @can('view-any', Spatie\Permission\Models\Role::class)--}}
{{--                            <li>--}}
{{--                                <a href="{{ route('roles.index') }}">--}}
{{--                                    <i class="metismenu-icon"></i>--}}
{{--                                    Roles--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                            @endcan--}}
{{--                            @can('view-any', Spatie\Permission\Models\Permission::class)--}}
{{--                                <li>--}}
{{--                                    <a href="{{ route('permissions.index') }}">--}}
{{--                                        <i class="metismenu-icon"></i>--}}
{{--                                        Permissions--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                            @endcan--}}
{{--                            @can('view-any', App\Models\User::class)--}}
{{--                                <li>--}}
{{--                                    <a href="{{ route('users.index') }}" @if(request()->routeIs('users.index')) { class="mm-active" } @endif>--}}
{{--                                        <i class="metismenu-icon"></i>--}}
{{--                                        Users--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                            @endcan--}}
{{--                        </ul>--}}
{{--                    </li>--}}
{{--                @endif--}}
{{--                <li class="app-sidebar__heading">Widgets</li>--}}
{{--                <li>--}}
{{--                    <a href="dashboard-boxes.html">--}}
{{--                        <i class="metismenu-icon pe-7s-display2"></i>--}}
{{--                        Dashboard Boxes--}}
{{--                    </a>--}}
{{--                </li>--}}
