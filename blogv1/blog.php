<?php

// This file is for showing blogs which are obtained by clicking in Top Blogs container in landing page
session_start();
if(isset($_SESSION['username'])){

	require_once('connect.php');
    $blogId = 1;
    $uname = $_SESSION['username'];

	// $blogId = $_POST['blog_id'];

	$query = "SELECT * FROM blog WHERE blog_id ='$blogId'";
	$result = mysqli_query($dbc,$query)
	or die("Unable to request blog from database");
	$rowBlog = mysqli_fetch_array($result);
	$title = $rowBlog['title'];
	// echo $title;
	$description = $rowBlog['description'];
	// echo $description;
	$date = $rowBlog['date'];
	$url = $rowBlog['url'];
	$spam = $rowBlog['spam'];
	//likes,reads row added in database blog table
	$likes = $rowBlog['likes']; 
	$reads = $rowBlog['reads'];
    echo $reads;
    // $readr = $readr + 1;
    // echo $readr;

    // $queryr2 = "UPDATE blog SET reads = '$readr' WHERE blog_id = '$blogId'"; 
    // if(mysqli_query($dbc,$queryr2)){}
    // else{
    //     echo "Unable to update read data";
    // }
	//comments table still to be added

	$query2 = "SELECT studentinfo.image_url FROM studentinfo INNER JOIN userblog ON userblog.user_id = studentinfo.username WHERE userblog.blog_id = '$blogId'";
	$result2 = mysqli_query($dbc,$query2)
	or die("Unable to request image url from database");
	$imageUrl = $result2;


	$query3 = "SELECT * FROM tag INNER JOIN blogtag ON blogtag.tag_id = tag.tag_id WHERE blogtag.blog_id = 
	'$blogId' ";
	$result3 = mysqli_query($dbc,$query3)
	or die("Unable to request tags from database");
	$rowTag = mysqli_fetch_array($result3);

	//remember to close the connection


}
else{
	$url = 'http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'/login-page.php';
    header('Location:'.$url);
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

<script>

function likesCount(){

    console.log(1500*1500);
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
        {
            // alert(xmlhttp.responseText);
            document.getElementById('likesCountId').innerHTML = xmlhttp.responseText;
        }
    };
    var id =2;
    xmlhttp.open("GET", "likesIncr.php?id=" +id, true);
    xmlhttp.send();
}


// var x =0;
function spamCount(){
    // x = x+1;
    // if(x==2){
    //     return ;
    // }
	console.log(1500*1500);
	var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
        {
            // alert(xmlhttp.responseText);
            document.getElementById('spamCountId').innerHTML = xmlhttp.responseText;
        }
    };
    var id =1;
    xmlhttp.open("GET", "spamIncr.php?id=" +id, true);
    xmlhttp.send();
}

</script>
	<!-- <script src="blogScript.js" ></script> -->
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
                    
                    <h2 class="title"><?php echo $title ?></h3>
                    <p class="category"><?php echo $uname ?>></p>
                    <div class="content">
                        <div class="social-description">
                            <h2><?php echo $reads ?></h2>
                            <p>Reads</p>
                        </div>
                        <div class="social-description">
                            <h2 id="likesCountId"><?php echo $likes ?></h2>
                            <p>Likes</p>
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


                    

                   <!-- <h1 class="text-center">Awesome looking header <br> just for my friends</h1> -->
                   <h4 class="text-center"><?php $date ?></h4>
                   <br>
                   <span >

                        <span >
                            <button class="btn btn-primary btn-simple btn-round btn-sm" type="button">HTML</button>
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
                   <p><?php echo $description ?></p>
                   <!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p> -->      
                   <!--     end extras --> 


                   <div class="col text-center"> 
                        <a href="#pablo" class="btn btn-primary btn-round btn-lg">Comments</a> 
                        <button class="btn btn-primary btn-round btn-lg" type="button">
                            <i class="now-ui-icons ui-2_favourite-28"></i> 10
                        </button>
                   </div>
                   <div class="col text-center">
                        <!-- <a href="#pablo" class="btn btn-primary btn-round btn-lg"</a>  -->
                        <br>
                        <h8>Like</h8>
                        <button class="btn btn-primary btn-round btn-lg" type="button" onclick="likesCount()" >
                            <i class="now-ui-icons ui-2_favourite-28" ></i> 
                        </button>
                   </div>

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