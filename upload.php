<?php
session_start();
include "db.php";

$target_dir = "posterPic/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$poster_name = $_POST["title"];
$poster_desc = $_POST["description"];
$poster_loc = $_POST["location"];
echo("<h1>title:".$poster_name."</h1>");
echo("<h1>description:".$poster_desc."</h1>");
echo("<h1>location:".$poster_loc."</h1>");
echo("<br>");
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ". ";
        $uploadOk = 1;
    } else {
        echo "File is not an image. ";
        $uploadOk = 0;
    }
}
// Check if file already exists
/*
if (file_exists($target_file)) {
    echo "Sorry, file already exists. ";
    $uploadOk = 0;
}*/
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large. ";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed. ";
    header("Location: user.php?notice=misspic"); /* Redirect browser */
    exit();
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded. ";

// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
        uploadPic_DB(basename($_FILES["fileToUpload"]["name"]), $poster_name, $poster_loc, $poster_desc, $con);
        header("Location: user.php?notice=uploadSuccess"); /* Redirect browser */
        exit();


    } else {
        echo "Sorry, there was an error uploading your file. ";
    }
}

function uploadPic_DB($fileName, $poster_name, $poster_loc, $poster_desc, $con) {
    $sql="INSERT INTO poster(PosterName,PosterURL,Location,Description) VALUES ('".$poster_name."','posterPic/".
    $fileName."','".$poster_loc."','".$poster_desc."')";
    
    $result = mysqli_query($con,$sql);
    
    $sql1 = "INSERT INTO user_poster 
            VALUES (".$_SESSION['userid'].", (SELECT posterid from poster where postername = '".$poster_name."'))";
    echo($sql1);
    $result1 = mysqli_query($con,$sql1);
}



?>