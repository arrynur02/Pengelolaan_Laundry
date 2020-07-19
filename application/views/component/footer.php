                </div>

              </div> <!-- content -->
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
          function rupiah(ribuan) {
            var bilangan = ribuan;
            var reverse = bilangan.toString().split('').reverse().join(''),
            ribuan  = reverse.match(/\d{1,3}/g);
            ribuan  = ribuan.join('.').split('').reverse().join('');
          }
          function loader_hide() {
            $('#preloader').hide();
            $('.status-loader-').hide();
            $('.bouncing-loader').hide();
          }
          var BASEURL = "<?= base_url();?>";
          function logout() {
            document.location.href="<?= base_url();?>Login/user_log_out";
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