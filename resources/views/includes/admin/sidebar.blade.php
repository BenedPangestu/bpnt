<nav id="sidebar">
    <!-- Sidebar Content -->
    <div class="sidebar-content">
        <!-- Side Header -->
        <div class="content-header content-header-fullrow px-15">
            <!-- Mini Mode -->
            <div class="content-header-section sidebar-mini-visible-b">
                <!-- Logo -->
                <span class="content-header-item font-w700 font-size-xl float-left animated fadeIn">
                    <span class="text-dual-primary-dark">c</span><span class="text-primary">b</span>
                </span>
                <!-- END Logo -->
            </div>
            <!-- END Mini Mode -->

            <!-- Normal Mode -->
            <div class="content-header-section text-center align-parent sidebar-mini-hidden">
                <!-- Close Sidebar, Visible only on mobile screens -->
                <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                <button type="button" class="btn btn-circle btn-dual-secondary d-lg-none align-v-r" data-toggle="layout" data-action="sidebar_close">
                    <i class="fa fa-times text-danger"></i>
                </button>
                <!-- END Close Sidebar -->

                <!-- Logo -->
                <div class="content-header-item">
                    <a class="link-effect font-w700" href="#">
                        <i class="fa fa-map" style="color: white"></i>
                        <span class="font-size-xl" style="color: white">BPNT/KPM</span>
                    </a>
                </div>
                <!-- END Logo -->
            </div>
            <!-- END Normal Mode -->
        </div>
        <!-- END Side Header -->

        <!-- Side User -->
        <div class="content-side content-side-full content-side-user px-10 align-parent">
            <!-- Visible only in mini mode -->
            <div class="sidebar-mini-visible-b align-v animated fadeIn">
                <img class="img-avatar img-avatar32" src={{asset("assets/media/avatars/logo-sembako.jpeg")}} alt="">
            </div>
            <!-- END Visible only in mini mode -->

            <!-- Visible only in normal mode -->
            <div class="sidebar-mini-hidden-b text-center">
                <a class="img-link" href="#">
                    <img class="img-avatar" src={{asset("assets/media/avatars/logo-sembako.jpeg")}} alt="">
                </a>
                <ul class="list-inline mt-10">
                    <li class="list-inline-item">
                        <a class="link-effect text-dual-primary-dark font-size-xs font-w600 text-uppercase" href="#">
                            @if (Auth::user()->role == "admin")
                                {{Auth::user()->role}}   
                            @else
                                {{Auth::user()->role}} {{Auth::user()->ketua_rw}}
                            @endif    
                        </a>
                        <p>{{Auth::user()->username}}</p>   
                        
                    </li>
                </ul>
            </div>
            <!-- END Visible only in normal mode -->
        </div>
        <!-- END Side User -->

        <!-- Side Navigation -->
        <div class="content-side content-side-full">
            <ul class="nav-main">
                <li class="nav-main-heading"><span class="sidebar-mini-visible">Mg</span><span class="sidebar-mini-hidden">Management</span></li>
                <li>
                    <a href="{{url('admin/dashboard')}}" class="{{ Request::is('admin/dashboard')? "active":"" }}"><i class="fa fa-bar-chart"></i><span class="sidebar-mini-hide">Dashboard</span></a>
                </li>
                
                @if (auth::user()->role == "admin")
                    <li>
                        <a class="nav-submenu {{ Request::is('admin/masyarakat')? "active":"" }} {{ Request::is('admin/masyarakat')? "active":"" }} {{ Request::is('admin/masyarakat/smp')? "active":"" }}" data-toggle="nav-submenu" href="#"><i class="si si-trophy"></i><span class="sidebar-mini-hide">Data Masyarakat</span></a>
                        <ul>
                            <li>
                                <a href="/admin/masyarakat" class="{{ Request::is('admin/masyarakat')? "active":"" }}">Daftar Calon BPNT/KPM</a>
                            </li>
                            <li>
                                <a href="{{route('masyarakat.approve')}}" class="{{ Request::is('admin/masyarakat/approve')? "active":"" }}">Data Approve</a>
                            </li>
                            <li>
                                <a href="{{route('masyarakat.history')}}" class="{{ Request::is('admin/masyarakat/history')? "active":"" }}">Data history</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="{{route('user.rw')}}" class="{{ Request::is('admin/user/rw')? "active":"" }}"><i class="fa fa-bank"></i><span class="sidebar-mini-hide">Data RW</span></a>
                    </li>
                @else
                <li>
                    <a class="nav-submenu {{ Request::is('admin/masyarakat')? "active":"" }} {{ Request::is('admin/masyarakat')? "active":"" }} {{ Request::is('admin/masyarakat/smp')? "active":"" }}" data-toggle="nav-submenu" href="#"><i class="si si-trophy"></i><span class="sidebar-mini-hide">Data Masyarakat</span></a>
                    <ul>
                        <li>
                            <a href="/admin/masyarakat" class="{{ Request::is('admin/masyarakat')? "active":"" }}">Daftar Calon BPNT/KPM</a>
                        </li>
                        <li>
                            <a href="{{route('masyarakat.approve')}}" class="{{ Request::is('admin/masyarakat/approve')? "active":"" }}">Data Approve</a>
                        </li>
                        <li>
                            <a href="{{route('masyarakat.pending')}}" class="{{ Request::is('admin/masyarakat/pending')? "active":"" }}">Data Pending</a>
                        </li>
                    </ul>
                </li>
                @endif
            </ul>
        </div>
        <!-- END Side Navigation -->
    </div>
    <!-- Sidebar Content -->
</nav>