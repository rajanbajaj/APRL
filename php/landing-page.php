<?php
<<<<<<< HEAD
require_once('start-session.php');
if(!isset($_SESSION['username'])){
  $url = 'http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'/login-page.php';
  header('Location:'.$url);
}
else{
  $username = $_SESSION['username'];
  $dbc = mysqli_connect("localhost", "root", NULL, "aprl")
  or die("Unable to connect to database");

  $query = "SELECT profession FROM userlogin WHERE username = '$username'";
  $result = mysqli_query($dbc, $query)
  or die('Unable to query myproject' );

  $row = mysqli_fetch_array($result);
  $profession = $row['profession'];
  echo $profession;
  $var = $profession."info";
  echo $var;
  $query = "SELECT firstname,lastname FROM `$var` WHERE username = '$username'";
  echo $query;
  $result = mysqli_query($dbc, $query)
  or die('Unable to query myproject' );

  $row = mysqli_fetch_array($result);
  $firstname = $row['firstname'];
  $lastname = $row['lastname'];     
  echo $firstname;   
}
||||||| merged common ancestors
    require_once('start-session.php');
    if(!isset($_SESSION['username'])){
        $url = 'http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'/login-page.php';
        header('Location:'.$url);
    }
    else{
        $username = $_SESSION['username'];
        require_once('connect.php');
         
        $query = "SELECT name, profession FROM userlogin WHERE username = '$username'";
        $result = mysqli_query($dbc, $query);
        $row = mysqli_fetch_array($result);
        $profession = $row['profession'];
        $name = $row['name'];
        
    }
=======
    require_once('start-session.php');
    if(!isset($_SESSION['username'])){
        $url = 'http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'/login-page.php';
        header('Location:'.$url);
    }
    else{
        $username = $_SESSION['username'];
        require_once('connect.php');
         
        $query = "SELECT profession FROM userlogin WHERE username = '$username'";
        $result = mysqli_query($dbc, $query);
        $row = mysqli_fetch_array($result);
        $profession = $row['profession'];
        //echo $profession;
        if($profession == "faculty")
          $var = "facultyinfo";
        elseif($profession == "student")
          $var = "studentinfo";
        $query = "SELECT * FROM $var WHERE username = '$username'";
        $result = mysqli_query($dbc, $query) or die ('Unable to query');
        $row = mysqli_fetch_array($result);
        $firstname = $row['firstname'];
        $lastname = $row['lastname'];
        $name = $firstname.' '.$lastname;
        mysqli_close($dbc);
    }
>>>>>>> 2f3fd080a9296e10f0e713804ce2f8dd3a17dbda
?>
<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from demos.creative-tim.com/now-ui-kit-pro/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 30 Oct 2017 16:36:29 GMT -->
<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>Now UI Kit Pro by Creative Tim | Premium Bootstrap 4 UI Kit</title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
  <!-- CSS Files -->
  <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="../assets/css/now-ui-kit.css" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="../assets/css/demo.css" rel="stylesheet" />
  <!-- Canonical SEO -->
  <link rel="canonical" href="https://www.creative-tim.com/product/now-ui-kit-pro" />
  <link rel="stylesheet" type="text/css" href="..assets/css/weather-icons.css">
  <!--  Social tags      -->


</head>

<style type="text/css">

body{background:#f88f18; color: #fff; font-family: 'Roboto', sans-serif; margin:0; transition:all 400ms; will-change:background;}
<<<<<<< HEAD
*{
  border: solid;
  border-width: .3px;
}
||||||| merged common ancestors
 *{
    border: solid;
    border-width: .3px;
}
=======
/* *{
    border: solid;
    border-width: .3px;
}*/
>>>>>>> 2f3fd080a9296e10f0e713804ce2f8dd3a17dbda
#myBtn {
  display: none;
  position: fixed;
  bottom: 20px;
  right: 30px;
  z-index: 99;
  border: none;
  outline: none;
  background-color: red;
  color: white;
  cursor: pointer;
  padding: 15px;
  border-radius: 10px;
}

#myBtn:hover {
  background-color: #555;
}
#welcome-message{
  text-align: -webkit-center;
  text-align: center;
  margin-top: 15%;
}
#blog-container{
  /*margin-right: .33333%;*/
}
html, body {
  max-width: 100%;
  overflow-x: hidden;
}
#sidebar{
  float: right;
  overflow: hidden;
  width: 29%;
  margin: 0 0 15px;
  position: relative;
  margin-left: auto;
}
.spinner {

  display: none;
  width: 100px;
  height: 100px;
  background-color: #f96332;

  margin: 120px auto;
  -webkit-animation: sk-rotateplane 1.2s infinite ease-in-out;
  animation: sk-rotateplane 1.2s infinite ease-in-out;
}

@-webkit-keyframes sk-rotateplane {
  0% { -webkit-transform: perspective(120px) }
  50% { -webkit-transform: perspective(120px) rotateY(180deg) }
  100% { -webkit-transform: perspective(120px) rotateY(180deg)  rotateX(180deg) }
}

@keyframes sk-rotateplane {
  0% { 
    transform: perspective(120px) rotateX(0deg) rotateY(0deg);
    -webkit-transform: perspective(120px) rotateX(0deg) rotateY(0deg) 
    } 50% { 
      transform: perspective(120px) rotateX(-180.1deg) rotateY(0deg);
      -webkit-transform: perspective(120px) rotateX(-180.1deg) rotateY(0deg) 
      } 100% { 
        transform: perspective(120px) rotateX(-180deg) rotateY(-179.9deg);
        -webkit-transform: perspective(120px) rotateX(-180deg) rotateY(-179.9deg);
      }
    }
    .clear{clear:both;}
  </style>

  <body class="index-page">
    <button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>
    <nav class="navbar navbar-expand-lg bg-info">
      <div class="container">
        <a class="navbar-brand" href="#">APRL</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#example-navbar-icons" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-bar bar1"></span>
          <span class="navbar-toggler-bar bar2"></span>
          <span class="navbar-toggler-bar bar3"></span>
        </button>
        <div class="collapse navbar-collapse" id="example-navbar-icons">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="#pablo"><i class="now-ui-icons ui-1_zoom-bold" aria-hidden="true"></i></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="profile-page.php"><i class="now-ui-icons users_single-02" aria-hidden="true"></i></a>
            </li>
            <li class="nav-item dropdown">
              <a href="#" class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown">
                <i class="now-ui-icons ui-1_settings-gear-63" aria-hidden="true"></i>
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
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- Welcome message based on time -->
    <div class="container" style="font-size: 3em;" id="one" data-color="#f88f18">
      <div class="row">
        <?php
        date_default_timezone_set("Asia/Kolkata");

        $hour = date('H', time());
        if( $hour > 6 && $hour <= 11) {
          echo '
          <img src="data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTkuMC4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iQ2FwYV8xIiB4PSIwcHgiIHk9IjBweCIgdmlld0JveD0iMCAwIDYwLjAwMyA2MC4wMDMiIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDYwLjAwMyA2MC4wMDM7IiB4bWw6c3BhY2U9InByZXNlcnZlIiB3aWR0aD0iNTEycHgiIGhlaWdodD0iNTEycHgiPgo8cGF0aCBzdHlsZT0iZmlsbDojRjBDNDE5OyIgZD0iTTM2LjExNiwxNC4yMTNsLTAuOTU4LTEuNTg4Yy0zLjA3NC01LjA5Ni04LjQ0Ny04LjEzOS0xNC4zNzMtOC4xMzkgIGMtOS4yNiwwLTE2Ljc5Myw3LjUzMy0xNi43OTMsMTYuNzkzYzAsNS4yODQsMi41NDcsMTAuMzI0LDYuODE1LDEzLjQ4MWwwLjY1MSwwLjQ4MWwwLjgwNSwwLjA4OSAgYzAuNTI5LDAuMDU4LDEuMDMzLDAuMTYzLDEuNDk3LDAuMzEzbDQuOTcsMS41OTdsLTEuMTIzLTUuMDk4Yy0wLjI2Ny0xLjIxNCwwLjAyOS0yLjQ1NCwwLjgxMy0zLjQwNiAgYzAuNzYzLTAuOTI2LDEuODg5LTEuNDU3LDMuMDkxLTEuNDU3YzAuNDEyLDAsMC44MTgsMC4wNjMsMS4xNzcsMC4xNzdsMi42OSwwLjg5N2wxLjA0Ny0yLjYzNmMwLjQ4NS0xLjIyLDEuNTMyLTIuMTI3LDIuNzk5LTIuNDI1ICBjMC40NS0wLjEwNSwwLjkzMy0wLjEyOCwxLjM5Ni0wLjA3MWwzLjUsMC40MjJsLTAuMTQ0LTMuNTIzbC0wLjAyMS0wLjM0MWMwLTEuNDExLDAuNDAzLTIuNzk1LDEuMTY3LTMuOTk5TDM2LjExNiwxNC4yMTN6Ii8+CjxwYXRoIHN0eWxlPSJmaWxsOiNEMEU4Rjk7IiBkPSJNNTkuOTc5LDI2LjQ4NmgtMC4wODFjMC4wMzUsMC4zMDQsMC4wNTksMC42MTEsMC4wNTksMC45MjVjMCwwLjU1My0wLjQ0NywxLTEsMXMtMS0wLjQ0Ny0xLTEgIGMwLTMuMzA5LTIuNjkxLTYtNi02cy02LDIuNjkxLTYsNmMwLDAuNTUzLTAuNDQ3LDEtMSwxcy0xLTAuNDQ3LTEtMWMwLTQuMDY0LDMuMDQ5LTcuNDIzLDYuOTc4LTcuOTI3ICBjLTAuMjI2LTUuMDM5LTQuMzg0LTkuMDczLTkuNDc4LTkuMDczYy01LjExMSwwLTkuMjgxLDQuMDYtOS40ODEsOS4xMjNjMC44MjksMC4xOTYsMS42MzIsMC41MiwyLjM3OCwwLjk4MSAgYzEuODE2LDEuMTI1LDMuMDg2LDIuODksMy41NzYsNC45N2MwLjEyNiwwLjUzOC0wLjIwNywxLjA3Ni0wLjc0NCwxLjIwM2MtMC41MzgsMC4xMjEtMS4wNzYtMC4yMDctMS4yMDMtMC43NDQgIGMtMC43NTgtMy4yMjItMy45OTktNS4yMjYtNy4yMTQtNC40NjdjLTMuMjIxLDAuNzU4LTUuMjI1LDMuOTk0LTQuNDY3LDcuMjE1YzAuMTI2LDAuNTM3LTAuMjA3LDEuMDc1LTAuNzQ1LDEuMjAyICBjLTAuMDc2LDAuMDE4LTAuMTUzLDAuMDI2LTAuMjI5LDAuMDI2Yy0wLjQ1MywwLTAuODY0LTAuMzExLTAuOTczLTAuNzcxYy0wLjI5NC0xLjI1MS0wLjI2OC0yLjUwMiwwLjAxMi0zLjY3NCAgYy0yLjA1OC0wLjMwMS00LjEzNywwLjQ3Ni01LjQ5MywyLjEyMmMtMS4yNTgsMS41MjktMS42MjUsMy40OTgtMS4xNzUsNS4yODVjMC4wMDEsMC4wMTIsMC4wMDcsMC4wMjIsMC4wMDgsMC4wMzQgIGMwLjMwNiwxLjE4NiwwLjk3LDIuMjksMS45ODUsMy4xMjdjMC40MjYsMC4zNTIsMC40ODcsMC45ODEsMC4xMzcsMS40MDhjLTAuMTk4LDAuMjQtMC40ODQsMC4zNjQtMC43NzMsMC4zNjQgIGMtMC4yMjQsMC0wLjQ0OC0wLjA3NC0wLjYzNS0wLjIyOGMtMS4yMTctMS4wMDItMi4wODgtMi4zMTEtMi41NDYtMy43ODFjLTQuMDQzLTEuMDU0LTguMjk0LDAuNjQ3LTEwLjQ5LDQuMjYyICBjLTEuMzE3LDIuMTY4LTEuNzEyLDQuNzItMS4xMSw3LjE4NWMwLjYwMiwyLjQ2NiwyLjEyNyw0LjU0OSw0LjI5Niw1Ljg2N2MwLjQ3MiwwLjI4NywwLjYyMiwwLjkwMSwwLjMzNSwxLjM3NCAgYy0wLjE4OCwwLjMxLTAuNTE4LDAuNDgtMC44NTUsMC40OGMtMC4xMzMsMC0wLjI2NS0wLjAzNi0wLjM5Mi0wLjA5MWMxLjU4LDAuOTM2LDMuMzk5LDEuNTA5LDUuMzQ0LDEuNTkzbDguMjA5LDAuMDAzICBjNS4zMDctMC4wODUsOS44NTMtMy4zNiwxMS43OTEtNy45OTJjMS45NjMsNC42OTMsNi42MDMsOCwxMiw4YzkuMzc0LDAsMTctNy42MjYsMTctMTd2LTEwTDU5Ljk3OSwyNi40ODZ6Ii8+CjxnPgoJPHBhdGggc3R5bGU9ImZpbGw6I0FCQ0FERDsiIGQ9Ik01Mi45MzYsMTkuNTUyYy0wLjIzMS02LjEzOS01LjI4NC0xMS4wNjYtMTEuNDc4LTExLjA2NmMtNi4xNDIsMC0xMS4xNiw0Ljg0NC0xMS40NywxMC45MSAgIGMtMC41NTgsMC4wMTItMS4xMTksMC4wNzgtMS42NzYsMC4yMDljLTIuMzM2LDAuNTUtNC4xODUsMi4wODItNS4yMjksNC4wNTJjLTIuODgyLTAuNTg1LTUuODQ4LDAuNDMzLTcuNzUsMi43NDIgICBjLTEuMjUxLDEuNTItMS44NzksMy40MDgtMS44MSw1LjM1OWMtNC42My0wLjgzNC05LjM0LDEuMjI0LTExLjg0NCw1LjM0NGMtMS41OTYsMi42MjUtMi4wNzMsNS43MTQtMS4zNDUsOC42OTggICBzMi41NzUsNS41MDYsNS4yLDcuMTAyYzAuMTYyLDAuMDk5LDAuMzQyLDAuMTQ2LDAuNTE5LDAuMTQ2YzAuMzM4LDAsMC42NjctMC4xNzEsMC44NTUtMC40OGMwLjI4Ny0wLjQ3MywwLjEzNy0xLjA4Ny0wLjMzNS0xLjM3NCAgIGMtMi4xNjktMS4zMTgtMy42OTQtMy40MDEtNC4yOTYtNS44NjdjLTAuNjAyLTIuNDY1LTAuMjA3LTUuMDE3LDEuMTEtNy4xODVjMi4xOTYtMy42MTQsNi40NDctNS4zMTUsMTAuNDktNC4yNjIgICBjMC40NTgsMS40NzEsMS4zMywyLjc3OSwyLjU0NiwzLjc4MWMwLjE4NywwLjE1MywwLjQxMSwwLjIyOCwwLjYzNSwwLjIyOGMwLjI4OSwwLDAuNTc1LTAuMTI0LDAuNzczLTAuMzY0ICAgYzAuMzUxLTAuNDI3LDAuMjg5LTEuMDU3LTAuMTM3LTEuNDA4Yy0xLjAxNi0wLjgzNi0xLjY3OS0xLjk0MS0xLjk4NS0zLjEyN2MtMC4wMDEtMC4wMTItMC4wMDctMC4wMjItMC4wMDgtMC4wMzQgICBjLTAuNDUtMS43ODctMC4wODMtMy43NTYsMS4xNzUtNS4yODVjMS4zNTYtMS42NDYsMy40MzUtMi40MjMsNS40OTMtMi4xMjJjLTAuMjgsMS4xNzMtMC4zMDcsMi40MjMtMC4wMTIsMy42NzQgICBjMC4xMDgsMC40NjEsMC41MiwwLjc3MSwwLjk3MywwLjc3MWMwLjA3NiwwLDAuMTUzLTAuMDA5LDAuMjI5LTAuMDI2YzAuNTM4LTAuMTI3LDAuODcxLTAuNjY1LDAuNzQ1LTEuMjAyICAgYy0wLjc1OC0zLjIyMSwxLjI0Ni02LjQ1Nyw0LjQ2Ny03LjIxNWMzLjIxNS0wLjc1OSw2LjQ1NiwxLjI0NSw3LjIxNCw0LjQ2N2MwLjEyNywwLjUzNywwLjY2NSwwLjg2NSwxLjIwMywwLjc0NCAgIGMwLjUzNy0wLjEyNywwLjg3LTAuNjY1LDAuNzQ0LTEuMjAzYy0wLjQ5LTIuMDgtMS43Ni0zLjg0NS0zLjU3Ni00Ljk3Yy0wLjc0Ni0wLjQ2Mi0xLjU0OS0wLjc4NS0yLjM3OC0wLjk4MSAgIGMwLjItNS4wNjMsNC4zNy05LjEyMyw5LjQ4MS05LjEyM2M1LjA5NCwwLDkuMjUzLDQuMDMzLDkuNDc4LDkuMDczYy0zLjkyOSwwLjUwNC02Ljk3OCwzLjg2My02Ljk3OCw3LjkyN2MwLDAuNTUzLDAuNDQ3LDEsMSwxICAgczEtMC40NDcsMS0xYzAtMy4zMDksMi42OTEtNiw2LTZzNi4wNDYsMi42OTEsNi4wNDYsNmMwLDAuMDI4LDAsMS4zMjcsMCwzYzAsMC41NTIsMC40NDgsMSwxLDFzMS0wLjQ0OCwxLTF2LTMgICBDNjAuMDAzLDIzLjQwNyw1Ni44ODYsMjAuMDM3LDUyLjkzNiwxOS41NTJ6Ii8+CjwvZz4KPGxpbmUgc3R5bGU9ImZpbGw6bm9uZTtzdHJva2U6I0ZGRkZGRjtzdHJva2Utd2lkdGg6MjtzdHJva2UtbGluZWNhcDpyb3VuZDtzdHJva2UtbWl0ZXJsaW1pdDoxMDsiIHgxPSI1My4wMDMiIHkxPSIzNi40ODYiIHgyPSI1My4wMDMiIHkyPSIzMS40ODYiLz4KPGxpbmUgc3R5bGU9ImZpbGw6bm9uZTtzdHJva2U6I0ZGRkZGRjtzdHJva2Utd2lkdGg6MjtzdHJva2UtbGluZWNhcDpyb3VuZDtzdHJva2UtbWl0ZXJsaW1pdDoxMDsiIHgxPSI1My4wMDMiIHkxPSIzNi40ODYiIHgyPSI1My4wMDMiIHkyPSI0MS40ODYiLz4KPGxpbmUgc3R5bGU9ImZpbGw6bm9uZTtzdHJva2U6I0ZGRkZGRjtzdHJva2Utd2lkdGg6MjtzdHJva2UtbGluZWNhcDpyb3VuZDtzdHJva2UtbWl0ZXJsaW1pdDoxMDsiIHgxPSI1My4wMDMiIHkxPSIzNi40ODYiIHgyPSI0OC42NzMiIHkyPSIzMy45ODYiLz4KPGxpbmUgc3R5bGU9ImZpbGw6bm9uZTtzdHJva2U6I0ZGRkZGRjtzdHJva2Utd2lkdGg6MjtzdHJva2UtbGluZWNhcDpyb3VuZDtzdHJva2UtbWl0ZXJsaW1pdDoxMDsiIHgxPSI1My4wMDMiIHkxPSIzNi40ODYiIHgyPSI1Ny4zMzQiIHkyPSIzOC45ODYiLz4KPGxpbmUgc3R5bGU9ImZpbGw6bm9uZTtzdHJva2U6I0ZGRkZGRjtzdHJva2Utd2lkdGg6MjtzdHJva2UtbGluZWNhcDpyb3VuZDtzdHJva2UtbWl0ZXJsaW1pdDoxMDsiIHgxPSI1My4wMDMiIHkxPSIzNi40ODYiIHgyPSI1Ny4zMzQiIHkyPSIzMy45ODYiLz4KPGxpbmUgc3R5bGU9ImZpbGw6bm9uZTtzdHJva2U6I0ZGRkZGRjtzdHJva2Utd2lkdGg6MjtzdHJva2UtbGluZWNhcDpyb3VuZDtzdHJva2UtbWl0ZXJsaW1pdDoxMDsiIHgxPSI1My4wMDMiIHkxPSIzNi40ODYiIHgyPSI0OC42NzMiIHkyPSIzOC45ODYiLz4KPGxpbmUgc3R5bGU9ImZpbGw6bm9uZTtzdHJva2U6I0ZGRkZGRjtzdHJva2Utd2lkdGg6MjtzdHJva2UtbGluZWNhcDpyb3VuZDtzdHJva2UtbWl0ZXJsaW1pdDoxMDsiIHgxPSIzMi4wMDMiIHkxPSIzNi40ODYiIHgyPSIzMi4wMDMiIHkyPSIzMS40ODYiLz4KPGxpbmUgc3R5bGU9ImZpbGw6bm9uZTtzdHJva2U6I0ZGRkZGRjtzdHJva2Utd2lkdGg6MjtzdHJva2UtbGluZWNhcDpyb3VuZDtzdHJva2UtbWl0ZXJsaW1pdDoxMDsiIHgxPSIzMi4wMDMiIHkxPSIzNi40ODYiIHgyPSIzMi4wMDMiIHkyPSI0MS40ODYiLz4KPGxpbmUgc3R5bGU9ImZpbGw6bm9uZTtzdHJva2U6I0ZGRkZGRjtzdHJva2Utd2lkdGg6MjtzdHJva2UtbGluZWNhcDpyb3VuZDtzdHJva2UtbWl0ZXJsaW1pdDoxMDsiIHgxPSIzMi4wMDMiIHkxPSIzNi40ODYiIHgyPSIyNy42NzMiIHkyPSIzMy45ODYiLz4KPGxpbmUgc3R5bGU9ImZpbGw6bm9uZTtzdHJva2U6I0ZGRkZGRjtzdHJva2Utd2lkdGg6MjtzdHJva2UtbGluZWNhcDpyb3VuZDtzdHJva2UtbWl0ZXJsaW1pdDoxMDsiIHgxPSIzMi4wMDMiIHkxPSIzNi40ODYiIHgyPSIzNi4zMzQiIHkyPSIzOC45ODYiLz4KPGxpbmUgc3R5bGU9ImZpbGw6bm9uZTtzdHJva2U6I0ZGRkZGRjtzdHJva2Utd2lkdGg6MjtzdHJva2UtbGluZWNhcDpyb3VuZDtzdHJva2UtbWl0ZXJsaW1pdDoxMDsiIHgxPSIzMi4wMDMiIHkxPSIzNi40ODYiIHgyPSIzNi4zMzQiIHkyPSIzMy45ODYiLz4KPGxpbmUgc3R5bGU9ImZpbGw6bm9uZTtzdHJva2U6I0ZGRkZGRjtzdHJva2Utd2lkdGg6MjtzdHJva2UtbGluZWNhcDpyb3VuZDtzdHJva2UtbWl0ZXJsaW1pdDoxMDsiIHgxPSIzMi4wMDMiIHkxPSIzNi40ODYiIHgyPSIyNy42NzMiIHkyPSIzOC45ODYiLz4KPGxpbmUgc3R5bGU9ImZpbGw6bm9uZTtzdHJva2U6I0ZGRkZGRjtzdHJva2Utd2lkdGg6MjtzdHJva2UtbGluZWNhcDpyb3VuZDtzdHJva2UtbWl0ZXJsaW1pdDoxMDsiIHgxPSI0My4wMDMiIHkxPSI0OS41MTciIHgyPSI0My4wMDMiIHkyPSI0NC41MTciLz4KPGxpbmUgc3R5bGU9ImZpbGw6bm9uZTtzdHJva2U6I0ZGRkZGRjtzdHJva2Utd2lkdGg6MjtzdHJva2UtbGluZWNhcDpyb3VuZDtzdHJva2UtbWl0ZXJsaW1pdDoxMDsiIHgxPSI0My4wMDMiIHkxPSI0OS41MTciIHgyPSI0My4wMDMiIHkyPSI1NC41MTciLz4KPGxpbmUgc3R5bGU9ImZpbGw6bm9uZTtzdHJva2U6I0ZGRkZGRjtzdHJva2Utd2lkdGg6MjtzdHJva2UtbGluZWNhcDpyb3VuZDtzdHJva2UtbWl0ZXJsaW1pdDoxMDsiIHgxPSI0My4wMDMiIHkxPSI0OS41MTciIHgyPSIzOC42NzMiIHkyPSI0Ny4wMTciLz4KPGxpbmUgc3R5bGU9ImZpbGw6bm9uZTtzdHJva2U6I0ZGRkZGRjtzdHJva2Utd2lkdGg6MjtzdHJva2UtbGluZWNhcDpyb3VuZDtzdHJva2UtbWl0ZXJsaW1pdDoxMDsiIHgxPSI0My4wMDMiIHkxPSI0OS41MTciIHgyPSI0Ny4zMzQiIHkyPSI1Mi4wMTciLz4KPGxpbmUgc3R5bGU9ImZpbGw6bm9uZTtzdHJva2U6I0ZGRkZGRjtzdHJva2Utd2lkdGg6MjtzdHJva2UtbGluZWNhcDpyb3VuZDtzdHJva2UtbWl0ZXJsaW1pdDoxMDsiIHgxPSI0My4wMDMiIHkxPSI0OS41MTciIHgyPSI0Ny4zMzQiIHkyPSI0Ny4wMTciLz4KPGxpbmUgc3R5bGU9ImZpbGw6bm9uZTtzdHJva2U6I0ZGRkZGRjtzdHJva2Utd2lkdGg6MjtzdHJva2UtbGluZWNhcDpyb3VuZDtzdHJva2UtbWl0ZXJsaW1pdDoxMDsiIHgxPSI0My4wMDMiIHkxPSI0OS41MTciIHgyPSIzOC42NzMiIHkyPSI1Mi4wMTciLz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPC9zdmc+Cg==" /> ';
                  //echo '<i class="fa fa-sun-o fa-1x" aria-hidden="true"></i>    ';
<<<<<<< HEAD
          echo "<div class=\"col-md-6\" id=\"welcome-message\">Good Morning $firstname $lastname.";
        }
        else if($hour > 11 && $hour <= 16) {
          echo '<img src="data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTkuMC4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iQ2FwYV8xIiB4PSIwcHgiIHk9IjBweCIgdmlld0JveD0iMCAwIDUxMiA1MTIiIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDUxMiA1MTI7IiB4bWw6c3BhY2U9InByZXNlcnZlIiB3aWR0aD0iNTEycHgiIGhlaWdodD0iNTEycHgiPgo8cGF0aCBzdHlsZT0iZmlsbDojRkZEQzY0OyIgZD0iTTI4OS4zNzIsODQuMjAxbC0yNy42NC04MC4xMTRjLTEuODgtNS40NDgtOS41ODQtNS40NDgtMTEuNDY0LDBsLTI3LjY0LDgwLjExNGwtMS41NDEsMC4zMDYgIGwtNTYuMTk1LTYzLjQzOGMtMy44MjEtNC4zMTQtMTAuOTQtMS4zNjUtMTAuNTkxLDQuMzg3bDUuMTIyLDg0LjU5M2wtMC4xMDUsMS40NThMODEuOTIzLDczLjgxOCAgYy01LjE4MS0yLjUyMy0xMC42MjksMi45MjUtOC4xMDYsOC4xMDZsMzcuNjg5LDc3LjM5NWwtMC4xMjQsMC4xODVsLTg1LjkyNy01LjIwM2MtNS43NTItMC4zNDgtOC43MDEsNi43Ny00LjM4NywxMC41OTEgIGw2NC40MzgsNTcuMDgxbC0wLjA0NCwwLjIxOUw0LjA4NiwyNTAuMjY5Yy01LjQ0OCwxLjg4LTUuNDQ4LDkuNTg0LDAsMTEuNDY0bDgxLjM3NywyOC4wNzZsMC4wNDQsMC4yMTlsLTY0LjQzOCw1Ny4wODEgIGMtNC4zMTQsMy44MjEtMS4zNjUsMTAuOTQsNC4zODcsMTAuNTkxbDg1LjkyNy01LjIwM2wwLjEyNCwwLjE4NWwtMzcuNjg5LDc3LjM5NWMtMi41MjMsNS4xODEsMi45MjUsMTAuNjI5LDguMTA2LDguMTA2ICBsNzcuMzk1LTM3LjY4OWwwLjE4NSwwLjEyNGwtNS4yMDMsODUuOTI3Yy0wLjM0OCw1Ljc1Miw2Ljc3LDguNzAxLDEwLjU5MSw0LjM4N2w1Ny4wODEtNjQuNDM4bDAuMjE5LDAuMDQzbDI4LjA3Niw4MS4zNzcgIGMxLjg4LDUuNDQ4LDkuNTg0LDUuNDQ4LDExLjQ2NCwwbDI4LjA3Ni04MS4zNzdsMC4yMTktMC4wNDNsNTcuMDgxLDY0LjQzOGMzLjgyMSw0LjMxNCwxMC45NCwxLjM2NSwxMC41OTEtNC4zODdsLTUuMjAzLTg1LjkyNyAgbDEuMzg3LDAuNDYxbDc2LjE5NCwzNy4xMDRjNS4xODEsMi41MjMsMTAuNjI5LTIuOTI1LDguMTA2LTguMTA2bC0zNy4xMDQtNzYuMTk0bDAuODczLTEuMzA2bDg0LjU5Myw1LjEyMiAgYzUuNzUyLDAuMzQ4LDguNzAxLTYuNzcsNC4zODctMTAuNTkxbC02My40MzgtNTYuMTk1bDAuMzA2LTEuNTQxbDgwLjExNC0yNy42NGM1LjQ0OC0xLjg4LDUuNDQ4LTkuNTg0LDAtMTEuNDY0bC04MC4xMTQtMjcuNjQgIGwtMC4zMDYtMS41NDFsNjMuNDM4LTU2LjE5NWM0LjMxNC0zLjgyMSwxLjM2NS0xMC45NC00LjM4Ny0xMC41OTFsLTg0LjU5Myw1LjEyMmwtMC44NzMtMS4zMDZsMzcuMTA0LTc2LjE5NCAgYzIuNTIzLTUuMTgxLTIuOTI1LTEwLjYyOS04LjEwNi04LjEwNmwtNzYuMTk0LDM3LjEwNGwtMS4zMDYtMC44NzNsNS4xMjItODQuNTkzYzAuMzQ4LTUuNzUyLTYuNzctOC43MDEtMTAuNTkxLTQuMzg3ICBsLTU2LjE5NSw2My40MzgiLz4KPGNpcmNsZSBzdHlsZT0iZmlsbDojRkZDODUwOyIgY3g9IjI1Ni44NiIgY3k9IjI1NC43MTEiIHI9IjE3Mi4zOCIvPgo8cGF0aCBzdHlsZT0iZmlsbDojRUJBRjRCOyIgZD0iTTMxMy4zOTQsMzcwLjU1N2MtOTUuMjA1LDAtMTcyLjM4NC03Ny4xNzktMTcyLjM4NC0xNzIuMzg0YzAtMzMuMTE3LDkuMzU3LTY0LjA0LDI1LjU0NS05MC4zMDUgIGMtNDkuMjQyLDMwLjM0OC04Mi4wNzksODQuNzUxLTgyLjA3OSwxNDYuODM5YzAsOTUuMjA1LDc3LjE3OSwxNzIuMzg0LDE3Mi4zODQsMTcyLjM4NGM2Mi4wODgsMCwxMTYuNDkxLTMyLjgzOCwxNDYuODM5LTgyLjA3OSAgQzM3Ny40MzQsMzYxLjIsMzQ2LjUxMSwzNzAuNTU3LDMxMy4zOTQsMzcwLjU1N3oiLz4KPGc+Cgk8cGF0aCBzdHlsZT0iZmlsbDojREM5QjQxOyIgZD0iTTI1NiwzMDcuOTc0Yy0xNS4yMDEsMC0yOC44OTctOS4yMTItMzQuMDg2LTIyLjkxNmMtMS42OTYtNC40NzUsMC41NTgtOS40NzQsNS4wMzMtMTEuMTc1ICAgYzQuNDY2LTEuNjkyLDkuNDcsMC41NjcsMTEuMTY2LDUuMDMzYzIuNjU2LDcuMDIxLDkuODQ2LDExLjczMywxNy44ODcsMTEuNzMzYzguMDQxLDAsMTUuMjMxLTQuNzEyLDE3Ljg4Ny0xMS43MzMgICBjMS42OTYtNC40NjYsNi42ODMtNi43MjUsMTEuMTY2LTUuMDMzYzQuNDc1LDEuNyw2LjcyOSw2LjcsNS4wMzMsMTEuMTc1QzI4NC44OTcsMjk4Ljc2MiwyNzEuMjAxLDMwNy45NzQsMjU2LDMwNy45NzR6Ii8+Cgk8cGF0aCBzdHlsZT0iZmlsbDojREM5QjQxOyIgZD0iTTI1NiwzNzcuMjcyYy05LjQyNCwwLTE4LjY4Ni0wLjgxMi0yNy41My0yLjQxMWMtNC43MDgtMC44NTQtNy44MzMtNS4zNjMtNi45NzktMTAuMDc1ICAgYzAuODU0LTQuNjk1LDUuMzgtNy44MzMsMTAuMDY2LTYuOTc5YzE1LjY1OCwyLjg0MiwzMy4yMjgsMi44NDIsNDguODg2LDBjNC42OTEtMC44NTQsOS4yMTIsMi4yODQsMTAuMDY2LDYuOTc5ICAgYzAuODU0LDQuNzEyLTIuMjcxLDkuMjItNi45NzksMTAuMDc1QzI3NC42ODYsMzc2LjQ2LDI2NS40MjQsMzc3LjI3MiwyNTYsMzc3LjI3MnoiLz4KPC9nPgo8cGF0aCBzdHlsZT0iZmlsbDojRDc4MjNDOyIgZD0iTTMyMi4xNTEsMzI1LjA3OWwtNi40OTctMTIuNDUyYy0yLjIxMi00LjIzOC03LjQ1Ny01Ljg4OC0xMS42ODYtMy42NzEgIGMtMy4zMTEsMS43MjktNC45NjcsNS4yODYtNC41MTUsOC43ODZjLTEwLjk2OSw0Ljc3NC0yNi43NTksNy41NTctNDMuNDUzLDcuNTU3cy0zMi40ODQtMi43ODQtNDMuNDUzLTcuNTU3ICBjMC40NTItMy41LTEuMjA0LTcuMDU3LTQuNTE1LTguNzg2Yy00LjIyNS0yLjIwOC05LjQ2Ni0wLjU2Ny0xMS42ODYsMy42NzFsLTYuNDk3LDEyLjQ1MmMtMi4yMTIsNC4yNDYtMC41NjcsOS40NzQsMy42NzYsMTEuNjkxICBjMS4yNzcsMC42NjgsMi42NDgsMC45ODEsMy45OTcsMC45ODFjMy4wMjUsMCw1LjkxOC0xLjYxMSw3LjUwNi00LjM5N2MxMy4zMTMsNS45MjQsMzEuNDgzLDkuMjY5LDUwLjk3Miw5LjI2OSAgczM3LjY1OS0zLjM0Niw1MC45NzItOS4yNjljMS41ODgsMi43ODUsNC40ODIsNC4zOTcsNy41MDYsNC4zOTdjMS4zNDksMCwyLjcyLTAuMzEzLDMuOTk3LTAuOTgxICBDMzIyLjcxNywzMzQuNTUzLDMyNC4zNjMsMzI5LjMyNSwzMjIuMTUxLDMyNS4wNzl6Ii8+CjxwYXRoIHN0eWxlPSJmaWxsOiM0QjNGNEU7IiBkPSJNMTkxLjAzNCwyNTYuMDAxTDE5MS4wMzQsMjU2LjAwMWMtMTEuOTYsMC0yMS42NTYtOS42OTUtMjEuNjU2LTIxLjY1NXYtOC42NjIgIGMwLTExLjk2LDkuNjk1LTIxLjY1NSwyMS42NTUtMjEuNjU1bDAsMGMxMS45NiwwLDIxLjY1NSw5LjY5NSwyMS42NTUsMjEuNjU1djguNjYyICBDMjEyLjY4OSwyNDYuMzA2LDIwMi45OTQsMjU2LjAwMSwxOTEuMDM0LDI1Ni4wMDF6Ii8+CjxwYXRoIHN0eWxlPSJmaWxsOiM1RDUzNjA7IiBkPSJNMTkxLjAzNCwyMDQuMDI4Yy0xLjQ4NCwwLTIuOTMxLDAuMTUyLTQuMzMxLDAuNDM3djIxLjIxOWMwLDcuMTc2LDUuODE3LDEyLjk5MywxMi45OTMsMTIuOTkzICBzMTIuOTkzLTUuODE3LDEyLjk5My0xMi45OTNDMjEyLjY4OSwyMTMuNzIzLDIwMi45OTQsMjA0LjAyOCwxOTEuMDM0LDIwNC4wMjh6Ii8+CjxjaXJjbGUgc3R5bGU9ImZpbGw6I0ZGRkZGRjsiIGN4PSIxOTUuMzciIGN5PSIyMjEuMzUxIiByPSI4LjY2MiIvPgo8cGF0aCBzdHlsZT0iZmlsbDojNEIzRjRFOyIgZD0iTTMyMC45NjYsMjU2LjAwMUwzMjAuOTY2LDI1Ni4wMDFjLTExLjk2LDAtMjEuNjU1LTkuNjk1LTIxLjY1NS0yMS42NTV2LTguNjYyICBjMC0xMS45Niw5LjY5NS0yMS42NTUsMjEuNjU1LTIxLjY1NWwwLDBjMTEuOTYsMCwyMS42NTUsOS42OTUsMjEuNjU1LDIxLjY1NXY4LjY2MiAgQzM0Mi42MjIsMjQ2LjMwNiwzMzIuOTI2LDI1Ni4wMDEsMzIwLjk2NiwyNTYuMDAxeiIvPgo8cGF0aCBzdHlsZT0iZmlsbDojNUQ1MzYwOyIgZD0iTTMyMC45NjYsMjA0LjAyOGMtMS40ODQsMC0yLjkzMSwwLjE1Mi00LjMzMSwwLjQzN3YyMS4yMTljMCw3LjE3Niw1LjgxNywxMi45OTMsMTIuOTkzLDEyLjk5MyAgczEyLjk5My01LjgxNywxMi45OTMtMTIuOTkzQzM0Mi42MjIsMjEzLjcyMywzMzIuOTI3LDIwNC4wMjgsMzIwLjk2NiwyMDQuMDI4eiIvPgo8Y2lyY2xlIHN0eWxlPSJmaWxsOiNGRkZGRkY7IiBjeD0iMzI1LjMiIGN5PSIyMjEuMzUxIiByPSI4LjY2MiIvPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8L3N2Zz4K" /> ';
||||||| merged common ancestors
                  echo '<div class="col-md-6" id="welcome-message">Good Morning $name.';
                }
                else if($hour > 11 && $hour <= 16) {
                  echo '<img src="data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTkuMC4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iQ2FwYV8xIiB4PSIwcHgiIHk9IjBweCIgdmlld0JveD0iMCAwIDUxMiA1MTIiIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDUxMiA1MTI7IiB4bWw6c3BhY2U9InByZXNlcnZlIiB3aWR0aD0iNTEycHgiIGhlaWdodD0iNTEycHgiPgo8cGF0aCBzdHlsZT0iZmlsbDojRkZEQzY0OyIgZD0iTTI4OS4zNzIsODQuMjAxbC0yNy42NC04MC4xMTRjLTEuODgtNS40NDgtOS41ODQtNS40NDgtMTEuNDY0LDBsLTI3LjY0LDgwLjExNGwtMS41NDEsMC4zMDYgIGwtNTYuMTk1LTYzLjQzOGMtMy44MjEtNC4zMTQtMTAuOTQtMS4zNjUtMTAuNTkxLDQuMzg3bDUuMTIyLDg0LjU5M2wtMC4xMDUsMS40NThMODEuOTIzLDczLjgxOCAgYy01LjE4MS0yLjUyMy0xMC42MjksMi45MjUtOC4xMDYsOC4xMDZsMzcuNjg5LDc3LjM5NWwtMC4xMjQsMC4xODVsLTg1LjkyNy01LjIwM2MtNS43NTItMC4zNDgtOC43MDEsNi43Ny00LjM4NywxMC41OTEgIGw2NC40MzgsNTcuMDgxbC0wLjA0NCwwLjIxOUw0LjA4NiwyNTAuMjY5Yy01LjQ0OCwxLjg4LTUuNDQ4LDkuNTg0LDAsMTEuNDY0bDgxLjM3NywyOC4wNzZsMC4wNDQsMC4yMTlsLTY0LjQzOCw1Ny4wODEgIGMtNC4zMTQsMy44MjEtMS4zNjUsMTAuOTQsNC4zODcsMTAuNTkxbDg1LjkyNy01LjIwM2wwLjEyNCwwLjE4NWwtMzcuNjg5LDc3LjM5NWMtMi41MjMsNS4xODEsMi45MjUsMTAuNjI5LDguMTA2LDguMTA2ICBsNzcuMzk1LTM3LjY4OWwwLjE4NSwwLjEyNGwtNS4yMDMsODUuOTI3Yy0wLjM0OCw1Ljc1Miw2Ljc3LDguNzAxLDEwLjU5MSw0LjM4N2w1Ny4wODEtNjQuNDM4bDAuMjE5LDAuMDQzbDI4LjA3Niw4MS4zNzcgIGMxLjg4LDUuNDQ4LDkuNTg0LDUuNDQ4LDExLjQ2NCwwbDI4LjA3Ni04MS4zNzdsMC4yMTktMC4wNDNsNTcuMDgxLDY0LjQzOGMzLjgyMSw0LjMxNCwxMC45NCwxLjM2NSwxMC41OTEtNC4zODdsLTUuMjAzLTg1LjkyNyAgbDEuMzg3LDAuNDYxbDc2LjE5NCwzNy4xMDRjNS4xODEsMi41MjMsMTAuNjI5LTIuOTI1LDguMTA2LTguMTA2bC0zNy4xMDQtNzYuMTk0bDAuODczLTEuMzA2bDg0LjU5Myw1LjEyMiAgYzUuNzUyLDAuMzQ4LDguNzAxLTYuNzcsNC4zODctMTAuNTkxbC02My40MzgtNTYuMTk1bDAuMzA2LTEuNTQxbDgwLjExNC0yNy42NGM1LjQ0OC0xLjg4LDUuNDQ4LTkuNTg0LDAtMTEuNDY0bC04MC4xMTQtMjcuNjQgIGwtMC4zMDYtMS41NDFsNjMuNDM4LTU2LjE5NWM0LjMxNC0zLjgyMSwxLjM2NS0xMC45NC00LjM4Ny0xMC41OTFsLTg0LjU5Myw1LjEyMmwtMC44NzMtMS4zMDZsMzcuMTA0LTc2LjE5NCAgYzIuNTIzLTUuMTgxLTIuOTI1LTEwLjYyOS04LjEwNi04LjEwNmwtNzYuMTk0LDM3LjEwNGwtMS4zMDYtMC44NzNsNS4xMjItODQuNTkzYzAuMzQ4LTUuNzUyLTYuNzctOC43MDEtMTAuNTkxLTQuMzg3ICBsLTU2LjE5NSw2My40MzgiLz4KPGNpcmNsZSBzdHlsZT0iZmlsbDojRkZDODUwOyIgY3g9IjI1Ni44NiIgY3k9IjI1NC43MTEiIHI9IjE3Mi4zOCIvPgo8cGF0aCBzdHlsZT0iZmlsbDojRUJBRjRCOyIgZD0iTTMxMy4zOTQsMzcwLjU1N2MtOTUuMjA1LDAtMTcyLjM4NC03Ny4xNzktMTcyLjM4NC0xNzIuMzg0YzAtMzMuMTE3LDkuMzU3LTY0LjA0LDI1LjU0NS05MC4zMDUgIGMtNDkuMjQyLDMwLjM0OC04Mi4wNzksODQuNzUxLTgyLjA3OSwxNDYuODM5YzAsOTUuMjA1LDc3LjE3OSwxNzIuMzg0LDE3Mi4zODQsMTcyLjM4NGM2Mi4wODgsMCwxMTYuNDkxLTMyLjgzOCwxNDYuODM5LTgyLjA3OSAgQzM3Ny40MzQsMzYxLjIsMzQ2LjUxMSwzNzAuNTU3LDMxMy4zOTQsMzcwLjU1N3oiLz4KPGc+Cgk8cGF0aCBzdHlsZT0iZmlsbDojREM5QjQxOyIgZD0iTTI1NiwzMDcuOTc0Yy0xNS4yMDEsMC0yOC44OTctOS4yMTItMzQuMDg2LTIyLjkxNmMtMS42OTYtNC40NzUsMC41NTgtOS40NzQsNS4wMzMtMTEuMTc1ICAgYzQuNDY2LTEuNjkyLDkuNDcsMC41NjcsMTEuMTY2LDUuMDMzYzIuNjU2LDcuMDIxLDkuODQ2LDExLjczMywxNy44ODcsMTEuNzMzYzguMDQxLDAsMTUuMjMxLTQuNzEyLDE3Ljg4Ny0xMS43MzMgICBjMS42OTYtNC40NjYsNi42ODMtNi43MjUsMTEuMTY2LTUuMDMzYzQuNDc1LDEuNyw2LjcyOSw2LjcsNS4wMzMsMTEuMTc1QzI4NC44OTcsMjk4Ljc2MiwyNzEuMjAxLDMwNy45NzQsMjU2LDMwNy45NzR6Ii8+Cgk8cGF0aCBzdHlsZT0iZmlsbDojREM5QjQxOyIgZD0iTTI1NiwzNzcuMjcyYy05LjQyNCwwLTE4LjY4Ni0wLjgxMi0yNy41My0yLjQxMWMtNC43MDgtMC44NTQtNy44MzMtNS4zNjMtNi45NzktMTAuMDc1ICAgYzAuODU0LTQuNjk1LDUuMzgtNy44MzMsMTAuMDY2LTYuOTc5YzE1LjY1OCwyLjg0MiwzMy4yMjgsMi44NDIsNDguODg2LDBjNC42OTEtMC44NTQsOS4yMTIsMi4yODQsMTAuMDY2LDYuOTc5ICAgYzAuODU0LDQuNzEyLTIuMjcxLDkuMjItNi45NzksMTAuMDc1QzI3NC42ODYsMzc2LjQ2LDI2NS40MjQsMzc3LjI3MiwyNTYsMzc3LjI3MnoiLz4KPC9nPgo8cGF0aCBzdHlsZT0iZmlsbDojRDc4MjNDOyIgZD0iTTMyMi4xNTEsMzI1LjA3OWwtNi40OTctMTIuNDUyYy0yLjIxMi00LjIzOC03LjQ1Ny01Ljg4OC0xMS42ODYtMy42NzEgIGMtMy4zMTEsMS43MjktNC45NjcsNS4yODYtNC41MTUsOC43ODZjLTEwLjk2OSw0Ljc3NC0yNi43NTksNy41NTctNDMuNDUzLDcuNTU3cy0zMi40ODQtMi43ODQtNDMuNDUzLTcuNTU3ICBjMC40NTItMy41LTEuMjA0LTcuMDU3LTQuNTE1LTguNzg2Yy00LjIyNS0yLjIwOC05LjQ2Ni0wLjU2Ny0xMS42ODYsMy42NzFsLTYuNDk3LDEyLjQ1MmMtMi4yMTIsNC4yNDYtMC41NjcsOS40NzQsMy42NzYsMTEuNjkxICBjMS4yNzcsMC42NjgsMi42NDgsMC45ODEsMy45OTcsMC45ODFjMy4wMjUsMCw1LjkxOC0xLjYxMSw3LjUwNi00LjM5N2MxMy4zMTMsNS45MjQsMzEuNDgzLDkuMjY5LDUwLjk3Miw5LjI2OSAgczM3LjY1OS0zLjM0Niw1MC45NzItOS4yNjljMS41ODgsMi43ODUsNC40ODIsNC4zOTcsNy41MDYsNC4zOTdjMS4zNDksMCwyLjcyLTAuMzEzLDMuOTk3LTAuOTgxICBDMzIyLjcxNywzMzQuNTUzLDMyNC4zNjMsMzI5LjMyNSwzMjIuMTUxLDMyNS4wNzl6Ii8+CjxwYXRoIHN0eWxlPSJmaWxsOiM0QjNGNEU7IiBkPSJNMTkxLjAzNCwyNTYuMDAxTDE5MS4wMzQsMjU2LjAwMWMtMTEuOTYsMC0yMS42NTYtOS42OTUtMjEuNjU2LTIxLjY1NXYtOC42NjIgIGMwLTExLjk2LDkuNjk1LTIxLjY1NSwyMS42NTUtMjEuNjU1bDAsMGMxMS45NiwwLDIxLjY1NSw5LjY5NSwyMS42NTUsMjEuNjU1djguNjYyICBDMjEyLjY4OSwyNDYuMzA2LDIwMi45OTQsMjU2LjAwMSwxOTEuMDM0LDI1Ni4wMDF6Ii8+CjxwYXRoIHN0eWxlPSJmaWxsOiM1RDUzNjA7IiBkPSJNMTkxLjAzNCwyMDQuMDI4Yy0xLjQ4NCwwLTIuOTMxLDAuMTUyLTQuMzMxLDAuNDM3djIxLjIxOWMwLDcuMTc2LDUuODE3LDEyLjk5MywxMi45OTMsMTIuOTkzICBzMTIuOTkzLTUuODE3LDEyLjk5My0xMi45OTNDMjEyLjY4OSwyMTMuNzIzLDIwMi45OTQsMjA0LjAyOCwxOTEuMDM0LDIwNC4wMjh6Ii8+CjxjaXJjbGUgc3R5bGU9ImZpbGw6I0ZGRkZGRjsiIGN4PSIxOTUuMzciIGN5PSIyMjEuMzUxIiByPSI4LjY2MiIvPgo8cGF0aCBzdHlsZT0iZmlsbDojNEIzRjRFOyIgZD0iTTMyMC45NjYsMjU2LjAwMUwzMjAuOTY2LDI1Ni4wMDFjLTExLjk2LDAtMjEuNjU1LTkuNjk1LTIxLjY1NS0yMS42NTV2LTguNjYyICBjMC0xMS45Niw5LjY5NS0yMS42NTUsMjEuNjU1LTIxLjY1NWwwLDBjMTEuOTYsMCwyMS42NTUsOS42OTUsMjEuNjU1LDIxLjY1NXY4LjY2MiAgQzM0Mi42MjIsMjQ2LjMwNiwzMzIuOTI2LDI1Ni4wMDEsMzIwLjk2NiwyNTYuMDAxeiIvPgo8cGF0aCBzdHlsZT0iZmlsbDojNUQ1MzYwOyIgZD0iTTMyMC45NjYsMjA0LjAyOGMtMS40ODQsMC0yLjkzMSwwLjE1Mi00LjMzMSwwLjQzN3YyMS4yMTljMCw3LjE3Niw1LjgxNywxMi45OTMsMTIuOTkzLDEyLjk5MyAgczEyLjk5My01LjgxNywxMi45OTMtMTIuOTkzQzM0Mi42MjIsMjEzLjcyMywzMzIuOTI3LDIwNC4wMjgsMzIwLjk2NiwyMDQuMDI4eiIvPgo8Y2lyY2xlIHN0eWxlPSJmaWxsOiNGRkZGRkY7IiBjeD0iMzI1LjMiIGN5PSIyMjEuMzUxIiByPSI4LjY2MiIvPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8L3N2Zz4K" /> ';
=======
                  echo '<div class="col-md-6" id="welcome-message">Good Morning'. $name.'.';
                }
                else if($hour > 11 && $hour <= 16) {
                  echo '<img src="data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTkuMC4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iQ2FwYV8xIiB4PSIwcHgiIHk9IjBweCIgdmlld0JveD0iMCAwIDUxMiA1MTIiIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDUxMiA1MTI7IiB4bWw6c3BhY2U9InByZXNlcnZlIiB3aWR0aD0iNTEycHgiIGhlaWdodD0iNTEycHgiPgo8cGF0aCBzdHlsZT0iZmlsbDojRkZEQzY0OyIgZD0iTTI4OS4zNzIsODQuMjAxbC0yNy42NC04MC4xMTRjLTEuODgtNS40NDgtOS41ODQtNS40NDgtMTEuNDY0LDBsLTI3LjY0LDgwLjExNGwtMS41NDEsMC4zMDYgIGwtNTYuMTk1LTYzLjQzOGMtMy44MjEtNC4zMTQtMTAuOTQtMS4zNjUtMTAuNTkxLDQuMzg3bDUuMTIyLDg0LjU5M2wtMC4xMDUsMS40NThMODEuOTIzLDczLjgxOCAgYy01LjE4MS0yLjUyMy0xMC42MjksMi45MjUtOC4xMDYsOC4xMDZsMzcuNjg5LDc3LjM5NWwtMC4xMjQsMC4xODVsLTg1LjkyNy01LjIwM2MtNS43NTItMC4zNDgtOC43MDEsNi43Ny00LjM4NywxMC41OTEgIGw2NC40MzgsNTcuMDgxbC0wLjA0NCwwLjIxOUw0LjA4NiwyNTAuMjY5Yy01LjQ0OCwxLjg4LTUuNDQ4LDkuNTg0LDAsMTEuNDY0bDgxLjM3NywyOC4wNzZsMC4wNDQsMC4yMTlsLTY0LjQzOCw1Ny4wODEgIGMtNC4zMTQsMy44MjEtMS4zNjUsMTAuOTQsNC4zODcsMTAuNTkxbDg1LjkyNy01LjIwM2wwLjEyNCwwLjE4NWwtMzcuNjg5LDc3LjM5NWMtMi41MjMsNS4xODEsMi45MjUsMTAuNjI5LDguMTA2LDguMTA2ICBsNzcuMzk1LTM3LjY4OWwwLjE4NSwwLjEyNGwtNS4yMDMsODUuOTI3Yy0wLjM0OCw1Ljc1Miw2Ljc3LDguNzAxLDEwLjU5MSw0LjM4N2w1Ny4wODEtNjQuNDM4bDAuMjE5LDAuMDQzbDI4LjA3Niw4MS4zNzcgIGMxLjg4LDUuNDQ4LDkuNTg0LDUuNDQ4LDExLjQ2NCwwbDI4LjA3Ni04MS4zNzdsMC4yMTktMC4wNDNsNTcuMDgxLDY0LjQzOGMzLjgyMSw0LjMxNCwxMC45NCwxLjM2NSwxMC41OTEtNC4zODdsLTUuMjAzLTg1LjkyNyAgbDEuMzg3LDAuNDYxbDc2LjE5NCwzNy4xMDRjNS4xODEsMi41MjMsMTAuNjI5LTIuOTI1LDguMTA2LTguMTA2bC0zNy4xMDQtNzYuMTk0bDAuODczLTEuMzA2bDg0LjU5Myw1LjEyMiAgYzUuNzUyLDAuMzQ4LDguNzAxLTYuNzcsNC4zODctMTAuNTkxbC02My40MzgtNTYuMTk1bDAuMzA2LTEuNTQxbDgwLjExNC0yNy42NGM1LjQ0OC0xLjg4LDUuNDQ4LTkuNTg0LDAtMTEuNDY0bC04MC4xMTQtMjcuNjQgIGwtMC4zMDYtMS41NDFsNjMuNDM4LTU2LjE5NWM0LjMxNC0zLjgyMSwxLjM2NS0xMC45NC00LjM4Ny0xMC41OTFsLTg0LjU5Myw1LjEyMmwtMC44NzMtMS4zMDZsMzcuMTA0LTc2LjE5NCAgYzIuNTIzLTUuMTgxLTIuOTI1LTEwLjYyOS04LjEwNi04LjEwNmwtNzYuMTk0LDM3LjEwNGwtMS4zMDYtMC44NzNsNS4xMjItODQuNTkzYzAuMzQ4LTUuNzUyLTYuNzctOC43MDEtMTAuNTkxLTQuMzg3ICBsLTU2LjE5NSw2My40MzgiLz4KPGNpcmNsZSBzdHlsZT0iZmlsbDojRkZDODUwOyIgY3g9IjI1Ni44NiIgY3k9IjI1NC43MTEiIHI9IjE3Mi4zOCIvPgo8cGF0aCBzdHlsZT0iZmlsbDojRUJBRjRCOyIgZD0iTTMxMy4zOTQsMzcwLjU1N2MtOTUuMjA1LDAtMTcyLjM4NC03Ny4xNzktMTcyLjM4NC0xNzIuMzg0YzAtMzMuMTE3LDkuMzU3LTY0LjA0LDI1LjU0NS05MC4zMDUgIGMtNDkuMjQyLDMwLjM0OC04Mi4wNzksODQuNzUxLTgyLjA3OSwxNDYuODM5YzAsOTUuMjA1LDc3LjE3OSwxNzIuMzg0LDE3Mi4zODQsMTcyLjM4NGM2Mi4wODgsMCwxMTYuNDkxLTMyLjgzOCwxNDYuODM5LTgyLjA3OSAgQzM3Ny40MzQsMzYxLjIsMzQ2LjUxMSwzNzAuNTU3LDMxMy4zOTQsMzcwLjU1N3oiLz4KPGc+Cgk8cGF0aCBzdHlsZT0iZmlsbDojREM5QjQxOyIgZD0iTTI1NiwzMDcuOTc0Yy0xNS4yMDEsMC0yOC44OTctOS4yMTItMzQuMDg2LTIyLjkxNmMtMS42OTYtNC40NzUsMC41NTgtOS40NzQsNS4wMzMtMTEuMTc1ICAgYzQuNDY2LTEuNjkyLDkuNDcsMC41NjcsMTEuMTY2LDUuMDMzYzIuNjU2LDcuMDIxLDkuODQ2LDExLjczMywxNy44ODcsMTEuNzMzYzguMDQxLDAsMTUuMjMxLTQuNzEyLDE3Ljg4Ny0xMS43MzMgICBjMS42OTYtNC40NjYsNi42ODMtNi43MjUsMTEuMTY2LTUuMDMzYzQuNDc1LDEuNyw2LjcyOSw2LjcsNS4wMzMsMTEuMTc1QzI4NC44OTcsMjk4Ljc2MiwyNzEuMjAxLDMwNy45NzQsMjU2LDMwNy45NzR6Ii8+Cgk8cGF0aCBzdHlsZT0iZmlsbDojREM5QjQxOyIgZD0iTTI1NiwzNzcuMjcyYy05LjQyNCwwLTE4LjY4Ni0wLjgxMi0yNy41My0yLjQxMWMtNC43MDgtMC44NTQtNy44MzMtNS4zNjMtNi45NzktMTAuMDc1ICAgYzAuODU0LTQuNjk1LDUuMzgtNy44MzMsMTAuMDY2LTYuOTc5YzE1LjY1OCwyLjg0MiwzMy4yMjgsMi44NDIsNDguODg2LDBjNC42OTEtMC44NTQsOS4yMTIsMi4yODQsMTAuMDY2LDYuOTc5ICAgYzAuODU0LDQuNzEyLTIuMjcxLDkuMjItNi45NzksMTAuMDc1QzI3NC42ODYsMzc2LjQ2LDI2NS40MjQsMzc3LjI3MiwyNTYsMzc3LjI3MnoiLz4KPC9nPgo8cGF0aCBzdHlsZT0iZmlsbDojRDc4MjNDOyIgZD0iTTMyMi4xNTEsMzI1LjA3OWwtNi40OTctMTIuNDUyYy0yLjIxMi00LjIzOC03LjQ1Ny01Ljg4OC0xMS42ODYtMy42NzEgIGMtMy4zMTEsMS43MjktNC45NjcsNS4yODYtNC41MTUsOC43ODZjLTEwLjk2OSw0Ljc3NC0yNi43NTksNy41NTctNDMuNDUzLDcuNTU3cy0zMi40ODQtMi43ODQtNDMuNDUzLTcuNTU3ICBjMC40NTItMy41LTEuMjA0LTcuMDU3LTQuNTE1LTguNzg2Yy00LjIyNS0yLjIwOC05LjQ2Ni0wLjU2Ny0xMS42ODYsMy42NzFsLTYuNDk3LDEyLjQ1MmMtMi4yMTIsNC4yNDYtMC41NjcsOS40NzQsMy42NzYsMTEuNjkxICBjMS4yNzcsMC42NjgsMi42NDgsMC45ODEsMy45OTcsMC45ODFjMy4wMjUsMCw1LjkxOC0xLjYxMSw3LjUwNi00LjM5N2MxMy4zMTMsNS45MjQsMzEuNDgzLDkuMjY5LDUwLjk3Miw5LjI2OSAgczM3LjY1OS0zLjM0Niw1MC45NzItOS4yNjljMS41ODgsMi43ODUsNC40ODIsNC4zOTcsNy41MDYsNC4zOTdjMS4zNDksMCwyLjcyLTAuMzEzLDMuOTk3LTAuOTgxICBDMzIyLjcxNywzMzQuNTUzLDMyNC4zNjMsMzI5LjMyNSwzMjIuMTUxLDMyNS4wNzl6Ii8+CjxwYXRoIHN0eWxlPSJmaWxsOiM0QjNGNEU7IiBkPSJNMTkxLjAzNCwyNTYuMDAxTDE5MS4wMzQsMjU2LjAwMWMtMTEuOTYsMC0yMS42NTYtOS42OTUtMjEuNjU2LTIxLjY1NXYtOC42NjIgIGMwLTExLjk2LDkuNjk1LTIxLjY1NSwyMS42NTUtMjEuNjU1bDAsMGMxMS45NiwwLDIxLjY1NSw5LjY5NSwyMS42NTUsMjEuNjU1djguNjYyICBDMjEyLjY4OSwyNDYuMzA2LDIwMi45OTQsMjU2LjAwMSwxOTEuMDM0LDI1Ni4wMDF6Ii8+CjxwYXRoIHN0eWxlPSJmaWxsOiM1RDUzNjA7IiBkPSJNMTkxLjAzNCwyMDQuMDI4Yy0xLjQ4NCwwLTIuOTMxLDAuMTUyLTQuMzMxLDAuNDM3djIxLjIxOWMwLDcuMTc2LDUuODE3LDEyLjk5MywxMi45OTMsMTIuOTkzICBzMTIuOTkzLTUuODE3LDEyLjk5My0xMi45OTNDMjEyLjY4OSwyMTMuNzIzLDIwMi45OTQsMjA0LjAyOCwxOTEuMDM0LDIwNC4wMjh6Ii8+CjxjaXJjbGUgc3R5bGU9ImZpbGw6I0ZGRkZGRjsiIGN4PSIxOTUuMzciIGN5PSIyMjEuMzUxIiByPSI4LjY2MiIvPgo8cGF0aCBzdHlsZT0iZmlsbDojNEIzRjRFOyIgZD0iTTMyMC45NjYsMjU2LjAwMUwzMjAuOTY2LDI1Ni4wMDFjLTExLjk2LDAtMjEuNjU1LTkuNjk1LTIxLjY1NS0yMS42NTV2LTguNjYyICBjMC0xMS45Niw5LjY5NS0yMS42NTUsMjEuNjU1LTIxLjY1NWwwLDBjMTEuOTYsMCwyMS42NTUsOS42OTUsMjEuNjU1LDIxLjY1NXY4LjY2MiAgQzM0Mi42MjIsMjQ2LjMwNiwzMzIuOTI2LDI1Ni4wMDEsMzIwLjk2NiwyNTYuMDAxeiIvPgo8cGF0aCBzdHlsZT0iZmlsbDojNUQ1MzYwOyIgZD0iTTMyMC45NjYsMjA0LjAyOGMtMS40ODQsMC0yLjkzMSwwLjE1Mi00LjMzMSwwLjQzN3YyMS4yMTljMCw3LjE3Niw1LjgxNywxMi45OTMsMTIuOTkzLDEyLjk5MyAgczEyLjk5My01LjgxNywxMi45OTMtMTIuOTkzQzM0Mi42MjIsMjEzLjcyMywzMzIuOTI3LDIwNC4wMjgsMzIwLjk2NiwyMDQuMDI4eiIvPgo8Y2lyY2xlIHN0eWxlPSJmaWxsOiNGRkZGRkY7IiBjeD0iMzI1LjMiIGN5PSIyMjEuMzUxIiByPSI4LjY2MiIvPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8L3N2Zz4K" /> ';
>>>>>>> 2f3fd080a9296e10f0e713804ce2f8dd3a17dbda
                  //echo '<i class="fa fa-sun-o fa-1x" aria-hidden="true"></i>    ';
<<<<<<< HEAD
          echo '<div class="col-md-6" id="welcome-message">Good Afternoon $firstname $lastname.';
        }
        else if($hour > 16 && $hour <= 20) {
          echo '<img src="data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTkuMC4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iTGF5ZXJfMSIgeD0iMHB4IiB5PSIwcHgiIHZpZXdCb3g9IjAgMCA1MTIgNTEyIiBzdHlsZT0iZW5hYmxlLWJhY2tncm91bmQ6bmV3IDAgMCA1MTIgNTEyOyIgeG1sOnNwYWNlPSJwcmVzZXJ2ZSIgd2lkdGg9IjUxMnB4IiBoZWlnaHQ9IjUxMnB4Ij4KPHBhdGggc3R5bGU9ImZpbGw6I0YyODU0NDsiIGQ9Ik0yNjUuNzk2LDI5NS41MjFjLTY3LjI1NywwLTEyMi41NTQsNTIuMTQ5LTEyNy42MDEsMTE4LjEzMmgyNTUuMjAyICBDMzg4LjM1LDM0Ny42NywzMzMuMDUzLDI5NS41MjEsMjY1Ljc5NiwyOTUuNTIxeiIvPgo8Zz4KCTxwYXRoIHN0eWxlPSJmaWxsOiMzMTRFNTU7IiBkPSJNNDEyLjk2Miw0MTMuNjUzYy01LjEwNC03Ni44MjktNjkuMDYyLTEzNy44Mi0xNDcuMTY2LTEzNy44MnMtMTQyLjA2Miw2MC45OTEtMTQ3LjE2NiwxMzcuODJIMCAgIHYxOS42ODloMTI3Ljk3NmgyNzUuNjQxSDUxMnYtMTkuNjg5SDQxMi45NjJ6IE0xMzguMTk1LDQxMy42NTNjNS4wNDctNjUuOTgzLDYwLjM0NC0xMTguMTMyLDEyNy42MDEtMTE4LjEzMiAgIFMzODguMzUsMzQ3LjY3LDM5My4zOTcsNDEzLjY1M0gxMzguMTk1eiIvPgoJPHBhdGggc3R5bGU9ImZpbGw6IzMxNEU1NTsiIGQ9Ik0yNjUuNzk2LDI2NS45ODljNS40NDEsMCw5Ljg0NC00LjQwOCw5Ljg0NC05Ljg0NFY4OC41MDNjMC01LjQzNy00LjQwMy05Ljg0NC05Ljg0NC05Ljg0NCAgIHMtOS44NDQsNC40MDgtOS44NDQsOS44NDR2MTY3LjY0MkMyNTUuOTUyLDI2MS41ODEsMjYwLjM1NSwyNjUuOTg5LDI2NS43OTYsMjY1Ljk4OXoiLz4KCTxwYXRoIHN0eWxlPSJmaWxsOiMzMTRFNTU7IiBkPSJNMzkyLjA5OSwzMTUuMDU2YzIuNTE5LDAsNS4wMzgtMC45NjEsNi45Ni0yLjg4NGwxMDAuOTA0LTEwMC45MDljMy44NDUtMy44NDUsMy44NDUtMTAuMDc1LDAtMTMuOTIgICBjLTMuODQ1LTMuODQ1LTEwLjA3NS0zLjg0NS0xMy45MiwwTDM4NS4xMzksMjk4LjI1MmMtMy44NDUsMy44NDUtMy44NDUsMTAuMDc1LDAsMTMuOTIgICBDMzg3LjA2MiwzMTQuMDk1LDM4OS41ODEsMzE1LjA1NiwzOTIuMDk5LDMxNS4wNTZ6Ii8+Cgk8cGF0aCBzdHlsZT0iZmlsbDojMzE0RTU1OyIgZD0iTTEzMi4wOTEsMzEyLjE3MmMxLjkyMywxLjkyMyw0LjQ0MSwyLjg4NCw2Ljk2LDIuODg0czUuMDM4LTAuOTYxLDYuOTYtMi44ODQgICBjMy44NDUtMy44NDUsMy44NDUtMTAuMDc1LDAtMTMuOTJMNDUuMTA3LDE5Ny4zNDNjLTMuODQ1LTMuODQ1LTEwLjA3NS0zLjg0NS0xMy45Miwwcy0zLjg0NSwxMC4wNzUsMCwxMy45MkwxMzIuMDkxLDMxMi4xNzJ6Ii8+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPC9zdmc+Cg==" /> ';
||||||| merged common ancestors
                  echo '<div class="col-md-6" id="welcome-message">Good Afternoon $name.';
                }
                else if($hour > 16 && $hour <= 20) {
                  echo '<img src="data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTkuMC4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iTGF5ZXJfMSIgeD0iMHB4IiB5PSIwcHgiIHZpZXdCb3g9IjAgMCA1MTIgNTEyIiBzdHlsZT0iZW5hYmxlLWJhY2tncm91bmQ6bmV3IDAgMCA1MTIgNTEyOyIgeG1sOnNwYWNlPSJwcmVzZXJ2ZSIgd2lkdGg9IjUxMnB4IiBoZWlnaHQ9IjUxMnB4Ij4KPHBhdGggc3R5bGU9ImZpbGw6I0YyODU0NDsiIGQ9Ik0yNjUuNzk2LDI5NS41MjFjLTY3LjI1NywwLTEyMi41NTQsNTIuMTQ5LTEyNy42MDEsMTE4LjEzMmgyNTUuMjAyICBDMzg4LjM1LDM0Ny42NywzMzMuMDUzLDI5NS41MjEsMjY1Ljc5NiwyOTUuNTIxeiIvPgo8Zz4KCTxwYXRoIHN0eWxlPSJmaWxsOiMzMTRFNTU7IiBkPSJNNDEyLjk2Miw0MTMuNjUzYy01LjEwNC03Ni44MjktNjkuMDYyLTEzNy44Mi0xNDcuMTY2LTEzNy44MnMtMTQyLjA2Miw2MC45OTEtMTQ3LjE2NiwxMzcuODJIMCAgIHYxOS42ODloMTI3Ljk3NmgyNzUuNjQxSDUxMnYtMTkuNjg5SDQxMi45NjJ6IE0xMzguMTk1LDQxMy42NTNjNS4wNDctNjUuOTgzLDYwLjM0NC0xMTguMTMyLDEyNy42MDEtMTE4LjEzMiAgIFMzODguMzUsMzQ3LjY3LDM5My4zOTcsNDEzLjY1M0gxMzguMTk1eiIvPgoJPHBhdGggc3R5bGU9ImZpbGw6IzMxNEU1NTsiIGQ9Ik0yNjUuNzk2LDI2NS45ODljNS40NDEsMCw5Ljg0NC00LjQwOCw5Ljg0NC05Ljg0NFY4OC41MDNjMC01LjQzNy00LjQwMy05Ljg0NC05Ljg0NC05Ljg0NCAgIHMtOS44NDQsNC40MDgtOS44NDQsOS44NDR2MTY3LjY0MkMyNTUuOTUyLDI2MS41ODEsMjYwLjM1NSwyNjUuOTg5LDI2NS43OTYsMjY1Ljk4OXoiLz4KCTxwYXRoIHN0eWxlPSJmaWxsOiMzMTRFNTU7IiBkPSJNMzkyLjA5OSwzMTUuMDU2YzIuNTE5LDAsNS4wMzgtMC45NjEsNi45Ni0yLjg4NGwxMDAuOTA0LTEwMC45MDljMy44NDUtMy44NDUsMy44NDUtMTAuMDc1LDAtMTMuOTIgICBjLTMuODQ1LTMuODQ1LTEwLjA3NS0zLjg0NS0xMy45MiwwTDM4NS4xMzksMjk4LjI1MmMtMy44NDUsMy44NDUtMy44NDUsMTAuMDc1LDAsMTMuOTIgICBDMzg3LjA2MiwzMTQuMDk1LDM4OS41ODEsMzE1LjA1NiwzOTIuMDk5LDMxNS4wNTZ6Ii8+Cgk8cGF0aCBzdHlsZT0iZmlsbDojMzE0RTU1OyIgZD0iTTEzMi4wOTEsMzEyLjE3MmMxLjkyMywxLjkyMyw0LjQ0MSwyLjg4NCw2Ljk2LDIuODg0czUuMDM4LTAuOTYxLDYuOTYtMi44ODQgICBjMy44NDUtMy44NDUsMy44NDUtMTAuMDc1LDAtMTMuOTJMNDUuMTA3LDE5Ny4zNDNjLTMuODQ1LTMuODQ1LTEwLjA3NS0zLjg0NS0xMy45Miwwcy0zLjg0NSwxMC4wNzUsMCwxMy45MkwxMzIuMDkxLDMxMi4xNzJ6Ii8+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPC9zdmc+Cg==" /> ';
=======
                  echo '<div class="col-md-6" id="welcome-message">Good Afternoon '.$name.'.';
                }
                else if($hour > 16 && $hour <= 20) {
                  echo '<img src="data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTkuMC4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iTGF5ZXJfMSIgeD0iMHB4IiB5PSIwcHgiIHZpZXdCb3g9IjAgMCA1MTIgNTEyIiBzdHlsZT0iZW5hYmxlLWJhY2tncm91bmQ6bmV3IDAgMCA1MTIgNTEyOyIgeG1sOnNwYWNlPSJwcmVzZXJ2ZSIgd2lkdGg9IjUxMnB4IiBoZWlnaHQ9IjUxMnB4Ij4KPHBhdGggc3R5bGU9ImZpbGw6I0YyODU0NDsiIGQ9Ik0yNjUuNzk2LDI5NS41MjFjLTY3LjI1NywwLTEyMi41NTQsNTIuMTQ5LTEyNy42MDEsMTE4LjEzMmgyNTUuMjAyICBDMzg4LjM1LDM0Ny42NywzMzMuMDUzLDI5NS41MjEsMjY1Ljc5NiwyOTUuNTIxeiIvPgo8Zz4KCTxwYXRoIHN0eWxlPSJmaWxsOiMzMTRFNTU7IiBkPSJNNDEyLjk2Miw0MTMuNjUzYy01LjEwNC03Ni44MjktNjkuMDYyLTEzNy44Mi0xNDcuMTY2LTEzNy44MnMtMTQyLjA2Miw2MC45OTEtMTQ3LjE2NiwxMzcuODJIMCAgIHYxOS42ODloMTI3Ljk3NmgyNzUuNjQxSDUxMnYtMTkuNjg5SDQxMi45NjJ6IE0xMzguMTk1LDQxMy42NTNjNS4wNDctNjUuOTgzLDYwLjM0NC0xMTguMTMyLDEyNy42MDEtMTE4LjEzMiAgIFMzODguMzUsMzQ3LjY3LDM5My4zOTcsNDEzLjY1M0gxMzguMTk1eiIvPgoJPHBhdGggc3R5bGU9ImZpbGw6IzMxNEU1NTsiIGQ9Ik0yNjUuNzk2LDI2NS45ODljNS40NDEsMCw5Ljg0NC00LjQwOCw5Ljg0NC05Ljg0NFY4OC41MDNjMC01LjQzNy00LjQwMy05Ljg0NC05Ljg0NC05Ljg0NCAgIHMtOS44NDQsNC40MDgtOS44NDQsOS44NDR2MTY3LjY0MkMyNTUuOTUyLDI2MS41ODEsMjYwLjM1NSwyNjUuOTg5LDI2NS43OTYsMjY1Ljk4OXoiLz4KCTxwYXRoIHN0eWxlPSJmaWxsOiMzMTRFNTU7IiBkPSJNMzkyLjA5OSwzMTUuMDU2YzIuNTE5LDAsNS4wMzgtMC45NjEsNi45Ni0yLjg4NGwxMDAuOTA0LTEwMC45MDljMy44NDUtMy44NDUsMy44NDUtMTAuMDc1LDAtMTMuOTIgICBjLTMuODQ1LTMuODQ1LTEwLjA3NS0zLjg0NS0xMy45MiwwTDM4NS4xMzksMjk4LjI1MmMtMy44NDUsMy44NDUtMy44NDUsMTAuMDc1LDAsMTMuOTIgICBDMzg3LjA2MiwzMTQuMDk1LDM4OS41ODEsMzE1LjA1NiwzOTIuMDk5LDMxNS4wNTZ6Ii8+Cgk8cGF0aCBzdHlsZT0iZmlsbDojMzE0RTU1OyIgZD0iTTEzMi4wOTEsMzEyLjE3MmMxLjkyMywxLjkyMyw0LjQ0MSwyLjg4NCw2Ljk2LDIuODg0czUuMDM4LTAuOTYxLDYuOTYtMi44ODQgICBjMy44NDUtMy44NDUsMy44NDUtMTAuMDc1LDAtMTMuOTJMNDUuMTA3LDE5Ny4zNDNjLTMuODQ1LTMuODQ1LTEwLjA3NS0zLjg0NS0xMy45Miwwcy0zLjg0NSwxMC4wNzUsMCwxMy45MkwxMzIuMDkxLDMxMi4xNzJ6Ii8+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPC9zdmc+Cg==" /> ';
>>>>>>> 2f3fd080a9296e10f0e713804ce2f8dd3a17dbda
                  //echo '<i class="fa fa-moon-o fa-1x" aria-hidden="true"></i>   ';  
<<<<<<< HEAD
          echo '<div class="col-md-6" id="welcome-message">Good Evening $firstname $lastname.';
        }
        else {
          echo '<div class="col-md-6"><img src="data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTkuMC4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iTGF5ZXJfMSIgeD0iMHB4IiB5PSIwcHgiIHZpZXdCb3g9IjAgMCA1MTIuMDAxIDUxMi4wMDEiIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDUxMi4wMDEgNTEyLjAwMTsiIHhtbDpzcGFjZT0icHJlc2VydmUiIHdpZHRoPSI1MTJweCIgaGVpZ2h0PSI1MTJweCI+CjxwYXRoIHN0eWxlPSJmaWxsOiNGMjlGMjY7IiBkPSJNMzUwLjAxMiwxNTAuNzg5Yy0yNC40MywwLTQ0LjMwNC0xOS44NzYtNDQuMzA0LTQ0LjMwNWMwLTEuNTM4LTEuMjQ2LTIuNzg0LTIuNzg0LTIuNzg0ICBjLTEuNTM4LDAtMi43ODQsMS4yNDYtMi43ODQsMi43ODRjMCwyNC40MzEtMTkuODc2LDQ0LjMwNS00NC4zMDUsNDQuMzA1Yy0xLjUzOCwwLTIuNzg0LDEuMjQ2LTIuNzg0LDIuNzg0ICBjMCwxLjUzOCwxLjI0NiwyLjc4NCwyLjc4NCwyLjc4NGMyNC40MywwLDQ0LjMwNSwxOS44NzYsNDQuMzA1LDQ0LjMwNGMwLDEuNTM4LDEuMjQ2LDIuNzg0LDIuNzg0LDIuNzg0ICBjMS41MzgsMCwyLjc4NC0xLjI0NiwyLjc4NC0yLjc4NGMwLTI0LjQzLDE5Ljg3Ni00NC4zMDQsNDQuMzA0LTQ0LjMwNGMxLjUzOCwwLDIuNzg0LTEuMjQ2LDIuNzg0LTIuNzg0ICBDMzUyLjc5NywxNTIuMDM1LDM1MS41NDksMTUwLjc4OSwzNTAuMDEyLDE1MC43ODl6Ii8+CjxwYXRoIHN0eWxlPSJmaWxsOiNFRjgyMjk7IiBkPSJNMjk3LjkyMiwxNTMuNTcyYzcuMDgzLTYuMTg3LDEyLjE5Ny0xNC41NzMsMTQuMjMtMjQuMDk5Yy00LjA4Ny02LjcwNi02LjQ0NS0xNC41NzgtNi40NDUtMjIuOTkxICBjMC0xLjUzOC0xLjI0Ni0yLjc4NC0yLjc4NC0yLjc4NGMtMS41MzgsMC0yLjc4NCwxLjI0Ni0yLjc4NCwyLjc4NGMwLDE1Ljc0Ny04LjI2NiwyOS41OTMtMjAuNjgsMzcuNDUxICBjLTEuNjc3LDEuMDYxLTMuNDMxLDIuMDEzLTUuMjUsMi44NDdjLTAuMDY3LDAuMDMtMC4xMzQsMC4wNi0wLjIsMC4wOTFjLTEuNzgyLDAuODA2LTMuNjI2LDEuNDk3LTUuNTIzLDIuMDY1ICBjLTAuMTMxLDAuMDM5LTAuMjY0LDAuMDc1LTAuMzk1LDAuMTEyYy0wLjgwNCwwLjIzMy0xLjYxOCwwLjQ0MS0yLjQ0MSwwLjYyOGMtMC4xNjUsMC4wMzgtMC4zMjksMC4wNzktMC40OTMsMC4xMTUgIGMtMC45MjQsMC4xOTktMS44NTgsMC4zNzEtMi44MDIsMC41MTFjLTAuMTYzLDAuMDIzLTAuMzI3LDAuMDQtMC40OSwwLjA2MmMtMC43NzcsMC4xMDctMS41NjMsMC4xOTItMi4zNTIsMC4yNTYgIGMtMC4yNzEsMC4wMjItMC41NDIsMC4wNDUtMC44MTQsMC4wNjJjLTAuOTEyLDAuMDU5LTEuODMxLDAuMDk4LTIuNzU4LDAuMWMtMC4wMzYsMC0wLjA3MSwwLjAwMi0wLjEwNywwLjAwMiAgYy0xLjUzOCwwLTIuNzg0LDEuMjQ2LTIuNzg0LDIuNzg0bDAsMGwwLDBjMCwxLjUzOCwxLjI0NiwyLjc4NCwyLjc4NCwyLjc4NGMwLjAzNiwwLDAuMDcxLDAuMDAyLDAuMTA3LDAuMDAyICBjMC45MjcsMC4wMDIsMS44NDQsMC4wNDEsMi43NTgsMC4xYzAuMjcyLDAuMDE4LDAuNTQ0LDAuMDQsMC44MTQsMC4wNjJjMC43OSwwLjA2NiwxLjU3NSwwLjE1LDIuMzUyLDAuMjU2ICBjMC4xNjMsMC4wMjIsMC4zMjcsMC4wMzksMC40OSwwLjA2MmMwLjk0NCwwLjE0LDEuODc4LDAuMzEyLDIuODAyLDAuNTExYzAuMTY2LDAuMDM2LDAuMzI5LDAuMDc3LDAuNDkzLDAuMTE1ICBjMC44MjIsMC4xODcsMS42MzUsMC4zOTUsMi40MzksMC42MjhjMC4xMzMsMC4wMzgsMC4yNjcsMC4wNzQsMC4zOTksMC4xMTRjMS44OTcsMC41NjgsMy43NCwxLjI1OSw1LjUyMiwyLjA2NSAgYzAuMDY3LDAuMDMsMC4xMzQsMC4wNiwwLjIsMC4wOWMxLjgxOSwwLjgzNCwzLjU3MywxLjc4NCw1LjI1LDIuODQ3YzEyLjQxNCw3Ljg2LDIwLjY4LDIxLjcwNCwyMC42OCwzNy40NTEgIGMwLDEuNTM4LDEuMjQ2LDIuNzg0LDIuNzg0LDIuNzg0YzEuNTM4LDAsMi43ODQtMS4yNDYsMi43ODQtMi43ODRjMC04LjQxMywyLjM1OC0xNi4yODQsNi40NDUtMjIuOTkxICBDMzEwLjEyLDE2OC4xNDYsMzA1LjAwNiwxNTkuNzU5LDI5Ny45MjIsMTUzLjU3MnoiLz4KPGc+Cgk8Y2lyY2xlIHN0eWxlPSJmaWxsOiNGMjlGMjY7IiBjeD0iMzgxLjk0IiBjeT0iMjQ5LjM0MSIgcj0iMTguODA3Ii8+Cgk8Y2lyY2xlIHN0eWxlPSJmaWxsOiNGMjlGMjY7IiBjeD0iNDEuMTU1IiBjeT0iNDY3LjYzMSIgcj0iMTguODA3Ii8+CjwvZz4KPHBhdGggc3R5bGU9ImZpbGw6I0VERTIxQjsiIGQ9Ik0yOTIuMTQsMzY4LjE4M2MtODUuNzk4LTI4LjM4LTE0Ny44NzYtMTA5LjM0My0xNDcuODc2LTIwNC41M2MwLTQ3LjY0OCwxNS4yNTgtOTIuODA5LDQ0LjEyLTEzMC41OTMgIGMzLjc3Ny00Ljk0NSwzLjcwMi0xMS44MjMtMC4xNzktMTYuNjg3Yy0zLjg4MS00Ljg2My0xMC41NzQtNi40NjItMTYuMjMxLTMuODdjLTQzLjk0OSwyMC4xLTgxLjIxNCw1Mi4xNDUtMTA3Ljc2NSw5Mi42NjYgIGMtMjcuMjU3LDQxLjU5OC00MS42NjIsODkuOTgtNDEuNjYyLDEzOS45MThjMCwxNDAuOTYsMTE0LjY4LDI1NS42NCwyNTUuNjQsMjU1LjY0YzQ5LjkzOSwwLDk4LjMyMS0xNC40MDcsMTM5LjkxOS00MS42NjIgIGM0MC41MjEtMjYuNTUxLDcyLjU2NS02My44MTYsOTIuNjY2LTEwNy43NjZjMi41ODgtNS42NTksMC45OTItMTIuMzUxLTMuODctMTYuMjMzYy00Ljg2My0zLjg4LTExLjc0My0zLjk1NC0xNi42ODctMC4xNzggIGMtMzcuNzg0LDI4Ljg2NC04Mi45NDMsNDQuMTItMTMwLjU5Myw0NC4xMmMtMTMuMTgxLDAtMjYuMDkxLTEuMTkxLTM4LjYyNy0zLjQ2OCIvPgo8cGF0aCBzdHlsZT0iZmlsbDojRUFDNzFDOyIgZD0iTTQ0MS40NjcsNDM1LjgyNGMtNDEuNTk5LDI3LjI1Ni04OS45OCw0MS42NjItMTM5LjkxOSw0MS42NjJjLTE0MC45NiwwLTI1NS42NC0xMTQuNjgtMjU1LjY0LTI1NS42NCAgYzAtNDkuOTM4LDE0LjQwNi05OC4zMjEsNDEuNjYyLTEzOS45MThjNi43ODctMTAuMzU4LDE0LjI3Ny0yMC4xNTcsMjIuMzk2LTI5LjM0OUM5Mi40OTksNjcuODUzLDc3LjA4OSw4NS41MSw2NC4yMDcsMTA1LjE3MSAgYy0yNy4yNTcsNDEuNTk4LTQxLjY2Miw4OS45OC00MS42NjIsMTM5LjkxOGMwLDE0MC45NiwxMTQuNjgsMjU1LjY0LDI1NS42NCwyNTUuNjRjNDkuOTM5LDAsOTguMzIxLTE0LjQwNywxMzkuOTE5LTQxLjY2MiAgYzE5LjI4OS0xMi42NCwzNi42NTMtMjcuNzExLDUxLjcyNi00NC43NzFDNDYwLjkyNCw0MjIuMDgxLDQ1MS40NTQsNDI5LjI4LDQ0MS40NjcsNDM1LjgyNHoiLz4KPGc+Cgk8Y2lyY2xlIHN0eWxlPSJmaWxsOiNFREUyMUI7IiBjeD0iMzAyLjkyMiIgY3k9IjI2MC41MTIiIHI9IjExLjE3MSIvPgoJPGNpcmNsZSBzdHlsZT0iZmlsbDojRURFMjFCOyIgY3g9IjExLjE3MSIgY3k9IjM5NC42MzgiIHI9IjExLjE3MSIvPgoJPGNpcmNsZSBzdHlsZT0iZmlsbDojRURFMjFCOyIgY3g9IjM3NC41NTYiIGN5PSI4Ny44NjEiIHI9IjExLjE3MSIvPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+Cjwvc3ZnPgo=" /></div> ';
||||||| merged common ancestors
                  echo '<div class="col-md-6" id="welcome-message">Good Evening $name.';
                }
                else {
                    echo '<div class="col-md-6"><img src="data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTkuMC4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iTGF5ZXJfMSIgeD0iMHB4IiB5PSIwcHgiIHZpZXdCb3g9IjAgMCA1MTIuMDAxIDUxMi4wMDEiIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDUxMi4wMDEgNTEyLjAwMTsiIHhtbDpzcGFjZT0icHJlc2VydmUiIHdpZHRoPSI1MTJweCIgaGVpZ2h0PSI1MTJweCI+CjxwYXRoIHN0eWxlPSJmaWxsOiNGMjlGMjY7IiBkPSJNMzUwLjAxMiwxNTAuNzg5Yy0yNC40MywwLTQ0LjMwNC0xOS44NzYtNDQuMzA0LTQ0LjMwNWMwLTEuNTM4LTEuMjQ2LTIuNzg0LTIuNzg0LTIuNzg0ICBjLTEuNTM4LDAtMi43ODQsMS4yNDYtMi43ODQsMi43ODRjMCwyNC40MzEtMTkuODc2LDQ0LjMwNS00NC4zMDUsNDQuMzA1Yy0xLjUzOCwwLTIuNzg0LDEuMjQ2LTIuNzg0LDIuNzg0ICBjMCwxLjUzOCwxLjI0NiwyLjc4NCwyLjc4NCwyLjc4NGMyNC40MywwLDQ0LjMwNSwxOS44NzYsNDQuMzA1LDQ0LjMwNGMwLDEuNTM4LDEuMjQ2LDIuNzg0LDIuNzg0LDIuNzg0ICBjMS41MzgsMCwyLjc4NC0xLjI0NiwyLjc4NC0yLjc4NGMwLTI0LjQzLDE5Ljg3Ni00NC4zMDQsNDQuMzA0LTQ0LjMwNGMxLjUzOCwwLDIuNzg0LTEuMjQ2LDIuNzg0LTIuNzg0ICBDMzUyLjc5NywxNTIuMDM1LDM1MS41NDksMTUwLjc4OSwzNTAuMDEyLDE1MC43ODl6Ii8+CjxwYXRoIHN0eWxlPSJmaWxsOiNFRjgyMjk7IiBkPSJNMjk3LjkyMiwxNTMuNTcyYzcuMDgzLTYuMTg3LDEyLjE5Ny0xNC41NzMsMTQuMjMtMjQuMDk5Yy00LjA4Ny02LjcwNi02LjQ0NS0xNC41NzgtNi40NDUtMjIuOTkxICBjMC0xLjUzOC0xLjI0Ni0yLjc4NC0yLjc4NC0yLjc4NGMtMS41MzgsMC0yLjc4NCwxLjI0Ni0yLjc4NCwyLjc4NGMwLDE1Ljc0Ny04LjI2NiwyOS41OTMtMjAuNjgsMzcuNDUxICBjLTEuNjc3LDEuMDYxLTMuNDMxLDIuMDEzLTUuMjUsMi44NDdjLTAuMDY3LDAuMDMtMC4xMzQsMC4wNi0wLjIsMC4wOTFjLTEuNzgyLDAuODA2LTMuNjI2LDEuNDk3LTUuNTIzLDIuMDY1ICBjLTAuMTMxLDAuMDM5LTAuMjY0LDAuMDc1LTAuMzk1LDAuMTEyYy0wLjgwNCwwLjIzMy0xLjYxOCwwLjQ0MS0yLjQ0MSwwLjYyOGMtMC4xNjUsMC4wMzgtMC4zMjksMC4wNzktMC40OTMsMC4xMTUgIGMtMC45MjQsMC4xOTktMS44NTgsMC4zNzEtMi44MDIsMC41MTFjLTAuMTYzLDAuMDIzLTAuMzI3LDAuMDQtMC40OSwwLjA2MmMtMC43NzcsMC4xMDctMS41NjMsMC4xOTItMi4zNTIsMC4yNTYgIGMtMC4yNzEsMC4wMjItMC41NDIsMC4wNDUtMC44MTQsMC4wNjJjLTAuOTEyLDAuMDU5LTEuODMxLDAuMDk4LTIuNzU4LDAuMWMtMC4wMzYsMC0wLjA3MSwwLjAwMi0wLjEwNywwLjAwMiAgYy0xLjUzOCwwLTIuNzg0LDEuMjQ2LTIuNzg0LDIuNzg0bDAsMGwwLDBjMCwxLjUzOCwxLjI0NiwyLjc4NCwyLjc4NCwyLjc4NGMwLjAzNiwwLDAuMDcxLDAuMDAyLDAuMTA3LDAuMDAyICBjMC45MjcsMC4wMDIsMS44NDQsMC4wNDEsMi43NTgsMC4xYzAuMjcyLDAuMDE4LDAuNTQ0LDAuMDQsMC44MTQsMC4wNjJjMC43OSwwLjA2NiwxLjU3NSwwLjE1LDIuMzUyLDAuMjU2ICBjMC4xNjMsMC4wMjIsMC4zMjcsMC4wMzksMC40OSwwLjA2MmMwLjk0NCwwLjE0LDEuODc4LDAuMzEyLDIuODAyLDAuNTExYzAuMTY2LDAuMDM2LDAuMzI5LDAuMDc3LDAuNDkzLDAuMTE1ICBjMC44MjIsMC4xODcsMS42MzUsMC4zOTUsMi40MzksMC42MjhjMC4xMzMsMC4wMzgsMC4yNjcsMC4wNzQsMC4zOTksMC4xMTRjMS44OTcsMC41NjgsMy43NCwxLjI1OSw1LjUyMiwyLjA2NSAgYzAuMDY3LDAuMDMsMC4xMzQsMC4wNiwwLjIsMC4wOWMxLjgxOSwwLjgzNCwzLjU3MywxLjc4NCw1LjI1LDIuODQ3YzEyLjQxNCw3Ljg2LDIwLjY4LDIxLjcwNCwyMC42OCwzNy40NTEgIGMwLDEuNTM4LDEuMjQ2LDIuNzg0LDIuNzg0LDIuNzg0YzEuNTM4LDAsMi43ODQtMS4yNDYsMi43ODQtMi43ODRjMC04LjQxMywyLjM1OC0xNi4yODQsNi40NDUtMjIuOTkxICBDMzEwLjEyLDE2OC4xNDYsMzA1LjAwNiwxNTkuNzU5LDI5Ny45MjIsMTUzLjU3MnoiLz4KPGc+Cgk8Y2lyY2xlIHN0eWxlPSJmaWxsOiNGMjlGMjY7IiBjeD0iMzgxLjk0IiBjeT0iMjQ5LjM0MSIgcj0iMTguODA3Ii8+Cgk8Y2lyY2xlIHN0eWxlPSJmaWxsOiNGMjlGMjY7IiBjeD0iNDEuMTU1IiBjeT0iNDY3LjYzMSIgcj0iMTguODA3Ii8+CjwvZz4KPHBhdGggc3R5bGU9ImZpbGw6I0VERTIxQjsiIGQ9Ik0yOTIuMTQsMzY4LjE4M2MtODUuNzk4LTI4LjM4LTE0Ny44NzYtMTA5LjM0My0xNDcuODc2LTIwNC41M2MwLTQ3LjY0OCwxNS4yNTgtOTIuODA5LDQ0LjEyLTEzMC41OTMgIGMzLjc3Ny00Ljk0NSwzLjcwMi0xMS44MjMtMC4xNzktMTYuNjg3Yy0zLjg4MS00Ljg2My0xMC41NzQtNi40NjItMTYuMjMxLTMuODdjLTQzLjk0OSwyMC4xLTgxLjIxNCw1Mi4xNDUtMTA3Ljc2NSw5Mi42NjYgIGMtMjcuMjU3LDQxLjU5OC00MS42NjIsODkuOTgtNDEuNjYyLDEzOS45MThjMCwxNDAuOTYsMTE0LjY4LDI1NS42NCwyNTUuNjQsMjU1LjY0YzQ5LjkzOSwwLDk4LjMyMS0xNC40MDcsMTM5LjkxOS00MS42NjIgIGM0MC41MjEtMjYuNTUxLDcyLjU2NS02My44MTYsOTIuNjY2LTEwNy43NjZjMi41ODgtNS42NTksMC45OTItMTIuMzUxLTMuODctMTYuMjMzYy00Ljg2My0zLjg4LTExLjc0My0zLjk1NC0xNi42ODctMC4xNzggIGMtMzcuNzg0LDI4Ljg2NC04Mi45NDMsNDQuMTItMTMwLjU5Myw0NC4xMmMtMTMuMTgxLDAtMjYuMDkxLTEuMTkxLTM4LjYyNy0zLjQ2OCIvPgo8cGF0aCBzdHlsZT0iZmlsbDojRUFDNzFDOyIgZD0iTTQ0MS40NjcsNDM1LjgyNGMtNDEuNTk5LDI3LjI1Ni04OS45OCw0MS42NjItMTM5LjkxOSw0MS42NjJjLTE0MC45NiwwLTI1NS42NC0xMTQuNjgtMjU1LjY0LTI1NS42NCAgYzAtNDkuOTM4LDE0LjQwNi05OC4zMjEsNDEuNjYyLTEzOS45MThjNi43ODctMTAuMzU4LDE0LjI3Ny0yMC4xNTcsMjIuMzk2LTI5LjM0OUM5Mi40OTksNjcuODUzLDc3LjA4OSw4NS41MSw2NC4yMDcsMTA1LjE3MSAgYy0yNy4yNTcsNDEuNTk4LTQxLjY2Miw4OS45OC00MS42NjIsMTM5LjkxOGMwLDE0MC45NiwxMTQuNjgsMjU1LjY0LDI1NS42NCwyNTUuNjRjNDkuOTM5LDAsOTguMzIxLTE0LjQwNywxMzkuOTE5LTQxLjY2MiAgYzE5LjI4OS0xMi42NCwzNi42NTMtMjcuNzExLDUxLjcyNi00NC43NzFDNDYwLjkyNCw0MjIuMDgxLDQ1MS40NTQsNDI5LjI4LDQ0MS40NjcsNDM1LjgyNHoiLz4KPGc+Cgk8Y2lyY2xlIHN0eWxlPSJmaWxsOiNFREUyMUI7IiBjeD0iMzAyLjkyMiIgY3k9IjI2MC41MTIiIHI9IjExLjE3MSIvPgoJPGNpcmNsZSBzdHlsZT0iZmlsbDojRURFMjFCOyIgY3g9IjExLjE3MSIgY3k9IjM5NC42MzgiIHI9IjExLjE3MSIvPgoJPGNpcmNsZSBzdHlsZT0iZmlsbDojRURFMjFCOyIgY3g9IjM3NC41NTYiIGN5PSI4Ny44NjEiIHI9IjExLjE3MSIvPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+Cjwvc3ZnPgo=" /></div> ';
=======
                  echo '<div class="col-md-6" id="welcome-message">Good Evening '.$name.'.';
                }
                else {
                    echo '<div class="col-md-6"><img src="data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTkuMC4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iTGF5ZXJfMSIgeD0iMHB4IiB5PSIwcHgiIHZpZXdCb3g9IjAgMCA1MTIuMDAxIDUxMi4wMDEiIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDUxMi4wMDEgNTEyLjAwMTsiIHhtbDpzcGFjZT0icHJlc2VydmUiIHdpZHRoPSI1MTJweCIgaGVpZ2h0PSI1MTJweCI+CjxwYXRoIHN0eWxlPSJmaWxsOiNGMjlGMjY7IiBkPSJNMzUwLjAxMiwxNTAuNzg5Yy0yNC40MywwLTQ0LjMwNC0xOS44NzYtNDQuMzA0LTQ0LjMwNWMwLTEuNTM4LTEuMjQ2LTIuNzg0LTIuNzg0LTIuNzg0ICBjLTEuNTM4LDAtMi43ODQsMS4yNDYtMi43ODQsMi43ODRjMCwyNC40MzEtMTkuODc2LDQ0LjMwNS00NC4zMDUsNDQuMzA1Yy0xLjUzOCwwLTIuNzg0LDEuMjQ2LTIuNzg0LDIuNzg0ICBjMCwxLjUzOCwxLjI0NiwyLjc4NCwyLjc4NCwyLjc4NGMyNC40MywwLDQ0LjMwNSwxOS44NzYsNDQuMzA1LDQ0LjMwNGMwLDEuNTM4LDEuMjQ2LDIuNzg0LDIuNzg0LDIuNzg0ICBjMS41MzgsMCwyLjc4NC0xLjI0NiwyLjc4NC0yLjc4NGMwLTI0LjQzLDE5Ljg3Ni00NC4zMDQsNDQuMzA0LTQ0LjMwNGMxLjUzOCwwLDIuNzg0LTEuMjQ2LDIuNzg0LTIuNzg0ICBDMzUyLjc5NywxNTIuMDM1LDM1MS41NDksMTUwLjc4OSwzNTAuMDEyLDE1MC43ODl6Ii8+CjxwYXRoIHN0eWxlPSJmaWxsOiNFRjgyMjk7IiBkPSJNMjk3LjkyMiwxNTMuNTcyYzcuMDgzLTYuMTg3LDEyLjE5Ny0xNC41NzMsMTQuMjMtMjQuMDk5Yy00LjA4Ny02LjcwNi02LjQ0NS0xNC41NzgtNi40NDUtMjIuOTkxICBjMC0xLjUzOC0xLjI0Ni0yLjc4NC0yLjc4NC0yLjc4NGMtMS41MzgsMC0yLjc4NCwxLjI0Ni0yLjc4NCwyLjc4NGMwLDE1Ljc0Ny04LjI2NiwyOS41OTMtMjAuNjgsMzcuNDUxICBjLTEuNjc3LDEuMDYxLTMuNDMxLDIuMDEzLTUuMjUsMi44NDdjLTAuMDY3LDAuMDMtMC4xMzQsMC4wNi0wLjIsMC4wOTFjLTEuNzgyLDAuODA2LTMuNjI2LDEuNDk3LTUuNTIzLDIuMDY1ICBjLTAuMTMxLDAuMDM5LTAuMjY0LDAuMDc1LTAuMzk1LDAuMTEyYy0wLjgwNCwwLjIzMy0xLjYxOCwwLjQ0MS0yLjQ0MSwwLjYyOGMtMC4xNjUsMC4wMzgtMC4zMjksMC4wNzktMC40OTMsMC4xMTUgIGMtMC45MjQsMC4xOTktMS44NTgsMC4zNzEtMi44MDIsMC41MTFjLTAuMTYzLDAuMDIzLTAuMzI3LDAuMDQtMC40OSwwLjA2MmMtMC43NzcsMC4xMDctMS41NjMsMC4xOTItMi4zNTIsMC4yNTYgIGMtMC4yNzEsMC4wMjItMC41NDIsMC4wNDUtMC44MTQsMC4wNjJjLTAuOTEyLDAuMDU5LTEuODMxLDAuMDk4LTIuNzU4LDAuMWMtMC4wMzYsMC0wLjA3MSwwLjAwMi0wLjEwNywwLjAwMiAgYy0xLjUzOCwwLTIuNzg0LDEuMjQ2LTIuNzg0LDIuNzg0bDAsMGwwLDBjMCwxLjUzOCwxLjI0NiwyLjc4NCwyLjc4NCwyLjc4NGMwLjAzNiwwLDAuMDcxLDAuMDAyLDAuMTA3LDAuMDAyICBjMC45MjcsMC4wMDIsMS44NDQsMC4wNDEsMi43NTgsMC4xYzAuMjcyLDAuMDE4LDAuNTQ0LDAuMDQsMC44MTQsMC4wNjJjMC43OSwwLjA2NiwxLjU3NSwwLjE1LDIuMzUyLDAuMjU2ICBjMC4xNjMsMC4wMjIsMC4zMjcsMC4wMzksMC40OSwwLjA2MmMwLjk0NCwwLjE0LDEuODc4LDAuMzEyLDIuODAyLDAuNTExYzAuMTY2LDAuMDM2LDAuMzI5LDAuMDc3LDAuNDkzLDAuMTE1ICBjMC44MjIsMC4xODcsMS42MzUsMC4zOTUsMi40MzksMC42MjhjMC4xMzMsMC4wMzgsMC4yNjcsMC4wNzQsMC4zOTksMC4xMTRjMS44OTcsMC41NjgsMy43NCwxLjI1OSw1LjUyMiwyLjA2NSAgYzAuMDY3LDAuMDMsMC4xMzQsMC4wNiwwLjIsMC4wOWMxLjgxOSwwLjgzNCwzLjU3MywxLjc4NCw1LjI1LDIuODQ3YzEyLjQxNCw3Ljg2LDIwLjY4LDIxLjcwNCwyMC42OCwzNy40NTEgIGMwLDEuNTM4LDEuMjQ2LDIuNzg0LDIuNzg0LDIuNzg0YzEuNTM4LDAsMi43ODQtMS4yNDYsMi43ODQtMi43ODRjMC04LjQxMywyLjM1OC0xNi4yODQsNi40NDUtMjIuOTkxICBDMzEwLjEyLDE2OC4xNDYsMzA1LjAwNiwxNTkuNzU5LDI5Ny45MjIsMTUzLjU3MnoiLz4KPGc+Cgk8Y2lyY2xlIHN0eWxlPSJmaWxsOiNGMjlGMjY7IiBjeD0iMzgxLjk0IiBjeT0iMjQ5LjM0MSIgcj0iMTguODA3Ii8+Cgk8Y2lyY2xlIHN0eWxlPSJmaWxsOiNGMjlGMjY7IiBjeD0iNDEuMTU1IiBjeT0iNDY3LjYzMSIgcj0iMTguODA3Ii8+CjwvZz4KPHBhdGggc3R5bGU9ImZpbGw6I0VERTIxQjsiIGQ9Ik0yOTIuMTQsMzY4LjE4M2MtODUuNzk4LTI4LjM4LTE0Ny44NzYtMTA5LjM0My0xNDcuODc2LTIwNC41M2MwLTQ3LjY0OCwxNS4yNTgtOTIuODA5LDQ0LjEyLTEzMC41OTMgIGMzLjc3Ny00Ljk0NSwzLjcwMi0xMS44MjMtMC4xNzktMTYuNjg3Yy0zLjg4MS00Ljg2My0xMC41NzQtNi40NjItMTYuMjMxLTMuODdjLTQzLjk0OSwyMC4xLTgxLjIxNCw1Mi4xNDUtMTA3Ljc2NSw5Mi42NjYgIGMtMjcuMjU3LDQxLjU5OC00MS42NjIsODkuOTgtNDEuNjYyLDEzOS45MThjMCwxNDAuOTYsMTE0LjY4LDI1NS42NCwyNTUuNjQsMjU1LjY0YzQ5LjkzOSwwLDk4LjMyMS0xNC40MDcsMTM5LjkxOS00MS42NjIgIGM0MC41MjEtMjYuNTUxLDcyLjU2NS02My44MTYsOTIuNjY2LTEwNy43NjZjMi41ODgtNS42NTksMC45OTItMTIuMzUxLTMuODctMTYuMjMzYy00Ljg2My0zLjg4LTExLjc0My0zLjk1NC0xNi42ODctMC4xNzggIGMtMzcuNzg0LDI4Ljg2NC04Mi45NDMsNDQuMTItMTMwLjU5Myw0NC4xMmMtMTMuMTgxLDAtMjYuMDkxLTEuMTkxLTM4LjYyNy0zLjQ2OCIvPgo8cGF0aCBzdHlsZT0iZmlsbDojRUFDNzFDOyIgZD0iTTQ0MS40NjcsNDM1LjgyNGMtNDEuNTk5LDI3LjI1Ni04OS45OCw0MS42NjItMTM5LjkxOSw0MS42NjJjLTE0MC45NiwwLTI1NS42NC0xMTQuNjgtMjU1LjY0LTI1NS42NCAgYzAtNDkuOTM4LDE0LjQwNi05OC4zMjEsNDEuNjYyLTEzOS45MThjNi43ODctMTAuMzU4LDE0LjI3Ny0yMC4xNTcsMjIuMzk2LTI5LjM0OUM5Mi40OTksNjcuODUzLDc3LjA4OSw4NS41MSw2NC4yMDcsMTA1LjE3MSAgYy0yNy4yNTcsNDEuNTk4LTQxLjY2Miw4OS45OC00MS42NjIsMTM5LjkxOGMwLDE0MC45NiwxMTQuNjgsMjU1LjY0LDI1NS42NCwyNTUuNjRjNDkuOTM5LDAsOTguMzIxLTE0LjQwNywxMzkuOTE5LTQxLjY2MiAgYzE5LjI4OS0xMi42NCwzNi42NTMtMjcuNzExLDUxLjcyNi00NC43NzFDNDYwLjkyNCw0MjIuMDgxLDQ1MS40NTQsNDI5LjI4LDQ0MS40NjcsNDM1LjgyNHoiLz4KPGc+Cgk8Y2lyY2xlIHN0eWxlPSJmaWxsOiNFREUyMUI7IiBjeD0iMzAyLjkyMiIgY3k9IjI2MC41MTIiIHI9IjExLjE3MSIvPgoJPGNpcmNsZSBzdHlsZT0iZmlsbDojRURFMjFCOyIgY3g9IjExLjE3MSIgY3k9IjM5NC42MzgiIHI9IjExLjE3MSIvPgoJPGNpcmNsZSBzdHlsZT0iZmlsbDojRURFMjFCOyIgY3g9IjM3NC41NTYiIGN5PSI4Ny44NjEiIHI9IjExLjE3MSIvPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+Cjwvc3ZnPgo=" /></div> ';
>>>>>>> 2f3fd080a9296e10f0e713804ce2f8dd3a17dbda
                  //echo '<i class="fa fa-moon-o fa-1x" aria-hidden="true"></i>   ';  
<<<<<<< HEAD
          echo '<div class="col-md-6" id="welcome-message">Good Night '.$firstname." ". $lastname;
        }
        echo " You can scroll down to read!</div>";
        ?>
      </div>
      <br>
      <br  id="two" data-color="#000" style="color: #fff;">
||||||| merged common ancestors
                  echo '<div class="col-md-6" id="welcome-message">Good Night '. $name;
                }
                echo " You can scroll down to read!</div>";
            ?>
        </div>
        <br>
        <br  id="two" data-color="#000" style="color: #fff;">
=======
                  echo '<div class="col-md-6" id="welcome-message">Good Night '. $firstname.'.';
                }
                echo " You can scroll down to read!</div>";
            ?>
        </div>
        <br>
        <br  id="two" data-color="#000" style="color: #fff;">
>>>>>>> 2f3fd080a9296e10f0e713804ce2f8dd3a17dbda
    </div>

    <div class="container">
      <div class="clear"></div>
      <div class="row">
        <div class="col-md-8" id="blog-container">
          <div class="row">
            <h3 class="title text-danger" text-align = "center"> <i class="now-ui-icons media-2_sound-wave"></i> Trending</h3><br>
            <div class="divider"></div>
            <div class="row">
<<<<<<< HEAD
              <div class="col-md-6">
                <div class="card card-blog">
                  <div class="card-image">
                    <img class="img rounded" src="assets/img/project13.jpg">
                  </div>
                  <div class="card-body">
                    <h6 class="category text-warning">
                      <i class="now-ui-icons business_bulb-63"></i> Focus
                    </h6>
                    <h5 class="card-title">
                      <a href="#nuk">Stay Focused: Train Your Brain</a>
                    </h5>
                    <p class="card-description">
                      Our brains are finely attuned to distraction, so today's digital environment makes it especially hard to focus...
                    </p>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="card card-blog">
                  <div class="card-image">
                    <img class="img rounded" src="assets/img/project13.jpg">
                  </div>
                  <div class="card-body">
                    <h6 class="category text-warning">
                      <i class="now-ui-icons business_bulb-63"></i> Focus
                    </h6>
                    <h5 class="card-title">
                      <a href="#nuk">Stay Focused: Train Your Brain</a>
                    </h5>
                    <p class="card-description">
                      Our brains are finely attuned to distraction, so today's digital environment makes it especially hard to focus...
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
||||||| merged common ancestors
                <div class="col-md-8" id="blog-container">
                    <div class="row">
                        <h3 class="title text-danger" text-align = "center"> <i class="now-ui-icons media-2_sound-wave"></i> Trending</h3><br>
                         <div class="divider"></div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card card-blog">
                                    <div class="card-image">
                                        <img class="img rounded" src="assets/img/project13.jpg">
                                    </div>
                                    <div class="card-body">
                                        <h6 class="category text-warning">
                                            <i class="now-ui-icons business_bulb-63"></i> Focus
                                        </h6>
                                        <h5 class="card-title">
                                            <a href="#nuk">Stay Focused: Train Your Brain</a>
                                        </h5>
                                        <p class="card-description">
                                            Our brains are finely attuned to distraction, so today's digital environment makes it especially hard to focus...
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card card-blog">
                                    <div class="card-image">
                                        <img class="img rounded" src="assets/img/project13.jpg">
                                    </div>
                                    <div class="card-body">
                                        <h6 class="category text-warning">
                                            <i class="now-ui-icons business_bulb-63"></i> Focus
                                        </h6>
                                        <h5 class="card-title">
                                            <a href="#nuk">Stay Focused: Train Your Brain</a>
                                        </h5>
                                        <p class="card-description">
                                            Our brains are finely attuned to distraction, so today's digital environment makes it especially hard to focus...
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
=======
                <div class="col-md-8" id="blog-container">
                    <div class="row">
                        <h3 class="title text-danger" text-align = "center"> <i class="now-ui-icons media-2_sound-wave"></i> Trending</h3><br>
                         <div class="divider"></div>
                        <div class="row">
                            <?php 
                            /* SCRIPT FOR TRENDING BLOGS*/
                            require('connect.php');
                            $query = "SELECT * FROM blog ORDER BY blog.date DESC, blog.readers DESC LIMIT 2";
                            $result = mysqli_query($dbc, $query) or die ('Unable to query');
                            while($row = mysqli_fetch_array($result)){
                         ?>
                            <div class="col-md-6">
                                <div class="card card-blog">
                                    <div class="card-image">
                                        <img class="img rounded" src="assets/img/project13.jpg">
                                    </div>
                                    <div class="card-body">
                                        <h6 class="category text-warning">
                                            <i class="now-ui-icons business_bulb-63"></i> Focus
                                        </h6>
                                        <h5 class="card-title">
                                            <a href="../blogv1/blog.php?id=<?= $row['blog_id'] ?>"><?= $row['title']; ?></a>
                                        </h5>
                                        <p class="card-description">
                                            <?= $row['description']; ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                          <?php 
                              }
                              mysqli_close($dbc); 
                          ?>
                        </div>
                    </div>
>>>>>>> 2f3fd080a9296e10f0e713804ce2f8dd3a17dbda

<<<<<<< HEAD
          <br>
          <br>
          <div class="row">
            <h3 class="title text-danger" text-align = "center"> <i class="fa fa-book" aria-hidden="true"></i> Continue Reading</h3><br>
            <div class="divider"></div>
            <div class="row">
              <div class="col-md-6">
                <div class="card card-blog">
                  <div class="card-image">
                    <img class="img rounded" src="assets/img/project13.jpg">
                  </div>
                  <div class="card-body">
                    <h6 class="category text-warning">
                      <i class="now-ui-icons business_bulb-63"></i> Focus
                    </h6>
                    <h5 class="card-title">
                      <a href="#nuk">Stay Focused: Train Your Brain</a>
                    </h5>
                    <p class="card-description">
                      Our brains are finely attuned to distraction, so today's digital environment makes it especially hard to focus...
                    </p>
                  </div>
||||||| merged common ancestors
                    <br>
                    <br>
                    <div class="row">
                        <h3 class="title text-danger" text-align = "center"> <i class="fa fa-book" aria-hidden="true"></i> Continue Reading</h3><br>
                         <div class="divider"></div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card card-blog">
                                    <div class="card-image">
                                        <img class="img rounded" src="assets/img/project13.jpg">
                                    </div>
                                    <div class="card-body">
                                        <h6 class="category text-warning">
                                            <i class="now-ui-icons business_bulb-63"></i> Focus
                                        </h6>
                                        <h5 class="card-title">
                                            <a href="#nuk">Stay Focused: Train Your Brain</a>
                                        </h5>
                                        <p class="card-description">
                                            Our brains are finely attuned to distraction, so today's digital environment makes it especially hard to focus...
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card card-blog">
                                    <div class="card-image">
                                        <img class="img rounded" src="assets/img/project13.jpg">
                                    </div>
                                    <div class="card-body">
                                        <h6 class="category text-warning">
                                            <i class="now-ui-icons business_bulb-63"></i> Focus
                                        </h6>
                                        <h5 class="card-title">
                                            <a href="#nuk">Stay Focused: Train Your Brain</a>
                                        </h5>
                                        <p class="card-description">
                                            Our brains are finely attuned to distraction, so today's digital environment makes it especially hard to focus...
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
=======
                    <br>
                    <br>
                    <div class="row">
                        <h3 class="title text-danger" text-align = "center"> <i class="fa fa-book" aria-hidden="true"></i> Continue Reading</h3><br>
                         <div class="divider"></div>
                         
                        <div class="row">
                            <?php 
                            /* SCRIPT FOR TRENDING BLOGS*/
                            require('connect.php');
                            $query = "SELECT lastblog FROM $var WHERE username = '$username'";
                            $result = mysqli_query($dbc, $query) or die ('Unable to query');
                            $row = mysqli_fetch_array($result);
                            $lastblog = $row['lastblog'];
                            $strlen = strlen($row['lastblog']);
                            //if ($row['lastblog']!=NULL || $row['lastblog']!="") {
                            for($i=0; $i<$strlen; $i=$i+2){
                              $tempblogid = substr($lastblog, $i, 1 );
                             // echo '<div style="color:white">'.$tempblogid.'</div>';
                              $query = "SELECT * FROM blog WHERE blog_id = '$tempblogid'";
                            $result = mysqli_query($dbc, $query) or die ('Unable to query');
                            $row = mysqli_fetch_array($result);
                         ?>
                            <div class="col-md-6">
                                <div class="card card-blog">
                                    <div class="card-image">
                                        <img class="img rounded" src="assets/img/project13.jpg">
                                    </div>
                                    <div class="card-body">
                                        <h6 class="category text-warning">
                                            <i class="now-ui-icons business_bulb-63"></i> Focus
                                        </h6>
                                        <h5 class="card-title">
                                            <a href="#"><?= $row['title']; ?></a>
                                        </h5>
                                        <p class="card-description">
                                            <?= $row['description']; ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                          <?php 
                              }//}
                              mysqli_close($dbc); 
                          ?>
                        </div>
                    </div>
>>>>>>> 2f3fd080a9296e10f0e713804ce2f8dd3a17dbda
                </div>
<<<<<<< HEAD
              </div>
              <div class="col-md-6">
                <div class="card card-blog">
                  <div class="card-image">
                    <img class="img rounded" src="assets/img/project13.jpg">
                  </div>
                  <div class="card-body">
                    <h6 class="category text-warning">
                      <i class="now-ui-icons business_bulb-63"></i> Focus
                    </h6>
                    <h5 class="card-title">
                      <a href="#nuk">Stay Focused: Train Your Brain</a>
                    </h5>
                    <p class="card-description">
                      Our brains are finely attuned to distraction, so today's digital environment makes it especially hard to focus...
                    </p>
                  </div>
||||||| merged common ancestors
                <div id="sidebar">
                    <div class="card" data-background-color="blue">
                        <div class="card-body">
                            <h6 class="category-social">
                                <i class="fa fa-twitter"></i> Twitter
                            </h6>
                            <p>
                            "You Don't Have to Sacrifice Joy to Build a Fabulous Business and Life"
                            </p>
                           <div class="card-footer">
                                <div class="author">
                                   <!-- <img src="assets/img/james.jpg" alt="..." class="avatar img-raised"> -->
                                    <span>Tania Andrew</span>
                                </div>
                                <div class="stats stats-right">
                                    <i class="now-ui-icons ui-2_favourite-28"></i> 2.4K ·
                                    <i class="now-ui-icons files_single-copy-04"></i> 45
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card" data-background-color="blue">
                        <div class="card-body">
                            <h6 class="category-social">
                                <i class="fa fa-twitter"></i> Twitter
                            </h6>
                            <p>
                            "You Don't Have to Sacrifice Joy to Build a Fabulous Business and Life"
                            </p>
                           <div class="card-footer">
                                <div class="author">
                                  <!--  <img src="assets/img/james.jpg" alt="..." class="avatar img-raised"> -->
                                    <span>Tania Andrew</span>
                                </div>
                                <div class="stats stats-right">
                                    <i class="now-ui-icons ui-2_favourite-28"></i> 2.4K ·
                                    <i class="now-ui-icons files_single-copy-04"></i> 45
                                </div>
                            </div>
                        </div>
                    </div>
=======
                <div id="sidebar">
                  <?php 
                            /* SCRIPT FOR TRENDING BLOGS*/
                    require('connect.php');
                    $query = "SELECT * FROM project WHERE status = 'available' ORDER BY project.addedon DESC";
                    $result = mysqli_query($dbc, $query) or die ('Unable to query project');
                    while($row = mysqli_fetch_array($result)){
                  ?>
                    <div class="card" data-background-color="blue">
                        <div class="card-body">
                            <h6 class="category-social">
                                <i class="fa fa-twitter"></i> 
                                <a href="project.php?id=<?= $row['project_id'] ?>"><?= $row['title']; ?></a>
                            </h6>
                            <p>
                            </i> <?= $row['description']; ?>
                            </p>
                           <div class="card-footer">
                                <div class="author">
                                   <!-- <img src="assets/img/james.jpg" alt="..." class="avatar img-raised"> -->
                                    <span></i> <?= $row['offeredby']; ?></span>
                                </div>
                                <div class="stats stats-right">
                                    <i class="now-ui-icons ui-2_favourite-28"></i> 2.4K ·
                                    <i class="now-ui-icons files_single-copy-04"></i> 45
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                      }
                      mysqli_close($dbc);
                    ?>
>>>>>>> 2f3fd080a9296e10f0e713804ce2f8dd3a17dbda
                </div>
<<<<<<< HEAD
              </div>
            </div>
          </div>
        </div>
        <div id="sidebar">
          <div class="card" data-background-color="blue">
            <div class="card-body">
              <h6 class="category-social">
                <i class="fa fa-twitter"></i> Twitter
              </h6>
              <p>
                "You Don't Have to Sacrifice Joy to Build a Fabulous Business and Life"
              </p>
              <div class="card-footer">
                <div class="author">
                 <!-- <img src="assets/img/james.jpg" alt="..." class="avatar img-raised"> -->
                 <span>Tania Andrew</span>
               </div>
               <div class="stats stats-right">
                <i class="now-ui-icons ui-2_favourite-28"></i> 2.4K ·
                <i class="now-ui-icons files_single-copy-04"></i> 45
              </div>
            </div>
          </div>
        </div>
        <div class="card" data-background-color="blue">
          <div class="card-body">
            <h6 class="category-social">
              <i class="fa fa-twitter"></i> Twitter
            </h6>
            <p>
              "You Don't Have to Sacrifice Joy to Build a Fabulous Business and Life"
            </p>
            <div class="card-footer">
              <div class="author">
                <!--  <img src="assets/img/james.jpg" alt="..." class="avatar img-raised"> -->
                <span>Tania Andrew</span>
              </div>
              <div class="stats stats-right">
                <i class="now-ui-icons ui-2_favourite-28"></i> 2.4K ·
                <i class="now-ui-icons files_single-copy-04"></i> 45
              </div>
            </div>
          </div>
        </div>
      </div>
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
||||||| merged common ancestors
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
=======
            </div> 
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
>>>>>>> 2f3fd080a9296e10f0e713804ce2f8dd3a17dbda
    $(document).ready(function() {
        // the body of this function is in assets/js/now-ui-kit.js
        nowuiKit.initSliders();
      });
    </script>
    <!-- Script for changing bg color -->
    <script type="text/javascript">
      var one ="#f88f18",
      two = "#10e88a";
      $(window).on("scroll touchmove", function() {
        if ($(document).scrollTop() >= $("#one").position().top) {
          $('body').css('background', $("#one").attr("data-color"));

        };
        if ($(document).scrollTop() > $("#two").position().top) {
          $('body').css('background', $("#two").attr("data-color"))
        };
<<<<<<< HEAD
      });
      jackHarnerSig("light")
    </script>
||||||| merged common ancestors
    });
jackHarnerSig("light")
</script>
=======
    });
jackHarnerSig("light");
</script>
>>>>>>> 2f3fd080a9296e10f0e713804ce2f8dd3a17dbda

    <!-- Go to top button -->
    <script>
// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};
function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    document.getElementById("myBtn").style.display = "block";
  } else {
    document.getElementById("myBtn").style.display = "none";
  }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
  $('body').css("background-color", "#f88f18");
}
</script>


</html>