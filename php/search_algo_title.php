<?php
    
    define("DB_MSG_ERROR", 'Could not connect!<br />Please contact the site\'s administrator.');
    $conn = mysql_connect("localhost", "root", NULL) or die(DB_MSG_ERROR);
    $db = mysql_select_db('aprl') or die(DB_MSG_ERROR);
    $query = mysql_query("
      SELECT * 
      FROM project
      WHERE MATCH(title) AGAINST('".$_POST['value']."')
    ");
    
    while ($data = mysql_fetch_array($query)) {
      echo '<div class="col-md-4">
                <div class="card card-blog">
                    <div class="card-image">
                        <a href="#pablo">
                            <img class="img rounded" src="../assets/img/bg1.jpg">
                        </a>
                    </div>
                    <div class="card-body">
                        <h6 class="category text-primary">Features</h6>
                        <h5 class="card-title">';
        echo $data["title"];
        echo '</h5>
                <p class="card-description">';

        echo $data["description"];;
                    
        echo '</p>
                <div class="card-footer">
                    <div class="author">
                        
                        <span>';
        echo $data["offeredby"];           
        echo '</span>
                    </div>
                    <div class="stats stats-right">
                        <i class="now-ui-icons tech_watch-time"></i> 5 min read
                    </div>
                </div>
            </div>
            </div>
        </div>';
    }
    
?>

