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
    /*body{
      background-image: url("images/download.png");
      background-repeat: no-repeat;
      background-attachment: fixed; 
      background-size: cover;
      background-position: center;
    }*/
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
            <li><a href="student_home.php">Home</a></li>
            <li><a href="student_profile.php">Profile</a></li>
            <li><a href="student_exam_app.php">Aptitude Questions</a></li>
            <li><a href="student_exam_before.php">Exams</a></li>
            <li class="active"><a href="student_results.php">My results</a></li>
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
                                <h4 class="card-title">Results</h4>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th style="padding-left: 50px;" class="border-top-0">TEST NAME</th>
                                            <th class="border-top-0">Result</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <?php
                                        $tablename = 'student';
                                        $result=mysqli_query($con,"SELECT * from ".$tablename." where uname='$uname'");
                                        while($res=mysqli_fetch_array($result)){
                                            $testname1 = $res['test_name'];
                                            $Score = $res['marks'];
                                            $test = preg_split("/\_/", $testname1);
                                            ?>
                                            <tr>
                                              <td>
                                                <?php echo $test[2] ?>
                                              </td> 
                                              <td>
                                                <?php echo $Score ?>
                                              </td>
                                            </tr>
                                          <?php } ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>  
                </div>

</body>
</html>

