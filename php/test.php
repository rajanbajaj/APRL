<?php
	error_reporting(E_ALL);
	ini_set("display_errors",1);
	$title = "Test title";
$content = "<h1>Hello World</h1>";
$page = "
<!DOCTYPE html>
<html>
<head>
<title>$title</title>
<meta http-equiv='Content-Type' content='text/html;charset=utf-8'/>
</head>
<body>
$content
</body>
</html>";
echo $page;
?>