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
    
    $query = "SELECT * FROM project WHERE status = '$status'";
    $result = mysqli_query($dbc, $query)
    or die('Unable to query project' );
    $current_count = mysqli_num_rows($result);
    
    mysqli_close($dbc);
    // echo "$status called = $current_count";
    echo $current_count;
    //return $current_count;
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
    <script>
function showHint(str) {
    if (str.length == 0) { 
        document.getElementById("project_overview").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("project_overview").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "display_project.php?q=" + str, true);
        xmlhttp.send();
    }
}
function showPage(str) {
    if (str.length == 0) { 
        document.getElementById("project_overview").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("project_overview").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "project_page.php?q=" + str, true);
        xmlhttp.send();
    }
}
</script>
</head>

<body class="profile-page sidebar-collapse">
    <!-- Navbar -->
    <?php $nav_bar = include_once ("nav.php"); echo $nav_bar; ?>
    <!-- End Navbar -->
    <div class="wrapper">
        <div class="page-header page-header-small">
            <div class="page-header-image" data-parallax="true" style="background-image: url('../assets/img/bg5.jpg');">
        </div>
            <div class="container">
                <div class="content-center">
                    
                    <h2 class="title">Project/Intern Opportunities</h3>
                    <p class="category">For Researchers and learners</p>
                    <div class="content">
                        <div class="social-description">
                            <h2><?=count_project("available"); ?></h2>
                           <p onMouseOver="this.style.color='#0F0'" onMouseOut="this.style.color='#00F'"  onclick='showHint("available")' <p>Available</p>
                        </div>
                        <div class="social-description">
                            <h2><?= count_project("current"); ?></h2>
                            <p onMouseOver="this.style.color='#0F0'" onMouseOut="this.style.color='#00F'"  onclick='showHint("current")'>Current</p>
                        </div>
                        <div class="social-description">
                            <h2><?php echo count_project("finished"); ?></h2>
                            <a  onMouseOver="this.style.color='#0F0'" onMouseOut="this.style.color='#00F'" onclick='showHint("finished")'>Finished</a>
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
                
               <!-- <div class="container tim-container" style="max-width:800px; padding-top:100px">

                   <h1 class="text-center">Project/Intern Opportunities </h1>
              </div> -->
            </div>
        </div>
        <!-- Display project overview -->
        <script>showHint("current");</script>
        <span id="project_overview"></span>

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