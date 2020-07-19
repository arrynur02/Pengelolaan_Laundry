<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8" />
        <title>Halaman <?= $this->session->userdata('role'); ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="<?php echo base_url();?>assets/images/favicon.ico">
		
		<link href="<?php echo base_url();?>assets/css/vendor/dataTables.bootstrap4.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url();?>assets/css/vendor/responsive.bootstrap4.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url();?>assets/css/vendor/buttons.bootstrap4.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url();?>assets/css/vendor/select.bootstrap4.css" rel="stylesheet" type="text/css" />
        <!-- App css -->
        <link href="<?php echo base_url();?>assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url();?>assets/css/app.min.css" rel="stylesheet" type="text/css" id="light-style" />
		<!-- third party css -->
        <link href="<?php echo base_url();?>assets/css/vendor/fullcalendar.min.css" rel="stylesheet" type="text/css" />
        <!-- third party css end -->
    </head>

    <body class="loading">
    	<!-- Pre-loader -->
        <div id="preloader">
            <div id="status" class="status-loader-">
                <div class="bouncing-loader"><div ></div><div ></div><div ></div></div>
            </div>
        </div>
        <!-- End Preloader-->
        <!-- Begin page -->
        <div class="wrapper">
            <!-- ========== Left Sidebar Start ========== -->
            <div class="left-side-menu">

                <div class="slimscroll-menu" id="left-side-menu-container">

                    <!-- LOGO -->
                    <a href="index.html" class="logo text-center">
                        <span class="logo-lg">
                            <img src="<?php echo base_url();?>assets/images/logo.png" alt="" height="16" id="side-main-logo">
                        </span>
                        <span class="logo-sm">
                            <img src="<?php echo base_url();?>assets/images/logo_sm.png" alt="" height="16" id="side-sm-main-logo">
                        </span>
                    </a>

                    <!--- Sidemenu -->
					<?php if ($this->session->userdata('role') == "admin") { ?>
						<ul id="is_nav-" class="metismenu side-nav">
                        <li class="side-nav-title side-nav-item">Navigation</li>

                        <li class="side-nav-item">
                            <a href="javascript: void(0);" target_href="<?php echo base_url();?>Admin/Dashboard" class="side-nav-link">
                                <i class="uil-home-alt"></i>
                                <span class="badge badge-success float-right">4</span>
                                <span> Dashboards </span>
                            </a>
                        </li>

                        <li class="side-nav-title side-nav-item">Apps</li>
                        <li class="side-nav-item">
                            <a href="javascript: void(0);" target_href="<?php echo base_url();?>Admin/Calender" class="side-nav-link">
                                <i class="uil-calender"></i>
                                <span> Calendar </span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="javascript: void(0);" target_href="<?php echo base_url();?>Produk" class="side-nav-link">
                                <i class="uil-store"></i>
                                <span> Paket Cucian </span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="javascript: void(0);" target_href="<?php echo base_url();?>Management_user" class="side-nav-link">
                                <i class="uil-user-circle"></i>
                                <span> Management User </span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="javascript: void(0);" target_href="<?php echo base_url();?>Outlet" class="side-nav-link">
                                <i class="uil-box"></i>
                                <span> Outlet </span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="javascript: void(0);" target_href="<?php echo base_url();?>Transaksi" class="side-nav-link">
                                <i class="uil-briefcase-alt"></i>
                                <span> Transaksi </span>
                            </a>
                        </li>
                        <li class="side-nav-title side-nav-item mt-1">User</li>
                        <li class="side-nav-item">
                            <a href="javascript:void(0);" onclick="logout()" class="side-nav-link">
                                <i class="uil-arrow-left"></i>
                                <span> Keluar </span>
                            </a>
                        </li>
            
                    </ul>
					<?php }elseif ($this->session->userdata('role') == "kasir") { ?>
						<ul id="is_nav-" class="metismenu side-nav">
	                        <li class="side-nav-title side-nav-item">Navigation</li>
	                        <li class="side-nav-item">
	                            <a href="javascript: void(0);" target_href="<?php echo base_url();?>Admin/Dashboard" class="side-nav-link">
	                                <i class="uil-home-alt"></i>
	                                <span class="badge badge-success float-right">4</span>
	                                <span> Dashboards </span>
	                            </a>
	                        </li>
	                        <li class="side-nav-item">
                            <a href="javascript: void(0);" target_href="<?php echo base_url();?>Transaksi" class="side-nav-link">
                                <i class="uil-briefcase-alt"></i>
                                <span> Transaksi </span>
                            </a>
	                        </li>
	                        <li class="side-nav-title side-nav-item mt-1">User</li>
	                        <li class="side-nav-item">
	                            <a href="javascript:void(0);" onclick="logout()" class="side-nav-link">
	                                <i class="uil-arrow-left"></i>
	                                <span> Keluar </span>
	                            </a>
	                        </li>
                    	</ul>
					<?php }elseif ($this->session->userdata('role') == "owner") { ?>
						<ul id="is_nav-" class="metismenu side-nav">
	                        <li class="side-nav-title side-nav-item">Navigation</li>
	                        <li class="side-nav-item">
	                            <a href="javascript: void(0);" target_href="<?php echo base_url();?>Admin/Dashboard" class="side-nav-link">
	                                <i class="uil-home-alt"></i>
	                                <span class="badge badge-success float-right">4</span>
	                                <span> Dashboards </span>
	                            </a>
	                        </li>
	                        <li class="side-nav-title side-nav-item mt-1">User</li>
	                        <li class="side-nav-item">
	                            <a href="javascript:void(0);" onclick="logout()" class="side-nav-link">
	                                <i class="uil-arrow-left"></i>
	                                <span> Keluar </span>
	                            </a>
	                        </li>
	                    </ul>
					<?php } ?>
                    <!-- End Sidebar -->

                    <div class="clearfix"></div>

                </div>
                <!-- Sidebar -left -->

            </div>
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">
                <div class="content">
                    <!-- Topbar Start -->
                    <div class="navbar-custom">
                        <ul class="list-unstyled topbar-right-menu float-right mb-0">                            
                        	<li class="notification-list">
                                <a class="nav-link right-bar-toggle" href="javascript: void(0);">
                                    <i class="dripicons-gear noti-icon"></i>
                                </a>
                            </li>
                            <li class="dropdown notification-list">
                                <a class="nav-link dropdown-toggle nav-user arrow-none mr-0" data-toggle="dropdown" href="#" role="button" aria-haspopup="false"
                                    aria-expanded="false">
                                   <!--  <span class="account-user-avatar"> 
                                        <img src="assets/images/users/avatar-1.jpg" alt="user-image" class="rounded-circle">
                                    </span> -->
                                    <span>
                                        <span class="account-user-name"><?= $this->session->userdata('nama'); ?></span>
                                        <span class="account-position"><?= $this->session->userdata('role'); ?></span>
                                    </span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated topbar-dropdown-menu profile-dropdown">
                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <i class="mdi mdi-account-circle mr-1"></i>
                                        <span>My Account</span>
                                    </a>
                                    <!-- item-->
                                    <a href="javascript:void(0);" onclick="logout()" class="dropdown-item notify-item">
                                        <i class="mdi mdi-logout mr-1"></i>
                                        <span>Logout</span>
                                    </a>

                                </div>
                            </li>

                        </ul>
                           <button class="button-menu-mobile open-left disable-btn">
                            <i class="mdi mdi-menu"></i>
                        </button>
                    </div>
                    <!-- end Topbar -->
                    <div id="this-content-">