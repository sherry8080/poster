<?
include "db.php";
$posterid = $_POST["id"];
$sql = "UPDATE poster set deleted = 1 WHERE posterid = '$posterid'";

echo($sql);
mysqli_query($con, $sql);
header("Location: search_poster.php?notice=deleteSuccess"); /* Redirect browser */
exit();
?>