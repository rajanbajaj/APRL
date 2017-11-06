<?php
  session_start();
    if(!isset($_SESSION['username'])){
        $url = 'http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'/login-page.php';
        header('Location:'.$url);
    }
    else{
        $username = $_SESSION['username'];
    }
    if(isset($_REQUEST["q"])){
	//apply_project($_REQUEST["q"]);
}

function apply_project($status){

     $dbc = mysqli_connect("localhost", "root", NULL, "aprl")
    or die("Unable to connect to database");

    $query = "SELECT * FROM project where project_id='$id'";
    $result = mysqli_query($dbc, $query)
    or die('Unable to query project' );

    $query2 = "SELECT project_id FROM project ";
    $result2 = mysqli_query($dbc, $query2)
    or die('Unable to query no. of projects' );
 
    while($row = mysqli_fetch_assoc($result)){
         echo " <div class='container tim-container' style='max-width:800px; padding-top:10px'>

                   <h1 class='text-center'>$row[title]</h1>
                  
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
                    $p_id = $row["project_id"];
                    $prev = "1";
                    if($p_id-1)$prev=$p_id-1;
                    $next = mysqli_num_rows($result2);
                    if($p_id<$next)$next=$p_id+1;
                   echo
                    " </span>
                   <!--     end extras --> 
                   <div class='col text-center'> 
                        <a onclick='showPage(\"$prev\")' class='btn btn-primary btn-round btn-lg'>Previous<br> Project</a> 
                        <a onclick='showPage(\"$next\")' class='btn btn-primary btn-round btn-lg'>Next<br> Project</a> 
                   </div> 
              </div>
              ";
    }
    mysqli_close($dbc);
}
?>