<?
include "db.php";
$posterid = $_POST["id"];
$sql = "UPDATE poster set deleted = 0 WHERE posterid = '$posterid'";

echo($sql);
mysqli_query($con, $sql);
header("Location: search_poster.php?notice=recoverSuccess"); /* Redirect browser */
exit();
?>