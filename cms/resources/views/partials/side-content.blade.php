<div class="side-content side-content-full">
    <ul class="nav-main">
        <li>
            <a class="active" href="{{ url('dashboard') }}"><i class="si si-speedometer"></i><span class="sidebar-mini-hide">Dashboard</span></a>
        </li>
        <li class="nav-main-heading"><span class="sidebar-mini-hide">Header</span></li>
        <li>
            <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-wrench"></i><span class="sidebar-mini-hide">Dropdown</span></a>
            <ul>
                <li>
                    <a href="start_backend.html">Link #1</a>
                </li>
                <li>
                    <a href="start_backend.html">Link #2</a>
                </li>
            </ul>
        </li>
        <li>
            <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-wrench"></i><span class="sidebar-mini-hide">Setting</span></a>
            <ul>
                <li>
                    <a href="{{ url('setting') }}">Home</a>
                </li>
            </ul>
        </li>
    </ul>
</div>