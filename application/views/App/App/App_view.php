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
                            <a href="javascript: void(0);" target_href="<?php echo base_url();?>Member" class="side-nav-link">
                                <i class="uil-users-alt"></i>
                                <span> Member </span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="javascript: void(0);" target_href="<?php echo base_url();?>Admin/Calender" class="side-nav-link">
                                <i class="uil-calender"></i>
                                <span> Calendar </span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="javascript: void(0);" target_href="<?php echo base_url();?>Produk" class="side-nav-link">
                                <i class="uil-box"></i>
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
                                <i class="uil-store"></i>
                                <span> Outlet </span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="javascript: void(0);" target_href="<?php echo base_url();?>Transaksi" class="side-nav-link">
                                <i class="uil-briefcase-alt"></i>
                                <span> Transaksi </span>
                            </a>
                        </li>
                        <li class="side-nav-title side-nav-item mt-1">Laporan</li>
                        <li class="side-nav-item">
                            <a href="javascript:void(0)" target_href="<?php echo base_url();?>Laporan" class="side-nav-link">
                                <i class="mdi mdi-file"></i>
                                <span> Laporan </span>
                            </a>
                        </li>
                        <li class="side-nav-title side-nav-item mt-1">Config</li>
                        <li class="side-nav-item">
                            <a href="javascript:void(0);" onclick="refresh_content()" class="side-nav-link">
                                <i class="mdi mdi-spin mdi-loading"></i>
                                <span> Refresh </span>
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
                            <a href="javascript: void(0);" target_href="<?php echo base_url();?>Member" class="side-nav-link">
                                <i class="uil-users-alt"></i>
                                <span> Member </span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="javascript: void(0);" target_href="<?php echo base_url();?>Transaksi" class="side-nav-link">
                                <i class="uil-briefcase-alt"></i>
                                <span> Transaksi </span>
                            </a>
                        </li>
                        <li class="side-nav-title side-nav-item mt-1">Laporan</li>
                        <li class="side-nav-item">
                            <a href="javascript: void(0);" target_href="<?php echo base_url();?>Laporan" class="side-nav-link">
                                <i class="mdi mdi-file"></i>
                                <span> Laporan </span>
                            </a>
                        </li>
                        <li class="side-nav-title side-nav-item mt-1">Config</li>
                        <li class="side-nav-item">
                            <a href="javascript:void(0);" onclick="refresh_content()" class="side-nav-link">
                                <i class="mdi mdi-spin mdi-loading"></i>
                                <span> Refresh </span>
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
                        <li class="side-nav-title side-nav-item mt-1">Laporan</li>
                        <li class="side-nav-item">
                            <a href="javascript:void(0);" target_href="<?php echo base_url();?>Laporan" class="side-nav-link">
                                <i class="mdi mdi-file"></i>
                                <span> Laporan </span>
                            </a>
                        </li>
                        <li class="side-nav-title side-nav-item mt-1">Config</li>
                        <li class="side-nav-item">
                            <a href="javascript:void(0);" onclick="refresh_content()" class="side-nav-link">
                                <i class="mdi mdi-spin mdi-loading"></i>
                                <span> Refresh </span>
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
                    <?= $this->session->flashdata('welcome'); ?>
                    <div id="this-content-">
                        <?php $this->load->view('App/Dashboard/Dashboard_view'); ?>
                    </div>
                </div> 
                <!-- content -->
                <!-- Footer Start -->
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                                <script>document.write(new Date().getFullYear())</script> © Ujikom
                            </div>
                        </div>
                    </div>
                </footer>
                <!-- end Footer -->

            </div>

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->


        </div>
        <!-- END wrapper -->


        <!-- Right Sidebar -->
        <div class="right-bar">

          <div class="rightbar-title">
            <a href="javascript:void(0);" class="right-bar-toggle float-right">
              <i class="dripicons-cross noti-icon"></i>
          </a>
          <h5 class="m-0">Settings</h5>
      </div>

      <div class="slimscroll-menu rightbar-content">

        <div class="p-3">
          <div class="alert alert-warning" role="alert">
            <strong>Customize </strong> the overall color scheme, sidebar menu, etc. Note that, Hyper stores the preferences
            in local storage.
        </div>

        <!-- Settings -->
        <h5 class="mt-3">Color Scheme</h5>
        <hr class="mt-1" />

        <div class="custom-control custom-switch mb-1">
            <input type="radio" class="custom-control-input" name="color-scheme-mode" value="light" id="light-mode-check"
            checked />
            <label class="custom-control-label" for="light-mode-check">Light Mode</label>
        </div>

        <div class="custom-control custom-switch mb-1">
            <input type="radio" class="custom-control-input" name="color-scheme-mode" value="dark" id="dark-mode-check" />
            <label class="custom-control-label" for="dark-mode-check">Dark Mode</label>
        </div>

        <!-- Width -->
        <h5 class="mt-4">Width</h5>
        <hr class="mt-1"/>
        <div class="custom-control custom-switch mb-1">
            <input type="radio" class="custom-control-input" name="width" value="fluid" id="fluid-check" checked />
            <label class="custom-control-label" for="fluid-check">Fluid</label>
        </div>
        <div class="custom-control custom-switch mb-1">
            <input type="radio" class="custom-control-input" name="width" value="boxed" id="boxed-check" />
            <label class="custom-control-label" for="boxed-check">Boxed</label>
        </div>

        <!-- Left Sidebar-->
        <h5 class="mt-4">Left Sidebar</h5>
        <hr class="mt-1" />
        <div class="custom-control custom-switch mb-1">
            <input type="radio" class="custom-control-input" name="theme" value="default" id="default-check" checked />
            <label class="custom-control-label" for="default-check">Default</label>
        </div>

        <div class="custom-control custom-switch mb-1">
            <input type="radio" class="custom-control-input" name="theme" value="light" id="light-check" />
            <label class="custom-control-label" for="light-check">Light</label>
        </div>

        <div class="custom-control custom-switch mb-3">
            <input type="radio" class="custom-control-input" name="theme" value="dark" id="dark-check" />
            <label class="custom-control-label" for="dark-check">Dark</label>
        </div>

        <div class="custom-control custom-switch mb-1">
            <input type="radio" class="custom-control-input" name="compact" value="fixed" id="fixed-check" checked />
            <label class="custom-control-label" for="fixed-check">Fixed</label>
        </div>

        <div class="custom-control custom-switch mb-1">
            <input type="radio" class="custom-control-input" name="compact" value="condensed" id="condensed-check" />
            <label class="custom-control-label" for="condensed-check">Condensed</label>
        </div>

        <div class="custom-control custom-switch mb-1">
            <input type="radio" class="custom-control-input" name="compact" value="scrollable" id="scrollable-check" />
            <label class="custom-control-label" for="scrollable-check">Scrollable</label>
        </div>

        <button class="btn btn-primary btn-block mt-4" id="resetBtn">Reset to Default</button>

        <a href="https://themes.getbootstrap.com/product/hyper-responsive-admin-dashboard-template/" class="btn btn-danger btn-block mt-3" target="_blank"><i class="mdi mdi-basket mr-1"></i> Purchase Now</a>
    </div> <!-- end padding-->

</div>
</div>

<div class="rightbar-overlay"></div>
<!-- /Right-bar -->

<!-- bundle -->
<script src="<?php echo base_url();?>assets/js/vendor.min.js"></script>
<script src="<?php echo base_url();?>assets/js/app.min.js"></script>
<script>
  function notify_success(teks) {
    $.NotificationApp.send("Berhasil!",teks,"top-right","rgba(0,0,0,0.2)","success");
}
function notify_error(teks) {
    $.NotificationApp.send("Gagal!",teks,"top-right","rgba(0,0,0,0.2)","error");
}
          // --------------------------------------------------------------------- Alert Js -----
          function loader_show() {
            $('#preloader').show();
            $('.status-loader-').show();
            $('.bouncing-loader').show();
        }
        function loader_hide() {
            $('#preloader').hide();
            $('.status-loader-').hide();
            $('.bouncing-loader').hide();
        }
        function rupiah(obj) {
            var bilangan = obj;
            var reverse = bilangan.toString().split('').reverse().join(''),
            ribuan  = reverse.match(/\d{1,3}/g);
            ribuan  = ribuan.join('.').split('').reverse().join('');
        }
        var BASEURL = "<?= base_url();?>";
        function logout() {
            document.location.href="<?= base_url();?>Login/user_log_out";
        }
        function refresh_content(){
          document.location.href="<?= base_url();?><?= $this->session->userdata('refresh'); ?>";
      }
  </script>  
  <script src="<?php echo base_url();?>assets/js/sideNav.js"></script>
  <!-- third party js -->
  <script src="<?php echo base_url();?>assets/js/vendor/Chart.bundle.min.js"></script>
  <!-- third party js ends -->
  <!-- third party js -->
  <script src="<?php echo base_url();?>assets/js/vendor/jquery-ui.min.js"></script>
  <script src="<?php echo base_url();?>assets/js/vendor/fullcalendar.min.js"></script>
  <!-- third party js ends -->
  <!-- third party js -->
  <script src="<?php echo base_url();?>assets/js/vendor/jquery.dataTables.min.js"></script>
  <script src="<?php echo base_url();?>assets/js/vendor/dataTables.bootstrap4.js"></script>
  <script src="<?php echo base_url();?>assets/js/vendor/dataTables.responsive.min.js"></script>
  <script src="<?php echo base_url();?>assets/js/vendor/responsive.bootstrap4.min.js"></script>
  <script src="<?php echo base_url();?>assets/js/vendor/dataTables.buttons.min.js"></script>
  <script src="<?php echo base_url();?>assets/js/vendor/buttons.bootstrap4.min.js"></script>
  <script src="<?php echo base_url();?>assets/js/vendor/buttons.html5.min.js"></script>
  <script src="<?php echo base_url();?>assets/js/vendor/buttons.flash.min.js"></script>
  <script src="<?php echo base_url();?>assets/js/vendor/buttons.print.min.js"></script>
  <script src="<?php echo base_url();?>assets/js/vendor/dataTables.keyTable.min.js"></script>
  <script src="<?php echo base_url();?>assets/js/vendor/dataTables.select.min.js"></script>
  <!-- third party js ends -->
  <!-- demo app -->
  <script src="<?php echo base_url();?>assets/js/pages/demo.calendar.js"></script>
  <!-- end demo js-->
  <!-- demo app -->
  <script src="<?php echo base_url();?>assets/js/pages/demo.dashboard-projects.js"></script>
  <!-- end demo js-->

</body>

</html>