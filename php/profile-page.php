<?php
session_start();
if(!isset($_SESSION['username'])){
    $url = 'http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'/login-page.php';
    header('Location:'.$url);
}
// else{
//     if(!empty($_POST['Title']) && !empty($_POST['Description']) && !empty($_POST['LastDate']) && !empty($_POST['Incentive'])){
//         require('connect.php');
//         $title = $_POST['Title'];
//         $description = $_POST['Description'];
//         $lastdate = $_POST['LastDate'];
//         $incentive = $_POST['Incentive'];
//         $username = $_SESSION['username'];

//         $query = "INSERT INTO applyproject(title, description, lastdate, incentive, status, username, adddate) VALUES ('$title', '$description', '$lastdate', '$incentive', 'available', '$username', now())";
//         mysqli_query($dbc, $query)
//         or die('unable to query applyprojects');
//         echo 'Added successfully!';
//         $row = mysqli_fetch_array($result);
//         $firstname = $row['firstname'];
//         $lastname = $row['lastname'];
//         $name = $firstname.' '.$lastname;
//         $credential = $row['credential'];
//         $image = $row['image_url'];
//         $description = $row['description'];
//         $email = $row['email'];
//         if($image!='fb_avatar_male.jpg')
//             $image = $username.'/'.$image;
//         mysqli_close($dbc);

//     }
// }
$username = $_SESSION['username'];
if(isset($_GET['username'])){
    $username = $_GET['username'];
}
    // echo $username;
    require('connect.php');

    $query = "SELECT profession FROM userlogin WHERE username = '$username'";
    $result = mysqli_query($dbc, $query);
    $row = mysqli_fetch_array($result);
    $profession = $row['profession'];
    $var=$profession."info";
    
    $query = "SELECT * FROM $var WHERE username = '$username'";
    $result = mysqli_query($dbc, $query)
    or die('Unable to query studentinfo' );

    $row = mysqli_fetch_array($result);
    $firstname = $row['firstname'];
    $lastname = $row['lastname'];
    $credential = $row['credential'];
    $image = $row['image_url'];
    $description = $row['description'];
    $email = $row['email'];
    // if($image!='fb_avatar_male.jpg')
    //     $image = $username.'/'.$image;
    mysqli_close($dbc);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="../assets/favicon/favicon-16x16.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title><?= $firstname." ".$lastname ?></title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <!-- CSS Files -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../assets/css/now-ui-kit.css?v=1.1.0" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="../assets/css/demo.css" rel="stylesheet" />
    <link href="../assets/css/daddy.css" rel="stylesheet" />
</head>

<body class="profile-page sidebar-collapse">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-primary fixed-top navbar-transparent " color-on-scroll="400">
        <div class="container">
            <div class="navbar-translate">
                <a class="navbar-brand" href="landing-page.php"  data-placement="bottom" target="_blank">
                    <img src="../assets/favicon/invert.png" id="logo_id">
                </a>
            </div>
            <div class="collapse navbar-collapse justify-content-end" id="navigation" data-nav-image="../assets/img/blurred-image-1.jpg">
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="input-group form-group-no-border ">
                    <span class="input-group-addon">
                        <i class="now-ui-icons ui-1_zoom-bold"></i>
                    </span>
                    <input type="text" class="form-control" id="search_bar" placeholder="Search..." name="search_bar">
                </div>
            </div>
            <div class="dropdown button-dropdown">
                <a href="#pablo" class="dropdown-toggle" id="navbarDropdown" data-toggle="dropdown">
                    <img class="photo-container" src= <?php echo '"../assets/img/user/'.$image.'"'?> alt="Profile Picture" id="daddy_image">
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown" data-placement="left">
                    <a class="dropdown-item" href="profile-page.php">Profile</a>
                    <a class="dropdown-item" href="blog.php">Blog</a>
                    <a class="dropdown-item" href="project.php">Project</a>
                    <?php if($profession=='faculty') echo '<a class="dropdown-item" href="#" data-toggle="modal" data-target="#myModal1">New Peoject</a>'; ?>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="edit-profile.php" >Edit Profile</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="logout.php">Logout</a>
                </div>
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
                        <img class="photo-container" src= <?php echo '"../assets/img/user/'.$image.'"'?> alt="Profile Picture">
                    </div>
                    <h3 class="title"><?php echo ("$firstname $lastname");?></h3>
                    <p class="category"><?php echo $credential?></p>
                    
                </div>
            </div>
        </div>
        <div class="section">
            <div class="container">
                
                <h3 class="title">About me</h3>
                <h5 class="description"><?php echo $description ?></h5>

                
                <div class="row">
                    <div class="col-md-6 col-lg-6">
                    <div class="card card-blog">
                            <!--<div class="card-image">
                                <img class="img rounded" src="../assets/img/project13.jpg">
                            </div>-->
                            <div class="card-body">
                                <h6 class="category text-warning">
                                    <i class="now-ui-icons media-1_album"></i> My Blogs
                                </h6>
                                <div class="row">
                                    <div class="col-md-6 col-lg-6">
                                    <div class="card" data-background-color="red">
                                        <div class="card-body">
                                            <h6 class="category-social">
                                                <i class="fa fa-fire"></i> Most Liked
                                            </h6>
                                            <p class="card-description">
                                                "The supreme art of war is to subdue the enemy without fighting."
                                            </p>
                                            <div class="card-footer">
                                                <div class="author">
                                                    <img src="assets/img/julie.jpg" alt="..." class="avatar img-raised">
                                                    <span>Susan B. Anthony</span>
                                                </div>
                                                <div class="stats stats-right">
                                                    <i class="now-ui-icons ui-2_favourite-28"></i> 10.4K ·
                                                    <i class="now-ui-icons files_single-copy-04"></i> 425
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                    <div class="col-md-6 col-lg-6">
                                    <div class="card" data-background-color="red">
                                        <div class="card-body">
                                            <h6 class="category-social">
                                                <i class="fa fa-fire"></i> Most Liked
                                            </h6>
                                            <p class="card-description">
                                                "The supreme art of war is to subdue the enemy without fighting."
                                            </p>
                                            <div class="card-footer">
                                                <div class="author">
                                                    <img src="assets/img/julie.jpg" alt="..." class="avatar img-raised">
                                                    <span>Susan B. Anthony</span>
                                                </div>
                                                <div class="stats stats-right">
                                                    <i class="now-ui-icons ui-2_favourite-28"></i> 10.4K ·
                                                    <i class="now-ui-icons files_single-copy-04"></i> 425
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                <div class="card-footer text-center" style="background-color: white;">
                                    <a href="#pablo" class="btn btn-default btn-round">All Blogs</a>
                                </div>
                            </div>
                    </div>
                    </div>
                    <div class="col-md-6 col-lg-6">
                    <div class="card card-blog">
                           <!-- <div class="card-image">
                                <img class="img rounded" src="../assets/img/project13.jpg">
                            </div> -->
                            <div class="card-body">
                                <h6 class="category text-warning">
                                    <i class="now-ui-icons education_atom"></i> My Projects
                                </h6>
                                <div class="row">
                                    <div class="col-md-6 col-lg-6">
                                    <div class="card" data-background-color="red">
                                        <div class="card-body">
                                            <h6 class="category-social">
                                                <i class="now-ui-icons ui-2_time-alarm"></i> Most Recent
                                            </h6>
                                            <p class="card-description">
                                                "The supreme art of war is to subdue the enemy without fighting."
                                            </p>
                                            <div class="card-footer">
                                                <div class="author">
                                                    <img src="assets/img/julie.jpg" alt="..." class="avatar img-raised">
                                                    <span>Susan B. Anthony</span>
                                                </div>
                                                <div class="stats stats-right">
                                                    <i class="now-ui-icons ui-2_favourite-28"></i> 10.4K ·
                                                    <i class="now-ui-icons files_single-copy-04"></i> 425
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                    <div class="col-md-6 col-lg-6">
                                    <div class="card" data-background-color="red">
                                        <div class="card-body">
                                            <h6 class="category-social">
                                                <i class="now-ui-icons ui-2_time-alarm"></i> Most Recent
                                            </h6>
                                            <p class="card-description">
                                                "The supreme art of war is to subdue the enemy without fighting."
                                            </p>
                                            <div class="card-footer">
                                                <div class="author">
                                                    <img src="assets/img/julie.jpg" alt="..." class="avatar img-raised">
                                                    <span>Susan B. Anthony</span>
                                                </div>
                                                <div class="stats stats-right">
                                                    <i class="now-ui-icons ui-2_favourite-28"></i> 10.4K ·
                                                    <i class="now-ui-icons files_single-copy-04"></i> 425
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                <div class="card-footer text-center" style="background-color: white;">
                                    <a href="myproject.php?username=<?php echo $username; ?>" class="btn btn-default btn-round">My all Projects</a>
                                </div>
                            </div>
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

<script type="text/javascript">

    $(document).ready(function() {
        $('#search_bar').keyup(function(e) {
            if(e.which==13){
                var parameter_search=$('#search_bar').val();
                window.open("search.php?id="+parameter_search);

            }
        });
        

    });
    
</script>

</html>