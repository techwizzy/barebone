
   <!-- Topbar Start -->
   <div class="navbar-custom">
        <ul class="list-unstyled topnav-menu float-right mb-0">

            <li class="dropdown notification-list">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                    <i class="mdi mdi-bell noti-icon"></i>
                    <span class="badge badge-danger rounded-circle noti-icon-badge">4</span>
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-lg">

                    <!-- item-->
                    <div class="dropdown-item noti-title">
                        <h5 class="font-16 m-0">
                            <span class="float-right">
                                <a href="" class="text-dark">
                                    <small>Clear All</small>
                                </a>
                            </span>Notification
                        </h5>
                    </div>

                    <div class="slimscroll noti-scroll">

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <div class="notify-icon bg-success"><i class="mdi mdi-comment-account-outline"></i></div>
                                <p class="notify-details">Caleb Flakelar commented on Admin<small class="text-muted">1 min ago</small></p>
                            </a>


                    </div>

                    <!-- All-->
                    <a href="javascript:void(0);" class="dropdown-item text-primary text-center notify-item notify-all ">
                        View all
                        <i class="fi-arrow-right"></i>
                    </a>

                </div>
            </li>

            <li class="dropdown notification-list">
                <a class="nav-link dropdown-toggle nav-user mr-0" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                    <img src="/images/user.png" alt="user-image" class="rounded-circle">
                    <span class="pro-user-name ml-1">
                        {{ Auth::user()->name }}  <i class="mdi mdi-chevron-down"></i>
                    </span>
                </a>
                <div class="dropdown-menu dropdown-menu-right profile-dropdown ">

                    <!-- item-->
                    <a href="{{ route('access.users.profile',Auth::user()->id) }}" class="dropdown-item notify-item">
                        <i class="mdi mdi-settings-outline"></i>
                        <span>Settings</span>
                    </a>



                    <div class="dropdown-divider"></div>

                    <!-- item-->

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a class="dropdown-item notify-item"
                            href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();"
                            >
                                <i class="mdi mdi-logout"></i>
                            Logout
                            </a>
                        </form>

                </div>
            </li>




        </ul>

        <!-- LOGO -->
        <div class="logo-box">
            <a href="" class="logo text-center logo-dark">
                <span class="logo-lg">
                    <img src="/images/aloispack-logo.png" alt="" height="48">
                    <h3>Alois Pack</h3>
                    <!-- <span class="logo-lg-text-dark">Simple</span> -->
                </span>
                <span class="logo-sm">
                    <!-- <span class="logo-lg-text-dark">S</span> -->
                    <img src="/images/logo-sm.png" alt="" height="22">
                </span>
            </a>

            <a href="" class="logo text-center logo-light">
                <span class="logo-lg">
                    <img src="/images/logo-light.png" alt="" height="26">
                    <!-- <span class="logo-lg-text-light">Simple</span> -->
                </span>
                <span class="logo-sm">
                    <!-- <span class="logo-lg-text-light">S</span> -->
                    <img src="/images/logo-sm.png" alt="" height="22">
                </span>
            </a>
        </div>

        <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
            <li>
                <button class="button-menu-mobile">
                    <i class="mdi mdi-menu"></i>
                </button>
            </li>


        </ul>
   </div>

<div class="left-side-menu">


    <div class="user-box">
           <div class="float-left">
                <img src="/images/user.png" alt="" class="avatar-md rounded-circle" >
            </div>
            <div class="user-info">
                <a href="#"> {{ Auth::user()->name }}</a>
                <p class="text-muted m-0">{{ Auth::user()->roles[0]['name'] }}</p>
            </div>
        </div>


<!--- Sidemenu -->
<div id="sidebar-menu">

    <ul class="metismenu" id="side-menu">

        <li class="menu-title">Navigation</li>

        <li>
            <a href="index.html">
                <i class="ti-home"></i>
                <span> Dashboard </span>
            </a>
        </li>

        <li>
            <a href="ui-elements.html">
                <i class="ti-paint-bucket"></i>
                <span> UI Elements </span>
                <span class="badge badge-primary float-right">11</span>
            </a>
        </li>

        <li>
            <a href="javascript: void(0);">
                <i class="ti-shield"></i>
                <span> Access Control </span>
                <span class="menu-arrow"></span>
            </a>
            <ul class="nav-second-level" aria-expanded="false">
                <li><a href="{{ route('access.users.index') }}">Users</a></li>
                <li><a href="{{ route('access.roles.index') }}">Roles</a></li>
                <li><a href="{{ route('access.permissions.index') }}">Permissions</a></li>
            </ul>
        </li>
        <li>
            <a href="index.html">
                <i class="ti-settings"></i>
                <span> settings </span>
            </a>
        </li>
    </ul>

</div>
<!-- End Sidebar -->

<div class="clearfix"></div>


</div>

<!-- Left Sidebar End -->
