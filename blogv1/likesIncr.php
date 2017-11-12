<?php 
session_start();
	require_once('connect.php');
	// echo "I'm insde hahahahah";
	$blogId = $_GET['id'];
	// echo $blogId;
	$query = "SELECT likes FROM blog WHERE blog_id ='$blogId'";
	$result = mysqli_query($dbc,$query)
	or die("Unable to request spam from database");
	$row = mysqli_fetch_array($result);
	$likes = $row['likes'];
	$likesInc = $likes + 1;
	echo $likesInc;
	// echo $spam;

	$query4 = "UPDATE blog SET likes = '$likesInc' WHERE blog_id = '$blogId'"; 
	if(mysqli_query($dbc,$query4)){}
	else{
		echo "Unable to update likes data";
	}
		// mysqli_close($dbc);
?>