<?php 
session_start();
include_once("db.php");
$notice = $_GET['login'];

?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<title></title>
<script type="text/javascript" src="js/validation.min.js"></script>
<script type="text/javascript" src="js/register.js"></script>
<link href="css/style.css" rel="stylesheet" type="text/css" media="screen">
<?php include('container.php');?>

<div class="container">
	<div class="register_container">
		<form class="form-signin" action="validate.php" method="post" id="login-form">
			<h2 class="form-signin-heading">User Login Form</h2><hr />
			<div id="error">
			</div>
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Username" name="user_name" id="user_name" />
			</div>
			<div class="form-group">
				<input type="password" class="form-control" placeholder="Password" name="password" id="password" />
			</div>
			<h1><?
				if($notice == "False"){
					echo("Please login first!!!");
				}
				else if($notice == "reg"){
					echo("Registering Successful!!");

				}
				?></h1>
			<hr />
			<div class="form-group">
				<button type="submit" class="btn btn-default" name="btn-login" id="btn-login">
					<span class="glyphicon glyphicon-log-in"></span>Login
				</button> 
				<button type="button" class="btn btn-default" name="btn-login" id="btn-login">
					<a href="signup.php">sign up</a>
				</button> 
			</div>  
		</form>
	</div>
	
</div>
</body></html>