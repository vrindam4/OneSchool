<?php
  require 'dbconfig/config.php';
  session_start();
  $uname = $_SESSION['username'];
  $fullname = $_SESSION['full_name'];
  $testname = $_SESSION["tabel_name"];
  $test = preg_split("/\_/", $testname);
  $test = $test[2];
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
                                <h1 class="card-title">Prepare Questions for <?php echo $test ?></h1>
                            </div>
                            <div style="padding-left: 40px;">
                              <form class="myform" action="" method="POST">
                                <h2>Question</h2>
                                <textarea rows="5" cols="100" name="question">
                                </textarea>
                                <br>
                                <br>
                                <h3>Option1</h3>
                                <input type="radio" value = "1" name="b_option">
                                <input type="text" name="option1" class="form-control">
                                <br>
                                <h3>Option2</h3>
                                <input type="radio" value = "2" name="b_option">
                                <input type="text" name="option2" class="form-control">
                                <br>
                                <h3>Option3</h3>
                                <input type="radio" value = "3" name="b_option">
                                <input type="text" name="option3" class="form-control">
                                <br>
                                <h3>Option4</h3>
                                <input type="radio" value = "4" name="b_option">
                                <input type="text" name="option4" class="form-control">
                                <br>
                                <br>
                                <input type="Submit" value="Add" name="add" class ="btn btn-primary btn-pill">
                              </form>
                            </div>

                            <?php
                              if(isset($_POST['add'])){
                                $Question = $_POST['question'];
                                $Option1 = $_POST['option1'];
                                $Option2 = $_POST['option2'];
                                $Option3 = $_POST['option3'];
                                $Option4 = $_POST['option4'];

                                if(isset($_POST['b_option'])){
                                  $Answer = $_POST['b_option'];
                                  $testname1 = $_SESSION["tabel_name"];
                                  $query="INSERT into ".$testname1." values('$Question','$Option1','$Option2','$Option3','$Option4','$Answer')";
                                    $query_run = mysqli_query($con,$query);
                                    if($query_run){
                                     echo htmlentities("Successfull");
                                    }
                                    else{
                                     echo htmlentities("Failed");
                                    }
                                }
                                else{
                                  echo htmlentities("No value selected");
                                }
                              }
                            ?>


                            <div style="padding-top: 30px;" class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th style="padding-left: 50px;" class="border-top-0">Question</th>
                                            <th class="border-top-0">Option1</th>
                                            <th class="border-top-0">Option2</th>
                                            <th class="border-top-0">Option3</th>
                                            <th class="border-top-0">Option4</th>
                                            <th class="border-top-0">Answer</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                          <?php
                                          // $testname = $_SESSION["tabel_name"];
                                          // echo htmlentities($testname);
                                           $result=mysqli_query($con,"SELECT * from ".$testname."");
                                           while($res=mysqli_fetch_array($result)){
                                            ?>
                                            <tr>
                                              <td><?php echo $res['question']; ?></td>
                                              <td><?php echo $res['option1']; ?></td>
                                              <td><?php echo $res['option2']; ?></td>
                                              <td><?php echo $res['option3']; ?></td>
                                              <td><?php echo $res['option4']; ?></td>
                                              <td><?php echo $res['answer']; ?></td>
                                            </tr>
                                           <?php }?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

</body>
</html>

