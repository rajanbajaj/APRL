<?php
    
    define("DB_MSG_ERROR", 'Could not connect!<br />Please contact the site\'s administrator.');
    $conn = mysqli_connect("localhost", "root", NULL) or die(DB_MSG_ERROR);
    $db = mysqli_select_db($conn,'aprl') or die(DB_MSG_ERROR);
    $value_search = $_POST['value'];
    $radio = $_POST['radio_button'];

    if($_POST['check1'] == 1){

    }

    if($_POST['check2'] == 1){
        $wow = "
          SELECT * 
          FROM project
          WHERE MATCH(offeredby) AGAINST('$value_search')
          UNION
          SELECT * 
          FROM project
          WHERE SOUNDEX(offeredby) = SOUNDEX('$value_search')
          UNION
          SELECT * 
          FROM project
          WHERE MATCH(title) AGAINST('$value_search')
          UNION
          SELECT * 
          FROM project
          WHERE SOUNDEX(title) = SOUNDEX('$value_search') 
        ";
        if($radio == 2){
            $wow = $wow." ORDER BY addedon DESC";
        }

        $query = mysqli_query($conn,$wow);
    
        while ($data = mysqli_fetch_array($query)) {


          echo '<div class="col-md-4">'; 
            
            echo '<div class="card card-blog">
                        <div class="card-image">
                            <a href="project.php?id=';
                            echo $data["project_id"];
                                echo '"><img class="img rounded" src="../assets/img/bg3.jpg">
                            </a>
                        </div>
                        <div class="card-body">
                            <h6 class="category text-primary">FEATURES</h6>
                            <h5 class="card-title" >';
            echo $data["title"];
            echo '</h5>
                    <p class="card-description">';

            echo substr($data["description"],0,150)."...";
                        
            echo '</p>
                    <div class="card-footer">
                        <div class="author">
                            <img src="../assets/img/julie.jpg" alt="..." class="avatar img-raised">
                            <span>';
            echo $data["offeredby"];           
            echo '</span>
                        </div>
                        
                    </div>
                </div>
                </div>
            </div>';
        }
        

    }

    if($_POST['check3'] == 1){

        $wow = "
          SELECT * 
          FROM studentinfo
          WHERE SOUNDEX(firstname) = SOUNDEX('$value_search')
          UNION
          SELECT * 
          FROM studentinfo
          WHERE SOUNDEX(lastname) = SOUNDEX('$value_search')
        ";
        
        $query = mysqli_query($conn,$wow);
    
        while ($data = mysqli_fetch_array($query)) {


          echo '<div class="col-md-4">'; 
            
            echo '<div class="card card-blog">
                        <div class="card-image">
                            <a href="profile-page.php?username=';
                            echo $data["username"];
                                echo '"><img class="img rounded" src="../assets/img/bg3.jpg">
                            </a>
                        </div>
                        <div class="card-body">
                            <h6 class="category text-info">USER</h6>
                            <h5 class="card-title" >';
            echo $data["firstname"]." ".$data["lastname"];
            echo '</h5>
                    <p class="card-description">';

            echo substr($data["description"],0,150)."...";
                        
            echo '</p>
                    <div class="card-footer">
                        <div class="author">
                            
                            <span>';
                       
            echo '</span>
                        </div>
                        
                    </div>
                </div>
                </div>
            </div>';
        }

    }

    
    
?>

