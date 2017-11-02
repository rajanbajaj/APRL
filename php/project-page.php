<?php
    session_start();
    if(!isset($_SESSION['username'])){
        $url = 'http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'/login-page.php';
        header('Location:'.$url);
    }
    else{
        $username = $_SESSION['username'];
       
    }
function count_project($status){
    $dbc = mysqli_connect("localhost", "root", NULL, "aprl")
    or die("Unable to connect to database");
    
    $query = "SELECT * FROM project where status = '$status'";
    $result = mysqli_query($dbc, $query)
    or die('Unable to query studentinfo' );
    $current_count = mysqli_num_rows($result);
    mysqli_close($dbc);
    // echo "$status called = $current_count";
    return $current_count;
}
function display_project($status){

    $dbc = mysqli_connect("localhost", "root", NULL, "aprl")
    or die("Unable to connect to database");

    $hello = "dfgfdbfdb";
    // echo substr($hello,2,5);
    $query = "SELECT * FROM project where status='$status'";
    $result = mysqli_query($dbc, $query)
    or die('Unable to query project' );

    //echo mysqli_num_rows($result);
    // echo "<table style = 'width=100%'>";
    while($row = mysqli_fetch_assoc($result)){
         echo " <div class='container tim-container' style='max-width:800px; padding-top:30px'>

                   <h1 class='text-center'>$row[title]</h1>
                  
                    <!--    Display Current Projects --> 
                   <p>$row[description]</p>
                        
                        <span >

                        <span >
                            <button class='btn btn-primary btn-simple btn-round btn-sm' type='button'>Tag1</button>
                        </span>
                        <span >
                            <button class='btn btn-primary btn-simple btn-round btn-sm' type='button'>CSS</button>
                        </span>
                        <span >
                            <button class='btn btn-primary btn-simple btn-round btn-sm' type='button'>JavaScript</button>
                        </span>
                    </span>
                   <!--     end extras --> 
                   <div class='col text-center'> 
                        <a href='#pablo' class='btn btn-primary btn-round btn-lg'>Detail Description</a> 
                        <button class='btn btn-primary btn-round btn-lg' type='button'>
                            <i class='now-ui-icons ui-2_favourite-28'></i> Apply
                        </button>
                   </div> 
              </div>
              ";
        // foreach($row as $field){
        //     echo '<td>' . htmlspecialchars($field) . '</td>';
           
        // }
        // echo '</tr>';
    }
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
    <title>Blog Page</title>
    
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <!-- CSS Files -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../assets/css/now-ui-kit.css?v=1.1.0" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
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
                    <a class="dropdown-item" href="profile-page.php">Profile</a>
                    <a class="dropdown-item" href="logout.php">Logout</a>
                    <a class="dropdown-item" href="#">Something else here</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Separated link</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">One more separated link</a>
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
            <div class="collapse navbar-collapse justify-content-end" id="navigation" data-nav-image="../assets/img/blurr.jpg">
        
            </div>
        </div>
    </nav>
    <!-- End Navbar -->
    <div class="wrapper">
        <div class="page-header page-header-small">
            <div class="page-header-image" data-parallax="true" style="background-image: url('../assets/img/bg5.jpg');">
        </div>
            <div class="container">
                <div class="content-center">
                    
                    <h2 class="title">Available Projects</h3>
                    <p class="category">For Researchers and learners</p>
                    <div class="content">
                        <div class="social-description">
                            <h2><?=count_project("available"); ?></h2>
                            <p>Available</p>
                        </div>
                        <div class="social-description">
                            <h2><?= count_project("current"); ?></h2>
                            <p>Current</p>
                        </div>
                        <div class="social-description">
                            <h2><?php echo count_project("finished"); ?></h2>
                            <p>Finished</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="section">
            <div class="container">
                <div class="button-container">

                    <div class="photo-container">
                        <img src="../assets/img/ryan.jpg" alt="">
                    </div>
                </div>
                
               <div class="container tim-container" style="max-width:800px; padding-top:100px">

                   <h1 class="text-center">Project/Intern Opportunities <br><?echo $hello; ?> for learning purpose</h1>
                   <br>
                   <span >

                        <span >
                            <button class="btn btn-primary btn-simple btn-round btn-sm" type="button">Tag1</button>
                        </span>
                        <span >
                            <button class="btn btn-primary btn-simple btn-round btn-sm" type="button">CSS</button>
                        </span>
                        <span >
                            <button class="btn btn-primary btn-simple btn-round btn-sm" type="button">JavaScript</button>
                        </span>
                    </span>
                    <br>
                    <br>
                    <!--    Display Current Projects --> 
                   <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempure epteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                        
                   <!--     end extras --> 
                   <div class="col text-center"> 
                        <a href="#pablo" class="btn btn-primary btn-round btn-lg">Detail Description</a> 
                        <button class="btn btn-primary btn-round btn-lg" type="button">
                            <i class="now-ui-icons ui-2_favourite-28"></i> Apply
                        </button>
                   </div> 
              </div>

            </div>
        </div>
        <?php display_project("current");?>
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
<!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
<script src="../assets/js/plugins/bootstrap-switch.js"></script>
<!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
<script src="../assets/js/plugins/nouislider.min.js" type="text/javascript"></script>
<!--  Plugin for the DatePicker, full documentation here: https://github.com/uxsolutions/bootstrap-datepicker -->
<script src="../assets/js/plugins/bootstrap-datepicker.js" type="text/javascript"></script>
<!-- Control Center for Now Ui Kit: parallax effects, scripts for the example pages etc -->
<script src="../assets/js/now-ui-kit.js?v=1.1.0" type="text/javascript"></script>

</html>