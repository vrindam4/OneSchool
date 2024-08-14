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
            <li class="active"><a href="teacher_profile.php">Profile</a></li>
            <li><a href="prepare_question__before.php">Prepare Questions</a></li>
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
                                <h2 class="card-title">Profile</h2>
                            </div>
                            <?php
                                $query="select * from login where uname='$uname'";
                                $query_run = mysqli_query($con,$query);
                                if(mysqli_num_rows($query_run)!=1){
                                  die("Try later");
                                }
                                while($row=mysqli_fetch_array($query_run)){
                                   $name = $row['name'];
                                   $password = $row['password'];
                                   $designation = $row['access'];
                                   $phone = $row['phone'];
                                    }
                            ?>
                             <form action="" method="post" class="form-box">
                            <div style="padding-left: 50px; padding-top: 50px;">
                                <img style="width: 150px;text-align: center;border-radius: 50px;" src="images/images.png">
                                <h2 style="padding-left: 25px;font-family: Lucida Console, Courier, monospace;  >
                                  <font color="red">
                                    <?php echo $name ?>
                                  </font>   
                                </h2>
                                <h3>Full Name</h3>
                                <input type="text" name="iname" value="<?php echo $name ?>">
                                <h3>User Name</h3>
                                <input disabled="true" type="text" name="uname" value="<?php echo $uname ?>">
                                <h3>Password</h3>
                                <input type="text" name="ipassword" value="<?php echo $password ?>">
                                <h3>Phone number</h3>
                                <input type="text" name="iphone" value="<?php echo $phone ?>">
                                <h3>Designation</h3>
                                <input disabled="true" type="text" name="designation" value="<?php echo $designation ?>">
                                <br>
                                <br>
                                <br>
                                <input type="submit" class="btn btn-primary btn-pill" value="Update" name="update_button">
                              
                            </div>
                            </form>

                            <?php
                              if(isset($_POST['update_button'])){
                                $pass = $_POST['ipassword'];
                                $pho = $_POST['iphone'];
                                $ful = $_POST['iname'];
                                $query = "update login set name='$ful',phone='$pho' ,password='$pass' where uname='$uname'";
                                $query_run = mysqli_query($con,$query);
                                if($query_run){
                                  echo '<script type ="text/javascript"> alert("Updated Successfully")</script>';
                                   echo "<script>location.href='teacher_home.php'</script>";
                                }
                              }
                            ?>
                        </div>
                    </div>
                </div>

</body>
</html>

