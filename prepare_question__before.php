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
            <li><a href="teacher_home.php">Home</a></li>
            <li><a href="teacher_profile.php">Profile</a></li>
            <li class="active"><a href="prepare_question__before.php">Prepare Questions</a></li>
            <li><a href="teacher_results.php">View Results</a></li>
          </ul><br>
      </div>
      <div style="padding-top: 240px;">
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
                                <h1 class="card-title">Prepare Test</h1>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th style="padding-left: 75px;" class="border-top-0">TEST NAME</th>
                                            <th class="border-top-0">No. OF STUDENTS REGISTERED</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                           $tablename = 'teacher';
                                           $uname = $_SESSION['username'];
                                           $result=mysqli_query($con,"SELECT * from ".$tablename." where uname='$uname'");
                                           while($res=mysqli_fetch_array($result)){
                                            $testname1 = $res['test_name'];
                                            $test = preg_split("/\_/", $testname1);
                                            ?>
                                            <tr>
                                              <td><?php echo $test[2]; ?></td>
                                              <?php
                                              $tablename1 = 'student';
                                              $result1 = mysqli_query($con,"SELECT count(*) from ".$tablename1." where test_name= '$testname1'");
                                              while ($res1=mysqli_fetch_array($result1)) {?>
                                                <td><?php echo $res1['count(*)']; ?></td>
                                              <?php } ?>
                                            </tr>
                                           <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                            <br>
                            <br>
                            <div style="padding-left: 50px;">
                              <form class="myform" action="prepare_question__before.php" method="POST">
                                <h3>
                                  Enter New Test
                                </h3>
                                <br>
                                <input type="text" name="newtest" class="form-control">
                                <br>
                                <br>
                                <a href="prepare_questions.php"></a><input style="width: 150px;" type="Submit" value="NEW" name="Create_new_test" class ="btn btn-primary btn-pill">
                              </form>
                            </div>
                            <?php
                              if(isset($_POST['Create_new_test'])){
                                //To cretae new table 
                                $tablename3 = 'test_name_'.$_POST['newtest'];
                                $query = "create table ".$tablename3." ( question VARCHAR(200) NOT NULL ,  option1 VARCHAR(100) NOT NULL ,  option2 VARCHAR(100) NOT NULL ,  option3 VARCHAR(100) NOT NULL ,  option4 VARCHAR(100) NOT NULL ,  answer VARCHAR(10) NOT NULL )";
                                $query_run = mysqli_query($con,$query);
                                if($query_run){
                                  //To add that table name to teacher table 
                                  $uname = $_SESSION['username'];
                                  if(!isset($_SESSION['username'])){
                                    echo "<script>alert('Session Expired')</script>";
                                    exit;
                                  }
                                  $query2 = "insert into teacher values('$uname','$tablename3')";
                                  $query_run2 = mysqli_query($con,$query2);

                                  $_SESSION["tabel_name"] = $tablename3;
                                  echo "<script>location.href='prepare_questions.php'</script>";
                                }
                                else{
                                  echo "<script>alert('Test Name already exists')</script>";
                                  // echo htmlentities("Test Name already exists");
                                }
                              }
                            ?>
                        </div>
                    </div>
                </div>

</body>
</html>

