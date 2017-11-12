<?php
  if(isset($_REQUEST["q"])){
	   display_project($_REQUEST["q"]);
}

  if(isset($_POST['status']) and isset($_POST['start']) and isset($_POST['end'])){
  $start = $_POST['start'];
  $end = $_POST['end'];
  $status = $_POST["status"];
    $dbc = mysqli_connect("localhost", "root", NULL, "aprl")
    or die("Unable to connect to database");

    if($status=="all")
    $query = "SELECT * FROM `project` WHERE `project_id` >= $start ORDER BY `project_id` ASC LIMIT $end ";
    else
    $query = "SELECT * FROM project where status='$status' and `project_id` >= $start ORDER BY `project_id` ASC LIMIT $end";
    $result = mysqli_query($dbc, $query)
    or die('Unable to query project' );
    // update start and end for next page
    $start=$end;
    echo "<a onclick='page_navigate(\"$start\",\"$end\")'><h6>Next Page</h6></a>";

    //echo mysqli_num_rows($result);
    while($row = mysqli_fetch_assoc($result)){
    	$short_desc = substr($row["description"], 0,150)." ....";
         echo " <div class='container tim-container' style='max-width:800px; padding-top:30px'>

                   <h1 class='text-center'>$row[title]</h1>
                  
                    <!--    Display Current Projects --> 
                   <p>$short_desc</p>
                        
                        <span >";
                         $query1 = "SELECT tag.tagname from project join projecttag on project.project_id = projecttag.project_id join tag on projecttag.tag_id=tag.tag_id where project.project_id=$row[project_id]" ;
    						$result_tag = mysqli_query($dbc, $query1)
    						or die('Unable to query project' );
						while($tag = mysqli_fetch_assoc($result_tag)){
                    echo    "<span >
                            <button class='btn btn-primary btn-simple btn-round btn-sm' type='button'>$tag[tagname]</button>
                        </span>";
                    }
                   echo
                    " </span>
                   <!--     end extras --> 
                   <div class='col text-center'> 
                        <a onclick='showPage(\"$row[project_id]\")' class='btn btn-primary btn-round btn-lg'>Detail Description</a> 
                        <button onclick='apply(\"$status\",\"apply$row[project_id]\")' class='btn btn-primary btn-round btn-lg' type='button'>
                            <i class='now-ui-icons ui-2_favourite-28'></i> Apply
                        </button>
                   </div>
                        <span id='apply$row[project_id]'></span>
              </div>
              ";
    }
    mysqli_close($dbc);
}

function display_project($status){
    $dbc = mysqli_connect("localhost", "root", NULL, "aprl")
    or die("Unable to connect to database");

    if($status=="all")
    $query = "SELECT * FROM project";
    else
    $query = "SELECT * FROM project where status='$status'";
    $result = mysqli_query($dbc, $query)
    or die('Unable to query project' );

    //echo mysqli_num_rows($result);
    while($row = mysqli_fetch_assoc($result)){
      $short_desc = substr($row["description"], 0,150)." ....";
         echo " <div class='container tim-container' style='max-width:800px; padding-top:30px'>

                   <h1 class='text-center'>$row[title]</h1>
                  
                    <!--    Display Current Projects --> 
                   <p>$short_desc</p>
                        
                        <span >";
                         $query1 = "SELECT tag.tagname from project join projecttag on project.project_id = projecttag.project_id join tag on projecttag.tag_id=tag.tag_id where project.project_id=$row[project_id]" ;
                $result_tag = mysqli_query($dbc, $query1)
                or die('Unable to query project' );
            while($tag = mysqli_fetch_assoc($result_tag)){
                    echo    "<span >
                            <button class='btn btn-primary btn-simple btn-round btn-sm' type='button'>$tag[tagname]</button>
                        </span>";
                    }
                   echo
                    " </span>
                   <!--     end extras --> 
                   <div class='col text-center'> 
                        <a onclick='showPage(\"$row[project_id]\")' class='btn btn-primary btn-round btn-lg'>Detail Description</a> 
                        <button onclick='apply(\"$status\",\"apply$row[project_id]\")' class='btn btn-primary btn-round btn-lg' type='button'>
                            <i class='now-ui-icons ui-2_favourite-28'></i> Apply
                        </button>
                   </div>
                        <span id='apply$row[project_id]'></span>
              </div>
              ";
    }
    mysqli_close($dbc);
}
?>

