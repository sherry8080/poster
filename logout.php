


<?php
session_start();
session_destroy();

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
        	<?echo "<h1>You Are Sucessfully Logged Out!!!</h1>";
			echo "<a href = 'login.php'><h1>Back to login</h1></>";?>




        </div>

      </div>

      


   </div>
</div>

<footer class="container-fluid text-center">
  <p>Footer Text</p>
</footer>






</body>
</html>
