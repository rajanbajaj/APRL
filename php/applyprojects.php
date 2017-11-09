<?php
    session_start();
    if(!isset($_SESSION['username'])){
        $url = 'http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'/login-page.php';
        header('Location:'.$url);
    }
    else{
            if(!empty($_POST['Title']) && !empty($_POST['Description']) && !empty($_POST['LastDate']) && !empty($_POST['Incentive'])){
                require_once('connect.php');
                $title = $_POST['Title'];
                $description = $_POST['Description'];
                $lastdate = $_POST['LastDate'];
                $incentive = $_POST['Incentive'];
                $username = $_SESSION['username'];

                $query = "INSERT INTO applyproject(title, description, lastdate, incentive, status, username, adddate) VALUES ('$title', '$description', '$lastdate', '$incentive', 'available', '$username', now())";
                mysqli_query($dbc, $query)
                or die('unable to query applyprojects');
                echo 'Added successfully!';
                mysqli_close($dbc);

            }
        }
?>