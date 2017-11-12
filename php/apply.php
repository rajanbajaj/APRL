<?php
  session_start();
    if(!isset($_SESSION['username'])){
        $url = 'http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'/login-page.php';
        header('Location:'.$url);
    }
    else{
        $username = $_SESSION['username'];
    }
    
if (isset($_POST['id']) and isset($_POST['interested'])) {
    $motive = $_POST['interested'];
    $m = $_POST['id'];
    $user = $_SESSION['username'];
    $dbc = mysqli_connect("localhost", "root", NULL, "aprl")
    or die("Unable to connect to database");
    
    $duplicate = "SELECT count(`id`) FROM `applicant` WHERE `username`='$user' and `project_id` = $m";
    $check = mysqli_query($dbc,$duplicate)
      or die('Unable to check duplicate entry apply project');

    $row =  mysqli_fetch_assoc($check);
    if(!$row['count(`id`)']){
        $query = "INSERT INTO `applicant`(`username`, `project_id`, `interest`) VALUES ('$user','$m','$motive')";
        $result = mysqli_query($dbc, $query)
          or die('Unable to insert applicant');
        echo "<i><b>Successfully applied for the project</i></b>";
    }
    else{
        echo "<i><b>Already applied for this project</i></b>";
    }
}
?>