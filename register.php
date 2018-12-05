<?php
include_once("db.php");
if(isset($_POST['btn-save'])) {
	$user_name = $_POST['user_name'];
	$user_email = $_POST['user_email'];
	$user_password = md5($_POST['password']);	
	$sql = "SELECT username FROM user WHERE username='$user_name'";
	$resultset = mysqli_query($con, $sql) or die("database error:". mysqli_error($con));
	$row = mysqli_fetch_assoc($resultset);		
	if(empty($row)){	
		$sql = "INSERT INTO user(username, psw, email, type) VALUES ('".$user_name."', '".$user_password."', '" .$user_email. "', 0)";
		mysqli_query($con, $sql) or die("database error:". mysqli_error($con)."qqq".$sql);			
		echo "registered";
	} else {				
		echo "1";	 
	}
}
?>