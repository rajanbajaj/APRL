<?php

// This file is for showing blogs which are obtained by clicking in Top Blogs container in landing page
session_start();
if(isset($_SESSION['username'])){

    $username = $_SESSION['username'];
    require_once('connect.php');
    $query = "SELECT profession FROM userlogin WHERE username = '$username'";
    $result = mysqli_query($dbc, $query);
    $row = mysqli_fetch_array($result);
    $profession = $row['profession'];
    $var=$profession."info";
    $query = "SELECT * FROM $var WHERE username = '$username'";
    $result = mysqli_query($dbc, $query)
    or die('Unable to query studentinfo' );

    $row = mysqli_fetch_array($result);
   
    $image = $row['image_url'];
    
    // require_once('likesIncr');
    // $blogId = 1;
    $blogId= $_GET['hidden_name'];
    $uname = $_SESSION['username'];

    // echo $blogId;
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
    // $url = $rowBlog['url'];
    $spam = $rowBlog['spam'];
    //likes,reads row added in database blog table
    $likes = $rowBlog['likes']; 
    $reads = $rowBlog['reads'];
    // echo "error yahn hai ";
    // echo $blogId;
    echo "<input type='hidden' id='hidden_input_blog' name='hidden_input' value='$blogId'></input>";
    
        
    $query3 = "SELECT blog.offeredby FROM blog WHERE blog_id = '$blogId'";
    $result3 = mysqli_query($dbc,$query3)
    or die("Unable to request image url from database");
    $offer = mysqli_fetch_assoc($result3);
    $offeredby = $offer['offeredby'];
    // echo $offeredby;
}

else{
    $url = 'http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'/login-page.php';
    header('Location:'.$url);
}


function getTags(){
        // require_once('connect.php');
    // require_once('likesIncr');
    $dbc = mysqli_connect('localhost', 'root', NULL, 'aprl')
    or die('Unable to connect to database');
    $blogId = $_GET['hidden_name'];

        $query3 = "SELECT tagname FROM tag INNER JOIN blogtag ON blogtag.tag_id = tag.tag_id WHERE blogtag.blog_id = 
    '$blogId' ";
        $result3 = mysqli_query($dbc,$query3)
        or die("Unable to request tags from database");
        // $rowTag = mysqli_fetch_assoc($result3);
        // echo $rowTag['tagname'];
        // $col = mysqli_fetch_array($rowTag);
        while($rowTag = mysqli_fetch_assoc($result3)){
            echo "<span>
                <button class='btn btn-primary btn-simple btn-round btn-sm' type='button'>".$rowTag['tagname']."</button>
            </span>";
        }
        // while($rowTag = mysqli_fetch_array($result3)){
        // for($x=0;$x<count($rowTag);$x++){
        //     echo $rowTag[$x]; 
}

function suggestTag(){
    $dbc = mysqli_connect('localhost', 'root', NULL, 'aprl')
    or die('Unable to connect to database');
    $blogId = $_GET['hidden_name'];

    $query3 = "SELECT tagname FROM tag INNER JOIN blogtag ON blogtag.tag_id = tag.tag_id WHERE blogtag.blog_id = 
    '$blogId' ";

        $result3 = mysqli_query($dbc,$query3)
        or die("Unable to request tags from database");
        // $rowTag = mysqli_fetch_assoc($result3);
        // echo $rowTag['tagname'];
        // $col = mysqli_fetch_array($rowTag);
        while($rowTag = mysqli_fetch_assoc($result3)){
            echo "<span>
                <button class='btn btn-primary btn-simple btn-round btn-sm' type='button'>".$rowTag[tagname]."</button>
            </span>";
        }
}

?>




<!DOCTYPE html>
<html lang="en">

<head >
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="../assets/favicon/favicon-16x16.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Blog Page</title>
    
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <!-- CSS Files -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../assets/css/now-ui-kit.css?v=1.1.0" rel="stylesheet" />
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

    <!-- CSS Just for demo purpose, don't include it in your project -->
     <!-- <script src="jquery-3.2.1.min.js"></script> -->

<script>

var blog_id;

window.onload = updateRead();
function updateRead(){

  blog_id = $('#hidden_input_blog').val();
  console.log("blog id is  " + blog_id);

  var xmlhttp1 = new XMLHttpRequest();
  xmlhttp1.onreadystatechange = function() {
        if (xmlhttp1.readyState == 4 && xmlhttp1.status == 200) {
                // alert(xmlhttp1.responseText);
                document.getElementById('readsCountId').innerHTML = xmlhttp1.responseText;;
                // console.log("The response reads - ");
                // console.log( xmlhttp1.responseText);
        }
    };
        var id = blog_id;
        // console.log("The value of id passed is - " + id);
        xmlhttp1.open("GET", "readsIncr.php?id=" +id, true);
        xmlhttp1.send();
}


function likesCount(){

    // console.log(1500*1500);
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
        {
            // alert(xmlhttp.responseText);
            document.getElementById('likesCountId').innerHTML = xmlhttp.responseText;
            // console.log("likes response - " + xmlhttp.responseText);
        }
    };
    var id = blog_id;
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
    var id = blog_id;
    xmlhttp.open("GET", "spamIncr.php?id=" +id, true);
    xmlhttp.send();
}

// function gotoprofile(){
    $(document).ready(function(){
    $("#titlekiid").click(function(){
        console.log("i have clicked");
        window.location = "profile-page.php?username=" + "<?php echo $offeredby ?>";
        // <?php
        // session_start();
        // $url = 'http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'/profile-page.php?username='.$title;
        // header('Location:'.$url);
        // ?> 
    }); 
});
   

// }

function clicksuggest(titleki){
console.log("im inside suggest");
    window.location = "blog.php?hidden_name=" + titleki;
}

// function getTags(){
//     // x = x+1;
//     // if(x==2){
//     //     return ;
//     // }
//     console.log(-1*1500);
//     var xmlhttp = new XMLHttpRequest();
//     xmlhttp.onreadystatechange = function() {
//         if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
//         {
//             // alert(xmlhttp.responseText);
//             document.getElementById('addTagsHere').innerHTML = xmlhttp.responseText;
//         }
//     };
//     var id =1;
//     xmlhttp.open("GET", "spamIncr.php?id=" +id, true);
//     xmlhttp.send();
// }

</script>


<!-- //newly added  -->
<meta charset="utf-8" />
    <link rel="icon" type="image/png" href="../assets/favicon/favicon-16x16.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <!-- CSS Files -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../assets/css/now-ui-kit3.css" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="../assets/css/demo.css" rel="stylesheet" />
    <link href="../assets/css/daddy.css" rel="stylesheet" />
    <!-- Canonical SEO -->
    


    
</head>

<body class="profile-page sidebar-collapse" >


	<!-- <script src="blogScript.js" ></script> -->
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-primary fixed-top navbar-transparent " color-on-scroll="400">
        <div class="container">
            <div class="navbar-translate">
                <a class="navbar-brand" href="landing-page.php"  data-placement="bottom" target="_blank">
                    <img src="../assets/favicon/invert.png" id="logo_id">
                </a>
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
                    <img class="photo-container" src= <?php echo '"../assets/img/user/'.$image.'"'?> alt="Profile Picture" id="daddy_image">
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown" data-placement="left">
                    <a class="dropdown-item" href="profile-page.php">Profile</a>
                    <a class="dropdown-item" href="blog.php">Blog</a>
                    <a class="dropdown-item" href="project.php">Project</a>
                    <?php if($profession=='faculty') echo '<a class="dropdown-item" href="#" data-toggle="modal" data-target="#myModal1">New Peoject</a>'; ?>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="edit-profile.php" >Edit Profile</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="logout.php">Logout</a>
                </div>
            </div>
            
        </div>
    </nav>
    <!-- End Navbar -->
    <div class="wrapper">
        <div class="page-header page-header-small">
            <div class="page-header-image" data-parallax="true" style="background-image: url('../assets/img/bg5.jpg');">
        </div>
            <div class="container">

                
                <div class="content-center" id="one">
                    <h2 class="title"><?php echo $title ?></h3>
                    <br>
                    <div class="content">
                        <div class="social-description">
                            <h2 id="readsCountId"><?php echo $reads ?></h2>
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

                    <p class="category" id="titlekiid"><?php echo $offeredby ?></p>
                    <p class="category" ><?php echo $date ?></p>

                </div>

               <div class="container tim-container" style="max-width:800px; padding-top:100px">

                   <!-- <h1 class="text-center">Awesome looking header <br> just for my friends</h1> -->
                   <h4 class="text-center"><?php $date ?></h4>
                   
                   <span id = "addTagsHere">
                    
                    <?php getTags()?>
                        <!-- span >
                            <button class="btn btn-primary btn-simple btn-round btn-sm" type="button" >HTML</button>
                        </span>
                
                                            
                        <span >
                            <button class="btn btn-primary btn-simple btn-round btn-sm" type="button">CSS</button>
                        </span>
                        <span >
                            <button class="btn btn-primary btn-simple btn-round btn-sm" type="button">JavaScript</button>
                        </span> -->
                    </span>
                    <br>
                    <br>
                    

                   <p><?php echo $description ?></p>
                   <!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p> -->      
                   <!--     end extras --> 


                  
                   <div class="col text-center" id="two">
                        <!-- <a href="#pablo" class="btn btn-primary btn-round btn-lg"</a>  -->
                        <br>
                        <h8>Like</h8>
                        <button class="btn btn-primary btn-round btn-lg" type="button" onclick="likesCount()" >
                            <i class="now-ui-icons ui-2_favourite-28" ></i> 
                        </button>
                   </div>
                   <br><br>
                    <div class="col text-center"> 
                        <a href="#pablo" class="btn btn-primary btn-round btn-lg">Comments</a> 
                        <button class="btn btn-primary btn-round btn-lg" type="button">
                            10
                        </button>
                   </div>

              </div>
              <br><br><br><br>


              <!-- <iframe height="200px" width="100%" src="suggest_blog.htm" name="iframe_a"></iframe> -->

<div class="section">


<?php 
 $dbc = mysqli_connect('localhost', 'root', NULL, 'aprl')
    or die('Unable to connect to database');
    $blogId = $_GET['hidden_name'];;

    $query3 = "SELECT tagname FROM tag INNER JOIN blogtag ON blogtag.tag_id = tag.tag_id WHERE blogtag.blog_id = 
    '$blogId' ";
        $result3 = mysqli_query($dbc,$query3)
        or die("Unable to request tags from database");

        echo "<h3 class="."title text-center".">You may also be interested in</h3>
        <br />
        <div class="."row".">" ;
        
        $rowTag1 = mysqli_fetch_assoc($result3);
        $rowTag2 = mysqli_fetch_assoc($result3);
        $rowTag3 = mysqli_fetch_assoc($result3);
        // echo $rowTag1['tagname'];
        // echo $rowTag2['tagname'];
        // echo $rowTag3['tagname'];

        $querya = "SELECT DISTINCT blog.blog_id,blog.title, blog.description FROM ((blogtag INNER JOIN tag ON 
        tag.tag_id = blogtag.tag_id ) INNER JOIN blog ON blog.blog_id = blogtag.blog_id) 
        WHERE (tag.tagname = '$rowTag1[tagname]' AND 
        tag.tagname = '$rowTag2[tagname]' OR tag.tagname = '$rowTag3[tagname]' AND (NOT blog.blog_id =
         '$blogId') ) ORDER BY blog.reads DESC";
        

        $resulta = mysqli_query($dbc,$querya);
        if(!$resulta){
            echo("Errorcode: " . mysqli_errno($dbc));
        }

        // or die("Unable to request tags from database");
        // $x = 0;
        $rowDataq = mysqli_fetch_assoc($resulta);
        if($rowDataq!=NULL){
           // while($rowData = mysqli_fetch_assoc($resulta)){
                        // $x++;
                        
                       echo' <div class="col-md-4" onclick="clicksuggest('.$rowDataq['blog_id'].')">
                            <div class="card card-plain card-blog">
                                <div class="card-image">
                                        <img class="img rounded img-raised" src="../assets/img/bg5.jpg" />
                                    </a>
                                </div>
                                <div class="card-body">
                                    <h6 class="category text-info">Blog</h6>
                                    <h4 class="card-title">
                                        <a >'.$rowDataq['title'].'</a>
                                    </h4>
                                    <p class="card-description">'.
                                        substr($rowDataq['description'],0,100).'
                                        <a >   .......      Read More </a>
                                    </p>
                                </div>
                            </div>
                        </div>';
                        // if($x == 3){
                        //     break;
                        // }
        // } 
        }
        

        $rowDatar = mysqli_fetch_assoc($resulta);
        if($rowDatar!=NULL){
            // while($rowData = mysqli_fetch_assoc($resulta)){
                        // $x++;

                       echo' <div class="col-md-4" onclick="clicksuggest('.$rowDatar['blog_id'].')">
                            <div class="card card-plain card-blog">
                                <div class="card-image">
                                        <img class="img rounded img-raised" src="../assets/img/bg5.jpg" />
                                    </a>
                                </div>
                                <div class="card-body">
                                    <h6 class="category text-info">Blog</h6>
                                    <h4 class="card-title">
                                        <a >'.$rowDatar['title'].'</a>
                                    </h4>
                                    <p class="card-description">'.
                                        substr($rowDatar['description'],0,100).'
                                        <a >   .......      Read More </a>
                                    </p>
                                </div>
                            </div>
                        </div>';
                        // if($x == 3){
                        //     break;
                        // }
        // }
        }
        

        $rowDatas = mysqli_fetch_assoc($resulta);
        if($rowDatas!=NULL){
// while($rowData = mysqli_fetch_assoc($resulta)){
                        // $x++;

                       echo' <div class="col-md-4" onclick="clicksuggest('.$rowDatas['blog_id'].')">
                            <div class="card card-plain card-blog">
                                <div class="card-image">
                                        <img class="img rounded img-raised" src="../assets/img/bg5.jpg" />
                                    </a>
                                </div>
                                <div class="card-body">
                                    <h6 class="category text-info">Blog</h6>
                                    <h4 class="card-title">
                                        <a >'.$rowDatas['title'].'</a>
                                    </h4>
                                    <p class="card-description">'.
                                        substr($rowDatas['description'],0,100).'
                                        <a >   .......      Read More </a>
                                    </p>
                                </div>
                            </div>
                        </div>';
                        // if($x == 3){
                        //     break;
                        // }
        // }
        
        }

        if($rowDatas==NULL && $rowDatar==NULL && $rowDataq==NULL){
            // echo "i'm here";

        $querya1 = "SELECT DISTINCT blog.blog_id,blog.title, blog.description FROM blog WHERE 
        (NOT blog.blog_id = '$blogId') ORDER BY blog.reads DESC";
        

        $resulta1 = mysqli_query($dbc,$querya1);
        if(!$resulta1){
            echo("Errorcode: " . mysqli_errno($dbc));
        }

        // or die("Unable to request tags from database");
        // $x = 0;
        $rowDataq1 = mysqli_fetch_assoc($resulta1);
        if($rowDataq1!=NULL){
           // while($rowData = mysqli_fetch_assoc($resulta)){
                        // $x++;

                       echo' <div class="col-md-4" onclick="clicksuggest('.$rowDataq1['blog_id'].')">
                            <div class="card card-plain card-blog">
                                <div class="card-image">
                                        <img class="img rounded img-raised" src="../assets/img/bg5.jpg" />
                                    </a>
                                </div>
                                <div class="card-body">
                                    <h6 class="category text-info">Blog</h6>
                                    <h4 class="card-title">
                                        <a >'.$rowDataq1['title'].'</a>
                                    </h4>
                                    <p class="card-description">'.
                                        substr($rowDataq1['description'],0,100).'
                                        <a >   .......      Read More </a>
                                    </p>
                                </div>
                            </div>
                        </div>';
                        // if($x == 3){
                        //     break;
                        // }
        // } 
        }
        

        $rowDatar1 = mysqli_fetch_assoc($resulta1);
        if($rowDatar1!=NULL){
            // while($rowData = mysqli_fetch_assoc($resulta)){
                        // $x++;

                       echo' <div class="col-md-4" onclick="clicksuggest('.$rowDatar1['blog_id'].')">
                            <div class="card card-plain card-blog">
                                <div class="card-image">
                                        <img class="img rounded img-raised" src="../assets/img/bg5.jpg" />
                                    </a>
                                </div>
                                <div class="card-body">
                                    <h6 class="category text-info">Blog</h6>
                                    <h4 class="card-title">
                                        <a >'.$rowDatar1['title'].'</a>
                                    </h4>
                                    <p class="card-description">'.
                                        substr($rowDatar1['description'],0,100).'
                                        <a >   .......      Read More </a>
                                    </p>
                                </div>
                            </div>
                        </div>';
                        // if($x == 3){
                        //     break;
                        // }
        // }
        }
        

        $rowDatas1 = mysqli_fetch_assoc($resulta1);
        if($rowDatas1!=NULL){
// while($rowData = mysqli_fetch_assoc($resulta)){
                        // $x++;

                       echo' <div class="col-md-4" onclick="clicksuggest('.$rowDatas1['blog_id'].')">
                            <div class="card card-plain card-blog">
                                <div class="card-image">
                                        <img class="img rounded img-raised" src="../assets/img/bg5.jpg" />
                                    </a>
                                </div>
                                <div class="card-body">
                                    <h6 class="category text-info">Blog</h6>
                                    <h4 class="card-title">
                                        <a >'.$rowDatas1['title'].'</a>
                                    </h4>
                                    <p class="card-description">'.
                                        substr($rowDatas1['description'],0,100).'
                                        <a >   .......      Read More </a>
                                    </p>
                                </div>
                            </div>
                        </div>';
                        // if($x == 3){
                        //     break;
                        // }
        // }
        
        }
        }
        

    echo "</div>";

                   
                        
           
?>


   
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


<script type="text/javascript">
$.fn.isInViewport = function() {
  var elementTop = $(this).offset().top;
  var elementBottom = elementTop + $(this).outerHeight();

  var viewportTop = $(window).scrollTop();
  var viewportBottom = viewportTop + $(window).height();

  return elementBottom > viewportTop && elementTop < viewportBottom;
};

var count1 = 0,
    count2 =0;
  $(window).on('resize scroll', function() {
    if ($('#one').isInViewport()) {
        if(count1 == 0){
        $.ajax({ 
                   type: "POST",
                    url: "blogStatus.php",
                    data: {
                        'blogid': <?php echo $blogId; ?>,
                        'id': 'one'
                    },
                    success: function(data){
                       // $('#one').html(data);
                    }
                });
            count1++;
    }
    }
    if ($('#two').isInViewport()) {
        if (count2==0) {
        $.ajax({ 
                   type: "POST",
                    url: "blogStatus.php",
                    data: {
                        'blogid': <?php echo $blogId; ?>,
                        'id': 'two'
                    },
                    success: function(data){
                        //$('#two').html(data);
                    }
                });
    }
    }
});
</script>
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

        </html>
