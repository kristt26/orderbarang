<!DOCTYPE html>
<html lang="en" ng-app="apps">

<head>
  <!-- Required meta tags-->
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="au theme template">
  <meta name="author" content="Hau Nguyen">
  <meta name="keywords" content="au theme template">

  <!-- Title Page-->
  <title>MULTI MANDIRI</title>

  <!-- Fontfaces CSS-->
  <link href="<?= base_url() ?>/assets/css/font-face.css" rel="stylesheet" media="all">
  <link href="<?= base_url() ?>/assets/vendorr/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
  <link href="<?= base_url() ?>/assets/vendorr/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
  <link href="<?= base_url() ?>/assets/vendorr/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

  <!-- Bootstrap CSS-->
  <link href="<?= base_url() ?>/assets/vendorr/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

  <!-- Vendor CSS-->
  <link href="<?= base_url() ?>/assets/vendorr/animsition/animsition.min.css" rel="stylesheet" media="all">
  <link href="<?= base_url() ?>/assets/vendorr/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
  <link href="<?= base_url() ?>/assets/vendorr/wow/animate.css" rel="stylesheet" media="all">
  <link href="<?= base_url() ?>/assets/vendorr/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
  <link href="<?= base_url() ?>/assets/vendorr/slick/slick.css" rel="stylesheet" media="all">
  <!-- <link href="<?= base_url() ?>/assets/vendorr/select2/select2.min.css" rel="stylesheet" media="all"> -->
  <link href="<?= base_url() ?>/assets/vendorr/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

  <!-- Main CSS-->
  <link href="<?= base_url() ?>/assets/css/theme.css" rel="stylesheet" media="all">



  <!-- Propeller card (CSS for helping component example file)-->
  <link href="https://opensource.propeller.in/components/card/css/card.css" type="text/css" rel="stylesheet" />

  <!-- Example docs (CSS for helping component example file)-->
  <link href="https://opensource.propeller.in/docs/css/example-docs.css" type="text/css" rel="stylesheet" />

  <!-- Propeller typography (CSS for helping component example file) -->
  <link href="https://opensource.propeller.in/components/typography/css/typography.css" type="text/css" rel="stylesheet" />

  <!-- Google Icon Font -->
  <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!-- <link href="css/google-icons.css" type="text/css" rel="stylesheet" /> -->

  <!-- Propeller Checkbox -->
  <link href="https://opensource.propeller.in/components/checkbox/css/checkbox.css" type="text/css" rel="stylesheet" />

  <!-- Propeller textfield -->
  <link href="https://opensource.propeller.in/components/textfield/css/textfield.css" type="text/css" rel="stylesheet" />

  <!-- Propeller Radio -->
  <link href="https://opensource.propeller.in/components/radio/css/radio.css" type="text/css" rel="stylesheet" />

  <!-- Propeller Toggle -->
  <link href="https://opensource.propeller.in/components/toggle-switch/css/toggle-switch.css" type="text/css" rel="stylesheet" />

  <link href="<?= base_url() ?>/assets/css/select2.min.css" type="text/css" rel="stylesheet" />
  <link href="<?= base_url() ?>/assets/css/select2-bootstrap.css" type="text/css" rel="stylesheet" />
  <link href="<?= base_url() ?>/assets/css/pmd-select2.css" type="text/css" rel="stylesheet" />
</head>

<body class="animsition">
  <div class="page-wrapper">
    <!-- HEADER MOBILE-->
    <header class="header-mobile d-block d-lg-none">
      <div class="header-mobile__bar">
        <div class="container-fluid">
          <div class="header-mobile-inner">
            <a class="logo" href="index.html">
              <img src="<?= base_url() ?>/assets/images/logo1.png" alt="CoolAdmin" />
            </a>
            <button class="hamburger hamburger--slider" type="button">
              <span class="hamburger-box">
                <span class="hamburger-inner"></span>
              </span>
            </button>
          </div>
        </div>
      </div>
      <nav class="navbar-mobile">
        <div class="container-fluid">
          <ul class="navbar-mobile__list list-unstyled">
            <li class="has-sub">
              <a class="js-arrow" href="#">
                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
              <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                <li>
                  <a href="index.html">Dashboard 1</a>
                </li>
                <li>
                  <a href="index2.html">Dashboard 2</a>
                </li>
                <li>
                  <a href="index3.html">Dashboard 3</a>
                </li>
                <li>
                  <a href="index4.html">Dashboard 4</a>
                </li>
              </ul>
            </li>
            <li>
              <a href="chart.html">
                <i class="fas fa-chart-bar"></i>Charts</a>
            </li>
            <li>
              <a href="table.html">
                <i class="fas fa-table"></i>Tables</a>
            </li>
            <li>
              <a href="form.html">
                <i class="far fa-check-square"></i>Forms</a>
            </li>
            <li>
              <a href="calendar.html">
                <i class="fas fa-calendar-alt"></i>Calendar</a>
            </li>
            <li>
              <a href="map.html">
                <i class="fas fa-map-marker-alt"></i>Maps</a>
            </li>
            <li class="has-sub">
              <a class="js-arrow" href="#">
                <i class="fas fa-copy"></i>Pages</a>
              <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                <li>
                  <a href="login.html">Login</a>
                </li>
                <li>
                  <a href="register.html">Register</a>
                </li>
                <li>
                  <a href="forget-pass.html">Forget Password</a>
                </li>
              </ul>
            </li>
            <li class="has-sub">
              <a class="js-arrow" href="#">
                <i class="fas fa-desktop"></i>UI Elements</a>
              <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                <li>
                  <a href="button.html">Button</a>
                </li>
                <li>
                  <a href="badge.html">Badges</a>
                </li>
                <li>
                  <a href="tab.html">Tabs</a>
                </li>
                <li>
                  <a href="card.html">Cards</a>
                </li>
                <li>
                  <a href="alert.html">Alerts</a>
                </li>
                <li>
                  <a href="progress-bar.html">Progress Bars</a>
                </li>
                <li>
                  <a href="modal.html">Modals</a>
                </li>
                <li>
                  <a href="switch.html">Switchs</a>
                </li>
                <li>
                  <a href="grid.html">Grids</a>
                </li>
                <li>
                  <a href="fontawesome.html">Fontawesome Icon</a>
                </li>
                <li>
                  <a href="typo.html">Typography</a>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </nav>
    </header>
    <!-- END HEADER MOBILE-->

    <!-- MENU SIDEBAR-->
    <aside class="menu-sidebar d-none d-lg-block">
      <div class="logo">
        <a href="#">
          <img src="<?= base_url() ?>/assets/images/logo1.png" alt="Cool Admin" width="90%" />
        </a>
      </div>
      <div class="menu-sidebar__content js-scrollbar1">
        <nav class="navbar-sidebar">
          <ul class="list-unstyled navbar__list">
            <li>
              <a href="chart.html">
                <i class="fa fa-tachometer"></i>Dashboard</a>
            </li>
            <?php if (session()->get('role') == "Admin") : ?>
              <li>
                <a href="<?= base_url('supplier') ?>">
                  <i class="fa fa-archive"></i>Supplier</a>
              </li>
              <li>
                <a href="<?= base_url('pegawai') ?>">
                  <i class="fa fa-user"></i>Pegawai</a>
              </li>
              <li>
                <a href="<?= base_url('barang') ?>">
                  <i class="fa fa-archive"></i>Data Barang</a>
              </li>
              <li>
                <a href="<?= base_url('customer') ?>">
                  <i class="fa fa-users"></i>Customer</a>
              </li>
              <li>
                <a href="<?= base_url('pesanan') ?>">
                  <i class="fa fa-cubes"></i>Pesanan</a>
              </li>
            <?php endif; ?>
            <?php if (session()->get('role') == "Gudang") : ?>

              <li>
                <a href="<?= base_url('pembelian') ?>">
                  <i class="fas fa-shopping-cart"></i>Pembelian</a>
              </li>
            <?php endif; ?>
            <?php if (session()->get('role') == "Customer") : ?>

              <li>
                <a href="<?= base_url('order') ?>">
                  <i class="fas fa-shopping-cart"></i>Order</a>
              </li>
            <?php endif; ?>
            <li>
              <a href="<?= base_url('logout') ?>">
                <i class="fa fa-sign-out"></i>Logout</a>
            </li>
          </ul>
        </nav>
      </div>
    </aside>
    <!-- END MENU SIDEBAR-->

    <!-- PAGE CONTAINER-->
    <div class="page-container">
      <!-- HEADER DESKTOP-->
      <header class="header-desktop">
        <div class="section__content section__content--p30">
          <div class="container-fluid">
            <div class="header-wrap">
              &nbsp;
              <div class="header-button">
                <div class="account-wrap">
                  <div class="account-item clearfix js-item-menu">
                    <div class="content">
                      <a class="js-acc-btn" href="#"><?= session()->get('role') == 'Admin' ? 'Administrator' : session()->get('nama') ?></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </header>
      <!-- HEADER DESKTOP-->

      <!-- MAIN CONTENT-->
      <div class="main-content">
        <div class="section__content section__content--p30">
          <div class="container-fluid">
            <?= $this->renderSection('content'); ?>

          </div>
        </div>
      </div>
    </div>
  </div>


  </div>

  <!-- Jquery JS-->
  <script src="<?= base_url() ?>/assets/vendorr/jquery-3.2.1.min.js"></script>

  <script src="<?= base_url() ?>/libs/angular/angular.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/angular-sanitize/1.8.2/angular-sanitize.min.js" integrity="sha512-JkCv2gG5E746DSy2JQlYUJUcw9mT0vyre2KxE2ZuDjNfqG90Bi7GhcHUjLQ2VIAF1QVsY5JMwA1+bjjU5Omabw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/angular-ui-router/1.0.30/angular-ui-router.min.js" integrity="sha512-HdDqpFK+5KwK5gZTuViiNt6aw/dBc3d0pUArax73z0fYN8UXiSozGNTo3MFx4pwbBPldf5gaMUq/EqposBQyWQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/angular-animate/1.8.2/angular-animate.min.js" integrity="sha512-jZoujmRqSbKvkVDG+hf84/X11/j5TVxwBrcQSKp1W+A/fMxmYzOAVw+YaOf3tWzG/SjEAbam7KqHMORlsdF/eA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="<?= base_url() ?>/js/apps.js"></script>
  <script src="<?= base_url() ?>/js/services/helper.services.js"></script>
  <script src="<?= base_url() ?>/js/services/auth.services.js"></script>
  <script src="<?= base_url() ?>/js/services/admin.services.js"></script>
  <script src="<?= base_url() ?>/js/services/pesan.services.js"></script>
  <script src="<?= base_url() ?>/js/controllers/admin.controllers.js"></script>
  <script src="<?= base_url() ?>/js/components/components.js"></script>
  <script src="<?= base_url() ?>/libs/angular-ui-select2/src/select2.js"></script>
  <script src="<?= base_url() ?>/libs/angular-datatables/dist/angular-datatables.js"></script>
  <script src="<?= base_url() ?>/libs/angular-locale_id-id.js"></script>
  <script src="<?= base_url() ?>/libs/input-mask/angular-input-masks-standalone.min.js"></script>
  <script src="<?= base_url() ?>/libs/jquery.PrintArea.js"></script>
  <script src="<?= base_url() ?>/libs/angular-base64-upload/dist/angular-base64-upload.min.js"></script>
  <script src="<?= base_url() ?>/libs/sweetalert2/dist/sweetalert2.all.min.js"></script>
  <script src="<?= base_url() ?>/libs/datatables/jquery.dataTables.min.js"></script>
  <script src="<?= base_url() ?>/libs/datatables/dataTables.bootstrap4.min.js"></script>
  <script src="<?= base_url() ?>/libs/datatables/dataTables.responsive.min.js"></script>
  <script src="<?= base_url() ?>/libs/datatables/btn.js"></script>
  <script src="<?= base_url() ?>/libs/datatables/print.js"></script>
  <script src="<?= base_url() ?>/libs/loading/dist/loadingoverlay.min.js"></script>
  <script src="https://printjs-4de6.kxcdn.com/print.min.js"></script>
  <!-- Bootstrap JS-->
  <script src="<?= base_url() ?>/assets/vendorr/bootstrap-4.1/popper.min.js"></script>
  <script src="<?= base_url() ?>/assets/vendorr/bootstrap-4.1/bootstrap.min.js"></script>
  <!-- Vendor JS       -->
  <script src="<?= base_url() ?>/assets/vendorr/slick/slick.min.js">
  </script>
  <script src="<?= base_url() ?>/assets/vendorr/wow/wow.min.js"></script>
  <script src="<?= base_url() ?>/assets/vendorr/animsition/animsition.min.js"></script>
  <script src="<?= base_url() ?>/assets/vendorr/bootstrap-progressbar/bootstrap-progressbar.min.js">
  </script>
  <script src="<?= base_url() ?>/assets/vendorr/counter-up/jquery.waypoints.min.js"></script>
  <script src="<?= base_url() ?>/assets/vendorr/counter-up/jquery.counterup.min.js">
  </script>
  <script src="<?= base_url() ?>/assets/vendorr/circle-progress/circle-progress.min.js"></script>
  <script src="<?= base_url() ?>/assets/vendorr/perfect-scrollbar/perfect-scrollbar.js"></script>
  <script src="<?= base_url() ?>/assets/vendorr/chartjs/Chart.bundle.min.js"></script>
  <script src="<?= base_url() ?>/assets/vendorr/select2/select2.min.js"></script>
  <script type="text/javascript" src="<?= base_url() ?>/assets/js/pmd-select2.js"></script>
  <!-- Main JS-->
  <script src="<?= base_url() ?>/assets/js/main.js"></script>

  <!-- Propeller Global js -->
  <script src="https://opensource.propeller.in/components/global/js/global.js"></script>

  <!-- Propeller checkbox js -->
  <script type="text/javascript" src="https://opensource.propeller.in/components/checkbox/js/checkbox.js"></script>

  <!-- Propeller checkbox js -->
  <script type="text/javascript" src="https://opensource.propeller.in/components/textfield/js/textfield.js"></script>

  <!-- Propeller checkbox js -->
  <script type="text/javascript" src="https://opensource.propeller.in/components/radio/js/radio.js"></script>
  <script>
    $(".select-add-tags").select2({
      tags: true,
      theme: "bootstrap",
    })
  </script>

</body>

</html>
<!-- end document-->