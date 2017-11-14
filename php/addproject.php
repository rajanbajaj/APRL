<?php
session_start();
if(!isset($_SESSION['username'])){
    $url = 'http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'/login-page.php';
    header('Location:'.$url);
}
define('APRL_UPLOADPATH', '../assets/img/');
$username = $_SESSION['username'];
require_once('connect.php');

$query = "SELECT profession FROM userlogin WHERE username = '$username'";
$result = mysqli_query($dbc, $query);
$row = mysqli_fetch_array($result);
$profession = $row['profession'];
$var = $profession."info";

if(isset($_POST['submit'])){
        //echo "HELLo4";
    $title = $_POST['title'];
    $incentive = $_POST['incentive'];
    $lastdate = $_POST['lastdate'];
    $desc = $_POST['description'];

    $image = $_FILES['Image']['name'];
    $query = "INSERT INTO `project`(`offeredby`, `title`, `description`, `addedon`, `incentive`, `lastdate`, `status`)
    VALUES('$username','$title','$desc',now(),'$incentive','$lastdate','available') ";
    mysqli_query($dbc, $query)
    or die('Unable to addproject');

    $query = "SELECT project_id FROM `project` WHERE `offeredby` = '$username' ORDER BY `addedon` DESC LIMIT 1";
    $result = mysqli_query($dbc, $query)
    or die('Unable to retrieve project_id');
    $row = mysqli_fetch_assoc($result);
    $id = $row['project_id'];

    if(!is_dir(APRL_UPLOADPATH."project/")) {
        mkdir(APRL_UPLOADPATH.'project'); 
    }
    if(!is_dir(APRL_UPLOADPATH."project/".$id.'/')) {
        mkdir(APRL_UPLOADPATH.'project/'.$id); 
    }

    $query = "INSERT INTO `projectimage`(`project_id`, `imageurl`) VALUES
    ('$id','$image')";
    mysqli_query($dbc, $query)
    or die('Unable to addproject image');
    if($image!=''){
        $target = APRL_UPLOADPATH.'project/'.$id.'/'.$image;
        //echo $target;  



        move_uploaded_file($_FILES['Image']['tmp_name'], $target);
    }
        //echo 'Update successful!';

    echo '<h1>Added Project successfully.</p1><br><h3>You will be automatically redirected to the other page.</h3>';
    $url = "myproject.php";

   header ("Refresh: 3;URL='$url'");
}
$query = "SELECT * FROM $var WHERE username = '$username'";
$result = mysqli_query($dbc, $query)
or die('Unable to query '.$var );

$row = mysqli_fetch_array($result);
$firstname = $row['firstname'];
$lastname = $row['lastname'];
$name = $firstname.' '.$lastname; 
$credential = $row['credential'];
$image = $row['image_url'];
$description = $row['description'];
$email = $row['email'];
if($profession == 'student')
    $cgpa = $row['cgpa'];

if($image!='fb_avatar_male.jpg')
    $image = $username.'/'.$image;
mysqli_close($dbc);

?>
<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Add Project</title>
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
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

<script>
    $(document).ready(function(){
   $(".row .tag badge badge-danger").each(function() {
        alert($(this).val());
    });
});
    </script>

</head>

<body class="profile-page sidebar-collapse">
    <!-- Navbar -->
    <?php $nav_bar = include_once ("nav.php"); echo $nav_bar; ?>
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
                    <h3 class="title"><?php echo "$firstname $lastname";?></h3>
                    <p class="category"><?php echo $credential?></p>

                </div>

            </div>
        </div>
        <?php if($profession == 'faculty'){echo '
        <div class="section">
            <div class="container">
                <form enctype="multipart/form-data" method="post" action= "addproject.php" >
                    <div class="row">
                        <div class="col-md-6">
                            <label>title</label>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Title" name="title" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>lastdate</label>
                                <input type="date" class="form-control" placeholder="Last Date" name="lastdate" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>incentive</label>
                                <input type="text" class="form-control" placeholder="Incentive" name="incentive" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label>description</label>
                            <div class="form-group">
                                <textarea type="text" class="form-control" placeholder="Description" name="description"></textarea>
                            </div>
                            <div id="textareaTags">
                        <div id="tag" class="row">
                            <div  class="col-md-6">
                                <div class="title">
                                    <h4>Tags</h4>
                                </div>
                                <input type="text" value="Amsterdam" class="tagsinput" data-role="tagsinput" data-color="success" />
                                <!-- You can change data-color="rose" with one of our colors primary | warning | info | danger | success -->
                            </div>
                        </div>
                    </div>
                        </div>
                        <div class="col-md-6">
                            <label>Project picture</label>
                            <div class="input-group form-group-no-border input-lg">
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
        ';} ?>
        <?php if($profession == 'student'){echo '
            <h1><p class="text-warning">You are not supposed to be on this page</p></h1>
            ';} ?>
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