<?php 
		require_once('../php/start-session.php');
		if(!isset($_SESSION['username'])){
			$url = 'http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'/login-page.php';
        		header('Location:'.$url);
		}
		else{
			require_once('../php/connect.php');
			$username = $_SESSION['username'];
			$query = "SELECT profession FROM userlogin WHERE username = '$username'";
	        $result = mysqli_query($dbc, $query);
	        $row = mysqli_fetch_array($result);
	        $profession = $row['profession'];
	        $blogid = $_POST['blogid'];
	        if($row['profession'] == "faculty")
	          $var = "facultyinfo";
	        elseif($row['profession'] == "student")
	          $var = "studentinfo";

	      		$query = "SELECT lastblog FROM $var WHERE username = '$username'";
	      		$result = mysqli_query($dbc, $query);
	      		$row = mysqli_fetch_array($result);
	      		if ($row['lastblog'] == NULL || $row['lastblog'] == "") {
	        		if($_POST['id'] == 'one'){
	        			$blogid1 = $blogid.'/';
	      				$query = "UPDATE $var SET lastblog = '$blogid1' WHERE username = '$username'";
	      				mysqli_query($dbc, $query);
		      		}
		      	}
		      	else {
		      		$query = "SELECT lastblog FROM $var WHERE username = '$username'";
		        	$result = mysqli_query($dbc, $query);
		        	$row = mysqli_fetch_array($result);
		        	$lastblog = $row['lastblog'];
		        	if($_POST['id']=='one'){
		        		if (strpos($lastblog, $blogid) == false) {
		        			$lastblognew = $lastblog.$blogid.'/';
		        			$query = "UPDATE $var SET lastblog = '$lastblognew' WHERE username = '$username'";
	      					mysqli_query($dbc, $query);
	      				}
					}
					elseif ($_POST['id']=='two') {
		        		$lastblognew = str_replace($blogid.'/', '', $lastblog);
		        		$query = "UPDATE $var SET lastblog = '$lastblognew' WHERE username = '$username'";
	      				mysqli_query($dbc, $query);
					}
		      	}
	    /*  	$query = "SELECT lastblog FROM $var WHERE username = '$username' AND lastblog LIKE '%$blogid/%'";
	        $result = mysqli_query($dbc, $query);
	        if(mysqli_num_rows($result)==0){
	        	$query = "SELECT lastblog FROM $var WHERE username = '$username'";
	        	$result = mysqli_query($dbc, $query);
	        	$row = mysqli_fetch_array($result);
	        	$lastblog = $row['lastblog'];
	        	if ($row['lastblog'] == NULL) {
	        		if($_POST['id'] == 'one'){
	        			$blogid1 = $blogid.'/';
	      				$query = "UPDATE $var SET lastblog = '$blogid1' WHERE username = '$username'";
	      				mysqli_query($dbc, $query);
		      		}
		      		else if($_POST['id'] == 'two') {
		      			$query = "UPDATE $var SET lastblog = NULL WHERE username = '$username'";
		      			mysqli_query($dbc, $query);
		      		}
	        	}
	        	else{
	        		$lastblognew = $lastblog.$blogid.'/';
	        		if($_POST['id'] == 'one'){
	      				$query = "UPDATE $var SET lastblog = '$lastblognew' WHERE username = '$username'";
	      				mysqli_query($dbc, $query);
		      		}
		      		else if($_POST['id'] == 'two') {
		      			$query = "UPDATE $var SET lastblog = '$lastblog' WHERE username = '$username'";
		      			mysqli_query($dbc, $query);
		      		}
	        	}
	        }
	        else{
	        	if($_POST['id'] == 'two'){
	        		$row = mysqli_fetch_array($result);
	        		$lastblog = $row['lastblog'];
	        		$lastblognew = str_replace("$blogid/","",$lastblog);
	        		$query = "UPDATE $var SET lastblog = '$lastblognew' WHERE username = '$username'";
	      			mysqli_query($dbc, $query);
	        	}
			}*/
	       
	   /*   	if($_POST['id'] == 'one'){
	      			$query = "UPDATE $var SET lastblog = '$blogid' WHERE username = '$username'";
	      			mysqli_query($dbc, $query);
	      	}
	      	else if($_POST['id'] == 'two') {
	      		$query = "UPDATE $var SET lastblog = NULL WHERE username = '$username'";
	      			mysqli_query($dbc, $query);
	      	}
	 */     	mysqli_close($dbc);
	      //	return $blogid;
		}
?>