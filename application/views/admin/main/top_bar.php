<!-- Topbar Start -->
<div class="navbar-custom">
    <ul class="list-unstyled topbar-right-menu float-right mb-0">
<!-- ============================================================== -->
<!-- This is sample content -->
<!-- Replace with PHP if possible -->
<!-- If not remove this -->
<!-- ============================================================== -->

       <li class="dropdown notification-list">
            <a class="nav-link dropdown-toggle arrow-none" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                <i class="dripicons-bell noti-icon"></i>
                <span class="noti-icon-badge"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated dropdown-lg">

                <!-- item-->
                <div class="dropdown-item noti-title">
                    <h5 class="m-0">
                        <span class="float-right">
                            <a href="javascript: void(0);" class="text-dark">
                                <small>Clear All</small>
                            </a>
                        </span>Notification
                    </h5>
                </div>

                <div class="slimscroll" style="max-height: 230px;">
                    <!-- item--> <!-- SITE MEMBER COMMENT-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <div class="notify-icon bg-primary">
                            <i class="mdi mdi-comment-account-outline"></i>
                        </div>
                        <p class="notify-details">Caleb Flakelar commented on Admin
                            <small class="text-muted">1 min ago</small>
                        </p>
                    </a>

                    <!-- item--><!-- SITE MEMBER REGISTERED-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <div class="notify-icon bg-info">
                            <i class="mdi mdi-account-plus"></i>
                        </div>
                        <p class="notify-details">New user registered.
                            <small class="text-muted">5 hours ago</small>
                        </p>
                    </a>

                   <!-- SITE SUPPORT TICKET RESPONSE-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <div class="notify-icon">
                            <img src="/assets/images/users/avatar-2.jpg" class="img-fluid rounded-circle" alt="" /> </div>
                        <p class="notify-details">Cristina Pride</p>
                        <p class="text-muted mb-0 user-msg">
                            <small>Hi, How are you? What about our next meeting</small>
                        </p>
                    </a>
                </div>

                <!-- All-->
                <a href="javascript:void(0);" class="dropdown-item text-center text-primary notify-item notify-all">
                    View All
                </a>

            </div>
        </li>

        <li class="dropdown notification-list">
            <a class="nav-link dropdown-toggle nav-user arrow-none mr-0" data-toggle="dropdown" href="#" role="button" aria-haspopup="false"
                aria-expanded="false">
                <span class="account-user-avatar">
                    <img src="/assets/images/users/avatar-1.jpg" alt="user-image" class="rounded-circle">
                </span>
                <!--ADMIN USER NAME HERE-->
                <span>
                    <span class="account-user-name"><?=isset($this->session->userdata['logged_in']) ? $this->session->userdata['logged_in']['user_obj']->user_firstname. ' '.$this->session->userdata['logged_in']['user_obj']->user_lastname : ''?></span>
                    <!--ADMIN USER TITLE - IF POSSIBLE-->
                    <span class="account-position">Admin</span>
                </span>
            </a>
            <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated profile-dropdown ">
                <!-- item-->
                <div class=" dropdown-header noti-title">
                    <h6 class="text-overflow m-0">Welcome <?=isset($this->session->userdata['logged_in']) ? $this->session->userdata['logged_in']['user_obj']->user_firstname : ''?>!</h6>
                </div>

                <!-- item-->
                <a href="javascript:void(0);" class="dropdown-item notify-item">
                    <i class="mdi mdi-account-circle"></i>
                    <span>My Account</span>
                </a>

                <!-- item-->
                <a href="javascript:void(0);" class="dropdown-item notify-item">
                    <i class="mdi mdi-account-settings-variant"></i>
                    <span>Settings</span>
                </a>

                <!-- item-->
                <a href="javascript:void(0);" class="dropdown-item notify-item">
                    <i class="mdi mdi-lifebuoy"></i>
                    <span>Support</span>
                </a>

                <!-- item-->
                <a href="javascript:void(0);" class="dropdown-item notify-item">
                    <i class="mdi mdi-lock-outline"></i>
                    <span>Lock Screen</span>
                </a>

                <!-- item-->
                <a href="/admin/logout" class="dropdown-item notify-item">
                    <i class="mdi mdi-logout"></i>
                    <span>Logout</span>
                </a>

            </div>
        </li>

    </ul>
    <button class="button-menu-mobile open-left disable-btn">
        <i class="mdi mdi-menu"></i>
    </button>
    <div class="app-search">
        <form>
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Search...">
                <span class="mdi mdi-magnify"></span>
                <div class="input-group-append">
                    <button class="btn btn-primary" type="submit">Search</button>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- end Topbar -->
