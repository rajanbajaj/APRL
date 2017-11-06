<?php
if(!empty($_POST['Username']) && !empty($_POST['Name']) && !empty($_POST['Password'])){
	
	require_once('connect.php');
	$name = $_POST['Name'];
	$username = $_POST['Username'];
	$password = $_POST['Password'];
	$profession = $_POST['Profession'];
	$query = "SELECT username FROM userlogin WHERE username = '$username'" ;
	$result = mysqli_query($dbc, $query)
	or die('Unable to query');

	if(mysqli_num_rows($result) == 0){
		$query = "INSERT INTO userlogin VALUES('$name', '$username', SHA('$password'), '$profession')";
		$result = mysqli_query($dbc, $query)
		or die('Unable to query UserTable');
		if($profession == 'student')
			$var = "studentinfo";
		elseif($profession == 'faculty')
			$var = "facultyinfo";
		$query = "INSERT INTO $var VALUES('$username', '$name','','','fb_avatar_male.jpg','','')";
		$result = mysqli_query($dbc, $query)
		or die('Unable to query studentinfo');
		echo "Sign Up successfull!";
	}
	else{
		echo 'username already exists <br/>';
	}
	mysqli_close($dbc);
	}
?>