<div class="side-menu is-clearfix" id="admin-side-menu">
    <aside class="menu m-t-30 m-l-10">
        <p class="menu-label">
            General
        </p>
        <ul class="menu-list">
            <li><a href="" class="">Dashboard</a></li>
        </ul>

        <p class="menu-label">
            Content
        </p>
        <ul class="menu-list">
            <li><a href="" class="">Blog Posts</a></li>
            {{-- <li>
              <a class="has-submenu {{Nav::hasSegment(['roles', 'permissions'], 2)}}">Roles &amp; Permissions</a>
              <ul class="submenu">
                <li><a href="{{route('roles.index')}}" class="{{Nav::isResource('roles')}}">Roles</a></li>
                <li><a href="{{route('permissions.index')}}" class="{{Nav::isResource('permissions')}}">Permissions</a></li>
              </ul>
            </li> --}}
        </ul>

        <p class="menu-label">
            Administration
        </p>
        <ul class="menu-list">
            <li><a href="" class="">Manage Users</a></li>
            <li>
                <a class="has-submenu ">Roles &amp; Permissions</a>
                <ul class="submenu">
                    <li><a href="" class="">Roles</a></li>
                    <li><a href="" class="">Permissions</a></li>
                </ul>
            </li>
            <li>
                <a class="has-submenu">Example Accordion</a>
                <ul class="submenu">
                    <li><a href="">Roles</a></li>
                    <li><a href="">Permissions</a></li>
                </ul>
            </li>
            <li>
                <a class="has-submenu">Another Example</a>
                <ul class="submenu">
                    <li><a href="">Roles</a></li>
                    <li><a href="">Permissions</a></li>
                </ul>
            </li>
        </ul>
    </aside>
</div>