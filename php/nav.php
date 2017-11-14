<?php
  
   $username = $_SESSION['username'];
    require('connect.php');
    $query = "SELECT profession FROM userlogin WHERE username = '$username'";
    $result = mysqli_query($dbc, $query);
    $row = mysqli_fetch_array($result);
    $profession = $row['profession'];
    $var=$profession."info";
    $query = "SELECT * FROM $var WHERE username = '$username'";
    $result = mysqli_query($dbc, $query)
    or die('Unable to query '.$var );

    $row = mysqli_fetch_array($result);
    $firstname = $row['firstname'];
    $lastname = $row['lastname'];
    $credential = $row['credential'];
    $p_image = $row['image_url'];
    $image = $p_image;
    $description = $row['description'];
    $email = $row['email'];
if(isset($_GET['username'])){

    require('connect.php');
    $username = $_GET['username'];
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
}


$appy = '
<nav class="navbar navbar-expand-sm bg-primary fixed-top navbar-transparent " color-on-scroll="500">
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
                    <img class="photo-container" src= "../assets/img/user/'.$p_image.'" alt="Profile Picture" id="daddy_image">
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown" data-placement="left">
                    <a class="dropdown-item" href="profile-page.php">Profile</a>
                    <a class="dropdown-item" href="myblog.php">My Blogs</a>
                    <a class="dropdown-item" href="myproject.php">My Projects</a>';
                    if($profession=='faculty') $appy .= '<a class="dropdown-item" href="addproject.php">Add Project</a>';
                    
                 $appy .= '<div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="edit-profile.php" >Edit Profile</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="logout.php">Logout</a>
                </div>
            </div>
            
        </div>
    </nav>
    ';
    return $appy;
?>