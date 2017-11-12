<?php
    
    define("DB_MSG_ERROR", 'Could not connect!<br />Please contact the site\'s administrator.');
    $conn = mysqli_connect("localhost", "root", NULL) or die(DB_MSG_ERROR);
    $db = mysqli_select_db($conn,'aprl') or die(DB_MSG_ERROR);
    $value_search = $_POST['value'];
    $radio = $_POST['radio_button'];

    if($_POST['check4'] == 1){

        $wow = "
          SELECT tag_id
          FROM tag
          WHERE MATCH(tagname) AGAINST('$value_search')
          UNION
          SELECT tag_id 
          FROM tag
          WHERE SOUNDEX(tagname) = SOUNDEX('$value_search')
        ";

        $query = mysqli_query($conn,$wow);
        while ($data = mysqli_fetch_array($query)) {


            $tag_id = $data["tag_id"];
            //echo $tag_id;
            $cow = "
              SELECT *
              FROM projecttag
              WHERE tag_id = '$tag_id'
            ";

            $wuery = mysqli_query($conn,$cow);

            while ($kata = mysqli_fetch_array($wuery)) {

                //echo $kata["project_id"];
                $project_id = $kata["project_id"];
                $now = "
                  SELECT *
                  FROM project
                  WHERE project_id = '$project_id'
                ";


                $nwuery = mysqli_query($conn,$now);

                while ($sata = mysqli_fetch_array($nwuery)) {

                  echo '<div class="col-md-4">'; 
                    
                    echo '<div class="card card-blog">
                                <div class="card-image">
                                    <a href="project.php?id=';
                                    echo $sata["project_id"];
                                        echo '"><img class="img rounded" src="../assets/img/bg3.jpg">
                                    </a>
                                </div>
                                <div class="card-body">
                                    <h6 class="category text-primary">PROJECT</h6>
                                    <h5 class="card-title" >';
                    echo $sata["title"];
                    echo '</h5>
                            <p class="card-description">';

                    echo substr($sata["description"],0,150)."...";
                                
                    echo '</p>
                            <div class="card-footer">
                                <div class="author">
                                    
                                    <span>';
                    echo $sata["offeredby"];           
                    echo '</span>
                                </div>
                                
                            </div>
                        </div>
                        </div>
                    </div>';
                }

            }


            $cow = "
              SELECT *
              FROM blogtag
              WHERE tag_id = '$tag_id'
            ";

            $wuery = mysqli_query($conn,$cow);

            while ($kata = mysqli_fetch_array($wuery)) {

                //echo $kata["project_id"];
                $blog_id = $kata["blog_id"];
                $now = "
                  SELECT *
                  FROM blog
                  WHERE blog_id = '$blog_id'
                ";


                $nwuery = mysqli_query($conn,$now);

                while ($sata = mysqli_fetch_array($nwuery)) {

                  echo '<div class="col-md-4">'; 
                    
                    echo '<div class="card card-blog">
                                <div class="card-image">
                                    <a href="blog.php?hidden_name=';
                                    echo $sata["blog_id"];
                                        echo '"><img class="img rounded" src="../assets/img/bg3.jpg">
                                    </a>
                                </div>
                                <div class="card-body">
                                    <h6 class="category text-success">BLOG</h6>
                                    <h5 class="card-title" >';
                    echo $sata["title"];
                    echo '</h5>
                            <p class="card-description">';

                    echo substr($sata["description"],0,150)."...";
                                
                    echo '</p>
                            <div class="card-footer">
                                <div class="author">
                                    
                                    <span>';
                    echo $sata["offeredby"];           
                    echo '</span>
                                </div>
                                
                            </div>
                        </div>
                        </div>
                    </div>';
                }

            }


        }

    }

    if($_POST['check1'] == 1){
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
                            <h6 class="category text-primary">PROJECT</h6>
                            <h5 class="card-title" >';
            echo $data["title"];
            echo '</h5>
                    <p class="card-description">';

            echo substr($data["description"],0,150)."...";
                        
            echo '</p>
                    <div class="card-footer">
                        <div class="author">
                            
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


    if($_POST['check2'] == 1){

        $wow = "
          SELECT * 
          FROM blog
          WHERE MATCH(keywords) AGAINST('$value_search')
          UNION
          SELECT * 
          FROM blog
          WHERE SOUNDEX(keywords) = SOUNDEX('$value_search')
          UNION
          SELECT * 
          FROM blog
          WHERE MATCH(title) AGAINST('$value_search')
          UNION
          SELECT * 
          FROM blog
          WHERE SOUNDEX(title) = SOUNDEX('$value_search') 
        ";
        if($radio == 2){
            $wow = $wow." ORDER BY date DESC";

        }

        $query = mysqli_query($conn,$wow);
    
        while ($data = mysqli_fetch_array($query)) {


          echo '<div class="col-md-4">'; 
            
            echo '<div class="card card-blog">
                        <div class="card-image">
                            <a href="blog.php?hidden_name=';
                            echo $data["blog_id"];
                                echo '"><img class="img rounded" src="../assets/img/bg3.jpg">
                            </a>
                        </div>
                        <div class="card-body">
                            <h6 class="category text-success">BLOG</h6>
                            <h5 class="card-title" >';
            echo $data["title"];
            echo '</h5>
                    <p class="card-description">';

            echo substr($data["description"],0,150)."...";
                        
            echo '</p>
                    <div class="card-footer">
                        <div class="author">
                            
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

