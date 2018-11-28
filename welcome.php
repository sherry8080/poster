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
  <link href="css/welcome.css" rel="stylesheet" type="text/css" />
  <link href="posterPic/shortcutLogo.png" type="image/gif" rel="shortcut icon" /> 
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="js/welcome.js"></script>
</head>
<body>

  <div class="container-responsive">
    <nav id = "topNav" class="navbar navbar-default">
      <div class="navbar-header" ><!-- style="border: solid red" -->
        <a href="welcome.php"><img src="posterPic/logo_min.jpg" class="logo img-responsive" alt="LOCOMO"></a>
      </div>
      <div class="search-container">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <form class="form-inline mr-auto" method="get" action = "search_poster.php">
            <input class="form-control" name = "title" type="text" placeholder="Search Poster" aria-label="Search" style="margin: 5pt;padding: 5pt">
            <a href="logout.php"><button class="btn btn-outline-danger" type="button">logout</button></a>
            <a href="search_poster.php"><button class="btn btn-default" type="button">Advance Search</button></a>
            <button class="btn btn-default" type="submit">Search</button>
          </form>
        </div>
      </div>
      <?if (!$login) {
        echo '<h2 class="navbar-text navbar-right">Don&#39;t have an account? <a href="#" class="navbar-link">Sign up</a> Now</h2>';
      }else{
        echo '<h2 class="navbar-text navbar-right">Welcome '.$_SESSION['username'].'!!!</h2>';
      }
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
          <div class="page-header">
            <h1 id = "buildinghead" >JSOM</h1>
          </div>
        </div>
        
        <?php
        $sql = "SELECT PosterUrl,PosterName,PosterId FROM poster where Location = 'jsom' LIMIT 4";
        $result = mysqli_query($con,$sql);

        $query = "SELECT user_favorite.posterid FROM user, user_favorite WHERE user.UserName = '" .$_SESSION["username"]. "' AND user.userid = user_favorite.userid";
        $like = mysqli_query($con,$query);
        
        $img_id = array(); 
        while ($img = mysqli_fetch_array($like)) {
            $img_id[] = $img[0];
        }
        ?>
        
        <div class="row">

          <div class="col-sm-7">
            <div class="panel panel-primary">
              <div class="panel-body">
                <? 
                $row = mysqli_fetch_array($result);
                echo("<img src='".$row[0]."' alt='".$row[1]."' class='img-responsive' style='width:100%'><br>");
                if(in_array($row[2], $img_id)){
                  echo("<button class = 'like' id='like_".$row[2]."' style='float: right;'>unlike</button>");
                }else{
                  echo("<button class = 'unlike' id='unlike_".$row[2]."' style='float: right;'>like</button>");
                }
                ?>
              </div>
            </div>
          </div>
          
          <div class="col-sm-5"> 
            <div class="row">
              <div class="col-sm-6">
                <div class="panel panel-primary">
                  <div class="panel-body">
                    <? 
                    $row = mysqli_fetch_array($result);
                    echo("<img src='".$row[0]."' alt='".$row[1]."' class='img-responsive' style='width:100%'><br>");
                    if(in_array($row[2], $img_id)){
                      echo("<button class = 'like' id='like_".$row[2]."' style='float: right;'>unlike</button>");
                    }else{
                      echo("<button class = 'unlike' id='unlike_".$row[2]."' style='float: right;'>like</button>");
                    }
                    ?>
                  </div>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="panel panel-primary">
                  <div class="panel-body">
                    <? 
                    $row = mysqli_fetch_array($result);
                    echo("<img src='".$row[0]."' alt='".$row[1]."' class='img-responsive' style='width:100%'><br>");
                    if(in_array($row[2], $img_id)){
                      echo("<button class = 'like' id='like_".$row[2]."' style='float: right;'>unlike</button>");
                    }else{
                      echo("<button class = 'unlike' id='unlike_".$row[2]."' style='float: right;'>like</button>");
                    }
                    ?>
                  </div>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="panel panel-primary">
                <div class="panel-body">
                  <? 
                  $row = mysqli_fetch_array($result);
                  echo("<img src='".$row[0]."' alt='".$row[1]."' class='img-responsive' style='width:100%'><br>");
                    if(in_array($row[2], $img_id)){
                      echo("<button class = 'like' id='like_".$row[2]."' style='float: right;'>unlike</button>");
                    }else{
                      echo("<button class = 'unlike' id='unlike_".$row[2]."' style='float: right;'>like</button>");
                    }

                  ?>
                </div>
              </div>
            </div>
          </div>
        </div>



        <div class="row">
          <div class="page-header">
            <h1 id = "buildinghead" >ECSW</h1>
          </div>
        </div>
        
        <?php
        $sql = "SELECT PosterUrl,PosterName,PosterId FROM poster where Location = 'ecsw' LIMIT 4";
        $query = "SELECT user_favorite.posterid FROM user, user_favorite WHERE user.UserName = '" .$_SESSION["username"]. "' AND user.userid = user_favorite.userid";
        $like = mysqli_query($con,$query);
        $result = mysqli_query($con,$sql);
        ?>
        
        <div class="row">
          <div class="col-sm-7">
            <div class="panel panel-primary">
              <div class="panel-body">
                <? 
                $row = mysqli_fetch_array($result);
                echo("<img src='".$row[0]."' alt='".$row[1]."' class='img-responsive' style='width:100%'><br>");
                    if(in_array($row[2], $img_id)){
                      echo("<button class = 'like' id='like_".$row[2]."' style='float: right;'>unlike</button>");
                    }else{
                      echo("<button class = 'unlike' id='unlike_".$row[2]."' style='float: right;'>like</button>");
                    }
                ?>
              </div>
            </div>
          </div>
          
          <div class="col-sm-5"> 
            <div class="row">
              <div class="col-sm-6">
                <div class="panel panel-primary">
                  <div class="panel-body">
                    <? 
                    $row = mysqli_fetch_array($result);
                    echo("<img src='".$row[0]."' alt='".$row[1]."' class='img-responsive' style='width:100%'><br>");

                    if(in_array($row[2], $img_id)){
                      echo("<button class = 'like' id='like_".$row[2]."' style='float: right;'>unlike</button>");
                    }else{
                      echo("<button class = 'unlike' id='unlike_".$row[2]."' style='float: right;'>like</button>");
                    }
                    ?>
                  </div>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="panel panel-primary">
                  <div class="panel-body">
                    <? 
                    $row = mysqli_fetch_array($result);
                    echo("<img src='".$row[0]."' alt='".$row[1]."' class='img-responsive' style='width:100%'><br>");
                    if(in_array($row[2], $img_id)){
                      echo("<button class = 'like' id='like_".$row[2]."' style='float: right;'>unlike</button>");
                    }else{
                      echo("<button class = 'unlike' id='unlike_".$row[2]."' style='float: right;'>like</button>");
                    }
                    ?>
                  </div>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="panel panel-primary">
                <div class="panel-body">
                  <? 
                  $row = mysqli_fetch_array($result);
                  echo("<img src='".$row[0]."' alt='".$row[1]."' class='img-responsive' style='width:100%'><br>");
                    if(in_array($row[2], $img_id)){
                      echo("<button class = 'like' id='like_".$row[2]."' style='float: right;'>unlike</button>");
                    }else{
                      echo("<button class = 'unlike' id='unlike_".$row[2]."' style='float: right;'>like</button>");
                    }
                  ?>
                </div>
              </div>
            </div>
          </div>
        </div>


        <div class="row">
          <div class="page-header">
            <h1 id = "buildinghead" >ECSS</h1>
          </div>
        </div>
        
        <?php
        $sql = "SELECT PosterUrl,PosterName,PosterId FROM poster where Location = 'ECSS' LIMIT 4";
        $result = mysqli_query($con,$sql);

        $query = "SELECT user_favorite.posterid FROM user, user_favorite WHERE user.UserName = '" .$_SESSION["username"]. "' AND user.userid = user_favorite.userid";
        $like = mysqli_query($con,$query);
        
        $img_id = array(); 
        while ($img = mysqli_fetch_array($like)) {
            $img_id[] = $img[0];
        }
        ?>
        
        <div class="row">

          <div class="col-sm-7">
            <div class="panel panel-primary">
              <div class="panel-body">
                <? 
                $row = mysqli_fetch_array($result);
                echo("<img src='".$row[0]."' alt='".$row[1]."' class='img-responsive' style='width:100%'><br>");
                if(in_array($row[2], $img_id)){
                  echo("<button class = 'like' id='like_".$row[2]."' style='float: right;'>unlike</button>");
                }else{
                  echo("<button class = 'unlike' id='unlike_".$row[2]."' style='float: right;'>like</button>");
                }
                ?>
              </div>
            </div>
          </div>
          
          <div class="col-sm-5"> 
            <div class="row">
              <div class="col-sm-6">
                <div class="panel panel-primary">
                  <div class="panel-body">
                    <? 
                    $row = mysqli_fetch_array($result);
                    echo("<img src='".$row[0]."' alt='".$row[1]."' class='img-responsive' style='width:100%'><br>");
                    if(in_array($row[2], $img_id)){
                      echo("<button class = 'like' id='like_".$row[2]."' style='float: right;'>unlike</button>");
                    }else{
                      echo("<button class = 'unlike' id='unlike_".$row[2]."' style='float: right;'>like</button>");
                    }
                    ?>
                  </div>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="panel panel-primary">
                  <div class="panel-body">
                    <? 
                    $row = mysqli_fetch_array($result);
                    echo("<img src='".$row[0]."' alt='".$row[1]."' class='img-responsive' style='width:100%'><br>");
                    if(in_array($row[2], $img_id)){
                      echo("<button class = 'like' id='like_".$row[2]."' style='float: right;'>unlike</button>");
                    }else{
                      echo("<button class = 'unlike' id='unlike_".$row[2]."' style='float: right;'>like</button>");
                    }
                    ?>
                  </div>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="panel panel-primary">
                <div class="panel-body">
                  <? 
                  $row = mysqli_fetch_array($result);
                  echo("<img src='".$row[0]."' alt='".$row[1]."' class='img-responsive' style='width:100%'><br>");
                    if(in_array($row[2], $img_id)){
                      echo("<button class = 'like' id='like_".$row[2]."' style='float: right;'>unlike</button>");
                    }else{
                      echo("<button class = 'unlike' id='unlike_".$row[2]."' style='float: right;'>like</button>");
                    }

                  ?>
                </div>
              </div>
            </div>
          </div>
        </div>


        <div class="row">
          <div class="page-header">
            <h1 id = "buildinghead" >ATC</h1>
          </div>
        </div>
        
        <?php
        $sql = "SELECT PosterUrl,PosterName,PosterId FROM poster where Location = 'ATC' LIMIT 4";
        $result = mysqli_query($con,$sql);

        $query = "SELECT user_favorite.posterid FROM user, user_favorite WHERE user.UserName = '" .$_SESSION["username"]. "' AND user.userid = user_favorite.userid";
        $like = mysqli_query($con,$query);
        
        $img_id = array(); 
        while ($img = mysqli_fetch_array($like)) {
            $img_id[] = $img[0];
        }
        ?>
        
        <div class="row">

          <div class="col-sm-7">
            <div class="panel panel-primary">
              <div class="panel-body">
                <? 
                $row = mysqli_fetch_array($result);
                echo("<img src='".$row[0]."' alt='".$row[1]."' class='img-responsive' style='width:100%'><br>");
                if(in_array($row[2], $img_id)){
                  echo("<button class = 'like' id='like_".$row[2]."' style='float: right;'>unlike</button>");
                }else{
                  echo("<button class = 'unlike' id='unlike_".$row[2]."' style='float: right;'>like</button>");
                }
                ?>
              </div>
            </div>
          </div>
          
          <div class="col-sm-5"> 
            <div class="row">
              <div class="col-sm-6">
                <div class="panel panel-primary">
                  <div class="panel-body">
                    <? 
                    $row = mysqli_fetch_array($result);
                    echo("<img src='".$row[0]."' alt='".$row[1]."' class='img-responsive' style='width:100%'><br>");
                    if(in_array($row[2], $img_id)){
                      echo("<button class = 'like' id='like_".$row[2]."' style='float: right;'>unlike</button>");
                    }else{
                      echo("<button class = 'unlike' id='unlike_".$row[2]."' style='float: right;'>like</button>");
                    }
                    ?>
                  </div>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="panel panel-primary">
                  <div class="panel-body">
                    <? 
                    $row = mysqli_fetch_array($result);
                    echo("<img src='".$row[0]."' alt='".$row[1]."' class='img-responsive' style='width:100%'><br>");
                    if(in_array($row[2], $img_id)){
                      echo("<button class = 'like' id='like_".$row[2]."' style='float: right;'>unlike</button>");
                    }else{
                      echo("<button class = 'unlike' id='unlike_".$row[2]."' style='float: right;'>like</button>");
                    }
                    ?>
                  </div>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="panel panel-primary">
                <div class="panel-body">
                  <? 
                  $row = mysqli_fetch_array($result);
                  echo("<img src='".$row[0]."' alt='".$row[1]."' class='img-responsive' style='width:100%'><br>");
                    if(in_array($row[2], $img_id)){
                      echo("<button class = 'like' id='like_".$row[2]."' style='float: right;'>unlike</button>");
                    }else{
                      echo("<button class = 'unlike' id='unlike_".$row[2]."' style='float: right;'>like</button>");
                    }

                  ?>
                </div>
              </div>
            </div>
          </div>
        </div>


      </div>
    </div>
  </div>

  <footer class="container-fluid text-center">
    <p>Footer Text</p>
  </footer>

</body>
</html>
