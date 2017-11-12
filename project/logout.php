<?php
session_start();
if(isset($_SESSION['username'])){
$_SESSION = array();

	if ($_COOKIE[session_name()]) {
		setcookie(session_name(), '', time() - 3600);
	}
	session_destroy();
}
setcookie('username', '', time() - 3600);

$url = 'http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'/login-page.php';
header('Location:'.$url);
?>
