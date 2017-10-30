<?php
	$username = $_POST['Username'];
	$password = $_POST['Password'];

	require_once('connect.php');
	if (!empty($_POST['Username']) && !empty($_POST['Password'])){
		$query = "SELECT username, password FROM userlogin WHERE username = '$username' AND password = SHA('$password')";
		$result = mysqli_query($dbc, $query)
		or die("Unable to make query");

		if (mysqli_num_rows($result) == 1) {
			$url = 'http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'/profile-page.html';
			header('Location:'.$url);
		}
		else
			echo 'Invalid credentials';
	}
?>