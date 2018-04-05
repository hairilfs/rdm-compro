<div class="side-content side-content-full">
    <ul class="nav-main">
        <li>
            <a class="active" href="{{ url('dashboard') }}"><i class="si si-speedometer"></i><span class="sidebar-mini-hide">Dashboard</span></a>
        </li>
        <li class="nav-main-heading"><span class="sidebar-mini-hide">Content</span></li>
        <li>
            <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="fa fa-image"></i><span class="sidebar-mini-hide">Hero Slider</span></a>
            <ul>
                <li>
                    <a href="{{ url('slider/home') }}">Home</a>
                </li>
                <li>
                    <a href="{{ url('slider/projects') }}">Projects</a>
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