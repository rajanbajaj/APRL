<?php
	session_start();
	if(isset($_SESSION['username'])){
		$username = $_SESSION['username'];
		$firstname = $_POST['FirstName'];
		$lastname = $_POST['LastName'];
		$credential = $_POST['Credential'];
		$description = $_POST['Description'];
		$name = $firstname.' '.$lastname;
		require_once('connect.php');
		$query = "UPDATE studentinfo SET firstname = '$firstname', lastname = '$lastname', credential = '$credential',description = '$description' WHERE username = '$username' "; 
		mysqli_query($dbc, $query)
		or die('Unable to query');

		$query = "UPDATE userlogin SET name = '$name'";
		mysqli_query($dbc, $query)
		or die('Unable to query');

		echo 'Update successful!';
		$url = 'http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'/profile-page.php';
        header('Location:'.$url); 
	}
	else{
		 $url = 'http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'/login-page.php';
         header('Location:'.$url);
	}
?>