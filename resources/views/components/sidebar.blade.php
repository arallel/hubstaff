<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html"> Mekakushi</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">MKS</a>
        </div>
        <ul class="sidebar-menu">
            <li class="{{ Request::is('dashboard') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('dashboard') }}"><i class="fas fa-fire"></i> <span>Dashboard</span></a>
            </li>
            <li class="menu-header">Admin</li>
            <li class="{{ Request::is('project/all', 'project/archive') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('project/all') }}"><i
                        class="far fa-file"></i></i><span>Project</span></a>
            </li>
            <li class="nav-item dropdown ">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="far fa-user"></i></i>
                    <span>People</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is('members') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('members') }}">Member</a>
                    </li>
                    <li class="{{ Request::is('transparent-sidebar') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('transparent-sidebar') }}">Team</a>
                    </li>
                </ul>
        </ul>

        {{--  <div class="hide-sidebar-mini mt-4 mb-4 p-3">
            <a href="https://getstisla.com/docs"
                class="btn btn-primary btn-lg btn-block btn-icon-split">
                <i class="fas fa-rocket"></i> Documentation
            </a>
        </div> --}}
    </aside>
</div>
