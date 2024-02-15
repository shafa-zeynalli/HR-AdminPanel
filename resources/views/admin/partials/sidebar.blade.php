<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
    <ul class="app-menu">
{{--        <li><a class="app-menu__item {{ request()->is('admin/categories*') ? 'active' : '' }}" href="{{route('admin.category.index',$lang)}}"><span class="app-menu__label">Categories</span></a></li>--}}
        <li>
            @can('view users')
                <a class="app-menu__item {{ request()->is('user*') ? 'active' : '' }}"
                   href="{{route('users.index')}}"><span class="app-menu__label">Users</span></a></li>
        @endcan
        @can('deleted users')
            <a class="app-menu__item {{ request()->is('deleted*') ? 'active' : '' }}"
               href="{{route('deletedUsers')}}"><span class="app-menu__label">Deleted Users</span></a></li>
        @endcan
        @can('view roles')
            <a class="app-menu__item {{ request()->is('roles*') ? 'active' : '' }}" href="{{route('roles')}}"><span
                    class="app-menu__label">Roles</span></a></li>
        @endcan
        @auth
            @can('view profile')
            <a class="app-menu__item {{ request()->is('profile*') ? 'active' : '' }}" href="{{route('profile.index')}}"><span
                    class="app-menu__label">My Profile</span></a></li>
            @endcan
            <a class="app-menu__item {{ request()->is('deleted*') ? 'active' : '' }}" href="{{route('logout')}}"><span
                    class="app-menu__label">Logout</span></a></li>
        @else
            <a class="app-menu__item {{ request()->is('deleted*') ? 'active' : '' }}" href="{{route('login')}}" ><span class="app-menu__label">Login</span></a></li>
        @endauth
{{--        <li><a class="app-menu__item {{ request()->is('admin/slider*') ? 'active' : '' }}" href="{{ route('admin.slider.index') }}"><span class="app-menu__label">Slider Images</span></a></li>--}}
{{--        <li><a class="app-menu__item {{ request()->is('admin/images*') ? 'active' : '' }}" href="{{route('admin.d_image.index')}}"><span class="app-menu__label">Doctor Images</span></a></li>--}}
{{--        <li><a class="app-menu__item {{ request()->is('admin/sponsors*') ? 'active' : '' }}" href="{{route('admin.sponsor.index')}}"><span class="app-menu__label">Sponsors</span></a></li>--}}
{{--        <li><a class="app-menu__item {{ request()->is('admin/youtubes*') ? 'active' : '' }}" href="{{route('admin.youtube.index')}}"><span class="app-menu__label">Youtube</span></a></li>--}}
{{--        <li><a class="app-menu__item {{ request()->is('admin/teams*') ? 'active' : '' }}" href="{{route('admin.teams.index',$lang)}}"><span class="app-menu__label">Teams</span></a></li>--}}
{{--        <li><a class="app-menu__item {{ request()->is('admin/quotes*') ? 'active' : '' }}" href="{{route('admin.quotes.index',$lang)}}"><span class="app-menu__label">Quotes</span></a></li>--}}
{{--        <li><a class="app-menu__item {{ request()->is('admin/head-doctor*') ? 'active' : '' }}" href="{{route('admin.doctor.index',$lang)}}"><span class="app-menu__label">Head Doctor</span></a></li>--}}
{{--        <li><a class="app-menu__item {{ request()->is('admin/tv-programs*') ? 'active' : '' }}" href="{{route('admin.program.index')}}"><span class="app-menu__label">Tv Programs</span></a></li>--}}
{{--        <li><a class="app-menu__item {{ request()->is('admin/about_menu*') ? 'active' : '' }}" href="{{route('admin.about_menu.index',$lang)}}"><span class="app-menu__label">About Us Menu</span></a></li>--}}
{{--        <li><a class="app-menu__item {{ request()->is('admin/about/*') ? 'active' : '' }}" href="{{route('admin.about.index',$lang)}}"><span class="app-menu__label">About </span></a></li>--}}
{{--        <li><a class="app-menu__item {{ request()->is('admin/icons*') ? 'active' : '' }}" href="{{route('admin.icon.index')}}"><span class="app-menu__label">Icons</span></a></li>--}}
{{--        <li><a class="app-menu__item {{ request()->is('admin/settings*') ? 'active' : '' }}" href="{{route('admin.setting.index')}}"><span class="app-menu__label">Settings</span></a></li>--}}
{{--        <li><a class="app-menu__item {{ request()->is('admin/languages*') ? 'active' : '' }}" href="{{route('admin.language.index')}}"><span class="app-menu__label">Languages</span></a></li>--}}
{{--        <li><a class="app-menu__item {{ request()->is('admin/user*') ? 'active' : '' }}" href="{{route('admin.user')}}"><span class="app-menu__label">Users</span></a></li>--}}
{{--        <li><a class="app-menu__item {{ request()->is('admin/contacts*') ? 'active' : '' }}" href="{{route('admin.contact')}}"><span class="app-menu__label">Contact Messages</span></a></li>--}}




{{--        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i--}}
{{--                    class="app-menu__icon bi bi-table"></i><span class="app-menu__label">Tables</span><i--}}
{{--                    class="treeview-indicator bi bi-chevron-right"></i></a>--}}
{{--            <ul class="treeview-menu">--}}
{{--                <li><a class="treeview-item" href="{{route('admin.teams.index',$lang)}}"><i--}}
{{--                            class="icon bi bi-circle-fill"></i> Teams</a></li>--}}
{{--                <li><a class="treeview-item" href="{{route('admin.slider.index')}}"><i--}}
{{--                            class="icon bi bi-circle-fill"></i> Slider Images</a></li>--}}
{{--            </ul>--}}
{{--        </li>--}}
{{--        <li class="treeview">--}}
{{--            <a class="app-menu__item" href="#" data-toggle="treeview"><i--}}
{{--                    class="app-menu__icon bi bi-file-earmark"></i><span class="app-menu__label">Pages</span><i--}}
{{--                    class="treeview-indicator bi bi-chevron-right"></i></a>--}}
{{--            <ul class="treeview-menu">--}}
{{--                <li><a class="treeview-item" href="blank-page.html"><i class="icon bi bi-circle-fill"></i> Blank--}}
{{--                        Page</a></li>--}}
{{--                <li><a class="treeview-item" href="page-login.html"><i class="icon bi bi-circle-fill"></i> Login--}}
{{--                        Page</a></li>--}}
{{--                <li><a class="treeview-item" href="page-lockscreen.html"><i class="icon bi bi-circle-fill"></i>--}}
{{--                        Lockscreen Page</a></li>--}}
{{--                <li><a class="treeview-item" href="page-user.html"><i class="icon bi bi-circle-fill"></i> User Page</a>--}}
{{--                </li>--}}
{{--                <li><a class="treeview-item" href="page-invoice.html"><i class="icon bi bi-circle-fill"></i> Invoice--}}
{{--                        Page</a></li>--}}
{{--                <li><a class="treeview-item" href="page-mailbox.html"><i class="icon bi bi-circle-fill"></i> Mailbox</a>--}}
{{--                </li>--}}
{{--                <li><a class="treeview-item" href="page-error.html"><i class="icon bi bi-circle-fill"></i> Error--}}
{{--                        Page</a></li>--}}
{{--            </ul>--}}
{{--        </li>--}}
{{--        <li><a class="app-menu__item" href="docs.html"><i class="app-menu__icon bi bi-code-square"></i><span--}}
{{--                    class="app-menu__label">Docs</span></a></li>--}}
    </ul>
</aside>
