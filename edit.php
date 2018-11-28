<?php

include "db.php";

$target_dir = "posterPic/";
$target_file_basename = basename($_FILES["fileToUpload"]["name"]);
$poster_name = $_POST["title"];
$poster_desc = $_POST["description"];
$poster_loc = $_POST["location"];
$poster_id = $_POST["id"];

if($target_file_basename == ""){
    $sql="  UPDATE poster 
            SET postername = '$poster_name', location = '$poster_loc', description = '$poster_desc' 
            where posterid = '$poster_id'";
    echo($sql);
    $result = mysqli_query($con,$sql);
}else{
    $sql="  UPDATE poster 
            SET postername = '$poster_name', posterurl = '".$target_dir.$target_file_basename."', 
            location = '$poster_loc', description = '$poster_desc' where posterid = '$poster_id'";
    echo($sql);
    $result = mysqli_query($con,$sql);
}
header("Location: search_poster.php?notice=editsuccess"); /* Redirect browser */
exit();



?>