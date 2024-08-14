<?php
  require 'dbconfig/config.php';
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>OneSchool</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,700,900" rel="stylesheet">
    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">

    <link rel="stylesheet" href="css/jquery.fancybox.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">

    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/style.css">
    
  </head>
  <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
  
  <div class="site-wrap">

    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>
   
    
    <header class="site-navbar py-4 js-sticky-header site-navbar-target" role="banner">
      
      <div class="container-fluid">
        <div class="d-flex align-items-center">
          <div class="site-logo mr-auto w-25">
            <img style="width: 75px;text-align: center;border-radius: 55px;" src="images/Logo.jpg">
          </div>
          <div class="mx-auto text-center">
            <nav class="site-navigation position-relative text-right" role="navigation">
              <ul class="site-menu main-menu js-clone-nav mx-auto d-none d-lg-block  m-0 p-0">
                <li class="active"><a href="home.php" class="nav-link">Home</a></li>
                <li><a href="student_login.php" class="nav-link">Student</a></li>
                <li><a href="teacher_login.php" class="nav-link">Teachers</a></li>
                <li><a href="reading_section.php" class="nav-link">Reading Section</a></li>
              </ul>
            </nav>
          </div>

          <div class="ml-auto w-25">
            <nav class="site-navigation position-relative text-right" role="navigation">
              <ul class="site-menu main-menu site-menu-dark js-clone-nav mr-auto d-none d-lg-block m-0 p-0">
                <li class="cta"><a href="#contact-section" class="nav-link"><span>Contact Us</span></a></li>
              </ul>
            </nav>
            <a href="#" class="d-inline-block d-lg-none site-menu-toggle js-menu-toggle text-black float-right"><span class="icon-menu h3"></span></a>
          </div>
        </div>
      </div>
      
    </header>

    <div class="intro-section" id="home-section">
      
      <div class="slide-1" style="background-image: url('images/Home_background.jpeg');" data-stellar-background-ratio="1.0">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-12">
              <div class="row align-items-center">
                <div class="col-lg-6 mb-4">
                  <h1  data-aos="fade-up" data-aos-delay="100">Learn From The Expert</h1>
                  <p class="mb-4"  data-aos="fade-up" data-aos-delay="200"></p>

                </div>

                <div class="col-lg-5 ml-auto" data-aos="fade-up" data-aos-delay="500">
                  <form action="home.php" method="post" class="form-box">
                    <h3 class="h4 text-black mb-4">Sign Up</h3>
                    <div class="form-group">
                      <input type="text" class="form-control" placeholder="Full Name" name="fullname">
                    </div>
                    <div class="form-group">
                      <input type="text" class="form-control" placeholder="Email Addresss" name="username">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control" placeholder="Password" name="password">
                    </div>
                    <div class="form-group mb-4">
                      <input type="password" class="form-control" placeholder="Re-type Password" name="cpassword">
                    </div>
                    <div class="form-group mb-4">
                      <select name="access">
                        <option selected="selected">Designation</option>
                        <option value="Student">Student</option>
                        <option value="Teacher">Teacher</option>
                    </select>
                    </div>
                    <div class="form-group">
                      <input type="submit"  class="btn btn-primary btn-pill" value="Sign up" name="submit_btn">
                    </div>
                  </form>

                </div>

                <<?php 
                  function check(string $a){
                      if (strpos($a, '@')!==false) {
                        if((strpos($a, '.com')!==false) or (strpos($a, '.')!==false)){
                              return true;
                          }
                        }
                      }
                  if(isset($_POST['submit_btn'])){
                    // echo '<script type ="text/javascript"> alert("Signup button clicked")</script>';

                        $username = $_POST['username'];
                        $password = $_POST['password'];
                        $cpassword = $_POST['cpassword'];
                        $fullname = $_POST['fullname'];
                        $access = $_POST['access'];
                        $phone = '';
                        if($access == 'selected'){
                          echo '<script type ="text/javascript"> alert("Select a valid option")</script>';
                        }
                        else{
                        if(check($username)){
                          if($password == $cpassword){
                          $query ="select * from login where uname='$username'";
                          $query_run = mysqli_query($con,$query);
                          if(mysqli_num_rows($query_run)>0){
                            //there is already an user
                            echo '<script type ="text/javascript"> alert("user exists")</script>';
                          }
                          else{
                            $query = "insert into login values('$username','$password','$fullname','$access','$phone')";
                            $query_run = mysqli_query($con,$query);

                            if($query_run){
                              echo '<script type ="text/javascript"> alert("User registered ")</script>';
                            }
                            else{
                              echo '<script type ="text/javascript"> alert("error")</script>';
                            }
                          }
                        }
                        else{
                          echo '<script type ="text/javascript"> alert("Password does not match")</script>';
                        }
                      }
                      else{
                        echo '<script type ="text/javascript"> alert("Enter a valid username")</script>';
                      } 
                    }
                      }
                 ?>
              </div>
            </div>
            
          </div>
        </div>
      </div>
    </div>



       

    <div class="site-section bg-light" id="contact-section">
      <div class="container">
        <center>
          <h2>Contact us</h2>
        <p>
          +91 9999999999<br>
          email:oneschool.gmail.com
        </p>
        <br>
        </center>
        <div class="row justify-content-center">
          <p>Devoloped by Sai Charan,Vrinda,Aisiri,Prithvi</p>
          <div class="col-md-7">


            
           
  </div> <!-- .site-wrap -->

  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/jquery.countdown.min.js"></script>
  <script src="js/bootstrap-datepicker.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.fancybox.min.js"></script>
  <script src="js/jquery.sticky.js"></script>

  
  <script src="js/main.js"></script>
    
  </body>
</html>