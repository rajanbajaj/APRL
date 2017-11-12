<?php 
session_start();
	require_once('connect.php');
	$blogId = 1;
	// $spam = 1;
	$query = "SELECT spam FROM blog WHERE blog_id ='$blogId'";
	$result = mysqli_query($dbc,$query)
	or die("Unable to request spam from database");
	$row = mysqli_fetch_array($result);
	$spam = $row['spam'];
	// echo $result;
	// $spamInc = 5;
	$spamInc = $spam + 1;
	// echo "This is echoooo " . $spam . "uhji";
	// echo "encho der dec oder";
	$query4 = "UPDATE blog SET spam = '$spamInc' WHERE blog_id = '$blogId'"; 
	if(mysqli_query($dbc,$query4)){}
	else{
		echo "Unable to update spam data";
	}
	// echo $spamInc;
	// mysqli_close($dbc);
?>