<?php
	session_start();
	if(isset($_SESSION['username'])){
		define("APRL_UPLOADPATH","../assets/img")
		$username = $_SESSION['username'];
		$firstname = $_POST['FirstName'];
		$lastname = $_POST['LastName'];
		$credential = $_POST['Credential'];
		$description = $_POST['Description'];
		$name = $firstname.' '.$lastname;
		$email = $_POST['Email'];
		$image = $_POST['Image'];
		echo $email.' '.$image;

		require_once('connect.php');
		$query = "SELECT profession FROM userlogin WHERE username = '$username'";
		$result = mysqli_query($dbc, $query);
		$row = mysqli_fetch_array($result);
		if($row['profession']=='student'){
			$query = "UPDATE studentinfo SET firstname = '$firstname', lastname = '$lastname', credential = '$credential',description = '$description', email = '$email', image_url = '$image' WHERE username = '$username' "; 
			mysqli_query($dbc, $query)
			or die('Unable to query');
		}
		if($row['profession']=='faculty'){
			$query = "UPDATE facultyinfo SET firstname = '$firstname', lastname = '$lastname', credential = '$credential',description = '$description', email = '$email', image_url = '$image' WHERE username = '$username' "; 
			mysqli_query($dbc, $query)
			or die('Unable to query');
		}

		$query = "UPDATE userlogin SET name = '$name'";
		mysqli_query($dbc, $query)
		or die('Unable to query');

		move_uploaded_file($_FILES['Image']['tmp_name'], $target);
		$target = APRL_UPLOADPATH.$image;
		mysqli_close($dbc);
		echo 'Update successful!';
	//	$url = 'http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'/profile-page.php';
      //  header('Location:'.$url); 
	}
	else{
		 $url = 'http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'/login-page.php';
         header('Location:'.$url);
	}
?>