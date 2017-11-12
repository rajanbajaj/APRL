<?php
session_start();
if(!isset($_SESSION['username'])){
  $url = 'http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'/login-page.php';
  header('Location:'.$url);
}
else{
  $username = $_SESSION['username'];
}

if(isset($_POST["id"])){
	show_project($_POST["id"]);
}

function show_project($id){
$username = $_SESSION['username'];
 $dbc = mysqli_connect("localhost", "root", NULL, "aprl")
 or die("Unable to connect to database");
$query = "SELECT profession FROM userlogin WHERE username = '$username'";
$result = mysqli_query($dbc, $query);
$row = mysqli_fetch_array($result);
$profession = $row['profession'];

 $query = "SELECT * FROM `project` where project_id='$id'";
 $result = mysqli_query($dbc, $query)
 or die('Unable to query project' );

 $query2 = "SELECT MIN(`project_id`),MAX(`project_id`) FROM `project` ";
 $result2 = mysqli_query($dbc, $query2)
 or die('Unable to query next and prev projects' );
 $min_max = mysqli_fetch_assoc($result2);
 $previd = $min_max['MIN(`project_id`)'];
 $nextid = $min_max['MAX(`project_id`)'];

 while($row = mysqli_fetch_assoc($result)){
   echo " <div class='container tim-container' style='max-width:800px; padding-top:10px'>

   <h1 class='text-center'>$row[title]</h1>
   <h6 class='col text-right'>Offered By - $row[offeredby]
   <br> Posted on - $row[addedon]
   </h6>";
   if($row['status'] == "available" and $profession!='faculty'){
            echo"
                <!--collapse -->
                            <div id='collapse'>
                                <div class='row'>
                                    <div class='col-md-12'>
                                        <div id='accordion' role='tablist' aria-multiselectable='true' class='card-collapse'>
                                            <div class='card card-plain'>
                                                <div class='card-header' role='tab' id='headingOne'>
                                                    <a data-toggle='collapse' data-parent='#accordion' href='#collapseOne' aria-expanded='true' aria-controls='collapseOne'>
                                                        Apply for project
                                                        <i class='now-ui-icons arrows-1_minimal-down'></i>
                                                    </a>
                                                </div>
                                                <div id='collapseOne' class='collapse ' role='tabpanel' aria-labelledby='headingOne'>
                                                    <div class='card-body'>
                                                       <input hidden id='p_id' value='$row[project_id]'><p><b>Why are you interested in this project?</b></p>
                                                            <textarea class='form-control' id='interested'></textarea>
                                                            <div class='col text-left'> 
                                                                <button id = 'apply_form' class='btn btn-primary ' type='button'>
                                                                <i class='now-ui-icons ui-2_favourite-28'></i> Apply
                                                                </button>
                                                            </div>
                                                            <span id='apply$row[project_id]'></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                          
                            <!--  end collapse -->";
  }
  echo "
  <!--    Display Current Projects --> 
  <p>$row[description]</p>
  
  <span >";
  $query1 = "SELECT tag.tagname from project join projecttag on project.project_id = projecttag.project_id join tag on projecttag.tag_id=tag.tag_id where project.project_id=$row[project_id]" ;
  $result_tag = mysqli_query($dbc, $query1)
  or die('Unable to query tagname' );
  while($tag = mysqli_fetch_assoc($result_tag)){
    echo    "<span >
    <button class='btn btn-primary btn-simple btn-round btn-sm' type='button'>$tag[tagname]</button>
    </span>";
  }
  $current_id = $row["project_id"];
  
  $nextquery= "SELECT `project_id` FROM `project` WHERE `project_id` > $current_id ORDER BY `project_id` ASC LIMIT 1"; 
  $nextresult = mysqli_query($dbc,$nextquery)
  or die("Unable to get next project_id");
  if(mysqli_num_rows($nextresult) > 0)
  {
    $nextrow = mysqli_fetch_assoc($nextresult);
    $nextid  = $nextrow["project_id"];
  }

  $prevquery= "SELECT `project_id` FROM `project` WHERE `project_id` = (SELECT MAX(`project_id`) FROM `project` WHERE `project_id`< $current_id)"; 
  $prevresult = mysqli_query($dbc,$prevquery)
  or die("Unable to get prev project_id");
  if(mysqli_num_rows($prevresult) > 0)
  {
    $prevrow = mysqli_fetch_assoc($prevresult);
    $previd  = $prevrow['project_id'];
  }
  echo
  " </span>
  <!--     end extras --> 
  <div class='col text-center'> 
  <a onclick='showPage(\"$previd\")' class='btn btn-primary btn-round btn-lg'>Previous Project</a> 
  <a onclick='showPage(\"$nextid\")' class='btn btn-primary btn-round btn-lg'>Next Project</a> 
  </div> 
  </div>
  ";
}
mysqli_close($dbc);
}
?>