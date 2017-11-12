<?php
    session_start();
    require_once('connect.php');
        // echo "I'm inside hahaha";
    $descripdata = $_POST['description'];
    $titledata = $_POST['title'];
    $arr = $_POST['tagsrr'];
    // echo $arr[0];
        // $data = json_decode(stripslashes($_POST['data']));

     //  // here i would like use foreach:
    // echo $_SESSION['username'];

// $date = date('Y-m-d H:i:s');
    $query = "INSERT INTO blog(blog.description,blog.date, blog.likes, blog.reads, blog.title,blog.offeredby) VALUES ('$descripdata',now(),'0','0','$titledata','$_SESSION[username]')";

    $result = mysqli_query($dbc,$query);
    if(!$result){
        echo("Errorcode: in date query" . mysqli_errno($dbc));
    }

    $qb = "SELECT blog_id FROM blog WHERE blog.title = '$titledata'";
    $result = mysqli_query($dbc,$qb)
    or die("Unable to read blogid from database");
    $blogidArr = mysqli_fetch_assoc($result);
    echo $blogidArr['blog_id'];


    foreach($arr as $d){
        $usr = json_decode($d);
        // echo $d;
        // $queer = "INSERT INTO tag(tagname) VALUES ('$d')";
        // $restapi = mysqli_query($dbc,$queer);
        // if(!$restapi){
        //  echo("Errorcode: " . mysqli_errno($dbc));
        // }
        // echo $usr;
        $teddy = "SELECT tag.tag_id FROM tag WHERE tag.tagname = '$d'";
        $reddy = mysqli_query($dbc,$teddy)
        or die("Unable to read blogid from database");
        $tagiddy = mysqli_fetch_assoc($reddy);
        // echo $tagiddy['tag_id'];


        $beera = "INSERT INTO blogtag(blog_id,tag_id) VALUES ('$blogidArr[blog_id]','$tagiddy[tag_id]')";
        $reera = mysqli_query($dbc,$beera);
        if(!$reera){
            echo("Errorcode: " . mysqli_errno($dbc));
        }
        // echo $d;
    }
    
    echo shell_exec("/usr/bin/python /opt/lampp/htdocs/php/td.py 2>&1");



?>