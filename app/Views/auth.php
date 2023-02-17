<!DOCTYPE html>
<html lang="en" ng-app="auth" ng-controller="authController">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Login</title>

    <!-- Fontfaces CSS-->
    <link href="<?= base_url() ?>/assets/css/font-face.css" rel="stylesheet" media="all">
    <link href="<?= base_url() ?>/assets/vendorr/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="<?= base_url() ?>/assets/vendorr/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="<?= base_url() ?>/assets/vendorr/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="<?= base_url() ?>/assets/vendorr/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="<?= base_url() ?>/assets/vendorr/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="<?= base_url() ?>/assets/vendorr/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="<?= base_url() ?>/assets/vendorr/wow/animate.css" rel="stylesheet" media="all">
    <link href="<?= base_url() ?>/assets/vendorr/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="<?= base_url() ?>/assets/vendorr/slick/slick.css" rel="stylesheet" media="all">
    <link href="<?= base_url() ?>/assets/vendorr/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="<?= base_url() ?>/assets/vendorr/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="<?= base_url() ?>/assets/css/theme.css" rel="stylesheet" media="all">

</head>

<body class="animsition">
    <div class="page-wrapper">
        <div class="page-content--bge5">
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content">
                        <div class="login-logo">
                            <a href="#">
                                <img src="<?= base_url() ?>/assets/images/logo1.png" alt="CoolAdmin" width="50%">
                            </a>
                        </div>
                        <div class="login-form">
                            <form ng-submit="login()">
                                <div class="form-group">
                                    <label>Username</label>
                                    <input class="au-input au-input--full" type="text" name="email" ng-model="model.username" placeholder="Username">
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input class="au-input au-input--full" type="password" name="password" ng-model="model.password" placeholder="Password">
                                </div>
                                <!-- <div class="login-checkbox">
                                    <label>
                                        <input type="checkbox" name="remember">Remember Me
                                    </label>
                                    <label>
                                        <a href="#">Forgotten Password?</a>
                                    </label>
                                </div> -->
                                <button type="submit" class="au-btn au-btn--block au-btn--green m-b-20" type="submit">Login</button>
                            </form>
                            <!-- <div class="register-link">
                                <p>
                                    Don't you have account?
                                    <a href="#">Sign Up Here</a>
                                </p>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Jquery JS-->
    <script src="<?= base_url() ?>/assets/vendorr/jquery-3.2.1.min.js"></script>
    <script src="<?= base_url() ?>/libs/angular/angular.min.js"></script>

    <script src="<?= base_url() ?>/js/services/helper.services.js"></script>
    <script src="<?= base_url() ?>/js/services/pesan.services.js"></script>
    <script src="<?= base_url() ?>/libs/sweetalert2/dist/sweetalert2.all.min.js"></script>
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
    <script src="<?= base_url() ?>/assets/vendorr/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="<?= base_url() ?>/assets/js/main.js"></script>

    <script>
        angular.module("auth", ["helper.service", "message.service"])
            .controller("authController", authController);

        function authController($scope, $http, helperServices, pesan) {
            $scope.model = {};

            $scope.login = () => {
                $http({
                    method: 'post',
                    url: helperServices.url + '/login',
                    data: $scope.model,
                    headers: {
                        'Content-Type': 'application/json'
                    }
                }).then(
                    (res) => {
                        document.location.href = helperServices.url + "home";
                        // if (res.data.role == 'Admin')
                        // else
                        //     document.location.href = helperServices.url + "/home";
                        // pesan.dialog("Daftar Berhasil", 'OK', false, "info").then(ress => {
                        // });
                    },
                    (err) => {
                        pesan.error(err.data.message);
                    }
                );
            }
        }
    </script>

</body>

</html>
<!-- end document-->