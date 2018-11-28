<?
session_start();
include_once("db.php");

$userName = $_SESSION["username"];
$posterid = $_POST['posterid'];
$type = $_POST['type'];

if ($type == "like"){
	$sql = "DELETE FROM user_favorite 
			WHERE PosterID = '$posterid' and userid in 
			( select userid from user where UserName = '$userName')";
	$result = mysqli_query($con,$sql);
	echo "unlike";
}else{
	$sql = "INSERT INTO user_favorite 
			VALUES(( select userid from user where UserName = '$userName'), '$posterid')";
	$result = mysqli_query($con,$sql);
	echo "like";
}
?>