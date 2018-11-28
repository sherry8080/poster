<?php
session_start();
include "db.php";


$login = False;
if(empty($_SESSION["username"])||empty($_SESSION["pw"])){
  header("location:login.php?login=False");
  exit();
} else{
  $login = True;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>LOCOMO POSTER</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="LOCOMO POSTER" >
  <meta name="keywords" content="LOCOMO, POSTER" >

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
      <script src="https://cdn.bootcss.com/bootstrap-filestyle/1.2.3/bootstrap-filestyle.min.js"></script>
  <link href="css/welcome.css" rel="stylesheet" type="text/css" />
  <link href="posterPic/shortcutLogo.png" type="image/gif" rel="shortcut icon" /> 



</head>
<body>

<div class="container-responsive">
<nav id = "topNav" class="navbar navbar-default">

<div class="navbar-header">
      <a href="welcome.php"><img src="posterPic/logo_min.jpg" class="logo img-responsive" alt="LOCOMO"></a>
</div>
    <?if (!$login) {
      echo '<p class="navbar-text navbar-right">Don&#39;t have an account? <a href="#" class="navbar-link">Sign up</a> Now</p>';
    }else{
      echo '<h2 class="navbar-text navbar-right">Welcome '.$_SESSION['username'].'!!!</h2>';    }
    ?>

</nav>
</div>

<div class="container-fluid" style="padding: 10pt">
  <div class="row row-eq-height">
      <div class="col-md-2 col-sm-2 col-xs-2" id = "LeftCol">
        <ul class="nav nav-pills nav-stacked">
          <li><a href="#MidCol">Hola Posters</a></li>

          <?
          if($_SESSION["type"] == "0"){
            echo "<!--<li><a href='#'>Contact Us</a></li>-->
            <li><a href='user.php'>My Account</a></li>
            <li><a href='PosterUpload.php'>Upload Poster</a></li>";
          }
          else{
            echo "<li><a href='user.php'>My Account</a></li>
            <li><a href='search_poster.php'>Manage Poster</a></li>
            <li><a href='PosterUpload.php'>Upload Poster</a></li>
            <li><a href='trashcan.php'>Trash Can</a></li>";
          }
          ?>
        </ul>
      </div>

      <div class="col-md-10 col-sm-10 col-xs-10" id = "MidCol" >
        <div class="row">
          <!--
          <form action="upload.php" method="post" enctype="multipart/form-data">Select image to upload:
            <input type="file" name="fileToUpload" id="fileToUpload">
            <input type="submit" value="Upload Image" name="submit">
          </form>
          -->
          <form class="form-horizontal" action="upload.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
              
              <label class="control-label col-sm-2" for="image">Select image to upload:</label>
              <div class="col-sm-3">
                <input  type="file" class="filestyle" name="fileToUpload" id="fileToUpload" onchange="loadFile(event)">
                <img id="uploadedPoster" style="margin: 10px" />
                <script>
                  var loadFile = function(event) {
                    var output = document.getElementById('uploadedPoster');
                    output.src = URL.createObjectURL(event.target.files[0]);
                  };
                </script>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="title">Title:</label>
              <div class="col-sm-10">
                <input type="title" class="form-control" id="title" placeholder="Enter Poster Title" name="title">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="description">Description:</label>
              <div class="col-sm-10">
                <textarea id="description" placeholder="Enter Poster Description" name="description" type="description" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="location">Location:</label>
              <div class="col-sm-10">
                <select class="form-control" name = "location">
                  <option value="">Please Select Location</option>
                  <option <?php if($poster_loc == 'ECSS'){echo("selected");}?> value="ECSS">ECSS</option>
                  <option <?php if($poster_loc == 'ECSW'){echo("selected");}?> value="ECSW">ECSW</option>
                  <option <?php if($poster_loc == 'JSOM'){echo("selected");}?> value="JSOM">JSOM</option>
                  <option <?php if($poster_loc == 'ATC'){echo("selected");}?> value="ATC">ATC</option>
                  <option <?php if($poster_loc == 'ECSN'){echo("selected");}?> value="ECSN">ECSN</option>
                </select>
              </div>
            </div>
            <div class="form-group"> 
              <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" value="Upload Poster" class="btn btn-default">Submit</button>
              </div>
            </div>
          </form>




        </div>

      </div>

      


   </div>
</div>

<footer class="container-fluid text-center">
  <p>Footer Text</p>
</footer>






</body>
</html>
