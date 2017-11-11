<?php
    session_start();
    if(!isset($_SESSION['username'])){
        $url = 'http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'/login-page.php';
        header('Location:'.$url);
    }
    else{
        define('APRL_UPLOADPATH', '../assets/img/');
        $username = $_SESSION['username'];
        require_once('connect.php');
         
        $query = "SELECT profession FROM userlogin WHERE username = '$username'";
        $result = mysqli_query($dbc, $query);
        $row = mysqli_fetch_array($result);
        $profession = $row['profession'];
        if($row['profession']=='student')
            $var = 'studentinfo';
        if($row['profession']=='faculty')
            $var = 'facultyinfo';

        if(isset($_POST['submit'])){
            //echo "HELLo4";
            $name = $_POST['Name'];
            $credential = $_POST['Credential'];
            $description = $_POST['Description'];
            $email = $_POST['Email'];
            if($profession == 'student')
             {  $cgpa = $_POST['CGPA'];}
            $image = $_FILES['Image']['name'];
            if(!is_dir(APRL_UPLOADPATH.$username."/")) {
                mkdir(APRL_UPLOADPATH.$username); 
            }
            if($profession == 'student'){
                $query = "UPDATE $var SET name = '$name', credential = '$credential',description = '$description', email = '$email', cgpa = '$cgpa' WHERE username = '$username' "; 
            }
            elseif($profession=='faculty'){
                $query = "UPDATE $var SET name = '$name', credential = '$credential',description = '$description', email = '$email' WHERE username = '$username' "; 
            }
            
            mysqli_query($dbc, $query)
            or die('Unable to query');

            if($image!=''){
                $query = "SELECT image_url FROM $var WHERE username = '$username'";
                $result = mysqli_query($dbc, $query);
                $row = mysqli_fetch_array($result);
                $old_image = $row['image_url'];
                if($old_image!='fb_avatar_male.jpg'){
                    $target = APRL_UPLOADPATH.$username.'/'.$old_image;
                    @unlink($target);
                }
                $query = "UPDATE $var SET image_url = '$image' WHERE username='$username'";
                mysqli_query($dbc, $query)
                or die('Unable to query1');
                $target = APRL_UPLOADPATH.$username.'/'.$image;
                move_uploaded_file($_FILES['Image']['tmp_name'], $target);
            }

            $query = "UPDATE userlogin SET name = '$name' WHERE username = '$username'";
            mysqli_query($dbc, $query)
            or die('Unable to query');
            //echo 'Update successful!';
    
            echo 'Update successfull. You will be automatically redirected to the other page.';
            $url = "profile-page.php";

            header ("Refresh: 3;URL='$url'");
        }
        $query = "SELECT * FROM $var WHERE username = '$username'";
        $result = mysqli_query($dbc, $query)
        or die('Unable to query studentinfo' );

        $row = mysqli_fetch_array($result);
        $name = $row['name'];
        $credential = $row['credential'];
        $image = $row['image_url'];
        $description = $row['description'];
        $email = $row['email'];
        if($profession == 'student')
            $cgpa = $row['cgpa'];
        if($image!='fb_avatar_male.jpg')
            $image = $username.'/'.$image;
        mysqli_close($dbc);
    }
?>
<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from demos.creative-tim.com/now-ui-kit-pro/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 30 Oct 2017 16:36:29 GMT -->
<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Edit Profile</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <!-- CSS Files -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../assets/css/now-ui-kit9f1e.css?v=1.1.0" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="../assets/css/demo.css" rel="stylesheet" />
    <!-- Canonical SEO -->
    <link rel="canonical" href="https://www.creative-tim.com/product/now-ui-kit-pro" />
    <!--  Social tags      -->
    <meta name="keywords" content="bootstrap 4, bootstrap 4 uit kit, bootstrap 4 kit, now ui, now ui kit pro, creative tim, html kit, html css template, web template, bootstrap, bootstrap 4, css3 template, frontend, responsive bootstrap template, bootstrap ui kit, responsive ui kit">
    <meta name="description" content="Start your development with a beautiful Bootstrap 4 UI kit.">
    <!-- Schema.org markup for Google+ -->
    <meta itemprop="name" content="Now UI Kit Pro by Creative Tim">
    <meta itemprop="description" content="Start your development with a beautiful Bootstrap 4 UI kit.">
    <meta itemprop="image" content="http://s3.amazonaws.com/creativetim_bucket/products/62/original/opt_nukp_thumbnail.jpg">
    <!-- Twitter Card data -->
    <meta name="twitter:card" content="product">
    <meta name="twitter:site" content="@creativetim">
    <meta name="twitter:title" content="Now UI Kit Pro by Creative Tim">
    <meta name="twitter:description" content="Start your development with a beautiful Bootstrap 4 UI kit.">
    <meta name="twitter:creator" content="@creativetim">
    <meta name="twitter:image" content="http://s3.amazonaws.com/creativetim_bucket/products/62/original/opt_nukp_thumbnail.jpg">
    <meta name="twitter:data1" content="Now UI Kit Pro by Creative Tim">
    <meta name="twitter:label1" content="Product Type">
    <meta name="twitter:data2" content="$69">
    <meta name="twitter:label2" content="Price">
    <!-- Open Graph data -->
    <meta property="fb:app_id" content="655968634437471">
    <meta property="og:title" content="Now UI Kit Pro by Creative Tim" />
    <meta property="og:type" content="article" />
    <meta property="og:url" content="presentation.html" />
    <meta property="og:image" content="http://s3.amazonaws.com/creativetim_bucket/products/62/original/opt_nukp_thumbnail.jpg" />
    <meta property="og:description" content="Start your development with a beautiful Bootstrap 4 UI kit." />
    <meta property="og:site_name" content="Creative Tim" />
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
                    <?php if($profession=='faculty') echo '<a class="dropdown-item" href="#" data-toggle="modal" data-target="#myModal1">New Project</a>'; ?>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#pablo" data-toggle="modal" data-target="#myModal" >Edit Profile</a>
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
            <div class="page-header-image" data-parallax="true" style="background-image: url('../assets/img/bg5.jpg');">
            </div>
            <div class="container">
                
                    <div class="content-center">
                        <div class="photo-container">
                <img class="photo-container" src= <?php echo '"../assets/img/'.$image.'"'?> alt="">
                        </div>
                        <h3 class="title"><?php echo $name?></h3>
                        <p class="category"><?php echo $credential?></p>
                    
                    </div>
                
            </div>
        </div>
        <div class="section">
            <div class="container">
                <form enctype="multipart/form-data" method="post" action= "edit-profile.php" >
                    <div class="row">
                        <div class="col-md-6">
                            <label>Name</label>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Your Name" name="Name" value=<?php echo '"'.$name.'"' ?> />
                            </div>
                            
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" placeholder="Your email" name="Email" value=<?php echo '"'.$email.'"' ?> />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Credential</label>
                                <input type="text" class="form-control" placeholder="Your Credential" name="Credential" value=<?php echo '"'.$credential.'"' ?>/>
                               
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Description</label>
                                <input type="text" class="form-control" placeholder="Your Bio" name="Description" value=<?php echo '"'.$description.'"' ?>/>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <?php if($profession == 'student'){ ?>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>CGPA</label>
                                <input type="number" step="0.01" class="form-control" min="0" max="10" placeholder="Your CGPA" name="CGPA" value=<?php echo '"'.$cgpa.'"' ?> />
                                
                            </div>
                        </div>
                        <?php } ?>
                        <div class="col-md-6">
                            <label>Profile picture</label>
                            <div class="input-group form-group-no-border input-lg form-group">
                                <input type="file" class="form-control" id="Image" name="Image" accept="image/*|.jpg|.png|.jpeg|.gif">
                            </div>
                        </div>
                    </div>
                    <div class="media-footer">
                        <input type="submit" class="btn btn-primary pull-right" value="Save" name="submit">
                    </div>
                </form>
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
    
    


</body>
<!--   Core JS Files   -->
<script src="../assets/js/core/jquery.3.2.1.min.js" type="text/javascript"></script>
<script src="../assets/js/core/popper.min.js" type="text/javascript"></script>
<script src="../assets/js/core/bootstrap.min.js" type="text/javascript"></script>
<script src="../assets/js/plugins/moment.min.js"></script>
<!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
<script src="../assets/js/plugins/bootstrap-switch.js"></script>
<!--    Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
<script src="../assets/js/plugins/bootstrap-tagsinput.js"></script>
<!--    Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
<script src="../assets/js/plugins/bootstrap-selectpicker.js" type="text/javascript"></script>
<!--  Google Maps Plugin    -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDGat1sgDZ-3y6fFe6HD7QUziVC6jlJNog"></script>
<!--    Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
<script src="../assets/js/plugins/jasny-bootstrap.min.js"></script>
<!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
<script src="../assets/js/plugins/nouislider.min.js" type="text/javascript"></script>
<!--  Plugin for the DatePicker, full documentation here: https://github.com/uxsolutions/bootstrap-datepicker -->
<script src="../assets/js/plugins/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
<!-- Plugins for Presentation Page -->
<!-- Sharrre Library -->
<script src="../assets/js/plugins/presentation-page/jquery.sharrre.js" type="text/javascript"></script>
<!-- Control Center for Now Ui Kit: parallax effects, scripts for the example pages etc -->
<script src="../assets/js/now-ui-kit9f1e.js?v=1.1.0" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function() {
        // the body of this function is in assets/js/now-ui-kit.js
        nowuiKit.initSliders();
    });
</script>


<!-- Mirrored from demos.creative-tim.com/now-ui-kit-pro/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 30 Oct 2017 16:46:49 GMT -->
</html>
