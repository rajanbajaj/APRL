<?php

$username = $_COOKIE['username'];
// echo $username;
if(isset($_POST['id']) and isset($_POST['approve'])){
	$id = $_POST['id'];
	$approve = 'yes';
	$approve = $_POST['approve'];
	$dbc = mysqli_connect("localhost", "root", NULL, "aprl")
	or die("Unable to connect to database");
	$query = "SELECT project.offeredby,applicant.username from `project` join `applicant` on applicant.project_id=project.project_id where id='$id'";
	$result = mysqli_query($dbc, $query)
	or die ('Unable to approve project');
	$row = mysqli_fetch_assoc($result);

	if($username == $row['offeredby']){

		$query = "UPDATE `applicant` SET `approval`='$approve' WHERE id = $id";
		$result = mysqli_query($dbc, $query)
		or die ('Unable to approve project');
		if($approve == 'yes'){
		echo "<button type='button' rel='tooltip' class=' btn-sm '>
		Approved
		</button>";
		}
	if($approve == 'no'){
		echo "<button type='button' rel='tooltip' class=' btn-sm '>
		Rejected
		</button>";
		}
	}
	else{
		echo "You are not privilaged to approve this project.";
	}
	mysqli_close($dbc);
}
?>