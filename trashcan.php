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

$poster_name = $_GET["title"];
$poster_loc = $_GET["location"];
$page = $_GET["page"];
$notice = $_GET['notice'];
if($page=="" || $page=="1"){
    $page1=0;
}else{
    $page1=($page*3)-3;
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

    <link rel="stylesheet" type="text/css" href="css/welcome.css">
  <link href="posterPic/shortcutLogo.png" type="image/gif" rel="shortcut icon" /> 



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
            <li><a href="welcome.php">Back to Main Page</a></li>
            <?if ($login) {
                echo '<li><a href="user.php">Back to My Account</a></li>';
              }?>
            <li><a href="PosterUpload.php">Upload Poster</a></li>
          </ul>
      </div>

      <div class="col-md-10 col-sm-10 col-xs-10" id = "MidCol" >    

      <div class="row">
        <div class="page-header">
          <h1 id = "search_result">Trash Can:</h1>
        </div>
      </div>
      <?php

          $sql="SELECT PosterUrl, PosterName, description, posterid
                FROM poster
                where PosterName like '%".$poster_name."%' and Location like '%".$poster_loc."%' and deleted = '1'";

          $result = mysqli_query($con,$sql);

          $cou=mysqli_num_rows($result);
          $totalPageNum=$cou/3;
          $totalPageNum=ceil($totalPageNum);

          $sql = $sql."limit ".$page1.",3";
          $result = mysqli_query($con,$sql);
         


        while($row = mysqli_fetch_array($result)) {
            
        echo  '<div class="row page-header">
                  <div class="col-sm-2 vcenter">
                    <div class="panel panel-primary">
                      <div class="panel-body">';
        echo("<img src='".$row[0]."' alt='".$row[1]."' class='img-responsive' style='width:100%'>");
        echo'              
                  </div>
                </div>
              </div>
           
            <div class="col-sm-6 vcenter">
        
          <table class="table table-sm">
            <tbody>
              <tr>
                <th scope="row">Poster Name:</th>
                <td>'.$row[1].'</td>
              </tr>
              <tr>
                <th scope="row">Poster Description:</th>
                <td>'.$row[2].'</td>
              </tr>
              <tr><th></th>
                <td>

                <form method="post" action = "recover_poster.php">
                  <input type="hidden" name = "id" value="'.$row[3].'"/>
                  <button type="submit" class="btn btn-success">Recover </button>
                </form>


                </td>
              </tr>

            </tbody>
          </table>
        </div> </div>';
        }?>
                
        <div class="row">
          <nav aria-label="Page navigation example">
            <ul class="pagination">
              <li class="page-item">
                <a class="page-link" href="trashcan.php?page=<?if($page == 1){echo '1';}
                                                                else{echo($page-1);}
                                                        ?>" aria-label="Previous">
                  <span aria-hidden="true">&laquo;</span>
                  <span class="sr-only">Previous</span>
                </a>
              </li>
              <?
              for($b=1;$b<=$totalPageNum;$b++){
                ?>
                <li class="page-item"><a class="page-link" 
                    href="trashcan.php?page=<?echo($b);?>">
                    <?echo($b);?></a></li><?


                  
              }
              ?>

              <li class="page-item">
                <a class="page-link" href="trashcan.php?page=<?if($page == $totalPageNum){echo($totalPageNum);}
                                                                else{echo($page+1);}
                                                        ?>" aria-label="Next">
                  <span aria-hidden="true">&raquo;</span>
                  <span class="sr-only">Next</span>
                </a>
              </li>
            </ul>
          </nav>
        </div>

      


   </div>
</div>

<footer class="container-fluid text-center">
  <p>Footer Text</p>
</footer>






</body>
</html>
