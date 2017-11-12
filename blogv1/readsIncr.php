<?php 
session_start();
	require_once('connect.php');
	//echo "I'm inside hahaha";
	$blogId = $_GET['id'];
	// echo $blogId;
	$query = "SELECT blog.reads FROM blog WHERE blog_id ='$blogId'";
	$result = mysqli_query($dbc,$query)
	or die("Unable to request reads from database");
	$row = mysqli_fetch_array($result);
	$reads = $row['reads'];
	$readsInc = $reads + 1;
	echo $readsInc;
	// echo $spam;

	$query4r = "UPDATE blog SET blog.reads = '$readsInc' WHERE blog_id = '$blogId'"; 
	if(mysqli_query($dbc,$query4r)){}
	else{
		echo "Unable to update reads data";
	}
		// mysqli_close($dbc);
?>