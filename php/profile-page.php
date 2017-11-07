<?php
    session_start();
    if(!isset($_SESSION['username'])){
        $url = 'http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'/login-page.php';
        header('Location:'.$url);
    }
    else{
            if(!empty($_POST['Title']) && !empty($_POST['Description']) && !empty($_POST['LastDate']) && !empty($_POST['Incentive'])){
                require('connect.php');
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
        $username = $_SESSION['username'];
        require('connect.php');
        
        $query = "SELECT profession FROM userlogin WHERE username = '$username'";
        $result = mysqli_query($dbc, $query);
        $row = mysqli_fetch_array($result);
        $profession = $row['profession'];
        if($row['profession']=='student')
            $var = 'studentinfo';
        if($row['profession']=='faculty')
            $var = 'facultyinfo';
        $query = "SELECT * FROM $var WHERE username = '$username'";
        $result = mysqli_query($dbc, $query)
        or die('Unable to query studentinfo' );

        $row = mysqli_fetch_array($result);
        $name = $row['name'];
        $credential = $row['credential'];
        $image = $row['image_url'];
        $description = $row['description'];
        $email = $row['email'];
        if($image!='fb_avatar_male.jpg')
            $image = $username.'/'.$image;
        mysqli_close($dbc);
}
    
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title><?= $name ?></title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <!-- CSS Files -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../assets/css/now-ui-kit.css?v=1.1.0" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="../assets/css/demo.css" rel="stylesheet" />
</head>

<body class="profile-page sidebar-collapse">
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
                    <?php if($profession=='faculty') echo '<a class="dropdown-item" href="#" data-toggle="modal" data-target="#myModal1">New Peoject</a>'; ?>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="edit-profile.php" >Edit Profile</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="logout.php">Logout</a>
                </div>
            </div>
            <div class="navbar-translate">
                <a class="navbar-brand" href="http://demos.creative-tim.com/now-ui-kit/index.html" rel="tooltip" title="Designed by Invision. Coded by Creative Tim" data-placement="bottom" target="_blank">
                    APRL
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
    <div class="wrapper">
        <div class="page-header page-header-small" filter-color="orange">
            <div class="page-header-image" data-parallax="true" style="background-image: url('../assets/img/bg4.jpg');">
            </div>
            <div class="container">
                <div class="content-center">
                    <div class="photo-container">
                        <img src= <?php echo '"../assets/img/'.$image.'"'?> alt="">
                    </div>
                    <h3 class="title"><?php echo $name?></h3>
                    <p class="category"><?php echo $credential?></p>
                    
                </div>
            </div>
        </div>
        <div class="section">
            <div class="container">
                
                <h3 class="title">About me</h3>
                <h5 class="description"><?php echo $description ?></h5>

                
                <div class="row">
                    <div class="col-md-6 ml-auto mr-auto">
                        <h4 class="title text-center">Projects</h4>
                        <div class="row">
                        <div class="card card-signup" data-background-color="orange">
                            <form class="form" method="" action="">
                                <div class="header text-center">
                                    <h4 class="title title-up">Sign Up</h4>
                                    <div class="social-line">
                                        <a href="#pablo" class="btn btn-neutral btn-facebook btn-icon btn-round">
                                            <i class="fa fa-facebook-square"></i>
                                        </a>
                                        <a href="#pablo" class="btn btn-neutral btn-twitter btn-icon btn-lg btn-round">
                                            <i class="fa fa-twitter"></i>
                                        </a>
                                        <a href="#pablo" class="btn btn-neutral btn-google btn-icon btn-round">
                                            <i class="fa fa-google-plus"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="input-group form-group-no-border">
                                        <span class="input-group-addon">
                                            <i class="now-ui-icons users_circle-08"></i>
                                        </span>
                                        <input type="text" class="form-control" placeholder="First Name...">
                                    </div>
                                    <div class="input-group form-group-no-border">
                                        <span class="input-group-addon">
                                            <i class="now-ui-icons text_caps-small"></i>
                                        </span>
                                        <input type="text" placeholder="Last Name..." class="form-control" />
                                    </div>
                                    <!-- If you want to add a checkbox to this form, uncomment this code -->
                                    <!-- <div class="checkbox">
                                    <input id="checkboxSignup" type="checkbox">
                                        <label for="checkboxSignup">
                                        Unchecked
                                        </label>
                                    </div> -->
                                </div>
                                <div class="footer text-center">
                                    <a href="#pablo" class="btn btn-neutral btn-round btn-lg">Get Started</a>
                                </div>
                            </form>
                        </div>
                    </div>
                    </div>
                    <!-- Tab panes -->
                   
                </div>
            </div>
        </div>
        <footer class="footer footer-default">
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
<!--
    <div class="modal fade modal-primary" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header justify-content-center">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                            <i class="now-ui-icons ui-1_simple-remove"></i>
                        </button>
                        <h4 class="title title-up">Edit Profile</h4>
                    </div>
                </div>
                <div class="page-header page-header-small" filter-color="orange">
                    <div class="page-header-image" data-parallax="true" style="background-image: url('../assets/img/bg4.jpg');">
                    </div>
                    <div class="container">
                        <div class="content-center">
                            <div class="photo-container">
                                <img src= <?php echo '"../assets/img/'.$image.'"'?> alt="">
                            </div>
                            <h3 class="title"><?php echo $name?></h3>
                            <p class="category"><?php echo $credential?></p>
                            
                        </div>
                    </div>
                </div>
                <div class="modal-content">
                    <form enctype="multipart/form-data" method="post" action= "editprofile.php">
                    <div class="modal-body">
                        <div class="content">
                            <br>
                            <br>
                            <div class="input-group form-group-no-border input-lg">
                                <span class="input-group-addon">
                                    <i class="now-ui-icons text_caps-small"></i>
                                </span>
                                <input type="text" class="form-control" placeholder="firstname" value=<?php echo '"'.$firstname.'"'?> name="FirstName">
                            </div>
                            <div class="input-group form-group-no-border input-lg">
                                <span class="input-group-addon">
                                    <i class="now-ui-icons text_caps-small"></i>
                                </span>
                                <input type="text" class="form-control" placeholder="lastname" value=<?php echo '"'.$lastname.'"'?> name="LastName">
                            </div>
                            <div class="input-group form-group-no-border input-lg">
                                <span class="input-group-addon">
                                    <i class="now-ui-icons business"></i>
                                </span>
                                <input type="text" class="form-control" placeholder="Credential" value=<?php echo '"'.$credential.'"'?> name="Credential">
                            </div>
                            <div class="input-group form-group-no-border input-lg">
                                <span class="input-group-addon">
                                    <i class="now-ui-icons text_caps-small"></i>
                                </span>
                                <input type="text" class="form-control" placeholder="Email" value=<?php echo '"'.$email.'"'?> name="Email">
                            </div>
                            <div class="input-group form-group-no-border input-lg">
                                <span class="input-group-addon">
                                    <i class="now-ui-icons text_caps-small"></i>
                                </span>
                                <input type="textarea" class="form-control" placeholder="Description" value=<?php echo '"'.$description.'"'?> name="Description">
                            </div>
                            <div class="input-group form-group-no-border input-lg">
                                <span class="input-group-addon">
                                    <i class="now-ui-icons text_caps-small"></i>
                                </span>
                                <input type="file" class="form-control" id="Image" name="Image" accept="image/*|.jpg|.png|.jpeg|.gif">
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
-->
        <!-- //faculty modal -->
        <div class="modal fade modal-primary" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                        <form method="post" action= "profile-page.php">
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