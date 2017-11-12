<?php
if(!empty($_POST['Username']) && !empty($_POST['Firstname']) && !empty($_POST['Password'])){
	
	$dbc = mysqli_connect("localhost", "root", NULL, "aprl")
	or die("Unable to connect to database");
	$firstname = $_POST['Firstname'];
	$lastname = $_POST['Lastname'];
	$username = $_POST['Username'];
	$password = $_POST['Password'];
	$profession = $_POST['Profession'];
	$query = "SELECT username FROM userlogin WHERE username = '$username'" ;
	$result = mysqli_query($dbc, $query)
	or die('Unable to query');

	if(mysqli_num_rows($result) == 0){
		$query = "INSERT INTO userlogin VALUES('$username', SHA('$password'), '$profession')";
		$result = mysqli_query($dbc, $query)
		or die('Unable to query UserLogin');
		$var = $profession."info";
		if($profession == 'student')
		{	
			// $var = "studentinfo";
			$query = "INSERT INTO $var (`username`, `firstname`, `lastname`, `email`, `image_url`, `credential`, `description`, `lastblog`, `cgpa`) VALUES('$username', '$firstname','$lastname','','fb_avatar_male.jpg','','','','0')";
			// echo $query;
		}
		elseif($profession == 'faculty')
		{
			// $var = "facultyinfo";
			$query = "INSERT INTO $var (`username`, `firstname`, `lastname`, `email`, `image_url`, `credential`, `description`, `lastblog`) VALUES('$username', '$firstname','$lastname','','fb_avatar_male.jpg','','','')";
		}
		$result = mysqli_query($dbc, $query)
			or die('Unable to insert into '.$var." "."signup.php 31");
		echo "Sign Up successfull!";
	}
	else{
		echo 'username already exists <br/>';
	}
	mysqli_close($dbc);
	}
?>