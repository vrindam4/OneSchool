<?php
  require 'dbconfig/config.php';
  session_start();
  $uname = $_SESSION['username'];
  $fullname = $_SESSION['full_name'];
  $Question_number = 0;
  $answer_array = array();
  $Score = 0;
  $i = 0;
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
            <li class="active"><a href="student_exam_app.php">Aptitude Questions</a></li>
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
                                <h2 class="card-title">Aptitude</h2>
                            </div>
                            <div style="padding-left: 20px;">
                              <form class="myform" action="" method="POST">
                              <?php
                              $testname = 'aptitude';
                                $result=mysqli_query($con,"SELECT * from ".$testname."");
                                while ($res=mysqli_fetch_array($result)) { 
                                  $Question = $res['question'];
                                  $Option1 = $res['option1'];
                                  $Option2 = $res['option2'];
                                  $Option3 = $res['option3'];
                                  $Option4 = $res['option4'];
                                  $answer = $res['answer'];
                                  array_push($answer_array, $answer);
                                  // print_r($answer_array);
                                  $bname = "b_option_".$Question_number;
                                  // print htmlentities($bname);
                                  ?>
                                  <h2>Question</h2>
                                  <textarea rows="3" cols="100" name="question">
                                    <?php echo $Question ?>
                                  </textarea>
                                  <br>
                                  <br>
                                  <!-- <h3>Option1</h3> -->
                                  <output >
                                  <input type="radio" value = "1" name=<?php echo $bname ?>>
                                  <font size="4">
                                    <?php echo $Option1 ?>
                                  </font></output>
                                  <br>
                                  <!-- <h3>Option2</h3>  -->
                                  <output > 
                                  <input type="radio" value = "2" name=<?php echo $bname ?>>
                                  <font size="4">
                                    <?php echo $Option2 ?>
                                  </font></output>
                                  <br>
                                  <!-- <h3>Option3</h3> -->
                                  <output >
                                  <input type="radio" value = "3" name=<?php echo $bname ?>>
                                  <font size="4">
                                    <?php echo $Option3 ?>
                                  </font></output>
                                  <br>
                                  <!-- <h3>Option4</h3> -->
                                  <output >
                                  <input type="radio" value = "4" name=<?php echo $bname ?>>
                                  <font size="4">
                                    <?php echo $Option4 ?>
                                  </font></output>
                                  <br>
                                  <br>
                                <?php  
                                  $Question_number = $Question_number+1;
                                  } 
                                ?>
                                <input type="Submit" value="Submit" name="submit" class ="btn btn-primary btn-pill">
                              </form>
                            </div>
                            <?php
                              if(isset($_POST['submit'])){
                                while ($i < $Question_number) {  
                                  if(isset($_POST['b_option_'.$i.''])){
                                    $ans = $_POST['b_option_'.$i.''];  
                                  }
                                  else{
                                    $ans = "0";
                                  }
                                  // $ans = $_POST['b_option_'.$i.''];
                                  // echo htmlentities($ans);
                                  if($ans == $answer_array[$i]){
                                    $Score=$Score+1;
                                  }
                                  $i=$i+1;
                                }
                                echo '<script type ="text/javascript"> alert("Your Score is '.$Score.'")</script>';
                                echo "<script>location.href='student_home.php'</script>";
                                }
                            ?>
                        </div>

                    </div>
                </div>

</body>
</html>

