<?php
session_start();
include_once("db.php");
if(isset($_POST['btn-login'])) {

	$user_email = $_POST['user_email'];
	$user_password = $_POST['password'];
	$_SESSION['pw'] = $user_password;
	$_SESSION['email'] = $user_email;
	
	$sql = "SELECT username, type, userid FROM user WHERE email='$user_email' AND psw='$user_password' ";
	$resultset = mysqli_query($con, $sql) or die("database error:". mysqli_error($con));
	$row = mysqli_fetch_assoc($resultset);		
	if(empty($row)){	
		echo "failed";
		header("Location: login.php"); /* Redirect browser */
		exit();
	} else {	
		$_SESSION['username'] = $row["username"];
		$_SESSION['type'] = $row["type"];
		$_SESSION['userid'] = $row["userid"];
		header("Location: welcome.php"); /* Redirect browser */
		exit();
	}
}
?>