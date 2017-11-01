<?php
require_once('start-session.php');
require_once('connect.php');
if(!isset($_COOKIE['username'])) {
		$username = mysqli_real_escape_string($dbc, trim($_POST['Username']));
		$password = mysqli_real_escape_string($dbc, trim($_POST['Password']));

		require_once('connect.php');
		if (!empty($_POST['Username']) && !empty($_POST['Password'])){
			$query = "SELECT username, password FROM userlogin WHERE username = '$username' AND password = SHA('$password')";
			$result = mysqli_query($dbc, $query)
			or die("Unable to make query");

			if (mysqli_num_rows($result) == 1) {
				echo 'if statement';
				$row = mysqli_fetch_array($result);
				$_SESSION['username'] = $row['username'];
				setcookie('username',$row['username'], time() + (60*60*24*30));
				mysqli_close($dbc);
				$url = 'http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'/profile-page.php';
				header('Location:'.$url);
			}
			else
				echo 'Invalid credentials';
				require_once('login-page.php');
		}
}
else{
	$url = 'http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'/profile-page.php';
		header('Location:'.$url);
}
?>
