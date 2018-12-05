<?php
session_start();
include_once("db.php");
if(isset($_POST['btn-login'])) {
	$user_name = $_POST['user_name'];
	$user_password = md5($_POST['password']);
	$_SESSION['pw'] = $user_password;
	$_SESSION['userName'] = $user_name;
	
	$sql = "SELECT username, type, userid FROM user WHERE username='$user_name' AND psw='$user_password' ";
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