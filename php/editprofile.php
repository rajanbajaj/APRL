<?php
	session_start();
	if(isset($_SESSION['username'])){
		define('APRL_UPLOADPATH', '../assets/img/');
		$username = $_SESSION['username'];
		$firstname = $_POST['FirstName'];
		$lastname = $_POST['LastName'];
		$credential = $_POST['Credential'];
		$description = $_POST['Description'];
		$name = $firstname.' '.$lastname;
		$email = $_POST['Email'];
		$image = $_FILES['Image']['name'];
		if(!is_dir(APRL_UPLOADPATH.$username."/")) {
        	mkdir(APRL_UPLOADPATH.$username); 
    	}
		//echo $email." ".$image;

		require_once('connect.php');
		$query = "SELECT profession FROM userlogin WHERE username = '$username'";
		$result = mysqli_query($dbc, $query);
		$row = mysqli_fetch_array($result);
		if($row['profession']=='student')
			$var = "studentinfo";
		if($row['profession']=='faculty')
			$var = "facultyinfo";
			
			$query = "UPDATE $var SET firstname = '$firstname', lastname = '$lastname', credential = '$credential',description = '$description', email = '$email' WHERE username = '$username' "; 
			mysqli_query($dbc, $query)
			or die('Unable to query');
			if($image!=''){
				$query = "SELECT image_url FROM $var WHERE username = '$username'";
				$result = mysqli_query($dbc, $query);
				$row = mysqli_fetch_array($result);
				$old_image = $row['image_url'];

				$query = "UPDATE $var SET image_url = '$image' WHERE username='$username'";
				mysqli_query($dbc, $query)
				or die('Unable to query1');
			}	
		
		$query = "UPDATE userlogin SET name = '$name'";
		mysqli_query($dbc, $query)
		or die('Unable to query');
		if($image!=''){
			$target = APRL_UPLOADPATH.$username.'/'.$image;
			move_uploaded_file($_FILES['Image']['tmp_name'], $target);
			if($old_image!='fb_avatar_male.jpg'){
				$target = APRL_UPLOADPATH.$username.'/'.$old_image;
				@unlink($target);
			}
		}
		mysqli_close($dbc);
		echo 'Update successful!';
		$url = 'http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'/profile-page.php';
        header('Location:'.$url); 
	}
	else{
		 $url = 'http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'/login-page.php';
         header('Location:'.$url);
	}
?>