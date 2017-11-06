<?php
    session_start();
    if(!isset($_SESSION['username'])){
        $url = 'http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'/login-page.php';
        header('Location:'.$url);
    }
    else{
            if(!empty($_POST['Title']) && !empty($_POST['Description']) && !empty($_POST['LastDate']) && !empty($_POST['Incentive'])){
                require_once('connect.php');
                $title = $_POST['Title'];
                $description = $_POST['Description'];
                $lastdate = $_POST['LastDate'];
                $incentive = $_POST['Incentive'];
                $username = $_SESSION['username'];

                $query = "INSERT INTO applyproject(title, description, lastdate, incentive, status, username, adddate) VALUES ('$title', '$description', '$lastdate', '$incentive', 'available', '$username', now())";
                mysqli_query($dbc, $query)
                or die('unable to query applyprojects');
                echo 'Added successfully!';
                mysqli_close($dbc);

            }
        }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>New Project </title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <!-- CSS Files -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../assets/css/now-ui-kit.css?v=1.1.0" rel="stylesheet" />
    <link rel="stylesheet" href="../css/uikit.min.css" />
        <script src="../js/uikit.min.js"></script>
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <!-- <link href="../assets/css/demo.css" rel="stylesheet" /> -->
</head>

<body class="login-page sidebar-collapse"> 
    <div class="pull-left">
        <h6>
        <a href="#pablo" class="link" style="color: black" data-toggle="modal" data-target="#myModal">New Projects</a>
        </h6>
    </div>

    <div class="modal fade modal-primary" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header justify-content-center">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                <i class="now-ui-icons ui-1_simple-remove"></i>
                            </button>
                            <h4 class="title title-up">Add Project Information </h4>
                        </div>
                    </div>
                    <div class="page-header page-header-small" filter-color="orange">
                        <div class="page-header-image" data-parallax="true" style="background-image: url('../assets/img/bg4.jpg');">
                        </div>
                        <div class="container">
                            <div class="content-center">
                                <div class="photo-container">
                                    <img src="" alt="">
                                </div>
                                <h3 class="title"></h3>
                                <p class="category"></p>
                                
                            </div>
                        </div>
                    </div>
                    <div class="modal-content">
                        <form method="post" action= "applyprojects.php">
                        <div class="modal-body">
                            <div class="content">
                                <br>
                                <br>
                                <div class="input-group form-group-no-border input-lg">
                                    <span class="input-group-addon">
                                        <i class="now-ui-icons business_bulb-63"></i>
                                    </span>
                                    <input type="text" placeholder="Title" class="form-control" value="" name="Title">
                                </div>
                                <div class="input-group form-group-no-border input-lg">
                                    <span class="input-group-addon">
                                        <i class="now-ui-icons text_align-left"></i>
                                    </span>
                                    <input type="text" placeholder="Description" class="form-control" value="" name="Description">
                                </div>
                                <div class="input-group form-group-no-border input-lg">
                                    <span class="input-group-addon">
                                        <i class="now-ui-icons ui-1_calendar-60"></i>
                                    </span>
                                    <input type="date" placeholder="Last Date" class="form-control" value="" name="LastDate">
                                </div>
                                <div class="input-group form-group-no-border input-lg">
                                    <span class="input-group-addon">
                                        <i class="now-ui-icons business_money-coins"></i>
                                    </span>
                                    <input type="number" class="form-control" placeholder="Incentive" value="" name="Incentive">
                                </div>
                            </div>
                            <div class="footer text-center">
                                <input type="submit" href="#pablo" class="btn btn-primary btn-neutral btn-round btn-lg btn-block" value="Save">
                            </div>
                        </div>
                        </form>
                        <div class="modal-footer">
                            
                        </div>
                    </div>
                </div>
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