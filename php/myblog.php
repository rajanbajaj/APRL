<?php
session_start();
if(!isset($_SESSION['username'])){
    $url = 'http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'/login-page.php';
    header('Location:'.$url);
}
$username = $_COOKIE['username'];
if(isset($_GET['hidden_name'])){
    $username = $_GET['hidden_name'];
}
    //  echo("$username");

$dbc = mysqli_connect("localhost", "root", NULL, "aprl")
or die("Unable to connect to database");

$query = "SELECT profession FROM userlogin WHERE username = '$username'";
$result = mysqli_query($dbc, $query);
$row = mysqli_fetch_array($result);
$profession = $row['profession'];
mysqli_close($dbc);
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<title>My Blogs</title>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="../assets/favicon/favicon-16x16.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
	<!--     Fonts and icons     -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
	<!-- CSS Files -->
	<link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
	<link href="../assets/css/now-ui-kit.css?v=1.1.0" rel="stylesheet" />
	<!-- CSS Just for demo purpose, don't include it in your blog -->
    <link href="../assets/css/demo.css" rel="stylesheet" />
    <link href="../assets/css/daddy.css" rel="stylesheet" />
    <!-- jquery library -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script>

    </script>
</head>
<body class="profile-page sidebar-collapse" >
    <!-- Navbar -->
    <?php $nav_bar = include_once ("nav.php"); echo $nav_bar; ?>
    <!-- End Navbar -->
    <div class="wrapper">
       <div class="page-header page-header-small" filter-color="orange">
            <div class="page-header-image" data-parallax="true" style="background-image: url('../assets/img/bg3.jpg');">
            </div>
            <div class="container">
                <div class="content-center">
                    <div class="photo-container">
                        <img class="photo-container" src= <?php echo '"../assets/img/user/'.$image.'"'?> alt="Profile Picture">
                    </div>
                    <h1 class="title">Blogs </h1>
                    <h3 class="title">By - <?php echo ("$firstname $lastname");?></h3>
                </div>
            </div>
        </div>

        <div class="section">
            <div class="container">
                <div class="button-container">

                    <!-- <div class="photo-container">
                        <img src="../assets/img/ryan.jpg" alt="">
                    </div> -->
                </div>
                <div class="container tim-container" style="max-width:800px; padding-top:100px">

                 <!-- <h1 class="text-center">blog/Intern Opportunities </h1> -->
             </div>	
             <?php
             $dbc = mysqli_connect("localhost", "root", NULL, "aprl")
                or die("Unable to connect to database");
             $query = "SELECT * FROM blog where `offeredby`='$username' ORDER BY date DESC";
    // echo $query;
             $result = mysqli_query($dbc, $query)
             or die('Unable to query myblog' );
             if(mysqli_num_rows($result)==0)
        //require_once "profile-page.php";
                echo "No blogs wriiten by You!";

            while($row = mysqli_fetch_assoc($result)){
              $short_desc = substr($row["description"], 0,150)." ....";
              echo " <div class='container tim-container' style='max-width:800px; padding-top:30px'>

              <h1 class='text-center'>$row[title]</h1>

              <!--    Display Current blogs --> 
              <p>$short_desc</p>

              <span >";
              $query1 = "SELECT tag.tagname from blog join blogtag on blog.blog_id = blogtag.blog_id join tag on blogtag.tag_id=tag.tag_id where blog.blog_id=$row[blog_id]" ;
              $result_tag = mysqli_query($dbc, $query1)
              or die('Unable to query blog' );
              while($tag = mysqli_fetch_assoc($result_tag)){
                echo    "<span >
                <a href='search.php?id=\"$tag[tagname]\"' class='btn btn-primary btn-round btn-sm' >$tag[tagname]</a>
                </span>";
            }
            echo
            " </span>
            <!--     end extras --> 
            <div class='col text-center'> 
            <a href='blog.php?hidden_name=$row[blog_id]' class='btn btn-primary btn-round btn-lg'>Detail Description</a> ";

            echo"
            </div>
            </div>
            ";
        }
        mysqli_close($dbc);

        ?>
        <!-- <button type="button" id="myblog" onclick="applicant()" value="My blogs">My blog</button> -->

        <!-- <script>applicant("");</script> -->

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
</body>
</html>