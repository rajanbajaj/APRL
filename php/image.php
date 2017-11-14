<?php
session_start();
if(!isset($_SESSION['username'])){
    $url = 'http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'/login-page.php';
    header('Location:'.$url);
}
else{
    $username = $_SESSION['username'];
    if(isset($_POST['id'])){
        $id = $_POST['id'];

        $dbc = mysqli_connect("localhost", "root", NULL, "aprl")
        or die("Unable to connect to database");

        $query = "SELECT imageurl FROM projectimage WHERE project_id = '$id'";
        $result = mysqli_query($dbc, $query)
        or die("Unable to extract image url");
        $row = mysqli_fetch_array($result);
        $image = $row['imageurl'];
        $image_url = "'../assets/img/project/".$id."/".$image."'"   ;

        $query = "SELECT * FROM project join userlogin WHERE project_id = '$id' and project.offeredby=userlogin.username";
        $result = mysqli_query($dbc, $query)
        or die("Unable to extract image url");

        $row = mysqli_fetch_array($result);
        $profession=$row['profession'];
        $var = $profession."info";
        $query = "SELECT * FROM $var WHERE username = $row[username]";
        $result = mysqli_query($dbc, $query)
        or die("Unable to extract image url");

        $col = mysqli_fetch_array($result);

        echo '<div class="page-header-image" data-parallax="true" style="background-image: url('.$image_url.');">
                <div class="container">
                <div class="content-center">

                    <h1 class="title">'.$row['title'].'</h1>
                    <p class="category"><h2> By - '.$col['firstname'].' '.$col['lastname'].'</p>
                </div>
            </div>

        ';
    }
}
?>