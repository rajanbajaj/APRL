<?php
    require_once('start-session.php');
    if(isset($_SESSION['username'])){
        $url = 'http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'/profile-page.php';
        header('Location:'.$url); 
    }
    if(!isset($_POST['submit']))
        require_once('signup.php')

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Login Page </title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <!-- CSS Files -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../assets/css/now-ui-kit.css?v=1.1.0" rel="stylesheet" />
    <link rel="stylesheet" href="css/uikit.min.css" />
        <script src="js/uikit.min.js"></script>
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="../assets/css/demo.css" rel="stylesheet" />
</head>

<body class="login-page sidebar-collapse">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-primary fixed-top navbar-transparent " color-on-scroll="400">
        <div class="container">
            <div class="dropdown button-dropdown">
                <a href="#pablo" class="dropdown-toggle" id="navbarDropdown" data-toggle="dropdown">
                    <span class="button-bar"></span>
                    <span class="button-bar"></span>
                    <span class="button-bar"></span>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-header">Dropdown header</a>
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <a class="dropdown-item" href="#">Something else here</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Separated link</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">One more separated link</a>
                </div>
            </div>
            <div class="navbar-translate">
                <a class="navbar-brand" href="http://demos.creative-tim.com/now-ui-kit/index.html" rel="tooltip" title="Designed by Invision. Coded by Creative Tim" data-placement="bottom" target="_blank">
                    APRl
                </a>
                <button class="navbar-toggler navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-bar bar1"></span>
                    <span class="navbar-toggler-bar bar2"></span>
                    <span class="navbar-toggler-bar bar3"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse justify-content-end" id="navigation" data-nav-image="../assets/img/blurred-image-1.jpg">
            </div>
        </div>
    </nav>
    <!-- End Navbar -->
    <div class="page-header" filter-color="orange">
        <div class="page-header-image" style="background-image:url(../assets/img/login.jpg)"></div>
        <div class="container">
            <div class="col-md-4 content-center">
                <div class="card card-login card-plain">
                    <form class="form" method="post" action="login.php">
                        <div class="header header-primary text-center">
                            <div class="logo-container">
                                <img src="../assets/img/now-logo.png" alt="">
                            </div>
                        </div>
                                <div class="content">
                                    <div class="input-group form-group-no-border input-lg">
                                        <span class="input-group-addon">
                                            <i class="now-ui-icons users_circle-08"></i>
                                        </span>
                                        <input type="text" class="form-control" placeholder="Username" name="Username">
                                    </div>
                                    <div class="input-group form-group-no-border input-lg">
                                        <span class="input-group-addon">
                                            <i class="now-ui-icons objects_key-25"></i>
                                        </span>
                                        <input type="password" placeholder="Password" class="form-control" name="Password" />
                                    </div>
                                </div>
                                <div class="footer text-center">
                                    <input type="submit" class="btn btn-primary btn-round btn-lg btn-block" value="Login">
                                </div>
                        </form>
                        <div class="pull-left">
                            <h6>
                                <a href="#pablo" class="link" data-toggle="modal" data-target="#myModal">Create Account</a>
                            </h6>
                        </div>
                        <div class="pull-right">
                            <h6>
                                <a href="#pablo" class="link">Need Help?</a>
                            </h6>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!--<div class="modal fade modal-primary" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header justify-content-center">
                        <div class="modal-profile">
                            <i class="now-ui-icons users_circle-08"></i>
                        </div>
                    </div>
                    <div class="modal-body">
                        <p>Always have an access to your profile</p>
                    </div>
                    <div class="footer">
                        <button class="btn btn-primary btn-simple btn-round" type="button">Simple</button>
                    </div>
                </div>
            </div>
        </div>-->
        <div class="modal fade modal-primary" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header justify-content-center">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                            <i class="now-ui-icons ui-1_simple-remove"></i>
                        </button>
                        <h4 class="title title-up">JOIN THE NETWORK</h4>
                    </div>
                    <form method="post" action= "login-page.php">
                    <div class="modal-body">
                        <div class="content">
                            <br>
                            <br>
                            <div class="input-group form-group-no-border input-lg">
                                <span class="input-group-addon">
                                    <i class="now-ui-icons text_caps-small"></i>
                                </span>
                                <input type="text" class="form-control" placeholder="Firstname" name="Firstname">
                            </div>
                            <div class="input-group form-group-no-border input-lg">
                                <span class="input-group-addon">
                                    <i class="now-ui-icons text_caps-small"></i>
                                </span>
                                <input type="text" class="form-control" placeholder="Lastname" name="Lastname">
                            </div>
                            <div class="input-group form-group-no-border input-lg">
                                <span class="input-group-addon">
                                    <i class="now-ui-icons users_circle-08"></i>
                                </span>
                                <input type="text" class="form-control" placeholder="Username" name="Username">
                            </div>
                            <div class="input-group form-group-no-border input-lg">
                                <span class="input-group-addon">
                                    <i class="now-ui-icons business_briefcase-24"></i>
                                </span>
                                <select  id="Profession" style="height: 46px; color: #dfd3cf" class="form-control" name="Profession">
                                    <option value="student">Student</option>
                                    <option value="faculty">Faculty</option>
                                </select>
                            </div>
                            <div class="input-group form-group-no-border input-lg">
                                <span class="input-group-addon">
                                    <i class="now-ui-icons objects_key-25"></i>
                                </span>
                                <input type="password" placeholder="Password" class="form-control" name="Password" />
                            </div>

                        </div>
                        <div class="footer text-center">
                            <input type="submit" href="#pablo" class="btn btn-primary btn-neutral btn-round btn-lg btn-block" value="Sign Up">
                        </div>
                    </div>
                    </form>
                    <div class="modal-footer">
                        
                    </div>
                </div>
            </div>
        </div>
        <footer class="footer">
            <div class="container">
               
                <div class="copyright">
                    &copy;
                    <script>
                        document.write(new Date().getFullYear())
                    </script>, View Code at
                    <a href="http://www.github.com/SerChirag/APRL" target="_blank">GitHub</a>
                </div>
            </div>
        </footer>
    </div>
</body>
<!--   Core JS Files   -->
<script src="../assets/js/core/jquery.3.2.1.min.js" type="text/javascript"></script>
<script src="../assets/js/core/popper.min.js" type="text/javascript"></script>
<script src="../assets/js/core/bootstrap.min.js" type="text/javascript"></script>
<!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
<script src="../assets/js/plugins/bootstrap-switch.js"></script>
<!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
<script src="../assets/js/plugins/nouislider.min.js" type="text/javascript"></script>
<!--  Plugin for the DatePicker, full documentation here: https://github.com/uxsolutions/bootstrap-datepicker -->
<script src="../assets/js/plugins/bootstrap-datepicker.js" type="text/javascript"></script>
<!-- Control Center for Now Ui Kit: parallax effects, scripts for the example pages etc -->
<script src="../assets/js/now-ui-kit.js?v=1.1.0" type="text/javascript"></script>

</html>
