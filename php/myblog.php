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
    // echo("$username");

$dbc = mysqli_connect("localhost", "root", NULL, "aprl")
or die("Unable to connect to database");

$query = "SELECT profession FROM userlogin WHERE username = '$username'";
$result = mysqli_query($dbc, $query);
$row = mysqli_fetch_array($result);
$profession = $row['profession'];
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
	<!-- jquery library -->
	<link href="../assets/css/daddy.css" rel="stylesheet" />
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script>

function applicant(id,username){
	$.ajax({
		type: "POST",
		url: "applicant.php",
		data: {
			'id':id,
			'username' : username
		},
		success: function(data){
			$("#applicant_table"+id).html(data);
			//$("#applicant_table"+id).toggle(500);
		}
	});
}	
 $(document).ready(function(){
            $(document).on('click','input[type="button"]',function(){
            	// alert($(this).val());
                console.log('HELLO');
                // var interest = $('#interested').val();
                var pid = $('#id14').val();
                console.log(pid);
                // $.ajax({
                //     type : 'POST',
                //     url : 'apply.php',
                //     data :{
                //         'id' : pid,
                //         'interested' : interest
                //     },
                //     success : function(data){
                //         $('#apply'+pid).html(data);
                //     }
                // });
            });
        });

</script>
</head>
<body class="profile-page sidebar-collapse" >
	<nav class="navbar navbar-expand-lg bg-primary">
        <div class="container">
            <div class="navbar-translate">
                <a class="navbar-brand" href="landing-page.php"  data-placement="bottom" target="_blank">
                    <img src="../assets/favicon/invert.png" id="logo_id">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#example-navbar-primary" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-bar bar1"></span>
                    <span class="navbar-toggler-bar bar2"></span>
                    <span class="navbar-toggler-bar bar3"></span>
                </button>
            </div>
            <div class="dropdown button-dropdown">
                <a href="#pablo" class="dropdown-toggle" id="navbarDropdown" data-toggle="dropdown">
                    <img src="../assets/img/eva.jpg" alt="..." id="daddy_image">
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown" data-placement="left">
                  
                    <a class="dropdown-item" href="blog.php">Blog</a>
                    <a class="dropdown-item" href="blog.php">blog</a>
                    <?php if($profession=='faculty') echo '<a class="dropdown-item" href="#" data-toggle="modal" data-target="#myModal1">New Peoject</a>'; ?>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="edit-profile.php" >Edit Profile</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="logout.php">Logout</a>
                </div>
            </div>
        </div>
    </nav>
	<div class="wrapper">
	<div class="page-header-city">
            <!-- <div class="page-header-image" data-parallax="true" style="background-image: url('../assets/img/bg3.jpg');">
            </div>
            <div class="container">
                <div class="content-center">

                    <h2 class="title">blog/Intern Opportunities</h2>
                    <p class="category">For Researchers and learners</p>
                </div>
            </div> -->
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

    $query = "SELECT * FROM blog where `offeredby`='$username' ORDER BY date DESC";
    // echo $query;
	$result = mysqli_query($dbc, $query)
	or die('Unable to query myblog' );
	if(mysqli_num_rows($result)==0)
		require_once "profile-page.php";
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
			<button class='btn btn-primary btn-simple btn-round btn-sm' type='button'>$tag[tagname]</button>
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
</body>
</html>