<?php
  require 'dbconfig/config.php';
  session_start();
  $uname = $_SESSION['username'];
  $fullname = $_SESSION['full_name'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>OneSchool</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
    body{
      background-image: url("images/blur.jpg");
      background-repeat: no-repeat;
      background-attachment: fixed; 
      background-size: cover;
      background-position:center;
    }
    /* Set height of the grid so .sidenav can be 100% (adjust if needed) */
    .row.content {height: 1500px}
    
    /* Set gray background color and 100% height */
    .sidenav {
      background-color: #363636;
      height: 100%;
    }
    
    /* Set black background color, white text and some padding */
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
    }
    
    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height: auto;} 
    }
  </style>
</head>
<body >

<div class="container-fluid">
  <div class="row content">
    <div class="col-sm-3 sidenav">
      <div style="text-align: left;">
        <h1 style="color: White;">OneSchool</h1>
        <br>
      </div>
      <center>
        <div>
        <img style="width: 150px;text-align: center;border-radius: 50px;" src="images/images.png">
        </div>
      </center>
      <h3 style="color: white; text-align: center; font-family: Lucida Console, Courier, monospace;"><?php echo $fullname ?></h3>
      <div style="padding-top: 50px;">
          <ul class="nav nav-pills nav-stacked">
            <li class="active"><a href="student_home.php">Home</a></li>
            <li><a href="student_profile.php">Profile</a></li>
            <li><a href="student_exam_app.php">Aptitude Questions</a></li>
            <li><a href="student_exam_before.php">Exams</a></li>
            <li><a href="student_results.php">My results</a></li>
          </ul><br>
      </div>
      <div style="padding-top: 170px;">
        <center>
          <ul style="background-color: white;" class="nav nav-pills nav-stacked">
            <li><a href="logout.php">Logout</a></li>
          </ul>
        </center>
      </div>
    </div>

   <div class="col-sm-9">
      <div class="row">
                    <!-- column -->
                    <div class="col-12">
                        <div class="card">
                            <div style="text-align: center;" class="card-body">
                                <h4 class="card-title"></h4>
                            </div>
                        </div>
                    </div>
      </div>
    </div>
  <div style="padding-top:200px;">
        <center>
        <b><i><font size="5.5">"If you've never tried, how will you ever know if there's any chance?"</font></i></b>
        <p><font size="4.5">The secret of getting AHEAD is getting STARTED,</font></p>
        <p><font size="4.5">therefore here is the platform you can start with...</font></p>
        <p><font size="5">Because the best way to your predict future is to create it!</font></p>
        </center>
        </div>

</body>
</html>

